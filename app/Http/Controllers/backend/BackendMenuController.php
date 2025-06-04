<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\ActionPermission;
use App\Models\backend\BackendMenu;
use App\Models\backend\BackendSubMenu;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;

class BackendMenuController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        //  $menu = BackendMenu::all();
        $menu = BackendMenu::latest()->get();
        return view('backend.menubar.index', compact('menu'));
    }

    public function create()
    {
        return view('backend.menubar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "menu_name" => "required|unique:backendmenu,menu_name",
            "route_name" => "required",
            "visibility" => "required",
        ]);

        if (!isset($request->has_submenu)) {
            if (!isset($request->permission)) {
                return back()->withErrors('Please select atlest one permission')->withInput();
            }
            if (isset($request->permission) && count($request->permission) < 1) {
                return back()->withErrors('Please select atlest one permission')->withInput();
            }
        }
        $menu = new BackendMenu();
        $menu->fill($request->all());

        if ($menu->save()) {
            if (!isset($request->has_submenu)) {
                if (count($request->permission) >= 1) {
                    $all_permissions = implode(',', $request->permission);
                    //set menu ids comma saparated for update
                    $menu->permission_ids = $all_permissions;
                    $menu->update();
                    foreach ($request->permission as $permission) {
                        $action_permission_name = ActionPermission::where('action_permission_id', $permission)->first();
                        if ($action_permission_name) {
                            $permission_name = isset($action_permission_name->action_permission_name) ? $action_permission_name->action_permission_name : '';
                            $permission_name = $permission_name . ' ' . (isset($request->menu_name) ? $request->menu_name : '');
                            $permissions = new Permission();
                            $permissions->name = strtolower($permission_name);
                            $permissions->menu_id = $menu->backendmenu_id;
                            $permissions->guard_name = 'admin';
                            $permissions->action_permission_id = $permission;
                            $permissions->save();
                        }
                    }
                }
            } else {
                //has
                //if manu has submenu dont need to permissions delete any existing
            }
            return redirect()->route('admin.backendmenu.index')->with('success', 'menu Added');
        }
    }

    public function edit($id)
    {
        $menu = BackendMenu::where('backendmenu_id', $id)->first();
        if ($menu) {
            return  view('backend.menubar.edit', compact('menu'));
        } else {
            return redirect()->route('admin.backendmenu.index')->with('info', 'Menu not found!');
        }
    }


    public function update(Request $request)
    {
        $request->validate([
            "menu_name" => "required",
            "route_name" => "required",
            "visibility" => "required",
        ]);

        if (!isset($request->has_submenu)) {
            if (!isset($request->permission)) {
                return back()->withErrors('Please select atlest one permission')->withInput();
            }
            if (isset($request->permission) && count($request->permission) < 1) {
                return back()->withErrors('Please select atlest one permission')->withInput();
            }
        }

        $menu =  BackendMenu::where('backendmenu_id', $request->backendmenu_id)->first();
        if ($menu) {

            $menu->fill($request->all());
            if ($menu->save()) {
                if (!isset($request->has_submenu)) {
                    $menu->has_submenu = null;
                    $menu->update();
                    if (count($request->permission) >= 1) {
                        $all_permissions = implode(',', $request->permission);
                        //set menu ids comma saparated for update
                        $menu->permission_ids = $all_permissions;
                        $menu->update();
                        //Fetch all permission and check
                        //if permision found update  its name or create new
                        //else delete
                        $all_permissions = ActionPermission::all();
                        foreach ($all_permissions as $permission) {
                            //dd($permission->action_permission_id,$request->permission);
                            if (in_array($permission->action_permission_id, array_values($request->permission))) {
                                //lets match permission id with name or create new
                                $permission_name = isset($permission->action_permission_name) ? $permission->action_permission_name : '';
                                $permission_name = $permission_name . ' ' . (isset($request->menu_name) ? $request->menu_name : '');

                                //lets check this id exits or not
                                $existing_permission = Permission::where('action_permission_id', $permission->action_permission_id)
                                    ->where('menu_id', $request->backendmenu_id)->first();

                                if (!$existing_permission) {
                                    $existing_permission = new Permission();
                                }

                                $existing_permission->name = strtolower($permission_name);
                                $existing_permission->guard_name = 'admin';
                                $existing_permission->menu_id = $request->backendmenu_id;
                                $existing_permission->action_permission_id = $permission->action_permission_id;
                                $existing_permission->save();
                            } else {

                                //permission not found in base permission it mean premission removed not assigned
                                $delete_permission = Permission::where('action_permission_id', $permission->action_permission_id)
                                    ->where('menu_id', $request->backendmenu_id)->first();

                                if ($delete_permission) {
                                    //dd($delete_permission->toArray());
                                    $delete_permission->delete();
                                }
                            }
                        }
                    }
                } else {

                    //has
                    //if manu has submenu dont need to permissions delete any existing
                    $old_permission = Permission::where('menu_id', $request->backendmenu_id)->get();

                    if (isset($old_permission) && count($old_permission) > 0) {
                        //set permissions to null
                        $menu->permission_ids = NULL;
                        $menu->update();
                        //    dd($menu);
                        foreach ($old_permission as $value) {
                            $delete = Permission::where('id', $value->id)->first()->delete();
                        }
                    }
                }
                return redirect()->route('admin.backendmenu.index')->with('success', 'Menu Updated.');
            }
        } //if menu found condition
    }

    public function delete($id){
        //delete menu
        $menu = BackendMenu::where('backendmenu_id', $id)->first();
        if($menu){
            if($menu->delete()){
                $submenu = BackendSubMenu::where('backendmenu_id',$id)->delete();
                $permissions = Permission::where('menu_id',$id)->delete();
                return redirect()->route('admin.backendmenu.index')->with('info', 'Menu Deleted');
            }else{
                return redirect()->route('admin.backendmenu.index')->with('error', 'Failed to delete menu');
            }

        }else{
            return redirect()->route('admin.backendmenu.index')->with('error', 'Menu Not Found');
        }
    }
}    //end of class

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\ActionPermission;
use Illuminate\Http\Request;

use App\Models\backend\BackendSubMenu;
use Spatie\Permission\Models\Permission;

class BackendSubMenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($id)
    {
        $menu = BackendSubMenu::where('backendmenu_id',$id)->get();
        return view('backend.submenu.index', compact('menu', 'id'));
    }

    public function create($id)
    {
        return view('backend.submenu.create', compact('id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "menu_name" => "required|unique:backend_submenu,menu_name",
            "route_name" => "required",
            "visibility" => "required",
            "permission" => "required",
        ]);
        $all_permissions = implode(',', $request->permission);
        $sub_menu = new BackendSubMenu();
        $sub_menu->permission_ids = $all_permissions;
        $sub_menu->fill($request->all());
        if ($sub_menu->save()) {
            foreach ($request->permission as $permission) {
                $action_permission_name = ActionPermission::where('action_permission_id', $permission)->first();
                if ($action_permission_name) {
                    $permission_name = isset($action_permission_name->action_permission_name) ? $action_permission_name->action_permission_name : '';
                    $permission_name = $permission_name . ' ' . (isset($request->menu_name) ? $request->menu_name : '');
                    $permissions = new Permission();
                    $permissions->name = strtolower($permission_name);
                    $permissions->menu_id = $sub_menu->backendmenu_id;
                    $permissions->sub_menu_id = $sub_menu->sub_menu_id;
                    $permissions->guard_name = 'admin';
                    $permissions->action_permission_id = $permission;
                   // dd($permission->toArray());
                    $permissions->save();
                }
            }
            return redirect()->route('admin.backend.submenu.index',['id'=>$request->backendmenu_id])->with('success','Submenu Added');
        }
    }


    public function edit($id){
        $submenu = BackendSubMenu::where('sub_menu_id',$id)->first();
        if($submenu){
            return view('backend.submenu.edit', compact('submenu'));
        }else{
            return redirect()->back()->with('error','Menu Not Found!');
        }
    }

    public function update(Request $request){
        $request->validate([
            "menu_name" => "required",
            "route_name" => "required",
            "visibility" => "required",
            "permission" => "required",
        ]);
        $all_permissions = implode(',', $request->permission);
        $sub_menu = BackendSubMenu::where('sub_menu_id',$request->sub_menu_id)->first();
        if($sub_menu){
            $sub_menu->fill($request->all());
            $sub_menu->permission_ids = $all_permissions;
            if($sub_menu->save()){
                $all_base_permissions = ActionPermission::all();
                foreach ($all_base_permissions as $permission) {
                    if(in_array($permission->action_permission_id, array_values($request->permission))){
                        $permission_name = isset($permission->action_permission_name) ? $permission->action_permission_name : '';
                        $permission_name = $permission_name . ' ' . (isset($request->menu_name) ? $request->menu_name : '');

                        //lets check this id exits or not
                        $existing_permission = Permission::where('action_permission_id', $permission->action_permission_id)
                        ->where('sub_menu_id', $request->sub_menu_id)->first();

                    if (!$existing_permission) {
                        $existing_permission = new Permission();
                    }

                    $existing_permission->name = strtolower($permission_name);
                    $existing_permission->guard_name = 'admin';
                    $existing_permission->menu_id = $request->backendmenu_id;
                    $existing_permission->sub_menu_id = $request->sub_menu_id;
                    $existing_permission->action_permission_id = $permission->action_permission_id;
                    $existing_permission->save();

                    }else{
                        //delete permission
                        $existing_permission = Permission::where('action_permission_id', $permission->action_permission_id)
                        ->where('sub_menu_id', $request->sub_menu_id)->first();
                        if($existing_permission){
                            $existing_permission->delete();
                        }

                    }

                }
                return redirect()->route('admin.backend.submenu.index',['id'=>$sub_menu->backendmenu_id])->with('success','Menu Updated');
            }else{
                //menu not save
                return redirect()->route('admin.backend.submenu.index',['id'=>$sub_menu->backendmenu_id])->with('error','falied to Updated Menu');
            }

        }else{
            //else not found
            return redirect()->route('admin.backend.submenu.index',['id'=>$sub_menu->backendmenu_id])->with('error','Menu not found');
        }

    }

    public function delete($id){
       $menu = BackendSubMenu::where('sub_menu_id',$id)->first();
       if($menu){
            if($menu->delete()){
                //select permission to delete
                $permission = Permission::where('sub_menu_id',$id)->delete();
                return redirect()->route('admin.backend.submenu.index',['id'=>$menu->backendmenu_id])->with('info','Menu deleted');
            }else{
                return redirect()->route('admin.backend.submenu.index',['id'=>$menu->backendmenu_id])->with('error','failed to delete menu');
            }
       }else{
        //menu not found
        return redirect()->route('admin.backendmenu.index')->with('error','Menu not found');
       }
    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\ActionPermission;
use App\Models\backend\Admin;
use App\Models\backend\BackendMenu;
use App\Models\backend\BackendSubMenu;
use Auth;

//use spatie role
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $roles = Role::all();
        return view('backend.roles.index',compact('roles'));
    }

    public function create()
    {
        return view('backend.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:roles,name",
            "menu_id" => "required",
            "sub_menu_id" => "required",
            'permissions' =>'required'
        ]);

        $menu_ids = (isset($request->menu_id)?implode(',',$request->menu_id):NULL);
        $sub_menu_ids = (isset($request->sub_menu_id)?implode(',',$request->sub_menu_id):NULL);

        $role = new Role;
        $role->name = $request->name;
        $role->guard_name = 'admin';
        $role->menu_id = $menu_ids;
        $role->sub_menu_id = $sub_menu_ids;
        if($role->save()){
            $permissions = Permission::whereIN('id',$request->permissions)->get();
            $role->syncPermissions( $permissions);
            return redirect()->route('admin.roles')->with('success','New Role Created');
        }else{
            return redirect()->route('admin.roles')->with('error','failed to Create Role');
        }


    }

    public function edit($id)
    {
        $role = Role::where('id', $id)->first();
        $has_permissions = $role->getAllPermissions();
        $has_permissions = collect($has_permissions)->mapWithKeys(function ($item, $key) {
            return [$item['id']=>$item['id']];
          })->toArray();

        if ($role) {
            return  view('backend.roles.edit', compact('role','has_permissions'));
        } else {
            return redirect()->route('admin.roles')->with('info', 'Menu not found!');
        }
    }


    public function update(Request $request)
    {
        $request->validate([
            "name" => "required",
            "menu_id" => "required",
            "sub_menu_id" => "required",
            'permissions' =>'required'
        ]);
       // dd($request->permissions);
        ///
        $menu_ids = (isset($request->menu_id)?implode(',',$request->menu_id):NULL);
        $sub_menu_ids = (isset($request->sub_menu_id)?implode(',',$request->sub_menu_id):NULL);

        $role = Role::where('id',$request->id)->first();
        $user = Admin::where('id',Auth::user()->id)->first();
       // $user->assignRole($role);
        if($role){
            $role->name = $request->name;
        $role->guard_name = 'admin';
        $role->menu_id = $menu_ids;
        $role->sub_menu_id = $sub_menu_ids;
        if($role->save()){
            $permissions = Permission::whereIN('id',$request->permissions)->get();
            $role->syncPermissions($permissions);

            return redirect()->route('admin.roles')->with('success','Role Has Been Updated.');
        }else{
            return redirect()->route('admin.roles')->with('error','failed to Create Role.');
        }
        }else{
            return redirect()->route('admin.roles')->with('error','Role Not Found.');
        }

    }

    public function delete($id){
        $role = Role::where('id',$id)->first();
        if($role){
            if($role->delete()){
                return redirect()->route('admin.roles')->with('info','Role Has Been Deleted.');
            }else{
                return redirect()->route('admin.roles')->with('error','Unable to Delete Role.');
            }
        }else{
            return redirect()->route('admin.roles')->with('error','Role Not Found.');
        }
    }
}    //end of class

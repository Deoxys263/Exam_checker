<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Admin;
use Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Hash;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::guard('admin')->user()->status != 1){
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->withErrors(['Your account is deactivated please contact to admin']);
            }
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withErrors(['Invalid credentials']);
        }
    }

    public function assign()
    {
        // $user = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        // $permissions = Permission::all();
        // $user->syncPermissions($permissions);
        // dd($user->toARray());
    }

    public function logout()
    {

        $sessionId = session()->getId();
        //ActivityLogout($sessionId);
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function viewusers()
    {
        //  dd('welcoome');
        $adminusers = Admin::with('admin_role')->orderBy('id', 'DESC')->get();
        return view('backend.internal_users.index', compact('adminusers'));
    }

    //function for create new user
    public function create()
    {
        $role = Role::pluck('name', 'id');
        return view('backend.internal_users.create', compact('role'));
    }

    //store user
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'role' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password|min:6'
        ]);

        $user = new Admin;
        $user->fill($request->all());

        if ($user->save()) {
            //check user role
            if(isset($request->role)){
                $role = Role::where('id',$request->role)->first();
                if($role){
                    $user->assignRole($role);
                }
            }
        }
        return redirect()->route('admin.users')->with('success', 'New User Has Been Registered.');
    }


    public function edit($id)
    {
        $user = Admin::where('id', $id)->first();
        $role = Role::pluck('name', 'id');
        return view('backend.internal_users.edit', compact('user', 'role'));
    }

    public function update(Request $request)
    {
        $update_data = $request->all();
        $data = Admin::where('id', $request->id)->first();
        if ($data) {


            $old = $data;
            $data->fill($request->all());
            if ($data->save()) {

                //check user role
                if (isset($request->role)) {
                    $role = Role::where('id', $request->role)->first();
                    if ($role) {
                        $data->assignRole($role);
                    }
                }

                return redirect()->route('admin.users')->with('success', 'User Has Been Updated');
            }
        } else {
            return redirect()->route('admin.users')->with('error', 'User Not Found');
        }
    }

    //update Status
    public function  UpdateAdminStatus(Request $request)
    {
        $data = Admin::where('id', $request->id)->first();
        if ($data) {
            $old = $data;
            $data->fill($request->all());
            if ($data->save()) {
                return redirect()->route('admin.users')->with('success', 'User Status Been Updated');
            } else {
                return redirect()->route('admin.users')->with('error', 'User Not Found');
            }
        }
    }

    public function delete($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users')->with('error', 'You Cannot Delete Yourself');
        }
        $user = Admin::where('id', $id)->first();
        if ($user) {
            if ($user->delete()) {
                return redirect()->route('admin.users')->with('success', 'User Has Been Deleted');
            } else {
                return redirect()->route('admin.users')->with('error', 'User Not Found');
            }
        }
    }


    //change password from backend
    public function SetPassword(Request $request){
        $request->validate([
            'id'=>'required',
            'new_password'=>'required',
            'confirm_password'=>'required|same:new_password'
        ]);


        $user = Admin::where('id',$request->id)->first();
        if($user){
            $user->password = $request->new_password;
            if($user->save()){
                return redirect()->back()->with('success','Password Has Been Changed.');
            }else{
                return redirect()->back()->with('error','Failed to Update Password.');
            }
        }else{
            return redirect()->back()->with('error','User Not Found.');
        }

    }


    //Admin Profile
    public function AdminProfile()
    {
        $user_id = Auth::user()->id;
        $details = Admin::where('id', $user_id)->first();
        return view('backend.account.profile', compact('details'));
    }


    //update user profile
    public function AdminProfileUpdate(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
        ]);
        $userdata = Admin::where('id', $request->id)->first();
        $old = $userdata;
        $userdata->fill($request->all());
        if ($userdata->save()) {
            return redirect()->route('admin.dashboard')->with('success', 'Profile Has Been Updated');
        } else {
            return redirect()->route('admin.dashboard')->with('error', 'Profile Not Found');
        }
    }

    public function changePassword()
    {
        $user_id = Auth::user()->id;
        $details = Admin::where('id', $user_id)->first();
        return view('backend.account.changepassword', compact('details'));
    }

    public function UpdatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:5',
            'new_password_confirmation' => 'required|same:new_password|min:5'
        ]);
        $user = Admin::where('id', Auth::user()->id)->first();
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = $request->new_password;
            if ($user->save()) {
                return redirect()->route('admin.user.changepassword')->with('success', 'Password Has Been Changes');
            } else {
                return redirect()->route('admin.user.changepassword')->with('info', 'Failed to change password');
            }
        } else {
            return redirect('admin.user.changepassword')->with('error', 'Invalid Old Password.');
        }
    }
}

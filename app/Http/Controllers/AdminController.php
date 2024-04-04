<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

date_default_timezone_set('Asia/kathmandu');
class AdminController extends Controller
{
    //---------- User create index
    public function createUserIndex()
    {
        $roles = Role::all();
        // $name = UsersInfo::where('user_id', Auth::user()->id)->first();
        return view('auth.create-user', compact('roles'));

    }

    //-------------- New user create
    public function createIndexPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'email' => 'required|string',
            'role' => 'required',
            'status' => 'required',
            'password' => 'required',
            'cpassword' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $validated = $validator->validated();

        $roleFind = Role::find($validated['role']);

        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'status' => $validated['status'],
        ]);

        $user->userInfo()->create([
            'f_name' => $validated['f_name'],
            'l_name' => $validated['l_name'],
        ]);
        $user->assignRole($roleFind->name);

        return redirect()->route('show.user.lists')->with('success', 'SuccessFully Registered ' . $request->email);
    }

    //-------------------  user data edit or update index
    public function userEdit($user_id)
    {
        $user = User::with('userInfo')->find($user_id);
        if (!$user) {
            return back()->with('error', 'User Not Found !');
        }

        $roles = Role::all();

        return view('auth.layout.edit-user-data', compact('user', 'roles'));
    }

    //-------------------  user data edit or update  by admin
    public function userDataUpdate(Request $request, $user_id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'f_name' => 'required',
                'l_name' => 'required',
                'email' => 'required|email',
                'role' => 'required',
                'status' => 'required',
                'cpassword' => 'same:password',
            ]
        );

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $validated = $validator->validated();

        $user = User::with('userInfo')->find($user_id);


        if (!$user) {
            return back()->with('error', 'User Not Found !');
        }

        $roleFind = Role::find($validated['role']);


        //*********************   update user data  ******************************************* */

        $user->update([
            'email' => $validated['email'],
            'status' => $validated['status'],
        ]);

        //*********************   update user info data  ******************************************* */

        $user->userInfo()->update([
            'f_name' => $validated['f_name'],
            'l_name' => $validated['l_name'],
        ]);

        //*********  check password is null or not ******** */

        if (isset($validated['cpassword'])) {
            $user->update([
                'password' => Hash::make($validated['cpassword']),
            ]);
        }
        $user->syncRoles($roleFind->name);

        return redirect()->route('show.user.lists')->with('success', 'Updated SuccessFully ' . $request->email);
    }

    //-------------------  view all user lists only admin
    public function viewUserLists()
    {
        $name = UsersInfo::where('user_id', Auth::user()->id)->first();
        $users = User::with('userInfo')->orderBy('updated_at', 'DESC')->get();
        $roles = Role::all();
        return view('auth.user-list', compact('users', 'name', 'roles'));
    }

    //-------------------  admin view all details per single user
    public function viewUserSingleData($user_id)
    {

        $user = User::with('userInfo')->find($user_id);
        $roles = Role::all();

        return view('auth.view-user-details', compact('user', 'roles'));

    }

    //-------------------  delete single user by admin
    public function deleteUserAccount($user_id)
    {

        User::find($user_id)->delete();
        UsersInfo::where('user_id', $user_id)->delete();
        return back()->with('error', "SuccessFully Deleted");

    }
}

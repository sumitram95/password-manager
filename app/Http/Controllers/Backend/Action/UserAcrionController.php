<?php

namespace App\Http\Controllers\Backend\Action;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserAcrionController extends Controller
{
    public function userEdit($user_id)
    // public function edit($id)
    {
        $user = User::with('userInfo')->find($user_id);
        // dd($user->getRoleNames());
        $roles = Role::all();

        $update = "Edit";
        $title = "Edit User Data";
        $url = "/user/edit/" . $user_id;
        // dd($users);

        return view('auth.create-user', compact('user', 'update', 'title', 'url', 'roles'));
    }
    public function userEditSave(Request $request, $user_id)
    // public function store(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'f_name' => 'required',
                'l_name' => 'required',
                'email' => 'required|email',
                'role' => 'required',
                'password' => 'required',
                'cpassword' => 'required|same:password',
            ]
        );
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $validated = $validator->validated();
        $checkId = UsersInfo::find($user_id);

        $roleFind = Role::find($validated['role']);

        //check user_id
        if ($checkId) {

            $update = User::find($checkId->user_id);
            $roleName=$update->getRoleNames();

            $update->update([
                'password' => Hash::make($validated['password']),
            ]);
            // $update->removeRole()->delete();
            $update->syncRoles($roleFind->name);
            $update->userInfo->update([
                'f_name' => $validated['f_name'],
                'l_name' => $validated['l_name'],
            ]);

            return back()->with('success', 'Updated SuccessFully');
        } else {
            return back()->with('error', "Sorry not found user");
        }

    }
    public function userPermissionChanger($user_id)
    {
        $role = User::find($user_id);
        if ($role->role === 1) {
            $role->update([
                'role' => 0,
            ]);

            return back();
        } else {
            $role->update([
                'role' => 1,
            ]);
            return back();
        }
    }
}

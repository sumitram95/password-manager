<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UsersPasswordManangers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UsersInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

class DashBaordController extends Controller
{
    public function showDashBoardIndex()
    {
        $name = UsersInfo::where('user_id', Auth::user()->id)->first();
        $user = User::where('id', Auth::user()->id)->first();

        $roles = Role::all();

        if ($user->getRoleNames()->first() === 'Admin') {
            $urls = UsersPasswordManangers::with('userInfoes')->get();
        } else {
            $urls = UsersPasswordManangers::with('userInfoes')->where('visibility', 'Public')->orWhere('user_id', Auth::user()->id)->get();


        }

        return view('pages.dashboard', compact('name', 'urls', 'roles'));
    }
    public function urlPasswordCreate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'url' => 'required|url',
                'username' => 'required',
                'role' => 'required',
                'password' => 'required',
                'cpassword' => 'required|same:password',
                'notes' => 'required',
            ]
        );
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator)->with('error', "Something Error Please again click on the Add Url Button");

        }

        $validated = $validator->validated();

        $roleFind = Role::find($validated['role']);

        // dd($roleFind->name);

        $saveUrl = UsersPasswordManangers::create([
            'user_id' => Auth::user()->id,
            'urls' => $validated['url'],
            'username' => $validated['username'],
            'password' => Crypt::encrypt($validated['password']),
            'notes' => $validated['notes'],
            'visibility' => $roleFind->name,
        ]);
        if ($saveUrl) {
            return back()->with('success', 'SuccessFully Saved ' . $validated['url']);
        } else {
            return back()->with('error', 'UnsuccessFully Again retry ' . $validated['url']);
        }

    }
}

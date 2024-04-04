<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\UsersInfo;
use App\Models\AuthInfo;

class UserController extends Controller
{
    //........... create-user Url show
    public function index()
    {
        if (Auth::check()) {
            return back();
        }

        return view('pages.users.register');

    }

    //........... create-user post mehtod
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email',
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'password' => 'required|confirmed',
        ], [
            // 'cpassword' => "The comfirm password doesn't matche",
            'f_name' => "The first name field is required.",
            'l_name' => "The last name field is required.",
            'password' => "The password doesn't match."

        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $validated = $validator->validated();

        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        $user->userInfo()->create([
            'f_name' => $validated['f_name'],
            'l_name' => $validated['l_name'],
        ]);

        $user->assignRole('User');
        Auth::attempt(['email'=>$validated['email'], 'password'=>$validated['password']]);
        return redirect()->route('dashboard.index');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return back();
        } else {
            return redirect()->route('login.index');
        }
    }

    public function loginIndex()
    {
        if (Auth::check()) {
            return back();
        } else {
            return view('auth.login');
        }
    }

    //*********  email and password match after logged in   ***************/
    public function loginCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $validated = $validator->validated();
        $check = $request->only('email', 'password');
        // dd($validated);
        if (Auth::attempt($check)) {
            if (Auth::user()->status === "inactive") {
                Auth::logout();
                Artisan::call('cache:clear');
                return redirect()->route('login.index')->with('error', "You are not active at now");
            }
            return redirect()->route('dashboard.index');
        } else {
            return back()->with('error', 'Invalid Email or Password');
        }

    }
}

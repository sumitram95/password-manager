<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return back();
        } else {

            return view('auth.login');
        }
    }
    public function loginCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $check = $request->only('email', 'password');
        if (Auth::attempt($check)) {
            return redirect()->route('dashboard.index')->with('success', 'logged in successfully');
        } else {
            return "not login";
        }

    }
}

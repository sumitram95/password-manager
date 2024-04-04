<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UsersInfo;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function Login()
    {
        if (Auth::check()) {
            return back();
        }
        return view('auth.login');
    }


    public function Create()
    {
        return view('create');
    }
    public function CreatePost(Request $request)
    {
        //     $request->validate([
        //         'email' => 'required|email|unique:users',
        //         'fname' => 'required',
        //         'lname' => 'required',
        //         'password' => 'required',
        //         'cpassword' => 'required|same:password',
        //     ]);

        $Validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'f_name' => 'required',
            'l_name' => 'required',
            'password' => 'required',
            'cpassword' => 'required|same:password',
        ], [
            'f_name' => 'First Name is required.',
            'l_name' => 'Last Name is required.',
            'cpassword' => 'Comfirm Password is required.'
        ]);
        if ($Validator->fails()) {

            // foreach ($Validator->errors()->getMessages() as $messages) {

            //     session()->flash($messages[0]);

            // }
            return back()->withInput()->withErrors($Validator);

        }
        $validated = $Validator->validated();
        $userInfo = $Validator->safe()->only(['f_name', 'l_name']);

        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        // $this->createUserInfo(user: $user, fname: $userInfo['f_name'], lname: $userInfo['l_name']);
        $user->userInfo()->create($userInfo);
        return redirect('login')->with('success', "SuccessFully Register {$request->email}");

    }
    // private function createUserInfo(User $user, string $lname, string $fname)
    // {
    //     $user->userInfo()->create([
    //         'f_name' => $fname,
    //         'l_name' => $lname,
    //     ]);
    // }

    //-- Auth check
    public function LoginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        try {
            //code...
            $credencials = $request->only('email', 'password');
            if (Auth::attempt($credencials)) {
                return redirect('dashboard');
            } else {
                return redirect('login')->with('error', "Invalide Email And Password");
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

    }
    public function LogOut()
    {
        Auth::logout();
        \Artisan::call('cache:clear');
        return redirect()->route('login.index');
    }

}

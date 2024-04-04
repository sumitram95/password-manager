<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\UsersPasswordManangers;
use App\Models\UsersInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PasswordManagerController extends Controller
{
    public function Password()
    {
        $data['name'] = UsersInfo::where('user_id', Auth::id())->first();
        $data['urls'] = UsersPasswordManangers::where('user_id', Auth::user()->id)->get();

        return view('password', $data);
    }


    public function PasswordPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'urls' => 'required|url',
            'username' => 'required|string',
            'password' => 'required',
            'notes' => 'required',
        ]);

        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator);

        }
        $validated = $validator->validated();
        $url = UsersPasswordManangers::create([
            'user_id' => auth()->user()->id,
            'urls' => $validated['urls'],
            'username' => Crypt::encrypt($validated['username']),
            'password' => Crypt::encrypt($validated['password']),
            'notes' => $validated['notes'],
        ]);

        if ($url) {
            return back();
        }
        return back()->with('error', "Note Saved Url");


    }
    public function UrlShow($id)
    {

        $name = UsersInfo::where('user_id', auth()->user()->id)->first();
        $urls = UsersPasswordManangers::where('id', $id)->first();

        if ($urls) {
            return view('url-password-show',compact('urls', 'name'));
        }
        return redirect()->route('dashboard.index')->with('error', 'Sorry Not Found');

    }
}

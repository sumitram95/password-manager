<?php

namespace App\Http\Controllers\Backend\Password;

use App\Http\Controllers\Controller;
use App\Models\UsersInfo;
use App\Models\UsersPasswordManangers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class UrlPasswordManagerController extends Controller
{
    public function urlPasswordShow($url_id)
    {
        $name = UsersInfo::where('user_id', Auth::user()->id)->first();
        $urls = UsersPasswordManangers::where('id', $url_id)->first();
        $roles = Role::all();
        $getuserRole = Auth::user()->getRoleNames()->first();

        if ($urls) {
            return view('pages.passwords.url-password-show', compact('urls', 'name', 'roles','getuserRole'));
        } else {
            return redirect('dashboard')->with('error', "Sorry Not Found");
        }

    }
}

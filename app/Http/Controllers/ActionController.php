<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UsersPasswordManangers;

class ActionController extends Controller
{
    public function Delete($id)
    {
        // try {
        //     //code...

            if (Auth::check()) {
                $checkUserId=UsersPasswordManangers::where('id',$id)->where('user_id',auth()->user()->id)->get();
                if ($checkUserId->count()>0) {
                    UsersPasswordManangers::find($id)->delete();
                    return redirect('password');
                }else{
                    $checkUserId=UsersPasswordManangers::where('id',$id)->first();
                    return "Not Found Data Id = ".$id;
                }


            } else {
                return "Error";
            }
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }
    }

}

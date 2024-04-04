<?php

namespace App\Http\Controllers\Backend\Action;

use App\Http\Controllers\Controller;
use App\Models\UsersPasswordManangers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;


class UrlActionController extends Controller
{
    public function urlIdDelete($url_id)
    // public function delete($id)
    {
        $deleteUrlId = UsersPasswordManangers::find($url_id);
        if ($deleteUrlId) {
            $deleteUrlId->delete();
            return redirect('dashboard')->with('success', 'SucessFully Deleted ' . $deleteUrlId->urls);
        } else {

            return redirect('dashboard')->with('error', "Sorry Doesn't found this url id");
        }

    }
    public function urlUpdate(Request $request, $url_id)
    // public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'cpassword' => 'required|same:password',
            'notes' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $validated = $validator->validated();
        $roleFind = Role::find($validated['role']);

        $updateUrlId = UsersPasswordManangers::find($url_id);
        if ($updateUrlId->count() > 0) {
            # code...

            $updateUrlId->update([
                'urls' => $validated['url'],
                'username' => $validated['username'],
                'password' => Crypt::encrypt($validated['password']),
                'notes' => $validated['notes'],
                'visibility'=>$roleFind->name,
            ]);
            if ($updateUrlId) {
                return back();
            }
        }
        return redirect('dashboard')->with('error', "Sorry Doesn't found this url id");

    }
}

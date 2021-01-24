<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\profile\UpdateProfile;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function editProfile(){
        try{
            $admin = Admin::findOrFail(auth('admin')->user()->id);
            return view('dashboard.profile.edit',compact('admin'));
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك خطأ ما يرجى المحاوله مره اخرى']);
        }

    }

    public function updateProfile(UpdateProfile $request){

        try{
            $admin = Admin::findOrFail(auth('admin')->user()->id);
            if($request->filled('password')){
                $request->merge(['password' => bcrypt($request->password)]);
            }
            unset($request['id']);
            unset($request['password_confirmation']);
            $admin->update($request->all());
            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك خطأ ما يرجى المحاوله مره اخرى']);
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile(){

        $adminData = Admin::find(1);

        return view('admin.admin_profile_view',compact('adminData'));


    }


    public function adminProfileEdit(){
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit',compact('editData'));
    }


    public function adminProfileStore(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi').$file->getClientOriginalName();
            if(isset($data->profile_photo_path)){
                @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
                }
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();


        $notification = array(
            'message' => 'Admin profile updated successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/profile')->with($notification);

    }


    public function adminChangePassword(){

        return view('admin.admin_change_password');
    }


    public function updatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' =>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ]);

        $hashedPassword = Admin::find(1)->password;

        if(Hash::check($request->oldpassword,$hashedPassword)){

            
                $admin = Admin::find(1);
                $admin->password = Hash::make($request->password);
                $admin->save();
                Auth::logout();

                return redirect()->route('admin.logout');
                
        }else{

            return redirect()->back();
        }
    }
}

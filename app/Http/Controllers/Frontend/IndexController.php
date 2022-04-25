<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        

    	return view('frontend.index',compact('categories','sliders','products'));
    }


    public function userLogout(){
        Auth::logout();

        return redirect()->route('login');
    }

    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_profile',compact('user'));

    }

    public function userProfileStore(Request $request){

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi').$file->getClientOriginalName();
            if(isset($data->profile_photo_path)){ // do not remove if statement else when is no picture there it will crash
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            }
            $file->move(public_path('upload/user_images/'),$filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();


        $notification = array(
            'message' => 'User profile updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);


    }



    public function userChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password',compact('user'));
    }


    
    public function updatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' =>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ]);
        
        $id = Auth::user()->id;

        $hashedPassword = User::find($id)->password;

        if(Hash::check($request->oldpassword,$hashedPassword)){

            
                $admin = User::find($id);
                $admin->password = Hash::make($request->password);
                $admin->save();
                Auth::logout();

                return redirect()->route('user.logout');
                
        }else{

            return redirect()->back();
        }
    }

    public function productDetails($id,$slug){
		$product = Product::findOrFail($id);
        $multiImag = MultiImg::where('product_id',$id)->get();
        return view('frontend.product.product_details',compact('product','multiImag'));

	}

    public function tagWiseProduct($tag){
		$products = Product::where('status',1)->where('product_tags_en',$tag)->orWhere('product_tags_srb',$tag)->orderBy('id','DESC')->paginate(3);
		
		return view('frontend.tags.tags_view',compact('products'));

	}
}

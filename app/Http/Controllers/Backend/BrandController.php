<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;


class BrandController extends Controller
{
    public function allBrands(){
        $brands = Brand::all();

        return view('backend.brand.brand_view',compact('brands'));
    }

    public function storeBrand(Request $request){

        $request->validate([
            'brand_name_en'=>'required',
            'brand_name_srb'=>'required',
            'brand_image'=>'required',

        ]);

        $image = $request->file('brand_image');
        $name_gen= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;


        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_srb' =>$request->brand_name_srb,
            'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_srb' => strtolower(str_replace(' ','-',$request->brand_name_srb)),
            'brand_image' => $save_url,
        ]);


        $notification = array(
            'message' => 'Brand inserted successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }


    public function editBrand($id){

        $brand = Brand::find($id);

        return view('backend.brand.brand_edit',compact('brand'));


    }

    public function updateBrand(Request $request,$id){

        

        $old_img = $request->old_image;


        Brand::find($id)->update([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_srb' =>$request->brand_name_srb,
            'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_srb' => strtolower(str_replace(' ','-',$request->brand_name_srb)),
        ]);





        if($request->file('brand_image')){

            unlink($old_img);
            $image = $request->file('brand_image');
            $name_gen= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;

            Brand::find($id)->update([
                'brand_image' => $save_url,
            ]);


        }else{
            Brand::find($id)->update([
                'brand_image' => $old_img,
            ]);

        }

        $notification = array(
            'message' => 'Brand updated successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('all.brands')->with($notification);






    }



    public function deleteBrand($id){

        $brand = Brand::find($id);

        unlink($brand->brand_image);



        Brand::find($id)->delete();

        $notification = array(
            'message' => 'Brand deleted successfully',
            'alert-type' => 'info'
        );


        return redirect()->back()->with($notification);


    }
}

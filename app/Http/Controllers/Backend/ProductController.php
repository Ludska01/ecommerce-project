<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function addProduct(){
        $categories = Category::all();
        $subcats = SubCategory::all();
        $subsubcats = SubSubCategory::all();
        $brands= Brand::all();

        return view('backend.product.product_add',compact('subsubcats','brands','subcats','categories'));


    }


    public function productStore(Request $request){


        $image = $request->file('product_thumbnail');
        $name_gen= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

       $product_id = Product::insertGetId([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en'=>$request->product_name_en,
            'product_name_srb'=>$request->product_name_srb,
            'product_slug_en'=>strtolower(str_replace(' ','-',$request->product_name_en,)),
            'product_slug_srb'=>strtolower(str_replace(' ','-',$request->product_name_srb,)),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags_en'=>$request->product_tags_en,
            'product_tags_srb'=>$request->product_tags_srb,
            'product_size_en'=>$request->product_size_en,
            'product_size_srb'=>$request->product_size_srb,
            'product_color_en'=>$request->product_color_en,
            'product_color_srb'=>$request->product_color_srb,
            'selling_price' =>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_description_eng'=>$request->short_description_en,
            'short_description_srb'=>$request->short_description_srb,
            'long_description_eng'=>$request->long_description_en,
            'long_description_srb'=>$request->long_description_srb,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_deals'=>$request->special_deals,
            'special_offer'=>$request->special_offer,
            'status'=> 1,
            'created_at'=>Carbon::now(),
            'product_thumbnail'=> $save_url,

        ]);

        $images = $request->file('multi_img');

        foreach($images as $img){

            
            $make_name= hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-img/'.$name_gen);
            $upload = 'upload/products/multi-img/'.$name_gen;

            MultiImg::insert([

                'product_id'=> $product_id,
                'photo_name'=> $upload,
                'created_at'=>Carbon::now(),

            ]);
        
         }

         $notification = array(
            'message' => 'Product added successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('manage.product')->with($notification);


    }


    public function manageProduct(){

        $products = Product::all();

        return view('backend.product.product_view',compact('products'));

    }



    public function editProduct($id){

        $multiimgs = MultiImg::where('product_id',$id)->get();
        $categories = Category::all();
        $subcats = SubCategory::all();
        $subsubcats = SubSubCategory::all();
        $brands= Brand::all();
        $product = Product::find($id);



        return view('backend.product.product_edit',compact('categories','subcats','subsubcats','brands','product','multiimgs'));




    }



    public function productUpdate(Request $request,$id){

        Product::find($id)->update([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en'=>$request->product_name_en,
            'product_name_srb'=>$request->product_name_srb,
            'product_slug_en'=>strtolower(str_replace(' ','-',$request->product_name_en,)),
            'product_slug_srb'=>strtolower(str_replace(' ','-',$request->product_name_srb,)),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags_en'=>$request->product_tags_en,
            'product_tags_srb'=>$request->product_tags_srb,
            'product_size_en'=>$request->product_size_en,
            'product_size_srb'=>$request->product_size_srb,
            'product_color_en'=>$request->product_color_en,
            'product_color_srb'=>$request->product_color_srb,
            'selling_price' =>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_description_eng'=>$request->short_description_en,
            'short_description_srb'=>$request->short_description_srb,
            'long_description_eng'=>$request->long_description_en,
            'long_description_srb'=>$request->long_description_srb,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_deals'=>$request->special_deals,
            'special_offer'=>$request->special_offer,
            'status'=> 1,
            'updated_at'=>Carbon::now(),
            

        ]);


        $notification = array(
            'message' => 'Product updated successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('manage.product')->with($notification);








    }











}

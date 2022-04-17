<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function allSubCategory(){

        $subcategory = SubCategory::all();
        $categories = Category::orderBy('category_name_en','ASC')->get();

        return view('backend.category.subcategory_view',compact('subcategory','categories'));
    }

    public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
        
     }
    

    public function storeSubCategory(Request $request){

        $request->validate([
            'subcategory_name_en'=>'required',
            'subcategory_name_srb'=>'required',
            'category_id'=>'required',

        ]);


        SubCategory::insert([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_srb' =>$request->subcategory_name_srb,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_srb' => strtolower(str_replace(' ','-',$request->subcategory_name_srb)),
            'category_id' => $request->category_id,
        ]);


        $notification = array(
            'message' => 'SubCategory added successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }



    public function editSubCategory($id){

        $subcategory = SubCategory::find($id);
        $categories = Category::orderBy('category_name_en','ASC')->get();

        return view('backend.category.subcategory_edit',compact('categories','subcategory'));

    }





    public function updateSubCategory(Request $request,$id){


        SubCategory::find($id)->update([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_srb' =>$request->subcategory_name_srb,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_srb' => strtolower(str_replace(' ','-',$request->subcategory_name_srb)),
            'category_id'=>$request->category_id,
        ]);



        $notification = array(
            'message' => 'SubCategory updated successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('all.subcategory')->with($notification);



    }




    
    public function deleteSubCategory($id){

        SubCategory::find($id)->delete();

        $notification = array(
            'message' => 'SubCategory deleted successfully',
            'alert-type' => 'info'
        );


        return redirect()->back()->with($notification);


    }
}

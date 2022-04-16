<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    public function allSSubCategory(){

        $subsubcategory = SubSubCategory::all();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();

        return view('backend.category.subsubcategory_view',compact('subsubcategory','subcategories'));
    }


    public function storeSSubCategory(Request $request){

        $request->validate([
            'subsubcategory_name_en'=>'required',
            'subsubcategory_name_srb'=>'required',
            'subcategory_id'=>'required',

        ]);


        SubSubCategory::insert([
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_srb' =>$request->subsubcategory_name_srb,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_srb' => strtolower(str_replace(' ','-',$request->subsubcategory_name_srb)),
            'subcategory_id' => $request->subcategory_id,
        ]);


        $notification = array(
            'message' => 'SubSubCategory added successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }



    public function editSSubCategory($id){

        $subsubcategory = SubSubCategory::find($id);
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();

        return view('backend.category.subsubcategory_edit',compact('subcategories','subsubcategory'));

    }





    public function updateSSubCategory(Request $request,$id){


        SubSubCategory::find($id)->update([
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_srb' =>$request->subsubcategory_name_srb,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_srb' => strtolower(str_replace(' ','-',$request->subsubcategory_name_srb)),
            'subcategory_id'=>$request->subcategory_id,
        ]);



        $notification = array(
            'message' => 'SubSubCategory updated successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('all.subsubcategory')->with($notification);



    }




    
    public function deleteSSubCategory($id){

        SubSubCategory::find($id)->delete();

        $notification = array(
            'message' => 'SubSubCategory deleted successfully',
            'alert-type' => 'info'
        );


        return redirect()->back()->with($notification);


    }
}

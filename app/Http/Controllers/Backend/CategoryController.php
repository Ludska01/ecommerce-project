<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory(){
        $category = Category::all();

        return view('backend.category.category_view',compact('category'));
    }

    


    public function storeCategory(Request $request){

        $request->validate([
            'category_name_en'=>'required',
            'category_name_srb'=>'required',
            'category_icon'=>'required',

        ]);


        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_srb' =>$request->category_name_srb,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_srb' => strtolower(str_replace(' ','-',$request->category_name_srb)),
            'category_icon' => $request->category_icon,
        ]);


        $notification = array(
            'message' => 'Category added successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }



    public function editCategory($id){

        $category = Category::find($id);

        return view('backend.category.category_edit',compact('category'));

    }





    public function updateCategory(Request $request,$id){


        Category::find($id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_srb' =>$request->category_name_srb,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_srb' => strtolower(str_replace(' ','-',$request->category_name_srb)),
            'category_icon'=>$request->category_icon,
        ]);



        $notification = array(
            'message' => 'Category updated successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('all.category')->with($notification);



    }




    
    public function deleteCategory($id){

        Category::find($id)->delete();

        $notification = array(
            'message' => 'Category deleted successfully',
            'alert-type' => 'info'
        );


        return redirect()->back()->with($notification);


    }
}

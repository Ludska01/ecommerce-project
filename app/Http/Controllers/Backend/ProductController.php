<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(){
        $categories = Category::all();
        $subcats = SubCategory::all();
        $subsubcats = SubSubCategory::all();
        $brands= Brand::all();

        return view('backend.product.product_add',compact('subsubcats','brands','subcats','categories'));


    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function allBrands(){
        $brands = Brand::all();

        return view('backend.brand.brand_view',compact('brands'));
    }

    public function storeBrand(Request $request){

        

    }
}

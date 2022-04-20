<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function serbian(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','serbian');
        return redirect()->back();
    }
 
  public function english(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    }
}

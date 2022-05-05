<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function districtGetAjax($division_id){

    	$ship = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        
    	return json_encode($ship);

    } // end method 


     public function stateGetAjax($district_id){

    	$ship = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
    	return json_encode($ship);

    } // end method 

    public function checkoutStore(Request $request){

        $data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['post_code'] = $request->post_code;
    	$data['division_id'] = $request->division_id;
    	$data['district_id'] = $request->district_id;
    	$data['state_id'] = $request->state_id;
    	$data['notes'] = $request->notes;

        $cartTotal = Cart::total();
    	
        return view('frontend.payment.stripe',compact('data','cartTotal'));
    	

    }// end mehtod. 

}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Wishlist;

use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $id){

    	$product = Product::find($id);

    	if ($product->discount_price == NULL) {
    		Cart::add([
    			'id' => $id, 
    			'name' => $request->product_name, 
    			'qty' => $request->quantity, 
    			'price' => $product->selling_price,
    			'weight' => 1, 
    			'options' => [
    				'image' => $product->product_thumbnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);

    		return response()->json(['success' => 'Successfully Added on Your Cart']);

    	}else{

    		Cart::add([
    			'id' => $id, 
    			'name' => $request->product_name, 
    			'qty' => $request->quantity, 
    			'price' => $product->discount_price,
    			'weight' => 1, 
    			'options' => [
    				'image' => $product->product_thumbnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);
    		return response()->json(['success' => 'Successfully Added on Your Cart']);
    	}

    } // end mehtod 


    public function addMiniCart(){

    	$carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();

		if (Session::has('coupon')){



			return response()->json(array(
				'carts' => $carts,
				'cartQty' => $cartQty,
				'cartTotal' => session()->get('coupon')['total_amount'],

			));


		}else{
			return response()->json(array(
				'carts' => $carts,
				'cartQty' => $cartQty,
				'cartTotal' =>round($cartTotal,1),

			));
		}
    } // end

    /// remove mini cart 
    public function removeMiniCart($rowId){
    	Cart::remove($rowId);
    	return response()->json(['success' => 'Product Removed from Cart']);

    } // end mehtod 

    
    public function addToWishlist(Request $request, $product_id){

        if (Auth::check()) {

            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                'user_id' => Auth::id(), 
                'product_id' => $product_id, 
                'created_at' => Carbon::now(), 
            ]);
           return response()->json(['success' => 'Successfully Added On Your Wishlist']);

            }else{

            return response()->json(['error' => 'This Product is Already on Your Wishlist']);

            }       

        }else{

            return response()->json(['error' => 'You must Login First']);

        }


    }



	public function couponApply(Request $request){

		$coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();


		if($coupon){
			 
			$discount = Cart::total() * $coupon->coupon_discount / 100;
			$total_amount = Cart::total() - $discount;
			
			Session::put('coupon',[
				'coupon_name' => $coupon->coupon_name,
				'coupon_discount' => $coupon->coupon_discount,
				'discount_amount' => round($discount),
				'total_amount' => round($total_amount)
			]);


			return response()->json(['success'=>'Ok coupon']);
		}else{
			return response()->json(['error'=>'Invalid coupon']);
		}

    }


	public function couponCalculation(){

        if (Session::has('coupon')) {


            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));

			
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));

        }
    } // end method 

	public function couponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Removed Successfully']);
    }

}

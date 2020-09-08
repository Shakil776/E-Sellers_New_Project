<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Wishlist;
use App\Product;
use Session;

class WishlistController extends Controller
{
    // add to wishlist
    public function addWishList(Request $request){


			$product_id = $request->id;
    		
    		
			// checked user/customer is loggin or not
			if (!Session::get('customerId')) {
				return response()->json([
					'error' => 'Please login to add product in your Wishlist.'
				]);
			} else {
				$customer_id = Session::get('customerId');
				$wishlistCount = Wishlist::where(['product_id' => $product_id, 'customer_id' => $customer_id])->count();

				if ($wishlistCount > 0) {
					return response()->json([
						'error' => 'This Product is already exists in your Wishlist.'
					]);
				} else{
					$wishlist = new Wishlist();
					$wishlist->product_id = $product_id;
					$wishlist->customer_id = $customer_id;
					$wishlist->save();

					return response()->json([
						'message' => 'Successfully added in the Wishlist'
					]);
				}

			}
    }

    // show wishlist product
    public function showWishList(){

    	if (!Session::get('customerId')) {
    		return redirect()->back()->with('error', "Please login to see product in your Wishlist.");
    	}


    	$customer_wishlists = Wishlist::where('customer_id', Session::get('customerId'))->get();

    	foreach ($customer_wishlists as $key => $product) {
    		$product_details = Product::where('id', $product->product_id)->first();
    		$customer_wishlists[$key]->product_id = $product_details->id;
    		$customer_wishlists[$key]->product_name = $product_details->product_name;
    		$customer_wishlists[$key]->product_price = $product_details->product_price;
    		$customer_wishlists[$key]->product_image = $product_details->product_image;
    	}

    	return view('front-end.wishlist.show_wishlist', compact('customer_wishlists'));
    }

    // remove from wishlist
    public function removeWishList(Request $request){
    	Wishlist::find($request->wishlist_id)->delete();
    	return redirect()->back()->with('success', "Wishlist Product Remove Successfully.");
    }
}

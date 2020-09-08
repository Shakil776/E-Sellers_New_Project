<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{

    public function addToCart(Request $request) {

    	$product = Product::find($request->id);
        // echo "<pre>";print_r($product);die();

    	Cart::add([
    		'id' => $request->id,
    		'name' => $product->product_name,
    		'price' => $product->product_price,
    		'qty' => $request->qty,
    		'weight' => 0,
    		'options' => [
    			'image' => $product->product_image,
                'code' => $product->product_code,
                // 'size' => $request->size,
                // 'color' => $request->color,
    		]
    	]);

    	return redirect('cart-show')->with('success', 'Product added Successfully in your Cart.');
    }

    // direct add to cart
    public function directAddToCart(Request $request) {

        $product = Product::find($request->id);
        
        //return response($product);

        Cart::add([
            'id' => $request->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'qty' => 1,
            'weight' => 0,
            'options' => [
                'image' => $product->product_image,
                'code' => $product->product_code,
                // 'size' => $request->size,
                // 'color' => $request->color,
            ]
        ]);

        return response()->json([
            'message' => 'Successfully added in the card'
        ]);
    }

    public function showCart() {
    	$cartItems = Cart::content();
        $countCartItem = count(Cart::content());
    	return view('front-end.cart.show_cart')->with(compact('cartItems', 'countCartItem'));
    }

    public function deleteCart($id) {
    	Cart::remove($id);
    	return redirect()->back()->with('success', 'Product Removed from Cart Successfully.');
    } 

    public function updateCart(Request $request) {
    	Cart::update($request->rowId, $request->qty);
    	return redirect()->back()->with('success', 'Cart Product Quantity Updated Successfully.');
    }


}

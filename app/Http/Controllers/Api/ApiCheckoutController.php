<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shipping;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Product;

class ApiCheckoutController extends Controller
{
    // checkout
    public function checkout(Request $request){
        $order = $request->all();

        // shipping
        $shipping = new Shipping();
        $shipping->customer_id = $order['customer_id'];
        $shipping->shipping_name = $order["address"]['shipping_name'];
        $shipping->shipping_email = $order["address"]['shipping_email'];
        $shipping->shipping_mobile = $order["address"]['shipping_mobile'];
        $shipping->shipping_address = $order["address"]['shipping_address'];
        $shipping->save();
        $shipping_id = $shipping->id;

        $orderData = new Order();
        $orderData->customer_id = $order['customer_id'];
        $orderData->shipping_id = $shipping_id;
        $orderData->order_total = $order['order_total'];
        $orderData->order_status = 'New';
        $orderData->save();
        $order_id = $orderData->id;

        foreach($order['cart'] as $product){
            $orderDetails = new OrderDetail();
            $orderDetails->order_id = $order_id;
            $orderDetails->product_id = $product['product_id'];
            if($product['size']){
                $orderDetails->size = $product['size'];
            }

            if($product['color']){
                $orderDetails->color = $product['color'];
            }
            $orderDetails->quantity = $product['product_quantity'];
            $orderDetails->save();
        }

        $payment = new Payment();
        $payment->order_id = $order_id;
        $payment->payment_type = $order['payment_type'];
        $payment->payment_status = 'Pending';
        $payment->save();

        if ($orderData && $orderDetails && $payment && $shipping) {
            return response()->json([
                'status' => 1,
                'message' => 'Success.',
            ], 201);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Failed.'
            ], 201);
        }
        
    }
}

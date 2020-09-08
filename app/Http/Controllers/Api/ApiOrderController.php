<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;

class ApiOrderController extends Controller
{
    public function showHistory($u_id = null){

        $orders = Order::where('customer_id', $u_id)->get();

        if(!$orders->isEmpty()){
            return response()->json([
                'status' => 1,
                'orders' => $orders
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Sorry! You have placed no order'
            ]);
        }   
    }

    public function orderDetails($orderId){

        $order = Order::find($orderId);
        $orderDetails = OrderDetail::where('order_id',$orderId)->with('products')->get();
        $shipping_address = Shipping::find($order->shipping_id);
        $payment = Payment::where('order_id',$orderId)->first();
        
        $order_details = array('order'=>$order,'details'=>$orderDetails,'shipping'=>$shipping_address,'payment'=>$payment);

        return response()->json([
            'status' => 1,
            'order_details' => $order_details
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Shipping;
use App\Payment;
use App\OrderDetail;
use App\Product;
use DB;
use Session;

class OrderController extends Controller
{
    public function manageOrderInfo() {
    	$orders = DB::table('orders')
    				->join('users', 'orders.customer_id', '=', 'users.id')
    				->join('payments', 'orders.id', '=', 'payments.order_id')
					->select('orders.*', 'users.name', 'payments.payment_type', 'payments.payment_status')
					->orderBy('id', 'DESC')
					->get();

    	return view('admin.order.manage-order', compact('orders'));
    }

    public function viewOrderDetails($id) {
		$order = Order::findOrFail($id);
		$customer = User::find($order->customer_id);
		$shipping_address = Shipping::find($order->shipping_id);
		$payment = Payment::where('order_id', $order->id)->first();
		$orderDetails = OrderDetail::with('products')->where('order_id', $order->id)->get();

		return view('admin.order.view-order', compact('order','customer','payment','orderDetails', 'shipping_address'));
    }
    
    public function updateOrderStatus(Request $request, $id){
		$order = Order::findOrFail($id);
		$order->order_status = $request->get('order_status');
		$order->update(); 
		return redirect()->back()->with('message', 'Order Status updated successfully.');
	}

	public function updatePaymentStatus(Request $request, $id){
		$payment = Payment::findOrFail($id);
		$payment->payment_status = $request->get('payment_status');
		$payment->update(); 
		return redirect()->back()->with('message', 'Payment Status updated successfully.');
	}

    public function viewOrderInvoice($id) {
    	$order = Order::find($id);
    	$customer = User::find($order->customer_id);
		$shipping_address = Shipping::find($order->shipping_id);
    	$payment = Payment::where('order_id', $order->id)->first();
		$orderDetails = OrderDetail::with('products')->where('order_id', $order->id)->get();

    	return view('admin.order.order-invoice', compact('order','customer','shipping_address','payment','orderDetails'));
	}


	public function editOrder(Request $request, $id){
		
	}

	// order history
    public function orderHistory(){
		$orders = Order::where('customer_id', Session::get('customerId'))->orderBy('id', 'DESC')->get();

        return view('front-end.order.orders')->with(compact('orders'));
	}

	// order history
	public function viewOrderHistory($id) {
		$order = Order::findOrFail($id);
		$shippingDetails = Shipping::find($order->shipping_id);
		$payment = Payment::where('order_id', $order->id)->first();
		$orderDetails = OrderDetail::with('products')->where('order_id', $order->id)->get();
		return view('front-end.order.orders_history', compact('order', 'orderDetails', 'payment', 'shippingDetails'));
	}

}

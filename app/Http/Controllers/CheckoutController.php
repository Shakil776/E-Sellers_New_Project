<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Shipping;
use App\Order;
use App\Payment;
use App\OrderDetail;
use Mail;
use Cart;
use Session;
use Stripe;

class CheckoutController extends Controller
{
    public function index(Request $request) {

        $user_id = Session::get('customerId');
        $user = User::findOrFail($user_id);

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'name' => 'required | string | max:25',
                'email' => 'email | unique:users,email,'.$user->id,
                'mobile' => 'required | min:11',
                'address' => 'required',

                'shipping_name' => 'required | string | max:25',
                //'shipping_email' => 'email | unique:users,email,'.$user->id,
                'shipping_mobile' => 'required | min:11',
                'shipping_address' => 'required',
            ]);

            $data = $request->all();

            // return to checkout page if any field empty
            if (empty($data['name']) || empty($data['mobile']) || empty($data['address']) || empty($data['shipping_name']) || empty($data['shipping_mobile']) || empty($data['shipping_address'])) {
                return redirect()->back()->with('error', 'Please, filled all fields to checkout.');
            }

            // update users/customers table data
            $user->name = $data['name'];

            if (empty($data['email'])) {
                if(!empty($user->email)){
                    $user->email = $user->email;
                } else {
                    $user->email = '';
                }
            } else {
                $user->email = $data['email'];
            }

            $user->mobile = $data['mobile'];

            if (empty($data['state']) || empty($data['city']) || empty($data['address'])) {
                if (!empty($user->address)) {
                    $user->address = $user->address;
                }else{
                    $user->address = '';
                }
            } else {
                $user->address = str_replace(',', '-', $data['address']).', '.$data['city'].', '.$data['state'];
            }

            $user->save();

            // add new shipping address
            $shipping = new Shipping();
            $shipping->customer_id =  $user_id;
            $shipping->shipping_name = $data['shipping_name'];
            if (!empty($data['shipping_email'])) {
                $shipping->shipping_email = $data['shipping_email'];
            }else{
                $shipping->shipping_email = '';
            }
            $shipping->shipping_mobile = $data['shipping_mobile'];
            $shipping->shipping_address = str_replace(',', '-', $data['shipping_address']).', '.$data['shipping_city'].', '.$data['shipping_state'];
            $shipping->save();
            Session::put('shippingId', $shipping->id);

            return redirect()->action('CheckoutController@orderReview');
        }
    	return view('front-end.checkout.checkout_content', compact('user'));
    }

    // order review
    public function orderReview(){
        $user_id = Session::get('customerId');
        $user = User::findOrFail($user_id);
        $shippingDetails = Shipping::find(Session::get('shippingId'));
        $cartItems = Cart::content();
        return view('front-end.order.order_review_content', compact('user', 'shippingDetails', 'cartItems'));
    }

    // place order
    public function placeOrder(Request $request){

        if ($request->isMethod('post')) {
            $data = $request->all();
            $user_id = Session::get('customerId');
            // get user info
            $user = User::find($user_id);
            
            // insert data into order table
            $order = new Order();
            $order->customer_id = $user_id;
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = round($data['orderTotal']);
            $order->order_status = 'New';
            $order->save();

            // insert info into payment table
            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $data['payment_type'];
            $payment->payment_status = 'Pending';
            $payment->save();

            // insert order details into order details table
            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;

                if (!empty($cartProduct->options->size)) {
                   $orderDetail->size = $cartProduct->options->size;
                }

                if (!empty($cartProduct->options->color)) {
                   $orderDetail->color = $cartProduct->options->color;
                }

                $orderDetail->quantity = $cartProduct->qty;
                $orderDetail->save();
            }

            Session::put('orderId', $order->id);
            Session::put('orderDate', $order->created_at);
            Session::put('orderTotal', round($data['orderTotal']));

            if ($data['payment_type'] == 'CoD') {

                $orders = Order::findOrFail($order->id);
                $shippingDetails = Shipping::find($orders->shipping_id);
                $billingDetails = User::find($user_id);
                $payment = Payment::where('order_id', $orders->id)->first();
                $orderDetails = OrderDetail::with('products')->where('order_id', $orders->id)->get();

                $email = $user->email;
                $name = $user->name;
                $messageData = [
                    'email' => $email,
                    'name' => $name,
                    'order_id' => $order->id,
                    'order_date' => $order->created_at,
                    'orderDetails' => $orderDetails,
                    'billingDetails' => $billingDetails,
                    'shippingDetails' => $shippingDetails,
                ];

                Mail::send('front-end.mails.order_email', $messageData, function($message) use ($email) {
                    $message->from('esellersecommerse@gmail.com', 'E-Sellers Online Shop');
                    $message->to($email);
                    $message->subject('Order Confirmation Email');
                });

                return redirect('/thanks');
            }else{
                return redirect('/stripe');
            }
        }
    }

    // order complete thanks
    public function completeOrder(){
        $user_id = Session::get('customerId');
         // get shipping details with id
        $shippingDetails = Shipping::find(Session::get('shippingId'));
        $cartItems = Cart::content();
        return view('front-end.order.thanks', compact('cartItems', 'shippingDetails'));
    }

    // stripe
    public function stripe(Request $request){
        $user_id = Session::get('customerId');
         // get shipping details with id
        $shippingDetails = Shipping::find(Session::get('shippingId'));
        $cartItems = Cart::content();

//        if ($request->isMethod('post')){
//            \Stripe\Stripe::setApiKey ( 'sk_test_51H8UCvAC1sKkZRM7bE5iyExRetyThwZBgvBhrILoRfMZDSUlw6NKKTQyceCgDA6fNwU49mPNimugT3MbxRZrpV6900Go4f5GvJ');
//            try {
//                \Stripe\Charge::create ( array (
//                    "amount" => 300 * 100,
//                    "currency" => "usd",
//                    "source" => $request->input('stripeToken'), // obtained with Stripe.js
//                    "description" => "Test payment."
//                ));
//                Session::flash ('success-message', 'Payment done successfully !');
//                return Redirect::back ();
//            } catch ( \Exception $e ) {
//                Session::flash ('fail-message', "Error! Please Try again.");
//                return Redirect::back();
//            }
//        }

        return view('front-end.order.stripe', compact('cartItems','shippingDetails'));
    }

}

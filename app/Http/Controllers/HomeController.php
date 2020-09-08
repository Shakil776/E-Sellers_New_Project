<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;
use App\Admin;
use App\OrderDetail;
use DB;
use Session;

class HomeController extends Controller
{ 
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        // admin panel dashboard
        $totalRegCustomers = User::where('status', 1)->count();
        $totalOrders = Order::count();
        $totalProducts = Product::where('publication_status', 1)->count();
        $totalAdmins = Admin::where('status', 1)->count();
        $totalAmount = Order::where('order_status', 'Delivered')->sum('order_total');
        $totalQuantitys = DB::table('order_details')
                            ->join('orders', 'order_details.order_id', '=', 'orders.id')
                            ->where('order_status', 'Delivered')
                            ->select('order_details.quantity', 'orders.order_status')
                            ->sum('quantity');


        return view('admin.dashboard.dashboardContent', compact('totalRegCustomers', 'totalOrders', 'totalProducts', 'totalAdmins', 'totalAmount', 'totalQuantitys'));
    }
}

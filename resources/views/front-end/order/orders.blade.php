@extends('front-end.master')

@section('title', 'Orders')

@section('main-content')

        <!-- breadcrumb start -->
        <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Orders</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="wishlist-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">Order Invoice No</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Order Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ date('dmY', strtotime($order->created_at)).$order->id }}</td>
                                <td>{{ date('j F Y', strtotime($order->created_at)) }}</td>
                                <td>TK. {{ $order->order_total }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ url('order-history', ['id'=>$order->id]) }}" title="View Order Details">
										<span class="text-white">View Details</span>
                                    </a>
                                    
									<a class="btn btn-primary" href="#" title="View Order Details">
										<span class="text-white">Review</span>
									</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="row wishlist-buttons">
                <div class="col-12"><a href="{{ url('/') }}" class="btn btn-solid">continue shopping</a>
        </div>
    </section>
    <!--section end-->




@endsection


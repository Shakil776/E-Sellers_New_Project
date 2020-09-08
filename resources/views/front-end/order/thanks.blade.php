@extends('front-end.master')

@section('title', 'Complete Order')

@section('main-content')

        <!-- thank-you section start -->
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                        <h2>Thank you</h2>
                        <p>Dear <strong>@if(Session::has('customerName')){{ Session::get('customerName') }}</strong>, @endif Your Order Has been placed Successfully.</p>
                        <p>Order No : @if(Session::has('orderDate')){{ date('dmY', strtotime(Session::get('orderDate'))).Session::get('orderId')  }} @endif</p>
                        <p>Total Payable amount : @if(Session::has('orderTotal'))Tk. {{ Session::get('orderTotal') }} @endif</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->

    <!-- order-detail section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-order">
                        <h3 class="text-center">your order details</h3>


                        <div class="row product-order-detail">
                            <table class="table table-border" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th width="25%">Product Image</th>
                                        <th width="40%">Name</th>
                                        <th width="10%">Quantity</th>
                                        <th width="25%">Price</th>
                                    </tr>
                                </thead>
                                @foreach($cartItems as $cartItem)
                                <tbody class="text-center">
                                    <td><img src="{{ asset($cartItem->options->image) }}" style="width: 100px; height: 100px" alt="Product Image"></td>
                                    <td>{{ $cartItem->name }}({{ $cartItem->price }} TK.)</td>
                                    <td>{{ $cartItem->qty }}</td>
                                    <td>TK. {{ $cartItem->price * $cartItem->qty }}</td>
                                    
                                </tbody>
                                @endforeach
                            </table>
                        </div>

                        <div class="total-sec">
                            <ul>
                                <li>subtotal <span>TK. {{ $sum = Session::get('subTotal') }}</span></li>
                                <li>shipping(+) <span>TK. 0</span></li>
                                <li>vat(2%)(+) <span>TK{{ $vat = $sum * (2/100) }}</span></li>
                            </ul>
                        </div>
                        <div class="final-total">
                            <h3>total <span>TK. {{ $orderTotal = $sum + $vat }}</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row order-success-sec">
                        <div class="col-sm-6">
                            <h4>summery</h4>
                            <ul class="order-detail">
                                <li>Order No:&ensp; <strong>@if(Session::has('orderDate')){{ date('dmY', strtotime(Session::get('orderDate'))).Session::get('orderId')  }} @endif</strong></li>
                                <li>Order Date:&ensp; <strong>@if(Session::has('orderDate')){{ date('j F Y', strtotime(Session::get('orderDate'))) }} @endif</strong></li>
                                <li>Order Total:&ensp; <strong>@if(Session::has('orderTotal')) {{ Session::get('orderTotal') }} TK. @endif</strong></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h4>Shipping Address</h4>
                            <ul class="order-detail">
                                <li>@if(!empty($shippingDetails->shipping_name)) {{ $shippingDetails->shipping_name }} @endif</li>
                                <li>@if(!empty($shippingDetails->shipping_address)) {{ $shippingDetails->shipping_address }} @endif</li>
                                <li style="text-transform: lowercase;">@if(!empty($shippingDetails->shipping_email)) {{ $shippingDetails->shipping_email }} @endif</li>
                                <li>@if(!empty($shippingDetails->shipping_mobile)) {{ $shippingDetails->shipping_mobile }} @endif</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
@endsection

@php
    Cart::destroy();
    Session::forget('orderTotal');
    Session::forget('orderId');
    Session::forget('orderDate');
    Session::forget('shippingId');
@endphp



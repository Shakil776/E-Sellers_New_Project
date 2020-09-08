@extends('front-end.master')

@section('title', 'Order Details')

@section('main-content')


    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Order Details</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('orders') }}">Order</a></li>
                            <li class="breadcrumb-item active">Order Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

        <!-- section start -->
        <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">

                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12">

                              <div class="row">

                                <div class="col-lg-4 col-sm-4 col-xs-12">
                                  <div class="card">
                                    <div class="card-header">
                                       <h3 class="text-center">Order Info</h3>
                                    </div>
                                    <div class="card-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover">

                                            <tr>
                                                <th>Order Invoice No</th>
                                                <td>{{ date('dmY', strtotime($order->created_at)).$order->id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Order Total</th>
                                                <td>TK. {{ $order->order_total }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th>Order Date</th>
                                                <td>{{ date('j F Y', strtotime($order->created_at)) }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-lg-4 col-sm-4 col-xs-12">
                                  <div class="card">
                                    <div class="card-header">
                                       <h3 class="text-center">Payment Info</h3>
                                    </div>
                                    <div class="card-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover">

                                            <tr>
                                                <th>Payment Type</th>
                                                <td>{{ $payment->payment_type }}</td>
                                            </tr>
                                            <tr>
                                                <th>Payment Status</th>
                                                <td>{{ $payment->payment_status }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-4 col-sm-4 col-xs-12">
                                  <div class="card">
                                    <div class="card-header">
                                       <h3 class="text-center">Shipping Address</h3>
                                    </div>
                                    <div class="card-body">

                                        <p>
                                          <span>@if(!empty($shippingDetails->shipping_name)) {{ $shippingDetails->shipping_name }} @endif</span><br>
                                          <span>@if(!empty($shippingDetails->shipping_address)) {{ $shippingDetails->shipping_address }} @endif</span><br>
                                          <span>@if(!empty($shippingDetails->shipping_email)) {{ $shippingDetails->shipping_email }} @endif</span><br>
                                          <span>@if(!empty($shippingDetails->shipping_mobile)) {{ $shippingDetails->shipping_mobile }} @endif</span>
                                        </p>
                                        
                                    </div>
                                  </div>
                                </div>
                                
                                

                              </div>

                            </div>

                        </div>

                       

                        <div class="row">

                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">Order Details</h3>
                                </div>
                                <div class="card-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Product Name</th>
                                            <th>Product Image</th>
                                            <th>Product Price</th>
                                            <th>Product Code</th>
                                            <th>Product Quantity</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php($i=1)
                                        @foreach($orderDetails as $orderDetail)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $orderDetail->products['product_name'] }}</td>
                                                <td><img src="{{ asset($orderDetail->products['product_image']) }}" style="width: 100px; height: 100px" alt="Product Image"></td>
                                                <td>TK. {{ $orderDetail->products['product_price'] }}</td>
                                                <td> {{ $orderDetail->products['product_code'] }}</td>
                                                <td>{{ $orderDetail->quantity }}</td>
                                                <td>TK. {{ $orderDetail->products['product_price'] * $orderDetail->quantity }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                </div>
                            </div>
                        
                        </div>

                        <div class="row">

                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">Order Summary</h3>
                                </div>
                                <div class="card-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                        <tr>
                                            <td width="5%"><strong>#</strong></td>
                                            <td width="45%"><strong>Product Name</strong></td>
                                            <td width="20%"><strong>Price </strong></td>
                                            <td class="text-center" width="10%"><strong>Quantity </strong></td>
                                            <td class="text-right" width="20%"><strong>Total Price </strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @php($sum = 0)
                                        @foreach($orderDetails as $orderDetail)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $orderDetail->products['product_name'] }}</td>
                                            <td>TK. {{ $orderDetail->products['product_price'] }}</td>
                                            <td class="text-center">{{ $orderDetail->quantity }}</td>
                                            <td class="text-right">TK. {{ $total = $orderDetail->products['product_price'] * $orderDetail->quantity }}</td>
                                        </tr>
                                        @php($sum = $sum + $total)
                                        @endforeach
                                        
                                        <tr>
                                            <td class="highrow"></td>
                                            <td class="highrow"></td>
                                            <td class="highrow"></td>
                                            <td class="highrow"><strong>Sub-Total</strong></td>
                                            <td class="highrow text-right">TK. {{ $sum }}</td>
                                        </tr>
                                        <tr>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow text-center"><strong>Vat(2%)</strong></td>
                                            <td class="emptyrow text-right">TK. {{ $vat = $sum * (2/100) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow text-center"><strong>Shipping Cost</strong></td>
                                            <td class="emptyrow text-right">TK. 0</td>
                                        </tr>
                                        <tr>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow text-center"><strong>Total</strong></td>
                                            <td class="emptyrow text-right">TK. {{ $orderTotal = $sum + $vat }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                </div>
                            </div>
                        
                        </div>

                            
                    
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->


@endsection



@extends('front-end.master')

@section('title', 'Order Review')

@section('main-content')

    {{-- message --}}
     @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <strong>Success! </strong>  {{ Session::get('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
          <strong>Ooops! </strong>  {{ Session::get('error') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif

    {{-- laravel validation error show message --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif

        <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Order Review</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order-Review</li>
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
                    <form action="{{ url('/place-order') }}" method="post">
                      @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">

                              <div class="row">

                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                  <div class="card">
                                    <div class="card-header">
                                       <h3 class="text-center">Billing Address</h3>
                                    </div>
                                    <div class="card-body">
                                      <div class="text-center">
                                        <p>
                                          <span>@if(!empty($user->name)) {{ $user->name }} @endif</span><br>
                                          <span>@if(!empty($user->address)) {{ $user->address }} @endif</span><br>
                                          <span>@if(!empty($user->email)) {{ $user->email }} @endif</span><br>
                                          <span>@if(!empty($user->mobile)) {{ $user->mobile }} @endif</span>
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                  <div class="card">
                                    <div class="card-header">
                                       <h3 class="text-center">Shipping Address</h3>
                                    </div>
                                    <div class="card-body">
                                      <div class="text-center">

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

                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>Product <span>Item Total</span></div>
                                        </div>
                                        <ul class="qty">
                                          @php($sum = 0)
                                            @foreach($cartItems as $cartItem)
                                            <li>{{ $cartItem->name }} ({{ $cartItem->price}} × {{ $cartItem->qty }}) <span>TK. {{ $total = $cartItem->price * $cartItem->qty }}</span></li>

                                              <?php $sum = $sum + $total; ?>
                                            @endforeach

                                        </ul>
                                        <ul class="sub-total">
                                            <li>Subtotal <span class="count">TK. {{ $sum }}</span></li>
                                            <li>Shipping charge(+)
                                                <div class="shipping">
                                                    <div class="shopping-option">
                                                        <label for="free-shipping">TK. 0</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>VAT(2%)(+)
                                                <div class="shipping">
                                                    <div class="shopping-option">
                                                        <label for="free-shipping">TK. {{ $vat = $sum * (2/100) }}</label>
                                                    </div>

                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="total">
                                            <li>Grand Total <span class="count">TK. {{ $orderTotal = $sum + $vat }}</span></li>
                                        </ul>
                                    </div>

                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    <li>
                                                        <div class="h4">
                                                            <label for="payment-1">Select Payment Method</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment_type" id="CoD" value="CoD">
                                                            <label for="CoD"><strong>Cash On Delivery</strong></label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="radio-option paypal">
                                                            <input type="radio" name="payment_type" id="stripe" value="Stripe">
                                                            <label for="stripe"><strong>Stripe</strong></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <input type="hidden" name="orderTotal" value="{{ $orderTotal }}">
                                        <div class="text-right">
                                          <button class="btn-solid btn" onclick="return selectPaymentMethod()">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

@endsection



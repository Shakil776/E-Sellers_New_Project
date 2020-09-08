@extends('front-end.master')
<style>
    .submit-button {
        margin-top: 10px;
    }
</style>

@section('title', 'Stripe Payment')

@section('main-content')

        <!-- thank-you section start -->
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                        <h2>thank you</h2>
                        <p>Dear <strong>@if(Session::has('customerName')){{ Session::get('customerName') }}</strong>, @endif Your Order Has been placed Successfully.</p>
                        <p>Order No : @if(Session::has('orderDate')){{ date('dmY', strtotime(Session::get('orderDate'))).Session::get('orderId')  }} @endif</p>
                        <p>Total Payable amount : @if(Session::has('orderTotal'))Tk. {{ Session::get('orderTotal') }} @endif</p>




                        <button class="btn btn-solid">Pay Now</button>

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

                            <table class="table table-hover">
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
                                    <td>{{ $cartItem->name }} ({{ $cartItem->price }} TK.)</td>
                                    <td>{{ $cartItem->qty }}</td>
                                    <td>TK. {{ $total = $cartItem->price * $cartItem->qty }}</td>
                                </tbody>
                                @php $sum = 0; $sum = $sum + $total; @endphp
                                @endforeach

                            </table>

                        </div>


                        <div class="total-sec">
                            <ul>
                                <li>subtotal <span>TK. {{ $sum }}</span></li>
                                <li>shipping(+) <span>TK. 0</span></li>
                                <li>vat(2%)(+) <span>TK {{ $vat = $sum * (2/100) }}</span></li>
                            </ul>
                        </div>
                        <div class="final-total">
                            <h4>total <span  style="text-align:right;font-weight:600">TK. {{ $orderTotal = $sum + $vat }}</span></h4>
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
                            <h4>shipping address</h4>
                            <ul class="order-detail">
                                <li>@if(!empty($shippingDetails->shipping_name)) {{ $shippingDetails->shipping_name }} @endif</li>
                                <li>@if(!empty($shippingDetails->shipping_address)) {{ $shippingDetails->shipping_address }} @endif</li>
                                <li>@if(!empty($shippingDetails->shipping_email)) {{ $shippingDetails->shipping_email }} @endif</li>
                                <li>@if(!empty($shippingDetails->shipping_mobile)) {{ $shippingDetails->shipping_mobile }} @endif</li>
                            </ul>
                        </div>

                        <div class="col-md-12">
                            <div class="delivery-sec">
                                <h3>expected date of delivery</h3>
                                <h2>october 22, 2018</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->

{{--    <section>--}}
{{--        <div class="container">--}}
{{--            <div class='row'>--}}
{{--                <div class='col-md-4'></div>--}}
{{--                <div class='col-md-4'>--}}

{{--                    <form accept-charset="UTF-8" action="/stripe" class="require-validation"--}}
{{--                          data-cc-on-file="false"--}}
{{--                          data-stripe-publishable-key="pk_test_51H8UCvAC1sKkZRM7f9G4u8iHK4bRvAPA9Y9gMmuwA1uU48NrvIcUvrCPbvd1nsWHsl2ilM4Qdx3TFnj7kOFaYxPF00Kc4V1f9f"--}}
{{--                          id="payment-form" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class='form-row'>--}}
{{--                            <div class='col-xs-12 form-group required'>--}}
{{--                                <label class='control-label'>Name on Card</label> <input--}}
{{--                                    class='form-control' size='4' type='text'>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class='form-row'>--}}
{{--                            <div class='col-xs-12 form-group card required'>--}}
{{--                                <label class='control-label'>Card Number</label> <input--}}
{{--                                    autocomplete='off' class='form-control card-number' size='20'--}}
{{--                                    type='text'>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class='form-row'>--}}
{{--                            <div class='col-xs-4 form-group cvc required'>--}}
{{--                                <label class='control-label'>CVC</label> <input--}}
{{--                                    autocomplete='off' class='form-control card-cvc'--}}
{{--                                    placeholder='ex. 311' size='4' type='text'>--}}
{{--                            </div>--}}
{{--                            <div class='col-xs-4 form-group expiration required'>--}}
{{--                                <label class='control-label'>Expiration</label> <input--}}
{{--                                    class='form-control card-expiry-month' placeholder='MM' size='2'--}}
{{--                                    type='text'>--}}
{{--                            </div>--}}
{{--                            <div class='col-xs-4 form-group expiration required'>--}}
{{--                                <label class='control-label'> </label> <input--}}
{{--                                    class='form-control card-expiry-year' placeholder='YYYY'--}}
{{--                                    size='4' type='text'>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class='form-row'>--}}
{{--                            <div class='col-md-12'>--}}
{{--                                <div class='form-control total btn btn-info'>--}}
{{--                                    Total: <span class='amount'>$300</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class='form-row'>--}}
{{--                            <div class='col-md-12 form-group'>--}}
{{--                                <button class='form-control btn btn-primary submit-button'--}}
{{--                                        type='submit' style="margin-top: 10px;">Pay »</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class='form-row'>--}}
{{--                            <div class='col-md-12 error form-group hide'>--}}
{{--                                <div class='alert-danger alert'>Please correct the errors and try--}}
{{--                                    again.</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    @if ((Session::has('success-message')))--}}
{{--                        <div class="alert alert-success col-md-12">{{--}}
{{--					Session::get('success-message') }}</div>--}}
{{--                    @endif @if ((Session::has('fail-message')))--}}
{{--                        <div class="alert alert-danger col-md-12">{{--}}
{{--					Session::get('fail-message') }}</div>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                <div class='col-md-4'></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>--}}
{{--    <script>--}}
{{--            $(function() {--}}
{{--                $('form.require-validation').bind('submit', function(e) {--}}
{{--                    var $form         = $(e.target).closest('form'),--}}
{{--                        inputSelector = ['input[type=email]', 'input[type=password]',--}}
{{--                            'input[type=text]', 'input[type=file]',--}}
{{--                            'textarea'].join(', '),--}}
{{--                        $inputs       = $form.find('.required').find(inputSelector),--}}
{{--                        $errorMessage = $form.find('div.error'),--}}
{{--                        valid         = true;--}}

{{--                    $errorMessage.addClass('hide');--}}
{{--                    $('.has-error').removeClass('has-error');--}}
{{--                    $inputs.each(function(i, el) {--}}
{{--                        var $input = $(el);--}}
{{--                        if ($input.val() === '') {--}}
{{--                            $input.parent().addClass('has-error');--}}
{{--                            $errorMessage.removeClass('hide');--}}
{{--                            e.preventDefault(); // cancel on first error--}}
{{--                        }--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}

{{--            $(function() {--}}
{{--                var $form = $("#payment-form");--}}

{{--                $form.on('submit', function(e) {--}}
{{--                    if (!$form.data('cc-on-file')) {--}}
{{--                        e.preventDefault();--}}
{{--                        Stripe.setPublishableKey($form.data('stripe-publishable-key'));--}}
{{--                        Stripe.createToken({--}}
{{--                            number: $('.card-number').val(),--}}
{{--                            cvc: $('.card-cvc').val(),--}}
{{--                            exp_month: $('.card-expiry-month').val(),--}}
{{--                            exp_year: $('.card-expiry-year').val()--}}
{{--                        }, stripeResponseHandler);--}}
{{--                    }--}}
{{--                });--}}

{{--                function stripeResponseHandler(status, response) {--}}
{{--                    if (response.error) {--}}
{{--                        $('.error')--}}
{{--                            .removeClass('hide')--}}
{{--                            .find('.alert')--}}
{{--                            .text(response.error.message);--}}
{{--                    } else {--}}
{{--                        // token contains id, last4, and card type--}}
{{--                        var token = response['id'];--}}
{{--                        // insert the token into the form so it gets submitted to the server--}}
{{--                        $form.find('input[type=text]').empty();--}}
{{--                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");--}}
{{--                        $form.get(0).submit();--}}
{{--                    }--}}
{{--                }--}}
{{--            })--}}
{{--        </script>--}}
@endsection

@php
    Cart::destroy();
    Session::forget('orderTotal');
    Session::forget('orderId');
    Session::forget('orderDate');
    Session::forget('shippingId');
@endphp



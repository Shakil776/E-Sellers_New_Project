@extends('front-end.master')

@section('title', 'Shipping & Return')

@section('main-content')

     <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Shipping & Return</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Shipping & Return</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

        <!--section start-->
        <section class="login-page section-b-space static-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Shipping</h3>
                    <h5>Order with Prime FREE Same-Day Delivery</h5>
                    <p>E-seller Prime members shipping to select metro areas across the U.S. can choose to receive FREE Same-Day Delivery on a broad selection of items.</p>
                    <hr>
                    <p>Prime members can qualify by:</p>
                    <ul>
                        <li>Placing orders before the Same-Day Delivery order cutoff time. The "order within" countdown timer provides the window of time in which you must place the order to receive your delivery by the date shown. That delivery date may become unavailable within that window of time due to changes in inventory or delivery capacity before you place your order. Your confirmed delivery date will be included in your order confirmation email.
                        </li>
                        <li>Selecting Same-Day at checkout, and shipping to a residential address within an eligible ZIP Code.</li>
                    </ul>
                    <p>To find items and place orders with FREE Same-Day Delivery:</p>

                    <ul>
                        <li>Make sure your address can receive Prime FREE Same-Day. Ensure that a) you are signed into your Prime account, b) you have set a default address for your account that is selected in the navigation bar at the top left corner of each page, c) this address is residential, and d) this address is within an eligible ZIP Code for Prime FREE Same-Day delivery. You can set or update your default shipping address within the Your Account menu.
                    </li>
                    <li>Meet the $35 order minimum. Add at least $35 of Same-Day-eligible products to your Shopping Cart.</li>
                    <li>
                    Select Same-Day at checkout. Proceed to checkout. Select FREE Same-Day Delivery as your shipping option.</li>
                    <li>
                    Receive your products. The shipping discount and delivery time will be reflected in the Order Summary.</li>
                    </ul>
                    <p>Note:</p>

                    <ul>
                        <li>Same-Day Delivery is available seven days a week most days of the year, with limited availability on certain holidays and high-volume shopping days including Black Friday and Prime Day. Same-Day delivery will not be available on Thanksgiving Day, Christmas Day and New Year's Day.
                    </li>
                    <li>Please note that only residential addresses are eligible for Same-Day Delivery. Commercial addresses, P.O. Boxes, APO, FPO, and DPO addresses are not eligible.
                    </li>
                    <li>You can also order qualifying items over $35 via 1-Click on the product detail page. Just select Today Free and then click Buy now with 1-Click®.
                    </li>
                    <li>You can also purchase Same-Day Delivery if your order is under $35 or you're not a Prime member. For more information, go to Same-Day Delivery Rates.
                    </li>
                    <li>In some cases, choosing a higher quantity for an item may make it ineligible for Same-Day Delivery, because multiple units may not be available locally. In this case, the option to choose Same-Day shipping will disappear, and normal Prime shipping options will display.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

@endsection
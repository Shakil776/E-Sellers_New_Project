<?php
  use App\Http\Controllers\Controller;
  $footerBands = Controller::footerBands();
?>
<footer class="footer-light">
    <div class="light-layout">
        <div class="container">
            <section class="small-section border-section border-top-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe">
                            <div>
                                <h4>KNOW IT ALL FIRST!</h4>
                                <p>Never Miss Anything From E-commerce By Signing Up To Our Newsletter.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span id="subscriberMessage" style="display:none"></span>
                        <form action="javascript:void(0);" class="form-inline subscribe-form auth-form needs-validation" type="post">
                        @csrf
                            <div class="form-group mx-sm-3">
                                <input onfocus="enableSubsButton();" onfocusout="checkSubscriberEmail();" type="email" class="form-control" name="subscriber_email" id="subscriber_email" placeholder="Enter your Email" required="required" autocomplete="off">
                            </div>
                            <button  style="display:block" onclick="checkSubscriberEmail(); addSubscriberEmail();" type="submit" class="btn btn-solid" id="subsBtnSubmit">subscribe</button>
                            
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>about</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo"><img src="{{ asset('frontEnd')}}/images/icon/logo.png" alt=""></div>
                        <p>E-Sellers Online Shop in Bangladesh for men, women and kids. We sell various kinds of gift items, gadget accessories, electronics products and other necessary accessories. Buy your favorite products at E-Sellers Online Shop.</p>
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fas fa-rss" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col offset-xl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Band</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                @foreach($footerBands as $footerBand)
                                <li><a href="{{ asset('/band/'.$footerBand->url) }}">{{ $footerBand->manufacturer_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>why we choose</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="{{ url('shipping-return') }}">shipping & return</a></li>
                                <li><a href="{{ url('secure-shopping') }}">secure shopping</a></li>
                                <li><a href="{{ url('affiliates')}}">affiliates</a></li>
                                <li><a href="{{ url('contact-us') }}">contact Us</a></li>
                                <li><a href="{{ url('makedress')}}">Make Your Dress</a></li>
                                <li><a href="{{ url('select-service')}}">Select Service</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>store information</h4>
                        </div>
                        <div class="footer-contant">
                            <ul class="contact-list">
                                <li><i class="fa fa-map-marker"></i>Dhaka, Bangladesh
                                </li>
                                <li><i class="fa fa-phone"></i> 123-456-7898</li>
                                <li><i class="fa fa-envelope"></i> <a href="javascript:" style="text-transform:lowercase">esellersecommerse@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="footer-end text-center">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i> Copyright 2020 E-Sellers. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

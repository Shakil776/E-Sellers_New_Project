@extends('front-end.master')

@section('title', 'Contact Us')

@section('main-content')

     <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Contact</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="contact-page section-b-space">
        <div class="container">
            <div class="row section-b-space">
                <div class="col-lg-7 map">
                <div style="width: 100%;height:350px;"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=dhaka%20international%20university+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-right">
                        <ul>
                            <li>
                                <div class="contact-icon"><img src="{{ asset('frontEnd')}}/images/icon/phone.png" alt="Generic placeholder image">
                                    <h6>Contact Us</h6>
                                </div>
                                <div class="media-body">
                                    <p>+880 123-456-7898</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <h6>Address</h6>
                                </div>
                                <div class="media-body">
                                    <p>E-sellers E-commerce Company</p>
                                    <p>Dhaka Bangladesh</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-fax" aria-hidden="true"></i>
                                    <h6>Email</h6>
                                </div>
                                <div class="media-body">
                                    <p>esellersecommerse@gmail.com</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div style="display:none;" id="showContactMessage" class="text-center"><span></span></div>
                    <form class="theme-form" action="javascript:void(0);" type="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="name">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact_f_name" placeholder="Enter First name">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact_l_name" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Phone number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact_phone" placeholder="Enter Phone number">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="contact_email" placeholder="Enter Email Address">
                            </div>
                            <div class="col-md-12">
                                <label for="review">Write Your Message</label>
                                <textarea class="form-control" placeholder="Write Your Message" id="contact_message" rows="6"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button onclick="addContactDetails();" id="contactDetailsSubmitBtn" class="btn btn-solid" type="submit">Send Your Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

@endsection
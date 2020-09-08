@extends('front-end.master')

@section('title', 'Checkout')

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
                        <h2>Check-out</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Check-out</li>
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
                     <form class="theme-form" action="{{ url('checkout') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <span class="h4">Billing Address Details</span> 
                                </div>
                                <div class="row check-out">

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Name <span class="text-danger">*</span></div>
                                         <input type="text" name="name" id="billing_name" placeholder="Name" required="" autocomplete="off" @if(!empty($user->name)) value="{{ $user->name }}"@endif>
                                    </div>

                                    <!-- <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Email</div>
                                        <input type="email" name="email" id="billing_email" placeholder="Email" autocomplete="off" @if(!empty($user->email)) value="{{ $user->email }}" @endif>
                                    </div> -->

                                    
                                    <input type="hidden" name="email" id="billing_email" @if(!empty($user->email)) value="{{ $user->email }}" @endif>
                                    

                                     <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Mobile <span class="text-danger">*</span></div>
                                        <input type="text" name="mobile" id="billing_mobile" placeholder="Mobile" required="" autocomplete="off" @if(!empty($user->mobile)) value="{{ $user->mobile }}" @endif>
                                    </div>

                                    @php
                                        
                                        if (!empty($user->address)) {
                                            $details = explode(',', $user->address);
                                        }
                                    @endphp

                                    
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Region/State <span class="text-danger">*</span></div>
                                        <input type="text" name="state" id="billing_state" placeholder="Region/State" required="" autocomplete="off" @if(!empty($details[2]))value="{{ $details[2] }}" @endif>
                                    </div>

                                   

                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Town/City <span class="text-danger">*</span></div>
                                        <input type="text" name="city" id="billing_city" placeholder="Town/City" autocomplete="off" required="" @if(!empty($details[1]))value="{{ $details[1] }}" @endif>
                                    </div>

                                     <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Address <span class="text-danger">*</span></div>
                                        <textarea name="address" required="" id="billing_address" placeholder="House/Flat Address" autocomplete="off" rows="5"> @if(!empty($details[0])){{ str_replace('-', ',', $details[0]) }}@endif</textarea>
                                    </div>
                               
                                </div>
                            </div>



                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                 <div class="checkout-title">
                                    <span class="h4">Shipping Address Details</span>&ensp;<input type="checkbox" name="" id="copyBillToShip">&ensp;Same as Billing Address Details
                                </div>
                                <div class="row check-out">

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Name <span class="text-danger">*</span></div>
                                        <input type="text" name="shipping_name" placeholder="Name" id="shipping_name" required="" autocomplete="off">
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Email</div>
                                        <input type="email" name="shipping_email" placeholder="Email" autocomplete="off" id="shipping_email">
                                    </div>

                                     <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Mobile <span class="text-danger">*</span></div>
                                        <input type="text" name="shipping_mobile" placeholder="Mobile" required="" autocomplete="off" id="shipping_mobile">
                                    </div>

                                    
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Region/State <span class="text-danger">*</span></div>
                                        <input type="text" name="shipping_state" placeholder="Region/State" required="" autocomplete="off" id="shipping_state">
                                    </div>

                                   

                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Town/City <span class="text-danger">*</span></div>
                                        <input type="text" name="shipping_city" id="shipping_city" required="" autocomplete="off" placeholder="Town/City">
                                    </div>

                                     <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Address <span class="text-danger">*</span></div>
                                         <textarea class="form-control" name="shipping_address" id="shipping_address" placeholder="House/Flat Address" required="" autocomplete="off" rows="5"></textarea>
                                    </div>

                                </div>
                                

                                <div class="payment-box mt-4">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-solid">Continue</button>
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



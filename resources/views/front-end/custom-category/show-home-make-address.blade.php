@extends('front-end.master')

@section('title', 'Add Cart')

@section('main-content')

<!-- {{ session('success') }} -->

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

     <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Add Cart</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Add to Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Update your home make address</h4>

                    <div class="theme-card">
                        
                        <form class="theme-form" action="{{ url('update-home-address') }}" method="post">
                        @csrf

                            <div class="card-header mb-4">
                                <h4 class="text-center">Address</h4>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="state">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" autocomplete="off" value="{{ $homeMakeAddressDetails->name }}" >
                                    <input type="hidden" name="id" value="{{ $homeMakeAddressDetails->id }}" >
                                </div>

                               <div class="col-md-6">
                                    <label for="city">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" autocomplete="off" value="{{ $homeMakeAddressDetails->mobile }}" >
                                </div>
                                
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="state">Region/State <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="state" id="state" placeholder="Region/State" autocomplete="off" value="{{ $homeMakeAddressDetails->state }}" >
                                </div>

                               <div class="col-md-6">
                                    <label for="city">Town/City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="Town/City" autocomplete="off" value="{{ $homeMakeAddressDetails->city }}" >
                                </div>
                                
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="address">House/Flat Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" placeholder="House/Flat Address" autocomplete="off" rows="5">{{ $homeMakeAddressDetails->address }}</textarea>
                                    
                                </div>

                            </div>

                            <button type="submit" class="btn btn-solid mt-1" name="update" value="update">Update</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h4>Your Product</h4>

                    <div class="theme-card">
                        
                        <form class="theme-form" action="{{ url('add-cart') }}" method="post">
                        @csrf

                            <div>
                            @if(!empty($product))
                                Product Image: <img src="{{ asset($product->product_image) }}" width="100" height="100"> <br>
                                Product Name: {{ $product->product_name }} <br>
                                Product Price: TK. {{ $product->product_price }} <br>
                                Quantity: {{ Session::get('chooseProduct')['qty'] }} <br>
                                Total(TK): {{ $product->product_price * Session::get('chooseProduct')['qty'] }}
                            @endif
                            </div>

                            
                            <input type="hidden" name="qty" value="{{ Session::get('chooseProduct')['qty'] }}">
                            <input type="hidden" name="id" value="{{ Session::get('chooseProduct')['product_id'] }}" />
                            
                            <button type="submit" class="btn btn-solid mt-1" name="addToCart" value="add to cart">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
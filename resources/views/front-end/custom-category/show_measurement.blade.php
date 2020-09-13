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
                    <h4>Update your measurement details</h4>

                    <div class="theme-card">
                        
                        <form class="theme-form" action="{{ url('update-measurement') }}" method="post">
                        @csrf

                            <div class="card-header mb-4">
                                <h4 class="text-center">Measurement Details</h4>
                            </div>

                            <div class="row">
                                    <div class="col-sm-4 text-center">
                                        <img style="width:300px;" src="{{ asset('frontEnd')}}/images/mesuarement/kamiz.png" alt="Kamiz">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="theme-card">
                                            <div class="form-row">
                                                <div class="col-sm-12 card-header mb-4">
                                                    <h4 class="text-center">Kamiz</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="shoulder">Shoulder <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_shoulder" id="name" placeholder="Inch" required="" autocomplete="off" step="any" value="{{ $measurementDetails->kamiz_shoulder }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Neck">Neck <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_neck" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any" value="{{ $measurementDetails->kamiz_neck }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="bust">Bust/Chest <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_bust" id="name" placeholder="Inch" required="" autocomplete="off" step="any" value="{{ $measurementDetails->kamiz_bust }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Neck">Waist <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_waist" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any" value="{{ $measurementDetails->kamiz_waist }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="shoulder">Hips <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_hips" id="name" placeholder="Inch" required="" autocomplete="off" step="any" value="{{ $measurementDetails->kamiz_hips }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Neck">Length <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_length" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any" value="{{ $measurementDetails->kamiz_length }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="length">Sleeve Length <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_sleeve_length" id="name" placeholder="Sleeve" required="" autocomplete="off" step="any" value="{{ $measurementDetails->kamiz_sleeve_length }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Neck">Sleeve Around <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_sleeve_around" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any" value="{{ $measurementDetails->kamiz_sleeve_around }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Neck">Armhole <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_armhole" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any" value="{{ $measurementDetails->kamiz_armhole }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="theme-card">
                                            <div class="form-row">
                                                <div class="col-sm-12 card-header mb-4">
                                                    <h4 class="text-center">Salwar</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="belt">Salwar Belt <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="salwar_belt" id="name" placeholder="Inch" required="" autocomplete="off" step="any" value="{{ $measurementDetails->salwar_belt }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="thigh">Thigh <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="salwar_thigh" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any" value="{{ $measurementDetails->salwar_thigh }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="calf">Calf <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="salwar_calf" id="name" placeholder="Inch" required="" autocomplete="off" step="any" value="{{ $measurementDetails->salwar_calf }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="ankle hem">Ankle Hem <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="salwar_ankle_hem" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any" value="{{ $measurementDetails->salwar_ankle_hem }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Neck">length <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="salwar_length" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any" value="{{ $measurementDetails->salwar_length }}">
                                                    <span class="text-danger"> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center mesurement-image">
                                        <img src="{{ asset('frontEnd')}}/images/mesuarement/salwar.png" alt="Salwar">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="hidden" name="id" value="{{ $measurementDetails->id }}" >
                                        <button type="submit" class="btn btn-solid mt-1" name="update" value="update">Update</button>
                                    </div>
                                </div>

                            
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
@extends('front-end.master')

@section('title', 'Login')

@section('main-content')

        @if(Session::has('success'))
        <div style="text-align:center;padding:5px;backgroud-color:green">
           <p style="color:black;font-size:18px;">{{ Session::get('success') }}</p> 
        </div>
        @endif

        @if(Session::has('errors'))
        <div style="text-align:center;padding:5px;backgroud-color:green">
           <p style="color:red;font-size:18px;">{{ Session::get('errors') }}</p> 
        </div>
        @endif

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
                        <h2>login</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
     <section class="register-page section-b-space tab-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="newnav nav-link active show" id="profile-top-tab" data-toggle="tab" href="#customar-login" role="tab" aria-selected="true"><b>Customer Login</b></a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="newnav nav-link" id="review-top-tab" data-toggle="tab" href="#shopper-login" role="tab" aria-selected="false"><b>Shopper Login</b></a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                     <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade active show" id="customar-login" role="tabpanel" aria-labelledby="profile-top-tab">
                            <div class="theme-card">
                                <form class="theme-form" action="{{ url('login-check') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="loginEmail" placeholder="Email" autocomplete="off">
                                        <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="review">Password</label>
                                        <input type="password" name="password" autocomplete="off" class="form-control" id="loginPassword" placeholder="Enter your password">
                                        <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ' ' }}</span>
                                    </div>
                                    <button type="submit" class="btn btn-solid">Login</button>
                                    <a href="{{ url('forgot-password') }}" class="text-right text-success" style="margin-left: 30px; color: #000;">Forgot Password?</a>
                                    <h5 class="text-center" style="text-transform:capitalize; margin-top:15px">
                                         Haven't any account? <a class="text-right text-success" href="{{ url('/register') }}">Sign Up</a>
                                    </h5>
                                </form>
                            </div>
                        </div>
                        <div  class="tab-pane fade" id="shopper-login" role="tabpanel" aria-labelledby="review-top-tab">
                            <div class="theme-card">
                                <form class="theme-form" action="{{ url('shopper-login') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="loginEmail" placeholder="Enter Shopper Email" autocomplete="off">
                                        <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="review">Password</label>
                                        <input type="password" name="password" autocomplete="off" class="form-control" id="loginPassword" placeholder="Enter Shopper password">
                                        <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ' ' }}</span>
                                    </div>
                                    <button type="submit" class="btn btn-solid">Login</button>
                                    <a href="#" class="text-right text-success" style="margin-left: 30px; color: #000;">Forgot Password?</a>
                                    <h5 class="text-center" style="text-transform:capitalize; margin-top:15px">
                                         Haven't any account? <a class="text-right text-success" href="{{ url('/register')}} #top-review">Sign Up</a>
                                    </h5>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->



@endsection



@extends('front-end.master')

@section('title', 'Login')

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
                        <h2>customer's login</h2>
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
    <section class="login-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h3>Login</h3>
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
                <!-- <div class="col-lg-6 right-login">
                    <h3>New Customer</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font">Create A Account</h6>
                        <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be
                            able to order from our shop. To start shopping click register.</p><a href="{{ url('/register') }}"
                            class="btn btn-solid">Create an Account</a>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!--Section ends-->



@endsection



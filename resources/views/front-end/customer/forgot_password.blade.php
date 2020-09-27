@extends('front-end.master')

@section('title', 'Forgot Password')

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
                        <h2>forget password</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('login') }}">login</a></li>
                            <li class="breadcrumb-item active" aria-current="page">forget password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="pwd-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h2>Forget Your Password</h2>
                    <form action="{{ url('forgot-password') }}" method="post" class="theme-form">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" required="" autocomplete="off">
                            </div><input type="submit" name="submit" class="btn btn-solid" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->



@endsection



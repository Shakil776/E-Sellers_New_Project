@extends('front-end.master')

@section('title', 'Select Service')

@section('main-content')

     <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Select Our Service</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Make Your Dress</a></li>
                            <li class="breadcrumb-item active">Select Our Service</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- select your dress -->
    <section class="login-page section-b-space">
        <div class="collection-wrapper">
            <div class="container">
            <div class="page-main-content">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3">
                            <div class="theme-card text-center">
                                <h4 style="margin-bottom:30px">Select Your Desired Service to create your design.</h4>
                                <div class="product-button">
                                    <a href="{{url('home-make-address')}}" style="color:#000;" class="btn btn-solid">Home Service</a>
                                    <span style="padding:0px 20px;">Or</span>
                                    <a href="{{ url('measurement')}}" style="color:#000;" class="btn btn-solid">Make Your Own Dress</a>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
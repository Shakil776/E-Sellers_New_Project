@extends('front-end.master')

@section('title', 'Profile')

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
                        <h2>Profile</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Update Profile</h3>
                    <div class="theme-card">
                        <div class="card-header mb-4">
                            <h4 class="text-center">Personal Details</h4>
                        </div>
                        
                        <form class="theme-form" action="{{ url('profile') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="" autocomplete="off" value="{{ $user->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="" autocomplete="off" @if(!empty($user->email)) value="{{ $user->email }}" @endif>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="mobile">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" required="" autocomplete="off" value="{{ $user->mobile }}">
                                </div>
                               
                            </div>

                            <div class="card-header mb-4">
                                <h4 class="text-center">Address</h4>
                            </div>

                            @php
                                $details = explode(',', $user->address);
                            @endphp


                            <div class="form-row">

                                <div class="col-md-6">
                                    <label for="state">Region/State</label>
                                    <input type="text" class="form-control" name="state" id="state" placeholder="Region/State" autocomplete="off" @if(!empty($details[2]))value="{{ $details[2] }}" @endif>
                                </div>

                                <div class="col-md-6">
                                    <label for="city">Town/City</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="Town/City" autocomplete="off" @if(!empty($details[1]))value="{{ $details[1] }}" @endif>
                                </div>
                                
                            </div>


                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="address">House/Flat Address</label>
                                    <textarea class="form-control" name="address" id="address" placeholder="House/Flat Address" autocomplete="off" rows="5">@if(!empty($details[0])){{ str_replace('-', ',', $details[0]) }}@endif</textarea>
                                    
                                </div>

                            </div>

                            <button type="submit" class="btn btn-solid mt-1">Update Info</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

@endsection



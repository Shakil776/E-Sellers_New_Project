@extends('front-end.master')

@section('title', 'Your Dress Details')

@section('main-content')

     <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Address Details</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home Service</a></li>
                            <li class="breadcrumb-item active">Address Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <section class="login-page section-b-space measuremnt-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="theme-card ">
                        <h4>Your Address Is Here, If Everything Is Okay Then Submit for The Next Steps Either Edit Your Address.</h4>
                        <br>
                        <br>
                        <div class="card-header mb-4">
                            <h4 class="text-center">Personal Information</h4>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4>Name:</h4>
                                <p>Mahmudul Hasan</p>
                                
                            </div>
                            <div class="col-md-6">
                                <h4>Email:</h4>
                                <p>simple@gmail.com</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4>Mobile:</h4>
                                <p>01234567897</p>
                            </div>
                        </div>
                        <div class="card-header mb-4">
                                <h4 class="text-center">Address</h4>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <h4>Region/State:</h4>
                                <p>Khilgoan</p>
                                
                            </div>
                            <div class="col-md-4">
                                <h4>Town/City:</h4>
                                <p>Dhaka</p>
                            </div>
                            <div class="col-md-4">
                                <h4>Country:</h4>
                                <p>Bangladesh</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12">
                                <h4>House/Flat Address</h4>
                                <p>House-29,  Road- 13, Newajbag , Nondipara , Bashaboo</p>
                            </div>
                        </div>
                        <br>
                        <button type="button" class="btn btn-solid mt-1">Submit</button>
                        <button type="button" class="btn btn-solid mt-1" style="margin-left:15px"><i class="fas fa-edit"></i>  Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@extends('front-end.master')

@section('title', 'Your Dress Details')

@section('main-content')

     <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Provide Your Address</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home Service</a></li>
                            <li class="breadcrumb-item active">Provide Your Address</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <section class="login-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="theme-card ">
                        <h4>Provide Your Exact Location Where You live Now</h4>
                        <br>
                        <form class="theme-form" action="#" method="post">
                            <div class="card-header mb-4">
                                <h4 class="text-center">Personal Information</h4>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="" autocomplete="off">
                                    <span class="text-danger"> </span>
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="" autocomplete="off">
                                    <span class="text-danger"> </span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="mobile">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" required="" autocomplete="off">
                                    <span class="text-danger"> </span>
                                </div>
                            </div>
                            <div class="card-header mb-4">
                                <h4 class="text-center">Address</h4>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="state">Region/State <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="state" id="state" placeholder="Region/State" autocomplete="off">
                                </div>

                               <div class="col-md-4">
                                    <label for="city">Town/City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="Town/City" autocomplete="off">
                                </div>

                                 <div class="col-md-4">
                                    <label for="country">Country <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="country" id="country" placeholder="Country" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="address">House/Flat Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" placeholder="House/Flat Address" autocomplete="off" rows="5"></textarea>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-solid mt-1">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
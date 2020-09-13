@extends('front-end.master')

@section('title', 'Your Dress Details')

@section('main-content')

     <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Measurement Details</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Make Your Dress</a></li>
                            <li class="breadcrumb-item active">Measurement Details</li>
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
                        <h4>Measurement of Your Dress Is here, If Everything Is Okay Then Submit for The Next Steps Either Edit Your Measurement.</h4>
                        <br>
                        <br>
                        <div class="card-header mb-4">
                            <h4 class="text-center">Kamiz</h4>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4>Shoulder :</h4>
                                <p>35 Inch</p>
                                
                            </div>
                            <div class="col-md-6">
                                <h4>Neck :</h4>
                                <p>23 Inch</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4>Bust/Chest :</h4>
                                <p>34 Inch</p>
                            </div>
                            <div class="col-md-6">
                                <h4>Waist :</h4>
                                <p>34 Inch</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4>Hips :</h4>
                                <p>34 Inch</p>
                            </div>
                            <div class="col-md-6">
                                <h4>Length :</h4>
                                <p>32 Inch</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4>Sleeve length :</h4>
                                <p>36 Inch</p>
                            </div>
                            <div class="col-md-6">
                                <h4>Sleeve Around :</h4>
                                <p>31 Inch</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4>ArmHole :</h4>
                                <p>14 Inch</p>
                            </div>
                        </div>
                        <div class="card-header mb-4">
                            <h4 class="text-center">Salwar</h4>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4>Salwar Belt:</h4>
                                <p>38 Inch</p>
                                
                            </div>
                            <div class="col-md-6">
                                <h4>Thigh:</h4>
                                <p>18 Inch</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4>Calf:</h4>
                                <p>17 Inch</p>
                                
                            </div>
                            <div class="col-md-6">
                                <h4>Ankle Hem:</h4>
                                <p>15 Inch</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <h4>Length:</h4>
                                <p>37 Inch</p>
                                
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
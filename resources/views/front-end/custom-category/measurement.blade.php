@extends('front-end.master')

@section('title', 'Measurement')

@section('main-content')

     <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Create Your Measurement</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Create Your Measurement</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- select your dress -->
    <section class="section-b-space">
        <div class="collection-wrapper">
            <div class="container">
            <div class="page-main-content">
                    <div class="row">
                        <div class="col-sm-12">
                        <h4 class="text-center" style="margin-bottom: 50px;">Please Provide Exact Mesuarement of Yours That help us to create your Dress Perfectly</h4>
                           <form action="{{ url('measurement') }}" method="post" class="theme-form-advanced">
                           @csrf
                                <div class="row">
                                    <div class="col-sm-4 text-center">
                                        <img style="width:300px;" src="{{ asset('frontEnd')}}/images/mesuarement/kamiz.png" alt="Kamiz">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="theme-card">
                                            <div class="form-row">
                                                <div class="col-sm-12 card-header mb-4">
                                                    <h4 class="text-center">Kameez</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="shoulder">Shoulder <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_shoulder" id="name" placeholder="Inch" required="" autocomplete="off" step="any">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Neck">Neck <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_neck" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="bust">Bust/Chest <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_bust" id="name" placeholder="Inch" required="" autocomplete="off" step="any">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Neck">Waist <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_waist" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="shoulder">Hips <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_hips" id="name" placeholder="Inch" required="" autocomplete="off" step="any">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Neck">Length <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_length" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="length">Sleeve Length <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_sleeve_length" id="name" placeholder="Sleeve" required="" autocomplete="off" step="any">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Neck">Sleeve Around <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_sleeve_around" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Neck">Armhole <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="kamiz_armhole" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any">
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
                                                    <input type="number" class="form-control" name="salwar_belt" id="name" placeholder="Inch" required="" autocomplete="off" step="any">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="thigh">Thigh <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="salwar_thigh" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="calf">Calf <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="salwar_calf" id="name" placeholder="Inch" required="" autocomplete="off" step="any">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="ankle hem">Ankle Hem <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="salwar_ankle_hem" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any">
                                                    <span class="text-danger"> </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Neck">length <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="salwar_length" id="Neck" placeholder="Inch" required="" autocomplete="off" step="any">
                                                    <span class="text-danger"> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center mesurement-image">
                                        <img src="{{ asset('frontEnd')}}/images/mesuarement/salwar.png" alt="Salwar">
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-solid mt-1">Submit</button>
                                    </div>
                                </div>
                           </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
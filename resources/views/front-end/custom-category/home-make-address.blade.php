@extends('front-end.master')

@section('title', 'Home Address')

@section('main-content')

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
                        <h2>Provide Your Address</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
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
<<<<<<< HEAD
=======
                    <h4>Provide Your Exact Location Where You live Now</h4>

                    <div class="theme-card">
                        
                        <form class="theme-form" action="{{ url('home-make-address') }}" method="post">
                        @csrf

>>>>>>> c009bf9ddb7bd750a5c8ce8070965ce136febc9c
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
<<<<<<< HEAD
=======
>>>>>>> c009bf9ddb7bd750a5c8ce8070965ce136febc9c
                                    <label for="state">Region/State <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="state" id="state" placeholder="Region/State" autocomplete="off">
                                </div>

<<<<<<< HEAD

=======
                               <div class="col-md-6">
>>>>>>> c009bf9ddb7bd750a5c8ce8070965ce136febc9c
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
<<<<<<< HEAD

=======

                            <button type="submit" class="btn btn-solid mt-1">Next</button>
>>>>>>> c009bf9ddb7bd750a5c8ce8070965ce136febc9c
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
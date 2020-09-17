@extends('front-end.master')

@section('title', 'Registration')

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
                        <h2>create account</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
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
                <div class="col-lg-12">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="newnav nav-link active show" id="profile-top-tab" data-toggle="tab" href="#top-profile" role="tab" aria-selected="true"><b>Sign Up As Customer</b></a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="newnav nav-link" id="review-top-tab" data-toggle="tab" href="#top-review" role="tab" aria-selected="false"><b>Sign Up As Shopper</b></a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade active show" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            <div class="theme-card">
                                <div class="card-header mb-4">
                                    <h4 class="text-center">Personal Information For Customer</h4>
                                </div>
                                
                                <form class="theme-form" action="{{ url('save-register') }}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required="" autocomplete="off">
                                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="" autocomplete="off">
                                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="mobile">Mobile <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" required="" autocomplete="off">
                                            <span class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : ' ' }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required="" autocomplete="off">
                                            <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ' ' }}</span>
                                        </div>
                                    
                                    </div>

                                    <div class="card-header mb-4">
                                        <h4 class="text-center">Address</h4>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="state">Region/State</label>
                                            <input type="text" class="form-control" name="state" id="state" placeholder="Region/State" autocomplete="off">
                                        </div>

                                    <div class="col-md-6">
                                            <label for="city">Town/City</label>
                                            <input type="text" class="form-control" name="city" id="city" placeholder="Town/City" autocomplete="off">
                                        </div>
                                        
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="address">House/Flat Address</label>
                                            <textarea class="form-control" name="address" id="address" placeholder="House/Flat Address" autocomplete="off" rows="5"></textarea>
                                            
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-solid mt-1">Register</button>
                                </form>
                            </div>
                        </div>
                        <div  class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                            <div class="theme-card">
                                <div class="card-header mb-4">
                                    <h4 class="text-center">Personal Information For Shopper</h4>
                                </div>
                                
                                <form class="theme-form" action="#" method="post">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="csname">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="csname" id="csname" placeholder="Full Name" required="" autocomplete="off">
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="csemail">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="csemail" id="csemail" placeholder="Email" required="" autocomplete="off">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="csmobile">Mobile Number <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="csmobile" id="csmobile" placeholder="Mobile Number" required="" autocomplete="off">
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="cspassword">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="cspassword" id="cspassword" placeholder="Password" required="" autocomplete="off">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="csusername">NID/Birthdate/Passport <small>(max 200 KB)</small><span class="text-danger">*</span></label>
                                            <input type="file" accept="image/*" class="form-control" name="category_icon" id="category_icon" >
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="csusername">User Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="csusername" id="csusername" placeholder="User Name" required="" autocomplete="off">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="card-header mb-4">
                                        <h4 class="text-center">Shopper Address</h4>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="csstate">Region/State  <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="csstate" id="state" placeholder="Region/State" autocomplete="off">
                                        </div>

                                    <div class="col-md-6">
                                            <label for="city">Town/City  <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="cscity" id="cscity" placeholder="Town/City" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="address">House/Flat Address  <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="csaddress" id="csaddress" placeholder="House/Flat Address" autocomplete="off" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-header mb-4">
                                        <h4 class="text-center">Service </h4>
                                    </div>
                                    <div class="form-row checkbox-level">
                                        <div class="col-md-12">
                                            <label for="csservice">Give A Breif About Your Service</label>
                                            <textarea class="form-control" name="csservice" id="csservice" placeholder="About Your Service" autocomplete="off" rows="5"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <br>
                                            <label for="csservice">Which Type of Service Do you Provide ?</label>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="sk"><input type="checkbox" id="sk">Salwar Kamiz</label>
                                                    <label for="kr"><input type="checkbox" id="kr">Kurta</label>
                                                    <label for="pn"><input type="checkbox" id="pn">Panzabi</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="nw"><input type="checkbox" id="nw">Night Ware</label>
                                                    <label for="le"><input type="checkbox" id="le">Lehegas</label>
                                                    <label for="gn"><input type="checkbox" id="gn">Gowns</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="bbd"><input type="checkbox" id="bbd">Block Batik Dress</label>
                                                    <label for="ab"><input type="checkbox" id="ab">Abaya & Borka</label>
                                                    <label for="am"><input type="checkbox" id="am">Ambroidery</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="csservice">What is your Experience Level ?</label>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="ex-level">
                                                        <h3>Entry Level</h3>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ducimus nemo eveniet magnam pariatur modi ipsas.</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="ex-level">
                                                        <h3>Intermediate</h3>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ducimus nemo eveniet magnam pariatur modi ipsas.</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                <div class="ex-level">
                                                        <h3>Expret</h3>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ducimus nemo eveniet magnam pariatur modi ipsa</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <button type="submit" class="btn btn-solid mt-1">Register</button>
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



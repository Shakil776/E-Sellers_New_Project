@extends('front-end.master')

@section('title', 'Dashboard')

@section('main-content')

   <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Shopper Dashboard</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shopper Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- shopkeeper dashboard content -->
    <section class="register-page section-b-space tab-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="newnav nav-link" id="my-profile" data-toggle="tab" href="#my-profile1" role="tab" aria-selected="false"><b>My Profile</b></a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="newnav nav-link" id="myshop" data-toggle="tab" href="#myshop1" role="tab" aria-selected="true"><b>My Shop</b></a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="newnav nav-link" id="productlist" data-toggle="tab" href="#productlist1" role="tab" aria-selected="true"><b>Create Product</b></a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="newnav nav-link" id="helpsupport" data-toggle="tab" href="#helpsupport" role="tab" aria-selected="true"><b>Help & Support</b></a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade" id="my-profile1" role="tabpanel" aria-labelledby="my-profile">
                            <div class="theme-card">
                                <div class="card-header mb-4">
                                    <h4 class="text-left">My Personal Information</h4>
                                </div>
                                <div class="shopkeeper-details">
                                   <div class="row">
                                        <div class="col-sm-6">
                                            <span class="shoper-name">
                                                <p><b>Full Name</b></p> 
                                                <p>Jhon Doe</p>
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="shoper-name">
                                            <p><b>Email</b></p> 
                                            <p>simple@gmail.com</p>
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="shoper-name">
                                            <p><b>User Name</b></p> 
                                            <p>Top-10</p>
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="shoper-name">
                                                <p><b>NID/Birthdate/Passport</b></p> 
                                                <p><img style="width:300px;height:200px" src="{{ url('frontEnd') }}/images/make-design/front-1.jpg" alt=""></p>
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="shoper-name">
                                            <p><b>Shop Name</b></p> 
                                            <p>Top 10</p>
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="shoper-name">
                                                <p><b>Mobile Number</b></p> 
                                                <p>013012456</p>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-header mb-4">
                                        <h4 class="text-left">My Address</h4>
                                    </div>
                                    
                                    <div class="row">
                                         <div class="col-sm-6">
                                            <span class="shoper-name">
                                                <p><b>My Address</b></p> 
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, aut nulla libero magni nesciunt, </p>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="card-header mb-4">
                                        <h4 class="text-left">My Service</h4>
                                    </div>
                                   <div class="row">
                                        <div class="col-sm-8">
                                            <span class="shoper-name">
                                                <p><b>Some Information of My Service</b></p> 
                                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque ea perferendis libero ipsa ipsam officia unde optio aliquam exercitationem sequi. Ad, inventore sunt impedit adipisci non voluptates. Earum, consectetur minima?</p>
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span class="shoper-name">
                                                <p><b>Which Type of Service I provide</b></p>
                                                <ul>
                                                    <li>Salwar Kamiz</li>
                                                    <li>Panzabi</li>
                                                    <li>Korta</li>
                                                </ul>
                                            </span>
                                        </div>  
                                        <div class="col-sm-6">
                                            <span class="shoper-name">
                                                <p><b>My Experience</b></p> 
                                                <p>
                                                    Mid Level
                                                </p>
                                            </span>
                                        </div>
                                        <br>
                                        <button class="btn btn-solid">Edit Profile</button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="myshop1" role="tabpanel" aria-labelledby="myshop">
                            <div class="theme-card">
                                <div class="card-header mb-4">
                                    <h4 class="text-left">Shop Statistics</h4>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="step-box">
                                            <div>
                                                <div class="steps">Total Income</div>
                                                <h4>TK 1200</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="step-box">
                                            <div>
                                                <div class="steps">Daily Sell</div>
                                                <h4>12</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="step-box">
                                            <div>
                                                <div class="steps">Weekly Sell</div>
                                                <h4>18</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="step-box">
                                            <div>
                                                <div class="steps">Monthly Sell</div>
                                                <h4>22</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="card-header mb-4">
                                    <h4 class="text-left">My Products</h4>
                                </div>
                                <div class="collection-product-wrapper">
                                    <div class="product-wrapper-grid addvanced-app" style="">
                                        <div class="row margin-res">
                                            <div class="col-sm-3">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                                <a href="#"><img src="{{ url('frontEnd') }}/images/make-design/front-1.jpg" class="img-fluid" alt="" style="display:block"></a>
                                                            </div>
                                                        <div class="cart-info cart-wrap">
                                                            <button title="Add to Trailers Shop">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                            <a href="javascript:void(0)" title="Hide Form The Trailers Shop">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div>

                                                        <div class="rating-block">
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <a href="#">
                                                            <h6>Salwar kamiz</h6>
                                                        </a>
                                                        <h4>TK. 123</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                                <a href="#"><img src="{{ url('frontEnd') }}/images/make-design/front-1.jpg" class="img-fluid" alt="" style="display:block"></a>
                                                            </div>
                                                        <div class="cart-info cart-wrap">
                                                            <button title="Add to Trailers Shop">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                            <a href="javascript:void(0)" title="Hide Form The Trailers Shop">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div>

                                                        <div class="rating-block">
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <a href="#">
                                                            <h6>Salwar kamiz</h6>
                                                        </a>
                                                        <h4>TK. 123</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                                <a href="#"><img src="{{ url('frontEnd') }}/images/make-design/front-1.jpg" class="img-fluid" alt="" style="display:block"></a>
                                                            </div>
                                                        <div class="cart-info cart-wrap">
                                                            <button title="Add to Trailers Shop">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                            <a href="javascript:void(0)" title="Hide Form The Trailers Shop">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div>

                                                        <div class="rating-block">
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <a href="#">
                                                            <h6>Salwar kamiz</h6>
                                                        </a>
                                                        <h4>TK. 123</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                                <a href="#"><img src="{{ url('frontEnd') }}/images/make-design/front-1.jpg" class="img-fluid" alt="" style="display:block"></a>
                                                            </div>
                                                        <div class="cart-info cart-wrap">
                                                            <button title="Add to Trailers Shop">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                            <a href="javascript:void(0)" title="Hide Form The Trailers Shop">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div>

                                                        <div class="rating-block">
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <a href="#">
                                                            <h6>Salwar kamiz</h6>
                                                        </a>
                                                        <h4>TK. 123</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                                <a href="#"><img src="{{ url('frontEnd') }}/images/make-design/front-1.jpg" class="img-fluid" alt="" style="display:block"></a>
                                                            </div>
                                                        <div class="cart-info cart-wrap">
                                                            <button title="Add to Trailers Shop">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                            <a href="javascript:void(0)" title="Hide Form The Trailers Shop">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div>

                                                        <div class="rating-block">
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <a href="#">
                                                            <h6>Salwar kamiz</h6>
                                                        </a>
                                                        <h4>TK. 123</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                            <a href="#"><img src="{{ url('frontEnd') }}/images/make-design/front-1.jpg" class="img-fluid" alt="" style="display:block"></a>
                                                        </div>
                                                        <div class="cart-info cart-wrap">
                                                            <button title="Add to Trailers Shop">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                            <a href="javascript:void(0)" title="Hide Form The Trailers Shop">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div>

                                                        <div class="rating-block">
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <a href="#">
                                                            <h6>Salwar kamiz</h6>
                                                        </a>
                                                        <h4>TK. 123</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-pagination">
                                        <div class="theme-paggination-block">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12">
                                                    <nav aria-label="Page navigation">
                                                        <ul class="pagination">
                                                            <li></li> <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="productlist1" role="tabpanel" aria-labelledby="productlist">
                            <div class="theme-card">
                                <div class="card-header mb-4">
                                    <h4 class="text-left">Create Product</h4>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="product-box">
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    <a href="#"><img src="{{ url('frontEnd') }}/images/make-design/front-1.jpg" class="img-fluid" alt="" style="display:block"></a>
                                                </div>
                                            </div>
                                            <div class="cart-info cart-wrap">
                                                <button title="Add to Trailers Shop">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <a href="javascript:void(0)" title="Hide Form The Trailers Shop">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                            <div class="product-detail">
                                                <div>
                                                    <div class="rating-block">
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                    <a href="#">
                                                        <h6>Salwar kamiz</h6>
                                                    </a>
                                                    <h4>TK. 123</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="create-product">
                                            <a href="{{ url('create-product')}}"  title="Create A Product">
                                                <p class="text-center">Create Product</p>
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="helpsupport" role="tabpanel" aria-labelledby="helpsupport">
                            <div class="theme-card">
                                <div class="card-header mb-4">
                                    <h4 class="text-center">Personal Information For Customer</h4>
                                </div>
                                
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </section>




    
@endsection
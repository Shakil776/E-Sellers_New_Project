@extends('front-end.master')

@section('title', 'Select Your Dress')

@section('main-content')

     <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Salwar Kamiz</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Make Your Dress</a></li>
                            <li class="breadcrumb-item active">Salwar Kamiz</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- select your dress -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
            <div class="page-main-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="text-center select-desing-tab">Select Your Desired Salwar Kamiz Design Form The List</h4>
                            <div class="collection-product-wrapper">
                                <div class="product-top-filter">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="product-filter-content">
                                                
                                                <div class="collection-view">
                                                    <ul>
                                                        <li><i class="fa fa-th grid-layout-view"></i></li>
                                                        <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                    </ul>
                                                </div>

                                                    <div class="collection-view">
                                                    <h4>Salwar Kamiz</h4>
                                                </div>
                                                    
                                                <div class="collection-grid-view" style="opacity: 1;">
                                                    <ul>
                                                        <li><img src="http://127.0.0.1:8000/frontEnd/images/icon/2.png" alt="" class="product-2-layout-view"></li>
                                                        <li><img src="http://127.0.0.1:8000/frontEnd/images/icon/3.png" alt="" class="product-3-layout-view"></li>
                                                        <li><img src="http://127.0.0.1:8000/frontEnd/images/icon/4.png" alt="" class="product-4-layout-view"></li>
                                                        <li><img src="http://127.0.0.1:8000/frontEnd/images/icon/6.png" alt="" class="product-6-layout-view"></li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="product-wrapper-grid" style="opacity: 1;">
                                    <div class="row margin-res">
                                        <div class="col-lg-3">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="{{ url('dress-details')}}" class="bg-size blur-up lazyloaded"><img src="{{ asset('frontEnd')}}/images/make-design/front-1.jpg" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                                                    </div>
                                                    <div class="back">
                                                        <a href="{{ url('dress-details')}}" class="bg-size blur-up lazyloaded"><img src="{{ asset('frontEnd')}}/images/make-design/back-1.jpg" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="rating-block">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                         </div>    
                                                        <a href="{{ url('dress-details')}}">
                                                            <h6>Design 1</h6>
                                                        </a>
                                                        <h4>TK. 1200</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="{{ url('dress-details')}}" class="bg-size blur-up lazyloaded"><img src="{{ asset('frontEnd')}}/images/make-design/front-2.jpg" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                                                    </div>
                                                    <div class="back">
                                                        <a href="{{ url('dress-details')}}" class="bg-size blur-up lazyloaded"><img src="{{ asset('frontEnd')}}/images/make-design/back-2.jpg" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="rating-block">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                         </div>    
                                                        <a href="{{ url('dress-details')}}">
                                                            <h6>Design 2</h6>
                                                        </a>
                                                        <h4>TK. 800</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="{{ url('dress-details')}}" class="bg-size blur-up lazyloaded"><img src="{{ asset('frontEnd')}}/images/make-design/front-3.jpg" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                                                    </div>
                                                    <div class="back">
                                                        <a href="{{ url('dress-details')}}" class="bg-size blur-up lazyloaded"><img src="{{ asset('frontEnd')}}/images/make-design/back-3.jpg" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="rating-block">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                         </div>    
                                                        <a href="{{ url('dress-details')}}">
                                                            <h6>Design 3</h6>
                                                        </a>
                                                        <h4>TK. 1000</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="{{ url('dress-details')}}#" class="bg-size blur-up lazyloaded"><img src="{{ asset('frontEnd')}}/images/make-design/front-4.jpg" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                                                    </div>
                                                    <div class="back">
                                                        <a href="{{ url('dress-details')}}" class="bg-size blur-up lazyloaded"><img src="{{ asset('frontEnd')}}/images/make-design/back-4.jpg" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                        <div class="rating-block">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                         </div>    
                                                        <a href="{{ url('dress-details')}}">
                                                            <h6>Design 4</h6>
                                                        </a>
                                                        <h4>TK. 1100</h4>
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
                                                    
                                                    </ul>
                                                </nav>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@extends('front-end.master')

@section('title', 'Shopper Product Details')

@section('main-content')

     <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Shopper Product Details</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('shopper-dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Shopper Product Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-slick">
                            <div>
                                <img src="{{ asset($productDetails->product_image) }}" alt=""
                                    class="img-fluid blur-up lazyload image_zoom_cls-0 mainImage">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav">
                                    <div>
                                        <img src="{{ asset($productDetails->product_image) }}" alt=""
                                            class="img-fluid blur-up lazyload changeImage">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2 class="mb-0">{{ $productDetails->product_name }}</h2>
                            <h5 class="mb-2">by <a href="javascript:void(0)">{{ $shopName->shop_name }}</a></h5>
                            <h4>TK. {{ $productDetails->product_price }}</h4>
                            <h3>Code. {{ $productDetails->product_code }}</h3>
                            <form>
                                
                                <div class="product-description border-product" id="custom_design_image" style="">
                                    <h6 class="product-title">Design Image for this product</h6>
                                    <div class="qty-box">
                                        <div class="row popup-gallery">

                                            @foreach($productDetails['designImages'] as $image)
                                            <div class="col-sm-3 guage-image">
                                                <a href="{{ asset($image->design_image) }}">
                                                    <img src="{{ asset($image->design_image) }}" alt="demo design"></a>  
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="border-product">
                                <h6 class="product-title">product details</h6>
                                <p>{{ $productDetails->short_description }}</p>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">share it</h6>
                                <div class="product-icon">
                                    <ul class="product-social">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tab-product m-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="profile-top-tab" data-toggle="tab" href="#top-profile" role="tab" aria-selected="true">Details</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="review-top-tab" data-toggle="tab" href="#top-review" role="tab" aria-selected="false">Review ({{ $reviews_count }})</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade active show" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            <p>{{ $productDetails->long_description }}</p>
                        </div>
                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                            <ul>
                            @foreach($reviews as $review)
                                <li class="user-ratings">
                                    <div class="user-rating-name">{{ $review->customer_name }}</div>
                                    <div class="media">
                                        <div class="media-body ml-3">
                                            <div class="rating three-star">
                                                @for ($i = 0; $i < 5; ++$i)
                                                    <i class="fa fa-star{{ $review->rating<=$i?'-o':'' }}" aria-hidden="true" style="color: red;"></i>
                                                @endfor
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="user-rating-comments">
                                        <p>{{ $review->review }}</p>
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
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
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
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
                            <div><img src="{{ asset('frontEnd')}}/images/cat3.jpg" alt=""
                                    class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                            <div><img src="{{ asset('frontEnd')}}/images/cat3.jpg" alt=""
                                    class="img-fluid blur-up lazyload image_zoom_cls-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav">
                                    <div><img src="{{ asset('frontEnd')}}/images/cat3.jpg" alt=""
                                            class="img-fluid blur-up lazyload"></div>
                                   <div><img src="{{ asset('frontEnd')}}/images/cat3.jpg" alt=""
                                            class="img-fluid blur-up lazyload"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2 class="mb-0">Women Pink Shirt</h2>
                            <h5 class="mb-2">by <a href="#">zara</a></h5>
                            <h4>TK 459.00</h4>
                            <form action="#" method="post">
                                <input type="hidden" name="_token" value="cgJGzGjLUV33Miz7MXgVVIqd6bKJAVskh3Pv5PUW">
                                <div class="product-description border-product">
                                    <h6 class="product-title">quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="fas fa-angle-left"></i></button> 
                                            </span>
                                            <input type="text" name="qty" class="form-control input-number" value="1" min="1">
                                            <input type="hidden" name="product_id" value="2">
                                            <span class="input-group-prepend">
                                                <button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="fas fa-angle-right"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <span id="cutomCategoryCheck" style="display:none">0</span>
                                
                                <div class="product-description border-product" id="custom_design_image" style="">
                                    <h6 class="product-title">Select Your Desired Design</h6>
                                    <div class="qty-box">
                                        <div class="row popup-gallery">
                                             <div class="col-sm-3 guage-image">
                                                <a href="{{ asset('frontEnd')}}/images/cat3.jpg">
                                                    <img src="{{ asset('frontEnd')}}/images/cat3.jpg" alt="demo design"></a>
                                            </div>
                                             <div class="col-sm-3 guage-image">
                                                <a href="{{ asset('frontEnd')}}/images/cat3.jpg">
                                                    <img src="{{ asset('frontEnd')}}/images/cat3.jpg" alt="demo design"></a>
                                            </div>
                                            <div class="col-sm-3 guage-image">
                                                <a href="{{ asset('frontEnd')}}/images/cat3.jpg">
                                                    <img src="{{ asset('frontEnd')}}/images/cat3.jpg" alt="demo design"></a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="border-product">
                                <h6 class="product-title">product details</h6>
                                <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore
                                    veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam
                                    voluptatem,</p>
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
                                    <form class="d-inline-block">
                                        <button class="wishlist-btn"><i class="fa fa-heart"></i><span class="title-font">Add To WishList</span></button>
                                    </form>
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
                        <li class="nav-item"><a class="nav-link" id="review-top-tab" data-toggle="tab" href="#top-review" role="tab" aria-selected="false">Review</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade active show" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            <p>sdfsdf dsfs fsdf sdfsd fsafas d</p>
                        </div>
                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                            <ul>
                                <li class="user-ratings">
                                    <div class="user-rating-name"></div>
                                    <div class="media">
                                        <div class="media-body ml-3">
                                            <div class="rating three-star">
                                                <i class="fa fa-star" aria-hidden="true" style="color: red;"></i>
                                                <i class="fa fa-star" aria-hidden="true" style="color: red;"></i>
                                                <i class="fa fa-star" aria-hidden="true" style="color: red;"></i>
                                                <i class="fa fa-star" aria-hidden="true" style="color: red;"></i>
                                                <i class="fa fa-star-o" aria-hidden="true" style="color: red;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-rating-comments">
                                        <p>Nice</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-b-space ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-12 product-related">
                    <h2>related products</h2>
                </div>
            </div>
            <div class="row search-product">
                    <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="#" class="bg-size blur-up lazyloaded "><img src="http://127.0.0.1:8000/frontEnd/images/make-design/front-2.jpg" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                            </div>
                            <div class="back">
                                <a href="#" class="bg-size blur-up lazyloaded "><img src="http://127.0.0.1:8000/frontEnd/images/make-design/back-2.jpg" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                            </div>
                        </div>

                        <div class="product-detail">
                            <div class="rating-block">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i> 
                                <i class="fas fa-star"></i> 
                                <i class="fas fa-star"></i> 
                                <i class="far fa-star"></i>      
                            </div>
                            <a href="#">
                                <h6>Design 2</h6>
                            </a>
                            <h4>TK. 140</h4>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </section>



    

@endsection
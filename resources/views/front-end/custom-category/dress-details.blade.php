@extends('front-end.master')

@section('title', 'Your Dress Details')

@section('main-content')

     <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Your Selected Dress</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Make Your Dress</a></li>
                            <li class="breadcrumb-item active">Your Selected Dress</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- product details -->
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-slick">
                            <div><img src="{{ asset('frontEnd')}}/images/make-design/front-1.jpg" alt=""
                                    class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                            <div><img src="{{ asset('frontEnd')}}/images/make-design/back-1.jpg" alt=""
                                    class="img-fluid blur-up lazyload image_zoom_cls-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav">
                                    <div><img src="{{ asset('frontEnd')}}/images/make-design/front-1.jpg" alt=""
                                            class="img-fluid blur-up lazyload"></div>
                                    <div><img src="{{ asset('frontEnd')}}/images/make-design/back-1.jpg" alt=""
                                            class="img-fluid blur-up lazyload"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2 class="mb-0">Design 1 of <b>Salwar Kamiz</b></h2>
                            <h5 class="mb-2">by <a href="#">Lorem</a></h5>
                            <h3>$32.96</h3>
                            <div class="product-description border-product">
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="fas fa-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" class="form-control input-number" value="1">
                                        <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="fas fa-angle-right"></i></button></span></div>
                                </div>
                            </div>
                            <div class="product-buttons">
                                    <a href="{{ url('select-service')}}" style="color:#000;" class="btn btn-solid">Provide Your Measurement</a>
                                    <a href="javascript:" title="Add to Wishlist" class="add_to_wishlist btn btn-info" id="1">Add to WishList</a>
                            </div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end product details -->

    <!-- product tabs -->
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
                            <p>Long Description</p>
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
    <!-- end product tabs -->

    <!-- related product --> 
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
                                <a href="#" class="bg-size blur-up lazyloaded" ><img src="{{ asset('frontEnd')}}/images/make-design/front-2.jpg" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                            </div>
                            <div class="back">
                                <a href="#" class="bg-size blur-up lazyloaded" ><img src="{{ asset('frontEnd')}}/images/make-design/back-2.jpg" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
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
    <!-- end related product -->



@endsection
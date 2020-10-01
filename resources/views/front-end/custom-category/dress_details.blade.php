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
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Your Selected Dress Details</li>
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
                                    <div>
                                        <img src="{{ asset($productDetails->back_image) }}" alt=""
                                            class="img-fluid blur-up lazyload changeImage">
                                    </div>

                                    @foreach($productAltImages as $image)
                                    <div>
                                        <img src="{{ asset($image->image) }}" alt=""
                                            class="img-fluid blur-up lazyload changeImage" style="cursor:pointer">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2 class="mb-0">{{ $productDetails->product_name }}</b></h2>
                            <h5 class="mb-2">by <a href="#">
                            @if($brandName)
                                {{ $brandName->manufacturer_name }}
                            @else
                                {{ $shopName->shop_name }}
                            @endif
                            </a></h5>
                            <h3>TK. {{ $productDetails->product_price }}</h3>
                            <h3>Code. {{ $productDetails->product_code }}</h3>

                            <form action="{{ url('select-service') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="product-description border-product">
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="fas fa-angle-left"></i></button> 
                                        </span>
                                        <input type="text" name="qty" class="form-control input-number" value="1" min="1">
                                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}" />
                                        <span class="input-group-prepend">
                                            <button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="fas fa-angle-right"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                                <span id="cutomCategoryCheck" style="display:none">{{ $productDetails->custom_category_id }}</span>
                                
                                <div class="product-description border-product" id="custom_design_image" style="display:none">
                                    <h6 class="product-title">Select Your Desired Design</h6>
                                    <div class="qty-box">
                                        <div class="row popup-gallery">

                                            @foreach($productDetails['designImages'] as $image)
                                            <div class="col-sm-3 guage-image">
                                                <a href="{{ asset($image->design_image) }}">
                                                    <img src="{{ asset($image->design_image) }}" alt="demo design"></a>
                                                <div class="select-image" data-toggle="tooltip" data-placement="right" title="Select Your Design">
                                                    <input type="checkbox" class="radio" value="{{ $image->id }}" name="design_image" />
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>


                                    
                                        
                                    <div class="col-sm-12 guage-image">
                                        <br><br><h2 class="text-center text-danger">OR</h2>
                                        <h6 class="product-title">Don't choice our design? Upload your  own design from here.</h6>
                                        <input type="file" accept="image/*" class="form-control"  name="customer_design_image" />
                                        
                                    </div>
                                            
                                        


                                </div>
                                
                               
                                

                            <div class="product-buttons">

                                <input type="submit" name="btn" style="color:#000;" value="Provide Your Measurement" class="btn btn-solid" />

                                <a href="javascript:" title="Add to Wishlist" class="add_to_wishlist btn btn-info" id="<?php echo $productDetails->id; ?>">Add to WishList</a>
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
            @foreach($relatedProducts as $relatedProduct)
                    <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="{{ asset('/product-details/'.$relatedProduct->id) }}" class="bg-size blur-up lazyloaded" ><img src="{{ asset($relatedProduct->product_image) }}" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                            </div>
                            <div class="back">
                                <a href="{{ asset('/product-details/'.$relatedProduct->id) }}" class="bg-size blur-up lazyloaded" ><img src="{{ asset($relatedProduct->back_image) }}" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                            </div>
                        </div>

                        <div class="product-detail">
                        <div class="rating-block">
                            <?php $rating = round($relatedProduct->rating); ?>

                                @for($x = 5; $x > 0; $x--)
                                    @php 
                                        if($rating > 0.5){
                                            echo '<i class="fas fa-star"></i>';
                                        }elseif($rating <= 0 ){
                                            echo '<i class="far fa-star"></i>';
                                        }else{
                                            echo '<i class="fas fa-star-half-alt"></i>';
                                        }
                                        $rating--;      
                                    @endphp
                                @endfor
                            </div>
                            <a href="{{ asset('/product-details/'.$relatedProduct->id) }}">
                                <h6>{{ $relatedProduct->product_name }}</h6>
                            </a>
                            <h4>TK. {{ $relatedProduct->product_price }}</h4>
                        </div>
                    </div>
                </div>  
            @endforeach 
            </div>
        </div>
    </section>
    <!-- end related product -->





@endsection
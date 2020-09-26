@extends('front-end.master')

@section('title', 'Filter Search Results')

@section('main-content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>search</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">search result</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- product section start -->
    <section class="section-b-space ratio_asos">
        <div class="container">
            <div class="row search-product">
            @if (count($searchProducts) > 0)
                @foreach($searchProducts as $searchProduct)
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="{{ asset('/product-details/'.$searchProduct->id) }}"><img src="{{ asset($searchProduct->product_image) }}"
                                                 class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="back">
                                <a href="{{ asset('/product-details/'.$searchProduct->id) }}"><img src="{{ asset($searchProduct->back_image) }}"
                                                 class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="cart-info cart-wrap">
                                <button data-toggle="modal" title="Add to cart">
                                    <a href="javascript:" class="direct_add_cart" id="<?php echo $searchProduct->id; ?>"><i class="fas fa-cart-arrow-down"></i></a>
                                </button>
                                <a href="javascript:" title="Add to Wishlist" class="add_to_wishlist" id="<?php echo $searchProduct->id; ?>">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="{{ asset('/product-details/'.$searchProduct->id) }}" title="Buy Now" class="quick-view">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail">

                            <div class="rating-block">
                                <?php $rating = round($searchProduct->rating); ?>

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

                            <a href="{{ asset('/product-details/'.$searchProduct->id) }}">
                                <h6>{{ $searchProduct->product_name }}</h6>
                            </a>
                            <h4>TK. {{ $searchProduct->product_price }}</h4>
{{--                            <ul class="color-variant">--}}
{{--                                <li class="bg-light0"></li>--}}
{{--                                <li class="bg-light1"></li>--}}
{{--                                <li class="bg-light2"></li>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
                </div>
                @endforeach
                
                @else
                    <h2 class="text-center">No Result Found. Try to Search Again!</h2>
                @endif
            </div>
        </div>
    </section>
    <!-- product section end -->


@endsection




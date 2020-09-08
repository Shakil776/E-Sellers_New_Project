<?php
  use App\Http\Controllers\Controller;
  $categories = Controller::mainCategories();
?>

@extends('front-end.master')

@section('title', 'Category')

@section('main-content')

   <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Band</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">bands</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        <!-- side-bar colleps block stat -->
                        <div class="collection-filter-block">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                        aria-hidden="true"></i> back</span>
                            </div>

                            {{-- categories --}}
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">Categories</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        @foreach($categories as $cat)
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <a href=" {{ asset('/product-category/'.$cat->url) }}"><label class="custom-control-label" for="zara">{{ $cat->category_name }}</label></a>
                                        </div>
                                        @endforeach 
                                    </div>
                                </div>
                            </div>


                            {{-- manufacturar --}} 
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">Band</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        @foreach($manufacturers as $manufacturer)
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <a href="{{ $manufacturer->url }}"><label class="custom-control-label" for="zara">{{ $manufacturer->manufacturer_name }}</label></a>
                                        </div>
                                        @endforeach 
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                        <!-- silde-bar colleps block end here -->
                        <!-- side-bar single product slider start -->
                        <div class="theme-card">
                            <h5 class="title-border">new product</h5>
                            <div class="offer-slider slide-1">
                                <div>
                                    @foreach($newProducts1 as $new1)
                                    <div class="media">
                                        <a href="{{ asset('/product-details/'.$new1->id) }}"><img class="img-fluid blur-up lazyload" src="{{ asset($new1->product_image) }}" alt=""></a>
                                        <div class="media-body align-self-center">
                                            <div class="rating">
                                            <?php $rating = round($new1->rating); ?>

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

                                            <a href="{{ asset('/product-details/'.$new1->id) }}">
                                                <h6>{{ $new1->product_name }}</h6>
                                            </a>
                                            <h4>TK. {{ $new1->product_price }}</h4>
                                        </div>
                                    </div>
                                   @endforeach
                                </div>
                                <div>
                                @foreach($newProducts2 as $new2)
                                    <div class="media">
                                        <a href="{{ asset('/product-details/'.$new2->id) }}"><img class="img-fluid blur-up lazyload" src="{{ asset($new2->product_image) }}" alt=""></a>
                                        <div class="media-body align-self-center">
                                            <div class="rating">
                                            <?php $rating = round($new2->rating); ?>

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

                                            <a href="{{ asset('/product-details/'.$new2->id) }}">
                                                <h6>{{ $new2->product_name }}</h6>
                                            </a>
                                            <h4>TK. {{ $new2->product_price }}</h4>
                                        </div>
                                    </div>
                                   @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- side-bar single product slider end -->
                        
                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">

                                    {{-- <div class="top-banner-wrapper">

                                        <div class="top-banner-content small-section">
                                           
                                        </div>
                                    </div> --}}

                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter"
                                                                aria-hidden="true"></i> Filter</span></div>
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
                                                            <h4>{{ $bandProdutDetails->manufacturer_name }}</h4>
                                                        </div>
                                                         
                                                        <div class="collection-grid-view">
                                                            <ul>
                                                                <li><img src="{{ asset('frontEnd')}}/images/icon/2.png" alt="" class="product-2-layout-view"></li>
                                                                <li><img src="{{ asset('frontEnd')}}/images/icon/3.png" alt="" class="product-3-layout-view"></li>
                                                                <li><img src="{{ asset('frontEnd')}}/images/icon/4.png" alt="" class="product-4-layout-view"></li>
                                                                <li><img src="{{ asset('frontEnd')}}/images/icon/6.png" alt="" class="product-6-layout-view"></li>
                                                            </ul>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res">

                                            @foreach($allBandProducts as $bandProduct)
                                                <div class="col-xl-3 col-6 col-grid-box">
                                                    <div class="product-box">

                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="{{ asset('/product-details/'.$bandProduct->id) }}"><img src="{{ asset($bandProduct->product_image) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="{{ asset('/product-details/'.$bandProduct->id) }}"><img src="{{ asset($bandProduct->back_image) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="cart-info cart-wrap">
                                                               <button data-toggle="modal" title="Add to cart">
                                                                    <!-- <i class="ti-shopping-cart"></i> -->
                                                                    <a href="javascript:" class="direct_add_cart" id="<?php echo $bandProduct->id; ?>"><i class="fas fa-cart-arrow-down"></i></a>
                                                                </button> 
                                                                <a href="javascript:" title="Add to Wishlist" class="add_to_wishlist" id="<?php echo $bandProduct->id; ?>">
                                                                    <i class="far fa-heart"></i>
                                                                </a>
                                                                <a href="{{ asset('/product-details/'.$bandProduct->id) }}" title="Buy Now" class="quick-view">
                                                                    <i class="fas fa-search"></i>
                                                                </a>

                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div>

                                                                <div class="rating-block">
                                                                   <?php $rating = round($bandProduct->rating); ?>

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

                                                                <a href="{{ asset('/product-details/'.$bandProduct->id) }}">
                                                                    <h6>{{ $bandProduct->product_name }}</h6>
                                                                </a>
                                                               {{--  <p>{{ $bandProduct->short_description }}</p> --}}
                                                                <h4>TK. {{ $bandProduct->product_price }}</h4>
                                                                {{-- <ul class="color-variant">
                                                                    <li class="bg-light0"></li>
                                                                    <li class="bg-light1"></li>
                                                                    <li class="bg-light2"></li>
                                                                </ul> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                               

                                            </div>
                                        </div>

                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <nav aria-label="Page navigation">
                                                            <ul class="pagination">
                                                            {{ $allBandProducts->links() }}
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
            </div>
        </div>
    </section>
    <!-- section End -->

@endsection
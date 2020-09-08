@extends('front-end.master')

@section('title', 'Wishlist Details')

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


        <!-- breadcrumb start -->
        <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>wishlist</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">wishlist</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="wishlist-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                @if(count($customer_wishlists) > 0)
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                        @foreach($customer_wishlists as $wishlist)
                            <tr>
                                <td>
                                    <a href="{{ asset('/product-details/'.$wishlist->product_id) }}"><img src="{{ asset($wishlist->product_image) }}" alt=""></a>
                                </td>
                                <td><a href="{{ asset('/product-details/'.$wishlist->product_id) }}">{{ $wishlist->product_name }}</a>
                                   
                                </td>
                                <td>
                                    <h2>TK. {{ $wishlist->product_price }}</h2>
                                </td>
                                <td>
                                    <form action="{{ url('remove') }}" method="post" style="display: inline-block; margin-right: 8px;">
                                        @csrf
                                        <input type="hidden" name="wishlist_id" value="{{ $wishlist->id }}">
                                        <button class="wishlist-btn-remove" title="Remove">
                                            <i class="ti-close wish-icon"></i>
                                        </button>
                                        <!-- <a href="#" class="icon mr-3"><i class="ti-close"></i></a> -->
                                    </form>
                                    <a href="javascript:" class="cart direct_add_cart" title="Add to Cart" id="<?php echo $wishlist->product_id; ?>"><i class="ti-shopping-cart"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <h3 class="text-center">You have no products in your wishlist.</h3>
                    @endif
                </div>
            </div>
            <div class="row wishlist-buttons">
                <div class="col-12"><a href="{{ url('/') }}" class="btn btn-solid">continue shopping</a>
        </div>
    </section>
    <!--section end-->




@endsection



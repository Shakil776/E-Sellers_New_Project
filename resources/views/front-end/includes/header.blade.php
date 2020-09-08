<?php
  use App\Http\Controllers\Controller;
  $mainCategories = Controller::mainCategories();
?>

    <div class="loader_skeleton">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="header-contact">
                            <ul>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: +88 01738000000</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="header-content ">
                            <form action="{{ url('/search') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <input type="text" name="search-key" id="search-key" placeholder="Search Here" class="form-control" autocomplete="off">
                                    <button type="submit" class="btn btn-solid" name="search"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-right">
                        <ul class="header-dropdown">
                            <li class="mobile-wishlist"><a href="{{ url('show') }}"><i class="fas fa-heart" aria-hidden="true"></i></a>
                            </li>
                            <li class="onhover-dropdown mobile-account">
                               <i class="fas fa-user"></i>
                                My Account
                                <ul class="onhover-show-div">
                                    @if(Session::has('customerId'))
                                        <li><a href="{{ url('profile') }}">Profile</a></li>
                                        <li><a href="{{ url('orders') }}">My Orders</a></li>
                                        <li><a href="{{ url('password') }}">Change Password</a></li>
                                        <li><a href="#" onclick="document.getElementById('customerLogoutFormID').submit();">Logout</a>
                                        </li>
                                        <form action="{{ url('customer-logout') }}" method="POST" id="customerLogoutFormID">
                                            @csrf
                                        </form>
                                    @else
                                        <li><a href="{{ url('login') }}">Login</a></li>
                                        <li><a href="{{ url('register') }}">Register</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main-menu">
                            <div class="menu-left">
                                <div class="brand-logo">
                                    <a href="{{ url('/') }}"><img src="{{ asset('frontEnd')}}/images/icon/logo.png"
                                            class="img-fluid blur-up lazyload" alt=""></a>
                                </div>
                            </div>
                            <div class="menu-right pull-right">
                                <div>
                                    <nav>
                                        <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                        <ul class="sm pixelstrap sm-horizontal">
                                            <li>
                                                <div class="mobile-back text-right">Back<i
                                                        class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                            </li>
                                            @foreach($mainCategories as $cat)
                                            <li>
                                                <a href="#">{{ $cat->category_name }}</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </nav>
                                </div>
                                <div>
                                    <div class="icon-nav d-none d-sm-block">
                                        <ul>
                                            <li class="onhover-div mobile-cart">
                                                <div><i class="fas fa-cart-arrow-down"></i></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="home-slider">
            <div class="home"></div>
        </div>
        <section class="collection-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="ldr-bg">
                            <div class="contain-banner">
                                <div>
                                    <h4></h4>
                                    <h2></h2>
                                    <h6></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ldr-bg">
                            <div class="contain-banner">
                                <div>
                                    <h4></h4>
                                    <h2></h2>
                                    <h6></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container section-b-space">
            <div class="row section-t-space">
                <div class="col-lg-6 offset-lg-3">
                    <div class="product-para">
                        <p class="first"></p>
                        <p class="second"></p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="no-slider row">
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="img-wrapper"></div>
                            <div class="product-detail">
                                <h4></h4>
                                <h5></h5>
                                <h5 class="second"></h5>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- loader end -->

    <!-- header start -->
    <header>
        <div class="mobile-fix-option"></div>
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="header-contact">
                            <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: +88 01738000000</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="header-content ">
                            <form action="{{ url('/search') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <input type="text" name="search-key" id="search-key" placeholder="Search Here" class="form-control" autocomplete="off">
                                    <button type="submit" class="btn btn-solid" name="search"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-right">
                        <ul class="header-dropdown">
                            <li class="mobile-wishlist" data-toggle="tooltip" data-placement="top" title="Wish List"><a href="{{ url('show') }}"><i class="fas fa-heart" aria-hidden="true"></i></a>
                            </li>
                            <li class="onhover-dropdown mobile-account">
                                <i class="fas fa-user"></i>
                                My Account
                                <ul class="onhover-show-div">
                                    @if(Session::has('customerId'))
                                        <li><a href="{{ url('profile') }}">Profile</a></li>
                                        <li><a href="{{ url('orders') }}">My Orders</a></li>
                                        <li><a href="{{ url('password') }}">Change Password</a></li>
                                        <li><a href="#" onclick="document.getElementById('customerLogoutFormID').submit();">Logout</a>
                                        </li>
                                        <form action="{{ url('customer-logout') }}" method="POST" id="customerLogoutFormID">
                                            @csrf
                                        </form>
                                    @else
                                        <li><a href="{{ url('login') }}">Login</a></li>
                                        <li><a href="{{ url('register') }}">Register</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="brand-logo">
                                <a href="{{ url('/') }}"><img src="{{ asset('frontEnd')}}/images/icon/logo.png"
                                        class="img-fluid blur-up lazyload" alt=""></a>
                            </div>
                        </div>
                        <div class="menu-right pull-right">
                            <div>
                                <nav id="main-nav">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2"
                                                    aria-hidden="true"></i></div>
                                        </li>
                                        @foreach($mainCategories as $cat)
                                        <li class="mega" id="hover-cls"><a href="{{ asset('/product-category/'.$cat->url) }}">{{ $cat->category_name }} </a>
                                            <ul class="mega-menu full-mega-menu">
                                                <div class="row">
                                                @foreach($cat->categories as $subcat)
                                                    <li class="col mega-box">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <a href="{{ asset('/product-category/'.$subcat->url) }}"><h5>{{ $subcat->category_name }}</h5></a>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    @foreach($subcat->subCategories as $subsubcat)
                                                                    <li><a href="{{ asset('/product-category/'.$subsubcat->url) }}">{{ $subsubcat->category_name }}</a></li>
                                                                    @endforeach

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                </div>
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                            <div>
                                <div class="icon-nav">
                                    <ul>
                                        <li >
                                            <div class="onhover-div mobile-cart">
                                                <a href="{{ url('cart-show') }}">
                                                    <i class="fas fa-cart-arrow-down"></i>
                                                    <span>{{ $cart_qty }}</span>
                                                </a>
                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

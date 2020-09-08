@extends('front-end.master')

@section('title', 'Affiliates')

@section('main-content')

     <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Affiliates</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Affiliates</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

        <!--section start-->
        <section class="login-page section-b-space static-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3> E-sellers Associates - E-sellers affiliate marketing program</h3>
                    <p>Welcome to one of the largest affiliate marketing programs in the world. The Amazon Associates Program helps content creators, publishers and bloggers monetize their traffic. With millions of products and programs available on Amazon, associates use easy link-building tools to direct their audience to their recommendations, and earn from qualifying purchases and programs.</p>

                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <span class="number-content">1</span>
                            <h4> Sign up</h4>
                            <p>Join tens of thousands of creators, publishers and bloggers who are earning with the Amazon Associates Program.</p>
                        </div>

                        <div class="col-sm-4 text-center">
                           <span class="number-content">2</span>
                            <h4>Recommend</h4>
                            <p>Share millions of products with your audience. We have customized linking tools for large publishers, individual bloggers and social media influencers.</p>
                        </div>
                        <div class="col-sm-4 text-center">
                           <span class="number-content">3</span>
                            <h4>Earn</h4>
                            <p>Earn up to 10% in affiliate fees from qualifying purchases and programs. Our competitive conversion rates help maximize earnings.</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

@endsection
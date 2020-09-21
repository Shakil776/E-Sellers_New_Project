@extends('front-end.master')

@section('title', 'Create Product')

@section('main-content')

        @if(Session::has('success'))
        <div style="text-align:center;padding:5px;backgroud-color:green">
           <p style="color:black;font-size:18px;">{{ Session::get('success') }}</p> 
        </div>
        @endif


        <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Create Product</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="register-page section-b-space tab-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-header mb-4">
                        <h4 class="text-left">Add Product Details</h4>
                    </div>
                    
                    <form class="theme-form" action="{{ route('new-product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        

                        <div class="form-row">

                            <div class="col-md-6">
                                <label for="name">Shop Name</label>
                                <input type="text" class="form-control" value="{{ $shopName->shop_name }}" readonly>
                                <input type="hidden" name="shopper_id" value="{{ $shopName->id }}">
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-6">
                                <label for="name">Product/Design Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" required="" autocomplete="off">
                                <span class="text-danger"></span>
                            </div>
                            
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="state">Product Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="product_code" id="product_code" placeholder="Product Code" autocomplete="off">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="password">Product Price <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="product_price" id="product_price" placeholder="Price" required="" autocomplete="off">
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="city">Product Short Description <span class="text-danger">*</span></label>
                                <textarea name="short_description" placeholder="Product Short Description" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="city">Product Long Description <span class="text-danger">*</span></label>
                                <textarea name="long_description" placeholder="Product Long Description" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            
                        </div>
                        <br>
                        <div class="form-row">
                            
                            <div class="col-md-6">
                                <label for="email">Product Front Image <span class="text-danger">*</span></label>
                                <input type="file" accept="image/*" name="product_image" id="images" required="">
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-6">
                                <label for="email">Product Back Image <span class="text-danger">*</span></label>
                                <input type="file" accept="image/*" name="back_image" id="images" required="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="col-md-6">
                                <label for="name">Publish The Product<span class="text-danger">*</span></label>
                                <select name="publication_status" id="" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        

                        </div>

                        <button type="submit" class="btn btn-solid mt-1">Submit</button>
                    </form>  
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->



@endsection



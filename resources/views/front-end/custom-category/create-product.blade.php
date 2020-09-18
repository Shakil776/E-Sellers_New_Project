@extends('front-end.master')

@section('title', 'Create Product')

@section('main-content')



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
                        <h4 class="text-left">Product Details</h4>
                    </div>
                    
                    <form class="theme-form" action="{{ url('save-register') }}" method="post">
                        @csrf
                        <div class="form-row">
                            
                            <div class="col-md-6">
                                <label for="email">Product Image (Upload Min 4 images of Your Product) <span class="text-danger">*</span></label>
                                <input type="file" accept="image/*" multiple="" name="images[]" id="images" required="">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="mobile">Shopper Name</label>
                                <input type="text" placeholder="Shop Name" readOnly class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="name">Product/Design Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required="" autocomplete="off">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Publish The Product<span class="text-danger">*</span></label>
                                <select name="category" id="" class="form-control">
                                    <option value="sk">Yes</option>
                                    <option value="sk">No</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="state">Product Code</label>
                                <input type="text" class="form-control" name="state" id="state" placeholder="Product Code" autocomplete="off">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="password">Product Price <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="password" id="password" placeholder="TK 123" required="" autocomplete="off">
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-12">
                                <label for="city">Product Details</label>
                                <textarea name="product Details" placeholder="lorem ipsum text" id="" cols="30" rows="10" class="form-control"></textarea>
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



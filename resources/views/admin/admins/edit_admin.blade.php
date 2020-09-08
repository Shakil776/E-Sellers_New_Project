@extends('admin.master')

@section('title')
    Edit Admin
@endsection

@section('body')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if(Session::has('success'))
                <div id="msg" class="alert alert-success left-icon-alert" role="alert">
                    <strong>Well done! &nbsp;</strong>{{ session('success') }}
                </div>
            @endif
            <div class="panel panel-default" style="margin-top: 10%;">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Edit Admin/Sub-Admin</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('edit-admin/'.$adminDetails->id) }}">
                        @csrf
                        <fieldset>

                            <div class="form-group">
                                <label for="type">Type:</label>
                                <input type="text" name="type" class="form-control" id="type" value="{{ $adminDetails->type }}" readonly=""/>
                            </div>


                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ $adminDetails->name }}" readonly="" />
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ $adminDetails->email }}" readonly="">
                            </div>
                            
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="text" name="mobile" class="form-control" id="mobile" value="{{ $adminDetails->mobile }}" readonly="" >
                                
                            </div>
                            
                            @if($adminDetails->type == "Sub Admin")
                            <div class="form-group">
                                <label>Access</label><br>
                                <input type="checkbox" @if($adminDetails->customer_access == 1) checked @endif id="customer_access"  name="customer_access" value="1"> Customer &nbsp;
                                <input type="checkbox" @if($adminDetails->categories_access == 1) checked @endif id="categories_access"  name="categories_access" value="1"> Category &nbsp;
                                <input type="checkbox" @if($adminDetails->manufacturer_access == 1) checked @endif id="manufacturer_access"  name="manufacturer_access" value="1"> Manufacturer &nbsp;
                                <input type="checkbox" @if($adminDetails->product_status_access == 1) checked @endif id="product_status_access"  name="product_status_access" value="1"> Product Status &nbsp;
                                <input type="checkbox" @if($adminDetails->product_access == 1) checked @endif id="product_access"  name="product_access" value="1"> Product
                                <input type="checkbox" @if($adminDetails->review_access == 1) checked @endif id="review_access"  name="review_access" value="1"> Review &nbsp;
                                <input type="checkbox" @if($adminDetails->order_access == 1) checked @endif id="order_access"  name="order_access" value="1"> Order &nbsp;
                                <input type="checkbox" @if($adminDetails->slider_access == 1) checked @endif id="slider_access"  name="slider_access" value="1"> Slider &nbsp;
                                <input type="checkbox" @if($adminDetails->newsletter_access == 1) checked @endif id="newsletter_access"  name="newsletter_access" value="1"> Newsletter
                            </div>
                        
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" name="btn" value="Update">
                            </div>
                            @endif
                            
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

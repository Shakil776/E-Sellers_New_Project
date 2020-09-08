@extends('admin.master')

@section('title')
    Add Admin
@endsection

@section('body')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if(Session::get('success'))
                <div id="msg" class="alert alert-success left-icon-alert" role="alert">
                    <strong>Well done! &nbsp;</strong>{{ session('success') }}
                </div>
            @endif

            @if(Session::get('error'))
                <div id="msg" class="alert alert-danger left-icon-alert" role="alert">
                    <strong>Opppps! &nbsp;</strong>{{ session('error') }}
                </div>
            @endif

            <div class="panel panel-default" style="margin-top: 10%;">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Admin/Sub-Admin Registration</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('add-admin') }}">
                        @csrf
                        <fieldset>

                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="Admin">Admin</option>
                                    <option value="Sub Admin">Sub Admin</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ old('name') }}" required />
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" value="{{ old('email') }}" required autocomplete="off">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="text" name="mobile" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" id="mobile" value="{{ old('mobile') }}" required autocomplete="off">
                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>

                            
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" >
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Confirm Password:</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div> 
                            
                            <div class="form-group" id="access">
                                <label>Access:</label><br>
                                <input type="checkbox" id="customer_access"  name="customer_access" value="1"> Customer &nbsp;
                                <input type="checkbox" id="categories_access"  name="categories_access" value="1"> Category &nbsp;
                                <input type="checkbox" id="manufacturer_access"  name="manufacturer_access" value="1"> Manufacturer &nbsp;
                                <input type="checkbox" id="product_status_access"  name="product_status_access" value="1"> Product Status &nbsp;
                                <input type="checkbox" id="product_access"  name="product_access" value="1"> Product
                                <input type="checkbox" id="review_access"  name="review_access" value="1"> Review &nbsp;
                                <input type="checkbox" id="order_access"  name="order_access" value="1"> Order &nbsp;
                                <input type="checkbox" id="slider_access"  name="slider_access" value="1"> Slider &nbsp;
                                <input type="checkbox" id="newsletter_access"  name="newsletter_access" value="1"> Newsletter
                            </div>
                        
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" name="btn" value="Register">
                            </div>
                            
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

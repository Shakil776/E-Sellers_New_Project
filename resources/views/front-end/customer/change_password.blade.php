@extends('front-end.master')

@section('title', 'Change Password')

@section('main-content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Update Password</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

        @if(Session::has('success'))
        <div style="text-align:center;padding:5px;backgroud-color:green">
           <p style="color:black;font-size:18px;">{{ Session::get('success') }}</p> 
        </div>
        @endif

        @if(Session::has('errors'))
        <div style="text-align:center;padding:5px;backgroud-color:green">
           <p style="color:red;font-size:18px;">{{ Session::get('errors') }}</p> 
        </div>
        @endif


    <!--section start-->
    <section class="login-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">

                    <h3 class="text-center">Change Password</h3>
                    <div class="theme-card">
                        <form class="theme-form" action="{{ url('pas_update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="password">Current Password</label>
                                <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter Current Password" required>
                            </div>
                            <div class="form-group">
                                <label for="new-password">New Password</label>
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="renew-password">Re-type Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Enter Confirm New Password" required>
                            </div>
                            <button type="submit" class="btn btn-solid">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->


@endsection


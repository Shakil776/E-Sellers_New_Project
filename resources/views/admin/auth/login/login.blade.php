@extends('admin.auth.master')

@section('title')
    Admin Login
@endsection

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Log In</h3>
                    @if(session()->has("message"))
                        <div class="alert alert-success">
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('admin-login') }}">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email Address" name="email" type="email" autofocus autocomplete="off" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" type="password" value="">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-block">
                                        {{ __('Login') }}
                                    </button>

                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('frontend.frontend-master')

@section('content')
<div class="sign-in-page">
    <div class="row">
        <!-- Sign-in -->
        <div class="col-md-6 col-sm-6 sign-in">
            <h4 class="">Sign in</h4>
            <p class="">Hello, Welcome to your account.</p>
            <div class="social-sign-in outer-top-xs">
                <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
            </div>
            <form class="register-form outer-top-xs" role="form" method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="info-title" for="email">Email <span>*</span></label>
                    <input type="email" name="email" class="form-control unicase-form-control text-input" id="email">
                </div>
                <div class="form-group">
                    <label class="info-title" for="password">Password <span>*</span></label>
                    <input type="password" name="password" class="form-control unicase-form-control text-input"
                        id="password">
                </div>
                <div class="radio outer-xs">
                    <label>
                        <input type="radio" name="remember" id="remember" value="remember">Remember me!
                    </label>
                    <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
                </div>
                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
            </form>
        </div>
        <!-- Sign-in -->

        <!-- create a new account -->
        <div class="col-md-6 col-sm-6 create-new-account">
            <h4 class="checkout-subtitle">Create a new account</h4>
            <p class="text title-tag-line">Create your new account.</p>
            <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label class="info-title" for="email">Email <span>*</span></label>
                    <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" value="{{ old('email') }}">
                </div>
                @error('email')
                    <p class="form-group col-md-12 mb-4 text-danger">
                        <span class="text-danger">{{ $message }}</span>
                    </p>
                @enderror
                <div class="form-group">
                    <label class="info-title" for="name">Name <span>*</span></label>
                    <input type="text" name="name" class="form-control unicase-form-control text-input" id="name" value="{{ old('name') }}">
                </div>
                @error('name')
                    <p class="form-group col-md-12 mb-4 text-danger">
                        <span class="text-danger">{{ $message }}</span>
                    </p>
                @enderror
                <div class="form-group">
                    <label class="info-title" for="phone">Phone Number <span>*</span></label>
                    <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone" value="{{ old('phone') }}">
                </div>
                @error('phone')
                    <p class="form-group col-md-12 mb-4 text-danger">
                        <span class="text-danger">{{ $message }}</span>
                    </p>
                @enderror
                <div class="form-group">
                    <label class="info-title" for="password">Password <span>*</span></label>
                    <input type="password" name="password" class="form-control unicase-form-control text-input" id="password">
                </div>
                @error('password')
                    <p class="form-group col-md-12 mb-4">
                        <span class="text-danger">{{ $message }}</span>
                    </p>
                @enderror
                <div class="form-group">
                    <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                    <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="password_confirmation">
                </div>
                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
            </form>


        </div>
        <!-- create a new account -->
    </div><!-- /.row -->
</div>
@endsection

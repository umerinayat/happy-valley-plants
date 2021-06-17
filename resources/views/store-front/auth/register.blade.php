@extends('store-front.layout.master')

@section('main-content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>My Account</h3>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li>Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--breadcrumbs area end-->
    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="offset-lg-3 offset-md-3 col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>Register</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <p>
                                <label for="email">Email <span>*</span></label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </p>
                            <p>
                                <label for="password">Password <span>*</span></label>
                                <input id="password" type="password" name="password" required autocomplete="current-password">
                            </p>
                           
                            <div class="login_submit">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                                @endif
                                <button type="submit">{{ __('Register') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!--login area start-->
            </div>
        </div>
    </div>
    <!-- customer login end -->
    
@endsection
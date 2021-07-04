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
                                <label for="firstName">First Name <span>*</span></label>
                                <input id="firstName" type="text" name="first_name" value="{{ old('first_name') }}"   />
                                @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </p>
                            <p>
                                <label for="lastName">Last Name <span>*</span></label>
                                <input id="lastName" type="text" name="last_name" value="{{ old('last_name') }}"   />
                                @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </p>
                            <p>
                                <label for="email">Email <span>*</span></label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}"  autofocus />
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </p>
                            <p>
                                <label for="password">Password <span>*</span></label>
                                <input id="password" type="password" name="password"  autocomplete="current-password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </p>
                            <p>
                                <label for="password_confirmation">Confirm Password <span>*</span></label>
                                <input id="password_confirmation" type="password" name="password_confirmation"  autocomplete="new-password">
                            </p>
                           
                            <div class="login_submit">
                                <a href="{{ route('login') }}">{{ __('Do you already have an account? Login') }}</a>
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
@extends('layouts.customer')

@section('title', 'Account')

@section('main')
    <main class="main-content">
        <!--== Start Page Title Area ==-->
        <section class="page-title-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 m-auto">
                        <div class="page-title-content text-center">
                            <h2 class="title">My Account</h2>
                            <div class="bread-crumbs"><a href="{{ route('home.index') }}"> Home </a><span
                                    class="breadcrumb-sep"> //
                                </span><span class="active"> My Account</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Title Area ==-->

        <!--== Start Login Wrapper ==-->
        <section class="login-register-area">
            <div class="container">
                <div class="row jsutify-content-center">
                    <div class="col-md-7">
                        <div class="login-register-content login-register-pl">
                            <div class="login-register-title mb-30">
                                <h2>Register</h2>
                                <p>Create new account today to reap the benefits of a personalized shopping experience. </p>
                            </div>
                            <div class="login-register-style">
                                <form action="{{ route('user.register') }}" method="POST">
                                    @csrf
                                    <div class="login-register-input">
                                        <input type="text" name="name" id="name" placeholder="Username..."
                                            class="@error('name') is-invalid @enderror rounded-0"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="login-register-input">
                                        <input type="text" name="email"
                                            class="@error('email') is-invalid @enderror rounded-0"
                                            value="{{ old('email') }}"placeholder="E-mail address">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="login-register-input">
                                        <input type="password" name="password"
                                            class="@error('password') is-invalid @enderror rounded-0"
                                            placeholder="Password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="login-register-input">
                                        <input type="password" name="password_confirmation"
                                            class="@error('password_confirmation') is-invalid @enderror rounded-0"
                                            placeholder="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="btn-style-3">
                                        <button class="btn" type="submit">Register</button>
                                    </div>
                                </form>
                                <div class="register-benefits">
                                    <h3>Sign up today and you will be able to :</h3>
                                    <p>The Loke Buyer Protection has you covered from click to delivery. Sign up <br>or sign
                                        in and you will be able to:</p>
                                    <ul>
                                        <li><i class="pe-7s-check icons"></i> Speed your way through checkout</li>
                                        <li><i class="pe-7s-check icons"></i> Track your orders easily</li>
                                        <li><i class="pe-7s-check icons"></i> Keep a record of all your purchases</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Login Wrapper ==-->
    </main>
@endsection

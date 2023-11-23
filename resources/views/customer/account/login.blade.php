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
                <div class="row justify-content-center">
                    @if (session('message'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="col-md-7">
                        <div class="login-register-content">
                            <div class="login-register-title">
                                <h2>Login</h2>
                                <p>Welcome back! Please enter your username and password to login. </p>
                            </div>
                            <div class="login-register-style login-register-pr">
                                <form action="{{ route('user.doLogin') }}" method="POST">
                                    @csrf
                                    <div class="login-register-input">
                                        <input type="text" name="email" placeholder="Email here...">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="login-register-input">
                                        <input type="password" name="password" placeholder="Password here...">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="forgot">
                                            <a href="#">Forgot?</a>
                                        </div>
                                    </div>
                                    <div class="remember-me-btn">
                                        <input type="checkbox">
                                        <label>Remember me</label>
                                    </div>
                                    <div class="btn-style-3">
                                        <button class="btn" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Login Wrapper ==-->
    </main>
@endsection

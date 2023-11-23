@extends('layouts.customer')

@section('title', 'Checkout')

@section('main')
    <main class="main-content">

        <!--== Start Cart Area Wrapper ==-->
        <section class="page-not-found-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <div class="error-content text-center">
                            <h1>We Are Sorry, Page Not Found</h1>
                            <p>Unfortunately the page you were looking for could not be found. It may be temporarily
                                unavailable, moved or no longer exist. Check the Url you entered for any mistakes and try
                                again. <a href="{{ route('home.index') }}">Back to Homepage</a> </p>
                            <div class="error-search">
                                <form action="#">
                                    <input type="text" placeholder="Search for… ">
                                    <button class="button-search"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Cart Area Wrapper ==-->
    </main>
@endsection

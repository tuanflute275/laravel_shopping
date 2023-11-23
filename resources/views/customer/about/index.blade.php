@extends('layouts.customer')

@section('title', 'About Page')

@section('main')
    <main class="main-content">
        <!--== Start Page Title Area ==-->
        <section class="page-title-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 m-auto">
                        <div class="page-title-content text-center">
                            <h2 class="title">About Us</h2>
                            <div class="bread-crumbs"><a href="{{ route('home.index') }}"> Home </a><span
                                    class="breadcrumb-sep"> //
                                </span><span class="active"> About Us</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Title Area ==-->

        <!--== Start Divider Area Wrapper ==-->
        <section class="divider-area divider-style3-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                        <div class="thumb">
                            <img src="{{ url('') }}/assets/img/divider/4.png" alt="Image">
                            <div class="shape-group">
                                <div class="shape-style1">
                                    <img src="{{ url('') }}/assets/img/divider/shape3.png" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="divider-content">
                            <h4 class="subtitle">Hello there!</h4>
                            <h2 class="title">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed dolo</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo temp incidi ut labore
                                et dolore magna aliqua. Ut enim ad minim veniam quis nostru exercitation ullamco laboris
                                nisi ut aliquip ex ea commodo consequat. Duislpl aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugial nulla pariatur. Excepteur sint occaecat.</p>
                            <a class="btn-theme" href="{{ route('contact') }}">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Divider Area Wrapper ==-->

        <!--== Start Team Area ==-->
        <section class="team-area team-default-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 m-auto">
                        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="title">Team Member</h2>
                            <div class="desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut
                                    labore et dolore magna aliqua. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-duration="1300">
                    <div class="col-md-4">
                        <div class="team-member">
                            <div class="thumb">
                                <img src="{{ url('') }}/assets/img/team/1.png" alt="Image">
                                <div class="member-icons">
                                    <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="https://dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
                                    <a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest-p"></i></a>
                                    <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <div class="member-info">
                                    <h4 class="name"><a href="#/">Alyana Thomson</a></h4>
                                    <h6 class="designation">Customer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-member mt-sm-50">
                            <div class="thumb">
                                <img src="{{ url('') }}/assets/img/team/2.png" alt="Image">
                                <div class="member-icons">
                                    <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="https://dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
                                    <a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest-p"></i></a>
                                    <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <div class="member-info">
                                    <h4 class="name"><a href="#/">Phoenix Walker</a></h4>
                                    <h6 class="designation">Customer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-member mt-sm-50">
                            <div class="thumb style-two">
                                <img src="{{ url('') }}/assets/img/team/3.png" alt="Image">
                                <div class="member-icons">
                                    <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="https://dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
                                    <a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest-p"></i></a>
                                    <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <div class="member-info">
                                    <h4 class="name"><a href="#/">Oscar Thomsen</a></h4>
                                    <h6 class="designation">Customer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Team Area ==-->

        <!--== Start Newsletter Area ==-->
        <section class="testimonial-area testimonial-default-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="title">Testimonial</h2>
                            <div class="desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut
                                    labore et dolore magna aliqua. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-duration="1300">
                    <div class="col-lg-12">
                        <div class="swiper-container testimonial-slider-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="client-content">
                                            <div class="inner-content">
                                                <div class="icon">
                                                    <img src="{{ url('') }}/assets/img/icons/1.png" alt="Image">
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consect adipisi elit sed do eiusmod temporlo
                                                    incidid ut labore et dolore magnalop aliquall Ut enim ad minim.</p>
                                            </div>
                                            <div class="shape-group">
                                                <div class="shape-style1">
                                                    <img src="{{ url('') }}/assets/img/testimonial/shape1.png"
                                                        alt="Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="client-info">
                                            <div class="thumb">
                                                <img src="{{ url('') }}/assets/img/testimonial/1.png"
                                                    alt="Image">
                                            </div>
                                            <div class="desc">
                                                <h4 class="title">Dasia Lovell</h4>
                                                <p>Customer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="client-content">
                                            <div class="inner-content">
                                                <div class="icon">
                                                    <img src="{{ url('') }}/assets/img/icons/1.png" alt="Image">
                                                </div>
                                                <p>There are many variations of passage of Lorem Ipsum available, but the on
                                                    majority have suffered alteration in some form, by injected humour.</p>
                                            </div>
                                            <div class="shape-group">
                                                <div class="shape-style1">
                                                    <img src="{{ url('') }}/assets/img/testimonial/shape1.png"
                                                        alt="Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="client-info">
                                            <div class="thumb">
                                                <img src="{{ url('') }}/assets/img/testimonial/2.png"
                                                    alt="Image">
                                            </div>
                                            <div class="desc">
                                                <h4 class="title">Demetri Caron</h4>
                                                <p>Customer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="client-content">
                                            <div class="inner-content">
                                                <div class="icon">
                                                    <img src="{{ url('') }}/assets/img/icons/1.png" alt="Image">
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consect adipisi elit sed do eiusmod temporlo
                                                    incidid ut labore et dolore magnalop aliquall Ut enim ad minim.</p>
                                            </div>
                                            <div class="shape-group">
                                                <div class="shape-style1">
                                                    <img src="{{ url('') }}/assets/img/testimonial/shape1.png"
                                                        alt="Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="client-info">
                                            <div class="thumb">
                                                <img src="{{ url('') }}/assets/img/testimonial/3.png"
                                                    alt="Image">
                                            </div>
                                            <div class="desc">
                                                <h4 class="title">Akhil Newman</h4>
                                                <p>Customer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="client-content">
                                            <div class="inner-content">
                                                <div class="icon">
                                                    <img src="{{ url('') }}/assets/img/icons/1.png" alt="Image">
                                                </div>
                                                <p>There are many variations of passage of Lorem Ipsum available, but the on
                                                    majority have suffered alteration in some form, by injected humour.</p>
                                            </div>
                                            <div class="shape-group">
                                                <div class="shape-style1">
                                                    <img src="{{ url('') }}/assets/img/testimonial/shape1.png"
                                                        alt="Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="client-info">
                                            <div class="thumb">
                                                <img src="{{ url('') }}/assets/img/testimonial/1.png"
                                                    alt="Image">
                                            </div>
                                            <div class="desc">
                                                <h4 class="title">Dasia Lovell</h4>
                                                <p>Customer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="client-content">
                                            <div class="inner-content">
                                                <div class="icon">
                                                    <img src="{{ url('') }}/assets/img/icons/1.png" alt="Image">
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consect adipisi elit sed do eiusmod temporlo
                                                    incidid ut labore et dolore magnalop aliquall Ut enim ad minim.</p>
                                            </div>
                                            <div class="shape-group">
                                                <div class="shape-style1">
                                                    <img src="{{ url('') }}/assets/img/testimonial/shape1.png"
                                                        alt="Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="client-info">
                                            <div class="thumb">
                                                <img src="{{ url('') }}/assets/img/testimonial/2.png"
                                                    alt="Image">
                                            </div>
                                            <div class="desc">
                                                <h4 class="title">Demetri Caron</h4>
                                                <p>Customer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="client-content">
                                            <div class="inner-content">
                                                <div class="icon">
                                                    <img src="{{ url('') }}/assets/img/icons/1.png" alt="Image">
                                                </div>
                                                <p>There are many variations of passage of Lorem Ipsum available, but the on
                                                    majority have suffered alteration in some form, by injected humour.</p>
                                            </div>
                                            <div class="shape-group">
                                                <div class="shape-style1">
                                                    <img src="{{ url('') }}/assets/img/testimonial/shape1.png"
                                                        alt="Image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="client-info">
                                            <div class="thumb">
                                                <img src="{{ url('') }}/assets/img/testimonial/3.png"
                                                    alt="Image">
                                            </div>
                                            <div class="desc">
                                                <h4 class="title">Akhil Newman</h4>
                                                <p>Customer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thumb-style bg-img" data-bg-img="{{ url('') }}/assets/img/testimonial/shape2.png"></div>
        </section>
        <!--== End Newsletter Area ==-->

        <!--== Start Divider Area Wrapper ==-->
        <section class="divider-area divider-style4-area" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="divider-wrap bg-img" data-bg-img="{{ url('') }}/assets/img/photos/bg1.png">
                            <div class="row align-items-center">
                                <div class="col-lg-6 position-relative">
                                    <div class="content">
                                        <h2>Subscribe for Exclusive Sales & News</h2>
                                    </div>
                                    <div class="shape-group">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="newsletter-form">
                                        <form action="{{ route('postAbout') }}" method="post">
                                            @csrf
                                            <input class="form-control" name="email" type="email"
                                                placeholder="Enter Your Email">
                                                @error('email')
                                                <p class="text-danger " style="margin-left: 32px;">{{ $message }}</p>
                                            @enderror
                                            <button class="btn btn-theme" type="submit">Subscribe</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Divider Area Wrapper ==-->
    </main>
@endsection

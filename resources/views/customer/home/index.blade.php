@extends('layouts.customer')

@section('title', 'Home Page')

@section('main')
    <main class="main-content">
        <!--== Start Hero Area Wrapper ==-->
        <section class="home-slider-area slider-default">
            <div class="home-slider-content">
                <div class="swiper-container home-slider-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <!-- Start Slide Item -->
                            <div class="home-slider-item">
                                <div class="thumb-one bg-img" data-bg-img="assets/img/slider/1.jpg"></div>
                                <div class="slider-content-area">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="content">
                                                    <div class="inner-content">
                                                        <h2>Best Kids Store & Online Shop</h2>
                                                        <p>Give The Gift Of Your Children Everyday</p>
                                                        <a href="{{ route('shop') }}" class="btn-theme">Shop This Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="thumb-two" src="assets/img/slider/2.png" alt="Image">
                                    <img class="thumb-three" src="assets/img/slider/3.png" alt="Image">
                                    <img class="thumb-four" src="assets/img/photos/3.png" alt="Image">
                                </div>
                                <div class="shape-top bg-img" data-bg-img="assets/img/photos/1.png"></div>
                                <div class="shape-bottom bg-img" data-bg-img="assets/img/photos/2.png"></div>
                            </div>
                            <!-- End Slide Item -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Hero Area Wrapper ==-->

        <!--== Start Featured Area Wrapper ==-->
        <section class="featured-area featured-default-area" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="featured-item">
                            <div class="icon">
                                <img src="{{ url('') }}/assets/img/icons/f1.png" alt="Image">
                            </div>
                            <div class="featured-info">
                                <h4 class="title">Free Shipping</h4>
                                <p>Lorem ipsum dolor sit amet consect adipiscing elit sed does</p>
                            </div>
                            <div class="shape-group">
                                <div class="shape-style1">
                                    <img src="{{ url('') }}/assets/img/icons/f4.png" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="featured-item mt-xs-30">
                            <div class="icon">
                                <img src="{{ url('') }}/assets/img/icons/f2.png" alt="Image">
                            </div>
                            <div class="featured-info">
                                <h4 class="title">Support 24/7</h4>
                                <p>Lorem ipsum dolor sit amet consect adipiscing elit sed does</p>
                            </div>
                            <div class="shape-group">
                                <div class="shape-style1">
                                    <img src="{{ url('') }}/assets/img/icons/f5.png" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="featured-item mt-sm-30">
                            <div class="icon">
                                <img src="{{ url('') }}/assets/img/icons/f3.png" alt="Image">
                            </div>
                            <div class="featured-info">
                                <h4 class="title">Money Return</h4>
                                <p>Lorem ipsum dolor sit amet consect adipiscing elit sed does</p>
                            </div>
                            <div class="shape-group">
                                <div class="shape-style1">
                                    <img src="{{ url('') }}/assets/img/icons/f6.png" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Featured Area Wrapper ==-->

        <!--== Start Product Tab Area Wrapper ==-->
        <section class="product-area product-style4-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 m-auto">
                        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="title">Best - selling product</h2>
                            <div class="desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    incididunt ut labore et dolore magna aliqua. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-tab1-slider" data-aos="fade-up" data-aos-duration="1300">
                            @forelse ($best_selling_product as $item)
                                <div class="slide-item">
                                    <!-- Start Product Item -->
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <a href="{{ route('shop.detail', $item->id) }}">
                                                <img src="/uploads/product/{{ $item->image }}" alt="Image">
                                            </a>
                                            @auth
                                                <div class="product-action">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <form action="{{ route('shop.cart', $item->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="quantity" title="Quantity"
                                                                value="1" />
                                                            <button type="submit" class="btn-custom"
                                                                style="margin-right: 10px;"><i
                                                                    class="ion-ios-cart"></i></button>
                                                        </form>
                                                        <form action="{{ route('shop.Wishlist', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="quantity" title="Quantity" />
                                                            <button type="submit" class="btn-custom ml-2"><i
                                                                    class="ion-heart"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="product-action">
                                                    <form action="{{ route('user.login') }}" method="GET">
                                                        <button type="submit" class="btn-custom ml-2"><i
                                                                class="fa fa-user"></i></button>
                                                    </form>
                                                </div>
                                            @endauth
                                        </div>
                                        <div class="product-info">
                                            <div class="rating">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <h4 class="title"><a
                                                    href="{{ route('shop.detail', $item->id) }}">{{ $item->name }}</a>
                                            </h4>
                                            @if ($item->discount != null)
                                                <div class="d-flex align-items-center">
                                                    <div class="prices" style="margin-right: 15px;">
                                                        <span class="price">
                                                            ${{ number_format($item->discount, 2, '.', ',') }}
                                                        </span>
                                                    </div>
                                                    <div class="discount">
                                                        <p style="text-decoration: line-through;">
                                                            ${{ number_format($item->price, 2, '.', ',') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="prices" style="margin-right: 15px;">
                                                    <span class="price">${{ $item->price }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Product Item -->
                                </div>
                            @empty
                                <div class="container">
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Empty Data</strong>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Product Tab Area Wrapper ==-->

        <!--== Start Category Area Wrapper ==-->
        <section class="category-area product-category2-area style-two" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <div class="row category-items2">
                    <div class="col-md-6">
                        <div class="category-item">
                            <div class="thumb">
                                <img class="w-100" src="{{ url('') }}/assets/img/category/4.png" alt="Image">
                                <div class="content">
                                    <div class="contact-info">
                                        <h2 class="title text-white">Collection</h2>
                                        <h4 class="price text-white">Flat <span>20%</span> Off</h4>
                                    </div>
                                    <a class="btn-theme" href="{{ route('shop') }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-item mt-sm-50">
                            <div class="thumb">
                                <img class="w-100" src="{{ url('') }}/assets/img/category/5.png" alt="Image">
                                <div class="content">
                                    <div class="contact-info">
                                        <h2 class="title">Collection</h2>
                                        <h4 class="price">Flat <span>30%</span> Off</h4>
                                    </div>
                                    <a class="btn-theme" href="{{ route('shop') }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Category Area Wrapper ==-->

        <!--== Start Divider Area Wrapper ==-->
        <section class="divider-area divider-style1-area bg-img"
            data-bg-img="{{ url('') }}/assets/img/divider/bg1.png" data-aos="fade-up" data-aos-duration="1000">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="divider-content">
                            <h2 class="title">Deal Of The Day</h2>
                            <p><span>UPTO 35% OFF </span> On All Other Baby Products</p>
                            <span id="demo"></span>
                            <div class="countdown-content">
                                <ul class="countdown-timer">
                                    <li><span class="days" id="days"></span>
                                    </li>
                                    <li><span class="hours" id="hours"></span>
                                    </li>
                                    <li><span class="minutes" id="minutes"></span>
                                    </li>
                                    <li><span class="seconds" id="seconds"></span>
                                    </li>
                                </ul>
                            </div>
                            <a class="btn-theme" href="{{ route('shop') }}">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="shape-group">
                    <div class="shape-style6">
                        <img src="{{ url('') }}/assets/img/divider/3.png" alt="Image">
                    </div>
                </div>
            </div>
            <div class="shape-group">
                <div class="shape-style1" data-bg-img="{{ url('') }}/assets/img/divider/shape1.png"></div>
                <div class="shape-style2" data-bg-img="{{ url('') }}/assets/img/divider/shape2.png"></div>
            </div>
        </section>
        <!--== End Divider Area Wrapper ==-->

        <!--== Start Product Tab Area Wrapper ==-->
        <section class="product-area product-style3-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 m-auto">
                        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="title">New Products</h2>
                            <div class="desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    incididunt ut labore et dolore magna aliqua</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-duration="1300">
                    <div class="col-md-12">
                        <div class="product-tab-content">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product">
                                        <div class="row">
                                            @forelse ($newProducts as $item)
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="slide-item">
                                                        <!-- Start Product Item -->
                                                        <div class="product-item">
                                                            <div class="product-thumb">
                                                                <a href="{{ route('shop.detail', $item->id) }}">
                                                                    <img src="/uploads/product/{{ $item->image }}"
                                                                        alt="Image">
                                                                </a>
                                                                @auth
                                                                    <div class="product-action">
                                                                        <div
                                                                            class="d-flex justify-content-center align-items-center">
                                                                            <form action="{{ route('shop.cart', $item->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="quantity"
                                                                                    title="Quantity" value="1" />
                                                                                <button type="submit" class="btn-custom"
                                                                                    style="margin-right: 10px;"><i
                                                                                        class="ion-ios-cart"></i></button>
                                                                            </form>
                                                                            <form
                                                                                action="{{ route('shop.Wishlist', $item->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="quantity"
                                                                                    title="Quantity" />
                                                                                <button type="submit"
                                                                                    class="btn-custom ml-2"><i
                                                                                        class="ion-heart"></i></button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="product-action">
                                                                        <form action="{{ route('user.login') }}"
                                                                            method="GET">
                                                                            <button type="submit" class="btn-custom ml-2"><i
                                                                                    class="fa fa-user"></i></button>
                                                                        </form>
                                                                    </div>
                                                                @endauth
                                                            </div>
                                                            <div class="product-info">
                                                                <div class="rating">
                                                                    <span class="fa fa-star"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <span class="fa fa-star"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </div>
                                                                <h4 class="title"><a
                                                                        href="{{ route('shop.detail', $item->id) }}">{{ $item->name }}</a>
                                                                </h4>
                                                                @if ($item->discount != null)
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="prices" style="margin-right: 15px;">
                                                                            <span
                                                                                class="price">${{ number_format($item->discount, 2, '.', ',') }}</span>
                                                                        </div>
                                                                        <div class="discount">
                                                                            <p style="text-decoration: line-through;">
                                                                                ${{ number_format($item->price, 2, '.', ',') }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="prices" style="margin-right: 15px;">
                                                                        <span
                                                                            class="price">${{ number_format($item->price, 2, '.', ',') }}</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End Product Item -->
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Empty Data</strong>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Product Tab Area Wrapper ==-->

        <!--== Start Newsletter Area ==-->
        <section class="testimonial-area testimonial-default-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="title">Testimonial</h2>
                            <div class="desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    incididunt ut labore et dolore magna aliqua. </p>
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
                                                <p>Lorem ipsum dolor sit amet, consect adipisi elit sed do eiusmod
                                                    temporlo incidid ut labore et dolore magnalop aliquall Ut enim
                                                    ad minim.</p>
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
                                                <p>There are many variations of passage of Lorem Ipsum available,
                                                    but the on majority have suffered alteration in some form, by
                                                    injected humour.</p>
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
                                                <p>Lorem ipsum dolor sit amet, consect adipisi elit sed do eiusmod
                                                    temporlo incidid ut labore et dolore magnalop aliquall Ut enim
                                                    ad minim.</p>
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
                                                <p>There are many variations of passage of Lorem Ipsum available,
                                                    but the on majority have suffered alteration in some form, by
                                                    injected humour.</p>
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
                                                <p>Lorem ipsum dolor sit amet, consect adipisi elit sed do eiusmod
                                                    temporlo incidid ut labore et dolore magnalop aliquall Ut enim
                                                    ad minim.</p>
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
                                                <p>There are many variations of passage of Lorem Ipsum available,
                                                    but the on majority have suffered alteration in some form, by
                                                    injected humour.</p>
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

        <!--== Start Blog Area Wrapper ==-->
        <section class="blog-area blog-default2-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 m-auto">
                        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="title">Latest Blog</h2>
                            <div class="desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    incididunt ut labore et dolore magna aliqua. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-duration="1300">
                    @forelse ($blogs as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!--== Start Blog Post Item ==-->
                            <div class="post-item">
                                <div class="thumb">
                                    <a href="{{ route('blogDetail', $item->id) }}"><img
                                            src="/uploads/blogs/{{ $item->image }}" alt="Image"></a>
                                </div>
                                <div class="content">
                                    <div class="meta">By, <a class="author">{{ $item->user->name }}
                                        </a><span class="dots"></span><span
                                            class="post-date">{{ date('Y-m-d', strtotime($item->created_at)) }}</span>
                                    </div>
                                    <h4 class="title">
                                        <a href="{{ route('blogDetail', $item->id) }}">{{ $item->title }}</a>
                                    </h4>
                                    <a class="btn-theme" href="{{ route('blogDetail', $item->id) }}">Read More</a>
                                </div>
                            </div>
                            <!--== End Blog Post Item ==-->
                        </div>
                    @empty
                        <div class="alert alert-danger" role="alert">
                            <strong>Empty Data</strong>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!--== End Blog Area Wrapper ==-->
    </main>
@endsection
@section('script')
    <script>
        var countDownDate = new Date("Dec 1, 2023 05:27:24").getTime();
        console.log(countDownDate);
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);



            // console.log(days, hours, minutes, seconds)

            // Display the result in the element with id="demo"
            document.getElementById('days').innerHTML = days < 10 ? "0" + days : days;
            document.getElementById('hours').innerHTML = hours < 10 ? "0" + hours : hours;
            document.getElementById('minutes').innerHTML = minutes < 10 ? "0" + minutes : minutes;
            document.getElementById('seconds').innerHTML = seconds < 10 ? "0" + seconds : seconds;

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@endsection

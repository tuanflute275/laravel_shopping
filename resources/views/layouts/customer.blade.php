<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from template.hasthemes.com/kidol/kidol/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Sep 2023 15:18:50 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title')</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{ url('') }}/assets/img/favicon.ico" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One:400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{ url('') }}/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--== Font-awesome Icons CSS ==-->
    <link href="{{ url('') }}/assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--== Pe Icon 7 Min Icons CSS ==-->
    <link href="{{ url('') }}/assets/css/pe-icon-7-stroke.min.css" rel="stylesheet" />
    <!--== Ionicons CSS ==-->
    <link href="{{ url('') }}/assets/css/ionicons.css" rel="stylesheet" />
    <!--== Animate CSS ==-->
    <link href="{{ url('') }}/assets/css/animate.css" rel="stylesheet" />
    <!--== Aos CSS ==-->
    <link href="{{ url('') }}/assets/css/aos.css" rel="stylesheet" />
    <!--== FancyBox CSS ==-->
    <link href="{{ url('') }}/assets/css/jquery.fancybox.min.css" rel="stylesheet" />
    <!--== Slicknav CSS ==-->
    <link href="{{ url('') }}/assets/css/slicknav.css" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="{{ url('') }}/assets/css/swiper.min.css" rel="stylesheet" />
    <!--== Slick CSS ==-->
    <link href="{{ url('') }}/assets/css/slick.css" rel="stylesheet" />
    <!--== Main Style CSS ==-->
    <link href="{{ url('') }}/assets/css/style.css" rel="stylesheet" />
    {{-- toast mesage --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>

    <!--wrapper start-->
    <div class="wrapper home-default-wrapper">

        <!--== Start Preloader Content ==-->
        <div class="preloader-wrap">
            <div class="preloader">
                <span class="dot"></span>
                <div class="dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!--== End Preloader Content ==-->

        <!--== Start Header Wrapper ==-->
        <header class="header-wrapper">
            <div class="header-top">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-6">
                            <div class="header-info-left">
                                <p>Free Returns and Free Shipping</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-8 col-lg-6 sm-pl-0 xs-pl-15 header-top-right">
                            <div class="header-info">
                                @auth
                                    <a href="{{ route('user.profile') }}">
                                        @if (!Auth::user()->avatar)
                                            <img style="margin-right: 10px;" width="42" class="rounded-circle" src="/uploads/default-user.png"
                                                alt="">
                                        @else
                                            <img width="42" class="rounded-circle" style="margin-right: 10px;"
                                                src="/uploads/user/{{ Auth::user()->avatar }}" alt="">
                                        @endif
                                        {{ Auth::check() ? Auth::user()->name : 'Account...' }}
                                    </a>
                                    <a href="{{ route('user.sign-out') }}" class="sign-out">Sign Out</a>
                                @else
                                    <a href="{{ route('user.login') }}"><i class="fa fa-user"></i>Sign In</a>
                                    <a href="{{ route('user.register') }}"><i class="fa fa-user"></i>Sign Up</a>
                                @endauth
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row row-gutter-0 align-items-center">
                        <div class="col-12">
                            <div class="header-align">
                                <div class="header-align-left">
                                    <div class="header-logo-area">
                                        <a href="{{ route('home.index') }}">
                                            <img class="logo-main" src="{{ url('') }}/assets/img/logo.png"
                                                alt="Logo" />
                                            <img class="logo-light" src="{{ url('') }}/assets/img/logo.png"
                                                alt="Logo" />
                                        </a>
                                    </div>
                                </div>
                                <div class="header-align-center">
                                    <div class="header-search-box">
                                        <form action="{{ route('shop') }}" method="GET">
                                            <div class="form-input-item">
                                                <label for="search" class="sr-only">Search Everything</label>
                                                <input type="text" name="keyword" id="search"
                                                    placeholder="Search Everything">
                                                <button type="submit" class="btn-src">
                                                    <i class="pe-7s-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-align-right">
                                    @auth
                                        <div class="header-action-area">
                                            <div class="header-action-wishlist">
                                                <button class="btn-wishlist"
                                                    onclick="window.location.href='{{ route('shop.show_Wishlist') }}'"
                                                    style=" margin-right: 10px;">
                                                    <span class="cart-count">{{ count($wishlists->getWishlist()) }}</span>
                                                    <i class="pe-7s-like"></i>
                                                </button>
                                            </div>
                                            <div class="header-action-cart">
                                                <button class="btn-cart cart-icon">
                                                    <span class="cart-count">{{ count($carts->getCart()) }}</span>
                                                    <i class="pe-7s-shopbag"></i>
                                                </button>
                                            </div>
                                            <button class="btn-menu d-md-none">
                                                <i class="fa fa-bars"></i>
                                            </button>
                                        </div>
                                    @else
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-area header-default sticky-header">
                <div class="container">
                    <div class="row row-gutter-0 align-items-center">
                        <div class="col-4 col-sm-6 col-lg-2">
                            <div class="header-logo-area">
                                <a>
                                    <img class="logo-main" src="{{ url('') }}/assets/img/logo.png"
                                        alt="Logo" />
                                    <img class="logo-light" src="{{ url('') }}/assets/img/logo.png"
                                        alt="Logo" />
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 sticky-md-none">
                            <div class="header-navigation-area d-none d-md-block">
                                <ul class="main-menu nav position-relative">
                                    <li><a class="" href="{{ route('home.index') }}">Home</a></li>
                                    <li><a class="" href="{{ route('about') }}">About</a></li>
                                    <li><a class="" href="{{ route('shop') }}">Shop</a></li>
                                    <li><a class="" href="{{ route('blog') }}">Blog</a></li>
                                    <li><a class="" href="{{ route('contact') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-8 col-sm-6 col-lg-2">
                            <div class="header-action-area">
                                <div class="header-action-search">
                                    <button class="btn-search btn-search-menu mr-0">
                                        <i class="pe-7s-search"></i>
                                    </button>
                                </div>
                                @auth
                                    <div class="header-action-wishlist" style="margin: 0 15px;">
                                        <button class="btn-cart mr-3"
                                            onclick="window.location.href='{{ route('shop.show_Wishlist') }}'">
                                            <span class="cart-count">{{ count($wishlists->getWishlist()) }}</span>
                                            <i class="pe-7s-like"></i>
                                        </button>
                                    </div>
                                    <div class="header-action-cart">
                                        <button class="btn-cart cart-icon">
                                            <span class="cart-count">{{ count($carts->getCart()) }}</span>
                                            <i class="pe-7s-shopbag"></i>
                                        </button>
                                    </div>
                                @endauth
                                <button class="btn-menu d-lg-none">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--== End Header Wrapper ==-->

        @yield('main')

        <!--== Start Footer Area Wrapper ==-->
        <footer class="footer-area default-style">
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-3">
                            <div class="widget-item item-style3">
                                <div class="about-widget">
                                    <a class="footer-logo">
                                        <img src="{{ url('') }}/assets/img/logo-light.png" alt="Logo">
                                    </a>
                                    <p>Lorem ipsum dolor sit amet, consecl adipisicing elit, sed do eiusmod teml
                                        incididunt ut labore et dolore magna aliqua Ut enim</p>
                                    <div class="widget-social-icons">
                                        <a href="https://twitter.com/tuanflute275" target="_blank"><i
                                                class="ion-social-twitter"></i></a>
                                        <a href="https://github.com/tuanflute275" target="_blank"><i
                                                class="ion-social-github"></i></a>
                                        <a href="https://www.facebook.com/profile.php?id=100047425502024"
                                            target="_blank"><i class="ion-social-facebook"></i></a>
                                        <a href="https://www.instagram.com/tn791660/" target="_blank"><i
                                                class="ion-social-instagram-outline"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <div class="widget-item item-style1">
                                <h4 class="widget-title">Quick Links</h4>
                                <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#dividerId-1">Quick Links</h4>
                                <div id="dividerId-1" class="collapse widget-collapse-body">
                                    <nav class="widget-menu-wrap">
                                        <ul class="nav-menu nav item-hover-style">
                                            <li><a href="https://www.facebook.com/profile.php?id=100047425502024"
                                                    target="_blank">- Support Facebook</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <div class="widget-item item-style1">
                                <h4 class="widget-title">Other Page</h4>
                                <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#dividerId-2">Other Page</h4>
                                <div id="dividerId-2" class="collapse widget-collapse-body">
                                    <nav class="widget-menu-wrap item-hover-style">
                                        <ul class="nav-menu nav">
                                            <li><a href="{{ route('about') }}">- About</a></li>
                                            <li><a href="{{ route('blog') }}">- Blog</a></li>
                                            <li><a href="{{ route('shop') }}">- Shop</a></li>
                                            <li><a href="{{ route('contact') }}">- Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-2">
                            <div class="widget-item item-style2">
                                <h4 class="widget-title">Company</h4>
                                <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#dividerId-3">Company</h4>
                                <div id="dividerId-3" class="collapse widget-collapse-body">
                                    <nav class="widget-menu-wrap item-hover-style">
                                        <ul class="nav-menu nav">
                                            <li><a href="{{ route('shop') }}">- Shop</a></li>
                                            <li><a href="{{ route('contact') }}">- Contact us</a></li>
                                            <li><a href="{{ route('user.login') }}">- Log in</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-3">
                            <div class="widget-item">
                                <h4 class="widget-title">Store Information.</h4>
                                <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#dividerId-4">Store Information.</h4>
                                <div id="dividerId-4" class="collapse widget-collapse-body">
                                    <p class="widget-address">238 Hoàng Quốc Việt.
                                    </p>
                                    <ul class="widget-contact-info">
                                        <li>Phone/Fax: <a href="tel://+84386564543">+84386564543</a></li>
                                        <li>Email: <a href="mailto://tuanflute275@gmail.com">tuanflute275@gmail.com</a>
                                        </li>
                                    </ul>
                                    <div class="widget-payment-info">
                                        <div class="thumb">
                                            <a><img src="{{ url('') }}/assets/img/photos/payment1.png"
                                                    alt="Image"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-bottom-content">
                        <div class="row text-center">
                            <div class="col-sm-12">
                                <div class="widget-copyright">
                                    <p><i class="fa fa-copyright"></i>
                                        Tuanfluteee275
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-shape bg-img" data-bg-img="{{ url('') }}/assets/img/photos/footer1.png"></div>
        </footer>
        <!--== End Footer Area Wrapper ==-->

        <!--== Scroll Top Button ==-->
        <div class="scroll-to-top"><span class="fa fa-angle-double-up"></span></div>

        <!--== Start Aside Search Menu ==-->
        <div class="search-box-wrapper">
            <div class="search-box-content-inner">
                <div class="search-box-form-wrap">
                    <div class="search-note">
                        <p>Start typing and press Enter to search</p>
                    </div>
                    <form action="{{ route('shop') }}" method="GET">
                        <div class="search-form position-relative">
                            <label for="search-input" class="sr-only">Search</label>
                            <input type="search" name="keyword" class="form-control" placeholder="Search"
                                id="search-input">
                            <button class="search-button"><i class="pe-7s-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!--== End Aside Search Menu ==-->
            <a href="javascript:;" class="search-close"><i class="pe-7s-close"></i></a>
        </div>
        <!--== End Aside Search Menu ==-->

        <!--== Start Sidebar Cart Menu ==-->
        <aside class="sidebar-cart-modal">
            <div class="sidebar-cart-inner">
                <div class="sidebar-cart-content">
                    <a class="cart-close" href="javascript:void(0);"><i class="pe-7s-close"></i></a>
                    <div class="sidebar-cart-all">
                        <div class="cart-header">
                            <h3>Shopping Cart</h3>
                            <div class="close-style-wrap">
                                <span class="close-style close-style-width-1 cart-close"></span>
                            </div>
                        </div>
                        <div class="cart-content cart-content-padding">
                            <ul>
                                @foreach ($cartss as $item)
                                    <li class="single-product-cart">
                                        <div class="cart-img">
                                            <a href="{{ route('shop.detail', $item['product_id']) }}"><img
                                                    src="{{ url('') }}/uploads/product/{{ $item['image'] }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="cart-title">
                                            <h4><a href="{{ route('shop.detail', $item['product_id']) }}">{{ $item['name'] }}
                                                </a></h4>
                                            <span> {{ $item['quantity'] }} × <span class="price">
                                                    ${{ number_format($item['price'], 2, '.', ',') }} </span></span>
                                        </div>
                                        <div class="cart-delete">
                                            <a onclick="return confirm('Do you want to delete items ?')"
                                                href="{{ route('shop.delete_cart', $item['product_id']) }}"><i
                                                    class="ion-ios-trash-outline"></i></a>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="cart-total">
                                <h4>Subtotal: <span>${{ number_format($carts->getTotalPrice(), 2, '.', ',') }}</span>
                                </h4>
                            </div>
                            <div class="cart-checkout-btn">
                                <a class="cart-btn" href="{{ route('shop.show_cart') }}">view cart</a>
                                <a class="checkout-btn" href="{{ route('checkout') }}">checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <div class="sidebar-cart-overlay"></div>
        <!--== End Sidebar Cart Menu ==-->

        <!--== Start Side Menu ==-->
        <aside class="off-canvas-wrapper">
            <div class="off-canvas-inner">
                <div class="off-canvas-overlay d-none"></div>
                <!-- Start Off Canvas Content Wrapper -->
                <div class="off-canvas-content">
                    <!-- Off Canvas Header -->
                    <div class="off-canvas-header">
                        <div class="close-action">
                            <button class="btn-close"><i class="pe-7s-close"></i></button>
                        </div>
                    </div>

                    <div class="off-canvas-item">
                        <!-- Start Mobile Menu Wrapper -->
                        <div class="res-mobile-menu">
                            <!-- Note Content Auto Generate By Jquery From Main Menu -->
                        </div>
                        <!-- End Mobile Menu Wrapper -->
                    </div>
                    <!-- Off Canvas Footer -->
                    <div class="off-canvas-footer"></div>
                </div>
                <!-- End Off Canvas Content Wrapper -->
            </div>
        </aside>
        <!--== End Side Menu ==-->
    </div>

    <!--=======================Javascript============================-->

    <!--=== Modernizr Min Js ===-->
    <script src="{{ url('') }}/assets/js/modernizr.js"></script>
    <!--=== jQuery Min Js ===-->
    <script src="{{ url('') }}/assets/js/jquery-main.js"></script>
    <!--=== jQuery Migration Min Js ===-->
    <script src="{{ url('') }}/assets/js/jquery-migrate.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="{{ url('') }}/assets/js/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="{{ url('') }}/assets/js/bootstrap.min.js"></script>
    <!--=== jquery Appear Js ===-->
    <script src="{{ url('') }}/assets/js/jquery.appear.js"></script>
    <!--=== jquery Swiper Min Js ===-->
    <script src="{{ url('') }}/assets/js/swiper.min.js"></script>
    <!--=== jquery Fancybox Min Js ===-->
    <script src="{{ url('') }}/assets/js/fancybox.min.js"></script>
    <!--=== jquery Aos Min Js ===-->
    <script src="{{ url('') }}/assets/js/aos.min.js"></script>
    <!--=== jquery Slicknav Js ===-->
    <script src="{{ url('') }}/assets/js/jquery.slicknav.js"></script>
    <!--=== jquery Countdown Js ===-->
    <script src="{{ url('') }}/assets/js/jquery.countdown.min.js"></script>
    <!--=== jquery Tippy Js ===-->
    <script src="{{ url('') }}/assets/js/tippy.all.min.js"></script>
    <!--=== Isotope Min Js ===-->
    <script src="{{ url('') }}/assets/js/isotope.pkgd.min.js"></script>
    <!--=== Parallax Min Js ===-->
    <script src="{{ url('') }}/assets/js/parallax.min.js"></script>
    <!--=== Slick  Min Js ===-->
    <script src="{{ url('') }}/assets/js/slick.min.js"></script>
    <!--=== jquery Wow Min Js ===-->
    <script src="{{ url('') }}/assets/js/wow.min.js"></script>
    <!--=== jquery Zoom Min Js ===-->
    <script src="{{ url('') }}/assets/js/jquery-zoom.min.js"></script>

    <!--=== Custom Js ===-->
    <script src="{{ url('') }}/assets/js/custom.js"></script>

    {{-- preview image --}}
    <script type="text/javascript" src="{{ url('') }}/dist/js/my_script.js"></script>


    {{-- chatbot  --}}
    <script type="text/javascript" src="https://ahachat.com/customer-chats/customer_chat_FXtOYcJmzE655f465ccd916.js"></script>

    {{-- toast mesage --}}
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    @yield('script')

</body>


<!-- Mirrored from template.hasthemes.com/kidol/kidol/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Sep 2023 15:18:57 GMT -->

</html>

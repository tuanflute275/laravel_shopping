@extends('layouts.customer')

@section('title', 'Product Details')

@section('main')
    <main class="main-content">
        <!--== Start Page Title Area ==-->
        <section class="page-title-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 m-auto">
                        <div class="page-title-content text-center">
                            <h2 class="title">Product</h2>
                            <div class="bread-crumbs"><a href="{{ route('home.index') }}"> Home </a><span
                                    class="breadcrumb-sep"> //
                                </span><span class="active"> Product</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Title Area ==-->

        <!--== Start Shop Area ==-->
        <section class="product-single-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-0">
                        <div class="single-product-slider">
                            <div class="single-product-thumb">
                                <div class="swiper-container single-product-thumb-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide zoom zoom-hover">
                                            <div class="thumb-item">
                                                <a class="lightbox-image" data-fancybox="gallery" href="">
                                                    <img src="/uploads/product/{{ $product->image }}" alt="Image-HasTech">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- start thumbnail --}}
                            <div class="single-product-nav">
                                <div class="swiper-container single-product-nav-slider">

                                </div>
                            </div>
                            {{-- end thumbnail --}}

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-product-info">
                            <h4 class="title">{{ $product->name }}</h4>
                            @if ($product->discount != null)
                                <div class="d-flex align-items-center">
                                    <div class="prices" style="margin-right: 15px;">
                                        <span class="price">${{ number_format($product->discount, 2, '.', ',') }}</span>
                                    </div>
                                    <div class="discount">
                                        <p style="text-decoration: line-through;">
                                            ${{ number_format($product->price, 2, '.', ',') }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="prices" style="margin-right: 15px;">
                                    <span class="price">${{ number_format($product->price, 2, '.', ',') }}</span>
                                </div>
                            @endif
                            <div class="product-rating">
                                <div class="rating">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <div class="review">
                                    {{-- <a href="#/">( 5 Customer Review )</a> --}}
                                </div>
                            </div>
                            <div class="single-product-featured">
                                <ul>
                                    <li><i class="fa fa-check"></i> Free Shipping</li>
                                    <li><i class="fa fa-check"></i> Support 24/7</li>
                                    <li><i class="fa fa-check"></i> Money Return</li>
                                </ul>
                            </div>
                            <p class="product-desc">{{ $product->content }}</p>
                            @auth
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('shop.cart', $product->id) }}" method="post">
                                        @csrf
                                        <div class="quick-product-action">
                                            <div class="action-top">
                                                <div class="pro-qty">
                                                    <input type="text" name="quantity" title="Quantity" value="1" />
                                                    @error('quantity')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-theme">Add to Cart</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="{{ route('shop.Wishlist', $product->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="quantity" title="Quantity" />
                                        <div class="quick-product-action">
                                            <div class="action-top">
                                                <button type="submit" style="border: none;outline:none;background: #fff"
                                                    class="btn-wishlist" href="">Add to Wishlist</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="quick-product-action">
                                    <div class="action-top">
                                        <a href="{{ route('user.login') }}" class="btn btn-theme">Login To Buy This Item</a>
                                    </div>
                                </div>
                            @endauth

                            <div class="widget">
                                <h3 class="title">Categories:</h3>
                                <div class="widget-tags">
                                    <a href="{{ route('blog') }}">{{ $product->productCategory->name }}</a>
                                </div>
                            </div>
                            <div class="widget">
                                <h3 class="title">Brands:</h3>
                                <div class="widget-tags">
                                    <a href="{{ route('blog') }}">{{ $product->brand->name }}</a>
                                </div>
                            </div>
                            <div class="widget">
                                <h3 class="title">Share:</h3>
                                <div class="widget-tags widget-share">
                                    <a href="https://www.facebook.com/" target="_blank" class="fa fa-facebook"></a>
                                    <a href="https://dribbble.com/tags/dripple" target="_blank" class="fa fa-dribbble"></a>
                                    <a href="https://www.pinterest.com/" target="_blank" class="fa fa-pinterest-p"></a>
                                    <a href="https://twitter.com/" target="_blank" class="fa fa-twitter"></a>
                                    <a href="https://www.linkedin.com/" target="_blank" class="fa fa-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-description-review">
                                <ul class="nav nav-tabs product-description-tab-menu" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="product-desc-tab" data-bs-toggle="tab"
                                            data-bs-target="#productDesc" type="button" role="tab"
                                            aria-controls="productDesc" aria-selected="false">Description</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="product-review-tab" data-bs-toggle="tab"
                                            data-bs-target="#productReview" type="button" role="tab"
                                            aria-controls="productReview" aria-selected="false">Reviews
                                            ({{ $comments->count() }})</button>
                                    </li>
                                </ul>
                                <div class="tab-content product-description-tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="productDesc" role="tabpanel"
                                        aria-labelledby="product-desc-tab">
                                        <div class="product-desc">
                                            <p>{!! $product->description ?? 'NULL' !!}</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="productReview" role="tabpanel"
                                        aria-labelledby="product-review-tab">
                                        <div class="product-review">
                                            <div class="review-header">
                                                <h4 class="title">Customer Reviews</h4>
                                                <div class="review-info">
                                                    <ul class="review-rating">
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                    <span class="review-caption">Based on {{ $comments->count() }}
                                                        review</span>
                                                    <span class="review-write-btn">Write a review</span>
                                                </div>
                                            </div>
                                            <div class="product-review-form">
                                                <h4 class="title">Write a review</h4>
                                                <form action="{{ route('shop.postComment', $product->id) }}"
                                                    enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    <div class="review-form-content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="reviewFormEmail">Email</label>
                                                                    <input class="form-control" id="reviewFormEmail"
                                                                        name="email" type="text"
                                                                        value="{{ old('email') }}"
                                                                        placeholder="Enter your email">
                                                                    @error('email')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="reviewFormTextarea">Body of Review
                                                                    </label>
                                                                    <textarea class="form-control textarea" id="reviewFormTextarea" name="comment" rows="7"
                                                                        placeholder="Write your comments here">{{ old('comment') }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group pull-right">
                                                                    <button class="btn btn-theme" type="submit">Submit
                                                                        Review</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            @forelse ($comments as $item)
                                                <div class=" d-flex my-5">
                                                    <div class="box-image">
                                                        @if (!$item->user->avatar)
                                                            <img style="margin-right: 10px;" width="80"
                                                                class="rounded-circle" src="/uploads/default-user.png"
                                                                alt="">
                                                        @else
                                                            <img style="margin-right: 10px;" width="80" class="rounded-circle"
                                                                data-toggle="tooltip" title="Image"
                                                                data-placement="bottom"
                                                                src="/uploads/user/{{ $item->user->avatar }}" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="review-item">
                                                        <h4 class="title">{{ $item->user->name }}</h4>
                                                        <p style="margin-bottom: 0 !important">{!! $item->messages !!}</p>
                                                        <a class="review-report" href="{{ route('deleteCommentProduct', $item->id) }}">Delete comment</a>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="col-lg-6 justify-content-between">
                                                    No comment
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
        <!--== End Shop Area ==-->

        <!--== Start Shop Area ==-->
        <section class="product-slider-area related-product-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="section-title text-center">
                            <h2 class="title">Related Product</h2>
                            <div class="desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut
                                    labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-tab1-slider">
                            @forelse ($RelatedProducts as $item)
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
                                <div class="alert alert-danger" role="alert">
                                    <strong>Empty Data</strong>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Shop Area ==-->
    </main>
@endsection

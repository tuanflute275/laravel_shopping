@extends('layouts.customer')

@section('title', 'Shop Page')

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

        <!--== Start Shop Area Wrapper ==-->
        <div class="product-area product-grid-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-0 order-lg-1">
                        <div class="shop-toolbar-wrap">
                            <div class="product-showing-status">
                                <p class="count-result"><span>{{ $allProducts->count() }} </span> Product Found of <span>
                                        {{ $products->count() }} </span></p>
                            </div>
                            <div class="product-view-mode">
                                <nav>
                                    <div class="nav nav-tabs active" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="column-three-tab" data-bs-toggle="tab"
                                            data-bs-target="#column-three" type="button" role="tab"
                                            aria-controls="column-three" aria-selected="true"><i
                                                class="fa fa-th"></i></button>

                                        <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-list" type="button" role="tab"
                                            aria-controls="nav-list" aria-selected="false"><i
                                                class="fa fa-list"></i></button>

                                        <button class="nav-link" id="column-two-tab" data-bs-toggle="tab"
                                            data-bs-target="#column-two" type="button" role="tab"
                                            aria-controls="column-two" aria-selected="true"><i
                                                class="fa fa-th-large"></i></button>
                                    </div>
                                </nav>
                            </div>

                            <form action="" method="get">
                                <div class="form-group d-flex m-0">
                                    <select class="form-control mt-1" name="order" id="order">
                                        <option value="name-ASC">Name (a - z)</option>
                                        <option value="name-DESC">Name (z - a)</option>
                                        <option value="price-ASC">Price (low - high)</option>
                                        <option value="price-DESC">Price (high - low)</option>
                                        <option value="none">Default</option>
                                    </select>
                                    <button type="submit"
                                        style="border: 0;
                                        outline: none;
                                        background: #fff;
                                        font-size: 25px;
                                        margin-top: 7px;"><i
                                            class="pe-7s-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="column-three" role="tabpanel"
                                aria-labelledby="column-three-tab">
                                <div class="row">
                                    @forelse ($allProducts as $item)
                                        <div class="col-sm-6 col-md-4">
                                            <!-- Start Product Item -->
                                            <div class="product-item">
                                                <div class="product-thumb">
                                                    <a href="{{ route('shop.detail', $item->id) }}">
                                                        <img src="/uploads/product/{{ $item->image }}" alt="Image">
                                                    </a>
                                                    @auth
                                                        <div class="product-action">
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <form action="{{ route('shop.cart', $item->id) }}"
                                                                    method="post">
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
                                    @empty
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Empty Data</strong>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row">
                                    @forelse ($allProducts as $item)
                                        <div class="col-12 product-items-list">
                                            <!-- Start Product Item -->
                                            <div class="product-item">
                                                <div class="product-thumb">
                                                    <a href="{{ route('shop.detail', $item->id) }}">
                                                        <img src="/uploads/product/{{ $item->image }}" alt="Image">
                                                    </a>
                                                    @auth
                                                        <div class="product-action">
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <form action="{{ route('shop.cart', $item->id) }}"
                                                                    method="post">
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
                                    @empty
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Empty Data</strong>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane fade" id="column-two" role="tabpanel" aria-labelledby="column-two-tab">
                                <div class="row">
                                    @forelse ($allProducts as $item)
                                        <div class="col-sm-6">
                                            <!-- Start Product Item -->
                                            <div class="product-item">
                                                <div class="product-thumb">
                                                    <a href="{{ route('shop.detail', $item->id) }}">
                                                        <img src="/uploads/product/{{ $item->image }}" alt="Image">
                                                    </a>
                                                    @auth
                                                        <div class="product-action">
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <form action="{{ route('shop.cart', $item->id) }}"
                                                                    method="post">
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
                                    @empty
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Empty Data</strong>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="container my-3">
                            {{ $allProducts->links() }}
                        </div>
                    </div>
                    {{-- sideBar --}}
                    <div class="col-lg-3 order-1 order-lg-0">
                        <div class="sidebar-area shop-sidebar-area">
                            <div class="widget-item">
                                <div class="widget-title">
                                    <h3 class="title">Product Categories</h3>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-categories">
                                        <ul>
                                            @foreach ($categories as $item)
                                                <li><a href="{{ route('shop.product', $item->id) }}">{{ $item->name }}
                                                        <span>({{ $item->products->count() }})</span></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-item">
                                <div class="widget-title">
                                    <h3 class="title">Product Brands</h3>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-categories">
                                        <ul>
                                            @foreach ($brands as $item)
                                                <li><a href="{{ route('shop.productBrand', $item->id) }}">{{ $item->name }}
                                                        <span>({{ $item->products->count() }})</span></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Shop Area Wrapper ==-->
    </main>
@endsection

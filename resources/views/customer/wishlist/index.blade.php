@extends('layouts.customer')

@section('title', 'Checkout')

@section('main')
    <main class="main-content">
        <!--== Start Page Title Area ==-->
        <section class="page-title-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 m-auto">
                        <div class="page-title-content text-center">
                            <h2 class="title">Wishlist</h2>
                            <div class="bread-crumbs"><a href="{{ route('home.index') }}"> Home </a><span
                                    class="breadcrumb-sep"> //
                                </span><span class="active"> Wishlist</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Title Area ==-->

        <!--== Start Wishlist Area Wrapper ==-->
        <section class="product-area wishlist-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="section-title text-center">
                            <h2 class="title">Wishlist</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">

                        <div class="wishlist-table-content">
                            <div class="table-content table-responsive">
                                @if (count($wishlists->getWishlist()) > 0)
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="width-remove"></th>
                                                <th class="width-thumbnail"></th>
                                                <th class="width-name">Product</th>
                                                <th class="width-price"> Unit price </th>
                                                <th class="width-wishlist-cart"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($wishlists->getWishlist() as $item)
                                                <tr>
                                                    <td class="product-remove">
                                                        <a onclick="return confirm('Do you want to delete all items ?')"
                                                            href="{{ route('shop.delete_wishlist', $item['product_id']) }}"><i
                                                                class="ion-ios-trash-outline"></i></a>
                                                        </a>
                                                    </td>
                                                    <td class="product-thumbnail">
                                                        <a href="{{ route('shop.detail', $item['product_id']) }}"><img
                                                                src="{{ url('') }}/uploads/product/{{ $item['image'] }}"
                                                                alt="Image"></a>
                                                    </td>
                                                    <td class="product-name">
                                                        <h5><a
                                                                href="{{ route('shop.detail', $item['product_id']) }}">{{ $item['name'] }}</a>
                                                        </h5>
                                                    </td>
                                                    <td class="product-price"><span
                                                            class="amount">${{ number_format($item['price'], 2, '.', ',') }}</span>
                                                    </td>
                                                    <td class="wishlist-cart">
                                                        <form action="{{ route('shop.Wishlist.add', $item['product_id']) }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="quantity" title="Quantity"
                                                                value="1" />
                                                            <button type="submit" class="btn-custom"
                                                                style="margin-right: 10px;"><i
                                                                    class="ion-ios-cart"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Empty Data</strong>
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-btn continure-btn">
                                            <a class="btn btn-link" href="{{ route('shop') }}"><i
                                                    class="ion-ios-arrow-left"></i>
                                                Back to Shop</a>
                                        </div>
                                        <div class="cart-shiping-btn update-btn">
                                            <a class="btn btn-link"
                                                onclick="return confirm('Do you want to delete all items ?')"
                                                href="{{ route('shop.clear_wishlist') }}"><i class="ion-ios-reload"></i>
                                                Clear All</a>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-danger">
                                        <button style="border: none; outline:none; background: transparent" type="button"
                                            class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        </strong>Empty Cart, <a href="{{ route('shop') }}">click here</a> to continue
                                        shopping
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--== End Wishlist Area Wrapper ==-->
    </main>
@endsection

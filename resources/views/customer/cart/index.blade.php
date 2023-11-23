@extends('layouts.customer')

@section('title', 'Cart')

@section('main')
    <main class="main-content">
        <!--== Start Page Title Area ==-->
        <section class="page-title-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 m-auto">
                        <div class="page-title-content text-center">
                            <h2 class="title">Cart</h2>
                            <div class="bread-crumbs"><a href="{{ route('home.index') }}"> Home </a><span
                                    class="breadcrumb-sep"> //
                                </span><span class="active"> Cart</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Title Area ==-->

        <!--== Start Cart Area Wrapper ==-->
        <section class="product-area cart-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="section-title text-center">
                            <h2 class="title">Cart</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table-wrap">
                            <div class="cart-table table-responsive">
                                @if (count($carts_view) > 0)
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="width-thumbnail"></th>
                                                <th class="width-name">Product</th>
                                                <th class="width-price"> Price</th>
                                                <th class="width-quantity">Quantity</th>
                                                <th class="width-subtotal">Subtotal</th>
                                                <th class="width-remove"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($carts_view as $item)
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="shop-single-product.html"><img
                                                                src="{{ url('') }}/uploads/product/{{ $item['image'] }}"
                                                                alt="Image"></a>
                                                    </td>
                                                    <td class="product-name">
                                                        <h5><a href="shop-single-product.html">{{ $item['name'] }}</a></h5>
                                                    </td>
                                                    <td class="product-price"><span
                                                            class="amount">${{ number_format($item['price'], 2, '.', ',') }}</span>
                                                    </td>
                                                    <td class="cart-quality">
                                                        <div class="product-details-quality">
                                                            <form method="POST"
                                                                action="{{ route('shop.update_cart', $item['product_id']) }}"
                                                                class="col-md-4 col-lg-4 col-xl-3 d-flex">
                                                                @csrf
                                                                <button class="btn btn-link px-2"
                                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                                    <i class="ion-minus"></i>
                                                                </button>

                                                                <input id="form1" min="0" name="quantity"
                                                                    value="{{ $item['quantity'] }}" type="number"
                                                                    class="form-control form-control-sm" />

                                                                <button class="btn btn-link px-2"
                                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                                    <i class="ion-plus"></i>
                                                                </button>

                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td class="product-total">
                                                        <span>${{ number_format($item['price'] * $item['quantity'], 2, '.', ',') }}</span>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a onclick="return confirm('Do you want to delete all items ?')"
                                                            href="{{ route('shop.delete_cart', $item['product_id']) }}"><i
                                                                class="ion-ios-trash-outline"></i></a>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Empty Data</strong>
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
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
                        <div class="cart-shiping-update-wrapper">
                            <div class="cart-shiping-btn continure-btn">
                                <a class="btn btn-link" onclick="return confirm('Do you want to delete all items ?')"
                                    href="{{ route('shop.clear_cart') }}"><i class="ion-ios-reload"></i>
                                    Clear All</a>
                            </div>
                            <div class="cart-shiping-btn update-btn">
                                <a class="btn btn-link" href="{{ route('checkout') }}">
                                    <span style="margin-right: 10px;">Checkout</span><i class="ion-ios-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
            </div>
        </section>
        <!--== End Cart Area Wrapper ==-->
    </main>
@endsection

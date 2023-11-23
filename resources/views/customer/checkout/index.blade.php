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
                            <h2 class="title">Checkout</h2>
                            <div class="bread-crumbs"><a href="{{ route('home.index') }}"> Home </a><span
                                    class="breadcrumb-sep"> //
                                </span><span class="active"> Checkout</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Title Area ==-->

        <!--== Start Checkout Area Wrapper ==-->
        <section class="product-area shop-checkout-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="section-title text-center">
                            <h2 class="title">Checkout</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Billing Details</h3>
                            @if (count($carts->getCart()) > 0)
                                <form action="{{ route('post_checkout') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="billing-info mb-20">
                                                <label>Full Name <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="name"
                                                    value="{{ old('name') ?? $customer->name }}">
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="billing-info mb-20">
                                                <label>Street Address <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <input name="street_address" class="billing-address"
                                                    placeholder="Enter your street address" type="text"
                                                    value="{{ old('street_address') ?? $customer->street_address }}">
                                                @error('street_address')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="billing-info mb-20">
                                                <label>Town / City <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="city" placeholder="Enter your town/city"
                                                    value="{{ old('city') ?? $customer->town_city }}">
                                                @error('city')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="billing-info mb-20">
                                                <label>Phone <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="phone" placeholder="Enter your phone"
                                                    value="{{ old('phone') ?? $customer->phone }}">
                                                @error('phone')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="billing-info mb-20">
                                                <label>Email Address <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <input type="text" name="email" value="{{ old('email') ?? $customer->email }}">
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="additional-info-wrap">
                                        <label>Order notes (optional)</label>
                                        <textarea placeholder="Notes about your order, e.g. special notes for delivery. " name="message">{{ old('message') }}</textarea>
                                    </div>
                                    <div class="your-order-area">
                                        <div class="place-order">
                                            <button type="submit">Place Order</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5">
                        @if (count($carts->getCart()) > 0)
                            <div class="your-order-area">
                                <h3>Your order</h3>
                                <div class="your-order-wrap">
                                    <div class="your-order-info-wrap">
                                        <div class="your-order-title">
                                            <h4>Product <span>Subtotal</span></h4>
                                        </div>
                                        <div class="your-order-product">
                                            <ul>
                                                @foreach ($carts->getCart() as $item)
                                                    <li>{{ $item['name'] }} × {{ $item['quantity'] }}
                                                        <span>${{ number_format($item['quantity'] * $item['price'], 2, '.', ',') }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="your-order-total">
                                            <h3>Total <span>${{number_format($carts->getTotalPrice(), 2, '.', ',')}} </span></h3>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="pay-top sin-payment">
                                            <input id="payment-method-3" class="input-radio" type="radio"
                                                value="cheque" checked name="payment_method">
                                            <label for="payment-method-3">Cash on delivery </label>
                                            <div class="payment-box payment_method_bacs">
                                                <p>Pay with cash upon delivery. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!--== End Checkout Area Wrapper ==-->
    </main>
@endsection

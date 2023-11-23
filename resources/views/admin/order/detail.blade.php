@extends('layouts.admin')

@section('title', 'Product')

@section('main')
    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Order
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">

                        <div class="table-responsive">
                            <h2 class="text-center">Products list</h2>
                            <hr>
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderDetails as $item)
                                        <tr>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                <img style="height: 60px;" data-toggle="tooltip"
                                                                    title="Image" data-placement="bottom"
                                                                    src="{{url('')}}/uploads/product/{{$item->product->image}}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{ $item->product->name }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $item->quantity }}
                                            </td>
                                            <td class="text-center">$ {{ number_format($item->price, 2, '.', ',')  }}</td>
                                            <td class="text-center">
                                                ${{ number_format($item->quantity * $item->price, 2, '.', ',')  }}
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>



                        <h2 class="text-center mt-5">Order info</h2>
                        <hr>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">
                                Full Name
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->full_name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->email }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="phone" class="col-md-3 text-md-right col-form-label">Phone</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->phone }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                Street Address</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->street_address }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="town_city" class="col-md-3 text-md-right col-form-label">
                                Town City</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->town_city }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="payment_type" class="col-md-3 text-md-right col-form-label">Payment Type</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->payment_type }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description" class="col-md-3 text-md-right col-form-label">Message</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->message ?? 'No mesage' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection

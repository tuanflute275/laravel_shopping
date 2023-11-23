@extends('layouts.admin')

@section('title', 'Order')

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
                @if ($orders->count() > 0)
                    <div class="main-card mb-3 card">

                        <div class="card-header">

                            <form>
                                <div class="input-group">
                                    <input type="search" name="keyword" id="search" placeholder="Search everything"
                                        class="form-control">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i>&nbsp;
                                            Search
                                        </button>
                                    </span>
                                </div>
                            </form>

                            <form action="" method="get" class="ml-3">
                                <div class="form-group d-flex m-0">
                                    <select class="form-control mt-1 rounded-0" name="order" id="order">
                                        <option value="full_name-ASC">Name (a - z)</option>
                                        <option value="full_name-DESC">Name (z - a)</option>
                                        <option value="none">Default</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary py-2 rounded-0"
                                        style="margin: auto;margin-top: 4px;">
                                        Filter
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Customer</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Message</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $item)
                                        <tr>
                                            <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                <img style="height: 60px;" data-toggle="tooltip"
                                                                    title="Image" data-placement="bottom"
                                                                    src="/uploads/product/{{ $item->image }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">
                                                                {{ $item->full_name }}</div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $item->street_address . ' - ' . $item->town_city }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->email }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->message ?? 'No mesage' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->orderDetails->count() }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.order.show', $item->id) }}"
                                                    class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                                    Details
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <div class="container my-3">
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        <strong>Empty Data</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection

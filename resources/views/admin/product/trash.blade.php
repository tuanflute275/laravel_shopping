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
                        Products
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary mb-3" href="{{ route('admin.product.index') }}" role="button">back</a>
                <div class="main-card mb-3 card">

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $item)
                                    <tr>
                                        <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $item->name }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img style="height: 60px;" data-toggle="tooltip" title="Image"
                                                        data-placement="bottom" src="/uploads/product/{{ $item->image }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('admin.product.restore', $item->id) }}" data-toggle="tooltip"
                                                title="Restore" data-placement="bottom"
                                                class="btn btn-outline-warning border-0 btn-sm pr-1">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-edit fa-w-20"></i>
                                                </span>
                                            </a>
                                            <form class="d-inline"
                                                action="{{ route('admin.product.force_delete', $item->id) }}"
                                                method="post">
                                                @method('DELETE') @csrf
                                                <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                    type="submit" data-toggle="tooltip" title="Delete"
                                                    data-placement="bottom"
                                                    onclick="return confirm('Do you really want to delete this item?')">
                                                    <span class="btn-icon-wrapper opacity-8">
                                                        <i class="fa fa-trash fa-w-20"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="container my-3">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection

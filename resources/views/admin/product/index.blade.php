@extends('layouts.admin')

@section('title', 'Product')

@section('css')
    <style>
        .card-header {
            margin-left: 20px;
        }

        @media only screen and (max-width: 600px) {
            .card-header {
                margin-left: 0;
            }
        }
    </style>
@endsection

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
                        Product
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <a href="{{ route('admin.product.create') }}" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        Create
                    </a>
                    <a href="{{ route('admin.product.recycle_bin') }}" title="View Trash"
                        class="btn btn-outline-warning rounded-0"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if ($products->count() > 0)
                    <div class="main-card mb-3 card">

                        <div class="card-header">

                            <div class="row align-items-center justify-content-center">
                                <form class="mr-3">
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

                                <form action="" method="get">
                                    <div class="form-group d-flex m-0">
                                        <select class="form-control mt-1 rounded-0" name="order" id="order">
                                            <option value="name-ASC">Name (a - z)</option>
                                            <option value="name-DESC">Name (z - a)</option>
                                            <option value="price-ASC">Price (low - high)</option>
                                            <option value="price-DESC">Price (high - low)</option>
                                            <option value="none">Default</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary py-2 rounded-0"
                                            style="margin: auto;margin-top: 4px;">
                                            Filter
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Name / Brand</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Discount</th>
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
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                <img style="height: 60px;" data-toggle="tooltip"
                                                                    title="Image" data-placement="bottom"
                                                                    src="/uploads/product/{{ $item->image }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{ $item->name }}</div>
                                                            <div class="widget-subheading opacity-7">
                                                                {{ $item->brand->name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">${{ number_format($item->price, 2, '.', ',') }}</td>
                                            <td class="text-center">${{ number_format($item->discount, 2, '.', ',') }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.product.show', $item->id) }}"
                                                    class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                                    Details
                                                </a>
                                                <a href="{{ route('admin.product.edit', $item->id) }}"
                                                    data-toggle="tooltip" title="Edit" data-placement="bottom"
                                                    class="btn btn-outline-warning border-0 btn-sm">
                                                    <span class="btn-icon-wrapper opacity-8">
                                                        <i class="fa fa-edit fa-w-20"></i>
                                                    </span>
                                                </a>
                                                <form action="{{ route('admin.product.destroy', $item->id) }}"
                                                    class="d-inline" action="" method="post">
                                                    @csrf @method('DELETE')
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

@section('script')
    <script type="text/javascript">
        var sort = document.getElementById("sort");
        sort.addEventListener("click", (event) => {
            alert('hi')
        });
    </script>
@endsection()

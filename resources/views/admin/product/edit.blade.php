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
                        Product
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
                    <div class="card-body">
                        <form action="{{ route('admin.product.update', $product->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div class="position-relative row form-group justify-content-center">
                                <div class="col-md-9 col-xl-8 ">
                                    @if (!$product->image)
                                        <img style="height: 200px;width:200px;cursor: pointer;"
                                            class="thumbnail rounded-circle" data-toggle="tooltip"
                                            title="Click to change the image" data-placement="bottom"
                                            src="{{ url('') }}/dist/images/add-image-icon.jpg" alt="Image">
                                    @else
                                        <img style="height: 200px; cursor: pointer;" class="thumbnail rounded-circle"
                                            data-toggle="tooltip" title="Click to change the image" data-placement="bottom"
                                            src="/uploads/product/{{ $product->image }}" alt="Avatar">
                                    @endif
                                    <input name="image" type="file" onchange="changeImg(this)"
                                        class="image form-control-file" style="display: none;" value="">
                                    <input type="hidden" name="image_old" value="">
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="brand_id" class="col-md-3 text-md-right col-form-label">Brand</label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="brand_id" id="brand_id" class="form-control">
                                        @foreach ($brands as $brand)
                                            @if ($product->brand_id == $brand->id)
                                                <option value="{{ $brand->id }}" selected
                                                    {{ old('brand_id') == $brand->id ? 'checked' : '' }}>
                                                    {{ $brand->id }} - {{ $brand->name }}</option>
                                            @else
                                                <option value="{{ $brand->id }}"
                                                    {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->id }} - {{ $brand->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="product_category_id"
                                    class="col-md-3 text-md-right col-form-label">Category</label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="product_category_id" id="product_category_id" class="form-control">
                                        @foreach ($categories as $cate)
                                            @if ($product->product_category_id == $cate->id)
                                                <option value="{{ $cate->id }}" selected
                                                    {{ old('product_category_id') == $cate->id ? 'checked' : '' }}>
                                                    {{ $cate->id }} - {{ $cate->name }}</option>
                                            @else
                                                <option value="{{ $cate->id }}"
                                                    {{ old('product_category_id') == $cate->id ? 'selected' : '' }}>
                                                    {{ $cate->id }} - {{ $cate->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="name" id="name" placeholder="Name" type="text"
                                        class="form-control" value="{{ old('name') ?? $product->name }}">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="content" class="col-md-3 text-md-right col-form-label">Content</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="content" id="content" placeholder="Content" type="text"
                                        class="form-control" value="{{ old('content') ?? $product->content }}">
                                    @error('content')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="price" class="col-md-3 text-md-right col-form-label">Price</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="price" id="price" placeholder="Price" type="text"
                                        class="form-control" value="{{ old('price') ?? $product->price }}">
                                    @error('price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="discount" class="col-md-3 text-md-right col-form-label">Discount</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="discount" id="discount" placeholder="Discount" type="text"
                                        class="form-control" value="{{ old('discount') ?? $product->discount }}">
                                    @error('discount')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="description" class="col-md-3 text-md-right col-form-label">Description</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea class="form-control" name="description" id="description" placeholder="Description">{{ old('description') ?? $product->description }}</textarea>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="{{ route('admin.product.index') }}"
                                        class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>Cancel</span>
                                    </a>

                                    <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection

@extends('layouts.admin')

@section('title', 'Blog')

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
                        Blog
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
                        <form action="{{ route('admin.blog.update', $blog->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <input type="hidden" name="id" value="{{ $blog->id }}">
                            <div class="position-relative row form-group">
                                <label for="image" class="col-md-3 text-md-right col-form-label">Image</label>
                                <div class="col-md-9 col-xl-8">
                                    @if (!$blog->image)
                                            <img style="height: 200px;width:200px;cursor: pointer;" class="thumbnail rounded-circle"
                                            data-toggle="tooltip" title="Click to change the image" data-placement="bottom"
                                            src="{{ url('') }}/dist/images/add-image-icon.jpg" alt="Image">
                                    @else
                                        <img style="height: 200px;width:200px; cursor: pointer;" class="thumbnail rounded-circle"
                                            data-toggle="tooltip" title="Click to change the image" data-placement="bottom"
                                            src="{{ url('') }}/uploads/blogs/{{ $blog->image }}" alt="Avatar">
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
                                <label for="title" class="col-md-3 text-md-right col-form-label">Title</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="title" id="name" placeholder="Title" type="text"
                                        class="form-control" value="{{ old('title') ?? $blog->title }}">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="sub_title" class="col-md-3 text-md-right col-form-label">subTitle</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="sub_title" id="name" placeholder="subTitle" type="text"
                                        class="form-control" value="{{ old('sub_title') ?? $blog->subtitle }}">
                                    @error('sub_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="content" class="col-md-3 text-md-right col-form-label">Content</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea class="form-control" name="content" id="content" placeholder="content">{{ old('sub_title') ?? $blog->content }}</textarea>
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
        CKEDITOR.replace('content');
    </script>
@endsection

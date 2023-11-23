@extends('layouts.admin')

@section('title', 'User')

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
                        User
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
                        <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative row form-group">
                                <label for="image" class="col-md-3 text-md-right col-form-label">Avatar</label>
                                <div class="col-md-9 col-xl-8">
                                    <img style="height: 200px;width:200px;cursor: pointer;" class="thumbnail rounded-circle"
                                        data-toggle="tooltip" title="Click to change the image" data-placement="bottom"
                                        src="{{ url('') }}/dist/images/add-image-icon.jpg" alt="Avatar">
                                    <input name="image" type="file" onchange="changeImg(this)"
                                        class="image form-control-file" style="display: none;" value="">
                                    <input type="hidden" name="image_old" value="">
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="name" id="name" placeholder="Name" type="text"
                                        class="form-control" value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="email" id="email" placeholder="Email" type="email"
                                        class="form-control" value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="password" class="col-md-3 text-md-right col-form-label">Password</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="password" id="password" placeholder="Password" type="password"
                                        class="form-control" value="{{ old('password') }}">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="password_confirmation" class="col-md-3 text-md-right col-form-label">Confirm
                                    Password</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="password_confirmation" id="password_confirmation"
                                        placeholder="Confirm Password" type="password" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="level" class="col-md-3 text-md-right col-form-label">Level</label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="level" id="level" class="form-control">
                                        <option value="">-- Level --</option>
                                        <option value=0>
                                            Customer
                                        </option>
                                        <option value=1>
                                            Admin
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="description" class="col-md-3 text-md-right col-form-label">Description</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="{{ route('admin.user.index') }}" class="border-0 btn btn-outline-danger mr-1">
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

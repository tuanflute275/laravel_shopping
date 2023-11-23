@extends('layouts.customer')

@section('title', 'Brand')

@section('main')

    <div class="container bootstrap snippet my-5">
        <form action="{{ route('user.editUser') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-3"><!--left col-->

                    <input type="hidden" name="id" value="{{ Auth::user()->id }}" />


                    <div class="col-md-9 col-xl-8">
                        @if (!Auth::user()->avatar)
                            <img style="cursor: pointer; margin-bottom: 10px;" class="thumbnail rounded-circle"
                                data-toggle="tooltip" title="Click to change the image" data-placement="bottom"
                                src="/uploads/default-user.png" alt="Avatar">
                        @else
                            <img style="cursor: pointer; margin-bottom: 10px;" class="thumbnail rounded-circle"
                                data-toggle="tooltip" title="Click to change the image" data-placement="bottom"
                                src="/uploads/user/{{ Auth::user()->avatar }}" alt="Avatar">
                        @endif
                        <input name="image" type="file" onchange="changeImg(this)" class="image form-control-file"
                            style="display: none;">
                        <h2>{{ Auth::user()->name }}</h2>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div><!--/col-3-->
                <div class="col-sm-9">
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>Full Name</h4>
                                </label>
                                <input type="text" class="form-control" name="name" id="first_name"
                                    placeholder="full name" value="{{ Auth::user()->name }}"
                                    title="enter your first name if any.">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ Auth::user()->email }}" placeholder="you@email.com" title="enter your email.">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i
                                        class="glyphicon glyphicon-ok-sign"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div><!--/tab-content-->

            </div><!--/col-9-->
        </form>
    </div>
@endsection

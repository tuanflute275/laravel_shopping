<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register | Admin</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="CodeLean Design">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{ url('') }}/dist/css/main.css" rel="stylesheet">
</head>

<body>
    {{-- <a name="" id="" class="btn btn-primary" href="{{ route('admin.index') }}" role="button">index</a> --}}
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="app-logo-inverse mx-auto mb-3"></div>
                        @if (session('message'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Welcome back,</div>
                                            <span>Please sign in to your account below.</span>
                                        </h4>
                                    </div>
                                    <form action="{{ route('admin.store') }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="name" id="name" placeholder="Username here..."
                                                        type="text"
                                                        class="form-control @error('name') is-invalid @enderror rounded-0"
                                                        value="{{ old('name') }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="email" id="email" placeholder="Email here..."
                                                        type="email"
                                                        class="form-control @error('email') is-invalid @enderror rounded-0"
                                                        value="{{ old('email') }}">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password" id="examplePassword"
                                                        placeholder="Password here..." type="password"
                                                        class="form-control @error('password') is-invalid @enderror rounded-0">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password_confirmation" id="password_confirmation"
                                                        placeholder="password_confirmation here..." type="password"
                                                        class="form-control @error('password_confirmation') is-invalid @enderror rounded-0">
                                                    @error('password_confirmation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div>
                                        <div class="float-left">
                                            <button type="submit" class="btn btn-primary btn-lg">SignUp</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">© Tuanfluteee275</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ url('') }}/dist/js/main.js"></script>
</body>

</html>

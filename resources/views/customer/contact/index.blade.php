@extends('layouts.customer')

@section('title', 'Contact Page')

@section('main')
    <main class="main-content">
        <!--== Start Page Title Area ==-->
        <section class="page-title-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 m-auto">
                        <div class="page-title-content text-center">
                            <h2 class="title">Contact Us</h2>
                            <div class="bread-crumbs"><a href="{{ route('home.index') }}"> Home </a><span
                                    class="breadcrumb-sep"> //
                                </span><span class="active"> Contact Us</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Title Area ==-->

        <!--== Start Contact Area ==-->
        <section class="contact-area">
            <div class="container">
                <div class="contact-page-wrap">
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <div class="contact-info-items text-center">
                                <div class="row row-gutter-80">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="contact-info-item">
                                            <div class="icon">
                                                <img class="icon-img" src="assets/img/icons/5.png" alt="Icon">
                                            </div>
                                            <h2>Address</h2>
                                            <div class="content">
                                                <p>238 Hoàng Quốc Việt</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="contact-info-item mt-xs-30">
                                            <div class="icon">
                                                <img class="icon-img" src="assets/img/icons/6.png" alt="Icon">
                                            </div>
                                            <h2>Phone No</h2>
                                            <div class="content">
                                                <a href="tel://+00123456789">+84386564543</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="contact-info-item mt-sm-30">
                                            <div class="icon">
                                                <img class="icon-img" src="assets/img/icons/7.png" alt="Icon">
                                            </div>
                                            <h2>Email / Web</h2>
                                            <div class="content">
                                                <a href="mailto://demo@example.com">tuanflute275@gmail.com</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-map-area">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6651780765947!2d105.79398507504908!3d21.046078987183837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3adfaac9f3%3A0xc95adc91a647bf66!2zMjM4IEhvw6BuZyBRdeG7kWMgVmnhu4d0LCBOZ2jEqWEgVMOibiwgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1694880076943!5m2!1svi!2s"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <div class="contact-form">
                                <!-- Message Notification -->
                                <div class="form-message"></div>
                                <form action="{{ route('postContact') }}" class="contact-form-wrapper"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="section-title">
                                                <h2 class="title">Send A Quest</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control" type="email" name="email"
                                                            value="{{ old('email') }}" placeholder="Email *">
                                                        @error('email')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="message" placeholder="Message">{{ old('message') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group text-center">
                                                        <button class="btn btn-theme" type="submit">Send Message</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Contact Area ==-->
    </main>
@endsection

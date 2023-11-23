@extends('layouts.customer')

@section('title', 'Blog')

@section('main')
    <main class="main-content">
        <!--== Start Page Title Area ==-->
        <section class="page-title-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 m-auto">
                        <div class="page-title-content text-center">
                            <h2 class="title">Blog</h2>
                            <div class="bread-crumbs"><a href="{{ route('home.index') }}"> Home </a><span
                                    class="breadcrumb-sep"> //
                                </span><span class="active"> Blog</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Title Area ==-->

        <!--== Start Blog Area Wrapper ==-->
        <section class="blog-area blog-grid-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-content-area">
                            <div class="row">
                                @forelse ($blogs as $item)
                                    <div class="col-sm-6 col-md-4">
                                        <!--== Start Blog Post Item ==-->
                                        <div class="post-item">
                                            <div class="thumb">
                                                <a href="{{ route('blogDetail', $item->id) }}"><img
                                                        src="{{ url('') }}/uploads/blogs/{{ $item->image }}"
                                                        alt="Image"></a>
                                            </div>
                                            <div class="content">
                                                <div class="meta">By, <a class="author">{{ $item->user->name }}
                                                    </a><span class="dots"></span><span class="post-date">
                                                        {{ date('Y-m-d', strtotime($item->created_at)) }}
                                                    </span>
                                                </div>
                                                <h4 class="title">
                                                    <a href="{{ route('blogDetail', $item->id) }}">{{ $item->title }}</a>
                                                </h4>
                                                <a class="btn-theme" href="{{ route('blogDetail', $item->id) }}">Read
                                                    More</a>
                                            </div>
                                        </div>
                                        <!--== End Blog Post Item ==-->
                                    </div>
                                @empty
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Empty Data</strong>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container my-3">
                    {{ $blogs->links() }}
                </div>
            </div>
        </section>
        <!--== End Blog Area Wrapper ==-->
    </main>
@endsection

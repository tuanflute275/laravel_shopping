@extends('layouts.customer')

@section('title', 'blogDetail')

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
        <section class="blog-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="post-details-content">
                            <div class="post-details-body">
                                <div class="thumb">
                                    <img style="height: 500px;
                                    object-fit: cover;"
                                        class="w-100" src="{{ url('') }}/uploads/blogs/{{ $blog->image }}"
                                        alt="Image" />
                                </div>
                                <div class="content">
                                    <div class="meta">By, <a class="author">{{ $blog->user->name }}
                                        </a><span class="dots"></span><span
                                            class="post-date">{{ date('Y-m-d', strtotime($blog->created_at)) }}</span></div>
                                    <h4 class="title">{{ $blog->title }}
                                    </h4>
                                    @if ($blog->subtitle)
                                        <div class="blockquote-area">
                                            <blockquote class="blockquote-style">
                                                <p>{!! $blog->subtitle ? $blog->subtitle : 'No text' !!}</p>
                                            </blockquote>
                                        </div>
                                    @endif
                                    <p>{!! $blog->content !!}</p>
                                </div>
                            </div>
                            <div class="comment-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comment-view-area">
                                            <h2 class="title">{{ $blogComments->count() }} Comments</h2>
                                            @forelse ($blogComments as $item)
                                                <div class="comment-content">
                                                    <div class="single-comment">
                                                        <div class="author-info">
                                                            <div class="thumb">
                                                                @if (!$item->user->avatar)
                                                                    <img style="margin-right: 10px;" width="100"
                                                                        class="rounded-circle"
                                                                        src="/uploads/default-user.png" alt="">
                                                                @else
                                                                    <img width="100" src="{{ url('') }}/uploads/user/{{ $item->user->avatar }}"
                                                                        alt="Image">
                                                                @endif
                                                            </div>
                                                            <div class="author-details border-bottom">
                                                                <ul>
                                                                    <li>{{ $item->user->name }}</li>
                                                                </ul>
                                                                <p>{!! $item->messages !!}</p>
                                                                <a class="btn-theme" href="{{ route('deleteCommentBlog', $item->id) }}">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Empty Data</strong>
                                                </div>
                                            @endforelse
                                        </div>
                                        <div class="comment-form-wrap mb-lg-0">
                                            <form class="comment-form-wrapper" id="comment-form"
                                                action="{{ route('postBlogCmt', $blog->id) }}" method="POST">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="section-title m-0">
                                                            <h2 class="title">Leave a Comment</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="email"
                                                                        name="email" value="{{ old('email') }}"
                                                                        placeholder="Email *">
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
                                                                <div class="form-group">
                                                                    <button class="btn btn-theme" type="submit">Send a
                                                                        Comment</button>
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
                    </div>
                </div>
        </section>
        <!--== End Blog Area Wrapper ==-->
    </main>
@endsection

@extends('layouts.main.master')
@section('title')
    {{ $title_page }}
@endsection
@section('description')
    Tin tức cập nhật
@endsection
@section('image')
    @php
    $anhweb = json_decode($firstImage, true);
 
@endphp
    {{ $anhweb[0] }}
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-header parallaxie " style="background-image: url('{{ asset('frontend/images/zon.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque" style="font-size: 40px">{{ $title_page }}</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title_page }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Page Blog Section Start -->
    <div class="page-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="menu-web">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light flex-column align-items-start menu-tuan-l"
                            style="min-height: auto; width: 220px;">
                            <ul class="navbar-nav flex-column w-100">
                                @foreach ($blogCate as $item)
                                    <li class="nav-item mb-2">
                                        <a class="nav-link" href="{{ route('listCateBlog', ['slug' => $item->slug]) }}">
                                            {!! languageName($item->name) !!}
                                        </a>
                                    </li>
                                @endforeach

                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row">
                        @foreach ($blog as $item)
                            <div class="col-lg-4 col-md-4">
                                <!-- Post Item Start -->
                                <div class="post-item wow fadeInUp">
                                    <div class="post-featured-image">
                                        <a href="{{ route('detailBlog', ['slug' => $item->slug]) }}" data-cursor-text="View">
                                            <figure class="image-anime">
                                                <img src="{{ $item->image }}" alt="">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="blog-item-body">
                                        <div class="post-item-content">
                                            <h3><a
                                                    href="{{ route('detailBlog', ['slug' => $item->slug]) }}">{{ languageName($item->title) }}</a>
                                            </h3>
                                        </div>

                                    </div>
                                </div>
                                <!-- Post Item End -->
                            </div>
                        @endforeach

                    </div>

                    <div class="col-lg-12">
                        <!-- Page Pagination Start -->
                        <div class="page-pagination wow fadeInUp" data-wow-delay="1.2s">
                            <ul class="pagination">
                                {{ $blog->links() }}
                            </ul>
                        </div>
                        <!-- Page Pagination End -->
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- Our Blog Section End -->
        <!-- Reserve Table Section Start -->
    @endsection

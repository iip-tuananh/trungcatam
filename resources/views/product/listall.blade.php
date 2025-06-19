@extends('layouts.main.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    Danh sách {{ $title }}
@endsection
@section('image')
    @php
    $anhweb = json_decode($firstImage, true);
 
@endphp
    {{ $anhweb[0] }}
@endsection
@section('js')
   
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
                        <h1 class="text-anime-style-2" data-cursor="-opaque" style="font-size: 40px">{{ $title }}
                        </h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
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
                            style="min-height: auto; width: auto;">
                            <ul class="navbar-nav flex-column w-100" id="menu-left">
                                @foreach ($categoryhome as $cate)
                                    @php
                                        // Kiểm tra active cho menu cha
                                        $isActive =
                                            request()->routeIs('allListProCate') && request('danhmuc') == $cate->slug;
                                        // Kiểm tra active cho menu con
                                        $isChildActive = false;
                                        if (isset($cate->typeCate)) {
                                            foreach ($cate->typeCate as $child) {
                                                if (request('loaidanhmuc') == $child->slug) {
                                                    $isChildActive = true;
                                                }
                                            }
                                        }
                                    @endphp
                                    <li class="nav-item mb-2 sub-menu{{ $isActive || $isChildActive ? ' open' : '' }}">
                                        <a class="nav-link{{ $isActive ? ' active' : '' }}"
                                            href="{{ route('allListProCate', ['danhmuc' => $cate->slug]) }}">
                                            {!! languageName($cate->name) !!}
                                        </a>
                                        @if (isset($cate->typeCate) && count($cate->typeCate) > 0)
                                            <ul class="submenu list-unstyled">
                                                @foreach ($cate->typeCate as $child)
                                                    <li>
                                                        <a class="nav-link{{ request('loaidanhmuc') == $child->slug ? ' active' : '' }}"
                                                            href="{{ route('allListType', ['danhmuc' => $cate->slug, 'loaidanhmuc' => $child->slug]) }}">
                                                            {!! languageName($child->name) !!}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                        <br>
                        <br>
                        <aside class="aside-item filter-price dq-filterxx">

                            <br>
                            <div class="aside-content filter-group scroll">
                                <div class="showstt d-none">
                                    <!--<span>Mức giá</span> -->
                                </div>
                                <ul style="">
                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label class="custom-checkbox" for="filter-duoi-5000000">
                                                <input type="checkbox" id="filter-duoi-5000000" class="price-filter"
                                                    value="price_min:0;price_max:5000000">
                                                <i class="fa"></i>
                                                Giá dưới 5,000,000₫
                                            </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label class="custom-checkbox" for="filter-5000000-7000000">
                                                <input type="checkbox" id="filter-5000000-7000000" class="price-filter"
                                                    value="price_min:5000000;price_max:7000000">
                                                <i class="fa"></i>
                                                5,000,000₫ - 7,000,000₫
                                            </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label class="custom-checkbox" for="filter-7000000-10000000">
                                                <input type="checkbox" id="filter-7000000-10000000" class="price-filter"
                                                    value="price_min:7000000;price_max:10000000">
                                                <i class="fa"></i>
                                                7,000,000₫ - 10,000,000₫
                                            </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label class="custom-checkbox" for="filter-10000000-12000000">
                                                <input type="checkbox" id="filter-10000000-12000000" class="price-filter"
                                                    value="price_min:10000000;price_max:12000000">
                                                <i class="fa"></i>
                                                10,000,000₫ - 12,000,000₫
                                            </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label class="custom-checkbox" for="filter-12000000-15000000">
                                                <input type="checkbox" id="filter-12000000-15000000" class="price-filter"
                                                    value="price_min:12000000;price_max:15000000">
                                                <i class="fa"></i>
                                                12,000,000₫ - 15,000,000₫
                                            </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label class="custom-checkbox" for="filter-15000000-20000000">
                                                <input type="checkbox" id="filter-15000000-20000000" class="price-filter"
                                                    value="price_min:15000000;price_max:20000000">
                                                <i class="fa"></i>
                                                15,000,000₫ - 20,000,000₫
                                            </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label class="custom-checkbox" for="filter-20000000-30000000">
                                                <input type="checkbox" id="filter-20000000-30000000" class="price-filter"
                                                    value="price_min:20000000;price_max:30000000">
                                                <i class="fa"></i>
                                                20,000,000₫ - 30,000,000₫
                                            </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label class="custom-checkbox" for="filter-30000000-50000000">
                                                <input type="checkbox" id="filter-30000000-50000000" class="price-filter"
                                                    value="price_min:30000000;price_max:50000000">
                                                <i class="fa"></i>
                                                30,000,000₫ - 50,000,000₫
                                            </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label class="custom-checkbox" for="filter-50000000-85000000">
                                                <input type="checkbox" id="filter-50000000-85000000" class="price-filter"
                                                    value="price_min:50000000;price_max:85000000">
                                                <i class="fa"></i>
                                                50,000,000₫ - 85,000,000₫
                                            </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label class="custom-checkbox" for="filter-tren-85000000">
                                                <input type="checkbox" id="filter-tren-85000000" class="price-filter"
                                                    value="price_min:85000000;price_max:999999999">
                                                <i class="fa"></i>
                                                Giá trên 85,000,000₫
                                            </label>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row product-list">
                        @if ($list->count() > 0)
                            @foreach ($list as $item)
                                @php
                                    $img = json_decode($item->images, true);
                                @endphp
                                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                                    <div class="product-card">
                                        <!-- Product Image -->
                                        <a
                                            href="{{ route('detailProduct', ['cate' => $item['cate_slug'], 'type' => $item['type_slug'] ? $item['type_slug'] : 'loai', 'id' => $item['slug']]) }}">

                                            <div class="product-image-wrapper">


                                                <img src="{{ $img[0] }}" class="product-image anh1"
                                                    alt="{{ $item->name }}" class="">
                                                <img src="{{ isset($img[1]) ? asset($img[1]) : (isset($img[0]) ? asset('storage/' . $img[0]) : asset('images/no-image.png')) }}"
                                                    class="product-image anh2" alt="{{ $item->name }}">
                                                <!-- Discount Badge -->
                                                @if ($item->discount && $item->discount < $item->price)
                                                    @php
                                                        $discount = round(
                                                            (($item->price - $item->discount) / $item->price) * 100
                                                        );
                                                    @endphp
                                                    <div class="discount-badge">
                                                        {{ $discount }}%
                                                    </div>
                                                @endif

                                                <!-- Quick Actions -->

                                            </div>
                                        </a>

                                        <div class="product-info">
                                            <!-- Product Name -->
                                            <a
                                                href="{{ route('detailProduct', ['cate' => $item['cate_slug'], 'type' => $item['type_slug'] ? $item['type_slug'] : 'loai', 'id' => $item['slug']]) }}">
                                                <h3 class="product-name">{{ $item->name }}</h3>
                                            </a>

                                            <!-- Product Description -->


                                            <!-- Price Section -->
                                            <div class="price-wrapper">
                                                @if ($item->discount && $item->discount < $item->price)
                                                    <span class="current-price">
                                                        {{ number_format($item->discount, 0, ',', '.') }}₫
                                                    </span>
                                                    <span class="old-price">
                                                        {{ number_format($item->price, 0, ',', '.') }}₫
                                                    </span>
                                                @else
                                                    <span class="current-price">
                                                        {{ number_format($item->price, 0, ',', '.') }}₫
                                                    </span>
                                                @endif
                                            </div>
                                            @if ($item->price == 0)
                                                <a href="tel:{{ $setting->phone1 }}"><button class="lienhe">
                                                        <span>Liên hệ</span>
                                                    </button></a>
                                            @else
                                                <!-- Add to Cart Button -->
                                                <button class="add-to-cart-btn themgio" data-id="{{ $item['id'] }}"
                                                    data-product-name="{{ $item->name }}"
                                                    data-product-price="{{ $item->discount ?? $item->price }}">
                                                    <i class="fas fa-shopping-cart "></i>
                                                    <span>Thêm vào giỏ</span>
                                                </button>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <div class="no-products">
                                    <i class="fas fa-box-open"></i>
                                    <p>Không có sản phẩm nào để hiển thị</p>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="col-lg-12">
                        <!-- Page Pagination Start -->
                        <div class="page-pagination pagination-links wow fadeInUp" data-wow-delay="1.2s"
                            id="pagination-links">
                            <ul class="pagination">
                                {{ $list->links() }}
                            </ul>
                        </div>
                        <!-- Page Pagination End -->
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- CSS cho styling -->
        <style>
            /* Import Google Fonts */
            @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap');

            .navbar-nav .nav-link.active {
                background: #ffc107;
                color: #232323 !important;
                border-radius: 4px;
                font-weight: bold;
            }
        </style>

   
        <script></script>
    @endsection

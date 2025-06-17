@extends('layouts.main.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    Danh sách {{ $title }}
@endsection
@section('image')
    {{ url('' . $banner[0]->image) }}
@endsection
@section('script')
    <link rel="preload" as="script" href="{{env('AWS_R2_URL')}}/frontend/js/col.js" />
    <script src="{{env('AWS_R2_URL')}}/frontend/js/col.js" type="text/javascript"></script>
@endsection
@section('css')
    <link href="{{env('AWS_R2_URL')}}/frontend/css/breadcrumb_style.scss.css" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('content')
    <section class="bread-crumb mb-15">
        <span class="crumb-border"></span>
        <div class="container">
            <div class="row">
                <div class="col-12 a-left">
                    <ul class="breadcrumb m-0 px-0">
                        <li>
                            <a href="{{ route('home') }}" target="_self"><span>Trang chủ</span></a>
                            <span class="mr_lr">&nbsp;/&nbsp;</span>
                        </li>
                        <li class="active">
                            <span>{{ $title }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="collection-two-banner">
        <div class="container">
            <div class="row row-10">
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            if ($('.filter-menu .active > ul').length) {
                let _clone = $('.filter-menu .active > ul').clone();
                $('.filter-menu').html(_clone);
            } else {
                let _clone2 = $('.filter-menu .active').parent().clone();
                $('.filter-menu').html(_clone2);
            }

        });
    </script>
    <section class="section wrap_background">
        <div class="container">
            <div class="bg_collection section">
                <div class="row ">
                    <div class="col-12">
                        <div class="cloneFilterWrap">
                            {{-- <div class="cloneFilter">
                     <div class="cloneFilter__item filterTotal">
                        <div class="cloneFilter__title dropdown-title">
                           <span><i class="fa fa-filter"></i> Bộ lọc
                           </span>
                           <span class="filterTotal__count">0</span>
                           <div class="arrow-filter"></div>
                        </div>
                        <div class="cloneFilter__content dropdown-content filterTotal__content">
                           <div class="filterTotal__close text-right">
                              <a href="javascript:;"><i class="fa fa-times"></i> Đóng</a>
                           </div>
                           <div class="filterTotal__item full_item">
                              <div class="filterTotal__heading">
                                 <span>Hãng
                                 </span>
                              </div>
                              <ul>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="lg">
                                    LG
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="samsung">
                                    Samsung
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="sony">
                                    Sony
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="tcl">
                                    TCL
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="casper">
                                    Casper
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="xiaomi">
                                    XIAOMI
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="north-bayou">
                                    North Bayou
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="kloc">
                                    Kloc
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="philips">
                                    Philips
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="coocaa">
                                    Coocaa
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="xiaomi">
                                    Xiaomi
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="aqua">
                                    Aqua
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="iffalcon">
                                    iFFalcon
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="asanzo">
                                    Asanzo
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="jpe">
                                    JPE
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="toshiba">
                                    Toshiba
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="fantom">
                                    FANTOM
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="hisense">
                                    Hisense
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="sharp">
                                    Sharp
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="asher">
                                    Asher
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__vendor">
                                    <span data-val-handle="coex">
                                    Coex
                                    </span>
                                 </li>
                              </ul>
                           </div>
                           <div class="filter-border">
                           </div>
                           <div class="filterTotal__item">
                              <div class="filterTotal__heading">
                                 <span>Kích cỡ màn hình</span>
                              </div>
                              <ul>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="27-inch">
                                    27 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="32-inch">
                                    32 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="40-inch">
                                    40 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="42-inch">
                                    42 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="43-inch">
                                    43 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="48-inch">
                                    48 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="50-inch">
                                    50 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="55-inch">
                                    55 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="60-inch">
                                    60 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="65-inch">
                                    65 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="70-inch">
                                    70 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="75-inch">
                                    75 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="77-inch">
                                    77 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="82-inch">
                                    82 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="85-inch">
                                    85 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="88-inch">
                                    88 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="98-inch">
                                    98 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="99-inch">
                                    99 inch
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag2">
                                    <span data-val-handle="110-inch">
                                    110 inch
                                    </span>
                                 </li>
                              </ul>
                           </div>
                           <div class="filterTotal__item">
                              <div class="filterTotal__heading">
                                 <span>Giá</span>
                              </div>
                              <ul style="">
                                 <li class="vertical_filter__item vertical_filter__price">
                                    <span  data-val-handle="price-below-5000000">
                                    Giá dưới 5,000,000₫
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__price">
                                    <span data-val-handle="price-5000000-7000000">
                                    5,000,000₫ - 7,000,000₫
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__price">
                                    <span data-val-handle="price-7000000-10000000">
                                    7,000,000₫ - 10,000,000₫
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__price">
                                    <span data-val-handle="price-10000000-12000000">
                                    10,000,000₫ - 12,000,000₫
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__price">
                                    <span data-val-handle="price-12000000-15000000">
                                    12,000,000₫ - 15,000,000₫
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__price">
                                    <span data-val-handle="price-15000000-20000000">
                                    15,000,000₫ - 20,000,000₫
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__price">
                                    <span data-val-handle="price-20000000-30000000">
                                    20,000,000₫ - 30,000,000₫
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__price">
                                    <span data-val-handle="price-30000000-50000000">
                                    30,000,000₫ - 50,000,000₫
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__price">
                                    <span data-val-handle="price-50000000-85000000">
                                    50,000,000₫ - 85,000,000₫
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__price">
                                    <span data-val-handle="price-85000000">
                                    Giá trên 85,000,000₫
                                    </span>
                                 </li>
                              </ul>
                           </div>
                           <div class="filterTotal__item">
                              <div class="filterTotal__heading">
                                 <span>Độ phân giải</span>
                              </div>
                              <ul>
                                 <li class="vertical_filter__item vertical_filter__tag3">
                                    <span data-val-handle="hd">
                                    HD
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag3">
                                    <span data-val-handle="full-hd">
                                    Full HD
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag3">
                                    <span data-val-handle="2k">
                                    2K
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag3">
                                    <span data-val-handle="4k">
                                    4K
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag3">
                                    <span data-val-handle="8k">
                                    8K
                                    </span>
                                 </li>
                              </ul>
                           </div>
                           <div class="filterTotal__item">
                              <div class="filterTotal__heading">
                                 <span>Loại Tivi</span>
                              </div>
                              <ul>
                                 <li class="vertical_filter__item vertical_filter__tag4">
                                    <span data-val-handle="smart-tivi">
                                    Smart Tivi
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag4">
                                    <span data-val-handle="tivi-oled">
                                    Tivi OLED
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag4">
                                    <span data-val-handle="tivi-android">
                                    Tivi Android
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag4">
                                    <span data-val-handle="google-tivi">
                                    Google Tivi
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag4">
                                    <span data-val-handle="tivi-qled">
                                    Tivi QLED
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag4">
                                    <span data-val-handle="tivi-neo-qled">
                                    Tivi Neo Qled
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag4">
                                    <span data-val-handle="tivi-nanocell">
                                    Tivi Nanocell
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag4">
                                    <span data-val-handle="tivi-mini-led">
                                    Tivi Mini LED
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag4">
                                    <span data-val-handle="tivi-thiet-ke-dac-biet">
                                    Tivi thiết kế đặc biệt
                                    </span>
                                 </li>
                              </ul>
                           </div>
                           <div class="filterTotal__item">
                              <div class="filterTotal__heading">
                                 <span>Tiện ích</span>
                              </div>
                              <ul>
                                 <li class="vertical_filter__item vertical_filter__tag5">
                                    <span data-val-handle="tim-kiem-giong-noi-bang-tieng-viet">
                                    Tìm kiếm giọng nói bằng Tiếng Việt
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag5">
                                    <span data-val-handle="ket-noi-qua-bluetooth">
                                    Kết nối qua Bluetooth
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag5">
                                    <span data-val-handle="choi-game-tren-tivi">
                                    Chơi game trên tivi
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag5">
                                    <span data-val-handle="d-khien-giong-noi-khong-remote">
                                    Đ.khiển giọng nói không Remote
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag5">
                                    <span data-val-handle="chieu-man-hinh-qua-airplay-2">
                                    Chiếu màn hình qua AirPlay 2
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag5">
                                    <span data-val-handle="chieu-dien-thoai-len-tv-khong-day">
                                    Chiếu điện thoại lên TV (không dây)
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag5">
                                    <span data-val-handle="tro-ly-ao-google-assistant">
                                    Trợ lý ảo Google Assistant
                                    </span>
                                 </li>
                              </ul>
                           </div>
                           <div class="filterTotal__item">
                              <div class="filterTotal__heading">
                                 <span>Hệ điều hành</span>
                              </div>
                              <ul>
                                 <li class="vertical_filter__item vertical_filter__tag6">
                                    <span data-val-handle="android">
                                    Android
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag6">
                                    <span data-val-handle="webos">
                                    webOS
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag6">
                                    <span data-val-handle="tizenos">
                                    TizenOS
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag6">
                                    <span data-val-handle="google-tv">
                                    Google TV
                                    </span>
                                 </li>
                                 <li class="vertical_filter__item vertical_filter__tag6">
                                    <span data-val-handle="linux">
                                    Linux
                                    </span>
                                 </li>
                              </ul>
                           </div>
                           <div class="filter-border">
                           </div>
                           <div class="vertical-filter-action align-items-center justify-content-center d-none">
                              <a href="javascript:;" class="btn btn-remove">Bỏ chọn</a>
                              <a href="javascript:;" class="btn btn-submit">Xem kết quả</a>
                           </div>
                        </div>
                     </div>
                     <div class="cloneFilter__item">
                        <div class="cloneFilter__title dropdown-title">
                           <span>Hãng
                           <i class="fa fa-caret-down"></i></span>
                           <div class="arrow-filter"></div>
                        </div>
                        <div class="cloneFilter__content dropdown-content">
                           <ul>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="lg">
                                 LG
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="samsung">
                                 Samsung
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="sony">
                                 Sony
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="tcl">
                                 TCL
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="casper">
                                 Casper
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="xiaomi">
                                 XIAOMI
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="north-bayou">
                                 North Bayou
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="kloc">
                                 Kloc
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="philips">
                                 Philips
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="coocaa">
                                 Coocaa
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="xiaomi">
                                 Xiaomi
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="aqua">
                                 Aqua
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="iffalcon">
                                 iFFalcon
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="asanzo">
                                 Asanzo
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="jpe">
                                 JPE
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="toshiba">
                                 Toshiba
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="fantom">
                                 FANTOM
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="hisense">
                                 Hisense
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="sharp">
                                 Sharp
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="asher">
                                 Asher
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__vendor">
                                 <span data-val-handle="coex">
                                 Coex
                                 </span>
                              </li>
                           </ul>
                           <div class="vertical-filter-action align-items-center justify-content-center d-none">
                              <a href="javascript:;" class="btn btn-remove">Bỏ chọn</a>
                              <a href="javascript:;" class="btn btn-submit">Xem kết quả</a>
                           </div>
                        </div>
                     </div>
                     <div class="cloneFilter__item">
                        <div class="cloneFilter__title dropdown-title">
                           <span>
                           Kích cỡ màn hình
                           <i class="fa fa-caret-down"></i>
                           </span>
                           <div class="arrow-filter"></div>
                        </div>
                        <div class="cloneFilter__content dropdown-content">
                           <ul>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="27-inch">
                                 27 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="32-inch">
                                 32 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="40-inch">
                                 40 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="42-inch">
                                 42 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="43-inch">
                                 43 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="48-inch">
                                 48 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="50-inch">
                                 50 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="55-inch">
                                 55 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="60-inch">
                                 60 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="65-inch">
                                 65 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="70-inch">
                                 70 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="75-inch">
                                 75 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="77-inch">
                                 77 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="82-inch">
                                 82 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="85-inch">
                                 85 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="88-inch">
                                 88 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="98-inch">
                                 98 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="99-inch">
                                 99 inch
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag2">
                                 <span data-val-handle="110-inch">
                                 110 inch
                                 </span>
                              </li>
                           </ul>
                           <div class="vertical-filter-action align-items-center justify-content-center d-none">
                              <a href="javascript:;" class="btn btn-remove">Bỏ chọn</a>
                              <a href="javascript:;" class="btn btn-submit">Xem kết quả</a>
                           </div>
                        </div>
                     </div>
                     <div class="cloneFilter__item">
                        <div class="cloneFilter__title dropdown-title">
                           <span>
                           Giá
                           <i class="fa fa-caret-down"></i>
                           </span>
                           <div class="arrow-filter"></div>
                        </div>
                        <div class="cloneFilter__content dropdown-content">
                           <ul style="">
                              <li class="vertical_filter__item vertical_filter__price">
                                 <span  data-val-handle="price-below-5000000">
                                 Giá dưới 5,000,000₫
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__price">
                                 <span data-val-handle="price-5000000-7000000">
                                 5,000,000₫ - 7,000,000₫
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__price">
                                 <span data-val-handle="price-7000000-10000000">
                                 7,000,000₫ - 10,000,000₫
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__price">
                                 <span data-val-handle="price-10000000-12000000">
                                 10,000,000₫ - 12,000,000₫
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__price">
                                 <span data-val-handle="price-12000000-15000000">
                                 12,000,000₫ - 15,000,000₫
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__price">
                                 <span data-val-handle="price-15000000-20000000">
                                 15,000,000₫ - 20,000,000₫
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__price">
                                 <span data-val-handle="price-20000000-30000000">
                                 20,000,000₫ - 30,000,000₫
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__price">
                                 <span data-val-handle="price-30000000-50000000">
                                 30,000,000₫ - 50,000,000₫
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__price">
                                 <span data-val-handle="price-50000000-85000000">
                                 50,000,000₫ - 85,000,000₫
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__price">
                                 <span data-val-handle="price-85000000">
                                 Giá trên 85,000,000₫
                                 </span>
                              </li>
                           </ul>
                           <div class="vertical-filter-action align-items-center justify-content-center d-none">
                              <a href="javascript:;" class="btn btn-remove">Bỏ chọn</a>
                              <a href="javascript:;" class="btn btn-submit">Xem kết quả</a>
                           </div>
                        </div>
                     </div>
                     <div class="cloneFilter__item">
                        <div class="cloneFilter__title dropdown-title">
                           <span>
                           Độ phân giải
                           <i class="fa fa-caret-down"></i>
                           </span>
                           <div class="arrow-filter"></div>
                        </div>
                        <div class="cloneFilter__content dropdown-content">
                           <ul>
                              <li class="vertical_filter__item vertical_filter__tag3">
                                 <span data-val-handle="hd">
                                 HD
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag3">
                                 <span data-val-handle="full-hd">
                                 Full HD
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag3">
                                 <span data-val-handle="2k">
                                 2K
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag3">
                                 <span data-val-handle="4k">
                                 4K
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag3">
                                 <span data-val-handle="8k">
                                 8K
                                 </span>
                              </li>
                           </ul>
                           <div class="vertical-filter-action align-items-center justify-content-center d-none">
                              <a href="javascript:;" class="btn btn-remove">Bỏ chọn</a>
                              <a href="javascript:;" class="btn btn-submit">Xem kết quả</a>
                           </div>
                        </div>
                     </div>
                     <div class="cloneFilter__item">
                        <div class="cloneFilter__title dropdown-title">
                           <span>
                           Loại Tivi
                           <i class="fa fa-caret-down"></i>
                           </span>
                           <div class="arrow-filter"></div>
                        </div>
                        <div class="cloneFilter__content dropdown-content">
                           <ul>
                              <li class="vertical_filter__item vertical_filter__tag4">
                                 <span data-val-handle="smart-tivi">
                                 Smart Tivi
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag4">
                                 <span data-val-handle="tivi-oled">
                                 Tivi OLED
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag4">
                                 <span data-val-handle="tivi-android">
                                 Tivi Android
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag4">
                                 <span data-val-handle="google-tivi">
                                 Google Tivi
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag4">
                                 <span data-val-handle="tivi-qled">
                                 Tivi QLED
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag4">
                                 <span data-val-handle="tivi-neo-qled">
                                 Tivi Neo Qled
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag4">
                                 <span data-val-handle="tivi-nanocell">
                                 Tivi Nanocell
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag4">
                                 <span data-val-handle="tivi-mini-led">
                                 Tivi Mini LED
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag4">
                                 <span data-val-handle="tivi-thiet-ke-dac-biet">
                                 Tivi thiết kế đặc biệt
                                 </span>
                              </li>
                           </ul>
                           <div class="vertical-filter-action align-items-center justify-content-center d-none">
                              <a href="javascript:;" class="btn btn-remove">Bỏ chọn</a>
                              <a href="javascript:;" class="btn btn-submit">Xem kết quả</a>
                           </div>
                        </div>
                     </div>
                     <div class="cloneFilter__item">
                        <div class="cloneFilter__title dropdown-title">
                           <span>
                           Tiện ích
                           <i class="fa fa-caret-down"></i>
                           </span>
                           <div class="arrow-filter"></div>
                        </div>
                        <div class="cloneFilter__content dropdown-content">
                           <ul>
                              <li class="vertical_filter__item vertical_filter__tag5">
                                 <span data-val-handle="tim-kiem-giong-noi-bang-tieng-viet">
                                 Tìm kiếm giọng nói bằng Tiếng Việt
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag5">
                                 <span data-val-handle="ket-noi-qua-bluetooth">
                                 Kết nối qua Bluetooth
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag5">
                                 <span data-val-handle="choi-game-tren-tivi">
                                 Chơi game trên tivi
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag5">
                                 <span data-val-handle="d-khien-giong-noi-khong-remote">
                                 Đ.khiển giọng nói không Remote
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag5">
                                 <span data-val-handle="chieu-man-hinh-qua-airplay-2">
                                 Chiếu màn hình qua AirPlay 2
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag5">
                                 <span data-val-handle="chieu-dien-thoai-len-tv-khong-day">
                                 Chiếu điện thoại lên TV (không dây)
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag5">
                                 <span data-val-handle="tro-ly-ao-google-assistant">
                                 Trợ lý ảo Google Assistant
                                 </span>
                              </li>
                           </ul>
                           <div class="vertical-filter-action align-items-center justify-content-center d-none">
                              <a href="javascript:;" class="btn btn-remove">Bỏ chọn</a>
                              <a href="javascript:;" class="btn btn-submit">Xem kết quả</a>
                           </div>
                        </div>
                     </div>
                     <div class="cloneFilter__item">
                        <div class="cloneFilter__title dropdown-title">
                           <span>
                           Hệ điều hành
                           <i class="fa fa-caret-down"></i>
                           </span>
                           <div class="arrow-filter"></div>
                        </div>
                        <div class="cloneFilter__content dropdown-content">
                           <ul>
                              <li class="vertical_filter__item vertical_filter__tag6">
                                 <span data-val-handle="android">
                                 Android
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag6">
                                 <span data-val-handle="webos">
                                 webOS
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag6">
                                 <span data-val-handle="tizenos">
                                 TizenOS
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag6">
                                 <span data-val-handle="google-tv">
                                 Google TV
                                 </span>
                              </li>
                              <li class="vertical_filter__item vertical_filter__tag6">
                                 <span data-val-handle="linux">
                                 Linux
                                 </span>
                              </li>
                           </ul>
                           <div class="vertical-filter-action align-items-center justify-content-center d-none">
                              <a href="javascript:;" class="btn btn-remove">Bỏ chọn</a>
                              <a href="javascript:;" class="btn btn-submit">Xem kết quả</a>
                           </div>
                        </div>
                     </div>
                  </div> --}}
                            <div class="filter-content aside-filter">
                                <div class="filter-container">
                                    <div class="filter-container__selected-filter" style="display: none;">
                                        <div
                                            class="filter-container__selected-filter-list mb-2 d-flex flex-wrap align-items-center">
                                            <div style="margin-bottom: 7px;font-weight: 700;">Đang lọc theo</div>
                                            <ul class="ml-2">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main_container collection col-lg-9 col-md-12 col-sm-12">
                        <h1 class="title_page collection-title  h1-tuan">
                            {{ $title }}
                        </h1>
                        <br>
                        <div class="category-products products">
                            {{-- <div class=" d-flex justify-content-between align-items-baseline mb-3">
                     <div class="sortPagiBar">
                        <div class="sort-cate clearfix">
                           <div id="sort-by" class="d-flex align-items-baseline">
                              <label class="left">
                              <span class=''>Sắp xếp: </span></label>
                              <ul class="ul_col ml-2 mb-0">
                                 <li>
                                    <span class="d-flex d-lg-none align-items-center justify-content-between">Thứ tự </span>
                                    <i class='fas fa-chevron-down float-right' ></i>
                                    <ul class="content_ul">
                                       <li data-sort="name:asc"><a class="link" href="javascript:;" onclick="sortby('alpha-asc')">Tên A &rarr; Z</a></li>
                                       <li data-sort="name:desc"><a class="link" href="javascript:;" onclick="sortby('alpha-desc')">Tên Z &rarr; A</a></li>
                                       <li data-sort="price_min:asc"><a class="link" href="javascript:;" onclick="sortby('price-asc')">Giá tăng dần</a></li>
                                       <li data-sort="price_min:desc"><a class="link" href="javascript:;" onclick="sortby('price-desc')">Giá giảm dần</a></li>
                                       <li data-sort="created_on:desc"><a class="link" href="javascript:;" onclick="sortby('created-desc')">Hàng mới </a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div id="open-filters" class="btn open-filters d-xl-none d-none p-0">
                        <i class="fa fa-filter"></i>
                        <span>Lọc</span>
                     </div>
                  </div> --}}
                            <div class="products-view products-view-grid collection_reponsive list_hover_pro">
                                <div class="row product-list content-col row-10">
                                    @foreach ($list as $pro)
                                        <div class="col-6  col-sm-3  col-md-3 col-lg-3  product-col">
                                            @include('layouts.product.itemlist', ['pro' => $pro])
                                        </div>
                                    @endforeach
                                </div>
                                <div class="section pagenav">
                                    <div class="row">
                                        <div class="col-lg-12 col-12 d-flex justify-content-center">
                                            {{ $list->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <aside class=" scroll dqdt-sidebar sidebar left-content col-lg-3 col-md-12 col-sm-12">
                        <div class="wrap_background_aside asidecollection">
                            <div class="filter-content aside-filter">
                                <div class="filter-container">
                                    <button class="btn d-block d-lg-none open-filters p-0">
                                        <i class="fa fa-arrow-left mr-3 "> </i>
                                        <b class="d-inline">
                                            Tìm theo
                                        </b>
                                    </button>
                                    <div class="filter-container__selected-filter" style="display: none;">
                                        <div class="filter-container__selected-filter-header clearfix d-none">
                                            <span class="filter-container__selected-filter-header-title"><i
                                                    class="fa fa-arrow-left hidden-sm-up"></i> Bạn chọn</span>
                                            <a href="javascript:void(0)" onclick="clearAllFiltered()"
                                                class="filter-container__clear-all">Bỏ hết <i
                                                    class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                    <aside class="aside-item filter-vendor">
                                        <div class="aside-title">
                                            <h2 class="title-head margin-top-0"><span>Hãng LỌC</span></h2>
                                        </div>
                                        <div class="aside-content filter-group">
                                            <ul>
                                                @foreach ($thuonghieu as $item)
                                                    <li class="filter-item filter-item--check-box filter-item--green">
                                                        <span>
                                                            <label class="custom-checkbox"
                                                                for="filter-brand-{{ $item->id }}">
                                                                <input type="checkbox"
                                                                    id="filter-brand-{{ $item->id }}"
                                                                    data-group="BRAND" data-field="brand"
                                                                    data-brand-id="{{ $item->id }}"
                                                                    data-brand-name="{{ $item->name }}"
                                                                    value="{{ $item->id }}" class="brand-filter">
                                                                <i class="fa"></i>
                                                                <img src="{{ $item->image }}"
                                                                    alt="{{ $item->name }}" />
                                                            </label>
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </aside>
                                    <!-- End Lọc theo Tag (Màu sắc)-->
                                    <aside class="aside-item filter-price dq-filterxx">
                                        <div class="aside-title">
                                            <h2 class="title-head margin-top-0"><span>Khoảng giá lọc</span></h2>
                                        </div>
                                        <div class="aside-content filter-group scroll">
                                            <div class="showstt d-none">
                                                <!--<span>Mức giá</span> -->
                                            </div>
                                            <ul style="">
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label class="custom-checkbox" for="filter-duoi-5000000">
                                                            <input type="checkbox" id="filter-duoi-5000000"
                                                                class="price-filter"
                                                                value="price_min:0;price_max:5000000">
                                                            <i class="fa"></i>
                                                            Giá dưới 5,000,000₫
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label class="custom-checkbox" for="filter-5000000-7000000">
                                                            <input type="checkbox" id="filter-5000000-7000000"
                                                                class="price-filter"
                                                                value="price_min:5000000;price_max:7000000">
                                                            <i class="fa"></i>
                                                            5,000,000₫ - 7,000,000₫
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label class="custom-checkbox" for="filter-7000000-10000000">
                                                            <input type="checkbox" id="filter-7000000-10000000"
                                                                class="price-filter"
                                                                value="price_min:7000000;price_max:10000000">
                                                            <i class="fa"></i>
                                                            7,000,000₫ - 10,000,000₫
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label class="custom-checkbox" for="filter-10000000-12000000">
                                                            <input type="checkbox" id="filter-10000000-12000000"
                                                                class="price-filter"
                                                                value="price_min:10000000;price_max:12000000">
                                                            <i class="fa"></i>
                                                            10,000,000₫ - 12,000,000₫
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label class="custom-checkbox" for="filter-12000000-15000000">
                                                            <input type="checkbox" id="filter-12000000-15000000"
                                                                class="price-filter"
                                                                value="price_min:12000000;price_max:15000000">
                                                            <i class="fa"></i>
                                                            12,000,000₫ - 15,000,000₫
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label class="custom-checkbox" for="filter-15000000-20000000">
                                                            <input type="checkbox" id="filter-15000000-20000000"
                                                                class="price-filter"
                                                                value="price_min:15000000;price_max:20000000">
                                                            <i class="fa"></i>
                                                            15,000,000₫ - 20,000,000₫
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label class="custom-checkbox" for="filter-20000000-30000000">
                                                            <input type="checkbox" id="filter-20000000-30000000"
                                                                class="price-filter"
                                                                value="price_min:20000000;price_max:30000000">
                                                            <i class="fa"></i>
                                                            20,000,000₫ - 30,000,000₫
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label class="custom-checkbox" for="filter-30000000-50000000">
                                                            <input type="checkbox" id="filter-30000000-50000000"
                                                                class="price-filter"
                                                                value="price_min:30000000;price_max:50000000">
                                                            <i class="fa"></i>
                                                            30,000,000₫ - 50,000,000₫
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label class="custom-checkbox" for="filter-50000000-85000000">
                                                            <input type="checkbox" id="filter-50000000-85000000"
                                                                class="price-filter"
                                                                value="price_min:50000000;price_max:85000000">
                                                            <i class="fa"></i>
                                                            50,000,000₫ - 85,000,000₫
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label class="custom-checkbox" for="filter-tren-85000000">
                                                            <input type="checkbox" id="filter-tren-85000000"
                                                                class="price-filter"
                                                                value="price_min:85000000;price_max:999999999">
                                                            <i class="fa"></i>
                                                            Giá trên 85,000,000₫
                                                        </label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </aside>
                                    {{-- @php
                                        dd($filter)
                                    @endphp --}}
                           @foreach ($filter as $item)
    <aside class="aside-item sidebar-item filter-tag-style-2">
        <div class="aside-title">
            <h2 class="title-head margin-top-0"><span>{{$item->name}}</span></h2>
        </div>
        <div class="module-content aside-content filter-group">
            <ul>
                @foreach ($item->tags as $tag)
                {{-- @php
                    dd($tag);
                @endphp --}}
                    <li class="filter-item filter-item--check-box filter-item--green">
                        <span>
                            <label class="custom-checkbox" for="tag-{{ $tag->id }}">
                                <input type="checkbox" 
                                       id="tag-{{ $tag->id }}" 
                                       class="tag-filter" 
                                       value="{{ $tag->slug }}-{{$tag->cate_tag_slug}}">
                                <i class="fa"></i>
                                {{ $tag->name }}
                            </label>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </aside>
@endforeach
                                 
                             
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <div class="section_collection__desc d-none">
        <div class="container">
            <div class="wrap">
                <div class="pro-tabcontent-more box-content-shadow">
                    <div class="pro-tabcontent-more-content">
                    </div>
                    <div class="pro-showmore">
                        <p class="show-more" style="display:block">
                            <a href="javascript:" class="readmore">Đọc thêm </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var colName = "Tivi giá tốt, chính hãng";
        var colId = 1003297049;
        var selectedViewData = "data";
        if ($('.pro-tabcontent-more-content').children().length > 0) {
            $('.section_collection__desc').removeClass('d-none');
        }
    </script>
    <script>
        window.flashSale = {
            flashSaleColl: "onsale",
            type: "hours",
            dateStart: "30/11/2021",
            dateFinish: "1",
            hourStart: "00:00",
            hourFinish: "24",
            activeDay: "7",
            finishAction: "show",
            finishLabel: "Chương trình đã kết thúc",
            percentMin: "30",
            percentMax: "100",
            maxInStock: "100",
            useSoldQuantity: true,
            useTags: false,
            timestamp: new Date().getTime(),
            openingText: "Vừa mở bán",
            soldText: "Đã bán [soluong] sản phẩm",
            outOfStockSoonText: "<img src='//theme.hstatic.net/200000574527/1001200251/14/fire-icon.svg?v=447' /> Sắp cháy hàng"
        }
    </script>
    <script src="//theme.hstatic.net/200000574527/1001200251/14/flashsale.js?v=447" defer></script>


    {{-- ajax lọc --}}
  <script>
// Thêm lọc theo giá và lọc riêng
$(document).ready(function() {
    // Mảng lưu trữ các thương hiệu, khoảng giá và tag được chọn
    let selectedBrands = [];
    let selectedPriceRanges = [];
    let selectedTags = [];
    let currentCate = "{{ isset($cate_slug) ? $cate_slug : '' }}";
    let currentType = "{{ isset($type_slug) ? $type_slug : '' }}";
    let currentTypeTwo = "{{ isset($type_two_slug) ? $type_two_slug : '' }}";

    // Xử lý khi checkbox thương hiệu được click
    $(document).on('change', '.brand-filter', function() {
        const brandId = $(this).data('brand-id');
        const brandName = $(this).data('brand-name');

        if ($(this).is(':checked')) {
            // Thêm vào mảng nếu được chọn
            if (!selectedBrands.includes(brandId)) {
                selectedBrands.push(brandId);

                // Thêm nhãn đã chọn vào phần hiển thị
                $('.filter-container__selected-filter').show();
                $('.filter-container__selected-filter-header').show();
                $('.filter-container__selected-filter ul').append(
                    `<li class="filter-container__selected-filter-item" data-filter-type="brand" data-brand="${brandId}">
                        <a href="javascript:void(0)" onclick="removeBrandFilter(${brandId})">
                            ${brandName} <i class="fa fa-times"></i>
                        </a>
                    </li>`
                );
            }
        } else {
            // Xóa khỏi mảng nếu bỏ chọn
            selectedBrands = selectedBrands.filter(id => id !== brandId);
            $(`.filter-container__selected-filter-item[data-brand="${brandId}"]`).remove();

            // Ẩn container nếu không còn filter nào
            checkAndHideFilterContainer();
        }

        // Gọi AJAX để lọc sản phẩm
        filterProducts();
    });

    // Xử lý khi checkbox khoảng giá được click
    $(document).on('change', '.price-filter', function() {
        const range = $(this).data('range');
        const priceRange = $(this).val();
        const priceLabel = $(this).closest('label').text().trim();

        if ($(this).is(':checked')) {
            // Thêm vào mảng nếu được chọn
            if (!selectedPriceRanges.includes(priceRange)) {
                selectedPriceRanges.push(priceRange);

                // Thêm nhãn đã chọn vào phần hiển thị
                $('.filter-container__selected-filter').show();
                $('.filter-container__selected-filter-header').show();
                $('.filter-container__selected-filter ul').append(
                    `<li class="filter-container__selected-filter-item" data-filter-type="price" data-range="${range}">
                        <a href="javascript:void(0)" onclick="removePriceFilter('${range}')">
                            ${priceLabel} <i class="fa fa-times"></i>
                        </a>
                    </li>`
                );
            }
        } else {
            // Xóa khỏi mảng nếu bỏ chọn
            selectedPriceRanges = selectedPriceRanges.filter(price => price !== priceRange);
            $(`.filter-container__selected-filter-item[data-range="${range}"]`).remove();

            // Ẩn container nếu không còn filter nào
            checkAndHideFilterContainer();
        }

        // Gọi AJAX để lọc sản phẩm
        filterProducts();
    });

    // Xử lý khi checkbox tag được click
    $(document).on('change', '.tag-filter', function() {
        const tagValue = $(this).val(); // Giá trị tag (ví dụ: "55-inch-kich-co-man-hinh")
        const tagName = $(this).closest('label').text().trim();
        console.log(tagValue);
        if ($(this).is(':checked')) {
            // Thêm vào mảng nếu được chọn
            if (!selectedTags.includes(tagValue)) {
                selectedTags.push(tagValue);

                // Thêm nhãn đã chọn vào phần hiển thị
                $('.filter-container__selected-filter').show();
                $('.filter-container__selected-filter-header').show();
                $('.filter-container__selected-filter ul').append(
                    `<li class="filter-container__selected-filter-item" data-filter-type="tag" data-tag="${tagValue}">
                        <a href="javascript:void(0)" onclick="removeTagFilter('${tagValue}')">
                            ${tagName} <i class="fa fa-times"></i>
                        </a>
                    </li>`
                );
            }
        } else {
            // Xóa khỏi mảng nếu bỏ chọn
            selectedTags = selectedTags.filter(tag => tag !== tagValue);
            $(`.filter-container__selected-filter-item[data-tag="${tagValue}"]`).remove();

            // Ẩn container nếu không còn filter nào
            checkAndHideFilterContainer();
        }

        // Gọi AJAX để lọc sản phẩm
        filterProducts();
    });

    // Hàm kiểm tra và ẩn container
    function checkAndHideFilterContainer() {
        if (selectedBrands.length === 0 && selectedPriceRanges.length === 0 && selectedTags.length === 0) {
            $('.filter-container__selected-filter').hide();
            $('.filter-container__selected-filter-header').hide();
        }
    }

    // Hàm gửi AJAX để lọc sản phẩm
    function filterProducts() {
        $.ajax({
            url: '{{ route('filterProduct') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                brands: selectedBrands,
                price_ranges: selectedPriceRanges,
                fillter: selectedTags,      // Thêm dòng này để gửi selectedTags
                cate: currentCate,
                type: currentType,
                typetwo: currentTypeTwo,
               
            },
            beforeSend: function() {
                // Hiển thị loading
                if ($('.loading-overlay').length === 0) {
                    $('.products-view-grid').append(
                        '<div class="loading-overlay"><div class="spinner-border text-primary" role="status"><span class="sr-only">Đang tải...</span></div></div>'
                    );
                }
            },
            success: function(response) {
                // Cập nhật danh sách sản phẩm
                $('.product-list').html(response.html);
                
                // Khởi tạo lại lazy load sau khi cập nhật nội dung
                lazyloadImages();
            },
            error: function(xhr, status, error) {
                console.error("Lỗi khi lọc sản phẩm:", error);
            },
            complete: function() {
                // Xóa loading
                $('.loading-overlay').remove();
            }
        });
    }

    // Khởi tạo lazy load cho hình ảnh
    function lazyloadImages() {
        var lazyloadImages = document.querySelectorAll("img.lazyload");    
        if ("IntersectionObserver" in window) {
            var imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var image = entry.target;
                        image.src = image.dataset.src;
                        image.classList.remove("lazyload");
                        imageObserver.unobserve(image);
                    }
                });
            });

            lazyloadImages.forEach(function(image) {
                imageObserver.observe(image);
            });
        }
    }

    // Định nghĩa hàm global
    window.removeBrandFilter = function(brandId) {
        // Bỏ chọn checkbox
        $(`.brand-filter[data-brand-id="${brandId}"]`).prop('checked', false);
        
        // Xóa khỏi mảng
        selectedBrands = selectedBrands.filter(id => id !== brandId);
        
        // Xóa nhãn filter
        $(`.filter-container__selected-filter-item[data-brand="${brandId}"]`).remove();
        
        // Ẩn container nếu không còn filter nào
        checkAndHideFilterContainer();
        
        // Cập nhật sản phẩm
        filterProducts();
    };

    window.removePriceFilter = function(range) {
        // Bỏ chọn checkbox
        $(`.price-filter[data-range="${range}"]`).prop('checked', false);
        
        // Lấy giá trị đầy đủ để xóa khỏi mảng
        const priceValue = $(`.price-filter[data-range="${range}"]`).val();
        selectedPriceRanges = selectedPriceRanges.filter(price => price !== priceValue);
        
        // Xóa nhãn filter
        $(`.filter-container__selected-filter-item[data-range="${range}"]`).remove();
        
        // Ẩn container nếu không còn filter nào
        checkAndHideFilterContainer();
        
        // Cập nhật sản phẩm
        filterProducts();
    };

    window.removeTagFilter = function(tagValue) {
        // Bỏ chọn checkbox
        $(`.tag-filter[value="${tagValue}"]`).prop('checked', false);
        
        // Xóa khỏi mảng
        selectedTags = selectedTags.filter(tag => tag !== tagValue);
        
        // Xóa nhãn filter
        $(`.filter-container__selected-filter-item[data-tag="${tagValue}"]`).remove();
        
        // Ẩn container nếu không còn filter nào
        checkAndHideFilterContainer();
        
        // Cập nhật sản phẩm
        filterProducts();
    };

    window.clearAllFiltered = function() {
        // Bỏ chọn tất cả checkbox
        $('.brand-filter, .price-filter, .tag-filter').prop('checked', false);
        
        // Xóa mảng
        selectedBrands = [];
        selectedPriceRanges = [];
        selectedTags = [];
        
        // Xóa tất cả nhãn
        $('.filter-container__selected-filter-item').remove();
        $('.filter-container__selected-filter').hide();
        $('.filter-container__selected-filter-header').hide();
        
        // Cập nhật sản phẩm
        filterProducts();
    };

    // Khởi tạo lazy load khi trang tải xong
    lazyloadImages();
});
</script>
@endsection

@extends('layouts.main.master')
@section('title')
    Giỏ hàng của bạn
@endsection
@section('description')
    Bún đậu mắm tôm Lynh
@endsection
@section('image')
     {{ $anhweb[0] }}
@endsection
@section('css')
  
@endsection
@section('js')

@endsection
@section('content')
    @php
        $total = 0;
        $qty = 0;
    @endphp
    @foreach ((array) session('cart') as $id => $details)
        @php
            if (isset($details['variant'])) {
                $total += $details['price'] * $details['quantity'];
            } else {
                if ($details['discount'] > 0) {
                    $total += $details['discount'] * $details['quantity'];
                } else {
                    $total += $details['price'] * $details['quantity'];
                }
            }
            $qty += $details['quantity'];
        @endphp
    @endforeach
<div class="page-header parallaxie " style="background-image: url('{{ asset('frontend/images/zon.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque" style="font-size: 40px">Giỏ hàng của bạn
                        </h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng của bạn</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    
    <section class="main-cart-page main-container col1-layout">
        <div class="main container cartpcstyle">
            <div class="wrap_background_aside margin-bottom-40">
                @if (count($cartcontent) > 0)
                <form action="{{route('checkout')}}" method="post">
                  @csrf
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 col-12 col-cart-left">
                            <div class="bg-shadow margin-bottom-20">
                                <div class="header-cart">
                                    <div class="title-block-page">
                                        <h3 class="title_cart">
                                            <span>Giỏ hàng của bạn</span>
                                        </h3>
                                    </div>
                                </div>
                                <div class="cart-page">
                                    <div class="drawer__inner">
                                        <div class="CartPageContainer">
                                            <duv  class="cart ajaxcart cartpage" >
                                           
                                                <div class="cart-header-info">
                                                    <div>Thông tin sản phẩm</div>
                                                    <div>Đơn giá</div>
                                                    <div>Số lượng</div>
                                                </div>
                                                <div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items carttuan"
                                                    id="cartbody">
                                                    @foreach ($cartcontent as $key => $item)
                                                        <div class="ajaxcart__row">
                                                            <div class="ajaxcart__product cart_product" data-line="1">
                                                                <a href="" class="ajaxcart__product-image cart_image"
                                                                    title="{{ $item['name'] }}">
                                                                    <img src="{{ $item['image'] }}"
                                                                        alt="{{ $item['name'] }}">
                                                                </a>
                                                                <div class="grid__item cart_info">
                                                                    <div class="ajaxcart__product-name-wrapper cart_name">
                                                                        <a href=""
                                                                            class="ajaxcart__product-name h4 line-clamp line-clamp-2-new"
                                                                            title="{{ $item['name'] }}">{{ $item['name'] }}</a>
                                                                        @if (isset($item['variant']))
                                                                            <span
                                                                                class="ajaxcart__product-meta variant-title">{{ $item['variant'] }}</span>
                                                                        @endif

                                                                        {{-- filepath: c:\laragon\www\yumy\resources\views\cart\list.blade.php --}}
                                                                        {{-- filepath: c:\laragon\www\yumy\resources\views\cart\list.blade.php --}}
                                                                        <br>
                                                                        <a style="color: red;" title="Xóa"
                                                                            class="remove-item-cart-tuan-detail"
                                                                            href="javascript:;"
                                                                            data-id="{{ $key }}">Xóa</a>
                                                                    </div>
                                                                    <div class="grid">


                                                                        <div
                                                                            class="grid__item one-half text-right cart_prices">
                                                                            @if (isset($item['variant']))
                                                                                <span
                                                                                    class="cart-price">{{ number_format($item['price']) }}₫</span>
                                                                            @else
                                                                                @if ($item['discount'] > 0)
                                                                                    <span
                                                                                        class="cart-price">{{ number_format($item['discount']) }}₫</span>
                                                                                @else
                                                                                    <span
                                                                                        class="cart-price">{{ number_format($item['price']) }}₫</span>
                                                                                @endif
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="grid">
                                                                        <div class="grid__item one-half cart_select">
                                                                            {{-- filepath: c:\laragon\www\yumy\resources\views\cart\list.blade.php --}}
                                                                            <div class="ajaxcart__qty input-group-btn">
                                                                                <button type="button"
                                                                                    class=" items-count-tuan"
                                                                                    data-key="{{ $key }}"
                                                                                    data-action="decrease">-</button>
                                                                                <input type="text" name="quantity"
                                                                                    class="ajaxcart__qty-num number-sidebar"
                                                                                    value="{{ $item['quantity'] }}"
                                                                                    id="quantity-{{ $key }}">
                                                                                <button type="button"
                                                                                    class="  items-count-tuan"
                                                                                    data-key="{{ $key }}"
                                                                                    data-action="increase">+</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </duv>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-12 col-cart-right">
                            <div class="sticky">
                                <div class="bg-shadow margin-bottom-20">
                                    <div class="ajaxcart__footer">
                                        <div class="checkout-header">
                                            Thông tin đơn hàng
                                        </div>
                                        <div class="checkout-body">
                                            <div class="summary-total">

                                                <div class="content-items">
                                                    <div class="item-content-left">Tổng tiền</div>
                                                    <div class="item-content-right"><span class="total-price"
                                                            style="color:red">{{ number_format($total) }}₫</span></div>
                                                </div>

                                            </div>
                                            <div class="summary-action">
                                                <p>Chúng tôi luôn đảm bảo hàng hóa ở chất lượng tốt nhất</p>
                                                <p>Mọi phản ánh về hàng hóa xin liên hệ về hotline <a
                                                        href="tel:{{ $setting->phone1 }}">{{ $setting->phone1 }}</a></p>
                                            </div>

                                            <div class="summary-button">
                                                <div class="cart__btn-proceed-checkout-dt ">
                                                    <button type="submit" class="btn btn-danger mirror-effect-button">Thanh Toán Ngay</button>
                                                </div>
                                                <a class="return_buy btn btn-extent duration-300 btn-tieptuc"
                                                    title="Tiếp tục mua hàng" href="{{ route('home') }}">Tiếp tục mua
                                                    hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </form>
                @else
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">Không có sản phẩm nào. Quay lại <a
                                    href="{{ route('home') }}" class="alert-link">cửa hàng</a> để tiếp tục mua sắm.</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

<style>
   
</style>
@endsection

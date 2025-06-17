@extends('layouts.main.master')
@section('title')
So sánh sản phẩm thông minh
@endsection
@section('description')
Chức năng so sánh sản phẩm thông minh
@endsection
@section('image')
{{ url('' . $setting->logo) }}
@endsection
@section('css')
<link rel="preload" as="style" type="text/css" href="{{env('AWS_R2_URL')}}/frontend/css/compare.css" />
<link href="{{env('AWS_R2_URL')}}/frontend/css/compare.css" rel="stylesheet" type="text/css" />
@endsection
@section('js')
@endsection
@section('content')
<div class="contentWarp ">
   <div class="breadcrumbs bg-white">
      <div class="container position-relative">
         <ul class="breadcrumb align-items-center m-0 pl-0 pr-0 small pt-2 pb-2 bg-white">
            <li class="home">
               <a href="/" title="Trang chủ">
                  <svg width="12" height="10.633">
                     <use href="#svg-home"></use>
                  </svg>
                  Trang chủ
               </a>
               <span class="slash-divider ml-2 mr-2">/</span>
            </li>
            <li>So sánh</li>
         </ul>
      </div>
   </div>
   <div class="com_info">
      <div class="container mt-3 mb-3">
         <div class="col-main page-title rounded p-2 p-md-3 bg-white">
            <h1 class="font-weight-bold pt-2 pt-lg-0 mt-0 mb-3 page_name">
               So sánh
            </h1>
            @if(count($list) == 0)
            <div class="alert alert-danger text-center" role="alert">
               <strong>Không có sản phẩm nào để so sánh!</strong>
            </div>
            @else
            <div id="ajax-load">
               <div id="compare-summary" class="w-full grid grid-flow-col grid-cols-2 gap-y-4 gap-x-2 mb-2 row">
                  @foreach ($list as $item)
                  <div class="spec-summary will-change-transform col-md-12" data-idpro="{{ $item['idpro'] }}">
                     <div class="clear-both max-w-[240px] rounded border border-gray-300 p-2 mb-2 relative">
                        <button
                           class="absolute block mx-auto px-2 bg-rose-600 text-white rounded text-sm leading-7 hover:bg-rose-500 transition-all duration-300 z-10 top-0 right-0"
                           onclick="removeCompare({{ $item['idpro'] }})">✕</button>
                        <div class="aspect-w-1 aspect-h-1 mx-auto text-center"><img
                           class="w-full h-full object-center object-contain tunso"
                           src="{{ $item['image'] }}" alt="{{ $item['name'] }}"></div>
                     </div>
                     <p class="m-0 text-sm sm:text-base"><a target="_blank"
                        href="{{ route('detailProduct', ['cate' => $item['cate_slug'], 'type' => $item['type_slug'] ? $item['type_slug'] : 'loai', 'id' => $item['pro_slug']]) }}"
                        title="{{ $item['name'] }}"
                        class="font-semibold text-rose-600 block w-full leading-6 text-ellipsis overflow-hidden whitespace-nowrap">{{ $item['name'] }}</a>
                     </p>
                     @if ($item['price'] > 0)
                     @if ($item['status_variant'] == 1)
                     <p class="m-0 text-sm sm:text-base">
                        {{-- <b>Giá:</b>  --}}
                        <b class="text-rose-600">{{ get_price_variant($item['idpro']) }}₫
                        <del
                           class="font-normal text-gray-700 text-sm">{{ number_format($item['price']) }}₫</del>
                        </b>
                     </p>
                     @else
                     <p class="m-0 text-sm sm:text-base">
                        {{-- <b>Giá:</b> s --}}
                        <b class="text-rose-600">{{ number_format($item['discount']) }}₫
                        <del
                           class="font-normal text-gray-700 text-sm">{{ number_format($item['price']) }}₫</del>
                        </b>
                     </p>
                     @endif
                     @else
                     <p class="m-0 text-sm sm:text-base">
                        Liên hệ
                     </p>
                     @endif
                  </div>
                  @endforeach
               </div>
               <div class="row">
                  @foreach ($list as $item)
                  <div class="col-md-6">
                     <div class="spec-details grid grid-cols-2 gap-2 spec-summary will-change-transform">
                        @foreach ($item['size'] as $i)
                        <div class="spec-row">
                           <span class="font-medium">{{ $i->title }}</span>
                        </div>
                        <div class="spec-row">
                           <span>{{ $i->detail }}</span>
                        </div>
                        @endforeach
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>
@endsection
@extends('layouts.main.master')
@section('title')
Khuyến mãi đặc biệt
@endsection
@section('description')
Danh sách Khuyến mãi đặc biệt
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('js')
@endsection
@section('css')
<link href="{{env('AWS_R2_URL')}}/frontend/css/breadcrumb_style.scss.css" rel="stylesheet" type="text/css" media="all" />
<link rel="preload" as="style"  href="{{env('AWS_R2_URL')}}/frontend/css/collection_style.scss.css" type="text/css">
<link href="{{env('AWS_R2_URL')}}/frontend/css/collection_style.scss.css" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('content')
<div class="layout-collection">
   <section class="bread-crumb">
      <div class="container">
         <ul class="breadcrumb" >
            <li class="home">
               <a  href="{{route('home')}}" title="Trang chủ"><span >Trang chủ</span></a>						
               <span class="mr_lr">
                  &nbsp;
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-chevron-right fa-w-10">
                     <path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" class=""></path>
                  </svg>
                  &nbsp;
               </span>
            </li>
            <li><strong ><span> Khuyến mãi đặc biệt</span></strong></li>
         </ul>
      </div>
   </section>
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="col-title">
               <h1>Khuyến mãi đặc biệt</h1>
               <div class="title-separator">
                  <div class="separator-center"></div>
               </div>
            </div>
         </div>
         <div class="block-collection col-lg-12 col-12">
            <div class="category-products products-view products-view-grid list_hover_pro">
              
               <div class="products-view products-view-grid list_hover_pro product-list-filter">
                  @if (count($list) > 0)
                  <div class="row">
                     @foreach ($list as $item)
                 
                        @include('layouts.product.item',['pro'=>$item])
                 
                     @endforeach
                  </div>
                  @else
                  <div class="row slider-items ">
                     <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 product-grid-item-lm mb-3">
                        <h3>Nội dung đang được cập nhật</h3>
                     </div>
                  </div>
                  @endif
                   <div class="row">
              <div class="col-lg-12 col-12 d-flex justify-content-center">
               {{ $list->links() }}
               </div> 
            </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="backdrop__body-backdrop___1rvky"></div>

@endsection
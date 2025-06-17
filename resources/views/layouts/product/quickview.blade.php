@php
    $img = json_decode($pro->images);
@endphp
<div class="quick-view-product">
  <div class="block-quickview primary_block details-product">
    <div class="row">
      <div class="product-layout_col-left col-xs-12 col-sm-4 col-md-4 col-lg-5 col-xl-6">
        <div class=" swiper-container mb-3">
           <div class="swiper-wrapper">
              @foreach ($img as $item)
              <div class="swiper-slide ">
                 <picture class="position-relative d-block aspect ratio1by1 modal-open rounded">
                    <source media="(min-width: 1200px)" srcset="{{$item}}">
                    <source media="(min-width: 575px)" srcset="{{$item}}">
                    <img src="{{$item}}" alt="{{$pro->name}}" class="d-block m-auto img position-absolute img-contain gradient-load" data-zoom-image="{{$item}}"/>
                 </picture>
              </div>
              @endforeach
           </div>
        </div>
     </div>
      <div class="product-center-column product-info product-item col-xs-12 col-sm-6 col-md-8 col-lg-7 col-xl-6 details-pro style_product style_border" id="product-29973945">

        <div class="head-qv group-status">
          <h3 class="qwp-name title-product">
            <a class="text2line text-gold" href="" title="{{$pro->name}}">
              {{$pro->name}}
            </a>
          </h3>
          <div class="vend-qv group-status">
            <div class="left_vend">
              <div class="first_status ">Tình trạng:
                <span class="vendor_ status_name">Còn hàng</span>
              </div>		
              <span class="line_tt">|</span>
              <div class="top_sku first_status">Danh mục:
                <span class="sku_ status_name">{{languageName($pro->cate->name)}}</span>
              </div>
            </div>
          </div>
        </div>
        @if ($pro->price > 0)
          @if ($pro->status_variant == 1)
          <div class="quickview-info">
            <span class="prices price-box">
              <span class="price product-price sale-price">{{number_format($pro->price)}}₫</span>
            </span>
          </div>
          @else 
              @if ($pro->discount > 0)
              <div class="quickview-info">
                <span class="prices price-box">
                  <span class="price product-price sale-price">{{number_format($pro->discount)}}₫</span>
                  <del class="old-price">{{number_format($pro->price)}}₫</del>
                </span>
              </div>
              @else
              <div class="quickview-info">
                <span class="prices price-box">
                  <span class="price product-price sale-price">{{number_format($pro->price)}}₫</span>
                </span>
              </div>
              @endif
          @endif
        @else 
        <div class="quickview-info">
          <span class="prices price-box">
            <span class="price product-price sale-price">Liên hệ</span>
          </span>
        </div>
        @endif
        
        
        <form  class="quick_option variants form-ajaxtocart form-product">
          <span class="price-product-detail d-none" style="opacity: 0;">
            <span class=""></span>
          </span>
          
          <div class="form_product_content">
            <div class="count_btn_style quantity_wanted_p">
              <div class=" soluong1 clearfix">								
                <div class="sssssscustom input_number_product">
                  
                </div>
                <div class="button_actions">
                  <a href="tel:{{$setting->phone1}}" class="btn_cool btn btn_base"> 
                    <span class="btn-content text_1">Liên hệ đặt hàng ngay</span>
                  </a>
                </div>
              </div>

            </div>
          </div>
        <div class="product-summary small mb-3">
          <p class=" py-2 px-3 rounded-10 m-0">
             {{languageName($pro->description)}}
          </p>
       </div>
      </div>
    </div>
  </div>  
</div>


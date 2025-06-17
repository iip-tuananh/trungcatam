@extends('layouts.main.master')
@section('title')
{{ $product->name }}
@endsection
@section('description')
{{ languageName($product->description) }}
@endsection
@section('image')
@php
$img = json_decode($product->images);
$thongso = json_decode($product->size);
$variants = json_decode($product->variant);
$khuyenmai = json_decode($product->preserve);
$phantram = $product->price > 0 ? 100 - ($product->discount / $product->price) * 100 : 0;
@endphp
{{ url('' . $img[0]) }}
@endsection
@section('css')
<style></style>
@endsection
@section('script')
@endsection
@section('content')
<div class="page-header parallaxie " style="background-image: url('{{ asset('frontend/images/zon.jpg') }}');">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <!-- Page Header Box Start -->
            <div class="page-header-box">
               <h1 class="text-anime-style-2" data-cursor="-opaque" style="font-size: 40px">{{ $product->name }}
               </h1>
               <nav class="wow fadeInUp">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                  </ol>
               </nav>
            </div>
            <!-- Page Header Box End -->
         </div>
      </div>
   </div>
</div>
<section class='section mt-0 mb-lg-4 mb-0 mb-sm-0'>
   <div class="container">
   <div class="section wrap-padding-15 wp_product_main m-0 ">
      <div class="details-product bg-web">
         <div class="row m-sm-0">
            <div class="product-detail-left product-images bg-white py-2 col-12 col-lg-7  d-lg-block"
               style="background-color: #b18a55 !important;">
               <div class="pb-3 pt-3 col_large_default large-image" style="text-align:center;">
                  <div class="swiper main-swiper" style="width:100%;text-align:center;">
                     <div class="swiper-wrapper">
                        @foreach ($img as $item)
                        <div class="swiper-slide">
                           <img src="{{ $item }}" alt="Ảnh sản phẩm"
                              style="max-width:100%;height:auto;margin:auto;" />
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="swiper thumb-swiper" style="margin-top:10px;">
                     <div class="swiper-wrapper">
                        @foreach ($img as $item)
                        <div class="swiper-slide">
                           <img class="thumb" src="{{ $item }}" alt=""
                              style="width:100px;height:100px;object-fit:cover;cursor:pointer;border-radius:4px;">
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
               <br>
               <br>
            </div>
            <div
               class="abc col-xs-12 col-lg-5 col-xl-5 details-pro bg-white py-sm-2 pt-2 mt-md-3 mt-0 mt-lg-0 px-3" style="background-color: #000000 !important;">
               <div class="product-detail-mobile d-lg-none mb-4">
                  <div class="pb-3 pt-3 col_large_default large-image">
                  </div>
               </div>
               <div class="sticky">
                  <div class="">
                     <div class="">
                        <br>
                        <h1 class="title-product bk-product-name mauvang" style="font-size: 25px">
                           {{ $product->name }}
                        </h1>
                        <form action="{{ route('add.to.cart') }}" enctype="multipart/form-data"
                           data-id="{{ $product->id }}" method="post"
                           class="form_background  margin-bottom-0">
                           @csrf
                           <div class="group-status">
                              @if ($product->price > 0)
                              @if ($product->discount > 0 && $phantram > 0 && $product->status_variant != 1)
                              <div class="price-box">
                                 <span class="special-price"><span
                                    class="price product-price bk-product-price">{{ number_format($product->discount, 0, ',', '.') }}₫</span>
                                 </span> <!-- Giá Khuyến mại -->
                                 <span class="old-price">
                                 <del
                                    class=" product-price-old sale">{{ number_format($product->price, 0, ',', '.') }}₫</del>
                                 </span> <!-- Giá gốc -->
                                 <div class="label_product">
                                    -{{ round($phantram) }}%
                                 </div>
                              </div>
                              @else
                              <div class="price-box">
                                 <span class="special-price"><span
                                    class="price product-price bk-product-price"
                                    id="variant-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                 </span> <!-- Giá Khuyến mại -->
                              </div>
                              @endif
                              @else
                              <div class="price-box">
                                 <span class="special-price"><span
                                    class="price product-price bk-product-price">Đang cập
                                 nhật</span>
                                 </span> <!-- Giá Khuyến mại -->
                              </div>
                              @endif
                              <div class="form-product pt-sm-2" style="
                                 margin-left: 27px !important;
                                 ">
                                 <div class='product-promotion rounded-sm test' id='ega-salebox'>
                                    <h3 class='product-promotion__heading rounded-sm d-inline-flex align-items-center'
                                       style="color: #000;">
                                       <img src='//theme.hstatic.net/200000574527/1001200251/14/icon-product-promotion1.png?v=447'
                                          alt='Smart Tivi LG QNED evo AI MiniLED 4K 100 inch 100QNED86AS'
                                          width='16' height='16' class='mr-2' />
                                       KHUYẾN MÃI - ƯU ĐÃI
                                    </h3>
                                    <div class="">{!! languageName($product->description) !!}</div>
                                    <ul class="promotion-box">
                                       @foreach ($khuyenmai as $item)
                                       <li>
                                          {{ $item->detail }}
                                       </li>
                                       @endforeach
                                       <br>
                                    </ul>
                                 </div>
                                 @foreach ($variants as $variant)
                                 <div class="box-variant clearfix"
                                    data-variant-group="{{ $variant->display_name }}">
                                    <label
                                       for="variant-{{ $loop->index }}">{{ $variant->display_name }}:</label>
                                    <div class="variant-options d-flex flex-wrap">
                                       @foreach ($variant->option_values as $key => $option)
                                       <button type="button"
                                          class="btn variant-btn {{ $key === 0 ? 'active' : '' }}"
                                          data-variant-id="{{ $option->_id }}"
                                          data-version="{{ $option->label }}">
                                       {{ $option->label }}
                                       </button>
                                       @endforeach
                                    </div>
                                 </div>
                                 <br>
                                 @endforeach
                                 <!-- Khu vực hiển thị giá -->
                                 <div class="form_button_details w-100">
                                    <div class="form_product_content type1 ">
                                       <div class="d-flex-cus">
                                          <div class="product-status mauvang" >
                                             <strong>Tình trạng: </strong> <span style="color: white;">
                                             {{ $product->status == 1 ? 'Còn hàng' : 'Hết hàng' }}
                                             </span>
                                          </div>
                                          <br>
                                          <div class="soluong soluong_type_1 show">
                                             <label class="mauvang">Số lượng:</label>
                                             <div class="custom custom-btn-number show">
                                                <div class="input_number_product  d-flex align-items-center">
                                                   <button type="button" class="btn btn-decrement" onclick="decrementQuantity()" style="
                                                      border-radius: 0px;
                                                      ">-</button>
                                                   <input type="number" id="quantity" name="quantity" value="1" min="1" class="text-center" style="height: 34px;width: 54px;">
                                                   <button type="button" class="btn btn-increment" onclick="incrementQuantity()" style="
                                                      transform: translateX(-20px);
                                                      /* margin-right: 8px; */
                                                      border-radius: 0px;
                                                      ">+</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="button_actions">
                                          <input type="hidden" name="product_id"
                                             value="{{ $product->id }}">
                                          <input type="hidden" name="selected_variant"
                                             id="selected-variant" value="">
                                          <input type="hidden" name="variant_price"
                                             id="variant-price-hidden" value="">
                                          <button type="submit"
                                             class="btn btn_base buynow detail_add_to_cart btn_add_cart"
                                             data-id="{{ $product->id }}">
                                          THÊM VÀO GIỎ HÀNG <span>Giao hàng tận nơi hoặc nhận tại
                                          cửa
                                          hàng</span>
                                          </button>
                                          <div class="gr-detail-wrapper"
                                             style='display: flex; flex-wrap: wrap; width: 100%;align-items: center;'>
                                             <a class="btn btn_tuvan" href="{{ route('lienHe') }}"
                                                target="_blank">
                                             <strong>Tư vấn</strong>
                                             <span>Chúng tôi sẽ gọi lại cho bạn</span>
                                             </a>
                                          </div>
                                       </div>
                                       <!-- BK BUTTON -->
                                       <div class='bk-btn'></div>
                                       <!-- END BK BUTTON -->
                                       <p class='product-hotline mb-0 text-center'>
                                          Gọi đặt mua <a
                                             href="tel:{{ $setting->phone1 }}">{{ $setting->phone1 }}</a>
                                          (7:30
                                          - 22:00)
                                       </p>
                                    </div>
                                 </div>
                              </div>
                        </form>
                        </div>
                     </div>
                     
                     <div class=" col_res product-content js-content-wrapper d-lg-none">
                        {{-- <div class="specifications_mb">
                           <div class="product-specifications card border-0">
                              <div
                                 class="title_module_main heading-bar d-flex justify-content-between align-items-center">
                                 <h2 class="heading-bar__title ">
                                    Thông Số Kỹ Thuật
                                 </h2>
                              </div>
                              <div class='product_getcontent'>
                                 @if (!empty($product->km))
                                 {!! languageName($product->km) !!}
                                 @else
                                 Đang cập nhật ...
                                 @endif
                              </div>
                              <!-- Modal -->
                              <div class="modal fade" id="specification-modal-mb" tabindex="-1"
                                 aria-labelledby="specification-modal-label" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                       <div class="modal-header border-0 pb-0">
                                          <h5 class="modal-title" id="specification-modal-label">Thông
                                             Số Kỹ Thuật
                                          </h5>
                                          <button type="button" class="close" data-dismiss="modal"
                                             aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body">
                                          @if (!empty($product->km))
                                          {!! languageName($product->km) !!}
                                          @else
                                          Đang cập nhật ...
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div> --}}
                        {{-- <div
                           class="title_module_main heading-bar d-flex justify-content-between align-items-center">
                           <h2 class="heading-bar__title ">
                              Thông tin sản phẩm
                           </h2>
                        </div>
                        <div id="ega-uti-editable-content" data-platform='haravan' data-id="1067052590"
                           class="rte js-product-getcontent product_getcontent pos-relative">
                           <div id="content" class='content js-content'>
                              {!! languageName($product->content) !!}
                           </div>
                        </div> --}}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
</section>
<div class="section_product_bottom">
   <section class="section ">
      <div class="container">
         <div class="row mr-sm-0 ml-sm-0">
            <div class="mb-3 mb-sm-0 col-12 col-xl-7  card border-0">
            </div>
            <div class="col-12 col-xl-5 product_sidebar pl-0 pl-sm-3 pr-0">
            </div>
         </div>
      </div>
   </section>
   {{-- <section class="section" id="section-review">
      <div class="container">
         <div class="card">
            <div>
            </div>
         </div>
      </div>
   </section> --}}
   <div class="container">

       <div class="row">
        <div class="col-md-12 col-lg-12 noidung-sanpham">
            {!! languageName($product->content) !!}
        </div>
       </div>
   </div>
   <section class="section container sec_tab">
      <div class='row ml-sm-0 mr-sm-0'>
         <div class='col-12 pl-0 pr-0'>
            <div id="related-product" data-id="related-product" class="tabpro_content active">
               <div class='card related-product border-0 p-3'>
                  <div class="title_module heading-bar d-flex justify-content-between align-items-center">
                     <h2 class="bf_flower heading-bar__title">
                        <a href="javascript:0" title="SẢN PHẨM THƯỜNG MUA CÙNG" style="font-weight: 700;
    color: black;">SẢN PHẨM CÙNG LOẠI</a>
                     </h2>
                  </div>
                  <br>
                  <br>
                  
              <div class="section_prd_feature section products product_related">
    <div class="swiper related-swiper">
        <div class="swiper-wrapper">
            @foreach ($productlq as $pro)
                @php
                    $img = json_decode($pro->images);
                @endphp
                <div class="swiper-slide">
                    @include('layouts.product.item', ['product' => $pro])
                </div>
            @endforeach
        </div>
        <!-- Nếu muốn có nút điều hướng -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- Nếu muốn có dots -->
        <div class="swiper-pagination"></div>
    </div>
</div>
               </div>
           
            </div>
         </div>
      </div>
   </section>
   <hr>
</div>
<!-- BK MODAL -->
<div id='bk-modal'></div>


<script>
   document.addEventListener('DOMContentLoaded', function() {
       const variantButtons = document.querySelectorAll('.variant-btn');
       const selectedVariantInput = document.getElementById('selected-variant');
       const variantPriceHidden = document.getElementById('variant-price-hidden');
       const addToCartButton = document.querySelector('.btn_add_cart');
       let selectedVariants = {}; // Lưu trữ các variant đã chọn
   
       // Đếm số nhóm variant có trong sản phẩm
       const totalVariantGroups = document.querySelectorAll('.box-variant').length;
   
       // Nếu KHÔNG có variant, hiển thị giá mặc định ngay
       if (totalVariantGroups === 0) {
           const priceDisplay = document.getElementById('variant-price');
           if (priceDisplay) {
               @if ($product->price > 0)
                   priceDisplay.textContent = "{{ number_format($product->price, 0, ',', '.') }}₫";
                   if (variantPriceHidden) variantPriceHidden.value = "{{ $product->price }}";
               @else
                   priceDisplay.textContent = "Đang cập nhật giá";
                   if (variantPriceHidden) variantPriceHidden.value = "";
               @endif
           }
           // Không cần xử lý variant tiếp nữa
           return;
       }
   
       // Tự động chọn giá trị đầu tiên của mỗi nhóm khi trang được tải
       document.querySelectorAll('.box-variant').forEach(box => {
           const firstButton = box.querySelector('.variant-btn');
           if (firstButton) {
               firstButton.classList.add('active');
               const variantGroup = box.getAttribute('data-variant-group');
               const variantLabel = firstButton.getAttribute('data-version');
               selectedVariants[variantGroup] = variantLabel;
           }
       });
   
       // Cập nhật input ẩn với chuỗi kết hợp
       updateSelectedVariantInput();
   
       // Kiểm tra trạng thái ban đầu và hiển thị giá
       checkVariantSelection();
   
       // Xử lý khi người dùng chọn variant
       variantButtons.forEach(button => {
           button.addEventListener('click', function() {
               const variantGroup = this.closest('.box-variant').getAttribute(
                   'data-variant-group');
               const variantLabel = this.getAttribute('data-version');
   
               // Kiểm tra nếu đang click vào variant đã được chọn
               if (this.classList.contains('active')) {
                   // Chỉ cho phép bỏ chọn khi có variant khác đã được chọn trong cùng nhóm
                   const activeVariantsInGroup = document.querySelectorAll(
                       `.box-variant[data-variant-group="${variantGroup}"] .variant-btn.active`
                   );
   
                   // Nếu chỉ có một variant active trong nhóm, không cho phép bỏ chọn
                   if (activeVariantsInGroup.length <= 1) {
                       // Không làm gì cả, giữ nguyên trạng thái đã chọn
                       return;
                   }
   
                   // Bỏ chọn variant này
                   this.classList.remove('active');
                   // Xóa khỏi object selectedVariants
                   delete selectedVariants[variantGroup];
               } else {
                   // Bỏ chọn tất cả các variant khác trong cùng nhóm
                   document.querySelectorAll(
                           `.box-variant[data-variant-group="${variantGroup}"] .variant-btn`)
                       .forEach(btn => btn.classList.remove('active'));
   
                   // Chọn variant hiện tại
                   this.classList.add('active');
   
                   // Lưu giá trị đã chọn
                   selectedVariants[variantGroup] = variantLabel;
               }
   
               // Cập nhật input ẩn với chuỗi kết hợp
               updateSelectedVariantInput();
   
               // Kiểm tra xem đã chọn đủ variant chưa
               checkVariantSelection();
           });
       });
   
       // Hàm cập nhật input ẩn với chuỗi kết hợp
       function updateSelectedVariantInput() {
           const combinedVariant = Object.values(selectedVariants).join(
               '-'); // Kết hợp các giá trị bằng dấu "-"
           selectedVariantInput.value = combinedVariant; // Gán giá trị vào input ẩn
           console.log('Selected Variants:', selectedVariants);
           console.log('Combined Value:', combinedVariant);
       }
   
       // Hàm kiểm tra xem đã chọn đủ variant chưa và xử lý tương ứng
       function checkVariantSelection() {
           const selectedCount = Object.keys(selectedVariants).length;
           const priceDisplay = document.getElementById('variant-price');
   
           // Kiểm tra nếu đã chọn đủ số lượng variant cần thiết
           if (selectedCount === totalVariantGroups) {
               if (addToCartButton) {
                   addToCartButton.removeAttribute('disabled');
                   addToCartButton.classList.remove('disabled');
               }
   
               // Gửi AJAX để lấy giá
               fetchPrice(selectedVariants);
           } else {
               // Chưa đủ variant, hiển thị thông báo
               if (priceDisplay) {
                   priceDisplay.textContent = `Vui lòng chọn đủ ${totalVariantGroups} tùy chọn`;
               }
   
               if (variantPriceHidden) {
                   variantPriceHidden.value = "";
               }
   
               if (addToCartButton) {
                   addToCartButton.setAttribute('disabled', 'disabled');
                   addToCartButton.classList.add('disabled');
               }
           }
   
           // Đánh dấu các nhóm variant chưa được chọn
           document.querySelectorAll('.box-variant').forEach(box => {
               const groupName = box.getAttribute('data-variant-group');
               const variantLabel = box.querySelector('.variant-btn-label');
   
               if (!selectedVariants[groupName]) {
                   if (variantLabel) {
                       variantLabel.classList.add('required');
                   } else {
                       // Nếu không có label, thêm một thông báo vào nhóm
                       if (!box.querySelector('.variant-required-message')) {
                           const requiredMsg = document.createElement('span');
                           requiredMsg.className = 'variant-required-message';
                           requiredMsg.textContent = '(Bắt buộc chọn)';
                           requiredMsg.style.color = 'red';
                           requiredMsg.style.fontSize = '12px';
                           requiredMsg.style.marginLeft = '5px';
                           box.querySelector('label').appendChild(requiredMsg);
                       }
                   }
               } else {
                   if (variantLabel) {
                       variantLabel.classList.remove('required');
                   } else {
                       const requiredMsg = box.querySelector('.variant-required-message');
                       if (requiredMsg) {
                           requiredMsg.remove();
                       }
                   }
               }
           });
       }
   
       // Hàm gửi AJAX để lấy giá
       function fetchPrice(selectedVariants) {
           const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
           const productId = {{ $product->id }}; // Lấy id sản phẩm từ blade
   
           fetch("/get-price", {
                   method: "POST",
                   headers: {
                       "Content-Type": "application/json",
                       "X-CSRF-TOKEN": csrfToken
                   },
                   body: JSON.stringify({
                       product_id: productId, // Gửi thêm id sản phẩm
                       options: Object.values(selectedVariants) // Gửi các giá trị đã chọn
                   })
               })
               .then(response => response.json())
               .then(data => {
                   const priceDisplay = document.getElementById('variant-price');
                   if (data.success) {
                       const formattedPrice = new Intl.NumberFormat('vi-VN', {
                           style: 'currency',
                           currency: 'VND',
                           maximumFractionDigits: 0
                       }).format(data.price);
   
                       if (priceDisplay) priceDisplay.textContent = formattedPrice;
                       if (variantPriceHidden) variantPriceHidden.value = data.price;
                   } else {
                       if (priceDisplay) priceDisplay.textContent = "Đang cập nhật giá";
                       if (variantPriceHidden) variantPriceHidden.value = "";
                   }
               })
               .catch(error => {
                   console.error("Lỗi:", error);
                   const priceDisplay = document.getElementById('variant-price');
                   if (priceDisplay) priceDisplay.textContent = "Đang cập nhật giá";
               });
       }
   
       // Thêm CSS cho các phần tử bắt buộc
       const style = document.createElement('style');
       style.textContent = `
   .variant-required-message {
       color: #e74c3c;
       font-size: 12px;
       margin-left: 5px;
   }
   
   .disabled {
       opacity: 0.6;
       cursor: not-allowed !important;
   }
   
   .box-variant label {
       display: flex;
       align-items: center;
   }
   `;
       document.head.appendChild(style);
   
       // Xử lý sự kiện submit của form
       const productForm = document.querySelector('form.form_background');
       if (productForm) {
           productForm.addEventListener('submit', function(e) {
               const selectedCount = Object.keys(selectedVariants).length;
   
               // Nếu chưa chọn đủ variant, ngăn không cho submit form
               if (selectedCount < totalVariantGroups) {
                   e.preventDefault();
                   alert(
                       `Vui lòng chọn đủ ${totalVariantGroups} tùy chọn sản phẩm trước khi thêm vào giỏ hàng.`
                   );
                   return false;
               }
           });
       }
   });
</script>
<style>
   .input_number_product {
   display: flex;
   align-items: center;
   border: 1px solid #ccc;
   border-radius: 5px;
   overflow: hidden;
   width: fit-content;
   }
   .input_number_product button {
   background-color: #ffffff;
   border: none;
   padding: 5px 10px;
   cursor: pointer;
   font-size: 16px;
   color: #333;
   transition: background-color 0.3s ease;
   }
   .input_number_product button:hover {
   background-color: #ddd;
   }
   .input_number_product input[type="number"] {
   border: none;
   text-align: center;
   width: 50px;
   font-size: 16px;
   padding: 5px;
   outline: none;
   }
</style>
<script>
   function incrementQuantity() {
       const quantityInput = document.getElementById('quantity');
       quantityInput.value = parseInt(quantityInput.value) + 1;
   }
   
   function decrementQuantity() {
       const quantityInput = document.getElementById('quantity');
       if (parseInt(quantityInput.value) > 1) {
           quantityInput.value = parseInt(quantityInput.value) - 1;
       }
   }
</script>
<script>
   // Lắng nghe sự kiện DOMContentLoaded khi trang đã tải xong
   document.addEventListener('DOMContentLoaded', function() {
       // Lấy nút "Thêm vào giỏ" bằng class .btn_add_cart
       const addCartButton = document.querySelector('.btn_add_cart');
       if (addCartButton) {
           // Gắn sự kiện click cho nút "Thêm vào giỏ"
           addCartButton.addEventListener('click', function(e) {
               e.preventDefault(); // Ngăn chặn hành động mặc định của nút
   
               // Lấy form chứa nút "Thêm vào giỏ"
               const form = this.closest('form');
               const formData = new FormData(form); // Tạo đối tượng FormData từ form
               console.log(formData); // Ghi thông tin formData vào console để kiểm tra
               // Gửi yêu cầu fetch đến server
               fetch(form.action, {
                       method: 'POST', // Phương thức POST
                       body: formData, // Dữ liệu từ form
                       headers: {
                           'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                               .content // Token CSRF
                       }
                   })
                   .then(response => response.json()) // Chuyển đổi phản hồi thành JSON
                   .then(data => {
                       if (data.success) {
                           // Hiển thị thông báo thành công bằng toastr
                           toastr.success(data.message);
   
                           // Cập nhật số lượng sản phẩm trong giỏ hàng
                           const cartCountElements = document.querySelectorAll('.count_item_pr');
                           fetch('{{ route('cart.sidebar') }}')
                               .then(response => response.text())
                               .then(html => {
                                   // Cập nhật nội dung giỏ hàng
                                   document.getElementById('cart-sidebar').innerHTML = html;
                               })
                               .catch(error => console.error('Lỗi khi cập nhật giỏ hàng:', error));
                           if (cartCountElements.length > 0) {
                               cartCountElements.forEach(element => {
                                   element.textContent = data
                                       .cartCount; // Cập nhật số lượng từ server
                               });
   
                           }
                       } else {
                           // Hiển thị thông báo lỗi nếu có
                           toastr.error(data.message);
                       }
                   })
                   .catch(error => {
                       console.error('Lỗi:', error); // Ghi lỗi vào console
                       toastr.error('Đã xảy ra lỗi. Vui lòng thử lại.'); // Hiển thị thông báo lỗi
                   });
           });
       } else {
           console.error('Phần tử .btn_add_cart không tồn tại.'); // Ghi lỗi nếu không tìm thấy nút
       }
   });
</script>
<style>
   /** Product infor **/
   .product-detail-left {
   border-top-left-radius: 0.25rem;
   border-bottom-left-radius: 0.25rem;
   }
   .details-product .details-pro {
   --block-spacing: 10px;
   border-top-right-radius: 0.25rem;
   border-bottom-right-radius: 0.25rem;
   }
   .title-product,
   .title-product a {
   font-weight: 700;
   font-size: 20px;
   color: var(--text-color)
   }
   @media (max-width: 767px) {
   .title-product {
   font-size: 1.2rem;
   }
   .details-product .details-pro {
   margin-top: 0 !important;
   }
   }
   .details-pro .group-status .line {
   color: #999;
   }
   .details-pro .group-status {
   font-size: 13px;
   display: flex;
   flex-wrap: wrap;
   }
   .details-pro .group-status>span {
   flex-basis: 50%;
   }
   @media (max-width: 575px) {
   .details-pro .group-status .line {
   display: none;
   }
   }
   .status_name,
   .status_name a {
   color: #007bff;
   }
   .details-product .details-pro .price-box {
   position: relative;
   margin: 15px 0 10px;
   background: #f1f1f1;
   border-radius: 4px;
   display: block;
   }
   @media (max-width: 991px) {
   .details-product .details-pro .price-box {
   margin-top: 10px !important;
   }
   }
   .details-product .details-pro .product-badge {
   display: block;
   }
   .details-product .details-pro .product-price {
   font-size: 35px;
   color: var(--price-color);
   line-height: 24px;
   font-family: inherit;
   font-weight: 700;
   }
   .details-product .details-pro .product-price-old {
   font-size: 16px;
   }
   .button_actions .btn_base {
   width: 100%;
   }
   .button_actions {
   display: flex;
   margin-bottom: 10px;
   flex-wrap: wrap;
   }
   .button_actions .btn {
    background-color: #b18a55;
   color: white;
   transition: all 0.3s ease;
   font-weight: 700;
   text-decoration: none;
   display: -webkit-box;
   display: -ms-flexbox;
   display: flex;
   flex-flow: column;
   -webkit-box-pack: center;
   -ms-flex-pack: center;
   justify-content: center;
   -webkit-box-align: center;
   -ms-flex-align: center;
   align-items: center;
   height: 55px;
   font-size: 14px;
   line-height: 20px;
   padding: 5px 10px;
   }
   .button_actions .btn span {
   font-weight: 400;
   font-size: small;
   }
   .buynow,
   .quick-view-product .button_actions .btn-cart {
   grid-column: 1 / -1;
   background-color: var(--buynow-bg);
   color: var(--buynow-text-color);
   }
  
   .button_actions .btn-cart,
   .btn-installment {
   background-color: #fff;
   color: var(--buynow-bg);
   border: 1px solid var(--buynow-bg);
   margin-top: 10px;
   width: calc(50% - 5px);
   background-color: #288ad6;
   color: #fff;
   border-color: #288ad6;
   }
   .button_actions .btn-cart:hover,
   .btn-installment:hover {
   background-color: var(--buynow-bg);
   color: #fff;
   background-color: #288ad6;
   color: #fff;
   border-color: #288ad6;
   }
   .button_actions .btn-cart {
   margin-right: 5px;
   padding: 0;
   width: 55px;
   border: none;
   overflow: hidden;
   margin-top: 0;
   }
   .btn-installment {
   margin-left: 5px;
   }
   .button_actions .btn:only-child,
   .button_actions .btn.is-full {
   width: 100%;
   margin-left: 0;
   margin-right: 0;
   }
   .button_actions .btn-cart strong {
   font-size: 16px;
   }
   .btn_tuvan {
   display: inline-block;
   background-color: #288ad6 !important;
   color: #ffffff !important;
   }
   .gr-detail-wrapper .btn_tuvan {
   margin-right: 5px;
   width: calc(50% - 32.5px);
   flex: 1;
   }
   .gr-detail-wrapper .btn_tuvan strong {
   font-weight: 600;
   }
   .gr-detail-wrapper {
   margin-top: 10px;
   }
   @media (max-width: 560px) {
   .gr-detail-wrapper .bk-btn {
   margin-top: 10px;
   width: 100% !important;
   }
   .gr-detail-wrapper .btn_tuvan {
   margin-right: 0;
   width: calc(100% - 60px);
   }
   }
   /*.button_actions .btn-cart:hover, .btn-installment:hover {
   filter: brightness(1.2);
   }
   @media (max-width: 575px) {
   .button_actions .btn {
   min-width: 100%;
   margin-left: 0;
   margin-right: 0;
   width: 100%;
   }
   }
   */
   .soluong.show {
   display: grid;
   }
   .soluong {
   align-items: center;
   grid-template-columns: 80px 1fr;
   margin-bottom: 20px;
   }
   .soluong label {
   margin: 0;
   font-weight: bold;
   }
   #ega-sticky-addcart .soluong {
   margin-bottom: 0;
   }
   .soluong label {
   color: #000000;
   justify-content: flex-start;
   }
   .input_number_product,
   .custom-btn-number {
   border: none;
   display: flex;
   height: 36px;
   margin-bottom: 0;
   margin-top: 0;
   align-items: center;
   }
   button.btn.btn_num {
   border-radius: 0;
   padding: 4px;
   width: 30px;
   border: 1px solid #ced4da;
   height: 30px;
   display: flex;
   align-items: center;
   justify-content: center;
   color: #8c9196;
   }
   button.btn.btn_num.num_1 {
   border-right: none;
   border-radius: 4px 0 0 4px;
   }
   button.btn.btn_num.num_2 {
   border-radius: 0 4px 4px 0;
   border-left: none;
   }
   .prd_quantity {
   border: 0;
   width: 55px !important;
   text-align: center;
   border-top: 1px solid #ced4da;
   border-bottom: 1px solid #ced4da;
   border-radius: 0;
   height: 30px;
   }
   .details-product .details-pro .price-box,
   #ega-sticky-addcart .price-box {
   display: flex;
   align-items: center;
   flex-wrap: wrap;
   background: transparent;
   padding-left: 0;
   padding-right: 0;
   margin-top: calc(var(--block-spacing) * 2);
   column-gap: 4px;
   }
   #ega-sticky-addcart .price-box {
   border-top: none;
   }
   .details-product .price-box .label_product,
   #ega-sticky-addcart .label_product {
   border-radius: 4px;
   background: var(--label-background);
   color: var(--label-color);
   display: inline-flex;
   justify-content: center;
   align-items: center;
   font-size: 14px;
   padding: 3px 8px;
   font-weight: bold;
   margin-left: 10px;
   }
   .product-price-old {
   color: #979797 !important;
   margin-left: 5px;
   font-size: 14px;
   font-weight: normal;
   }
   .save-price {
   font-size: 14px;
   width: 100%;
   display: none;
   }
   .save-price span {
   color: var(--price-color);
   }
   .details-product .quickview-info .price-box {
   margin-top: var(--block-spacing);
   padding-top: var(--block-spacing);
   padding-top: var(--block-spacing);
   }
   .quick-view-product .product-summary {
   padding: var(--block-spacing) 0;
   }
   .icon-button-play {
   width: 20px !important;
   }
   .product-promotion {
   //background-color: var(--body-background);
   margin-bottom: 10px;
   border-radius: 10px !important;
   overflow: hidden;
   border: 1px solid #dedede;
   }
   .product-promotion__heading {
   grid-gap: 10px;
   gap: 10px;
   height: 42px;
   background: #f5f5f5;
   padding: 9px 15px;
   border-bottom: 1px solid #dedede;
   font-weight: 700;
   font-size: 15px;
   display: flex !important;
   margin-bottom: 0;
   }
   .product-promotion__heading img {
   width: 20px;
   }
   .product-promotion>ul,
   .product-promotion>div {
   margin-bottom: 0;
   border-radius: 4px;
   padding: 8px 8px 8px 15px;
   list-style-position: inside;
   background: #fff
   }
   .product-promotion ul li,
   .product-promotion>div>* {
    color: black;
    list-style: none;
   padding: 3px 0;
   margin: 0;
   }
   .product-specifications table {
   border-collapse: unset;
   border-spacing: 0;
   }
   .product-specifications table,
   #specification-modal table {
   max-width: 100%;
   }
   .product-specifications table td {
   padding: 8px;
   border-right: 1px solid var(--border-color);
   border-bottom: 1px solid var(--border-color);
   }
   .product-specifications table tr:nth-of-type(odd) {
   background-color: var(--body-background);
   }
   .product-specifications table tr:first-child td {
   border-top: 1px solid var(--border-color);
   }
   .product-specifications table tr td:first-child {
   border-left: 1px solid var(--border-color);
   width: 40%;
   }
   .product-specifications table tr:first-child td:first-child {
   border-top-left-radius: 8px;
   }
   .product-specifications table tr:first-child td:last-child {
   border-top-right-radius: 8px;
   }
   .product-specifications table tr:last-child td:last-child {
   border-bottom-right-radius: 8px;
   }
   .product-specifications table tr:last-child td:first-child {
   border-bottom-left-radius: 8px;
   }
   .product-hotline a {
   font-weight: bold;
   color: #288ad6 !important;
   }
   .details-product .product-promo-tag {
   margin-top: 5px;
   margin-bottom: 5px;
   }
   .vat {
   display: inline-block;
   font-size: 16px;
   font-weight: bold;
   margin-left: 10px;
   }
   @media (max-width: 991px) {
   .vat {
   margin-left: 0;
   margin-top: 5px;
   }
   }
   .bk-btn {
   width: calc(50% - 32.5px);
   display: flex;
   flex-wrap: wrap;
   }
   .bk-btn button {
   //	width: calc(50% - 5px);
   width: 100%;
   }
   .bk-btn .bk-btn-installment {
   margin-right: 0px;
   margin-top: 0;
   margin-bottom: 0;
   height: 55px;
   }
   .bk-btn-paynow {
   display: none !important;
   }
   .btn-installment {
   display: none !important;
   }
   ul.promotion-box {
   margin-bottom: -16px;
   }
   .bk-btn-box {
   width: 100% !important;
   }
   .js-product-getcontent.product_getcontent {
   max-height: 600px;
   }
   .sticky {
   @media (min-width: 1200px) {
   //    position: sticky;
   //   top: 110px;
   }
   }
</style>
@endsection
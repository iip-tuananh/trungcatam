

@php
    $img =json_decode($pro['image']);
    $phantram = $pro['price'] > 0 ? 100 - ($pro['discount'] / $pro['price']) * 100 : 0;
    $thongso = json_decode($pro['size']);
    $khuyenmai = json_decode($pro['preserve']);
@endphp
<div class="flashsale__item col-12 col-lg-15 item product-col tuan-col" data-pd-id="1053774514"
data-inventory-quantity="" data-available="true" data-max-stock="100">
<div class="item_product_main">
    <form action="{{route('add.to.cart')}}" method="post" class="variants product-action"
        enctype="multipart/form-data">
        @csrf
        <div class="product-thumbnail pos-relative">
            <a class="image_thumb pos-relative embed-responsive embed-responsive-1by1"
                href="{{ route('detailProduct', ['cate' => $pro['cate_slug'], 'type' => $pro['type_slug'] ? $pro['type_slug'] : 'loai', 'id' => $pro['slug']]) }}"
                title="{{ $pro['name'] }}">
                <img loading="lazy"
                    class='lazyload product-thumbnail__img product-thumbnail__img--primary'
                    width="480" height="480" style="--image-scale: 1;"
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                    data-src="{{$img[0]}}" alt="{{ $pro['name'] }}">
                @if (isset($img[1]))
                    <img loading="lazy"
                        class='product-thumbnail__img product-thumbnail__img--secondary lazyload'
                        width="480" height="480" style="--image-scale: 1;"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                        data-src="{{ $img[1] }}" alt="{{ $pro['name'] }}">
                @endif
            </a>
            <div class="label_product d-none">
                <div class="label_wrapper">
                    {{ round($phantram) }}%
                </div>
            </div>
            <div class="product-action">
                <div class="group_action">
                   <a title="Xem nhanh"
   class="btn-circle btn-views btn_view btn right-to"
   data-modal="#oldmodal{{ $pro['id'] }}">
   <i class="fas fa-search"></i>
</a>
                    <a href="javascript:void(0);" onclick="addToCompare({{ $pro['id'] }})"
                            class="btn-circle btn-views btn_view btn right-to" title="Thêm vào so sánh">
                            <i class="fa fa-retweet" aria-hidden="true"></i>
                        </a>
                </div>
            </div>
            

            <div class="custom-modal" id="oldmodal{{ $pro['id'] }}"
                tabindex="-1" role="dialog"
                aria-labelledby="oldmodal{{ $pro['id'] }}"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" style="z-index: 20;" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"
                                id="oldmodal{{ $pro['id'] }}"
                                style="color: red;font-weight:700">{{ $pro['name'] }}
                            </h5>
                          <button type="button" class="close-modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div
                                    class="product-left-column product-images col-xs-12 col-sm-4 col-md-4 col-lg-5 col-xl-6">
                                    <div class="main-image">
                                        <img id="mainProductImage{{ $pro['id'] }}"
                                            src="{{ $img[0] }}"
                                            alt="{{ $pro['name'] }}"
                                            class="img-fluid tuanthun">
                                    </div>
                                    <div class="thumbnail-images d-flex mt-3">
                                        @foreach ($img as $key => $image)
                                            <div class="thumbnail-item">
                                                <img src="{{ $image }}"
                                                    alt="{{ $pro['name'] }} Thumbnail {{ $key + 1 }}"
                                                    class="img-thumbnail"
                                                    onclick="changeMainImage('{{ $pro['id'] }}', '{{ $image }}')">
                                            </div>
                                        @endforeach
                                    </div>
                                    <script>
                                        function changeMainImage(productId, imageUrl) {
                                            document.getElementById('mainProductImage' + productId).src = imageUrl;
                                        }
                                    </script>
                                </div>
                                <div class="product-center-column product-info product-item col-xs-12 col-sm-6 col-md-8 col-lg-7 col-xl-6 details-pro style_product style_border"
                                    id="product-1053774514">
                                    <div class="head-qv group-status">
                                        <h3 class="qwp-name title-product"><a
                                                class="text2line"
                                                href="{{ route('detailProduct', ['cate' => $pro['cate_slug'], 'type' => $pro['type_slug'] ? $pro['type_slug'] : 'loai', 'id' => $pro['slug']]) }}"
                                                title="{{ $pro['name'] }}">{{ $pro['name'] }}</a>
                                        </h3>
                                        <div class="vend-qv group-status">
                                            <div class="left_vend">
                                                <span class="line_tt d-none">|</span>

                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="qv-product-tags"
                                        value="[&quot;variant_4K&quot;,&quot;55 inch&quot;,&quot;variant_55 inch&quot;,&quot;uudaichung&quot;,&quot;variant_2024&quot;,&quot;4k&quot;,&quot;xuatxu_Việt Nam&quot;,&quot;Tìm kiếm giọng nói bằng Tiếng Việt&quot;,&quot;baohanh_24 tháng&quot;,&quot;uudai3&quot;]">
                                    <div class="quickview-info clearfix">
                                        <span class="prices price-box">
                                            @if ($pro['price'] > 0)
                                                @if ($pro['discount'] > 0 && $phantram > 0 && $pro['status_variant'] != 1)
                                                    <span
                                                        class="price">{{ number_format($pro['discount'], 0, ',', '.') }}₫</span>
                                                    <span
                                                        class="compare-price">{{ number_format($pro['price'], 0, ',', '.') }}₫</span>
                                                    <span class="label_product_tuan">Giảm
                                                        {{ round($phantram) }}%</span>
                                                @else
                                                    <span
                                                        class="price">{{ number_format($pro['price'], 0, ',', '.') }}₫</span>
                                                @endif
                                            @else
                                                <span class="price">Liên
                                                    hệ</span>
                                            @endif
                                        </span>
                                    </div>
                                   
                                        <span class="price-product-detail hidden"
                                            style="opacity: 0;">
                                            <span class=""></span>
                                        </span>
                                        <div class="product-promotion rounded-sm mb-3"
                                            id="qv-ega-salebox">
                                            <h3
                                                class="product-promotion__heading rounded-sm d-inline-flex align-items-center">
                                                <img alt="KHUYẾN MÃI - ƯU ĐÃI"
                                                    src="{{env('AWS_R2_URL')}}/frontend/images/icon-product-promotion.png"
                                                    width="16" height="16"
                                                    class="mr-2">
                                                THÔNG SỐ KỸ THUẬT
                                            </h3>
                                            <ul class="promotion-box">
                                                @php
                                                  
                                                @endphp

                                                @if (count($thongso) > 0)
                                                    <div class="row">

                                                        @foreach ($thongso as $item)
                                                            @if ($item->detail != '')
                                                                <div class="col-md-6">
                                                                    <li
                                                                        style="font-size: 12px">
                                                                        <b>{{ $item->title }}</b>:{{ $item->detail }}
                                                                    </li>

                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <br>
                                            </ul>
                                        </div>
                                        <div class="product-promotion rounded-sm mb-3"
                                            id="qv-ega-salebox">
                                            <h3
                                                class="product-promotion__heading rounded-sm d-inline-flex align-items-center">
                                                <img alt="KHUYẾN MÃI - ƯU ĐÃI"
                                                    src="{{env('AWS_R2_URL')}}/frontend/images/icon-product-promotion.png"
                                                    width="16" height="16"
                                                    class="mr-2">
                                                KHUYẾN MÃI - ƯU ĐÃI
                                            </h3>
                                            <ul class="promotion-box"
                                                style="font-size: 12px">
                                                <li>Bán đúng giá - không đăng ảo, cam kết rẻ
                                                    nhất miền Bắc.
                                                    Giao hàng lắp đặt nội thành Hà Nội trong
                                                    2h
                                                </li>
                                                <li>Bảo hành chính hãng tại nhà theo tiêu
                                                    chuẩn của nhà sản xuất</li>

                                            </ul>
                                        </div>
                                        <div class="form-group form_product_content">
                                            <div class="count_btn_style quantity_wanted_p">

                                                <div class="button_actions clearfix">
                                                    <button type="submit"
                                                        class="btn_cool btn themgio"
                                                    style="background-color:#c12026" data-id="{{ $pro['id'] }}">
                                                        THÊM VÀO GIỎ
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                              
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="product-uudai-wrapper">
            @php
               
            @endphp
            @foreach ($khuyenmai as $km)
                @if ($km->detail != '')
                    <div class="product-uudai-img ">
                        <i>{{ $km->detail }}</i>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="product-info">
            <h3 class="product-name line-camp-2"><a
                    href="{{ route('detailProduct', ['cate' => $pro['cate_slug'], 'type' => $pro['type_slug'] ? $pro['type_slug'] : 'loai', 'id' => $pro['slug']]) }}"
                    title="{{ $pro['name'] }}">
                    {{ $pro['name'] }}</a></h3>
            <div class="product-variants">
              

                @if (count($thongso) > 0)
                    @foreach ($thongso as $item)
                        @if ($item->detail != '')
                            <span>
                                {{ $item->detail }}
                            </span>
                        @endif
                    @endforeach
                @endif

            </div>
            <div class="price-box">
                @if ($pro['price'] > 0)
                    @if ($phantram > 0 && $pro['discount'] > 0 )
                        <div class="label_product d-inline-block">
                            <div class="label_wrapper"><span
                                    class="d-none d-sm-inline-block">Giảm
                                </span>
                                {{ round($phantram) }}%
                            </div>
                        </div>
                    @endif
                @endif
                @if ($pro['price'] > 0)
                    @if ($pro['discount'] > 0 && $phantram > 0 && $pro['status_variant'] != 1)
                        <span
                            class="price">{{ number_format($pro['discount'], 0, ',', '.') }}₫</span>
                        <span
                            class="compare-price">{{ number_format($pro['price'], 0, ',', '.') }}₫</span>
                    @else
                        <span
                            class="price">{{ number_format($pro['price'], 0, ',', '.') }}₫</span>
                    @endif
                @else
                    <span class="price">Liên hệ</span>
                @endif
            </div>



        </div>
    </form>



<script>
    $(document).on('submit', '.form-ajaxtocart', function(e) {
        e.preventDefault(); // Ngăn chặn hành vi submit mặc định

        let form = $(this);
        let formData = form.serialize(); // Lấy dữ liệu từ form
        let url = "{{ route('add.to.cart') }}"; // URL từ route Laravel

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function() {
                // Hiển thị thông báo thành công
                toastr.success(response.message, 'Thành công');


            },
            error: function(xhr) {
                // Hiển thị thông báo lỗi
                toastr.error('Đã xảy ra lỗi, vui lòng thử lại.', 'Lỗi');
                console.error("Lỗi từ server:", xhr.responseText); // Debug lỗi
            }
        });
    });
</script>
<script>
         function addToCompare(productId) {
            $.ajax({
                url: "{{ route('compareProduct') }}", // Đường dẫn tới route xử lý
                type: "POST",
                data: {
                    id: productId,
                    _token: "{{ csrf_token() }}" // Token bảo mật
                },
                success: function(response) {
    if (response.message === 'exist') {
        toastr.warning('Sản phẩm đã có trong danh sách so sánh!');
    } else if (response.message === 'error') {
        toastr.error('Sản phẩm không cùng danh mục, không thể so sánh!');
    } else if (response.message === 'limit3') {
        toastr.warning('Chỉ được so sánh tối đa 2 sản phẩm!');
    } else if (response.message === 'success') {
        toastr.success('Thêm vào danh sách so sánh thành công!');
        // Cập nhật giao diện nếu cần
        $('#compare-count').text(response.qty); // Ví dụ: cập nhật số lượng sản phẩm so sánh
    }
},
                error: function(xhr) {
                    alert('Đã xảy ra lỗi, vui lòng thử lại!');
                }
            });
        }
</script>
</div>
</div>


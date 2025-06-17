<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <example-component></example-component>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>



    <script  type="text/x-custom-template" data-template="product-tag-section">
    <div class="product-col">
        <div class="item_product_main">

            <form action="/cart/add" method="post" class="variants product-action" data-id="product-actions-1054370102"
                enctype="multipart/form-data">
                <div class="product-thumbnail pos-relative">






                    <a class="image_thumb pos-relative embed-responsive embed-responsive-1by1"
                        href="/products/dieu-hoa-casper-9000-btu-1-chieu-sc-09fs36"
                        title="Điều hòa Casper 9000 BTU 1 chiều SC-09FS36">















                        <img loading="lazy" class='lazyload product-thumbnail__img' width="480" height="480"
                            style="--image-scale: 1;"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                            data-src="//product.hstatic.net/200000574527/product/dieu_hoa_casper_9000_btu_1_chieu_sc-09fs36_1624d2f60637455aab4730525f173e84_large.jpg"
                            alt="Điều hòa Casper 9000 BTU 1 chiều SC-09FS36">
                    </a>
                    <div class="label_product d-none">
                        <div class="label_wrapper">
                            -32%
                        </div>
                    </div>
                    <div class="product-action">
                        <div class="group_action" data-url="/products/dieu-hoa-casper-9000-btu-1-chieu-sc-09fs36">
                            <a title="Xem nhanh" href="/products/dieu-hoa-casper-9000-btu-1-chieu-sc-09fs36"
                                data-handle="dieu-hoa-casper-9000-btu-1-chieu-sc-09fs36"
                                class="xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="product-uudai-wrapper">


                    <div class="product-uudai-img">
                        <img class="lazyload"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                            data-src="//theme.hstatic.net/200000574527/1001200251/14/img_tag_uudai_1.png?v=443" />
                    </div>



                </div>
                <div class="product-info">
                    <h3 class="product-name"><a href="/products/dieu-hoa-casper-9000-btu-1-chieu-sc-09fs36"
                            title="Điều hòa Casper 9000 BTU 1 chiều SC-09FS36">Điều hòa Casper 9000 BTU 1 chiều
                            SC-09FS36</a></h3>





























                    <div class="product-variants">













                        <span>
                            1 chiều
                        </span>




                        <span>
                            2024
                        </span>




                        <span>
                            9000 BTU
                        </span>






                    </div>

                    <div class="price-box">


                        <div class="label_product d-inline-block">
                            <div class="label_wrapper"><span class="d-none d-sm-inline-block">Giảm </span>
                                -32%
                            </div>
                        </div>
                        <span class="price">4,400,000₫</span>
                        <span class="compare-price">6,400,000₫</span>

                    </div>





                    <div class='product-promotion hidden' id='ega-salebox-1054370102'>
                        <h3 class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
                            <img alt="KHUYẾN MÃI - ƯU ĐÃI"
                                src='//theme.hstatic.net/200000574527/1001200251/14/icon-product-promotion.png?v=443'
                                width='16' height='16' class='mr-2' />
                            KHUYẾN MÃI - ƯU ĐÃI
                        </h3>

                        <ul class="promotion-box">



                            <li>Bán đúng giá - không đăng ảo, cam kết rẻ nhất miền Bắc.
                                Giao hàng lắp đặt nội thành Hà Nội trong 2h</li>



                            <li><a href="{{route('home')}}"><span
                                        style="font-size:16px">Chương trình của hãng Trả góp lãi suất <strong><span
                                                style="color:#e74c3c">0%</span></strong>, duyệt hồ sơ nhanh trong 5 phút
                                    </span><span style="font-size:12px">&lt;Chỉ áp dụng với Sản phẩm TV, Tủ lạnh, Máy
                                        giặt, Điều hòa của LG và Samsung&gt;</span></a></li>



                            <li>Bảo hành chính hãng tại nhà theo tiêu chuẩn của nhà sản xuất</li>



                            <li>Quý khách là đại lý, nhà thầu, thợ cần hỗ trợ số lượng lớn, xin vui lòng liên hệ tổng
                                đài bán hàng: <a href="tel:02422665858">024.2266.5858</a></li>



                            <li>Giá bán tại kho (chưa bao gồm phí vận chuyển và lắp đặt)
                                <a target="_blank"
                                    href="{{route('home')}}"><br><i><u>Chính
                                            Sách Vận Chuyển - Lắp Đặt {{$setting->webname}}</u></i><br></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </form>
        </div>
    </div>
    </script>




</body>

</html>

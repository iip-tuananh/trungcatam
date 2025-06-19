<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta name="theme-color" content="#d70018">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name='revisit-after' content='2 days' />
    <title>@yield('title')</title>
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta http-equiv="Content-Language" content="vi" />
    <link rel="alternate" href="{{ url()->current() }}" hreflang="vi-vn" />
    <meta name="description" content="@yield('description')">
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow">
    <meta name="revisit-after" content="1 days" />
    <meta name="generator" content="@yield('title')" />
    <meta name="rating" content="General">
    <meta name="application-name" content="@yield('title')" />
    <meta name="theme-color" content="#ed3235" />
    <meta name="msapplication-TileColor" content="#ed3235" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="{{ url()->current() }}" />
    <link rel="apple-touch-icon-precomposed" href="@yield('image')" sizes="700x700">
    <meta property="og:url" content="">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image')">
    <meta property="og:site_name" content="{{ url()->current() }}">
    <meta property="og:image:alt" content="@yield('title')">
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@{{ url() - > current() }}" />
    <meta name="twitter:title" content="@yield('title')" />
    <meta name="twitter:description" content="@yield('description')" />
    <meta name="twitter:image" content="@yield('image')" />
    <meta name="twitter:url" content="" />
    <meta itemprop="name" content="@yield('title')">
    <meta itemprop="description" content="@yield('description')">
    <meta itemprop="image" content="@yield('image')">
    <meta itemprop="url" content="">
    <link rel="canonical" href="{{ \Request::url() }}">
    <!-- <link rel="amphtml" href="amp/" /> -->
    <link rel="image_src" href="@yield('image')" />
    <link rel="image_src" href="@yield('image')" />
    <link rel="shortcut icon" href="{{ url('' . $setting->favicon) }}" type="image/x-icon">
    <link rel="icon" href="{{ url('' . $setting->favicon) }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Page Title -->
    <title>Spicyhunt - Restaurant HTML Template</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Google Fonts Css-->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="{{ asset('frontend/css/slicknav.min.css') }}" rel="stylesheet">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css') }}">
    <!-- Font Awesome Icon Css-->
    <link href="{{ asset('frontend/css/all.min.css') }}" rel="stylesheet">
    <!-- Animated Css -->
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <!-- Mouse Cursor Css File -->
    <link rel="stylesheet" href="{{ asset('frontend/css/mousecursor.css') }}">
    <!-- Main Custom Css -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" media="screen">

</head>

<body>

    <!-- Preloader Start -->
    {{-- <div class="preloader">
		<div class="loading-container">
			<div class="loading"></div>
			<div id="loading-icon"><img src="images/loader.svg" alt=""></div>
		</div>
	</div> --}}
    <!-- Preloader End -->

    <!-- Header Start -->
    @include('layouts.header.index')
    <!-- Header End -->
    @yield('content')

    <!-- Main Footer Section Start -->
    @include('layouts.footer.index')
    <!-- Main Footer Section End -->

    <!-- Jquery Library File -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Bootstrap js file -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- Validator js file -->
    <script src="{{ asset('frontend/js/validator.min.js') }}"></script>
    <!-- SlickNav js file -->
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <!-- Swiper js file -->
    <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
    <!-- Counter js file -->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <!-- Magnific js file -->
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- SmoothScroll -->
    <script src="{{ asset('frontend/js/SmoothScroll.js') }}"></script>
    <!-- Parallax js -->
    <script src="{{ asset('frontend/js/parallaxie.js') }}"></script>
    <!-- MagicCursor js file -->
    <script src="{{ asset('frontend/js/gsap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/magiccursor.js') }}"></script>
    <!-- Text Effect js file -->
    <script src="{{ asset('frontend/js/SplitText.js') }}"></script>
    <script src="{{ asset('frontend/js/ScrollTrigger.min.js') }}"></script>
    <!-- YTPlayer js File -->
    <script src="{{ asset('frontend/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <!-- Wow js file -->
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <!-- Main Custom js file -->
    <script src="{{ asset('frontend/js/function.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Thêm vào <head> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Thêm trước </body> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'vi',
                includedLanguages: 'en,hi,vi,zh-CN',
            }, 'translate_select');
        }
    </script>
    <style>
        .VIpgJd-ZVi9od-aZ2wEe-wOHMyf-ti6hGc {
            display: none;
        }

        .skiptranslate {
            display: none;
            top: 0;
        }

        .goog-te-banner-frame {
            display: none !important;
        }

        .goog-text-highlight {
            background: none !important;
            box-shadow: none !important;
        }

        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }
    </style>
    <style>
        body {
            position: revert !important;
            top: 0px !important;
        }
    </style>
    <script>
        function translateheader(lang) {

            var languageSelect = document.querySelector("select.goog-te-combo");
            languageSelect.value = lang;
            languageSelect.dispatchEvent(new Event("change"));
        }
    </script>
{{-- 
    <div class="lang-wrap">
        <a href="javascript:;" onclick="translateheader('vi')"><img width="30"
                src="{{ asset('frontend/images/vn.png') }}" alt=""></a>
        <a href="javascript:;" onclick="translateheader('en')"><img width="30"
                src="{{ asset('frontend/images/eng.png') }}" alt=""></a>
    </div> --}}
    <script>
        // ...existing code...
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.related-swiper', {
                slidesPerView: 4,
                spaceBetween: 16,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1
                    },
                    600: {
                        slidesPerView: 2
                    },
                    1000: {
                        slidesPerView: 4
                    }
                }
            });
        });
        // ...existing code...
    </script>
    <script>
        $(document).ready(function() {
            $('.owl-carousel-lq').owlCarousel({
                loop: true,
                margin: 16,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.owl-carousel-review').owlCarousel({
                loop: true,
                margin: 30,
                nav: true,
                autoplay: true, // Thêm dòng này để chạy tự động
                autoplayTimeout: 3000, // Thời gian chuyển slide (ms)
                autoplayHoverPause: true, // Dừng khi rê chuột vào
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.owl-carousel-chungchi').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                autoplay: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 5
                    },
                    1000: {
                        items: 5
                    }
                }
            });

            // Khi click vào ảnh chứng chỉ, show modal với ảnh lớn
            $('.certificate-thumb').on('click', function() {
                var imgSrc = $(this).data('img');
                $('#modalCertificateImg').attr('src', imgSrc);
            });
        });
    </script>
    <script>
        // Tạo mảng chứa tất cả các url ảnh chứng chỉ
        var certificateImages = [
            @foreach ($certificates as $certificate)
                "{{ $certificate->image }}",
            @endforeach
        ];
        var currentIndex = 0;

        // Khi click vào ảnh chứng chỉ trong carousel
        $('.certificate-thumb').on('click', function() {
            var imgSrc = $(this).data('img');
            currentIndex = certificateImages.indexOf(imgSrc);
            $('#modalCertificateImg').attr('src', imgSrc);
        });

        // Nút Lùi
        $('#prevCertificate').on('click', function() {
            currentIndex = (currentIndex - 1 + certificateImages.length) % certificateImages.length;
            $('#modalCertificateImg').attr('src', certificateImages[currentIndex]);
        });

        // Nút Tiếp
        $('#nextCertificate').on('click', function() {
            currentIndex = (currentIndex + 1) % certificateImages.length;
            $('#modalCertificateImg').attr('src', certificateImages[currentIndex]);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.blog-carousel').owlCarousel({
                loop: true,
                margin: 20,
                //   nav:true,
                autoplay: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        });
    </script>
    <script>
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        $('#contactForm')[0].reset();
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON?.message || 'Có lỗi xảy ra!');
                }
            });
        });
    </script>
    <script>
        document.querySelectorAll('#menu-left .nav-link').forEach(function(link) {
            link.addEventListener('click', function(e) {
                // Xóa active ở tất cả menu
                document.querySelectorAll('#menu-left .nav-link').forEach(function(l) {
                    l.classList.remove('active');
                });
                // Xóa open ở tất cả sub-menu
                document.querySelectorAll('#menu-left .sub-menu').forEach(function(li) {
                    li.classList.remove('open');
                });

                // Thêm active cho menu vừa click
                this.classList.add('active');

                // Nếu là menu con thì mở menu cha
                var parentSubMenu = this.closest('.sub-menu');
                if (parentSubMenu) {
                    parentSubMenu.classList.add('open');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            let selectedPriceRanges = [];
            let currentCate = "{{ isset($cate_slug) ? $cate_slug : '' }}";

            // Xử lý khi checkbox khoảng giá được click
            $(document).on('change', '.price-filter', function() {
                const range = $(this).data('range');
                const priceRange = $(this).val();
                const priceLabel = $(this).closest('label').text().trim();

                if ($(this).is(':checked')) {
                    if (!selectedPriceRanges.includes(priceRange)) {
                        selectedPriceRanges.push(priceRange);
                    }
                } else {
                    selectedPriceRanges = selectedPriceRanges.filter(price => price !== priceRange);
                }

                // Gọi AJAX để lọc sản phẩm
                filterProducts();
            });

            // Hàm gửi AJAX để lọc sản phẩm
            function filterProducts() {
                $.ajax({
                    url: '/locsanpham',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        price_ranges: selectedPriceRanges,
                        cate: currentCate
                    },
                    beforeSend: function() {
                        if ($('.loading-overlay').length === 0) {
                            $('.products-view-grid').append(
                                '<div class="loading-overlay"><div class="spinner-border text-primary" role="status"><span class="sr-only">Đang tải...</span></div></div>'
                            );
                        }
                    },
                    success: function(response) {
                        $('.product-list').html(response.html);
                        $('#pagination-links').html(response.pagination);
                        lazyloadImages();
                    },
                    error: function(xhr, status, error) {
                        console.error("Lỗi khi lọc sản phẩm:", error);
                    },
                    complete: function() {
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

            // Khởi tạo lazy load khi trang tải xong
            lazyloadImages();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.getElementById('mainImage');
            const thumbs = document.querySelectorAll('.thumb');
            thumbs.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    mainImage.src = this.src;
                    thumbs.forEach(t => t.style.border = '2px solid transparent');
                    this.style.border = '2px solid #f00';
                });
            });
            // Đặt viền đỏ cho thumbnail đầu tiên
            if (thumbs.length > 0) thumbs[0].style.border = '2px solid #f00';
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbSwiper = new Swiper('.thumb-swiper', {
                slidesPerView: 4,
                spaceBetween: 10,
                freeMode: true,
                watchSlidesProgress: true,
                breakpoints: {
                    600: {
                        slidesPerView: 6
                    }
                }
            });

            const mainSwiper = new Swiper('.main-swiper', {
                spaceBetween: 10,
                navigation: {
                    nextEl: null,
                    prevEl: null,
                },
                thumbs: {
                    swiper: thumbSwiper,
                },
            });
        });
    </script>
    <a class="toggle-btn" href="{{ route('listCart') }}" style="position: relative;">
        <i class="fa-solid fa-cart-shopping shake"></i>
        <span class="cart-count">0</span>
    </a>
    <script>
        $(document).on('click', '.remove-item-cart-tuan-detail', function() {
            let id = $(this).data('id'); // Lấy $key từ data-id
            let url = "/remove-from-cart";

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success('Sản phẩm đã được xóa khỏi giỏ hàng.');
                        // Thay thế nội dung giỏ hàng
                        $('.carttuan').html(response.html);

                        // Cập nhật tổng tiền
                        $('.total-price').text(response.total + '₫');

                        // Hiển thị thông báo nếu giỏ hàng trống
                        if (response.qty === 0) {
                            $('.carttuan').html(
                                '<div class="alert alert-warning">Không có sản phẩm nào. Quay lại <a href="{{ route('home') }}" class="alert-link">cửa hàng</a> để tiếp tục mua sắm.</div>'
                            );
                        }
                    }
                },
                error: function() {
                    alert('Có lỗi xảy ra, vui lòng thử lại.');
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.items-count-tuan', function() {
            let key = $(this).data('key');
            let action = $(this).data('action');
            let input = $('#quantity-' + key);
            let quantity = parseInt(input.val());

            if (action === 'increase') {
                quantity++;
            } else if (action === 'decrease' && quantity > 1) {
                quantity--;
            }

            input.val(quantity);

            $.ajax({
                url: "/cart/update-quantity",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                data: {
                    key: key,
                    quantity: quantity
                },
                success: function(response) {
                    if (response.success) {
                        $('.total-price').text(response.total + '₫');
                    }
                },
                error: function() {
                    alert('Có lỗi xảy ra, vui lòng thử lại.');
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lắng nghe sự kiện thêm vào giỏ hàng
            const addToCartButtons = document.querySelectorAll('.themgio');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const productId = this.getAttribute('data-id');
                    const formData = new FormData();
                    formData.append('product_id', productId);
                    formData.append('quantity', 1);

                    // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ hàng
                    fetch('/add-to-cart', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                toastr.success(data.message);
                                document.querySelector('.cart-count')
                                    .textContent = data.cartCount;

                                // Gửi yêu cầu AJAX để cập nhật giỏ hàng
                                fetch('/cart/sidebar')
                                    .then(response => response.text())
                                    .then(html => {
                                        // Cập nhật nội dung giỏ hàng
                                        document.getElementById('cart-sidebar').innerHTML =
                                            html;
                                    })
                                    .catch(error => console.error('Lỗi khi cập nhật giỏ hàng:',
                                        error));
                            } else {
                                toastr.error('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.');
                            }
                        })
                        .catch(error => {
                            console.error('Lỗi:', error);
                            toastr.error('Không thể thêm sản phẩm vào giỏ hàng.');
                        });
                });
            });
        });
    </script>
    <script>
        // Khi cập nhật số lượng giỏ hàng
    </script>
    <div id="translate_select">

        <div class="lang-wrap">
            <a class="vn" href="javascript:;" onclick="translateheader('vi')"><img width="30"
                    src="{{ url('frontend/images/vietnam.png') }}" alt=""></a>
            {{-- <span>/</span> --}}
            <a class="kd" href="javascript:;" onclick="translateheader('en')"><img width="30"
                    src="{{ url('frontend/images/kingdom.png') }}" alt=""></a>
        </div>
    </div>
    <script>
        $('#modernSearchBtn').on('click', function(e) {
            e.stopPropagation();
            if ($('#modernSearchInput').hasClass('active')) {
                var keyword = $('#modernSearchInput').val().trim();
                if (keyword) {
                    // Lấy URL hiện tại (không thay đổi route)
                    var url = window.location.pathname;
                    // Thêm query string keyword
                    window.location.href = url + '?keyword=' + encodeURIComponent(keyword);
                } else {
                    $('#modernSearchInput').focus();
                }
            } else {
                $('#modernSearchInput').addClass('active').focus();
            }
        });

        $('#modernSearchInput').on('click', function(e) {
            e.stopPropagation();
        });

        $(document).on('click', function() {
            $('#modernSearchInput').removeClass('active');
        });
    </script>
    <script>
        $(document).ready(function() {
            const searchInput = $('#ajax-search-input');
            const searchForm = $('#ajax-search-form');
            const searchResultContainer = $('.ajax-search-result-container');
            const searchLoading = $('.search-loading');
            const searchOverlay = $('.search-overlay');
            let searchTimeout;

            // Khi nhập vào input tìm kiếm
            searchInput.on('input', function() {
                const keyword = $(this).val().trim();

                // Xóa timeout cũ để tránh gửi quá nhiều request
                clearTimeout(searchTimeout);

                // Nếu từ khóa ít hơn 2 ký tự, ẩn kết quả và overlay
                if (keyword.length < 2) {
                    searchResultContainer.hide();
                    searchOverlay.fadeOut(200);
                    return;
                }

                // Hiển thị loading và overlay
                if (!searchResultContainer.is(':visible')) {
                    searchOverlay.fadeIn(200);
                    searchResultContainer.slideDown(200);
                }
                searchLoading.show();
                $('.search-results-wrapper').hide();

                // Đặt timeout mới để tránh gửi request liên tục khi người dùng đang gõ
                searchTimeout = setTimeout(function() {
                    // Gửi AJAX request
                    $.ajax({
                        url: '/auto-search-product',
                        method: 'POST',
                        data: {
                            keyword: keyword,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Cập nhật kết quả tìm kiếm
                            searchLoading.fadeOut(200);

                            // Tạo và hiển thị kết quả HTML
                            let resultsHTML = '';

                            if (response.products && response.products.length > 0) {
                                response.products.forEach(function(product) {
                                    const discountPrice = product.discount > 0 ?
                                        formatPrice(product.discount) : null;
                                    const regularPrice = formatPrice(product
                                        .price);

                                    resultsHTML += `
                                  <div class="search-result-item">
                                      <div class="search-result-image">
                                          <a href="${product.url}">
                                              <img src="${product.image || '/frontend/images/no-image.jpg'}" alt="${product.name}">
                                          </a>
                                      </div>
                                      <div class="search-result-info">
                                          <div class="search-result-name">
                                              <a href="${product.url}">${product.name}</a>
                                          </div>
                                          <div class="search-result-meta">
                                              ${product.category ? `<span class="search-result-category">${product.category}</span>` : ''}
                                          </div>
                                          <div class="search-result-price">
                                              ${discountPrice ? 
                                                  `${discountPrice}₫ <del>${regularPrice}₫</del>` : 
                                                  `${regularPrice}₫`
                                              }
                                          </div>
                                      </div>
                                  </div>
                              `;
                                });

                                // Thêm nút "Xem tất cả"
                                resultsHTML += `
                              <div class="search-view-all">
                                  <a href="/ket-qua-tim-kiem?keywordsearch=${encodeURIComponent(keyword)}">
                                      Xem tất cả ${response.total || response.products.length} kết quả
                                  </a>
                              </div>
                          `;
                            } else {
                                resultsHTML = `
                              <div class="search-no-result">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                  </svg>
                                  <div class="search-no-result-text">Không tìm thấy kết quả nào</div>
                                  <div class="search-no-result-hint">Hãy thử tìm kiếm với từ khóa khác</div>
                              </div>
                          `;
                            }

                            $('.search-results-wrapper').html(resultsHTML).fadeIn(300);
                        },
                        error: function() {
                            searchLoading.hide();
                            $('.search-results-wrapper').html(`
                          <div class="search-no-result">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                              </svg>
                              <div class="search-no-result-text">Đã xảy ra lỗi</div>
                              <div class="search-no-result-hint">Vui lòng thử lại sau</div>
                          </div>
                      `).fadeIn(300);
                        }
                    });
                }, 300);
            });

            // Xử lý khi submit form
            searchForm.on('submit', function() {
                const keyword = searchInput.val().trim();
                if (keyword.length < 2) {
                    return false;
                }
            });

            // Ẩn kết quả khi click vào overlay
            searchOverlay.on('click', function() {
                searchResultContainer.slideUp(200);
                searchOverlay.fadeOut(200);
            });

            // Ẩn kết quả khi click ra ngoài
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#search-header').length &&
                    !$(e.target).closest('.ajax-search-result-container').length) {
                    searchResultContainer.slideUp(200);
                    searchOverlay.fadeOut(200);
                }
            });

            // Focus vào input tìm kiếm
            searchInput.on('focus', function() {
                const keyword = $(this).val().trim();
                if (keyword.length >= 2) {
                    searchResultContainer.slideDown(200);
                    searchOverlay.fadeIn(200);
                }
            });

            // Format giá tiền
            function formatPrice(price) {
                return new Intl.NumberFormat('vi-VN').format(price);
            }
        });
    </script>
    <script>
      
// filepath: ...vị trí file HTML của bạn...
function shareFacebook(e) {
    e.preventDefault();
    const url = encodeURIComponent(window.location.href);
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
}

function shareLinkedIn(e) {
    e.preventDefault();
    const url = encodeURIComponent(window.location.href);
    window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}`, '_blank');
}

// Instagram không hỗ trợ chia sẻ trực tiếp qua URL, có thể dẫn tới trang Instagram
function shareInstagram(e) {
    e.preventDefault();
    window.open('https://www.instagram.com/', '_blank');
}

function shareTwitter(e) {
    e.preventDefault();
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent(document.title);
    window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank');
}

    </script>
</body>

</html>

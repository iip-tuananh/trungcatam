@extends('layouts.main.master')
@section('title')
    {{ $setting->company }}
@endsection
@section('description')
    {{ $setting->webname }}
@endsection
@section('image')
@php
    $anhweb = json_decode($firstImage, true);
 
@endphp
    {{ $anhweb[0] }}
@endsection
@section('css')
@endsection
@section('script')
    const swiper = new Swiper('.swiper', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
    },
    pagination: {
    el: '.swiper-pagination',
    clickable: true,
    },
    // Responsive breakpoints
    breakpoints: {
    768: {
    slidesPerView: 2,
    },
    1200: {
    slidesPerView: 3,
    },
    },
    });
@endsection
@section('content')
    <div class="hero hero-slider-layout">
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- Hero Slide Start -->
                @foreach ($banner->values() as $key => $b)
                    @php
                        $imgb = json_decode($b->image, true);
                        // dd($banner);
                    @endphp
                    <div class="swiper-slide">
                        <div class="hero-slide slide-{{ $b->id }}"
                            style="background: url('{{ asset($imgb[0]) }}'); background-size: cover; background-position: center;">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <!-- Hero Content Start -->
                                        <div class="hero-content">
                                            <!-- Section Title Start -->
                                            <div class="section-title">
                                                {{-- <h3 class="wow fadeInUp">art of fine dining</h3> --}}
                                                <h1 class="text-anime-style-2" data-cursor="-opaque">{{ $b->title }}
                                                </h1>
                                                <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $b->description }}</p>
                                            </div>
                                            <!-- Section Title End -->
                                            <!-- Hero Button Start -->
                                            <div class="hero-btn wow fadeInUp" data-wow-delay="0.4s">
                                                {{-- <a href="" class="btn-default">book a table</a> --}}
                                                {{-- <a href="#" class="download-app-btn">download app <i class="fa-brands fa-google-play"></i></a> --}}
                                            </div>
                                            <!-- Hero Button End -->
                                        </div>
                                        <!-- Hero Content End -->
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Hero Images Start -->
                                        <div class="hero-images">
                                            <!-- Hero Image Start -->
                                            <div class="hero-image">
                                                <figure class="image-anime">
                                                    <img src="{{ $imgb[1] }}" alt="">
                                                </figure>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Hero Section End -->
        <!-- About Us Section Start -->
        <div class="about-us">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-1 order-2">
                        <!-- About Us Image Start -->
                        <div class="about-us-image">
                            <!-- About Us Img Start -->
                            <div class="about-us-img">
                                <figure class="image-anime">
                                    <img src="{{ $gioithieu->image }}" alt="Về chúng tôi">
                                </figure>
                            </div>
                            <!-- About Us Img End -->
                            <!-- Company Experience Box Start -->
                            <div class="company-experience">
                                {{-- <div class="icon-box">
                     <img src="images/icon-company-experience.svg" alt="">
                  </div> --}}
                                <div class="company-experience-content">
                                    <h3><span class="counter">30</span>+ years of experience</h3>
                                </div>
                            </div>
                            <!-- Company Experience Box End -->
                            <!-- About Author Image Start -->
                            <div class="about-author-img">
                                <figure class="image-anime">
                                    <img src="{{ $gioithieu->image }}" alt="">
                                </figure>
                            </div>
                            <!-- About Author Image End -->
                        </div>
                        <!-- About Us Image End -->
                    </div>
                    <div class="col-lg-6  order-lg-2 order-1">
                        <!-- About Us Content Start -->
                        <div class="about-us-content">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp">Về chúng tôi</h3>
                                <h2 class="text-anime-style-2" data-cursor="-opaque">CAVIAR THƯỢNG HẠNG</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">{!! $gioithieu->description !!}</p>
                            </div>
                            <!-- Section Title End -->
                            <!-- About Content List Start -->
                            {{-- <div class="about-content-list wow fadeInUp" data-wow-delay="0.4s">
                  <ul>
                     <li>seasonal & locally sourced ingredients</li>
                     <li>vegetarian & dietary-friendly options</li>
                     <li>exquisite pairings & unique flavors</li>
                  </ul>
               </div> --}}
                            <!-- About Content List End -->
                            <!-- About Content Buttons Start -->
                            <div class="about-content-btn wow fadeInUp" data-wow-delay="0.6s">
                                {{-- <a href="contact.html" class="btn-default">order now</a> --}}
                                <a href="{{ route('aboutUs') }}" class="btn-default ">XEM THÊM</a>
                            </div>
                            <!-- About Content Buttons End -->
                        </div>
                        <!-- About Us Content End -->
                    </div>
                    <div class="col-lg-12 order-3">
                        <!-- About Detail Box Start -->
                        <div class="about-detail-box">
                            <!-- About Detail Item Start -->
                            <div class="about-detail-item wow fadeInUp">
                                <div class="icon-box">
                                    <img src="{{ asset('frontend/images/icon-about-detail-1.svg') }}" alt="">
                                </div>
                                <div class="about-detail-content">
                                    <h3>Không gian sang trọng</h3>
                                    <p>Phục vụ chuyên nghiệp, trải nghiệm đẳng cấp.</p>
                                </div>
                            </div>
                            <!-- About Detail Item End -->
                            <!-- About Detail Item Start -->
                            <div class="about-detail-item wow fadeInUp" data-wow-delay="0.2s">
                                <div class="icon-box">
                                    <img src="{{ asset('frontend/images/icon-about-detail-2.svg') }}" alt="">
                                </div>
                                <div class="about-detail-content">
                                    <h3>Hương Vị Phong Phú</h3>
                                    <p>Chúng tôi tự hào mang đến những hương vị độc đáo, phong phú.</p>
                                </div>
                            </div>
                            <!-- About Detail Item End -->
                            <!-- About Detail Item Start -->
                            <div class="about-detail-item wow fadeInUp" data-wow-delay="0.4s">
                                <div class="icon-box">
                                    <img src="{{ asset('frontend/images/icon-about-detail-3.svg') }}" alt="">
                                </div>
                                <div class="about-detail-content">
                                    <h3>Ẩm Thực Thượng Hạng</h3>
                                    <p>Đậm đà, tinh tế – biểu tượng của ẩm thực cao cấp.</p>
                                </div>
                            </div>
                            <!-- About Detail Item End -->
                        </div>
                        <!-- About Detail Box End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- About Us Section End -->
        <!-- Our Dishes Section Start -->
        <div class="our-dishes">
            <div class="container">
                <div class="row section-row">
                    <div class="col-lg-12">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">MENU</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Trải nghiệm đẳng cấp khởi đầu từ <span>món
                                    ngon</span> chọn lọc</h2>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>
                <div class="row">
                    @foreach ($categoryhome as $category)
                        @php
                            // Xác định class theo vị trí
                            $colClass = '';
                            if ($loop->iteration <= 2) {
                                $colClass = 'col-md-6';
                            } elseif ($loop->iteration <= 5) {
                                $colClass = 'col-md-4';
                            } else {
                                $colClass = 'col-md-6';
                            }
                        @endphp
                        <div class="{{ $colClass }}">
                            <div class="our-dish-item wow fadeInUp">
                                <div class="">
                                    <a href="{{ route('allListProCate', ['danhmuc' => $category->slug]) }}">
                                        <figure class="image-anime">
                                            <img src="{{ asset($category->imagehome) }}" alt="" height="350px"
                                                width="100%" class="img-pro-tuan" style="object-fit: cover">
                                            <h3 class="image-title">{!! languageName($category->name) !!}</h3>
                                        </figure>
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <style>
            .image-title {
                position: absolute;
                top: 10px;
                left: 10px;
                color: #b18a55;
                /* màu vàng */
                background: rgba(0, 0, 0, 0.5);
                /* nền mờ để nổi bật chữ */
                padding: 5px 10px;
                border-radius: 5px;
                margin: 0;
                font-size: 1.2rem;
                z-index: 2;
            }
        </style>

        {{-- ssssssssssssss --}}

        <div class="our-testimonial parallaxie" style="background-image: url({{ asset('frontend/images/zon.jpg') }});">
            <div class="container">
                <div class="row section-row">
                    <div class="col-lg-12">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Review</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">
                                Trải nghiệm và đánh giá từ <span>khách hàng</span>
                            </h2>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Testimonial Slider Start -->
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

                        <div class="owl-carousel owl-theme owl-carousel-review">
                            @foreach ($ReviewCus as $review)
                                <div class="item text-center">
                                    <img src="{{ $review->avatar }}" alt="{{ $review->name }}" class="review-avatar" >
                                    <h4 class="review-author">{!! languageName($review->name) !!}</h4>
                                    <p class="review-content">{!! languageName($review->content) !!}</p>
                                </div>
                            @endforeach
                        </div>
                        <!-- Testimonial Slider End -->
                    </div>
                </div>
            </div>
        </div>
        {{-- //phần chứng chỉ --}}
        <div class="our-dishes">
            <div class="container">
                <div class="row section-row">
                    <div class="col-lg-12">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Chứng chỉ</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Chứng chỉ của <span>chúng tôi</span></h2>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>
            
                <div class="row">

                  <div class="owl-carousel owl-theme owl-carousel-chungchi">
    @foreach($certificates as $certificate)
        <div class="item">
            <img src="{{ $certificate->image }}" 
                 alt="Chứng chỉ" 
                 class="certificate-thumb"
                 data-bs-toggle="modal"
                 data-bs-target="#certificateModal"
                 data-img="{{ $certificate->image }}">
        </div>
    @endforeach
</div>
                </div>
            </div>

            <style>
                .certificate-thumb {
                    width: 100%;
                    height: 336px;
                    object-fit: cover;
                    border-radius: 8px;
                    z-index: 100;
                    cursor: pointer;
                    transition: transform 0.2s;
                }

                .certificate-thumb:hover {
                    transform: scale(1.05);
                }

                #certificateModal {
                    z-index: 2000;
                }
            </style>
        </div>
    </div>

    <!-- Our Testimonial Section End -->
    <!-- Our Blog Section Start -->
    <div class="our-blog">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Blog mới nhất</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Khám phá tin tức mới nhất của <span>chúng
                                tôi</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <div class="row">
           <div class="owl-carousel blog-carousel">
    @foreach ($hotnews as $item)
        <div class="item">
            <div class="post-item wow fadeInUp">
                <div class="post-featured-image">
                    <a href="{{route('detailBlog',['slug'=>$item->slug])}}" data-cursor-text="View">
                        <figure class="image-anime">
                            <img src="{{ $item->image }}" alt="">
                        </figure>
                    </a>
                </div>
                <div class="blog-item-body">
                    <div class="post-item-content">
                        <h3>
                            <a href="{{route('detailBlog',['slug'=>$item->slug])}}">
                                {!!languageName($item->title)!!}
                            </a>
                        </h3>
                    </div>
                    <div class="blog-item-btn">
                        <a href="{{route('detailBlog',['slug'=>$item->slug])}}" class="readmore-btn">read more</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
            
            </div>
        </div>
    </div>
    <!-- Our Blog Section End -->
    <!-- Reserve Table Section Start -->
    <div class="reserve-table">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Reserve table Content Start -->
                    <div class="reserve-table-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Liên hệ đặt bàn </h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Đặt bàn ngay và
                                <span>thưởng thức trải nghiệm ẩm thực.</span>
                            </h2>
                        </div>
                        <!-- Section Title End -->
                        <!-- Reserve Table Body Start -->
                        <div class="reserve-table-body wow fadeInUp" data-wow-delay="0.2s" style="font-size: 11px">
                            <h3>Giờ mở cửa</h3>
                            <ul>
                                <li style="font-size: 11px">Thứ 2 - Thứ 5 <span style="font-size: 11px">10:00 AM - 09:00 PM</span></li>
                                <li style="font-size: 11px">Thứ 6 - Thứ 7 <span style="font-size: 11px">09:00 AM - 10:00 PM</span></li>
                                <li style="font-size: 11px">Chủ nhật <span style="font-size: 11px">Đóng cửa</span></li>
                            </ul>
                        </div>
                        <!-- Reserve Table Body End -->
                    </div>
                    <!-- Reserve table Content End -->
                </div>
                <div class="col-lg-6">
                    <!-- Reserve Table Form Start -->
                    <div class="reserve-table-form">
                        <form id="contactForm" action="{{route('postcontact')}}" method="POST" 
                            class="wow fadeInUp">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <label class="form-label">Tên của bạn</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Tên của bạn" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-6 mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" name ="email" class="form-control" id="email"
                                        placeholder="Email của bạn" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-md-6 mb-4">
                                    <label class="form-label">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        placeholder="Số điện thoại của bạn" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                               <div class="form-group col-md-12 mb-4">
                                    <label class="form-label">Nội Dung</label>
                                    <textarea type="text" name="mess" class="form-control" id="message"
                                        placeholder="Nội dung của bạn" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                 
                                <div class="col-lg-12">
                                    <div class="reserve-table-btn">
                                        <button type="submit" class="btn-default">Liên Hệ Ngay</button>
                                        <div id="msgSubmit" class="h3 hidden"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Reserve Table Form End -->
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true" style="z-index: 3002;">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="certificateModalLabel">Chứng chỉ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img id="modalCertificateImg" src="" alt="Chứng chỉ" style="max-width:100%; max-height:80vh;">
        <div class="mt-3">
          <button id="prevCertificate" class="btn btn-secondary me-2">Lùi</button>
          <button id="nextCertificate" class="btn btn-secondary">Tiếp</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
<!-- Content goes here -->

@php
    $img = json_decode($pro->images);
    $khuyenmai = json_decode($pro->preserve);
    $thongso = json_decode($pro->size);
    $phantram = $pro['price'] > 0 ? 100 - ($pro['discount'] / $pro['price']) * 100 : 0;
@endphp
{{-- <div class="col-lg-3 col-md-6 col-sm-6 mb-4"> --}}

    <div class="product-card">
        <!-- Product Image -->
        <a href="{{ route('detailProduct', ['cate' => $pro['cate_slug'], 'type' => $pro['type_slug'] ? $pro['type_slug'] : 'loai', 'id' => $pro['slug']]) }}">
        <div class="product-image-wrapper">


            <img src="{{ $img[0] }}" class="product-image anh1" alt="{{ $pro->name }}" class="">
            <img src="{{ isset($img[1]) ? asset($img[1]) : (isset($img[0]) ? asset('storage/' . $img[0]) : asset('images/no-image.png')) }}"
                class="product-image anh2" alt="{{ $pro->name }}">
            <!-- Discount Badge -->
            @if ($pro->discount && $pro->discount < $pro->price)
                @php
                    $discount = round((($pro->price - $pro->discount) / $pro->price) * 100);
                @endphp
                <div class="discount-badge">
                    {{ $discount }}%
                </div>
            @endif

            <!-- Quick Actions -->
            <div class="product-actions">
                <button class="action-btn view-btn" title="Xem chi tiết">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="action-btn wishlist-btn" title="Yêu thích">
                    <i class="far fa-heart"></i>
                </button>
            </div>
        </div>
        </a>

        <div class="product-info">
            <!-- Product Name -->
            <a href="{{ route('detailProduct', ['cate' => $pro['cate_slug'], 'type' => $pro['type_slug'] ? $pro['type_slug'] : 'loai', 'id' => $pro['slug']]) }}">
            <h3 class="product-name">{{ $pro->name }}</h3>
            </a>
            <!-- Product Description -->


            <!-- Price Section -->
            <div class="price-wrapper">
                @if ($pro->discount && $pro->discount < $pro->price)
                    <span class="current-price">
                        {{ number_format($pro->discount, 0, ',', '.') }}₫
                    </span>
                    <span class="old-price">
                        {{ number_format($pro->price, 0, ',', '.') }}₫
                    </span>
                @else
                    <span class="current-price">
                        {{ number_format($pro->price, 0, ',', '.') }}₫
                    </span>
                @endif
            </div>
            @if ($pro->price == 0)
                <a href="tel:{{ $setting->phone1 }}"><button class="lienhe">
                        <span>Liên hệ</span>
                    </button></a>
            @else
                <!-- Add to Cart Button -->
                <button class="add-to-cart-btn themgio" data-product-id="{{ $pro->id }}"
                    data-product-name="{{ $pro->name }}" data-product-price="{{ $pro->discount ?? $pro->price }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Thêm vào giỏ</span>
                </button>
            @endif
        </div>
    </div>

{{-- </div> --}}

{{-- filepath: resources/views/partials/cart_sidebar.blade.php --}}
@if ($cartCount > 0)
    <form action="{{ route('checkout') }}" method="post">
        @csrf
        <ul id="cart-sidebar" class="mini-products-list count_li list-unstyled">
            <ul class="list-item-cart" id="cart-top">
                @php $totalPrice = 0; @endphp
                @foreach ($carthome as $key=> $item)
                    @php
                        $itemPrice = $item['discount'] > 0 ? $item['discount'] : $item['price'];
                        $totalPrice += $itemPrice * $item['quantity'];
                    @endphp
                    <li class="item productid-{{ $item['id'] }}">
                        <div class="border_list">
                            <div class="image_drop">
                                <a class="product-image pos-relative embed-responsive embed-responsive-1by1"
                                    href="javascript:;" title="{{ $item['name'] }}">
                                    <img loading="lazy" alt="{{ $item['name'] }}" src="{{ $item['image'] }}"
                                        width="100">
                                </a>
                            </div>
                            <div class="detail-item">
                                <div class="product-details">
                                    <span href="javascript:;" data-id="{{ $key }}" title="Xóa"
                                        class="remove-item-cart-tuan fa fa-times"></span>
                                    <p class="product-name">
                                        <a href="javascript:;" title="{{ $item['name'] }}">{{ $item['name'] }}</a>
                                    </p>
                                </div>
                                @if (isset($item['variant']))
                                    <span class="variant-title">{{ $item['variant'] }}</span>
                                @endif
                                <div class="product-details-bottom">
                                    @if ($item['price'] > 0)
                                        @if ($item['discount'] > 0)
                                            <span class="price">Giá sale:
                                                {{ number_format($item['discount']) }}₫</span>
                                            <span class="quanlity">x {{ $item['quantity'] }}</span><br>
                                            <span class="price price_old">Giá gốc:
                                                {{ number_format($item['price']) }}₫</span>
                                        @else
                                            <span class="price">Giá: {{ number_format($item['price']) }}₫</span>
                                            <span class="quanlity">x {{ $item['quantity'] }}</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="pd">
                <div class="top-subtotal">Tổng tiền tạm tính: <span
                        class="price price_big">{{ number_format($totalPrice) }}₫</span></div>
            </div>
            <div class="pd right_ct">
                <button type="submit" class="btn btn-danger btn-block">Tiến hành thanh toán</button>
            </div>
        </ul>
    </form>
@else
    <ul id="cart-sidebar" class="mini-products-list count_li list-unstyled">
        Hiện tại không có sản phẩm nào trong giỏ hàng của bạn.
    </ul>
@endif

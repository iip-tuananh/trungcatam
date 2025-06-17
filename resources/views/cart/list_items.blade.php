<div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items carttuan" id="cartbody">
    @foreach ($carthome as $key => $item)
        <div class="ajaxcart__row">
            <div class="ajaxcart__product cart_product" data-line="1">
                <a href="" class="ajaxcart__product-image cart_image" title="{{ $item['name'] }}">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                </a>
                <div class="grid__item cart_info">
                    <div class="ajaxcart__product-name-wrapper cart_name">
                        <a href="" class="ajaxcart__product-name h4 line-clamp line-clamp-2-new"
                            title="{{ $item['name'] }}">{{ $item['name'] }}</a>
                        @if (isset($item['variant']))
                            <span class="ajaxcart__product-meta variant-title">{{ $item['variant'] }}</span>
                        @endif
                        <a style="color: red" title="Xóa" class="remove-item-cart-tuan-detail" href="javascript:;"
                            data-id="{{ $key }}">Xóa</a>
                    </div>
                    <div class="grid">
                        <div class="grid__item one-half text-right cart_prices">
                            @if (isset($item['variant']))
                                <span class="cart-price">{{ number_format($item['price']) }}₫</span>
                            @else
                                @if ($item['discount'] > 0)
                                    <span class="cart-price">{{ number_format($item['discount']) }}₫</span>
                                @else
                                    <span class="cart-price">{{ number_format($item['price']) }}₫</span>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="grid">
                        <div class="grid__item one-half cart_select">
                            <div class="ajaxcart__qty input-group-btn">
                                <button type="button" class=" items-count-tuan" data-key="{{ $key }}"
                                    data-action="decrease">-</button>
                                <input type="text" name="quantity" class="ajaxcart__qty-num number-sidebar"
                                    value="{{ $item['quantity'] }}" id="quantity-{{ $key }}">
                                <button type="button" class="  items-count-tuan" data-key="{{ $key }}"
                                    data-action="increase">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

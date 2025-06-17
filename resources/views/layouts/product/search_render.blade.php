@if (count($data) > 0)
@foreach ($data as $item)
@php
    $img = json_decode($item->images);
@endphp
<a class="product-smart" href="{{route('detailProduct',['cate'=>$item['cate_slug'],'type'=>$item['type_slug'] ? $item['type_slug'] : 'loai','id'=>$item['slug']])}}" title="{{$item->name}}">
    <div class="image_thumb"><img width="58" height="58" class="lazyload loaded" src="//bizweb.dktcdn.net/thumb/compact/100/506/650/products/1-0db8d1cc-0547-41f1-9ca8-f8a1a0da9817.jpg?v=1708617243000" data-src="{{$img[0]}}" alt="{{$item->name}}" data-was-processed="true"></div>
    <div class="product-info">
       <h3 class="product-name line-camp-2"><span>{{$item->name}}</span></h3>
       @if ($item->price > 0)
                @if ($item->status_variant == 1)
                <div class="price-box">
                    <span class="price">{{get_price_variant($item->id)}}₫</span>
                    <span class="compare-price">{{number_format($item->price)}}₫</span>
                </div>
                @else 
                <div class="price-box">
                    <span class="price">{{number_format($item->discount)}}₫</span>
                    <span class="compare-price">{{number_format($item->price)}}₫</span>
                </div>
                @endif
        @else
        <div class="price-box">
            <span class="price">Liên Hệ</span>
        </div>
        @endif

       
    </div>
 </a>


@endforeach
@else 
<a href="javascript:;" class="nothing btn border-0 rounded-0 w-100 my-0 all-result d-block mb-2 font-weight-bold">Không thấy kết quả phù hợp</a>
@endif


@extends('layouts.main.master')
@section('title')
Kết quả tìm kiếm
@endsection
@section('description')
Đã tìm thấy {{$product->total()}} kết quả phù hợp cho từ khóa "{{$keyword}}"
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('css')
<style>.search_0{color:var(--mainColor);font-size:1.2rem}.b_search svg{max-height:120px}.b_search svg .m_color{fill:var(--mainColor)}.t-search{font-size:1rem}</style>
@endsection
@section('content')
<div class="contentWarp ">
<div class="page-header parallaxie " style="background-image: url('{{ asset('frontend/images/zon.jpg') }}');">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <!-- Page Header Box Start -->
            <div class="page-header-box">
               <h1 class="text-anime-style-2" data-cursor="-opaque" style="font-size: 40px">Kết Quả Tìm Kiếm
               </h1>
               <nav class="wow fadeInUp">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Kết Quả Tìm Kiếm</li>
                  </ol>
               </nav>
            </div>
            <!-- Page Header Box End -->
         </div>
      </div>
   </div>
</div>
	<section class="search-layout">
	   <div class="container rounded" style="min-height: 350px">
		  <div class="category-products position-relative mt-4 mb-4 pt-3 pb-2 b_search">
			 <h2 class="h3 mb-3 t-search">Có {{$product->total()}} kết quả tìm kiếm với từ khóa "{{$keyword}}"</h2>
			 <div class="row ">
				@foreach ($product as $item)
				<div class="col-lg-3 col-md-6 col-sm-6 mb-4">
					@include('layouts.product.item',['pro'=>$item])
				</div>
				@endforeach
				
			 </div>
			     <div class="row">
              <div class="col-lg-12 col-12 d-flex justify-content-center">
            	{{ $product->appends(['keywordsearch' => $keyword])->links() }}
               </div> 
            </div>
		  </div>
	   </div>
	</section>
 </div>
@endsection
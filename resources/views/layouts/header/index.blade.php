<header class="main-header">
		<div class="header-sticky">
			<nav class="navbar navbar-expand-lg">
				<div class="container">
					<!-- Logo Start -->
					<a class="navbar-brand" href="{{route('home')}}">
						<img src="{{$setting->logo}}" alt="Logo" style="width: 100px; height: auto;">
					</a>
					<!-- Logo End -->

					<!-- Main Menu Start -->
					<div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a>
                                    {{-- <ul>
                                        <li class="nav-item"><a class="nav-link" href="index.html">Home - Image</a></li>
                                        <li class="nav-item"><a class="nav-link" href="index-video.html">Home - Video</a></li>
                                        <li class="nav-item"><a class="nav-link" href="index-slider.html">Home - Slider</a></li>
                                    </ul> --}}
                                </li>      
                                   <li class="nav-item submenu">
    <a class="nav-link" href="{{route('allProduct')}}">Menu</a>
    <ul>
        @foreach ($categoryhome as $cate)
            <li class="nav-item submenu">
                <a class="nav-link" href="{{route('allListProCate',['danhmuc'=>$cate->slug])}}">
                    {!! languageName($cate->name) !!}
                </a>
                @if(isset($cate->typeCate) && count($cate->typeCate))
                    <ul>
                        @foreach ($cate->typeCate as $child)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('allListType',['danhmuc'=>$cate->slug,'loaidanhmuc'=>$child->slug])}}">
                                    {!! languageName($child->name) !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                
                @endif
            </li>
        @endforeach
    </ul>
</li>               
<li class="nav-item submenu">
    <a class="nav-link" href="javascript:void(0)">Về chúng tôi</a>
    <ul>
        @foreach ($pageContent->sortBy(function($item) { return $item->slug == 'gioi-thieu' ? 0 : 1; }) as $item)
            <li class="nav-item">
                <a class="nav-link" href="{{route('pagecontent',['slug'=>$item->slug])}}">
                   {{$item->title}}
                </a>
            </li>
        @endforeach                                  
    </ul>
</li>
                                <li class="nav-item submenu"><a class="nav-link" href="{{route('allListBlog')}}">Tin Tức</a>
                                 <ul>      
                                        @foreach ($blogCate as $cate)
                                            
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('listCateBlog',['slug'=>$cate->slug])}}">
                                                    {!!languageName($cate->name)!!}

                                                </a>
                                            </li>
                                        @endforeach                                  
                                    </ul>
                                
                                </li>
                           
                                <li class="nav-item"><a class="nav-link" href="{{route('lienHe')}}">Liên Hệ</a></li>                           
                            </ul>
                        </div>
                        <!-- Header Contact Box Start -->
                        <div class="header-btn" id="search-header">
                           <form action="{{ route('search_result') }}" method="post"
                        class="input-group search-bar custom-input-group" role="search" id="ajax-search-form">
                        @csrf
                        <input type="text" name="keywordsearch" value="" autocomplete="off"
                            id="ajax-search-input" class="input-group-field auto-search form-control" required=""
                            placeholder="Bạn cần tìm gì...">

                        <span class="input-group-btn btn-action">
                            <button type="submit" aria-label="search" class="btn text-white icon-fallback-text h-100">
                              <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </form>
         <div class="ajax-search-result-container" style="display: none;">
                        <div class="search-results-wrapper">
                            <!-- Kết quả tìm kiếm sẽ hiển thị ở đây -->
                        </div>
                        <div class="search-loading" style="display: none;">
                            <div class="loader-ellips">
                                <span class="loader-ellips__dot"></span>
                                <span class="loader-ellips__dot"></span>
                                <span class="loader-ellips__dot"></span>
                                <span class="loader-ellips__dot"></span>
                            </div>
                        </div>
                    </div>
                        



                        </div>
                  
                    <div class="search-overlay"></div>
                        <!-- Header Contact Box End -->
					</div>
					<!-- Main Menu End -->
					<div class="navbar-toggle"></div>
				</div>
			</nav>
			<div class="responsive-menu"></div>
		</div>
	</header>
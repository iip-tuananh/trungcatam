@extends('layouts.main.master')
@section('title')
{{$setting->company}}
@endsection
@section('description')
{{$setting->webname}}
@endsection
@section('css')

@endsection
@section('js')
@endsection
@section('content')

<div class="page-header parallaxie" style="background-image: url('{{$gioithieu->image}}');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-2" data-cursor="-opaque" style="font-size: 40px">{{$gioithieu->title}}</h1>
						<div class="post-single-meta wow fadeInUp">
							<ol class="breadcrumb">
                                {{-- <li><i class="fa-regular fa-user"></i> admin</li> --}}
								<li><i class="fa-regular fa-clock"></i> {{date('d M Y', strtotime($gioithieu->created_at))}}</li>
                            </ol>
						</div>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Single Post Start -->
    <div class="page-single-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Post Featured Image Start -->
                  
                    <!-- Post Featured Image Start -->

                    <!-- Post Single Content Start -->
                    <div class="post-content">
                        <!-- Post Entry Start -->
                        <div class="post-entry">
                           {!!($gioithieu->content)!!}
                        </div>
                        <!-- Post Entry End -->

                        <!-- Post Tag Links Start -->
                        <div class="post-tag-links">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                               
                                </div>

                                <div class="col-lg-4">
                          
                                </div>
                            </div>
                        </div>
                        <!-- Post Tag Links End -->
                    </div>
                    <!-- Post Single Content End -->
                </div>
            </div>
        </div>
    </div>
@endsection
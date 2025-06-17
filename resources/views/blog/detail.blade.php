@extends('layouts.main.master')
@section('title')
{{languageName($blog_detail->title)}}
@endsection
@section('description')
{{languageName($blog_detail->description)}}
@endsection
@section('image')
{{url(''.$blog_detail->image)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<div class="page-header parallaxie" style="background-image: url('{{$blog_detail->image}}');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-2" data-cursor="-opaque" style="font-size: 40px">{{languageName($blog_detail->title)}}</h1>
						<div class="post-single-meta wow fadeInUp">
							<ol class="breadcrumb">
                                {{-- <li><i class="fa-regular fa-user"></i> admin</li> --}}
								<li><i class="fa-regular fa-clock"></i> {{date('d M Y', strtotime($blog_detail->created_at))}}</li>
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
                    <div class="post-image">
                        <figure class="image-anime">
                            <img src="{{$blog_detail->image}}" alt="">
                        </figure>
                    </div>
                    <!-- Post Featured Image Start -->

                    <!-- Post Single Content Start -->
                    <div class="post-content">
                        <!-- Post Entry Start -->
                        <div class="post-entry">
                           {!!languageName($blog_detail->content)!!}
                        </div>
                        <!-- Post Entry End -->

                        <!-- Post Tag Links Start -->
                        <div class="post-tag-links">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                               
                                </div>

                                <div class="col-lg-4">
                                    <!-- Post Social Links Start -->
                                   <div class="post-social-sharing wow fadeInUp" data-wow-delay="0.5s">
    <ul>
        <li>
            <a href="#" onclick="shareFacebook(event)">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
        </li>
        <li>
            <a href="#" onclick="shareLinkedIn(event)">
                <i class="fa-brands fa-linkedin-in"></i>
            </a>
        </li>
        <li>
            <a href="#" onclick="shareInstagram(event)">
                <i class="fa-brands fa-instagram"></i>
            </a>
        </li>
        <li>
            <a href="#" onclick="shareTwitter(event)">
                <i class="fa-brands fa-x-twitter"></i>
            </a>
        </li>
    </ul>
</div>


                                    <!-- Post Social Links End -->
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
    <!-- Page Single Post End -->

    <!-- Reserve Table Section Start -->
 
@endsection
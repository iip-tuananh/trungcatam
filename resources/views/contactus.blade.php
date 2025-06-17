@extends('layouts.main.master')
@section('title')
    Liên hệ với chúng tôi
@endsection
@section('description')
    Liên hệ với chúng tôi
@endsection
@section('image')
    {{ url('' . $setting->logo) }}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
 <div class="page-header parallaxie " style="background-image: url('{{ asset('frontend/images/zon.jpg') }}');">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <!-- Page Header Box Start -->
            <div class="page-header-box">
               <h1 class="text-anime-style-2" data-cursor="-opaque" style="font-size: 40px"> Liên hệ với chúng tôi
               </h1>
               <nav class="wow fadeInUp">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page"> Liên hệ với chúng tôi</li>
                  </ol>
               </nav>
            </div>
            <!-- Page Header Box End -->
         </div>
      </div>
   </div>
</div>
    <section class="page_contact section ">
        <div class="container card py-3">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="left-contact px-2">
                        <h1 class="title_page mb-3">{{ $setting->company }}</h1>
                        <div class="single-contact">
                            <i class="fa fa-map-marker-alt"></i>
                            <div class="content">Địa chỉ:
                                <span>{{ $setting->address1 }}</span>

                            </div>
                        </div>
                        <div class="single-contact">
                            <i class="fa fa-mobile-alt"></i>
                            <div class="content">
                                Số điện thoại: <a class="link" title="{{ $setting->phone1 }}"
                                    href="tel:{{ $setting->phone1 }}">{{ $setting->phone1 }}</a>
                            </div>
                        </div>
                        <div class="single-contact">
                            <i class="fa fa-envelope"></i>
                            <div class="content">
                                Email: <a title="{{ $setting->email }}" class="link"
                                    href="mailto:{{ $setting->email }}">{{ $setting->email }}
                                </a>
                            </div>
                        </div>
						<style>
							.form-control-lg{
								font-size: 15px !important;
							}
						</style>
                        <div id="pagelogin" class="pt-3 mt-3 border-top">
                            <h2 class="title-head">Liên hệ với chúng tôi</h2>
                            <form   id="contactForm" action="{{route('postcontact')}}" class="contact-form" method="post" style="font-size: 15px">
								@csrf
                                <div class="form-signup clearfix">
                                    <div class="row group_contact">
                                        <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 m-3">
                                            <input placeholder="Họ tên*" type="text"
                                                class="form-control  form-control-lg" required="" 
                                                name="name">
                                        </fieldset>
                                        <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 m-3">
                                            <input placeholder="Email*" type="email"
                                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required=""
                                             class="form-control form-control-lg" 
                                                name="email">
                                        </fieldset>
                                        <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 m-3">
                                            <input placeholder="Số điện thoại*" type="text"
                                                class="form-control  form-control-lg" required="" pattern="\d+"
                                                name="phone" >
                                        </fieldset>
                                        <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 m-3">
                                            <textarea placeholder="Nhập nội dung*" name="mess" 
                                                class="form-control content-area form-control-lg" rows="5" required=""></textarea>
                                        </fieldset>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-3">
                                          <button type="submit" class="btn btn-action btn-block btn-lienhe disabled" style="
    color: white;
    background-color: #b18a55;
">Gửi liên hệ
                                                của bạn</button>
                                        </div>
                                    </div>
                                </div>

                             <style>
                                
                                </style> 
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="iFrameMap px-2 mt-3 mt-lg-0">
                       <!-- filepath: c:\laragon\www\yumy\resources\views\contactus.blade.php -->
					<div id="contact_map" class="map">
						{!! $setting->iframe_map !!}
					</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

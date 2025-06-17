@extends('layouts.main.master')
@section('css')

@endsection
@section('content')
<section class="bread-crumb mb-15">
   <span class="crumb-border"></span>
   <div class="container">
      <div class="row">
         <div class="col-12 a-left">
            <ul class="breadcrumb m-0 px-0">
               <li>
                  <a href="{{route('home')}}" target="_self"><span>Trang chủ</span></a>
                  <span class="mr_lr">&nbsp;/&nbsp;</span>		
               </li>
               <li class="active"><span>Ðăng ký</span></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<section class="section">
   <div class="container margin-bottom-20 card py-2">
      <div class="wrap_background_aside margin-bottom-40 page_login">
         <div class='heading-bar text-center'>
            <h1 class="title_page mb-0">Đăng ký tài khoản</h1>
            <span class="or">Bạn đã có tài khoản ? Đăng nhập
            <a href="{{route('login')}}" style="text-decoration: underline;" class="btn-link-style  btn-style margin-right-0">tại đây</a></span>
         </div>
         <div class="row">
            <div class="col-12 col-md-6 col-lg-5 offset-md-3 py-3 mx-auto">
               <div class="page-login py-3 ">
                  <div id="login">
                     <h2 class="text-center">
                        Thông tin cá nhân
                     </h2>
                     <form accept-charset='UTF-8' action='{{route('postRegister')}}'  method='post'>
                        @csrf
                        <div class="form-signup " style="color:red;" >
                        </div>
                        <div class="form-signup clearfix">
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                 <fieldset class="form-group">
                                    <label>Họ Tên <span class="required">*</span></label>
                                    <input type="text" class="form-control form-control-lg" value="" name="name" id="lastName"  placeholder="Họ Tên" required >
                                 </fieldset>
                              </div>
                          
                              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                 <fieldset class="form-group">	
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input placeholder="Số điện thoại" type="text" pattern="\d+" id="phone" class="form-control form-control-comment form-control-lg" name="phone" Required>
                                 </fieldset>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                 <fieldset class="form-group">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" class="form-control form-control-lg" value="" name="email" id="email"  placeholder="Email" required="">
                                 </fieldset>
                              </div>
                              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                 <fieldset class="form-group">
                                    <label>Mật khẩu <span class="required">*</span> </label>
                                    <input type="password" class="form-control form-control-lg" value="" name="password" id="password" placeholder="Mật khẩu" required >
                                 </fieldset>
                              </div>
                           </div>
                           <div class="section margin-top-10 button_bottom mt-3">
                              <button type="submit" value="Đăng ký" class="btn  btn-style  btn_register btn-block mirror-effect-button">Đăng ký</button>
                           </div>
                        </div>
                     </form>
                  
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <style>
      .mirror-effect-button {
    position: relative;
    display: inline-block;
    overflow: hidden;
    background: #c12026; /* Màu nền của button */
    color: #fff; /* Màu chữ */
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
}
.mirror-effect-button:hover {
    background: #a10f1b; /* Màu nền khi hover */
    color: #fff !important; /* Màu chữ khi hover */
}
.form-control::placeholder{
 
    font-size: 13px;
   
}
.mirror-effect-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%; /* Bắt đầu từ ngoài bên trái */
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.5); /* Màu ánh sáng */
    transform: skewX(-45deg); /* Nghiêng ánh sáng */
    transition: left 0.3s ease;
}

.mirror-effect-button:hover::before {
    left: 100%; /* Lướt qua bên phải */
    transition: left 0.5s ease; /* Tốc độ lướt */
    color: #fff !important; /* Màu chữ khi lướt qua */
}
    </style>

</section>
@endsection

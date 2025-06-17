@extends('layouts.main.master')
@section('title')
    Đăng nhập mua hàng tại icongnghe
@endsection
@section('description')
    Đăng nhập mua hàng tại icongnghe
@endsection
@section('image')
    {{ url('' . $banner[0]->image) }}
@endsection
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

                        <li class="active"><span>Đăng nhập</span></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container margin-bottom-20 card py-20">
            <div class="wrap_background_aside margin-bottom-40 page_login">
                <div class="heading-bar text-center">
                    <h1 class="title_page mb-0">Đăng nhập tài khoản</h1>
                    <p class="mb-0">Bạn chưa có tài khoản ?
                        <a href="{{route('register')}}" class="btn-link-style btn-register"
                            style="text-decoration: underline; "> Đăng ký tại đây</a>
                    </p>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-5 offset-md-3 py-3 mx-auto">

                        <div class="page-login ">
                            <div id="login">
                                <form accept-charset='UTF-8' action='{{route('postlogin')}}' id='customer_login' method='post'>
                                 @csrf
                                  
                                  
                                    <div class="form-signup margin-bottom-15" style="color:red;">

                                    </div>
                                    <div class="form-signup clearfix">
                                        <fieldset class="form-group">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                                class="form-control " value="" name="email" id="customer_email"
                                                placeholder="Email" Required>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label>Mật khẩu <span class="required">*</span> </label>
                                            <input type="password" class="form-control " value="" name="password"
                                                id="customer_password" placeholder="Mật khẩu" Required>
                                            {{-- <small class="d-block my-2">Quên mật khẩu? Nhấn vào<a href="#"
                                                    class="btn-link-style text-primary"
                                                    onclick="showRecoverPasswordForm();return false;"> đây </a></small> --}}
                                        </fieldset>
                                        <div class="pull-xs-left button_bottom a-center  mb-3">
                                            <button class="btn btn-block btn-style  btn-login mirror-effect-button" type="submit"
                                                value="Đăng nhập">Đăng nhập</button>
                                                
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="recover-password" style="display:none;" class="form-signup page-login text-center">
                                <h2>
                                    Đặt lại mật khẩu
                                </h2>
                                <p>
                                    Chúng tôi sẽ gửi cho bạn một email để kích hoạt việc đặt lại mật khẩu.
                                </p>
                                <form accept-charset='UTF-8' action='/account/recover' method='post'>
                                    <input name='form_type' type='hidden' value='recover_customer_password'>
                                    <input name='utf8' type='hidden' value='✓'>
                                    <input name='__RequestVerificationToken' type='hidden'
                                        value='CfDJ8FyFPV59mBtNhmQGz0fYZt-ITW3CunGYs0BBKahjlinBSOn33kuffo5_w5Zgt5wl70ZrPKGALlAibrX5iLNTwoKOTfUQmVhrGd6lRhSpDQwvLdPuQMn33UHwfzvd1stYMtCAHIjhBHaVEUMX4_5CaT4'>

                                    <div class="form-signup" style="color: red;">

                                    </div>
                                    <div class="form-signup clearfix">
                                        <fieldset class="form-group">
                                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                                class="form-control form-control-lg" value="" name="Email"
                                                id="recover-email" placeholder="Email" Required>
                                        </fieldset>
                                    </div>
                                    <div class="action_bottom my-3">
                                        <input class="btn btn-style btn-recover btn-block" type="submit"
                                            value="Lấy lại mật khẩu" />
                                        <a href="#" class="btn btn-style link btn-style-active "
                                            onclick="hideRecoverPasswordForm();return false;">Quay lại</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript">
        function showRecoverPasswordForm() {
            document.getElementById('recover-password').style.display = 'block';
            document.getElementById('login').style.display = 'none';
        }

        function hideRecoverPasswordForm() {
            document.getElementById('recover-password').style.display = 'none';
            document.getElementById('login').style.display = 'block';
        }

        if (window.location.hash == '#recover') {
            showRecoverPasswordForm()
        }
    </script>
    <style>
      /* Hiệu ứng lướt sáng qua cho button */
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
@endsection


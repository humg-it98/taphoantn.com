@extends('layout')
@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Đăng kí or Đăng nhập</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Login Content Area -->
<div class="page-section mb-60">
    <div class="container">
        <?php
    $message = Session::get('message');
    if($message){
        echo '<span class="text-alert"><br>'.$message.'</br></span>';
        Session::put('message',null);
    }
    ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form id="login-form" action="{{URL::to('/login-customer')}}" method="POST" >
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Đăng nhập</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Email *</label>
                                <input name="user_email" class="mb-0" type="email" placeholder="Email Address">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Mật khẩu</label>
                                <input name="user_password" id="password" class="mb-0" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-8">
                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Nhớ mật khẩu</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                <a href="#"> Quên mật khẩu?</a>
                            </div>
                            <div class="col-md-12">
                                <button class="register-button login">Đăng nhập</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form id="register-form" action="{{URL::to('/add-customer')}}" method="post">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Đăng kí</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-20">
                                <label>Nhập họ tên của bạn *</label>
                                <input name="customer_name" class="mb-0" type="text" placeholder="First Name">
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Nhập sđt của bạn *</label>
                                <input name="customer_phone" class="mb-0" type="phone" placeholder="Phone Number">
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Email *</label>
                                <input name="customer_email" id="email" class="mb-0" type="email" placeholder="Email Address">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Mật khẩu *</label>
                                <input name="customer_password" id="password_res" class="mb-0" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Xác minh mật khẩu *</label>
                                <input name="password_confirm" id="password_confirm" class="mb-0" type="password" placeholder="Confirm Password">
                            </div>
                            <p><b>Note: </b>Những trường có dấu * bạn không được để trống dữ liệu</p>
                            <div class="col-12">
                                <button class="register-button mt-0">Đăng ký</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


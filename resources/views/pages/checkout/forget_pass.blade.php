@extends('layout')
@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li class="active">Quên mật khẩu</li>
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
                <form id="login-form" action="{{URL::to('/recover-pass')}}" method="POST" >
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Quên mật khẩu</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label> Vui lòng nhập Email của bạn *</label>
                                <input name="email_account" class="mb-0" type="email" placeholder="Email Address">
                            </div>
                            <div class="col-md-12">
                                <button class="register-button login">Gửi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


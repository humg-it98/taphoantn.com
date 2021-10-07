@extends("layout")
@section("content")

<style>
    body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    }
    .emp-profile{
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }
    .profile-img{
        text-align: center;
    }
    .profile-img img{
        width: 70%;
        height: 100%;
    }
    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }
    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }
    .profile-head h5{
        color: #333;
    }
    .profile-head h6{
        color: #0062cc;
    }
    .profile-edit-btn{
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }
    .proile-rating{
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }
    .proile-rating span{
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }
    .profile-head .nav-tabs{
        margin-bottom:5%;
    }
    .profile-head .nav-tabs .nav-link{
        font-weight:600;
        border: none;
    }
    .profile-head .nav-tabs .nav-link.active{
        border: none;
        border-bottom:2px solid #0062cc;
    }
    .profile-work{
        padding: 14%;
        margin-top: -15%;
    }
    .profile-work p{
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }
    .profile-work a{
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }
    .profile-work ul{
        list-style: none;
    }
    .profile-tab label{
        font-weight: 600;
    }
    .profile-tab p{
        font-weight: 600;
        color: #0062cc;
    }
</style>

<div class="container emp-profile">
    <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert"><br>'.$message.'</br></span>';
            Session::put('message',null);
        }
    ?>
    @foreach($edit_customer as $key => $edit)

        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                            <h5>
                               {{$edit->customer_name}}
                            </h5>
                            <h6>
                                @if($edit->customer_vip==1)
                                Khách hàng thân thiết
                                @else
                                    Khách hàng mới
                                @endif
                            </h6>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin chi tiết</a>
                        </li>
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="{{URL::to('/change-pass')}}">Đổi mật khẩu</a> --}}
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Đổi mật khẩu</a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- <div class="col-md-2">
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Sửa thông tin"/>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p></p>
                    {{-- <a href="">Website Link</a><br/>
                    <a href="">Bootsnipp Profile</a><br/>
                    <a href="">Bootply Profile</a>
                    <p>SKILLS</p>
                    <a href="">Web Designer</a><br/>
                    <a href="">Web Developer</a><br/>
                    <a href="">WordPress</a><br/>
                    <a href="">WooCommerce</a><br/>
                    <a href="">PHP, .Net</a><br/> --}}
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>ID khách hàng:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$edit->customer_id}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Họ và tên khách hàng:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> {{$edit->customer_name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> {{$edit->customer_email}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> {{$edit->customer_phone}}</p>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Web Developer and Designer</p>
                                    </div>
                                </div> --}}
                    </div>
                    <form action="{{URL::to('change-pass')}}" method="POST">
                        @csrf
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Mật khẩu mới</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="oldpassword" placeholder="Điền mật khẩu cũ" >
                                        </div>
                                        {{-- @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Xác minh lại mật khẩu mới</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="newpassword" placeholder="Điền mật khẩu " >
                                        </div>
                                        {{-- @error('change_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror --}}

                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <label>Xác nhận mật khẩu mới</label>
                                        </div>
                                        <div class="col-md-6 right">
                                            <input type="password" class="form-control" name="change_password_confirm" placeholder="Xác nhận lại mật khẩu" >
                                        </div>
                                        @error('change_password_confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div> --}}
                                    <div class="col-md-6">
                                        <input type="hidden" name="customer_id" value="{{$edit->customer_id}}">
                                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Đổi mật khẩu"/>
                                    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endforeach
</div>
@endsection

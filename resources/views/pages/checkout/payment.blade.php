@extends("layout")
@section("content")
<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
            <div class="breadcrumb ptb_20">
            <h1>Gio hàng...</h1>
            <ul>
                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li><a href="category_page.html">Giỏ hàng</a></li>
                <li class="active">...</li>
            </ul>
            </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
            <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
            <div class="nav-responsive">
                <div class="heading-part">
                <h2 class="main_title">Danh mục</h2>
                </div>
                @foreach($category as $key => $cate)
                <ul class="nav  main-navigation collapse in">
                <li><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                </ul>
                @endforeach
            </div>
            </div>
            <div class="left-special left-sidebar-widget mb_50">
            <div class="heading-part mb_10 ">
                <h2 class="main_title">Thương hiệu</h2>
            </div>
                @foreach($brand as $key => $brand)
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{URL::to('thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
                </ul>
            @endforeach
            </div>
        </div>
        <div class="col-sm-8 col-lg-9 mtb_20">
            <div class="panel-group" id="accordion">
                <form action="{{URL::to('/order-place')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" >Chọn phương thức thanh toán cho đơn hàng</a> </h4>
                        </div>
                        <div class="panel-body">
                            <p>Vui lòng chọn phương thức thanh toán ưu tiên để sử dụng cho đơn hàng này.</p>
                            <div class="radio">
                            <label>
                                <input type="radio" selected="secleted" checked="checked" value="1" name="payment_option"> Thanh toán khi nhận hàng </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" checked="checked" value="2" name="payment_option"> Thanh toán bằng thẻ ngân hàng</label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" checked="checked" value="3" name="payment_option"> Thanh toán bằng ví điện tử</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="buttons">
                        <div class="pull-right">
                            <input type="submit" data-loading-text="Loading..." name="send-order" class="btn" id="button-confirm" value="Xác nhận thanh toán">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <div id="brand_carouse" class="ptb_30 text-center">
        <div class="type-01">
            <div class="heading-part mb_10 ">
            <h2 class="main_title">Đối tác liên kết:</h2>
            </div>
            <div class="row">
            <div class="col-sm-12">
                <div class="brand owl-carousel ptb_20">
                <div class="item text-center"> <a href="#"><img src={{asset("public/frontend/images/brand/brand1.png")}} alt="Disney" class="img-responsive" /></a> </div>
                </div>
            </div>
        </div>
    </div>
     </div>
</div>
@endsection


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
               <h3>Cảm ơn quý khách đã tin tưởng và mua sắm với chúng tôi.</h3>
               <br>
               <h4>Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất. </h4>
            </div>
            <form action="{{URL::to('/trang-chu')}}">
                <input class="btn pull-left mt_30" type="submit" value="Tiếp tục mua sắm" />
              </form>
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


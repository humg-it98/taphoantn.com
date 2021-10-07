<!doctype html>
<html class="no-js" lang="zxx">

<!-- index28:48-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>{{$meta_title}}</title>
        <meta name="description" content="{{$meta_desc}}">
        <meta name="keywords" content="{{$meta_keywords}}"/>
        <link  rel="canonical" href="{{$url_canonical}}" />

         <!------------Share fb------------------>
        <meta property="og:url"                content="{{$url_canonical}}" />
        <meta property="og:type"               content="articles" />
        <meta property="og:title"              content="{{$meta_title}}" />
        <meta property="og:site_name" content="{{$meta_title}}"/>
        <meta property="og:description"        content="{{$meta_desc}}" />
        {{-- <meta property="og:image"              content="{{$share_images}}" /> --}}
        <!--//-------Seo--------->


        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/images/favicon.png')}}">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/material-design-iconic-font.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="{{asset('public/frontend/css/fontawesome-stars.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/meanmenu.css')}}">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/slick.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/animate.css')}}">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/jquery-ui.min.css')}}">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/venobox.css')}}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/nice-select.css')}}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/magnific-popup.css')}}">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/helper.css')}}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/responsive.css')}}">

        <link rel="stylesheet" href="{{asset('public/frontend/css/sweetalert.css')}}">
        <!-- Modernizr js -->
        <script src="{{asset('public/frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    </head>
    <body>
 <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>
                <!-- Begin Header Top Area -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><span>Tổng đài CSKH:</span><a href="#">(+84) 037 210 5792 </a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        <li><a href="{{URL::to('/san-pham-yeu-thich')}}"><i class="fa fa-star"></i> Yêu thích</a></li>
                                            <?php
                                                $customer_id = Session::get('customer_id');
                                                $shipping_id = Session::get('shipping_id');
                                                if($customer_id!=NULL && $shipping_id==NULL){
                                            ?>
                                                <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>

                                            <?php
                                            }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                            ?>
                                            <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                            <?php
                                            }else{
                                            ?>
                                            <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                            <?php
                                            }
                                            ?>


                                            <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>

                                            @php
                                                $customer_id = Session::get('customer_id');
                                                if($customer_id!=NULL){
                                                @endphp

                                                <li>
                                                    <a href="{{URL::to('history')}}"><i class="fa fa-bell"></i> Lịch sử đơn hàng </a>

                                                </li>


                                                @php
                                                }
                                            @endphp

                                            <?php
                                            $customer_id = Session::get('customer_id');
                                            $customer_name = Session::get('customer_name');
                                            if($customer_id!=NULL){
                                                ?>

                                                <li>

                                                    <a href="{{URL::to('/view-customer')}}"><i class="fa fa-user"></i>Đổi mật khẩu</a>&nbsp;
                                                    <a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất:  {{Session::get('customer_name')}} </a>

                                                </li>


                                                <?php
                                            }else{
                                                ?>
                                                <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                                <?php
                                            }
                                            ?>

                                        <!-- Language Area End Here -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="{{URL::to('/')}}">
                                        <img src="{{asset('public/frontend/images/menu/logo/1.jpg')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                <form  action="{{URL::to('/tim-kiem')}}" method="POST" class="hm-searchbox">
                                    @csrf
                                    {{-- <select class="nice-select select-search-category">
                                        <option value="0">All</option>
                                    </select> --}}
                                    {{-- <div id="search_ajax"></div> --}}
                                    <input id="keywords" name="keywords_submit" type="text" placeholder="Nhập từ khóa bạn cần tìm kiếm ...">
                                    {{-- <div id="search_ajax"></div> --}}
                                    <button name="search_items" class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                                <div id="search_ajax"></div>
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area -->
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        <!-- Begin Header Middle Wishlist Area -->
                                        <li class="hm-wishlist">
                                            <a href="{{URL::to('/san-pham-yeu-thich')}}">
                                                <span class="cart-item-count wishlist-item-count">0</span>
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </li>
                                        <!-- Header Middle Wishlist Area End Here -->
                                        <!-- Begin Header Mini Cart Area -->
                                        @if(Session::get('cart')==true)
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text">Giỏ hàng
                                                    <span class="cart-item-count">{{sizeof(Session::get('cart'))}}</span>
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                                <ul class="minicart-product-list">
                                                    @php
                                                        $total = 0;
                                                    @endphp
                                                    @foreach (Session::get('cart') as $item)
                                                    @php
                                                        $subtotal = $item['product_price']*$item['product_qty'];
                                                        $total += $subtotal;
                                                    @endphp
                                                    <li>
                                                        <a href="" class="minicart-product-image">
                                                            <img src="{{URL::to('public/uploads/product/'.$item['product_image'])}}" alt="{{$item['product_name']}}">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="">{{$item['product_name']}}</a></h6>
                                                            <span>{{number_format($item['product_price']).' đ'}} x {{$item['product_qty']}}</span>
                                                        </div>
                                                        <button class="close" title="Remove">
                                                            <a href="{{url('del-product/'.$item['session_id'])}}"><i class="fa fa-close"></i></a>
                                                        </button>

                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <p class="minicart-total">Tạm tính: <span>{{number_format($total).' VNĐ'}}</span></p>
                                                <div class="minicart-button">
                                                    <a href="{{URL::to('/gio-hang')}}" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>Xem giỏ hàng</span>
                                                    </a>
                                                    <a href="{{URL::to('/checkout')}}" class="li-button li-button-fullwidth">
                                                        <span>Thanh toán</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        @else
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text">0 đ
                                                    <span class="cart-item-count">0</span>
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                                <ul class="minicart-product-list">
                                                    <li>
                                                       <p>Chưa có sản phẩm trong giỏ hàng</p>
                                                    </li>
                                                </ul>
                                                <p class="minicart-total">Tổng tiền: <span>0 đ</span></p>
                                                <div class="minicart-button">
                                                    <a href="{{URL::to('/gio-hang')}}" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>Xem giỏ hàng</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        @endif

                                        <!-- Header Mini Cart Area End Here -->
                                    </ul>
                                </div>
                                <!-- Header Middle Right Area End Here -->
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom mb-0 header-sticky stick d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                                <div class="hb-menu">
                                    <nav>
                                        <ul>
                                            <li><a href="{{URL::to('/')}}">TRANG CHU</a>
                                            </li>
                                            <li class="dropdown"><a href="{{URL::to('/')}}">THUONG HIEU SAN PHAM</a>
                                                <ul class="hb-dropdown">
                                                    <li class="sub-dropdown-holder">
                                                        @foreach($brand as $key => $bran)
                                                        <ul class="nav nav-pills nav-stacked">
                                                            <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$bran->brand_slug)}}">{{$bran->brand_name}}</a></li>
                                                        </ul>
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="catmenu-dropdown megamenu-static-holder"><a  href="{{URL::to('/')}}">&ensp;DANH MUC SAN PHAM</a>
                                                <ul class="megamenu hb-megamenu">
                                                @foreach($category as $key => $cate)
                                                    <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a>
                                                        <ul>
                                                            @foreach($category as $key => $cate_sub)
                                                            @if($cate_sub->category_parent==$cate->category_id)
                                                                <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate_sub->slug_category_product)}}">{{$cate_sub->category_name}}</a></li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                                </ul>
                                            </li>
                                            <li class=""><a href="{{URL::to('/')}}">TIN TUC SAN PHAM</a>
                                                <ul class="hb-dropdown">
                                                    <li class="sub-dropdown-holder">
                                                        @foreach($category_post as $key => $danhmucbaiviet)
                                                        <ul class="nav nav-pills nav-stacked">
                                                            <li><a href="{{URL::to('/danh-muc-bai-viet/'.$danhmucbaiviet->cate_post_slug)}}">{{$danhmucbaiviet->cate_post_name}}</a></li>
                                                        </ul>
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </li>

                                            <li><a href="{{URL::to('/lien-he')}}">&emsp;&emsp;Liên Hê</a></li>
                                            <li><a href="{{URL::to('/video-shop')}}">&emsp;Video</a></li>
                                            <li><a href="{{URL::to('/gioi-thieu')}}">Tuyên Dung</a></li>
                                            {{-- <li><a href="{{URL::to('/so-sanh-san-pham')}}">So sanh Product</a></li> --}}
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container">
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>
            <!-- Header Area End Here -->
            <!-- Begin Slider With Banner Area -->
            <div class="slider-with-banner">
                @yield('banner')
            </div>
            <!-- Slider With Banner Area End Here -->
            <!-- Begin Product Area -->
                @yield('content')
            <!-- Li's Trendding Products Area End Here -->
            <!-- Begin Footer Area -->
            <div class="footer">
                <!-- Begin Footer Static Top Area -->
                <div class="footer-static-top">
                    <div class="container">
                        <!-- Begin Footer Shipping Area -->
                        <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                            <div class="row">
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('public/frontend/images/shipping-icon/1.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Vận chuyển toàn quốc</h2>
                                            <p>Giao hàng nhanh chóng và an toàn.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('public/frontend/images/shipping-icon/2.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Thanh toán đa dạng</h2>
                                            <p>Dễ dàng thanh toán bằng nhiều phương thức.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('public/frontend/images/shipping-icon/3.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Hàng chính hãng 100%</h2>
                                            <p>Phân phối và bán hàng chính hãng từ các nhà cung cấp lớn.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('public/frontend/images/shipping-icon/4.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Hỗ trợ tư vấn 24/7</h2>
                                            <p>Hỗ trợ khách hàng tận tình,đổi trả nếu có lỗi từ nhà sản xuất. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                            </div>
                        </div>
                        <!-- Footer Shipping Area End Here -->
                    </div>
                </div>
                <!-- Footer Static Top Area End Here -->
                <!-- Begin Footer Static Middle Area -->
                <div class="footer-static-middle">
                    <div class="container">
                        <div class="footer-logo-wrap pt-50 pb-35">
                            <div class="row">
                                <!-- Begin Footer Logo Area -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="footer-logo">
                                        <img src="{{asset('public/frontend/images/menu/logo/1.jpg')}}" alt="Footer Logo">
                                        <p class="info">
                                            “Một nhà quản lý luôn căng lên vì công việc là nhà quản lý tốt nhất, bởi họ sẽ không có thời gian để can thiệp, để tham gia những cuộc tầm phào, để làm phiền người khác”
                                            <br>--Trích lời: Bill Gates (Chủ tịch của Microsoft)
                                        </p>
                                    </div>
                                    <ul class="des">
                                        <li>
                                            <span>Address: </span>
                                           Số 1, đường Xuân Đỉnh, Quận Bắc Từ Liêm, Thành phố Hà Nội
                                        </li>
                                        <li>
                                            <span>Phone: </span>
                                            <a href="#">(+123) 123 321 345</a>
                                        </li>
                                        <li>
                                            <span>Email: </span>
                                            <a href="mailto://thoigian5792@gmail.com">Thoigian5792@gmail.com</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Footer Logo Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Sản phẩm</h3>
                                        <ul>
                                            <li><a href="#">Mua hàng & thanh toán Online</a></li>
                                            <li><a href="#">Mua hàng trả góp Online</a></li>
                                            <li><a href="#">Tra cứu hóa đơn điện tử</a></li>
                                            <li><a href="#">Trung tâm bảo hành chính hãng</a></li>
                                            <li><a href="#">Dịch vụ bảo hành điện thoại</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Về Chúng tôi</h3>
                                        <ul>
                                            <li><a href="#">Quy chế hoạt động</a></li>
                                            <li><a href="#">Cộng tác bán hàng cùng chúng tôi</a></li>
                                            <li><a href="#">Ưu đãi từ đối tác</a></li>
                                            <li><a href="#"> Gửi góp ý, khiếu nại</a></li>
                                            <li><a href="#">Tuyển dụng</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-4">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Follow Us</h3>
                                        <ul class="social-link">
                                            <li class="twitter">
                                                <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="rss">
                                                <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="RSS">
                                                    <i class="fa fa-rss"></i>
                                                </a>
                                            </li>
                                            <li class="google-plus">
                                                <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                            <li class="facebook">
                                                <a href="https://www.facebook.com/ngocnt.5792" data-toggle="tooltip" target="_blank" title="Facebook">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="youtube">
                                                <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
                                                    <i class="fa fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li class="instagram">
                                                <a href="https://www.instagram.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Begin Footer Newsletter Area -->
                                    <div class="footer-newsletter">
                                        <h4>Đăng ký nhận tin</h4>
                                        <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="footer-subscribe-form validate" target="_blank" novalidate>
                                           <div id="mc_embed_signup_scroll">
                                              <div id="mc-form" class="mc-form subscribe-form form-group" >
                                                <input id="mc-email" type="email" autocomplete="off" placeholder="Nhập email của bạn" />
                                                <button  class="btn" id="mc-submit">Đăng ký</button>
                                              </div>
                                           </div>
                                        </form>
                                    </div>
                                    <!-- Footer Newsletter Area End Here -->
                                </div>
                                <!-- Footer Block Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Middle Area End Here -->
                <!-- Begin Footer Static Bottom Area -->
                <div class="footer-static-bottom pt-55 pb-55">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Footer Links Area -->
                                <div class="footer-links">
                                    <ul>
                                        <li><a href="#">Online Shopping</a></li>
                                        <li><a href="#">Promotions</a></li>
                                        <li><a href="#">My Orders</a></li>
                                        <li><a href="#">Help</a></li>
                                        <li><a href="#">Customer Service</a></li>
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">Most Populars</a></li>
                                        <li><a href="#">New Arrivals</a></li>
                                        <li><a href="#">Special Products</a></li>
                                        <li><a href="#">Manufacturers</a></li>
                                        <li><a href="#">Our Stores</a></li>
                                        <li><a href="#">Shipping</a></li>
                                        <li><a href="#">Payments</a></li>
                                        <li><a href="#">Warantee</a></li>
                                        <li><a href="#">Refunds</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Discount</a></li>
                                        <li><a href="#">Refunds</a></li>
                                        <li><a href="#">Policy Shipping</a></li>
                                    </ul>
                                </div>
                                <!-- Footer Links Area End Here -->
                                <!-- Begin Footer Payment Area -->
                                <div class="copyright text-center">
                                    <a href="#">
                                        <img src="{{asset('public/frontend/images/payment/1.png')}}" alt="">
                                    </a>
                                </div>
                                <!-- Footer Payment Area End Here -->
                                <!-- Begin Copyright Area -->
                                <div class="copyright text-center pt-25">
                                    <span><a target="_blank"> <?php echo date('@'."Y"); ?> Website phát triển 💙 bởi Nguyễn Tuấn Ngọc.</a></span>
                                </div>
                                <div class="zalo-chat-widget" data-oaid="248512510121692038" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="1" data-width="310" data-height="320"><div id="overlay" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; display: none;"></div></div>
                                {{-- <div class="zalo-chat-widget" data-oaid="248512510121692038" data-welcome-message="Ơn giời, Anh Chị đến CellphoneS rồi! Chat ngay với em để được trả lời liền tay về những điều cần giải đáp nhé ạ? " data-autopopup="1" data-width="350" data-height="420" style="z-index: 2147483647; border: none; visibility: visible; bottom: 0px; right: 0px; position: fixed; width: 350px; height: 420px; top: auto;"><iframe frameborder="0" allowfullscreen="" scrolling="no" width="350" height="420" src="https://sp.zalo.me/plugins/chat-widget?position=null&amp;oaid=3894196696036261863&amp;welcomemessage=%C6%A0n%20gi%E1%BB%9Di%2C%20Anh%20Ch%E1%BB%8B%20%C4%91%E1%BA%BFn%20CellphoneS%20r%E1%BB%93i!%20Chat%20ngay%20v%E1%BB%9Bi%20em%20%C4%91%E1%BB%83%20%C4%91%C6%B0%E1%BB%A3c%20tr%E1%BA%A3%20l%E1%BB%9Di%20li%E1%BB%81n%20tay%20v%E1%BB%81%20nh%E1%BB%AFng%20%C4%91i%E1%BB%81u%20c%E1%BA%A7n%20gi%E1%BA%A3i%20%C4%91%C3%A1p%20nh%C3%A9%20%E1%BA%A1%3F%20&amp;autopopup=1&amp;width=350&amp;height=420&amp;style=2&amp;id=80f817c7-eb19-47ed-be51-6bf266ec4899&amp;domain=cellphones.com.vn&amp;android=false&amp;ios=false" style="position: absolute; bottom: 0px; right: 0px;"></iframe><div id="drag-holder" draggable="true" style="position: absolute; top: 0px; width: 80%; height: 70px; cursor: move; left: 0px; display: block;"></div><div id="drag-left" style="position: absolute; top: 0px; left: 0px; width: 10px; height: 100%; cursor: w-resize; display: block;"></div><div id="drag-right" style="position: absolute; top: 0px; right: 0px; width: 10px; height: 100%; cursor: e-resize; display: block;"></div><div id="drag-top" style="position: absolute; top: 0px; width: 100%; height: 10px; cursor: n-resize; display: block;"></div><div id="drag-bottom" style="position: absolute; bottom: 0px; width: 100%; height: 10px; cursor: s-resize; display: block;"></div><div id="drag-top-left" style="position: absolute; top: 0px; left: 0px; width: 15px; height: 15px; cursor: nw-resize; display: block;"></div><div id="drag-top-right" style="position: absolute; top: 0px; right: 0px; width: 15px; height: 15px; cursor: ne-resize; display: block;"></div><div id="drag-bottom-right" style="position: absolute; bottom: 0px; right: 0px; width: 15px; height: 15px; cursor: se-resize; display: block;"></div><div id="drag-bottom-left" style="position: absolute; bottom: 0px; left: 0px; width: 15px; height: 15px; cursor: sw-resize; display: block;"></div><div id="overlay" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; display: none;"></div></div> --}}
                                <!-- Copyright Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Bottom Area End Here -->
            </div>
            <style type="text/css">
            .zalo-chat-widget {
                right: 5px !important;
                left: auto !important;
                bottom: 1% !important;
                z-index: 99999999999 !important;
            }
            </style>
                {{-- <div class="zalo-chat-widget" data-oaid="248512510121692038" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div> --}}


            <!-- Footer Area End Here -->
            <!-- Begin Quick View | Modal Area -->
            {{-- <div class="modal fade modal-wrapper" id="xemnhanh" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-inner-area row">
                                <div class="col-lg-5 col-md-6 col-sm-6">
                                   <!-- Product Details Left -->
                                    <div class="product-details-left">
                                        <div class="product-details-images slider-navigation-1">
                                            <div class="lg-image">
                                                <span id="product_quickview_image"></span>
                                            </div>
                                            <div class="lg-image">
                                                <img src="{{asset('public/frontend/images/product/large-size/2.jpg')}}" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="{{asset('public/frontend/images/product/large-size/3.jpg')}}" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="{{asset('public/frontend/images/product/large-size/4.jpg')}}" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="{{asset('public/frontend/images/product/large-size/5.jpg')}}" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="{{asset('public/frontend/images/product/large-size/6.jpg')}}" alt="product image">
                                            </div>
                                        </div>
                                        <div class="product-details-thumbs slider-thumbs-1">
                                            <div class="sm-image"><img src="{{asset('public/frontend/images/product/small-size/1.jpg')}}" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="{{asset('public/frontend/images/product/small-size/2.jpg')}}" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="{{asset('public/frontend/images/product/small-size/3.jpg')}}" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="{{asset('public/frontend/images/product/small-size/4.jpg')}}" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="{{asset('public/frontend/images/product/small-size/5.jpg')}}" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="{{asset('public/frontend/images/product/small-size/6.jpg')}}" alt="product image thumb"></div>
                                        </div>
                                    </div>
                                    <!--// Product Details Left -->
                                </div>

                                <div class="col-lg-7 col-md-6 col-sm-6">
                                    <div class="product-details-view-content pt-60">
                                        <div class="product-info">
                                            <h2><span id="product_quickview_title"></span></h2>
                                            <p>Mã ID: <span id="product_quickview_id"></span></p>
                                            <div class="rating-box pt-20">
                                                <ul class="rating rating-with-review-item">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="review-item"><a href="#">Read Review</a></li>
                                                    <li class="review-item"><a href="#">Write Review</a></li>
                                                </ul>
                                            </div>
                                            <div class="price-box pt-20">
                                                <span id="product_quickview_price"></span>
                                            </div>
                                            <div class="product-desc">
                                                <p>
                                                    <span id="product_quickview_desc"></span>
                                                </p>
                                            </div>
                                            <div class="product-variants">
                                                <div class="produt-variants-size">
                                                    <label>Tùy chọn sp</label>
                                                    <select class="nice-select">
                                                        <option value="1" title="S" selected="selected">40x60cm</option>
                                                        <option value="2" title="M">60x90cm</option>
                                                        <option value="3" title="L">80x120cm</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="single-add-to-cart">
                                                <form class="cart-quantity">
                                                    <div class="quantity">
                                                        <label>Số lượng</label>
                                                        <div class="cart-plus-minus">
                                                            <input name="qty" type="number" min="1" class="cart_product_qty_"  value="1">
                                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                        </div>
                                                    </div>
                                                    <div id="product_quickview_value"></div>
                                                    <div id="product_quickview_button"></div>
                                                </form>
                                            </div>
                                            <div class="product-additional-info pt-25">
                                                <a class="wishlist-btn" href=""><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                                <div class="product-social-sharing pt-25">
                                                    <ul>
                                                        <li class="facebook"><a href=""><i class="fa fa-facebook"></i>Facebook</a></li>
                                                        <li class="twitter"><a href=""><i class="fa fa-twitter"></i>Twitter</a></li>
                                                        <li class="google-plus"><a href=""><i class="fa fa-google-plus"></i>Google +</a></li>
                                                        <li class="instagram"><a href=""><i class="fa fa-instagram"></i>Instagram</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quick View | Modal Area End Here -->
        </div> --}}
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="{{asset('public/frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('public/frontend/js/vendor/popper.min.js')}}"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
        <!-- Ajax Mail js -->
        <script src="{{asset('public/frontend/js/ajax-mail.js')}}"></script>
        <!-- Meanmenu js -->
        <script src="{{asset('public/frontend/js/jquery.meanmenu.min.js')}}"></script>
        <!-- Wow.min js -->
        <script src="{{asset('public/frontend/js/wow.min.js')}}"></script>
        <!-- Slick Carousel js -->
        <script src="{{asset('public/frontend/js/slick.min.js')}}"></script>
        <!-- Owl Carousel-2 js -->
        <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
        <!-- Magnific popup js -->
        <script src="{{asset('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Isotope js -->
        <script src="{{asset('public/frontend/js/isotope.pkgd.min.js')}}"></script>
        <!-- Imagesloaded js -->
        <script src="{{asset('public/frontend/js/imagesloaded.pkgd.min.js')}}"></script>
        <!-- Mixitup js -->
        <script src="{{asset('public/frontend/js/jquery.mixitup.min.js')}}"></script>
        <!-- Countdown -->
        <script src="{{asset('public/frontend/js/jquery.countdown.min.js')}}"></script>
        <!-- Counterup -->
        <script src="{{asset('public/frontend/js/jquery.counterup.min.js')}}"></script>
        <!-- Waypoints -->
        <script src="{{asset('public/frontend/js/waypoints.min.js')}}"></script>
        <!-- Barrating -->
        <script src="{{asset('public/frontend/js/jquery.barrating.min.js')}}"></script>
        <!-- Jquery-ui -->
        <script src="{{asset('public/frontend/js/jquery-ui.min.js')}}"></script>
        <!-- Venobox -->
        <script src="{{asset('public/frontend/js/venobox.min.js')}}"></script>
        <!-- Nice Select js -->
        <script src="{{asset('public/frontend/js/jquery.nice-select.min.js')}}"></script>
        <!-- ScrollUp js -->
        <script src="{{asset('public/frontend/js/scrollUp.min.js')}}"></script>
        <!-- Main/Activator js -->
        <script src="{{asset('public/frontend/js/main.js')}}"></script>
        {{-- Tự tạo --}}
        {{-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="HywljSwE"></script> --}}
        <script src="https://sp.zalo.me/plugins/sdk.js"></script>
        <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=852484398680038&autoLogAppEvents=1" nonce="N9RehpZN"></script>


        {{-- <script type="text/javascript">
           $("#sort").on('click', function() {

                    var url = $(this).val();
                    alert(1);
                    if (url) {
                        window.location = url;
                    }
                    return false;

            });
        </script> --}}
        <script>
            $(document).ready(function(){
              $(".sort").on('change',function(){
                    var url = $(this).val();
                    if (url) {
                        window.location = url;
                    }
                // alert("The text has been changed.");
              });
            });
            </script>

        <script type="text/javascript">
            $(document).ready(function(){

                if(localStorage.getItem('data')==null){
                    $('.wishlist-item-count').html(0);
                    localStorage.setItem('data', '[]');
                } else {
                    var old_data = JSON.parse(localStorage.getItem('data'));
                    $('.wishlist-item-count').html(old_data.length);
                }

                $('.add-to-cart').click(function(){
                    var id = $(this).data('id_product');
                    var cart_product_id = $('.cart_product_id_' + id).val();
                    var cart_product_name = $('.cart_product_name_' + id).val();
                    var cart_product_image = $('.cart_product_image_' + id).val();
                    var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                    var cart_product_price = $('.cart_product_price_' + id).val();
                    var cart_product_qty = $('.cart_product_qty_' + id).val();
                    var _token = $('input[name="_token"]').val();
                    // alert( 'Đã thêm vào giỏ hàng');
                    // alert( cart_product_name);
                    if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                        alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
                    }else{
                        $.ajax({
                            url: '{{url('/add-cart-ajax')}}',
                            method: 'POST',
                            data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                            success:function(data){
                                swal({
                                        title: "Đã thêm sản phẩm vào giỏ hàng",
                                        text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                        showCancelButton: true,
                                        cancelButtonText: "Xem tiếp",
                                        confirmButtonClass: "btn-success",
                                        confirmButtonText: "Đi đến giỏ hàng",
                                        closeOnConfirm: false
                                    },
                                    function() {
                                        window.location.href = "{{url('/gio-hang')}}";
                                    });
                            }

                        });
                    }
                });
            });
        </script>

        {{-- <script type="text/javascript">
            $(document).ready(function(){
              $('.send_order').click(function(){
            var total_after = $('.total_after').val();
                  swal({
                    title: "Xác nhận đơn hàng",
                    text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Cảm ơn, Mua hàng",

                      cancelButtonText: "Đóng,chưa mua",
                      closeOnConfirm: false,
                      closeOnCancel: false
                  },
                  function(isConfirm){
                       if (isConfirm) {
                          var shipping_email = $('.shipping_email').val();
                          var shipping_name = $('.shipping_name').val();
                          var shipping_address = $('.shipping_address').val();
                          var shipping_phone = $('.shipping_phone').val();
                          var shipping_notes = $('.shipping_notes').val();
                          var shipping_method = $('.payment_select').val();

                          var order_fee = $('.order_fee').val();
                          var order_coupon = $('.order_coupon').val();
                          var _token = $('input[name="_token"]').val();


                          $.ajax({
                              url: '{{url('/confirm-order')}}',
                              method: 'POST',
                              data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon},
                            //   data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                              success:function(){
                                 swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                              }
                          });

                        //   window.setTimeout(function(){
                        //       location.reload();
                        //   } ,3000);

                        } else {
                          swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

                        }

                  });


              });
          });
        </script> --}}



        <script type="text/javascript">
            $(document).ready(function(){
                    $('.choose').on('change',function(){
                    var action = $(this).attr('id');
                    var ma_id = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    var result = '';

                    if(action=='city'){
                        result = 'province';
                    }else{
                        result = 'wards';
                    }
                    $.ajax({
                        url : '{{url('/select-delivery-home')}}',
                        method: 'POST',
                        data:{action:action,ma_id:ma_id,_token:_token},
                        success:function(data){
                        $('#'+result).html(data);
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.calculate_delivery').click(function(){
                    var matp = $('.city').val();
                    var maqh = $('.province').val();
                    var xaid = $('.wards').val();
                    var _token = $('input[name="_token"]').val();
                    if(matp == '' && maqh =='' && xaid ==''){
                        alert('Làm ơn chọn để tính phí vận chuyển');
                    }else{
                        $.ajax({
                        url : '{{url('/calculate-fee')}}',
                        method: 'POST',
                        data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                        success:function(){
                           location.reload();
                        }
                        });
                    }
            });
        });
        </script>

        <script type="text/javascript">
            $('#keywords').keyup(function(){
                var query = $(this).val();
                // alert(query);

                if(query != '')
                    {
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                    url:"{{url('/autocomplete-ajax')}}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                    $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                    });

                    }else{

                        $('#search_ajax').fadeOut();
                    }
            });

            $(document).on('click', '.li_search_ajax', function(){
                $('#keywords').val($(this).text());
                $('#search_ajax').fadeOut();
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){

                load_comment();

                function load_comment(){
                    var product_id = $('.comment_product_id').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                      url:"{{url('/load-comment')}}",
                      method:"POST",
                      data:{product_id:product_id, _token:_token},
                      success:function(data){
                        $('#comment_show').html(data);
                      }
                    });
                }
                $('.send-comment').click(function(){
                    var product_id = $('.comment_product_id').val();
                    var comment_name = $('.comment_name').val();
                    var comment_content = $('.comment_content').val();
                    var _token = $('input[name="_token"]').val();
                    // alert(comment_content);
                    $.ajax({
                      url:"{{url('/send-comment')}}",
                      method:"POST",
                      data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content, _token:_token},
                      success:function(data){

                        $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>');
                        load_comment();
                        $('#notify_comment').fadeOut(9000);
                        $('.comment_name').val('');
                        $('.comment_content').val('');
                      }
                    });
                });
            });
        </script>

        <script type="text/javascript">
            $(function(){
                let listStart = $(".list_star .fa");
                $listRatingText = [
                    1 => 'Không thích',
                    2 => 'Tạm đuọc',
                    3 => 'Bình thường',
                    4 => 'Rất tốt',
                    5 => 'Tuyệt vời quá',
                ];
                listStart.mouseover(function(){
                    let $this = $(this);
                    console.log($this.attr('data-key'))
                });
            });
        </script>

    <script type="text/javascript">
        function remove_background(product_id)
         {
          for(var count = 1; count <= 5; count++)
          {
           $('#'+product_id+'-'+count).css('color', '#ccc');
          }
        }
        //hover chuột đánh giá sao
       $(document).on('mouseenter', '.danhgiasao', function(){
          var index = $(this).data("index");
          var product_id = $(this).data('product_id');
        // alert(index);
        // alert(product_id);
          remove_background(product_id);
          for(var count = 1; count<=index; count++)
          {
           $('#'+product_id+'-'+count).css('color', '#ffcc00');
          }
        });
       //nhả chuột ko đánh giá
       $(document).on('mouseleave', '.danhgiasao', function(){
          var index = $(this).data("index");
          var product_id = $(this).data('product_id');
          var rating = $(this).data("rating");
          remove_background(product_id);
          //alert(rating);
          for(var count = 1; count<=rating; count++)
          {
           $('#'+product_id+'-'+count).css('color', '#ffcc00');
          }
         });

        //click đánh giá sao
        $(document).on('click', '.danhgiasao', function(){
              var index = $(this).data("index");
              var product_id = $(this).data('product_id');
                var _token = $('input[name="_token"]').val();
              $.ajax({
               url:"{{url('insert-rating')}}",
               method:"POST",
               data:{index:index, product_id:product_id,_token:_token},
               success:function(data)
               {
                if(data == 'done')
                {
                 alert("Bạn đã đánh giá "+index +" trên 5 sao");
                }
                else
                {
                 alert("Lỗi đánh giá");
                }
               }
        });

        });
    </script>
    <script type="text/javascript">

        $('.xemnhanh').click(function(){
            var product_id = $(this).data('id_product');
            var _token = $('input[name="_token"]').val();
            $.ajax({
            url:"{{url('/quickview')}}",
            method:"POST",
            dataType:"JSON",
            data:{product_id:product_id, _token:_token},
              success:function(data){
                $('#product_quickview_title').html(data.product_name);
                $('#product_quickview_id').html(data.product_id);
                $('#product_quickview_price').html(data.product_price);
                $('#product_quickview_image').html(data.product_image);
                $('#product_quickview_gallery').html(data.product_gallery);
                $('#product_quickview_desc').html(data.product_desc);
                $('#product_quickview_content').html(data.product_content);
                $('#product_quickview_value').html(data.product_quickview_value);
                $('#product_quickview_button').html(data.product_button);
              }
            });
        });
        </script>
          <script type="text/javascript">

            $(document).on('click','.watch-video',function(){
                var video_id = $(this).attr('id');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:'{{url('/watch-video')}}',
                    method:"POST",
                    dataType:"JSON",
                    data:{video_id:video_id,_token:_token},
                    success:function(data){
                        $('#video_title').html(data.video_title);
                        $('#video_link').html(data.video_link);
                        $('#video_desc').html(data.video_desc);
                        var playerYT = new vlitejs({
                            selector: '#my_yt_video',
                            options: {
                              // auto play
                              autoplay: false,

                              // enable controls
                              controls: true,

                              // enables play/pause buttons
                              playPause: true,

                              // shows progress bar
                              progressBar: true,

                              // shows time
                              time: true,

                              // shows volume control
                              volume: true,

                              // shows fullscreen button
                              fullscreen: true,

                              // path to poster image
                              poster: null,

                              // shows play button
                              bigPlay: true,

                              // hide the control bar if the user is inactive
                              autoHide: false,

                              // keeps native controls for touch devices
                              nativeControlsForTouch: false
                            },
                            onReady: (player) => {
                              // callback function here
                            }
                        });

                    }

                });
            });
        </script>

        <script type="text/javascript">

            function view(){


                if(localStorage.getItem('data')!=null){

                    var data = JSON.parse(localStorage.getItem('data'));

                    data.reverse();

                    // document.getElementById('row_wishlist').style.overflow = 'scroll';
                    // document.getElementById('row_wishlist').style.height = '500px';

                    for(i=0;i<data.length;i++){

                    var name = data[i].name;
                    var price = data[i].price;
                    var image = data[i].image;
                    var url = data[i].url;

                    $('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="'+image+'"></div><div class="col-md-8 info_wishlist"><p>'+name+'</p><p style="color:#FE980F">'+price+'</p><a href="'+url+'">Đặt hàng</a></div>');
                }

            }

        }

        view();


        function add_wistlist(clicked_id){

            var id = clicked_id;
            var name = document.getElementById('wishlist_productname'+id).value;
            var price = document.getElementById('wishlist_productprice'+id).value;
            var image = document.getElementById('wishlist_productimage'+id).src;
            var url = document.getElementById('wishlist_producturl'+id).href;


            var newItem = {
                'url':url,
                'id' :id,
                'name': name,
                'price': price,
                'image': image
            }

            if(localStorage.getItem('data')==null){
                $('.wishlist-item-count').html(0);
                localStorage.setItem('data', '[]');
            }

            var old_data = JSON.parse(localStorage.getItem('data'));

            //    old_data.push(newItem);

            var matches = $.grep(old_data, function(obj){
                return obj.id == id;
            })

            if(matches.length){
                alert('Sản phẩm bạn đã yêu thích,nên không thể thêm');

            }else{
                alert('Sản phẩm bạn đã thêm vào yêu thích.');

                old_data.push(newItem);

                $('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="'+newItem.image+'"></div><div class="col-md-8 info_wishlist"><p>'+newItem.name+'</p><p style="color:#FE980F">'+newItem.price+'</p><a href="'+newItem.url+'">Đặt hàng</a></div>');

            }

            localStorage.setItem('data', JSON.stringify(old_data));
            $('.wishlist-item-count').html(old_data.length);

        }
        </script>

        <script>
            var usd = document.getElementById("vnd_to_usd").value;
            paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'AUiE2-dn7Bk84H7mrn7zwaCawMuSZEGtMhhWEnnMS-2Xc5EvlmO7i7jB_PtTz9wIbfGsoBvGXzyxsmmS',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'small',
                color: 'gold',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                transactions: [{
                    amount: {
                    total: `${usd}`,
                    currency: 'USD'
                    }
                }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                // Show a confirmation message to the buyer
                window.alert('Bạn đã thanh toán thành công, chúng tôi sẽ liên hệ với bạn sau.');
                });
            }
            }, '#paypal-button');

        </script>

        <script type="text/javascript">

            function view(){

                if(localStorage.getItem('viewed')!=null){

                    var data = JSON.parse(localStorage.getItem('viewed'));

                    data.reverse();

                    // document.getElementById('row_wishlist').style.overflow = 'scroll';
                    // document.getElementById('row_wishlist').style.height = '500px';

                    for(i=0;i<data.length;i++){

                    var name = data[i].name;
                    var price = data[i].price;
                    var image = data[i].image;
                    var url = data[i].url;

                    $('#row_compare').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="'+image+'"></div><div class="col-md-8 info_wishlist"><p>'+name+'</p><p style="color:#FE980F">'+price+'</p><a href="'+url+'">Đặt hàng</a></div>');
                }

            }

        }

        view();


        function add_compare(product_id){

            var id = product_id;
            var name = document.getElementById('wishlist_productname'+id).value;
            var price = document.getElementById('wishlist_productprice'+id).value;
            var image = document.getElementById('wishlist_productimage'+id).src;
            var url = document.getElementById('wishlist_producturl'+id).href;
            // alert(id);
            // alert(name);
            // alert(price);
            // alert(image);
            // alert(url);

            var Sosanh = {
                'url':url,
                'id' :id,
                'name': name,
                'price': price,
                'image': image
            }
            // alert(JSON.stringify(Sosanh));
            // 1
            if(localStorage.getItem('viewed')==null){
                // console.log(1);
                localStorage.setItem('viewed', '[]');
            }

//1
            var old_data = JSON.parse(localStorage.getItem('viewed'));
            // var old_data = localStorage.getItem('viewed');
            // console.log(old_data);
            var matches = $.grep(old_data, function(obj, i){
                // console.log(id);
                return obj.id == id;
            })
            console.log(matches);
            if(matches.length){
                alert('Sản phẩm bạn đã thêm vào so sánh, nên không thể thêm!');
            }else{
                if(old_data.length<2){
                    alert('Sản phẩm bạn đã thêm vào so sánh!');
                    old_data.push(Sosanh);
                    localStorage.setItem('viewed', JSON.stringify(old_data));

                    $('#row_compare').append(`
                            <tr>
                                <th>`+Sosanh.name+`</th>
                                <td>`+Sosanh.price+`</td>
                                <td><img width="200px" src="`+Sosanh.image+`"</td>
                                <td><a href="`+Sosanh.url+`">Xem sản phẩm</a></td>
                                <td>Xóa sản phẩm so sánh</td>
                            </tr>
                            `);

                } else {
                    alert('Bạn chỉ có thể thêm tối đa được 2 sản phẩm để so sánh!');
                }
                // alert('Sản phẩm bạn đã thêm vào so sánh.');


            }

        }
        </script>

        <script>
        $( function() {
            $( "#slider-range" ).slider({
                orientation: "vertical",
                range: true,
                values: [ 100, 267 ],
                step:10;
                slide: function( event, ui ) {
                $( "#amount" ).val( "VNĐ" + ui.values[ 0 ] + " - VNĐ" + ui.values[ 1 ] );
                $( "#start_price" ).val(ui.values[ 0 ]);
                $( "#end_price" ).val( ui.values[ 1 ] );
                }
            });
            $( "#amount" ).val( "VNĐ" + $( "#slider-range" ).slider( "values", 0 ) +
                " - VNĐ" + $( "#slider-range" ).slider( "values", 1 ) );
            } );
        </script>




    </body>
<!-- index30:23-->
</html>

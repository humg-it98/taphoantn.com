<!doctype html>
<html class="no-js" lang="zxx">

<!-- index28:48-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Cửa hàng tạp hóa NTN tùy chỉnh</title>
        <meta name="description" content="">
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
                                        <li><a href="{{URL::to('/yeu-thich')}}"><i class="fa fa-star"></i> Yêu thích</a></li>
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
                                    <select class="nice-select select-search-category">
                                        <option value="0">All</option>
                                    </select>
                                    <div id="search_ajax"></div>
                                    <input id="keywords" name="keywords_submit" type="text" placeholder="Nhập từ khóa bạn cần tìm kiếm ...">
                                    <button name="search_items" class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area -->
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        <!-- Begin Header Middle Wishlist Area -->
                                        <li class="hm-wishlist">
                                            <a href="">
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
                                                            <i class="fa fa-close"></i>
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
                                                    <a href="shopping-cart.html" class="li-button li-button-fullwidth li-button-dark">
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
                                            <li class="dropdown-holder"><a href="{{URL::to('/')}}">Home</a>
                                            </li>
                                            {{-- <li class="catmenu-dropdown megamenu-holder"><a>Category</a>
                                                @foreach($category as $key => $danhmuc)
                                                <ul class="megamenu hb-megamenu">
                                                    @if($danhmuc->category_parent==0)
                                                    <li><a href="{{URL::to('/danh-muc-san-pham/'.$danhmuc->slug_category_product)}}">{{$danhmuc->category_name}}</a>
                                                        @foreach($category as $key => $danhmuc1)
                                                            @if($danhmuc1->category_parent==$danhmuc->category_id)
                                                            <ul class="hb-dropdown hb-sub-dropdown">
                                                                <li><a href="{{URL::to('/danh-muc-san-pham/'.$danhmuc1->slug_category_product)}}">{{$danhmuc1->category_name}}</a></li>
                                                            </ul>
                                                            @endif
                                                        @endforeach
                                                    </li>
                                                    @endif
                                                </ul>
                                                @endforeach
                                            </li> --}}
                                            <li class="dropdown-holder"><a href="{{URL::to('/')}}">Category Product</a>
                                                <ul class="hb-dropdown">
                                                    <li class="sub-dropdown-holder">
                                                        @foreach($category as $key => $cate)
                                                        <ul class="nav nav-pills nav-stacked">
                                                            <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a></li>
                                                        </ul>
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-holder"><a href="{{URL::to('/')}}">Brand Product</a>
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

                                            <li class="catmenu-dropdown megamenu-static-holder"><a  href="{{URL::to('/')}}">&emsp;&ensp;Pages</a>
                                                <ul class="megamenu hb-megamenu">
                                                    <li><a href="{{URL::to('/')}}">Blog Layouts</a>
                                                        <ul>
                                                            {{-- <li><a href="blog-2-column.html">Blog 2 Column</a></li>
                                                            <li><a href="blog-3-column.html">Blog 3 Column</a></li>
                                                            <li><a href="blog-left-sidebar.html">Grid Left Sidebar</a></li>
                                                            <li><a href="blog-right-sidebar.html">Grid Right Sidebar</a></li>
                                                            <li><a href="blog-list.html">Blog List</a></li>
                                                            <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a></li>
                                                            <li><a href="blog-list-right-sidebar.html">List Right Sidebar</a></li> --}}
                                                        </ul>
                                                    </li>
                                                    <li><a href="{{URL::to('/')}}">Blog Details Pages</a>
                                                        {{-- <ul>
                                                            <li><a href="blog-details-left-sidebar.html">Left Sidebar</a></li>
                                                            <li><a href="blog-details-right-sidebar.html">Right Sidebar</a></li>
                                                            <li><a href="blog-audio-format.html">Blog Audio Format</a></li>
                                                            <li><a href="blog-video-format.html">Blog Video Format</a></li>
                                                            <li><a href="blog-gallery-format.html">Blog Gallery Format</a></li>
                                                        </ul> --}}
                                                    </li>
                                                    <li><a href="{{URL::to('/')}}">Other Pages</a>
                                                        {{-- <ul>
                                                            <li><a href="login-register.html">My Account</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="compare.html">Compare</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                            <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                                        </ul> --}}
                                                    </li>
                                                    <li><a href="{{URL::to('/')}}">Other Pages 2</a>
                                                        {{-- <ul>
                                                            <li><a href="contact.html">Contact</a></li>
                                                            <li><a  href="{{URL::to('/san-pham-yeu-thich')}}">Wishlist Product</a></li>
                                                            <li><a href="faq.html">FAQ</a></li>
                                                            <li><a href="404.html">404 Error</a></li>
                                                        </ul> --}}
                                                    </li>
                                                </ul>
                                            </li>

                                            <li><a href="{{URL::to('/lien-he')}}">Contact</a></li>
                                            <li><a href="{{URL::to('/video-shop')}}">Video</a></li>
                                            <li><a href="{{URL::to('/san-pham-yeu-thich')}}">Wishlist Product</a></li>
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
                                            <h2>Free Delivery</h2>
                                            <p>And free returns. See checkout for delivery dates.</p>
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
                                            <h2>Safe Payment</h2>
                                            <p>Pay with the world's most popular and secure payment methods.</p>
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
                                            <h2>Shop with Confidence</h2>
                                            <p>Our Buyer Protection covers your purchasefrom click to delivery.</p>
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
                                            <h2>24/7 Help Center</h2>
                                            <p>Have a question? Call a Specialist or chat online.</p>
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
                                            We are a team of designers and developers that create high quality HTML Template & Woocommerce, Shopify Theme.
                                        </p>
                                    </div>
                                    <ul class="des">
                                        <li>
                                            <span>Address: </span>
                                            6688Princess Road, London, Greater London BAS 23JK, UK
                                        </li>
                                        <li>
                                            <span>Phone: </span>
                                            <a href="#">(+123) 123 321 345</a>
                                        </li>
                                        <li>
                                            <span>Email: </span>
                                            <a href="mailto://info@yourdomain.com">info@yourdomain.com</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Footer Logo Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Product</h3>
                                        <ul>
                                            <li><a href="#">Prices drop</a></li>
                                            <li><a href="#">New products</a></li>
                                            <li><a href="#">Best sales</a></li>
                                            <li><a href="#">Contact us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Our company</h3>
                                        <ul>
                                            <li><a href="#">Delivery</a></li>
                                            <li><a href="#">Legal Notice</a></li>
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">Contact us</a></li>
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
                                                <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
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
                                        <h4>Sign up to newsletter</h4>
                                        <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="footer-subscribe-form validate" target="_blank" novalidate>
                                           <div id="mc_embed_signup_scroll">
                                              <div id="mc-form" class="mc-form subscribe-form form-group" >
                                                <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email" />
                                                <button  class="btn" id="mc-submit">Subscribe</button>
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
                                <!-- Copyright Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Bottom Area End Here -->
            </div>
            <!-- Footer Area End Here -->
            <!-- Begin Quick View | Modal Area -->
            <div class="modal fade modal-wrapper" id="xemnhanh" >
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
                                                    @csrf
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
        </div>
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
        <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>


        <script type="text/javascript">
            $(document).ready(function(){
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

        <script>
        $(function() {
          $("#slider-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [75, 300],
            slide: function(event, ui) {
              $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
          });
          $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));
        });
        </script>
          <script type="text/javascript">

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
                              data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
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


      </script>
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
        function remove_background(product_id)
         {
          for(var count = 1; count <= 5; count++)
          {
           $('#'+product_id+'-'+count).css('color', '#ccc');
          }
        }
        //hover chuột đánh giá sao
       $(document).on('mouseenter', '.rating', function(){
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
       $(document).on('mouseleave', '.rating', function(){
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
        $(document).on('click', '.rating', function(){
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
                 alert("Bạn đã đánh giá "+index +" trên 5");
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

                old_data.push(newItem);

                $('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="'+newItem.image+'"></div><div class="col-md-8 info_wishlist"><p>'+newItem.name+'</p><p style="color:#FE980F">'+newItem.price+'</p><a href="'+newItem.url+'">Đặt hàng</a></div>');

            }

            localStorage.setItem('data', JSON.stringify(old_data));


        }
        </script>

        <script type="text/javascript">
            $(document).ready(function(){

                $('#sort').on('change',function(){

                    var url = $(this).val();
                    // alert(url);
                    if (url) {
                        window.location = url;
                    }
                    return false;
                });

            });
        </script>



    </body>
<!-- index30:23-->
</html>

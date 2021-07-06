@extends('layout')
@extends('banner')
@section('content')

<div class="product-area pt-60 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                       <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Sản phẩm mới nhất</span></a></li>
                       <li><a data-toggle="tab" href="#li-bestseller-product"><span>Sản phẩm bán chạy</span></a></li>
                       <li><a data-toggle="tab" href="#li-featured-product"><span>Sản phẩm đang về</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($all_product as $key => $product)

                        <div class="col-lg-12">
                            <form>
                                @csrf
                                <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}" >
                                <input type="hidden" id="wishlist_productname{{$product->product_id}}" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                <input type="hidden" id="wishlist_productprice{{$product->product_id}}" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{URL::to('/chi-tiet-san-pham',$product->product_slug)}}">
                                        <img id="wishlist_productimage{{$product->product_id}}" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a>ID sản phẩm: {{$product->product_id}}</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" id="wishlist_producturl{{$product->product_id}}" href="{{URL::to('/chi-tiet-san-pham',$product->product_slug)}}">{{$product->product_name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">Giá: {{number_format($product->product_price,0,',','.')}}VNĐ</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active add-to-cart" name="add-to-cart" data-id_product="{{$product->product_id}}" ><a>Add to cart</a></li>
                                            <li><a class="links-details wishlist" id="{{$product->product_id}}" onclick="add_wistlist(this.id);"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a title="Xem nhanh" name="add-to-cart" class="quick-view-btn xemnhanh" data-id_product="{{$product->product_id}}" data-toggle="modal" data-target="#xemnhanh"><i class="fa fa-eye"></i></a></li>
                                            <p><br></p>
                                            <li style="width:195px; cursor: point" class="add-cart active" name="add_check" onclick="add_compare({{$product->product_id}})"><a>So sánh</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                            </form>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
            <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{asset('public/frontend/images/product/large-size/12.jpg')}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{asset('public/frontend/images/product/large-size/11.jpg')}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{asset('public/frontend/images/product/large-size/10.jpg')}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{asset('public/frontend/images/product/large-size/9.jpg')}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{asset('public/frontend/images/product/large-size/8.jpg')}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{asset('public/frontend/images/product/large-size/7.jpg')}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                    </div>
                </div>
            </div>
            <div id="li-featured-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{asset('public/frontend/images/product/large-size/3.jpg')}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{asset('public/frontend/images/product/large-size/5.jpg')}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{asset('public/frontend/images/product/large-size/7.jpg')}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{asset('public/frontend/images/product/large-size/9.jpg')}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{asset('public/frontend/images/product/large-size/11.jpg')}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="{{asset('public/frontend/images/product/large-size/12.jpg')}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
<!-- Begin Li's Static Banner Area -->
<div class="li-static-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4 text-center">
                <div class="single-banner">
                    <a href="#">
                        <img src="{{asset('public/frontend/images/banner/banner_lap2.png')}}" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                <div class="single-banner">
                    <a href="#">
                        <img src="{{asset('public/frontend/images/banner/banner_lap1.jpg')}}" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                <div class="single-banner">
                    <a href="#">
                        <img src="{{asset('public/frontend/images/banner/banner_lap3.jpg')}}" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
        </div>
    </div>
</div>
<!-- Li's Static Banner Area End Here -->
<section class="product-area li-laptop-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>ĐIÊN THOAI
                        </span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($all_product_phone as $key => $product_phone)

                        <div class="col-lg-12">
                            <form>
                                @csrf
                                <input type="hidden" value="{{$product_phone->product_id}}" class="cart_product_id_{{$product_phone->product_id}}" >
                                <input type="hidden" id="wishlist_productname{{$product_phone->product_id}}" value="{{$product_phone->product_name}}" class="cart_product_name_{{$product_phone->product_id}}">
                                <input type="hidden" value="{{$product_phone->product_image}}" class="cart_product_image_{{$product_phone->product_id}}">
                                <input type="hidden" id="wishlist_productprice{{$product_phone->product_id}}" value="{{$product_phone->product_price}}" class="cart_product_price_{{$product_phone->product_id}}">
                                <input type="hidden" value="1" class="cart_product_qty_{{$product_phone->product_id}}">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{URL::to('/chi-tiet-san-pham',$product_phone->product_slug)}}">
                                        <img id="wishlist_productimage{{$product_phone->product_id}}" src="{{URL::to('public/uploads/product/'.$product_phone->product_image)}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a>ID sản phẩm: {{$product_phone->product_id}}</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" id="wishlist_producturl{{$product_phone->product_id}}" href="{{URL::to('/chi-tiet-san-pham',$product_phone->product_slug)}}">{{$product_phone->product_name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">Giá: {{number_format($product_phone->product_price,0,',','.')}}VNĐ</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active add-to-cart" name="add-to-cart" data-id_product="{{$product_phone->product_id}}" ><a>Thêm gio hàng</a></li>
                                            <li><a class="links-details wishlist" id="{{$product_phone->product_id}}" onclick="add_wistlist(this.id);"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a title="Xem nhanh" name="add-to-cart" class="quick-view-btn xemnhanh" data-id_product="{{$product_phone->product_id}}" data-toggle="modal" data-target="#xemnhanh"><i class="fa fa-eye"></i></a></li>
                                            <p><br></p>
                                            <li style="width:195px; cursor: point" class="add-cart active" name="add_check" onclick="add_compare({{$product_phone->product_id}})"><a>So sánh</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                            </form>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<!-- Begin Li's Laptop Product Area -->
<section class="product-area li-laptop-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>LAPTOP, PC, MÀN HÌNH
                        </span>
                    </h2>
                    {{-- <ul class="li-sub-category-list">
                        <li class="active"><a href="shop-left-sidebar.html">Prime Video</a></li>
                        <li><a href="shop-left-sidebar.html">Computers</a></li>
                        <li><a href="shop-left-sidebar.html">Electronics</a></li>
                    </ul> --}}
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($all_product_laptop as $key => $product_lap)

                        <div class="col-lg-12">
                            <form>
                                @csrf
                                <input type="hidden" value="{{$product_lap->product_id}}" class="cart_product_id_{{$product_lap->product_id}}" >
                                <input type="hidden" id="wishlist_productname{{$product_lap->product_id}}" value="{{$product_lap->product_name}}" class="cart_product_name_{{$product_lap->product_id}}">
                                <input type="hidden" value="{{$product_lap->product_image}}" class="cart_product_image_{{$product_lap->product_id}}">
                                <input type="hidden" id="wishlist_productprice{{$product_lap->product_id}}" value="{{$product_lap->product_price}}" class="cart_product_price_{{$product_lap->product_id}}">
                                <input type="hidden" value="1" class="cart_product_qty_{{$product_lap->product_id}}">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{URL::to('/chi-tiet-san-pham',$product_lap->product_slug)}}">
                                        <img id="wishlist_productimage{{$product_lap->product_id}}" src="{{URL::to('public/uploads/product/'.$product_lap->product_image)}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a>ID sản phẩm: {{$product_lap->product_id}}</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" id="wishlist_producturl{{$product_lap->product_id}}" href="{{URL::to('/chi-tiet-san-pham',$product_lap->product_slug)}}">{{$product_lap->product_name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">Giá: {{number_format($product_lap->product_price,0,',','.')}}VNĐ</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active add-to-cart" name="add-to-cart" data-id_product="{{$product_lap->product_id}}" ><a>Thêm giỏ hàng</a></li>
                                            <li><a class="links-details wishlist" id="{{$product_lap->product_id}}" onclick="add_wistlist(this.id);"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a title="Xem nhanh" name="add-to-cart" class="quick-view-btn xemnhanh" data-id_product="{{$product_lap->product_id}}" data-toggle="modal" data-target="#xemnhanh"><i class="fa fa-eye"></i></a></li>
                                            <p><br></p>
                                            <li style="width:195px; cursor: point" class="add-cart active" name="add_check" onclick="add_compare({{$product_lap->product_id}})"><a>So sánh</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                            </form>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<!-- Li's Laptop Product Area End Here -->
<!-- Begin Li's TV & Audio Product Area -->
<section class="product-area li-laptop-product li-tv-audio-product pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>TABLET</span>
                    </h2>
                    {{-- <ul class="li-sub-category-list">
                        <li class="active"><a href="shop-left-sidebar.html">Chamcham</a></li>
                        <li><a href="shop-left-sidebar.html">Sanai</a></li>
                        <li><a href="shop-left-sidebar.html">Meito</a></li>
                    </ul> --}}
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($all_product_table as $key => $product_tab)

                        <div class="col-lg-12">
                            <form>
                                @csrf
                                <input type="hidden" value="{{$product_tab->product_id}}" class="cart_product_id_{{$product_tab->product_id}}" >
                                <input type="hidden" id="wishlist_productname{{$product_tab->product_id}}" value="{{$product_tab->product_name}}" class="cart_product_name_{{$product_tab->product_id}}">
                                <input type="hidden" value="{{$product_tab->product_image}}" class="cart_product_image_{{$product_tab->product_id}}">
                                <input type="hidden" id="wishlist_productprice{{$product_tab->product_id}}" value="{{$product_tab->product_price}}" class="cart_product_price_{{$product_tab->product_id}}">
                                <input type="hidden" value="1" class="cart_product_qty_{{$product_tab->product_id}}">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{URL::to('/chi-tiet-san-pham',$product_tab->product_slug)}}">
                                        <img id="wishlist_productimage{{$product_tab->product_id}}" src="{{URL::to('public/uploads/product/'.$product_tab->product_image)}}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a>ID sản phẩm: {{$product_tab->product_id}}</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" id="wishlist_producturl{{$product_tab->product_id}}" href="{{URL::to('/chi-tiet-san-pham',$product_tab->product_slug)}}">{{$product_tab->product_name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">Giá: {{number_format($product_tab->product_price,0,',','.')}}VNĐ</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active add-to-cart" name="add-to-cart" data-id_product="{{$product_tab->product_id}}" ><a>Thêm giỏ hàng</a></li>
                                            <li><a class="links-details wishlist" id="{{$product_tab->product_id}}" onclick="add_wistlist(this.id);"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a title="Xem nhanh" name="add-to-cart" class="quick-view-btn xemnhanh" data-id_product="{{$product_tab->product_id}}" data-toggle="modal" data-target="#xemnhanh"><i class="fa fa-eye"></i></a></li>
                                            <p><br></p>
                                            <li style="width:195px; cursor: point" class="add-cart active" name="add_check" onclick="add_compare({{$product_tab->product_id}})"><a>So sánh</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                            </form>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<!-- Li's TV & Audio Product Area End Here -->
<!-- Begin Li's Static Home Area -->
{{-- <div class="li-static-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Static Home Image Area -->
                <div class="li-static-home-image"></div>
                <!-- Li's Static Home Image Area End Here -->
                <!-- Begin Li's Static Home Content Area -->
                <div class="li-static-home-content">
                    <p>Sale Offer<span>-20% Off</span>This Week</p>
                    <h2>Featured Product</h2>
                    <h2>Meito Accessories 2018</h2>
                    <p class="schedule">
                        Starting at
                        <span> 500K</span>
                    </p>
                    <div class="default-btn">
                        <a href="" class="links">Shopping Now</a>
                    </div>
                </div>
                <!-- Li's Static Home Content Area End Here -->
            </div>
        </div>
    </div>
</div> --}}
<!-- Li's Static Home Area End Here -->
<!-- Begin Li's Trending Product Area -->

<!-- Li's Trending Product Area End Here -->
<!-- Begin Li's Trendding Products Area -->


<!-- Trigger the modal with a button -->



@endsection

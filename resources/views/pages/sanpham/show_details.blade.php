@extends("layout")
@section("content")
<!-- =====  CONTAINER START  ===== -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li class="active">Chi tiết sản phẩm</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- content-wraper start -->
@foreach($product_details as $key => $product)
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
               <!-- Product Details Left -->
               @foreach($product_images as $key => $images)
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="product image">
                            </a>
                        </div>
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                <img src="{{URL::to('public/uploads/product_img/'.$images->product_image_1)}}" alt="product image">
                            </a>
                        </div>
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                <img src="{{URL::to('public/uploads/product_img/'.$images->product_image_2)}}" alt="product image">
                        </div>
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                <img src="{{URL::to('public/uploads/product_img/'.$images->product_image_3)}}" alt="product image">
                            </a>
                        </div>
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                <img src="{{URL::to('public/uploads/product_img/'.$images->product_image_4)}}" alt="product image">
                            </a>
                        </div>
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                <img src="{{URL::to('public/uploads/product_img/'.$images->product_image_5)}}" alt="product image">
                            </a>
                        </div>
                    </div>
                    <div class="product-details-thumbs slider-thumbs-1">
                        <div class="sm-image"><img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="product image thumb"></div>
                        <div class="sm-image"><img src="{{URL::to('public/uploads/product_img/'.$images->product_image_1)}}" alt="product image thumb"></div>
                        <div class="sm-image"><img src="{{URL::to('public/uploads/product_img/'.$images->product_image_2)}}" alt="product image thumb"></div>
                        <div class="sm-image"><img src="{{URL::to('public/uploads/product_img/'.$images->product_image_3)}}" alt="product image thumb"></div>
                        <div class="sm-image"><img src="{{URL::to('public/uploads/product_img/'.$images->product_image_4)}}" alt="product image thumb"></div>
                        <div class="sm-image"><img src="{{URL::to('public/uploads/product_img/'.$images->product_image_5)}}" alt="product image thumb"></div>

                    </div>
                </div>
                @endforeach
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2>{{$product->product_name}}</h2>
                        <span class="product-details-ref">Danh mục sản phẩm: {{$product->category_id}}</span><br>
                        <span class="product-details-ref">Thương hiệu sản phẩm: {{$product->brand_id}}</span><br>
                        <span class="product-details-ref">ID sản phẩm: {{$product->product_id}}</span>
                        <style type="text/css">
                            a.tags_style {
                                margin: 3px 2px;
                                border: 1px solid;

                                height: auto;
                                background: #7a7a7a;
                                color: #ffff;
                                padding: 0px;

                            }
                            a.tags_style:hover {
                                background: black;
                            }
                        </style>
                        <fieldset>
                            <span class="product-details-ref"><br>Tag sản phẩm: </span>
                            <p><i class="fa fa-tag"></i>
                                @php
                                    $tags = $product->product_tags;
                                    $tags = explode(",",$tags);

                                @endphp
                                    @foreach($tags as $tag)
                                    <a href="{{url('/tag/'.Str::slug($tag))}}" class="tags_style">{{$tag}}</a>
                                    @endforeach
                            </p>
                        </fieldset>
                        <div class="rating-box pt-20">
                            <ul class="rating rating-with-review-item">
                                <span style="font-size:25px"> {{$rating}}. </span>
                                @for($count=1; $count<=5; $count++)
                                                		@php
	                                                		if($count<=$rating){
	                                                			$color = 'color:#ffcc00;';
	                                                		}
	                                                		else {
	                                                			$color = 'color:#ccc;';
	                                                		}

                                                		@endphp
                                <li title="star_rating" id="{{$product->product_id}}-{{$count}}" data-index="{{$count}}"  data-product_id="{{$product->product_id}}" data-rating="{{$rating}}" class="rating" style="cursor:pointer; {{$color}} font-size:30px;">&#9733;</li>
                                @endfor
                            </ul>
                        </div>
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">{{number_format((int)$product->product_price).' VNĐ'}}</span>
                        </div>
                        <div class="product-desc">
                            <p>
                                <span>{!!$product->product_desc!!}
                                </span>
                            </p>
                        </div>
                        <div class="product-variants">
                            <div class="produt-variants-size">
                                <label>Dimension</label>
                                <select class="nice-select">
                                    <option value="1" title="S" selected="selected">40x60cm</option>
                                    <option value="2" title="M">60x90cm</option>
                                    <option value="3" title="L">80x120cm</option>
                                </select>
                            </div>
                        </div>
                        <div class="single-add-to-cart ">
                            <form action="#" class="cart-quantity" method="POST">
                                @csrf
                                <div class="quantity">
                                    <label>Số lượng:</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart_product_qty_{{$product->product_id}}" name="qty" min="1" value="1" type="number">
                                        <input class="cart_product_id_{{$product->product_id}}" type="hidden" value="{{$product->product_id}}">
                                        <input class="cart_product_name_{{$product->product_id}}" type="hidden" value="{{$product->product_name}}">
                                        <input class="cart_product_image_{{$product->product_id}}" type="hidden" value="{{$product->product_image}}">
                                        <input class="cart_product_price_{{$product->product_id}}" type="hidden" value="{{$product->product_price}}">
                                        <input class="cart_product_quantity_{{$product->product_id}}" type="hidden" value="{{$product->product_quantity}}">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <button class="add-to-cart add-to-cart" name="add-to-cart" data-id_product="{{$product->product_id}}" type="button">Thêm vào giỏ hàng</button>
                            </form>
                        </div>
                        <div class="product-additional-info pt-25">
                            <a class="wishlist-btn" href=""><i class="fa fa-heart-o"></i>Add to wishlist</a>
                            <div class="product-social-sharing pt-25">
                                <ul>
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                    <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="block-reassurance">
                            <ul>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-check-square-o"></i>
                                        </div>
                                        <p>Chính sách bảo mật (không chia sẻ thông tin cá nhân của khách hàng)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <p>Chính sách giao hàng (giao hàng nhanh chóng, thuận tiện)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-exchange"></i>
                                        </div>
                                        <p>Chính sách hoàn trả (đổi mới hoàn toàn nếu có lỗi từ nhà sản xuất)</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wraper end -->
<!-- Begin Product Area -->
<div class="product-area pt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                       <li><a class="active" data-toggle="tab" href="#description"><span>Mô tả sản phẩm</span></a></li>
                       <li><a data-toggle="tab" href="#product-details"><span>Chi tiết sản phẩm</span></a></li>
                       <li><a data-toggle="tab" href="#reviews"><span>Đánh giá</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="description" class="tab-pane active show" role="tabpanel">
                <div class="product-description">
                    <span>{!!$product->product_desc!!}</span>
                </div>
            </div>
            <div id="product-details" class="tab-pane" role="tabpanel">
                <div class="product-details-manufacturer">
                    {{-- <a href="#">
                        <img src="images/product-details/1.jpg" alt="Product Manufacturer Image">
                    </a>
                    <p><span>{!!$value->product_content!!}</span> demo_7</p>
                    <p><span>Reference</span> demo_7</p> --}}
                    <span>{!!$product->product_content!!}</span>
                </div>
            </div>
            <div id="reviews" class="tab-pane" role="tabpanel">
                <div class="product-reviews">
                    <div class="product-details-comment-block">
                        <div class="comment-review">
                            <span>Đánh giá được {{$rating}}/5☆  </span>
                            <ul class="rating">
                                @for($count=1; $count<=5; $count++)
                                                		@php
	                                                		if($count<=$rating){
	                                                			$color = 'color:#ffcc00;';
	                                                		}
	                                                		else {
	                                                			$color = 'color:#ccc;';
	                                                		}

                                                		@endphp
                                <li title="star_rating" id="{{$product->product_id}}-{{$count}}" data-index="{{$count}}"  data-product_id="{{$product->product_id}}" data-rating="{{$rating}}" class="rating" style="cursor:pointer; {{$color}} font-size:30px;">&#9733;</li>
                                @endfor
                            </ul>
                        </div>
                        <form>
                            @csrf
                            <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$product->product_id}}">
                            <div class="li-comment-section">
                                <br>
                                <h3>Bình luận: </h3>
                                <ul>
                                    <div id="comment_show"></div>

                                </ul>
                            </div>
                        </form>
                        <div class="review-btn">
                            <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Viết đánh giá của bạn</a>
                        </div>
                        <!-- Begin Quick View | Modal Area -->
                        <div class="modal fade modal-wrapper" id="mymodal" >
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h3 class="review-page-title">Viết đánh giá của ban</h3>
                                        <div class="modal-inner-area row">
                                            <div class="col-lg-6">
                                               <div class="li-review-product">
                                                   <img width="300px" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="product image">
                                                   <div class="li-review-product-desc">
                                                       <p class="li-product-name">{{$product->product_name}}</p>
                                                       <p>
                                                           <span>{!!$product->product_desc!!}</span>
                                                       </p>
                                                   </div>
                                               </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="li-review-content">
                                                    <!-- Begin Feedback Area -->
                                                    <div class="feedback-area">
                                                        <div class="feedback">
                                                            <h3 class="feedback-title">Đánh giá sản phẩm</h3>
                                                            <form action="" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$product->product_id}}">
                                                                <p class="your-opinion">
                                                                    <label>Đánh giá sao</label>
                                                                    <span>
                                                                        <li title="star_rating" id="{{$product->product_id}}-{{$count}}" data-index="{{$count}}"  data-product_id="{{$product->product_id}}" data-rating="{{$rating}}" class="rating" style="cursor:pointer; {{$color}} font-size:30px;">&#9733;</li>
                                                                    </span>
                                                                </p>
                                                                <p class="feedback-form">
                                                                    <label for="feedback">Đánh giá của bạn</label>
                                                                    <textarea id="feedback" class="comment_content" name="comment_content" cols="45" rows="8" aria-required="true"></textarea>
                                                                </p>
                                                                <div class="feedback-input">
                                                                    <p class="feedback-form-author">
                                                                        <label for="author">Họ tên bạn<span class="required">*</span>
                                                                        </label>
                                                                        <input id="author" class="comment_name" name="comment_name" value="" size="30" aria-required="true" type="text">
                                                                    </p>
                                                                    <div class="feedback-btn pb-15">
                                                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">Đóng</a>

                                                                        <button style="background-color: black; color:#ffffff;" class="send-comment" name="send-comment"  type="button">Gửi đánh giá</button>
                                                                    </div>
                                                                    <div id="notify_comment"></div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- Feedback Area End Here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Quick View | Modal Area End Here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Product Area End Here -->
<!-- Begin Li's Laptop Product Area -->
<section class="product-area li-laptop-product pt-30 pb-50">

    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Các sản phẩm khác cùng thư mục:</span>
                    </h2>
                </div>
                <div class="row">

                    <div class="product-active owl-carousel">
                        @foreach($relate as $key => $lienquan)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{URL::to('/chi-tiet-san-pham',$lienquan->product_slug)}}">
                                        <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="{{($lienquan->product_name)}}">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="">ID sản phẩm: {{$lienquan->product_id}}</a>
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
                                        <h4><a class="product_name" href="{{URL::to('/chi-tiet-san-pham',$lienquan->product_slug)}}">{{$lienquan->product_name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">{{number_format((int)$lienquan->product_price).' VNĐ'}}</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                            <li><a class="links-details" href=""><i class="fa fa-heart-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
@endsection


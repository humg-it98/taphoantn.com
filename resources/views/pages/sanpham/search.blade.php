@extends("layout")
@section("content")

<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li class="active">Tìm kiếm</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Banner Area -->
                <div class="single-banner shop-page-banner">
                    <a href="#">
                        <img src="{{asset('public/frontend/images/bg-banner/2.jpg')}}" alt="Li's Static Banner">
                    </a>
                </div>
                <!-- Li's Banner Area End Here -->
                <!-- shop-top-bar start -->
                <div class="shop-top-bar mt-30">
                    <div class="shop-bar-inner">
                        <div class="product-view-mode">
                            <!-- shop-item-filter-list start -->
                            <ul class="nav shop-item-filter-list" role="tablist">
                                <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                            </ul>
                            <!-- shop-item-filter-list end -->
                        </div>
                        <div class="toolbar-amount">
                            <span>Hiển thị {{count($search_product)}} sản phẩm. </span>
                        </div>
                    </div>
                    <!-- product-select-box start -->
                    <div class="product-select-box">
                        <form>
                            @csrf
                            <div class="product-short">
                                <p style="width:180px">Sắp xếp theo:</p>
                                <select class="sort" name="sort" id="sort">
                                    <option value="{{Request::url()}}?sort_by=none">Mặc định</option>
                                    <option value="{{Request::url()}}?sort_by=kytu_az">Tên (A - Z)</option>
                                    <option value="{{Request::url()}}?sort_by=kytu_za">Tên (Z - A)</option>
                                    <option value="{{Request::url()}}?sort_by=tang_dan">Gía tăng dần (Thấp-&gt;Cao)</option>
                                    <option value="{{Request::url()}}?sort_by=giam_dan">Giá giảm dần (Cao-&gt;Thấp )</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <!-- product-select-box end -->
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row">
                                    @foreach($search_product as $key => $product)
                                    <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_slug)}}">
                                                    <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="{{($product->product_name)}}">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="">ID sản phẩm: {{($product->product_id)}}</a>
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
                                                    <h4><a class="product_name" href="">{{($product->product_name)}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{number_format((int)$product->product_price).' VNĐ'}}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active" data-id_product="{{$product->product_id}}"><a href="shopping-cart.html">Add to cart</a></li>
                                                        <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                        <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
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

                        <div class="paginatoin-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <p>Hiển thị {{count($search_product)}} sản phẩm. </p>
                                </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul class="pagination-box">
                                        {{$search_product->links('pagination::bootstrap-4') }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
        </div>
    </div>
</div>

@endsection

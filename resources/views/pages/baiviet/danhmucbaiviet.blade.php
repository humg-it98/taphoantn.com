@extends("layout")
@section("content")

<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Bài viết</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Main Blog Page Area -->
<div class="li-main-blog-page pt-60 pb-55">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Blog Sidebar Area -->
            <div class="col-lg-3 order-lg-1 order-2">
                <div class="li-blog-sidebar-wrapper">
                    <div class="li-blog-sidebar">
                        <div class="li-sidebar-search-form">
                            <form action="#">
                                <input type="text" class="li-search-field" placeholder="search here">
                                <button type="submit" class="li-search-btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="li-blog-sidebar pt-25">
                        <h4 class="li-blog-sidebar-title"><b>Categories</b></h4>
                        <ul class="li-blog-archive">
                            @foreach($category as $key => $cate)
                            <li><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="li-blog-sidebar">
                        <h4 class="li-blog-sidebar-title"><b>Brand Product</b></h4>
                        <ul class="li-blog-archive">
                            @foreach($brand as $key => $brand)
                            <li><a href="{{URL::to('danh-muc-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="li-blog-sidebar">
                        <h4 class="li-blog-sidebar-title">Recent Post</h4>
                        <div class="li-recent-post pb-30">
                            <div class="li-recent-post-thumb">
                                <a href="blog-details-left-sidebar.html">
                                    <img class="img-full" src="images/product/small-size/3.jpg" alt="Li's Product Image">
                                </a>
                            </div>
                            <div class="li-recent-post-des">
                                <span><a href="blog-details-left-sidebar.html">First Blog Post</a></span>
                                <span class="li-post-date">25.11.2018</span>
                            </div>
                        </div>
                        <div class="li-recent-post pb-30">
                            <div class="li-recent-post-thumb">
                                <a href="blog-details-left-sidebar.html">
                                    <img class="img-full" src="images/product/small-size/2.jpg" alt="Li's Product Image">
                                </a>
                            </div>
                            <div class="li-recent-post-des">
                                <span><a href="blog-details-left-sidebar.html">First Blog Post</a></span>
                                <span class="li-post-date">25.11.2018</span>
                            </div>
                        </div>
                        <div class="li-recent-post pb-30">
                            <div class="li-recent-post-thumb">
                                <a href="blog-details-left-sidebar.html">
                                    <img class="img-full" src="images/product/small-size/5.jpg" alt="Li's Product Image">
                                </a>
                            </div>
                            <div class="li-recent-post-des">
                                <span><a href="blog-details-left-sidebar.html">First Blog Post</a></span>
                                <span class="li-post-date">25.11.2018</span>
                            </div>
                        </div>
                    </div>
                    <div class="li-blog-sidebar">
                        <h4 class="li-blog-sidebar-title">Tags</h4>
                        <ul class="li-blog-tags">
                            <li><a href="#">Gaming</a></li>
                            <li><a href="#">Chromebook</a></li>
                            <li><a href="#">Refurbished</a></li>
                            <li><a href="#">Touchscreen</a></li>
                            <li><a href="#">Ultrabooks</a></li>
                            <li><a href="#">Sound Cards</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Blog Sidebar Area End Here -->
            <!-- Begin Li's Main Content Area -->
            <div class="col-lg-9 order-lg-2 order-1">
                <div class="row li-main-content">

                    @foreach($post_cate as $key => $p)
                    <div class="col-lg-6 col-md-6">
                        <div class="li-blog-single-item pb-25">
                            <div class="li-blog-banner">
                                <a href="{{url('/bai-viet/'.$p->post_slug)}}"><img class="img-full" style="height: 330px;width:400px" src="{{asset('public/uploads/post/'.$p->post_image)}}" alt="{{$p->post_slug}}" alt=""></a>
                            </div>
                            <div class="li-blog-content">
                                <div class="li-blog-details">
                                    <h3 class="li-blog-heading pt-25"><a href="">{{$p->post_title}}</a></h3>
                                    <div class="li-blog-meta">
                                        <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                        <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>
                                        <a class="post-time" href="#"><i class="fa fa-calendar"></i> 11 Tháng 5 2021</a>
                                    </div>
                                    <p>{!!$p->post_desc!!}</p>
                                    <a class="read-more" href="{{url('/bai-viet/'.$p->post_slug)}}">Read More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Begin Li's Pagination Area -->
                    <div class="col-lg-12">
                        <div class="li-paginatoin-area text-center pt-25">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="li-pagination-box">
                                        <li><a class="Previous" href="#">Previous</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a class="Next" href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Pagination End Here Area -->
                </div>
            </div>
            <!-- Li's Main Content Area End Here -->
        </div>
    </div>
</div>

@endsection

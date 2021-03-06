@extends("layout")
@section("content")

<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Chi tiết bài viết</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Main Blog Page Area -->
<div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Blog Sidebar Area -->
                {{-- <div class="col-lg-3 order-lg-1 order-2">
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
                            <h4 class="li-blog-sidebar-title">Categories</h4>

                            <ul class="li-blog-archive">
                                @foreach($category as $key => $cate)
                                <li><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                @endforeach
                            </ul>

                        </div>
                        <div class="li-blog-sidebar">
                            <h4 class="li-blog-sidebar-title">Blog Archives</h4>
                            <ul class="li-blog-archive">
                                <li><a href="#">January (10)</a></li>
                                <li><a href="#">February (08)</a></li>
                                <li><a href="#">March (07)</a></li>
                                <li><a href="#">April (14)</a></li>
                                <li><a href="#">May (10)</a></li>
                                <li><a href="#">June (06)</a></li>
                            </ul>
                        </div>
                        <div class="li-blog-sidebar">
                            <h4 class="li-blog-sidebar-title">Recent Post</h4>
                            <div class="li-recent-post pb-30">
                                <div class="li-recent-post-thumb">
                                    <a href="blog-details.html">
                                        <img class="img-full" src="{{asset('public/frontend/images/product/small-size/3.jpg')}}" alt="Li's Product Image">
                                    </a>
                                </div>
                                <div class="li-recent-post-des">
                                    <span><a href="blog-details.html">First Blog Post</a></span>
                                    <span class="li-post-date">25.11.2018</span>
                                </div>
                            </div>
                            <div class="li-recent-post pb-30">
                                <div class="li-recent-post-thumb">
                                    <a href="blog-details.html">
                                        <img class="img-full" src="{{asset('public/frontend/images/product/small-size/2.jpg')}}" alt="Li's Product Image">
                                    </a>
                                </div>
                                <div class="li-recent-post-des">
                                    <span><a href="blog-details.html">First Blog Post</a></span>
                                    <span class="li-post-date">25.11.2018</span>
                                </div>
                            </div>
                            <div class="li-recent-post pb-30">
                                <div class="li-recent-post-thumb">
                                    <a href="blog-details.html">
                                        <img class="img-full" src="{{asset('public/frontend/images/product/small-size/5.jpg')}}" alt="Li's Product Image">
                                    </a>
                                </div>
                                <div class="li-recent-post-des">
                                    <span><a href="blog-details.html">First Blog Post</a></span>
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
                </div> --}}
            <!-- Li's Blog Sidebar Area End Here -->
            <!-- Begin Li's Main Content Area -->
            <div class="col-lg-9 order-lg-2 order-1">
                <div class="row li-main-content">
                    <div class="col-lg-12">
                        <div class="li-blog-single-item pb-30">
                            <div class="li-blog-banner">
                                <a href="blog-details.html"><img class="img-full" src="{{asset('public/frontend/images/blog-banner/bg-banner.jpg')}}" alt=""></a>
                            </div>
                            <div class="li-blog-content">

                                @foreach($post_by_id as $key => $p)
                                <div class="li-blog-details">
                                    <h3 class="li-blog-heading pt-25"><a href="#">{{$p->post_title}}</a></h3>
                                    <div class="li-blog-meta">
                                        <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                        <a class="comment" href="#"><i class="fa fa-comment-o"></i>{{$p->post_views}}  Lượt xem</a>
                                        <a class="post-time" href="#"><i class="fa fa-calendar"></i>Đăng lúc: {{$p->post_date}} </a>
                                    </div>
                                    <p>{!!$p->post_desc!!}</p>
                                    <!-- Begin Blog Blockquote Area -->
                                    <div class="li-blog-blockquote">
                                        <blockquote>
                                            <p>{!!$p->post_content!!}</p>
                                        </blockquote>
                                    </div>
                                    <!-- Blog Blockquote Area End Here -->
                                    <p>{!!$p->post_content!!} </p>
                                    <div class="li-tag-line">
                                        <h4>tag:</h4>
                                        <a href="#">Headphones</a>,
                                        <a href="#">Video Games</a>,
                                        <a href="#">Wireless Speakers</a>
                                    </div>
                                    <div class="li-blog-sharing text-center pt-30">
                                        <h4>share this post:</h4>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- Begin Li's Blog Comment Section -->
                        <div class="li-comment-section">
                            <h3>03 comment</h3>
                            <ul>
                                <li>
                                    <div class="author-avatar pt-15">
                                        <img src="{{asset('public/frontend/images/product-details/user.png')}}" alt="User">
                                    </div>
                                    <div class="comment-body pl-15">
                                            <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
                                        <h5 class="comment-author pt-15">user</h5>
                                        <div class="comment-post-date">
                                            11 Tháng 5 2021 at 9:30pm
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                    </div>
                                </li>
                                <li class="comment-children">
                                    <div class="author-avatar pt-15">
                                        <img src="{{asset('public/frontend/images/product-details/admin.png')}}" alt="Admin">
                                    </div>
                                    <div class="comment-body pl-15">
                                            <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
                                        <h5 class="comment-author pt-15">admin</h5>
                                        <div class="comment-post-date">
                                            11 Tháng 5 2021 at 9:30pm
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="author-avatar pt-15">
                                        <img src="{{asset('public/frontend/images/product-details/user.png')}}" alt="Admin">
                                    </div>
                                    <div class="comment-body pl-15">
                                        <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
                                        <h5 class="comment-author pt-15">user</h5>
                                        <div class="comment-post-date">
                                            11 Tháng 5 2021 at 9:30pm
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Li's Blog Comment Section End Here -->
                        <!-- Begin Blog comment Box Area -->
                        <div class="li-blog-comment-wrapper">
                            <h3>leave a reply</h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form action="#">
                                <div class="comment-post-box">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>comment</label>
                                            <textarea name="commnet" placeholder="Write a comment"></textarea>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20 mb-xs-20">
                                            <label>Name</label>
                                            <input type="text" class="coment-field" placeholder="Name">
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20 mb-xs-20">
                                            <label>Email</label>
                                            <input type="text" class="coment-field" placeholder="Email">
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20">
                                            <label>Website</label>
                                            <input type="text" class="coment-field" placeholder="Website">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="coment-btn pt-30 pb-sm-30 pb-xs-30 f-left">
                                                <input class="li-btn-2" type="submit" name="submit" value="post comment">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Blog comment Box Area End Here -->
                        <div class="col-md-12">
                            <div class="heading-part text-center mb_10">
                            <h2 class="main_title mt_50">Bài viết liên quan</h2>
                            </div>
                            <div class="related_pro box">
                            <div class="product-layout  product-grid related-pro  owl-carousel mb_50 ">
                                @foreach($related as $key => $post_relate)
                                <a href="{{url('/bai-viet/'.$post_relate->post_slug)}}"><img style="height:250px;width:280px" src="{{asset('public/uploads/post/'.$post_relate->post_image)}}" alt="{{$post_relate->post_slug}}">{{$post_relate->post_title}}</a>
                              @endforeach
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Li's Main Content Area End Here -->
        </div>
    </div>
</div>

@endsection

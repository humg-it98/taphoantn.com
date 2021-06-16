@extends('layout')
@section('content')


<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li class="active">Video</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Main Blog Page Area -->
<div class="li-main-blog-page pt-60 pb-55">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Main Content Area -->
            <div class="col-lg-12">
                <div class="row li-main-content">

                    @foreach($all_video as $key => $video)
                    <div class="col-lg-12">
                        <form>
                            @csrf
                            <div class="li-blog-single-item pb-30">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="li-blog-banner">
                                            <a ><img class="img-full" src="{{asset('public/uploads/videos/'.$video->video_image)}}" alt="{{$video->video_title}}"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="li-blog-content">
                                            <div class="li-blog-details">
                                                <h3 class="li-blog-heading pt-xs-25 pt-sm-25">{{$video->video_title}}</h3>
                                                <div class="li-blog-meta">
                                                    <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                                    <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>
                                                    <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{$video->video_date}}</a>
                                                </div>
                                                <p>{{$video->video_desc}}</p>
                                                <button type="button" class="btn btn-primary watch-video" data-toggle="modal" data-target="#modal_video" id="{{$video->video_id}}">
                                                    Xem video
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endforeach

                    <!-- Begin Li's Pagination Area -->
                    <div class="col-lg-12">
                        <div class="li-paginatoin-area text-center pt-25">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="li-pagination-box">
                                        {!!$all_video->links()!!}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Pagination End Here Area -->
                </div>
            </div>
            <!-- Li's Main Content Area End Here -->
            <div class="modal fade" id="modal_video" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="video_title"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <div id="video_desc"></div>
                      <div id="video_link"></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="close_video" class="btn btn-secondary" data-dismiss="modal">Đóng video</button>

                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection

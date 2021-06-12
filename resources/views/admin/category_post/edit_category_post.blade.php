@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhập danh mục bài viết
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-category-post/'.$category_post->cate_post_id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục bài viết</label>
                                <input type="text" name="category_post_name" value="{{ $category_post->cate_post_name}}" class="form-control" onkeyup="ChangetoSlug();" id="slug" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug danh mục bài viết</label>
                                <input type="text" name="category_post_slug" value="{{ $category_post->cate_post_slug}}" class="form-control" id="exampleInputEmail1" placeholder="Slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục bài viết</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="category_post_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$category_post->cate_post_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị danh mục bài viết</label>
                                  <select name="category_post_status" class="form-control input-sm m-bot15">
                                      @if($category_post->cate_post_status==0)
                                        <option selected value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                      @else
                                        <option value="0">Ân</option>
                                        <option selected value="1">Hiển thị</option>

                                      @endif
                                </select>
                            </div>
                        <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh muc</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>

@endsection

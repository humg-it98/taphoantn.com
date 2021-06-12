@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-images-product')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn sản phẩm</label>
                                <select name="product_images_id" class="form-control input-sm m-bot-15">
                                    @foreach($product as $key => $cate)
                                    <option value="{{$cate->product_id}}">{{$cate->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm 1</label>
                                <input type="file" name="product_image_1" class="form-control" id="exampleInputEmail3" placeholder="Hình ảnh sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm 2</label>
                                <input type="file" name="product_image_2" class="form-control" id="exampleInputEmail3" placeholder="Hình ảnh sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm 3</label>
                                <input type="file" name="product_image_3" class="form-control" id="exampleInputEmail3" placeholder="Hình ảnh sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm 4</label>
                                <input type="file" name="product_image_4" class="form-control" id="exampleInputEmail3" placeholder="Hình ảnh sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm 5</label>
                                <input type="file" name="product_image_5" class="form-control" id="exampleInputEmail3" placeholder="Hình ảnh sản phẩm">
                            </div>

                        <button type="submit" name="add_product" class="btn btn-info">Thêm hình ảnh sản phẩm</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>

@endsection


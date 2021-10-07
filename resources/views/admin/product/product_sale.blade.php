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
                        <form role="form" action="{{URL::to('/save-product-sale')}}" method="post" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1">Giá bán gốc</label>
                                <input type="text" value="{{number_format($cate->product_price)}}" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền số tiền" name="product_price" class="form-control price_format" id="" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sale</label>
                                <input type="text" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền số tiền" name="product_price" class="form-control price_format" id="" placeholder="Tên danh mục">
                            </div>

                        <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>

@endsection


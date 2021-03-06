@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê sản phẩm
      </div>
      <div class="table-responsive">
        <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        <table class="table table-striped b-t b-light" id='myTable'>
          <thead>
            <tr>
              <th>Tên sản phẩm</th>
              <th>Slug sản phẩm</th>
              <th>Số lượng sản phẩm</th>
              <th>Giá nhập sản phẩm</th>
              <th>Giá bán sản phẩm</th>
              <th>Giá sale sản phẩm</th>
              <th>Hình sản phẩm</th>
              <th>Danh mục sản phẩm</th>
              <th>Thương hiệu sản phẩm</th>
              <th>Hiển thị</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @foreach($all_product as $key => $pro)

            <tr>
              <td>{{$pro->product_name}}</td>
              <td>{{$pro->product_slug}}</td>
              <td>{{$pro->product_quantity}}</td>
              <td>{{number_format($pro->price_cost).' đ'}}</td>
              <td>{{number_format($pro->product_price).' đ'}}</td>
              <td>{{number_format($pro->product_sale).' đ'}}</td>
              <td><img src ="public/uploads/product/{{ $pro->product_image}}" heght="100" width="100"></td>
              <td>{{$pro->category_name}} </td>
              <td>{{$pro->brand_name}}</td>
              <td><span class="text-ellipsis">
                  <?php
                  if($pro->product_status==0){
                    ?>
                        <a href="{{URL::to('/inactive-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span>
                    </a>
                    <?php
                    }else{
                    ?>
                      <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                        <?php
                        }
                        ?>
                </span></td>
              <td>
                <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa nó?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                </a>
                <a href="{{URL::to('/them-so-luong/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>

              </td>
            </tr>
             @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

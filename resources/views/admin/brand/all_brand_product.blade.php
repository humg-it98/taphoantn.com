@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê thương hiệu sản phẩm
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
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên thương hiệu</th>
              <th>Hiển thị</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @foreach($all_brand_product as $key => $cate_pro)

            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $cate_pro->brand_name}}</td>
              <td><span class="text-ellipsis">
                  <?php
                  if($cate_pro->brand_status==0){
                    ?>
                        <a href="{{URL::to('/inactive-brand-product/'.$cate_pro->brand_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span>
                    </a>
                    <?php
                    }else{
                    ?>
                      <a href="{{URL::to('/active-brand-product/'.$cate_pro->brand_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                        <?php
                        }
                        ?>
                </span></td>
              <td>
                <a href="{{URL::to('/edit-brand-product/'.$cate_pro->brand_id)}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa nó?')" href="{{URL::to('/delete-brand-product/'.$cate_pro->brand_id)}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                </a>
              </td>
            </tr>
             @endforeach
          </tbody>
        </table>
        <form action="{{url('import-csv')}}" method="POST" enctype="multipart/form-data">
            @csrf

          <input type="file" name="file" accept=".xlsx"><br>

         <input type="submit" value="Import file Excel" name="import_csv" class="btn btn-warning">
        </form>

      <!-----export data---->
         <form action="{{url('export-csv')}}" method="POST">
            @csrf
         <input type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
        </form>

      </div>
    </div>
  </div>
@endsection

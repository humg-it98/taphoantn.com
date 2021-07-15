@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê khách hàng
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
              <th>Tên khách hàng</th>
              <th>Email khách hàng</th>
              <th>SĐT khách hàng</th>
              <th>Xếp loại khách hàng</th>
              <th>Thao tác</th>

            </tr>
          </thead>
          <tbody>
            @foreach($all_customers as $key => $cus)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $cus->customer_name}}</td>
                    <td>{{ $cus->customer_email}}</td>
                    <td>{{ $cus->customer_phone}}</td>
                    <td>@if($cus->customer_vip==1)
                            Khách hàng vip
                            @else
                                Khách hàng bình thường
                            @endif
                    </td>
                        <a href="{{URL::to('/edit-customer/'.$cus->customer_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                        </a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa nó?')" href="{{URL::to('/delete-customer/'.$cus->customer_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-times text-danger text"></i>
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

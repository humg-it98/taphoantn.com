@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê Đối tác
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>  
            </th>
            <th>Tên đối tác</th>
            <th style="width:600px;">Hình ảnh</th>
            <th>Mô tả</th>
            <th>Tình trạng</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_partner as $key => $partner)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $partner->partner_name }}</td>
            <td><img style="background-color: #92a8d1;" src="public/uploads/partner/{{$partner->partner_image }}" height="120" width="250"></td>
            <td>{{ $partner->partner_desc }}</td>
            <td><span class="text-ellipsis">
              <?php
               if($partner->partner_status==0){
                ?>
                <a href="{{URL::to('/unactive-partner/'.$partner->partner_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>
                 <a href="{{URL::to('/active-partner/'.$partner->partner_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>
            <td>
              <a onclick="return confirm('Bạn có chắc là muốn xóa slide này ko?')" href="{{URL::to('/delete-partner/'.$partner->partner_id)}}" class="active styling-edit" ui-toggle-class="">
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

@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
			<style type="text/css">
				p.title_thongke {
				    text-align: center;
				    font-size: 20px;
				    font-weight: bold;
				}
                .small-box {
                    border-radius: .25rem;
                    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
                    display: block;
                    margin-bottom: 20px;
                    position: relative;
                }
                .small-box>.inner {
                    padding: 10px;
                }
                .small-box .icon>i.ion {
                    font-size: 70px;
                    top: 20px;
                }
			</style>

<div class="row">
    <p class="title_thongke">Thống kê tổng sản phẩm bài viết đơn hàng</p>

    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info" >
        <div class="inner">
            <h3> &nbsp; {{$app_order}}</h3>
            <p> Đơn hàng</p>
        </div>
        <a href="{{URL::to('/manage-order')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3> &nbsp; {{$app_customer}}</h3>

          <p>Khách hàng</p>
        </div>
        <a href="{{URL::to('/all-customers')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3> &nbsp; {{$app_product}}</h3>

          <p>Sản phẩm</p>
        </div>
        {{-- <div class="icon">
            <i style="font-size:20px;" class="fa fa-product-hunt"></i>
        </div> --}}
        <a href="{{URL::to('/all-product')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
            <h3> &nbsp; {{$app_post}}</h3>
          <p>Bài viết</p>
        </div>
        {{-- <div class="icon">
            <i style="font-size:20px;" class="fa fa-newspaper-o"></i>
        </div> --}}
        <a href="{{URL::to('/all-post')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
</div>
<br>
<div class="row">
		<p class="title_thongke">Thống kê đơn hàng doanh số</p>

		<form autocomplete="off">
			@csrf

			<div class="col-md-2">
				<p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                <br>
				<input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>

			</div>

			<div class="col-md-2">
				<p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>

			</div>

			<div class="col-md-2">
				<p>
					Lọc theo:
					<select class="dashboard-filter form-control" >
						<option>--Chọn--</option>
						<option value="7ngay">7 ngày qua</option>
						<option value="thangtruoc">tháng trước</option>
						<option value="thangnay">tháng này</option>
						<option value="365ngayqua">365 ngày qua</option>
					</select>
				</p>
			</div>

		</form>

		<div class="col-md-12">
			<div id="chart" style="height: 250px;"></div>
		</div>

</div>

{{-- <div class="row">
    <p class="title_thongke">Thống kê tổng sản phẩm bài viết đơn hàng</p>
    <div class="col-lg-3 col-4">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>150</h3>

          <p>Đơn hàng</p>
        </div>
        <div class="icon">
          <i class="fa fa-shopping-cart"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-shopping-cart"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Khách hàng</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>44</h3>

          <p>Sản phẩm</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Bài viết</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
</div> --}}

<div class="row">
	<style type="text/css">
		table.table.table-bordered.table-dark {
		    background: #32383e;
		}
		table.table.table-bordered.table-dark tr th {
		    color: #fff;
		}
	</style>

<p class="title_thongke">Thống kê truy cập</p>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">Đang online</th>
      <th scope="col">Tổng tháng trước</th>
      <th scope="col">Tổng tháng này</th>
      <th scope="col">Tổng một năm</th>
      <th scope="col">Tổng truy cập</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$visitor_count}}</td>
      <td>{{$visitor_last_month_count}}</td>
      <td>{{$visitor_this_month_count}}</td>
      <td>{{$visitor_year_count}}</td>
      <td>{{$visitors_total}}</td>
    </tr>

  </tbody>
</table>

</div>

<div class="row">

	{{-- <div class="col-md-4 col-xs-12">
		<p class="title_thongke">Thống kê tổng sản phẩm bài viết đơn hàng</p>
		<div id="donut"></div>
	</div> --}}

	<!--------------------------->
    <div class="col-md-4 col-xs-12">
		<h3>Sản phẩm bán chạy</h3>

		<ol class="list_views">
			@foreach($product_sold as $key => $top)
			<li>
				<a target="_blank" href="{{url('/chi-tiet-san-pham/'.$top->product_slug)}}">{{$top->product_name}} | <span style="color:black">{{$top->product_sold}}</span></a>
			</li>
			@endforeach
		</ol>

	</div>

	<div class="col-md-3 col-xs-12">
		<h3>Bài viết xem nhiều</h3>

		<ol class="list_views">
			@foreach($post_views as $key => $post)
			<li>
				<a target="_blank" href="{{url('/bai-viet/'.$post->post_slug)}}">{{$post->post_title}} | <span style="color:black">{{$post->post_views}}</span></a>
			</li>
			@endforeach
		</ol>

	</div>

	<div class="col-md-4 col-xs-12">
		<style type="text/css">
			ol.list_views {
			    margin: 10px 0;
			    color: #fff;
			}
			ol.list_views a {
			    color: orange;
			    font-weight: 400;
			}
		</style>
		<h3>Sản phẩm xem nhiều</h3>

		<ol class="list_views">
			@foreach($product_views as $key => $pro)
			<li>
				<a target="_blank" href="{{url('/chi-tiet-san-pham/'.$pro->product_slug)}}">{{$pro->product_name}} | <span style="color:black">{{$pro->product_views}}</span></a>
			</li>
			@endforeach
		</ol>

	</div>
</div>


</div>

@endsection

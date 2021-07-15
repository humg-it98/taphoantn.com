@extends('layout')
@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="container">
   <div class="row ">
     <!-- =====  BANNER STRAT  ===== -->
     <div class="col-sm-12">
         <br>
       <div class="breadcrumb ptb_20">
            <h4>Xác nhận đơn hàng</h4>
       </div>
       @if(session()->has('message'))
       <div class="alert alert-success">
           {!! session()->get('message') !!}
       </div>
   @elseif(session()->has('error'))
        <div class="alert alert-danger">
           {!! session()->get('error') !!}
       </div>
   @endif
     </div>
     <!-- =====  BREADCRUMB END===== -->
     {{-- <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
       <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
         <div class="nav-responsive">
           <div class="heading-part">
             <h2 class="main_title">Danh mục</h2>
           </div>
            @foreach($category as $key => $cate)
            <ul class="nav  main-navigation collapse in">
                <li><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
            </ul>
            @endforeach
         </div>
         <br>
       </div>
       <div class="left-special left-sidebar-widget mb_50">
         <div class="heading-part mb_20 ">
           <h2 class="main_title">Thương hiệu</h2>
       </div>
           @foreach($brand as $key => $brand)
           <ul class="nav nav-pills nav-stacked">
               <li><a href="{{URL::to('thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
           </ul>
           @endforeach
       </div>
     </div> --}}
     <div class="col-sm-12 col-lg-12 mtb_20">

			<div class="shopper-informations">
				<div class="row">
					<style type="text/css">
						.col-md-6.form-style input[type=text] {
						    margin: 5px 0;
						}
					</style>
                    	<div class="col-sm-12 clearfix">
                            <div class="table-responsive">
                                <br>
                                <form action="{{url('/cap-nhat-gio-hang')}}" method="POST">
                                    @csrf
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr class="cart_menu">
                                            <td class="image">Hình ảnh</td>
                                            <td class="description">Tên sản phẩm</td>
                                            <td class="price">Giá sản phẩm</td>
                                            <td class="quantity">Số lượng</td>
                                            <td class="total">Thành tiền</td>
                                            <td class="ntn">Xóa</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(Session::get('cart')==true)
                                        @php
                                                $total = 0;
                                        @endphp
                                        @foreach(Session::get('cart') as $key => $cart)
                                            @php
                                                $subtotal = $cart['product_price']*$cart['product_qty'];
                                                $total+=$subtotal;
                                            @endphp

                                        <tr>
                                            <td class="cart_product">
                                                <img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="90" alt="{{$cart['product_name']}}" />
                                            </td>
                                            <td class="cart_description">
                                                <h4><a href=""></a></h4>
                                                <p>{{$cart['product_name']}}</p>
                                            </td>
                                            <td class="cart_price">
                                                <p>{{number_format($cart['product_price'],0,',','.')}}đ</p>
                                            </td>
                                            <td class="cart_quantity">
                                                <div class="cart_quantity_button">


                                                    <input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"  >


                                                </div>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price">
                                                    {{number_format($subtotal,0,',','.')}}đ

                                                </p>
                                            </td>
                                            <td class="cart_delete">
                                                <a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>

                                        @endforeach
                                        <tr>
                                            <td><input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm"></td>
                                            <td><a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Xóa tất cả</a></td>
                                            <td>
                                                @if(Session::get('coupon'))
                                                  <a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
                                                @endif
                                            </td>


                                            <td colspan="2">
                                            <li>Tổng tiền: <span>{{number_format($total,0,',','.')}}đ</span></li>
                                            @if(Session::get('coupon'))
                                            <li>

                                                    @foreach(Session::get('coupon') as $key => $cou)
                                                        @if($cou['coupon_condition']==1)
                                                            Mã giảm : {{$cou['coupon_number']}} %

                                                            <p>
                                                                @php
                                                                $total_coupon = ($total*$cou['coupon_number'])/100;

                                                                @endphp
                                                            </p>
                                                            <p>
                                                            @php
                                                                $total_after_coupon = $total-$total_coupon;
                                                            @endphp
                                                            </p>
                                                        @elseif($cou['coupon_condition']==2)
                                                            Mã giảm : {{number_format($cou['coupon_number'],0,',','.')}} k

                                                            <p>
                                                                @php
                                                                $total_coupon = $total - $cou['coupon_number'];

                                                                @endphp
                                                            </p>
                                                            @php
                                                                $total_after_coupon = $total_coupon;
                                                            @endphp
                                                        @endif
                                                    @endforeach



                                            </li>
                                            @endif

                                            @if(Session::get('fee'))
                                            <li>
                                                <a class="cart_quantity_delete" href="{{url('/del-fee')}}"><i class="fa fa-times"></i></a>
                                                Phí vận chuyển: <span>{{number_format(Session::get('fee'),0,',','.')}}đ</span></li>
                                                <?php $total_after_fee = $total + Session::get('fee'); ?>
                                            @endif
                                            <li>Tổng còn:
                                            @php
                                                if(Session::get('fee') && !Session::get('coupon')){
                                                    $total_after = $total_after_fee;
                                                    echo number_format($total_after,0,',','.').'đ';
                                                }elseif(!Session::get('fee') && Session::get('coupon')){
                                                    $total_after = $total_after_coupon;
                                                    echo number_format($total_after,0,',','.').'đ';
                                                }elseif(Session::get('fee') && Session::get('coupon')){
                                                    $total_after = $total_after_coupon;
                                                    $total_after = $total_after + Session::get('fee');
                                                    echo number_format($total_after,0,',','.').'đ';
                                                }elseif(!Session::get('fee') && !Session::get('coupon')){
                                                    $total_after = $total;
                                                    echo number_format($total_after,0,',','.').'đ';
                                                }

                                            @endphp

                                            </li>

                                            <div class="col-md-12">

                                                <div id="paypal-button"></div>
                                                @php
                                                    $vnd_to_usd = $total_after/23020;
                                                @endphp
                                                <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
                                            </div>


                                        </td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td colspan="5"><center>
                                            @php
                                            echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
                                            @endphp
                                            </center></td>
                                        </tr>
                                        @endif
                                    </tbody>



                                </form>
                                    @if(Session::get('cart'))
                                    <tr>
                                            <form method="POST" action="{{url('/check-coupon')}}">
                                                @csrf
                                                <td><input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"></td>
                                                <td><input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá"></td>
                                              </form>
                                    </tr>
                                    @endif

                                </table>

                            </div>
                        </div>
					<div class="col-md-12 clearfix">
						<div class="bill-to">
							<p><h3>Điền thông tin gửi hàng</h3></p>

								<div class="col-md-12 form-style">
									<form method="POST">
										@csrf
										<input type="text"  name="shipping_email" class="shipping_email form-control" placeholder="Điền email"><br>
										<input type="text" name="shipping_name" class="shipping_name form-control" placeholder="Họ và tên người gửi"> <br>
										<input type="text" name="shipping_address" class="shipping_address form-control" placeholder="Địa chỉ gửi hàng"> <br>
										<input type="text" name="shipping_phone" class="shipping_phone form-control" placeholder="Số điện thoại"> <br>
										<textarea name="shipping_notes" class="shipping_notes form-control" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>

										@if(Session::get('fee'))
											<input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
										@else
											<input type="hidden" name="order_fee" class="order_fee" value="25000">
										@endif

										@if(Session::get('coupon'))
											@foreach(Session::get('coupon') as $key => $cou)
												<input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
											@endforeach
										@else
											<input type="hidden" name="order_coupon" class="order_coupon" value="no">
										@endif


                                        <div>
                                            <br>
                                            <h5>Chọn hình thức thanh toán: </h5>
                                        </div>
										{{-- <div class="">
											 <div class="form-group">
			                                    <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
			                                      <select name="payment_select"  class="form-control payment_select">
                                                        <option value="0">Tiền mặt</option>
			                                            <option value="1">Thanh toán online bằng vnpay</option>
                                                        <option value="2">Thanh toán online quốc tế bằng Paypal</option>

			                                    </select>
			                                </div>
										</div> --}}
										<input style="width:360px" type="button" value="Thanh toán bằng tiền mặt" name="send_order" class="btn btn-primary send_order">
                                        <input style="width:360px" type="button" value="Thanh toán bằng VNPAY" name="sent_vnpay" class="btn btn-primary sent_vnpay">
                                        <input style="width:360px" type="button" value="Thanh toán bằng Paypal" name="sent_paypal" class="btn btn-primary sent_paypal">
									</form>
                                    <br>
								</div>




						</div>
					</div>


				</div>
			</div>
           </form>
       </div>
     </div>
   </div>
  </div>
</div>
 <!-- =====  CONTAINER END  ===== -->

@endsection


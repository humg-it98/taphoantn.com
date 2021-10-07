@extends('layout')
@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="">Home</a></li>
                <li class="active">Gio Hang</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {!! session()->get('message') !!}
            </div>
        @elseif(session()->has('error'))
                <div class="alert alert-danger">
                {!! session()->get('error') !!}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="coupon-accordion">
                    <!--Accordion Start-->
                    @if(!Session::get('customer_id'))
                    <h3>Bạn chưa đăng nhập? <span id="showlogin">Vui lòng đăng nhập để hoàn thành đơn hàng!</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text"> Buôn có bạn, bán có phường. Gặp nhau là cái duyên... Chào nhau qua lại biết đâu ta là khách hàng của nhau...</p>
                            <form id="login-form" action="{{URL::to('/login-customer')}}" method="POST" >
                                @csrf
                                <p class="form-row-first">
                                    <label>Nhập email của bạn<span class="required">*</span></label>
                                    <input name="user_email" type="email">
                                </p>
                                <p class="form-row-last">
                                    <label>Mật khẩu  <span class="required">*</span></label>
                                    <input name="user_password" id="password" type="password">
                                </p>
                                <p class="form-row">
                                    <input value="Đăng nhập" type="submit">
                                    <label>
                                        <input type="checkbox">
                                         Ghi nhớ
                                    </label>
                                </p>
                                <p class="lost-password"><a href="{{url('/quen-mat-khau')}}">Quên mật khẩu?</a></p>
                            </form>
                        </div>
                    </div>
                    @endif
                    <!--Accordion End-->
                    <!--Accordion Start-->
                    <h3>Bạn có mã giảm giá? <span id="showcoupon">Chọn vào đây để nhập mã giảm giá!</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form method="POST" action="{{url('/check-coupon')}}">
                                @csrf
                                <p class="checkout-coupon">
                                    <input placeholder="Coupon code" name="coupon" type="text">
                                    <input value="Áp dụng" type="submit">
                                </p>
                            </form>
                        </div>
                    </div>
                    <!--Accordion End-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="{{URL::to('/thanh-toan-vnpay')}}" method="POST">
                    @csrf
                    <div class="checkbox-form">
                        <h3>Thông tin hóa đơn</h3>
                        <div class="row">
                            <form>
                                @csrf
                                <div class="col-md-12">
                                    <div class="country-select clearfix">
                                        <label>Chọn thành phố bạn ở <span class="required">*</span></label>
                                        <select name="city" id="city" class="form-control choose city">
                                            @foreach($city as $key => $ci)
                                            <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="country-select clearfix">
                                        <label>Chọn quận huyện <span class="required">*</span></label>
                                        <select name="province" id="province" class="form-control province choose">
                                            <option value="">--Chọn quận huyện--</option>
                                        </select>
                                    </div>
                                    <div class="country-select clearfix">
                                        <label>Chọn xã phường <span class="required">*</span></label>
                                        <select name="wards" id="wards" class="form-control wards">
                                            <option value="">--Chọn xã phường--</option>
                                        </select>
                                    </div>
                                    <input type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">
                                </div>
                            </form>
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
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <br>
                                    <label>Họ và tên người nhận <span class="required">*</span></label>
                                    <input name="shipping_name" class="shipping_name form-control" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <br>
                                    <label>SĐT của người nhận hàng  <span class="required">*</span></label>
                                    <input name="shipping_phone" class="shipping_phone form-control" placeholder="" type="phone">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ email <span class="required">*</span></label>
                                    <input name="shipping_email" class="shipping_email form-control" placeholder="" type="email">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <br>
                                    <label>Last Name <span class="required">*</span></label>
                                    <input placeholder="" type="text">
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Nhập địa chỉ nhận chi tiết của bạn<span class="required">*</span></label>
                                    <input type="text" name="shipping_address" class="shipping_address form-control" placeholder="" type="text">
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                   <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                     <select name="payment_select"  class="form-control payment_select">
                                        <option value="0">Tiền mặt</option>
                                        <option value="1">Qua VNPay</option>
                                        <option value="2">Paypal</option>
                                   </select>
                               </div>
                           </div> --}}
                            {{-- <div class="col-md-12">
                                <div class="checkout-form-list create-acc">
                                    <input id="cbox" type="checkbox">
                                    <label>Create an account?</label>
                                </div>
                                <div id="cbox-info" class="checkout-form-list create-account">
                                    <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                    <label>Account password  <span class="required">*</span></label>
                                    <input placeholder="password" type="password">
                                </div>
                            </div> --}}
                        </div>
                        <div class="different-address">
                            <div class="ship-different-title">
                                <h4>
                                    <label>Bạn muốn giao đến địa chỉ khác?</label>
                                    <input id="ship-box" type="checkbox">
                                </h4>
                            </div>
                            <div id="ship-box-info" class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <br>
                                        <label>Họ và tên người nhận <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <br>
                                        <label>SĐT của người nhận hàng  <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Địa chỉ email <span class="required">*</span></label>
                                        <input placeholder="" type="email">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <br>
                                        <label>Last Name <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Địa chỉ chi tiết <span class="required">*</span></label>
                                        <input placeholder="Nhập địa chỉ của bạn tại đây..." type="text">
                                    </div>
                                </div>

                            </div>
                            <div class="order-notes">
                                <div class="checkout-form-list">
                                    <label>Ghi chú đơn hàng của bạn</label>
                                    <textarea name="shipping_notes" class="shipping_notes form-control" id="checkout-mess" cols="30" rows="10" placeholder=""></textarea>
                                </div>
                            </div>
                            <p><strong> Ghi chú: Những trường có dấu * bắt buộc phải điền thông tin </strong><p>
                        </div>
                        <div class="order-button-payment">
                            <button style="width:180px" class="btn btn-purple" name="payment_select" value="0" type="submit"><span>Thanh toán tiền mặt<span></button> &nbsp;&nbsp;
                            <button style="width:200px" class="btn btn-purple" name="payment_select" value="2" type="submit"><span>Thanh toán bằng VNPay<span></button>
                            <button style="width:170px" class="btn btn-purple" name="payment_select" value="1" type="submit" id="paypal-button"></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Đơn hàng của bạn</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Sản phẩm * Số lượng</th>
                                    <th class="cart-product-name">Giá</th>
                                    <th class="cart-product-total">Thành tiền</th>
                                    <th class="cart-product-total">Xóa</th>
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
                                    <tr class="cart_item">
                                        <td class="cart-product-name">{{$cart['product_name']}} × {{$cart['product_qty']}}</td>
                                        <td class="cart-product-total"><span class="amount"><center><strong> &nbsp;&nbsp;&nbsp;{{number_format($cart['product_price'],0,',','.')}}đ </strong></center></span></td>
                                        <td class="cart-product-total"><span class="amount">{{number_format($subtotal,0,',','.')}}đ</span></td>
                                        <td class="cart-product-total"><a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm ra khỏi giỏ hàng này ko?')" class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    @endforeach

                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th></th>
                                    <td><span class="amount">Số tiền tạm tính: </span></td>
                                    <td><span class="amount">{{number_format($total,0,',','.')}}đ</span></td>
                                </tr>
                                @if(Session::get('coupon'))
                                <tr class="cart-subtotal">
                                    <th></th>
                                    <td><span class="amount">Mã giảm giá:</span></td>
                                    @foreach(Session::get('coupon') as $key => $cou)
                                        @if($cou['coupon_condition']==1)
                                            <td>{{$cou['coupon_number']}} % </td>

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
                                            <td>{{number_format($cou['coupon_number'],0,',','.')}} VNĐ </td>

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
                                    <td><a class="cart_quantity_delete" href="{{url('/unset-coupon')}}"><i class="fa fa-times"></i></a></li></td>
                                </tr>
                                @endif
								@if(Session::get('fee'))
                                <tr class="cart-subtotal">
                                    <th></th>
                                    <td><span class="amount">Phí vận chuyển:</span></td>
                                    <td><span class="amount">{{number_format(Session::get('fee'),0,',','.')}}đ</span></td>
                                    <td><a class="cart_quantity_delete" href="{{url('/del-fee')}}"><i class="fa fa-times"></i></a></li></td>
                                    <?php $total_after_fee = $total + Session::get('fee'); ?>
                                </tr>
                                @endif
                                <tr class="cart-subtotal">
                                    <th></th>
                                    <td><span class="amount">Tổng còn:</span></td>

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
                                    <td><span class="amount">{{number_format($total_after,0,',','.').'đ'}}</span></td>
                                    @php
                                        $vnd_to_usd = $total_after/23020;
                                    @endphp
                                    <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
                                </tr>
                            </tfoot>
                            @else
									<tr>
										<td colspan="6"><center>
										@php
										echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
										@endphp
										</center></td>
									</tr>
								@endif
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div id="accordion">
                              <div class="card">
                                <div class="card-header" id="#payment-1">
                                  <h5 class="panel-title">
                                    <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      1. Thanh toán bằng tiền mặt (COD)
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                  <div class="card-body">
                                    <p>Thanh toán khi bạn đã nhận được hàng.</p>
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="#payment-2">
                                  <h5 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                     2. Thanh toán Online bằng VNPay
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                  <div class="card-body">
                                    <p>Thực hiện thanh toán trực tiếp bằng tài khoản ngân hàng của bạn. Vui lòng sử dụng ID đơn hàng của bạn làm tài liệu tham khảo thanh toán. Đơn đặt hàng của bạn sẽ không được vận chuyển cho đến khi chúng tôi nhận được thông báo.</p>
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="#payment-3">
                                  <h5 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      3. Thanh toán quốc tế PayPal
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                  <div class="card-body">
                                    <p>Thực hiện thanh toán quốc tế vào tài khoản ngân hàng. Vui lòng sử dụng ID đơn hàng của bạn làm tài liệu tham khảo thanh toán. Đơn đặt hàng của bạn sẽ được vận chuyển cho đến khi chúng topoi nhận được thông báo.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            {{-- <div class="order-button-payment">
                                <input value="Đặt hàng" type="submit">
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- =====  CONTAINER END  ===== -->

@endsection

@extends("layout")
@section("content")
<!-- =====  CONTAINER START  ===== -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ul>
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
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form enctype="multipart/form-data" method="post" action="{{url('/cap-nhat-gio-hang')}}">
                    @csrf
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Xóa</th>
                                    <th class="li-product-thumbnail">Hình ảnh</th>
                                    <th class="cart-product-name">Sản phẩm</th>
                                    <th class="li-product-price">Giá</th>
                                    <th class="li-product-quantity">Số lượng</th>
                                    <th class="li-product-subtotal">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Session::get('cart')==true)
                                @php
                                    $total = 0;
                                @endphp
                                @foreach(Session::get('cart') as $item => $cart)
                                @php
                                      $subtotal = $cart['product_price']*$cart['product_qty'];
                                      $total += $subtotal;
                                @endphp
                                <tr>
                                    <td class="li-product-remove"><a href="{{url('del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" height="80px" width="80px" alt="{{$cart['product_name']}}"></a></td>
                                    <td class="li-product-name"><a href="">{{$cart['product_name']}}</a></td>
                                    <td class="li-product-price"><span class="amount">{{number_format($cart['product_price']).'VNĐ'}}</span></td>
                                    <td class="quantity">
                                        <label>Số lượng</label>
                                        <div class="cart-plus-minus">
                                            <input name="cart_qty[{{$cart['session_id']}}]" class="cart-plus-minus-box cart_quantity" value="{{$cart['product_qty']}}" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{number_format($subtotal).'VNĐ'}}</span></td>
                                </tr>
                                @endforeach

                            </tbody>
                            @else
                            <tr>
                                <td colspan="6"><center><b>
                                @php
                                echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
                                @endphp
                                </b></center></td>
                            </tr>
                            @endif
                        </table>
                    </div>
                    <div class="row">
                        <form action="{{URL::to('/check-coupon')}}" method="POST">
                            @csrf
                            <div class="col-12">
                                <div class="coupon-all">

                                    <div class="coupon2">
                                        <input class="button" name="update_qty" value="Update cart" type="submit">
                                    </div>
                                    @if(Session::get('coupon'))
                                    <a class="btn btn-default check_out" style="border-radius:20px " href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    @if(Session::get('cart'))
                                        <li>Tạm tính: <span>{{number_format($total).' VNĐ'}}</span></li>
                                        @if(Session::get('coupon'))
                                            @foreach(Session::get('coupon') as $key => $cou)
                                                @if($cou['coupon_condition']==1)
                                                <li>Mã giảm: <span>{{$cou['coupon_number']}} % </span></li>
                                                        @php
                                                        $total_coupon = ($total*$cou['coupon_number'])/100;
                                                        $total_after_coupon = $total-$total_coupon;
                                                        @endphp
                                                @elseif($cou['coupon_condition']==2)
                                                <li>Mã giảm: <span>{{number_format($cou['coupon_number'],0,',','.')}} VNĐ </span></li>
                                                        @php
                                                        $total_coupon = $total - $cou['coupon_number'];
                                                        $total_after_coupon = $total_coupon;
                                                        @endphp
                                                @else
                                                <li>Mã giảm: <span>0 vnđ</span></li>
                                                        @php
                                                        $total_coupon = $total;
                                                        $total_after_coupon = $total_coupon;
                                                        @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                            @if(Session::get('coupon'))
                                            <li>Tổng tiền: <span>{{number_format($total_after_coupon).' VNĐ'}}</span></li>
                                            @else
                                            @php
                                                $total_after_coupon = ($total);
                                            @endphp
                                            <li>Tổng tiền: <span>{{number_format($total).'VNĐ'}}</span></li>
                                            @endif
                                    @else
                                    <li>Tổng tiền: <span> 0 VNĐ</span></li>
                                    @endif


                                </ul>
                                @if(Session::get('customer_id'))
                                <a href="{{URL::to('/checkout')}}">Thanh toán</a>
                                @else
                                <a href="{{URL::to('/dang-nhap')}}">Thanh toán</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{URL::to('/check-coupon')}}" method="POST">
                    @csrf
                    <div class="coupon">
                        <input style="width:300px" id="input-coupon" class="input-text" name="coupon" value="" placeholder="Mã giảm giá" type="text">
                        <input style="border-radius:10px;width=100px" id="button-coupon" class="button" name="apply_coupon" value="Apply coupon" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

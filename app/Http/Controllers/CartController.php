<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Models\City;
use App\Models\CatePost;
use App\Models\Partner;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function add_cart_ajax(Request $request){
        $data = $request->all();

        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
            }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }

        Session::save();

    }
    public function gio_hang(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderBy('cate_post_id','DESC')->where('cate_post_status','0')->get();

        $city = City::orderby('matp','ASC')->get();
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng";
        $meta_title = "Giỏ hàng Ajax";
        $url_canonical = $request->url();

        return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('city',$city)
        ->with('category_post',$category_post);

    }
    public function del_product($session_id){
        $cart = Session::get('cart');
        if (is_iterable($cart))
        {
            foreach ($cart as $key => $val)
            {
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message','Xóa sản phẩm trong giỏ hàng thành công');
        }
        else{
            return redirect()->back()->with('message','Xóa sản phẩm trong giỏ hàng thất bại');
        }
    }
    public function update_cart_ajax(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            $message = '';

            foreach($data['cart_qty'] as $key => $qty){
                $i = 0;
                foreach($cart as $session => $val){
                    $i++;

                    if($val['session_id']==$key){

                        $cart[$session]['product_qty'] = $qty;
                        $message.='<p style="color:blue">'.$i.') Cập nhật số lượng :'.$cart[$session]['product_name'].' thành công</p>';

                    }elseif($val['session_id']==$key && $qty>$cart[$session]['product_quantity']){
                        $message.='<p style="color:red">'.$i.') Cập nhật số lượng :'.$cart[$session]['product_name'].' thất bại</p>';
                    }

                }

            }

            Session::put('cart',$cart);
            return redirect()->back()->with('message',$message);
        }else{
            return redirect()->back()->with('message','Cập nhật số lượng thất bại');
        }

    }
    public function del_all_product(){
        $cart = Session::get('cart');
        if($cart==true){
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa hết giỏ hàng thành công');
        }
    }

    public function save_cart(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $productID = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id', $productID)->first();

        Cart::add([
            'id'        => $product_info->product_id,
            'name'      => $product_info->product_name,
            'qty'       => $quantity,
            'price'     => $product_info->product_price,
            'weight'    => 1,
            'options'   => ['image' => $product_info->product_image]
            ]);
        // dd(Cart::content());
            return Redirect::to('show-cart')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function show_cart(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderBy('cate_post_id','DESC')->where('cate_post_status','1')->get();

        $city = City::orderby('matp','ASC')->get();
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng";
        $meta_title = "Giỏ hàng";
        $url_canonical = $request->url();
        $content = cart::content();
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product)->with('content',$content)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('city',$city)
        ->with('category_post',$category_post);
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return Redirect::to('show-cart')->with('category',$cate_product)->with('brand',$brand_product);

    }
    public function update_cart(Request $request){
        $rowId= $request->rowId_cart;
        $qty = $request->qty;
        Cart::update($rowId,$qty);
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderBy('cate_post_id','DESC')->where('cate_post_status','0')->get();
        return Redirect::to('show-cart')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post);
    }
    public function unset_coupon(){
		$coupon = Session::get('coupon');
        if($coupon==true){
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa mã khuyến mãi thành công');
        }
	}
}

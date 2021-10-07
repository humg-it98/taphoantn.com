<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Models\CatePost;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Rating;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class ProductController extends Controller
{
        public function AuthLogin(){
            $admin_id = Auth::id();
            if($admin_id){
                return Redirect::to('dashboard');
            }else{
                return Redirect::to('admin')->send();
            }
        }
        public function add_product (){
            $this->AuthLogin();
            $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
            return view('admin.product.add_product')->with('cate_product', $cate_product)->with('brand_product',$brand_product);
        }
        public function all_product(){
            $this->AuthLogin();
            $all_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->orderby('tbl_product.product_id','desc')->get();
            $manager_product  = view('admin.product.all_product')->with('all_product',$all_product);
            return view('admin_layout')->with('admin.product.all_product', $manager_product);

        }
        public function save_product(Request $request){
            $this->AuthLogin();
            $data = array();

            $product_price = filter_var($request->product_price, FILTER_SANITIZE_NUMBER_INT);
            $price_cost = filter_var($request->price_cost, FILTER_SANITIZE_NUMBER_INT);

            $data['product_name'] = $request->product_name;
            $data['product_tags'] = $request->product_tags;
            $data['product_quantity'] = $request->product_qty;
            $data['product_price'] = $product_price;
            $data['price_cost'] = $price_cost;
            $data['product_desc'] = $request->product_desc;
            $data['product_slug'] = $request->product_slug;
            $data['product_content'] = $request->product_content;
            $data['category_id'] = $request->product_cate;
            $data['brand_id'] = $request->product_brand;
            $data['product_status'] = $request->product_status;
            $get_image = $request->file('product_image');
            $path = 'public/uploads/product/';

            if($get_image){

                $this->validate($request,
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'product_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'product_image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'product_image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]);
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image.rand(0,99999).'.'.$get_image->getClientOriginalExtension();
                $get_image->move($path,$new_image);
                $data['product_image'] = $new_image;
                DB::table('tbl_product')->insert($data);
                Session::put('message','Thêm sản phẩm thành công');
                return Redirect::to('add-product');
            }
            $data['product_image'] = '';
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('all-product');
        }
        public function inactive_product($product_id){
            $this->AuthLogin();
            DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
            Session::put('message','Khong kich hoat sản phẩm thành cong');
            return Redirect::to('all-product');
        }
        public function active_product($product_id){
            $this->AuthLogin();
            DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
            Session::put('message','Kich hoat sản phẩm thành cong');
            return Redirect::to('all-product');
        }

        public function edit_product($product_id){
            // $this->AuthLogin();
            $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
            $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
            $manager_product = view('admin.product.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
            return view('admin_layout')->with('admin.product.edit_product', $manager_product);
        }


        public function update_product(Request $request, $product_id){
            $this->AuthLogin();
            $data = array();
            $data['product_name'] = $request->product_name;
            $data['product_quantity'] = $request->product_qty;
            $data['product_tags'] = $request->product_tags;
            $data['product_price'] = $request->product_price;
            $data['product_desc'] = $request->product_desc;
            $data['product_slug'] = $request->product_slug;
            $data['product_content'] = $request->product_content;
            $data['category_id'] = $request->product_cate;
            $data['brand_id'] = $request->product_brand;
            $data['product_status'] = $request->product_status;
            $get_image = $request->file('product_image');
            if($get_image){
                        $get_name_image = $get_image->getClientOriginalName();
                        $name_image = current(explode('.',$get_name_image));
                        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                        $get_image->move('public/uploads/product',$new_image);
                        $data['product_image'] = $new_image;
                        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
                        Session::put('message','Cập nhật sản phẩm thành công');
                        return Redirect::to('all-product');
            }
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }


        public function delete_product($product_id){
            $this->AuthLogin();
            DB::table('tbl_product')->where('product_id',$product_id)->delete();
            Session::put('message','Đã xóa sản phẩm thành công');
            return Redirect::to('all-product');
        }
        ///chi tiet sp
        public function details_product(Request $request, $product_slug){
            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
            $category_post = CatePost::orderBy('cate_post_id','DESC')->where('cate_post_status','0')->get();
            $partner = Partner::orderBy('partner_id','DESC')->where('partner_status','0')->take(10)->get();
            $details_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->where('tbl_product.product_slug',$product_slug)->get();

            $product_images = DB::table('tbl_product')
            ->join('tbl_images_product','tbl_images_product.product_id','=','tbl_product.product_id')
            ->where('tbl_images_product.product_id',$details_product[0]->product_id)
            ->get();
            // dd($product_images);
            //seo
            $meta_desc = "Shop Đồng Hồ⌚️ Nam Nữ Hơn 15 Cửa Hàng & 15 Năm Bán Đồng Hồ ️ Casio, Orient, Citizen, DW, Tissot Chính Hãng Bảo Hành 5 Năm⚡ Khuyến Mãi 20%-50 ";
            $meta_keywords = "Đồng Hồ ️ Casio, Orient, Citizen, DW, Tissot Chính Hãng";
            $meta_title = "Shop Đồng Hồ⌚️ Nam Nữ chính hãng.";
            $url_canonical = $request->url();
            //seo
            foreach($details_product  as $key =>$value){
            $category_id = $value-> category_id;
            $product_id = $value-> product_id;
            $category_id = $value->category_id;
            $product_id = $value->product_id;
            $product_cate = $value->category_name;
            $cate_slug = $value->slug_category_product;
            $share_images = url('public/uploads/product/'.$value->product_image);
            }

            $product = Product::where('product_id',$product_id)->first();
            $product->product_views = $product->product_views + 1;
            $product->save();


            $related_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_slug',[$product_slug])->orderby(DB::raw('RAND()'))->paginate(3);

            $rating = Rating::where('product_id',$product_id)->avg('rating');
            $rating = round($rating);



            return view('pages.sanpham.show_details')->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('product_images',$product_images)
            ->with('product_details',$details_product)
            ->with('relate',$related_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('share_images',$share_images)
            ->with('category_post',$category_post)
            ->with('partner',$partner)
            ->with('rating',$rating);
        }

        public function add_images_product (){
            $this->AuthLogin();
            $product = DB::table('tbl_product')->orderby('product_id','desc')->get();
            return view('admin.product.add_images_product')->with('product', $product);
        }
        public function add_product_sale(){
            $this->AuthLogin();
            $product = DB::table('tbl_product')->orderby('product_id','desc')->get();
            return view('admin.product.product_sale')->with('product', $product);
        }

        public function save_images_product(Request $request){
            $this->AuthLogin();
            $data = array();
            $data['product_id'] = $request->product_images_id;
            $get_image_1 = $request->file('product_image_1');
            $get_image_2 = $request->file('product_image_2');
            $get_image_3 = $request->file('product_image_3');
            $get_image_4 = $request->file('product_image_4');
            $get_image_5 = $request->file('product_image_5');

            $path = 'public/uploads/product_img/';

            if($get_image_1||$get_image_2||$get_image_3||$get_image_4||$get_image_5){
                $this->validate($request,
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'product_image_1' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    'product_image_2' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    'product_image_3' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    'product_image_4' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    'product_image_5' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'product_image_1.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'product_image_1.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    'product_image_2.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'product_image_2.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    'product_image_3.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'product_image_3.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    'product_image_4.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'product_image_4.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    'product_image_5.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'product_image_5.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',

                ]);
                $get_name_image_1 = $get_image_1->getClientOriginalName();
                $name_image_1 = current(explode('.',$get_name_image_1));
                $new_image_1 =  $name_image_1.rand(0,99999).'.'.$get_image_1->getClientOriginalExtension();
                $get_image_1->move($path,$new_image_1);
                $data['product_image_1'] = $new_image_1;

                $get_name_image_2 = $get_image_2->getClientOriginalName();
                $name_image_2 = current(explode('.',$get_name_image_2));
                $new_image_2 =  $name_image_2.rand(0,99999).'.'.$get_image_2->getClientOriginalExtension();
                $get_image_2->move($path,$new_image_2);
                $data['product_image_2'] = $new_image_2;

                $get_name_image_3 = $get_image_3->getClientOriginalName();
                $name_image_3 = current(explode('.',$get_name_image_3));
                $new_image_3 =  $name_image_3.rand(0,99999).'.'.$get_image_3->getClientOriginalExtension();
                $get_image_3->move($path,$new_image_3);
                $data['product_image_3'] = $new_image_3;

                $get_name_image_4 = $get_image_4->getClientOriginalName();
                $name_image_4 = current(explode('.',$get_name_image_4));
                $new_image_4 =  $name_image_4.rand(0,99999).'.'.$get_image_4->getClientOriginalExtension();
                $get_image_4->move($path,$new_image_4);
                $data['product_image_4'] = $new_image_4;

                $get_name_image_5 = $get_image_5->getClientOriginalName();
                $name_image_5 = current(explode('.',$get_name_image_5));
                $new_image_5 =  $name_image_5.rand(0,99999).'.'.$get_image_5->getClientOriginalExtension();
                $get_image_5->move($path,$new_image_5);
                $data['product_image_5'] = $new_image_5;


                DB::table('tbl_images_product')->insert($data);
                Session::put('message','Thêm hình ảnh sản phẩm thành công');
                return redirect()->back();
            }
            $data['product_id'] = $request->product_images_id;
            $data['product_image_1'] = '';
            $data['product_image_2'] = '';
            $data['product_image_3'] = '';
            $data['product_image_4'] = '';
            $data['product_image_5'] = '';
            DB::table('tbl_images_product')->insert($data);
            Session::put('message','Thêm hình ảnh sản phẩm thành công');
            return Redirect::to('all-product');
        }
        public function tag(Request $request, $product_tag){

            //category post
           $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
            //slide

           $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
           $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
           $partner = Partner::orderBy('partner_id','DESC')->where('partner_status','0')->take(10)->get();


           $tag = str_replace("", "-",$product_tag);



           $pro_tag = Product::where('product_status',0)->where('product_name','LIKE','%'.$tag.'%')->orWhere('product_tags','LIKE','%'.$tag.'%')->orWhere('product_slug','LIKE','%'.$tag.'%')->paginate(6);



           $meta_desc = 'Tags tìm kiếm::'.$product_tag;
           $meta_keywords = 'Tags tìm kiếm:'.$product_tag;
           $meta_title = 'Tags tìm kiếm:'.$product_tag;
           $url_canonical = $request->url();



           return view('pages.sanpham.tag')->with('partner',$partner)->with('category_post',$category_post)->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('product_tag',$product_tag)->with('pro_tag',$pro_tag);

       }
       public function quickview(Request $request){

        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $gallery = Gallery::where('product_id',$product_id)->get();

        $output['product_gallery'] = '';

        foreach($gallery as $key => $gal){
            $output['product_gallery'].= '<p><img width="100%" src="public/uploads/gallery/'.$gal->gallery_image.'"></p>';
        }

        $output['product_name'] = $product->product_name;
        $output['product_id'] = $product->product_id;
        $output['product_desc'] = $product->product_desc;
        $output['product_content'] = $product->product_content;
        $output['product_price'] = number_format($product->product_price,0,',','.').'VNĐ';
        $output['product_image'] = '<img width="100%" src="public/uploads/product/'.$product->product_image.'">';

        $output['product_button'] = '<button class="add-to-cart add-to-cart" name="add-to-cart" data-id_product="{{$product->product_id}}" type="submit">Thêm vào giỏ hàng</button>';

        $output['product_quickview_value'] = '

        <input class="cart_product_id_{{$product->product_id}}" type="hidden" value="{{$product->product_id}}">
        <input class="cart_product_name_{{$product->product_id}}" type="hidden" value="{{$product->product_name}}">
        <input class="cart_product_image_{{$product->product_id}}" type="hidden" value="{{$product->product_image}}">
        <input class="cart_product_price_{{$product->product_id}}" type="hidden" value="{{$product->product_price}}">
        <input class="cart_product_quantity_{{$product->product_id}}" type="hidden" value="{{$product->product_quantity}}">

        <input type="hidden" value="1" class="cart_product_qty_'.$product->product_id.'">';

        echo json_encode($output);


    }
    public function add_sale(Request $request, $product_id){
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.product.add_sale')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.product.add_sale', $manager_product);
        }
    public function update_qty_product (Request $request, $product_id)
    {
        $data = array();
        $qty = $request->product_qty;
        $ton = $request->product_sale;
        $data['product_quantity'] = $qty + $ton;
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');


    }

}

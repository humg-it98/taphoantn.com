<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Models\CatePost;
use App\Models\Partner;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
        public function AuthLogin(){
            $admin_id = Auth::id();
            if($admin_id){
                return Redirect::to('dashboard');
            }else{
                return Redirect::to('admin')->send();
            }
        }
        public function add_brand_product (){
            $this->AuthLogin();
            return view('admin.brand.add_brand_product');
        }
        public function all_brand_product(){
            $this->AuthLogin();
            $all_brand_product = DB::table('tbl_brand_product')->get();
            $manager_brand_product = view('admin.brand.all_brand_product')->with('all_brand_product',$all_brand_product);
            return view('admin_layout')->with('admin.brand.all_brand_product', $manager_brand_product);
        }
        public function save_brand_product(Request $request){
            $this->AuthLogin();
            $data = array();
            $data['brand_name'] = $request->brand_product_name;
            $data['brand_desc'] = $request->brand_product_desc;
            $data['brand_status'] = $request->brand_product_status;
            $data['brand_slug'] = $request->brand_slug;
            $data['meta_keywords'] = $request->meta_keywords;
            DB::table('tbl_brand_product')->insert($data);
            Session::put('message','Them thương hiệu thành cong');
            return Redirect::to('add-brand-product');
        }
        public function inactive_brand_product($brand_product_id){
            $this->AuthLogin();
            DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
            Session::put('message','Khong kich hoat danh muc thành cong');
            return Redirect::to('all-brand-product');
        }
        public function active_brand_product($brand_product_id){
            $this->AuthLogin();
            DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
            Session::put('message','Kich hoat thương hiệu thành cong');
            return Redirect::to('all-brand-product');
        }

        public function edit_brand_product($brand_product_id){
            $this->AuthLogin();
            $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get();
            $manager_brand_product = view('admin.brand.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
            return view('admin_layout')->with('admin.brand.edit_brand_product', $manager_brand_product);
        }

        public function update_brand_product(Request $request, $brand_product_id){
            $this->AuthLogin();
            $data = array();
            $data['brand_name'] = $request->brand_product_name;
            $data['brand_desc'] = $request->brand_product_desc;
            $data['brand_slug'] = $request->brand_slug;
            DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update($data);
            Session::put('message','Cập nhập thương hiệu thành cong');
            return Redirect::to('all-brand-product');
        }

        public function delete_brand_product($brand_product_id){
            $this->AuthLogin();
            DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->delete();
            Session::put('message','Đã xóa thương hiệu thành cong');
            return Redirect::to('all-brand-product');
        }

        //show sp theo thương hiệu
    public function show_brand_home(Request $request, $brand_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')->where('tbl_product.brand_id',$brand_id)->get();
        $category_post = CatePost::orderBy('cate_post_id','DESC')->where('cate_post_status','0')->get();
        $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id',$brand_id)->limit(1)->get();
        $partner = Partner::orderBy('partner_id','DESC')->where('partner_status','0')->take(10)->get();

        if (empty($brand_by_id)) {
            foreach($brand_by_id as $key=>$val)
            {
                $meta_desc = $val->brand_desc;
                $meta_keywords = $val->meta_keywords;
                $meta_title = $val->brand_name;
                $url_canonical = $request->url();
            }
        } else {
            $band = DB::table('tbl_brand_product')->where('brand_id',$brand_id)->get();
            // dd($category);
            $meta_desc = "Shop Đồng Hồ⌚️ Nam Nữ Hơn 15 Cửa Hàng & 15 Năm Bán Đồng Hồ ️ Casio, Orient, Citizen, DW, Tissot Chính Hãng Bảo Hành 5 Năm⚡ Khuyến Mãi 20%-50 ";
            $meta_keywords = "Đồng Hồ ️ Casio, Orient, Citizen, DW, Tissot Chính Hãng";
            $meta_title = "Shop Đồng Hồ⌚️ Nam Nữ chính hãng.";
            $url_canonical = $request->url();
            // $meta_desc = $band[0]->brand_desc;
            // $meta_keywords = $band[0]->meta_keywords;
            // $meta_title = $band[0]->brand_name;
            // $url_canonical = $request->url();
        }


        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('category_post',$category_post)->with('partner',$partner);
    }

}

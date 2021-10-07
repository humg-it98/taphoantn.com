<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Models\Partner;
use App\Models\CatePost;
use App\Models\Slider;
use App\Models\Product;
use App\Models\CategoryProductModels;
use App\Exports\ExcelExports;
use App\Imports\ExcelImports;
use Session;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
        public function AuthLogin(){
            $admin_id = Auth::id();
            if($admin_id){
                return Redirect::to('dashboard');
            }else{
                return Redirect::to('admin')->send();
            }
        }
        public function add_category_product(){
            $this->AuthLogin();
            $category = CategoryProductModels::where('category_parent',0)->orderBy('category_id','DESC')->get();
            return view('admin.category.add_category_product')->with(compact('category'));
        }
        public function all_category_product(){
            $this->AuthLogin();
            $category_product = CategoryProductModels::where('category_parent',0)->orderBy('category_id','DESC')->get();

            $all_category_product = DB::table('tbl_category_product')->orderBy('category_parent','DESC')->orderBy('category_order','ASC')->get();

            $manager_category_product  = view('admin.category.all_category_product')->with('all_category_product',$all_category_product)->with('category_product',$category_product);

            return view('admin_layout')->with('admin.category.all_category_product', $manager_category_product);


        }
        public function save_category_product(Request $request){
            $this->AuthLogin();
            $data = array();
            $data['category_name'] = $request->category_product_name;
            $data['category_desc'] = $request->category_product_desc;
            $data['category_parent'] = $request->category_parent;
            $data['slug_category_product'] = $request->slug_category_product;
            $data['category_status'] = $request->category_product_status;
            $data['meta_keywords'] = $request->meta_keywords;
            DB::table('tbl_category_product')->insert($data);
            Session::put('message','Them danh muc thanh cong');
            return Redirect::to('add-category-product');
        }
        public function unactive_category_product($category_product_id){
            $this->AuthLogin();
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
            Session::put('message','Khong kich hoat danh muc thanh cong');
            return Redirect::to('all-category-product');
        }
        public function active_category_product($category_product_id){
            $this->AuthLogin();
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
            Session::put('message','Kich hoat danh muc thanh cong');
            return Redirect::to('all-category-product');
        }

        public function edit_category_product($category_product_id){
            $this->AuthLogin();
            $category = CategoryProductModels::where('category_parent',0)->orderBy('category_id','DESC')->get();

            $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
            $manager_category_product = view('admin.category.edit_category_product')->with('edit_category_product',$edit_category_product)->with('category',$category);
            return view('admin_layout')->with('admin.category.edit_category_product', $manager_category_product);
        }

        public function update_category_product(Request $request, $category_product_id){
            $this->AuthLogin();
            $data = array();
            $data['category_name'] = $request->category_product_name;
            $data['category_desc'] = $request->category_product_desc;
            $data['slug_category_product'] = $request->slug_category_product;
            $data['meta_keywords'] = $request->meta_keywords;
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
            Session::put('message','Cập nhập danh muc thanh cong');
            return Redirect::to('all-category-product');
        }

        public function delete_category_product($category_product_id){
            $this->AuthLogin();
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
            Session::put('message','Đã xóa danh muc thanh cong');
            return Redirect::to('all-category-product');
        }
        //show sản phẩm thuộc danh mục trang home
        public function show_category_home(Request $request ,$slug_category_product){
            //category post
            $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
           //slide
            $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

            $category_by_slug = CategoryProductModels::where('slug_category_product',$slug_category_product)->get();

            $min_price = Product::min('product_price');
            $max_price = Product::max('product_price');

            $min_price_range = $min_price + 500000;
            $max_price_range = $max_price + 10000000;

            foreach($category_by_slug as $key => $cate){
                $category_id = $cate->category_id;
            }

            if(isset($_GET['sort_by'])){

                $sort_by = $_GET['sort_by'];

                if($sort_by=='giam_dan'){

                    $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_price','DESC')->paginate(6)->appends(request()->query());

                }elseif($sort_by=='tang_dan'){

                  $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_price','ASC')->paginate(6)->appends(request()->query());

              }elseif($sort_by=='kytu_za'){

               $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_name','DESC')->paginate(6)->appends(request()->query());


           }elseif($sort_by=='kytu_az'){

            $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_name','ASC')->paginate(6)->appends(request()->query());
        }

        }elseif(isset($_GET['start_price']) && $_GET['end_price']){

            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];

            $category_by_id = Product::with('category')->whereBetween('product_price',[$min_price,$max_price])->orderBy('product_price','ASC')->paginate(6);

        }else{
            $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_id','DESC')->paginate(6);
        }


        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.slug_category_product',$slug_category_product)->limit(1)->get();

        foreach($category_name as $key => $val){
                        //seo
            $meta_desc = $val->category_desc;
            $meta_keywords = $val->meta_keywords;
            $meta_title = $val->category_name;
            $url_canonical = $request->url();
                        //--seo
        }


        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('category_post',$category_post)->with('min_price',$min_price)->with('max_price',$max_price)->with('max_price_range',$max_price_range)->with('min_price_range',$min_price_range);
        }
        public function export_csv(){
            return Excel::download(new ExcelExports , 'danh_muc_san_pham.xlsx');
        }
        public function import_csv(Request $request){
            $path = $request->file('file')->getRealPath();
            Excel::import(new ExcelImports, $path);
            return back();
        }
        public function arrange_category(Request $request){
            $this->AuthLogin();

            $data = $request->all();
            $cate_id = $data["page_id_array"];

            foreach($cate_id as $key => $value){
                $category = CategoryProductModels::find($value);
                $category->category_order = $key;
                $category->save();
            }
            echo 'Thay đổi vị trí danh mục thành công ';
            }
}

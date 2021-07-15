<?php

namespace App\Http\Controllers;

use App\Models\Social; //sử dụng model Social
use App\Models\Login; //sử dụng model Login
use Illuminate\Http\Request;
use App\Rules\Captcha;
use Validator;
use Socialite;      //sử dụng Socialite
use DB;
use Session;
use Auth;
use Carbon\Carbon;

use App\Models\Product;
use App\Models\Video;
use App\Models\Customer;
use App\Models\Post;
use App\Models\Statistic;
use App\Models\Visitors;
use App\Models\Order;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(Request $request){
        $this->AuthLogin();
            //get ip address
        $user_ip_address = $request->ip();

        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();

        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $early_this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();

        $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

            //total last month
        $visitor_of_lastmonth = Visitors::whereBetween('date_visitor',[$early_last_month,$end_of_last_month])->get();
        $visitor_last_month_count = $visitor_of_lastmonth->count();

            //total this month
        $visitor_of_thismonth = Visitors::whereBetween('date_visitor',[$early_this_month,$now])->get();
        $visitor_this_month_count = $visitor_of_thismonth->count();

            //total in one year
        $visitor_of_year = Visitors::whereBetween('date_visitor',[$oneyears,$now])->get();
        $visitor_year_count = $visitor_of_year->count();

            //total visitors
        $visitors = Visitors::all();
        $visitors_total = $visitors->count();

            //current online
        $visitors_current = Visitors::where('ip_address',$user_ip_address)->get();
        $visitor_count = $visitors_current->count();

        if($visitor_count<1){
            $visitor = new Visitors();
            $visitor->ip_address = $user_ip_address;
            $visitor->date_visitor = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $visitor->save();
        }

            //total
        $app_product = Product::all()->count();
        $app_post = Post::all()->count();
        $app_order = Order::all()->count();
        $app_video = Video::all()->count();
        $app_customer = Customer::all()->count();

        $product_views = Product::orderBy('product_views','DESC')->take(20)->get();
        $post_views = Post::orderBy('post_views','DESC')->take(20)->get();


        return view('admin.dashboard')->with(compact('visitors_total','visitor_count','visitor_last_month_count','visitor_this_month_count','visitor_year_count','app_product','app_post','app_order','app_video','app_customer','product_views','post_views'));
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();

        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return view('admin.dashboard');
        }else
        {
            Session::put('message','Tai khoan hoac mat khẩu bi sai, vui lòng kiểm tra lai');
            return Redirect::to('/admin');
        }
    }
    public function logout(){

        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');

    }

    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri
            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $ngoc = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => '',

                ]);
            }
            $ngoc->login()->associate($orang);
            $ngoc->save();

            $account_name = Login::where('admin_id',$account->user)->first();

            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }
    }
    public function customer_register(Request $request){

        $data = $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_password' => 'required',
            'customer_address' => 'required',
            'customer_phone' => 'required',
           'g-recaptcha-response' => new Captcha(), 		//dòng kiểm tra Captcha
        ]);

        $customer = new Customer();
        $customer->customer_name = $data['customer_name'];

        $customer->customer_email = $data['customer_email'];
        $customer->customer_phone = $data['customer_phone'];
        $customer->customer_address = $data['customer_address'];
        $customer->customer_password = md5($data['customer_password']);
        $customer->customer_date = now();
        $customer->save();

        return redirect('/dang-nhap')->with('message', 'Đăng ký tài khoản thành công,làm ơn đăng nhập');
    }

    public function login_google(){
        return Socialite::driver('google')->redirect();
    }
    public function callback_google(){
            $users = Socialite::driver('google')->stateless()->user();
            // return $users->id;
            $authUser = $this->findOrCreateUser($users,'google');
            $account_name = Login::where('admin_id',$authUser->user)->first();
            Session::put('admin_login',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');


        }
        public function findOrCreateUser($users,$provider){
            $authUser = Social::where('provider_user_id', $users->id)->first();
            if($authUser){

                return $authUser;
            }

            $ngoc = new Social([
                'provider_user_id' => $users->id,
                'provider' => strtoupper($provider)
            ]);

            $orang = Login::where('admin_email',$users->email)->first();

                if(!$orang){
                    $orang = Login::create([
                        'admin_name' => $users->name,
                        'admin_email' => $users->email,
                        'admin_password' => '',

                        'admin_phone' => '',
                        'admin_status' => 1
                    ]);
                }
            $ngoc->login()->associate($orang);
            $ngoc->save();

            $account_name = Login::where('admin_id',$authUser->user)->first();
            Session::put('admin_login',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');


        }

        public function days_order(){

            $sub60days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString();

            $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

            $get = Statistic::whereBetween('order_date',[$sub60days,$now])->orderBy('order_date','ASC')->get();


            foreach($get as $key => $val){

            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );

        }

        echo $data = json_encode($chart_data);
        }

        public function dashboard_filter(Request $request){

            $data = $request->all();

                // $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
            // $tomorrow = Carbon::now('Asia/Ho_Chi_Minh')->addDay()->format('d-m-Y H:i:s');
            // $lastWeek = Carbon::now('Asia/Ho_Chi_Minh')->subWeek()->format('d-m-Y H:i:s');
            // $sub15days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(15)->format('d-m-Y H:i:s');
            // $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->format('d-m-Y H:i:s');

            $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
            $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
            $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();



            $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
            $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

            $dauthang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(2)->startOfMonth()->toDateString();
            $cuoithang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(2)->endOfMonth()->toDateString();


            $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

            if($data['dashboard_value']=='7ngay'){

                $get = Statistic::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();

            }elseif($data['dashboard_value']=='thangtruoc'){

                $get = Statistic::whereBetween('order_date',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('order_date','ASC')->get();

            }elseif($data['dashboard_value']=='thangnay'){

                $get = Statistic::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();

            }elseif ($data['dashboard_value']=='thang9') {

                $get = Statistic::whereBetween('order_date',[$dauthang9,$cuoithang9])->orderBy('order_date','ASC')->get();

            }else{
                $get = Statistic::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
            }


            foreach($get as $key => $val){

                $chart_data[] = array(
                    'period' => $val->order_date,
                    'order' => $val->total_order,
                    'sales' => $val->sales,
                    'profit' => $val->profit,
                    'quantity' => $val->quantity
                );
            }

            echo $data = json_encode($chart_data);

        }
        public function filter_by_date(Request $request){

            $data = $request->all();

            $from_date = $data['from_date'];
            $to_date = $data['to_date'];

            $get = Statistic::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();


            foreach($get as $key => $val){

                $chart_data[] = array(

                    'period' => $val->order_date,
                    'order' => $val->total_order,
                    'sales' => $val->sales,
                    'profit' => $val->profit,
                    'quantity' => $val->quantity
                );
            }

            echo $data = json_encode($chart_data);

        }
        public function order_date(Request $request){
            $order_date = $_GET['date'];
            $order = Order::where('order_date',$order_date)->orderby('created_at','DESC')->get();
            return view('admin.order_date')->with(compact('order'));
        }


}

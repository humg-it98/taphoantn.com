<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Auth;
use Carbon\Carbon;
use Session;

class CouponController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function check_coupon(Request $request){
        $data = $request->all();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->where('coupon_used','LIKE','%'.Session::get('customer_id').'%')->first();
        if(Session::get('customer_id')){
            $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->where('coupon_used','LIKE','%'.Session::get('customer_id').'%')->first();
            if($coupon){
                return redirect()->back()->with('error','Mã giảm giá đã sử dụng,vui lòng nhập mã khác');
            }else{
                    $coupon_login = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->first();
                        if($coupon_login){
                            $count_coupon = $coupon_login->count();
                            if($count_coupon>0){
                                $coupon_session = Session::get('coupon');
                                if($coupon_session==true){
                                    $is_avaiable = 0;
                                    if($is_avaiable==0){
                                        $cou[] = array(
                                            'coupon_code' => $coupon_login->coupon_code,
                                            'coupon_condition' => $coupon_login->coupon_condition,
                                            'coupon_number' => $coupon_login->coupon_number,

                                        );
                                        Session::put('coupon',$cou);
                                    }
                                }else{
                                    $cou[] = array(
                                        'coupon_code' => $coupon_login->coupon_code,
                                        'coupon_condition' => $coupon_login->coupon_condition,
                                        'coupon_number' => $coupon_login->coupon_number,

                                    );
                                    Session::put('coupon',$cou);
                                }
                                Session::save();
                                return redirect()->back()->with('message','Thêm mã giảm giá thành công');
                            }


                        }else{
                            return redirect()->back()->with('error','Mã giảm giá không đúng - hoặc đã hết hạn');
                        }
                    }
                //neu chua dang nhap
                }else{
                    $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->first();
                    if($coupon){
                        $count_coupon = $coupon->count();
                        if($count_coupon>0){
                            $coupon_session = Session::get('coupon');
                            if($coupon_session==true){
                                $is_avaiable = 0;
                                if($is_avaiable==0){
                                    $cou[] = array(
                                        'coupon_code' => $coupon->coupon_code,
                                        'coupon_condition' => $coupon->coupon_condition,
                                        'coupon_number' => $coupon->coupon_number,

                                    );
                                    Session::put('coupon',$cou);
                                }
                            }else{
                                $cou[] = array(
                                    'coupon_code' => $coupon->coupon_code,
                                    'coupon_condition' => $coupon->coupon_condition,
                                    'coupon_number' => $coupon->coupon_number,

                                );
                                Session::put('coupon',$cou);
                            }
                            Session::save();
                            return redirect()->back()->with('message','Thêm mã giảm giá thành công');
                        }
                    }else{
                        return redirect()->back()->with('error','Mã giảm giá không đúng - hoặc đã hết hạn');
        }

     }
        // if($coupon){
        //     return redirect()->back()->with('error','Mã giảm giá đã sử dụng,vui lòng nhập mã khác');
        // }else{
        //     $count_coupon = $coupon->count();
        //     if($count_coupon>0){
        //         $coupon_session = Session::get('coupon');
        //         if($coupon_session==true){
        //             $is_avaiable = 0;
        //             if($is_avaiable==0){
        //                 $cou[] = array(
        //                     'coupon_code' => $coupon->coupon_code,
        //                     'coupon_condition' => $coupon->coupon_condition,
        //                     'coupon_number' => $coupon->coupon_number,

        //                 );
        //                 Session::put('coupon',$cou);
        //             }
        //         }else{
        //             $cou[] = array(
        //                     'coupon_code' => $coupon->coupon_code,
        //                     'coupon_condition' => $coupon->coupon_condition,
        //                     'coupon_number' => $coupon->coupon_number,

        //                 );
        //             Session::put('coupon',$cou);
        //         }
        //         Session::save();
        //         return redirect()->back()->with('message','Thêm mã giảm giá thành công');
        //     }

        // }else{
        //     return redirect()->back()->with('error','Mã giảm giá không đúng hoặc đã hết hạn, vui lòng kiểm tra lại.');
        // }
    }
    public function insert_coupon(){
        $this->AuthLogin();
    	return view('admin.coupon.insert_coupon');
    }
    public function insert_coupon_code(Request $request){
        $data = $request->all();

    	$coupon = new Coupon;

    	$coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_date_start = $data['coupon_date_start'];
        $coupon->coupon_date_end = $data['coupon_date_end'];
    	$coupon->coupon_number = $data['coupon_number'];
    	$coupon->coupon_code = $data['coupon_code'];
    	$coupon->coupon_time = $data['coupon_time'];
    	$coupon->coupon_condition = $data['coupon_condition'];
    	$coupon->save();

    	Session::put('message','Thêm mã giảm giá thành công');
        return Redirect::to('insert-coupon');

    }
    public function list_coupon(){
        $this->AuthLogin();
    	$today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
    	$coupon = Coupon::orderby('coupon_id','DESC')->paginate(5);
    	return view('admin.coupon.list_coupon')->with(compact('coupon','today'));
    }
    public function delete_coupon($coupon_id){
        $this->AuthLogin();
    	$coupon = Coupon::find($coupon_id);
    	$coupon->delete();
    	Session::put('message','Xóa mã giảm giá thành công');
        return Redirect::to('list-coupon');
    }

}

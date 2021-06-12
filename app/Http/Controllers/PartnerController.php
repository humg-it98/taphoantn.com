<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Session;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
class PartnerController extends Controller
{
	public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function manage_partner(){
        $this->AuthLogin();
    	$all_partner = Partner::orderBy('partner_id','DESC')->paginate(8);
    	return view('admin.partner.list_partner')->with(compact('all_partner'));
    }
    public function add_partner(){
        $this->AuthLogin();
    	return view('admin.partner.add_partner');
    }
    public function unactive_partner($partner_id){
        $this->AuthLogin();
        DB::table('tbl_partner')->where('partner_id',$partner_id)->update(['partner_status'=>0]);
        Session::put('message','Không kích hoạt đối tác thành công');
        return Redirect::to('manage-partner');

    }
    public function active_partner($partner_id){
        $this->AuthLogin();
        DB::table('tbl_partner')->where('partner_id',$partner_id)->update(['partner_status'=>1]);
        Session::put('message','Kích hoạt đối tác thành công');
        return Redirect::to('manage-partner');

    }

    public function insert_partner(Request $request){
    	$this->AuthLogin();
   		$data = $request->all();
        // dd($data);
       	$get_image = request('partner_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/partner', $new_image);

            $partner = new Partner();
            $partner->partner_name = $data['partner_name'];
            $partner->partner_image = $new_image;
            $partner->partner_status = $data['partner_status'];
            $partner->partner_desc = $data['partner_desc'];
           	$partner->save();
            Session::put('message','Thêm đối tác thành công');
            return Redirect::to('add-partner');
        }else{
        	Session::put('message','Làm ơn thêm hình ảnh');
    		return Redirect::to('add-partner');
        }

    }
    public function delete_partner(Request $request, $partner_id){
        $this->AuthLogin();
        $partner = Partner::find($partner_id);
        $partner->delete();
        Session::put('message','Xóa đối tác thành công');
        return redirect()->back();

    }
}

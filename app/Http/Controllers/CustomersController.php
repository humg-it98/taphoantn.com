<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Models\Customer;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CustomersController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function all_customers(){
        $this->AuthLogin();

    	$all_customers = Customer::orderBy('customer_id')->paginate(8);
    	return view('admin.customers.all_customer')->with(compact('all_customers',$all_customers));
    }
}

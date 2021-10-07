<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'order_id', 'money','note', 'vnp_response_code', 'code_vnpay','code_bank','time'
    ];
    protected $primaryKey = 'payment_id';
 	protected $table = 'tbl_payments';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'partner_name', 'partner_image','partner_status','partner_desc'
    ];
    protected $primaryKey = 'partner_id';
 	protected $table = 'tbl_partner';
}

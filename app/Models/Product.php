<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_name','product_tags', 'product_slug','category_id','product_quantity','product_sold','brand_id','product_desc','product_content','product_price','product_image','product_views','product_status'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'tbl_product';

    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }

    public function category(){
        return $this->belongsTo('App\Models\CategoryProductModels','category_id');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }
}

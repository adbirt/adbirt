<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $fillable = ["id", "product_name", "product_description", "product_price", "product_image", "location", "product_refund_policy", "product_shipping_cost","product_approval_status","product_delivery_status","isDeleted","created_at", "updated_at"];

    protected $table = 'product';
	
	    public static $rules = array(
        'pro_name' => 'required',
        'pro_des' => 'required',
        'pro_price' => 'required',
		'pro_pics' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    );

}

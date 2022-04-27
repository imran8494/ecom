<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
class Cart extends Model
{
    use HasFactory;

    public static function cart_items(){
        if (Auth::guard('customer')->check()) {
            $cart_items = Cart::with(['products_attribute','products'=>function($query){
                $query->select('id','category_id','product_name','product_image','product_code','product_price','product_discount','product_color','product_weight');
            }])->where(['user_id'=>Auth::guard('customer')->user()->id])->orderBy('id','desc')->get()->toArray();
        }else{
            $cart_items = Cart::with(['products_attribute','products'=>function($query){
                $query->select('id','category_id','product_name','product_image','product_code','product_price','product_discount','product_color','product_weight');
            }])->where(['session_id'=>Session::get('session_id')])->orderBy('id','desc')->get()->toArray();
        }
        return $cart_items;
    }

    public function products()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function products_attribute()
    {
        return $this->belongsTo('App\Models\ProductAttribute','size_attr_id');
    }
}

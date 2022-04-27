<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section','section_id');
    }

    public function attributes()
    {
        return $this->hasMany('App\Models\ProductAttribute');
    }

    public function multiple_images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function brands()
    {
        return $this->belongsTo('App\Models\Brand','brand_id');
    }

    public static function product_filters(){
        $product_filter['fabric'] = ['Cotton','Polyster','Wool'];
        $product_filter['sleeve'] = ['Full sleeve','Half sleeve','Short Sleeve','Sleeveless'];
        $product_filter['pattern'] = ['Checked','Plain','Printed','Self','Solid'];
        $product_filter['fit'] = ['Regular','Slim'];
        $product_filter['occasion'] = ['Casual','Formal'];

        return $product_filter;
    }

    public static function discounted_price($product_id)
    {
        $pro_disc = Product::select('id','product_price','product_discount','category_id')->where('id',$product_id)->first()->toArray();
        // echo "<pre>";print_r($discounted_price);die;
        $cat_discount = Category::select('category_discount')->where('id',$pro_disc['category_id'])->first()->toArray();
        // echo "<pre>";print_r($cat_discount);die;
        if ($pro_disc['product_discount']>0) {
            $disc_price =$pro_disc['product_price'] - (($pro_disc['product_discount']*$pro_disc['product_price'])/100);
        } else if($cat_discount['category_discount']>0) {
            $disc_price =$pro_disc['product_price'] - (($cat_discount['category_discount']*$pro_disc['product_price'])/100);
        }else{
            $disc_price = 0;
        }

        return $disc_price;
    }

    public static function attr_discounted_price($product_id,$attr_id)
    {
        $attr_disc = ProductAttribute::where(['product_id'=>$product_id,'id'=>$attr_id])->first()->toArray();
        $pro_disc = Product::select('id','product_price','product_discount','category_id')->where('id',$product_id)->first()->toArray();
        // echo "<pre>";print_r($discounted_price);die;
        $cat_discount = Category::select('category_discount')->where('id',$pro_disc['category_id'])->first()->toArray();
        // echo "<pre>";print_r($cat_discount);die;
        if ($pro_disc['product_discount']>0) {
            $disc_price =$attr_disc['price'] - (($attr_disc['price']*$pro_disc['product_discount'])/100);
            $discount = $attr_disc['price'] - $disc_price;
        } else if($cat_discount['category_discount']>0) {
            $disc_price =$attr_disc['price'] - (($cat_discount['category_discount']*$attr_disc['price'])/100);
            $discount = $attr_disc['price'] - $disc_price;
        }else{
            $disc_price = $attr_disc['price'];
            $discount = 0;
        }

        return array('attr_disc'=>$attr_disc,'disc_price'=>$disc_price,'discount'=>$discount);
    }
}

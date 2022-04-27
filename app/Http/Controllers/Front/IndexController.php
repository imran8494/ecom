<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Banner;
use Hash;

class IndexController extends Controller
{
    //
    public function index()
    {
        $featured_pr_count = Product::where('is_featured','Yes')->count();
        // echo $random_pass =  str_random(8);die;
        $featured_product = Product::where(['is_featured'=>'Yes','status'=>1])->get()->toArray();
        $page_name = "Index";
        $latest_products = Product::where(['status'=>1])->whereNotNull('product_image')->get()->toArray();
        $latest_pr_chnk_arr = array_chunk($latest_products,3);
        // $banners = Banner::where('status',1)->get();
        // echo $latest_products;die;
        // $featured_product = json_decode(json_encode($featured_product),true);
        // echo "<pre>";print_r($featured_product);die;
        // dd(Hash::make('asdfasdf'));
        return view('layouts.front_layouts.index')->with(compact('page_name','featured_pr_count','featured_product','latest_pr_chnk_arr'));
    }
}

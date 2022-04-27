<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    
    public function orders()
    {

        $orders = Order::with('order_details')->where('user_id',customer_id())->orderBy('id','desc')->get();
        // dd($orders);
        return view('front.orders.orders')->with(compact('orders'));
    }

    public function order_details($id)
    {
        $order = Order::with('order_details')->where('id',$id)->first();
        // dd($order);

        return view('front.orders.order_details')->with(compact('order'));

    }
}

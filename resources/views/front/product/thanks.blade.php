@php
use App\Models\Product;
@endphp
@extends('layouts.front_layouts.front_layout')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                    <li class="active">Thanks</li>
                </ol>
            </div>
            <!--/breadcrums-->

            <div>
                <div>

                    <div>
                        <div class="text-center">
                            <h3>YOUR ORDER HAS BEEN PLACED SUCCESSFULLY</h3>
                            <P>Your order number is {{ Session::get('order_id') }} and grand total is $ {{ Session::get('total_amount') }}</P>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!--/#cart_items-->
@php
    Session::forget('order_id');
    Session::forget('total_amount');
    Session::forget('coupon_code');
    Session::forget('coupon_amount');
@endphp





@endsection

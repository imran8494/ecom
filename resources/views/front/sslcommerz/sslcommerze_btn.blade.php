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

                            <a href="{{ route('example2') }}">Pay Now</a>

                            {{-- <button class="your-button-class" id="sslczPayBtn"
                                    token="if you have any token validation"
                                    postdata="your javascript arrays or objects which requires in backend"
                                    order="If you already have the transaction generated for current order"
                                    endpoint="/pay-via-ajax"> Pay Now
                            </button> --}}

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!--/#cart_items-->
@php
    // Session::forget('order_id');
    Session::forget('total_amount');
    Session::forget('coupon_code');
    Session::forget('coupon_amount');
@endphp





@endsection

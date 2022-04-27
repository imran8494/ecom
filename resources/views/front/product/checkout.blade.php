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
                </ol>
            </div>
            <!--/breadcrums-->

            <div class="table-responsive">
                <table class="table table-bordered">
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                    <div class="review-payment">
                        <h2>Delivery Address <span><a class="add_delivery" href="{{ route('add_delivery_address') }}"
                                    style="float: right;">Add Delivery Address</a></span></h2>

                    </div>
                    <form action="{{ route('checkout') }}" method="post">@csrf
                    @foreach ($delivery_address as $address)
                        <tr>
                            <td>
                                <div class="form-inline clearfix">
                                    <div class="controls-row float-left">
                                        <label class="radio inline">
                                            <input type="radio" value="{{ $address->id }}" name="address_id"
                                                id="address_id" shipping_charges="{{ $address->shipping_charge }}" total_price="{{ $total_price }}" coupon_amount="{{ Session::get('coupon_amount') }}"/>
                                        </label>
                                        <span class="control-label">{{ $address->name }}, {{ $address->address }},
                                            {{ $address->city }}, {{ $address->state }},
                                            {{ $address->country }}</span>

                                    </div>
                                </div>
                            </td>
                            <td width="10%">
                                <a href="{{ route('edit_delivery_address',$address->id) }}" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;|
                                <a class="delete_delivery_address" href="{{ route('delete_delivery_address',$address->id) }}" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Unit Price</td>
                            <td class="price">Discount</td>
                            <td class="total">Total</td>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                        $total_price = 0;
                    @endphp
                    @foreach ($cart_items as $item)
                        @php
                            $discount_dtls = Product::attr_discounted_price($item['products_attribute']['product_id'], $item['products_attribute']['id']);
                            // dd($discount_dtls);die;
                        @endphp
                        <tr>
                            <td class="cart_product">
                                <a href="">

                                    @php
                                        $product_image_path = 'images/product_images/cart/' . $item['products']['product_image'];
                                    @endphp
                                    @if (!empty($item['products']['product_image']) && file_exists($product_image_path))
                                        <img src="{{ asset($product_image_path) }}" alt="" />
                                    @else
                                        <img src="{{ asset('images/product_images/small/520x600.png') }}" alt="" />

                                    @endif

                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $item['products']['product_name'] }}</a></h4>
                                {{-- <p>Product Code: {{ $item['products']['product_code'] }}</p> --}}
                                <p>Product Color: {{ $item['products']['product_color'] }} <br> Product Code:
                                    {{ $item['products']['product_code'] }} <br> Product Size:
                                    {{ $item['products_attribute']['size'] }}</p>
                            </td>
                            
                            <td class="cart_price">
                                <p>$ {{ $item['products_attribute']['price'] }}</p>
                            </td>
                            <td class="cart_price">
                                <p>$ {{ $discount_dtls['discount'] }}</p>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$
                                    {{ $item['quantity'] * $discount_dtls['disc_price'] }}</p>
                            </td>
                        </tr>
                        @php
                            $total_price = $total_price + $item['quantity'] * $discount_dtls['disc_price'];
                        @endphp
                    @endforeach
                        
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td colspan="3">
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td>Total Price</td>
                                        <td>$ {{ $total_price }}</td>
                                    </tr>
                                    
                                    <tr class="shipping-cost">
                                        <td class="coupon_amount">Coupon Discount</td>
                                        <td>
                                            @if (Session::has('coupon_amount'))
                                                $ {{ Session::get('coupon_amount') }}
                                            @else
                                                $ 0
                                            @endif  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Charges</td>
                                        <td class="shipping_charges">$ 0</td>
                                    </tr>
                                    <tr>
                                        <td>Grand Total($ {{ $total_price }}-$ @if (Session::has('coupon_amount'))
                                            {{ Session::get('coupon_amount') }}@else 0 
                                        @endif + <font class="shipping_charges">$ 0</font>) </td>
                                        <td><span class="total_amount">$ {{ $total_amount = $total_price - Session::get('coupon_amount') }}</span></td>
                                    @php
                                        Session::put('total_amount',$total_amount);
                                    @endphp
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="payment-options">
                {{-- <span>
                    <label><input name="payment_gateway" type="radio"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input name="payment_gateway" type="radio"> Check Payment</label>
                </span> --}}
                <span>
                    <label><input name="payment_gateway" type="radio" value="COD"> Cach on Delivery</label>
                </span>
                <span>
                    <label><input name="payment_gateway" type="radio" value="Prepaid"> Prepaid</label>
                <button class="btn btn-default add_delivery" style="float: right;">Proceed</button>

                </span>
            </div>
        </form>
        </div>
    </section>
    <!--/#cart_items-->






@endsection

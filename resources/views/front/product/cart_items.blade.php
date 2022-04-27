@php
use App\Models\Product;
@endphp
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        @if(Session::has('error'))
            <div class="alert alert-warning alert-dismissible" role="alert">
              {{Session::get('error')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="quantity">Quantity</td>
                        <td class="price">Unit Price</td>
                        <td class="price">Discount</td>
                        <td class="total">Total</td>
                        <td></td>
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
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    {{-- <a class="item_update cart_quantity_up" href=""> + </a> --}}
                                    <input class="cart_quantity_input" type="text" name="quantity"
                                        value="{{ $item['quantity'] }}" autocomplete="off" size="2">
                                    <button type="button" url={{ route('update_cart') }}
                                        data-cartid="{{ $item['id'] }}" class="item_update cart_quantity_down"> -
                                    </button>
                                    <button type="button" url={{ route('update_cart') }}
                                        data-cartid="{{ $item['id'] }}" class="item_update cart_quantity_up"> +
                                    </button>

                                    {{-- <a class="item_update cart_quantity_down" href=""> - </a> --}}
                                </div>
                            </td>
                            <td class="cart_price">
                                <p>$ {{ $item['products_attribute']['price'] }}</p>
                            </td>
                            <td class="cart_price">
                                <p>$ {{ $discount_dtls['discount'] *$item['quantity']}}</p>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$
                                    {{ $item['quantity'] * $discount_dtls['disc_price'] }}</p>
                            </td>
                            <td class="cart_delete">
                                <button id="delete_pr_cart" route="{{ route('delete_pr_cart') }}"
                                    data-cartid="{{ $item['id'] }}" class="cart_quantity_delete"><i
                                        class="fa fa-times"></i></button>
                                {{-- <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a> --}}
                            </td>
                        </tr>
                        @php
                            $total_price = $total_price + $item['quantity'] * $discount_dtls['disc_price'];
                        @endphp
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>
<!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <form  id="coupon_form" action="javascript:void(0)"  act="{{ route('check_coupon') }}" @if (Auth::guard('customer')->check())
                        user="1"
                    @endif>
                        <ul class="user_option">
                            <li>
                                <input type="checkbox" name="coupon_check" id="coupon_code">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            {{-- <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li> --}}
                        </ul>
                        <ul class="user_info">
                            <li class="single_field" id="coupon_input" style="display: none;">
                                <label>Coupon Code:</label>
                                {{-- <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select> --}}
                                <input type="text" placeholder="Enter coupon codes" id="code_input" name="code_input">

                            </li>
                            {{-- <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li> --}}
                        </ul>
                        {{-- <a class="btn btn-default update" href="">Get Quotes</a> --}}
                        <button type="submit" class="btn btn-default update">Continue</button>

                        {{-- <a class="btn btn-default check_out" href="">Continue</a> --}}
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Total Price <span>$ {{ $total_price }}</span></li>
                        <li>Voucher Discount <span>$0</span></li>
                        <li>Coupon Discount <span class="coupon_amount">
                         @if (Session::has('coupon_amount'))
                             $ {{ Session::get('coupon_amount') }}
                         @else
                             $ 0
                         @endif   
                        </span></li>
                        <li>Grand Total($ {{ $total_price }}-$ @if (Session::has('coupon_amount'))
                            {{ Session::get('coupon_amount') }}@else 0
                        @endif ) <span class="total_amount">$ {{ $total_price - Session::get('coupon_amount') }}</span></li>
                    </ul>
                    {{-- <a class="btn btn-default update" href="">Update</a> --}}
                    {{-- <input type="text" name="total_price" value="{{ $total_price }}"> --}}
                    <a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#do_action-->
{{-- @php
    Session::forget('coupon_amount');
@endphp --}}
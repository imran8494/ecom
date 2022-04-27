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
			<div class="review-payment">
                <h2>Order Details</h2>
            </div>
			<div class="row">
				<div class="col-md-6">

					<div class="table-responsive cart_info">
						<table class="table table-condensed">
							<thead>
								<tr class="cart_menu">
									<td colspan="2" class="image">Order Details</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="cart_price">
										Order Date
									</td>
									<td class="cart_quantity">
										{{ date('d-m-Y',strtotime($order->created_at)) }}
									</td>
								</tr>
								<tr>
									<td class="cart_price">
										Order Status
									</td>
									<td class="cart_quantity">
										{{ $order->order_status }}
									</td>
								</tr>
								@if (!empty($order->courier_name))
								<tr>
									<td class="cart_price">
										Courier Name
									</td>
									<td class="cart_quantity">
										{{ $order->courier_name }}
									</td>
								</tr>									
								@endif

								@if (!empty($order->tracking_number))
								<tr>
									<td class="cart_price">
										Tracking Number
									</td>
									<td class="cart_quantity">
										{{ $order->tracking_number }}
									</td>
								</tr>									
								@endif


								<tr>
									<td class="cart_price">
										Order Total
									</td>
									<td class="cart_quantity">
										$ {{ $order->grand_total }}
									</td>
								</tr>
								<tr>
									<td class="cart_price">
										Shipping Charges
									</td>
									<td class="cart_quantity">
										{{ $order->shipping_charges }}
									</td>
								</tr>
								<tr>
									<td class="cart_price">
										Coupon Code
									</td>
									<td class="cart_quantity">
										{{ $order->coupon_code }}
									</td>
								</tr>
								<tr>
									<td class="cart_price">
										Coupon Amount
									</td>
									<td class="cart_quantity">
										$ {{ $order->coupon_amount }}
									</td>
								</tr>
								<tr>
									<td class="cart_price">
										Payment Method
									</td>
									<td class="cart_quantity">
										{{ $order->payment_method }}
									</td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
				<div class="col-md-6">

					<div class="table-responsive cart_info">
						<table class="table table-condensed">
							<thead>
								<tr class="cart_menu">
									<td colspan="2" class="image">Delivery Address</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="cart_price">
										Name
									</td>
									<td class="cart_quantity">
										{{ $order->name }}
									</td>
								</tr>
								<tr>
									<td class="cart_price">
										Delivery Address
									</td>
									<td class="cart_quantity">
										{{ $order->address }}
									</td>
								</tr>
								<tr>
									<td class="cart_price">
										City
									</td>
									<td class="cart_quantity">
										{{ $order->city }}
									</td>
								</tr>
								<tr>
									<td class="cart_price">
										State
									</td>
									<td class="cart_quantity">
										{{ $order->state }}
									</td>
								</tr>
								<tr>
									<td class="cart_price">
										Country
									</td>
									<td class="cart_quantity">
										{{ $order->country }}
									</td>
								</tr>
								<tr>
									<td class="cart_price">
										Pincode
									</td>
									<td class="cart_quantity">
										{{ $order->pincode }}
									</td>
								</tr>
								<tr>
									<td class="cart_price">
										Mobile
									</td>
									<td class="cart_quantity">
										{{ $order->mobile }}
									</td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>

            
            <div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Product Image</td>
							<td class="description">Product Code</td>
							<td class="description">Product Name</td>
							<td class="price">Product Size</td>
							<td class="quantity">Product Color</td>
							<td class="quantity">Product Quantity</td>
						</tr>
					</thead>
					<tbody>
                        @foreach ($order->order_details as $product)
                            
						<tr>
							<td class="image">
								@php
									$pr_image = product_image($product->product_id);
									// dd($pr_image);
								@endphp
								
                                    @php
                                        $product_image_path = 'images/product_images/small/' . $pr_image->product_image;
										// dd($product_image_path);
                                    @endphp
                                    @if (!empty($pr_image->product_image) && file_exists($product_image_path))
                                        <img src="{{ asset($product_image_path) }}" alt="" />
                                    @else
                                        <img src="{{ asset('images/product_images/small/520x600.png') }}" alt="" />

                                    @endif
                                
							</td>
							<td class="image">
								{{ $product->product_code }}
							</td>
							<td class="cart_description">
								{{ $product->product_name }}

							</td>
							<td class="cart_price">
								{{ $product->product_size }}
							</td>
							<td class="cart_quantity">
								{{ $product->product_color }}
							</td>
							<td class="cart_quantity">
								{{ $product->product_qty }}
							</td>
						</tr>
                        @endforeach

					</tbody>
				</table>
			</div>
        
        </div>
    </section>
    <!--/#cart_items-->






@endsection

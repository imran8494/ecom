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
                <h2>Orders </h2>

            </div>
            <div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Order Id</td>
							<td class="description">Order Products</td>
							<td class="price">Payment Method</td>
							<td class="quantity">Grand Total</td>
							<td class="quantity">Created On</td>
							<td class="quantity">Action</td>
						</tr>
					</thead>
					<tbody>
                        @foreach ($orders as $order)
                            
						<tr>
							<td class="cart_product">
								{{ $order->id }}
							</td>
							<td class="cart_description">
								@foreach ($order->order_details as $order_products)
                                    {{ $order_products->product_code }} <br>
                                @endforeach
							</td>
							<td class="cart_price">
								{{ $order->payment_method }}
							</td>
							<td class="cart_quantity">
								{{ $order->grand_total }}
							</td>
                            <td class="cart_quantity">
								{{ date('d-m-Y',strtotime($order->created_at)) }}
							</td>
                            <td class="view_order_details" >
								<a href="{{ route('order_details',$order->id) }}" class="btn-xs btn-primary">View Details</a>
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

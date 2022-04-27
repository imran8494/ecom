@php
    use App\Models\Product;
@endphp
@extends('layouts.front_layouts.front_layout')
@section('content')

<div id="update_cart">    
    @include('front.product.cart_items')
</div>
@endsection

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
                    <li class="active">Add Delivery Address</li>
                </ol>
            </div>
            <!--/breadcrums-->

            <div>
                <div>

                    <div class="review-payment">
                        <h2>Add Delivery Address</h2>
                    </div>
                    <div class="form-two">
                        <form action="{{ route('submit_delivery_address') }}" method="post">@csrf
                            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                            @error('name')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                            <input type="text" name="address" placeholder="Address" value="{{ old('address') }}">
                            @error('address')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                            <input type="text" name="city" placeholder="City" value="{{ old('city') }}">
                            @error('city')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                            <input type="text" name="state" placeholder="State" value="{{ old('state') }}">
                            @error('state')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                            <select name="country">
                                <option value="">Selct Country</option>
                                @foreach ($country as $countries)
                                <option value="{{ $countries->nicename }}" @if ($countries->nicename ==old('country'))
                                    selected
                                @endif>{{ $countries->nicename }}</option>
                                @endforeach
                                
                            </select>
                            @error('country')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                            <input type="text" name="pincode" placeholder="Pincode" value="{{ old('pincode') }}">
                            @error('pincode')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                            <input type="text" name="mobile" placeholder="Mobile" value="{{ old('mobile') }}">
                            @error('mobile')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                        <button type="submit" required class="add_delivery" style="float: right; margin-bottom:10px;">Save</button>
                            
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/#cart_items-->






@endsection

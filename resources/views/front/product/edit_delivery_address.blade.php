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
                        <form action="{{ route('update_delivery_address',$address->id) }}" method="post">@csrf
                            {{-- <input type="text" name="name" placeholder="Name" value="{{ $address->name }}">
                            <input type="text" name="address" placeholder="Address" value="{{ $address->address }}">
                            <input type="text" name="city" placeholder="City" value="{{ $address->city }}">
                            <input type="text" name="state" placeholder="State" value="{{ $address->state }}">
                            <select name="country">
                                <option>Selct Country</option>
                                @foreach ($country as $countries)
                                <option value="{{ $countries->name }}" @if ($countries->name == $address->country)
                                    selected
                                @endif>{{ $countries->name }}</option>
                                @endforeach
                                
                            </select>
                            <input type="text" name="pincode" placeholder="Pincode" value="{{ $address->pincode }}">
                            <input type="text" name="mobile" placeholder="Mobile" value="{{ $address->mobile }}">
                        <button type="submit" required class="add_delivery" style="float: right; margin-bottom:10px;">Save</button>
                             --}}

                             <input type="text" name="name" placeholder="Name" @if (isset($address->name))
                             value="{{ $address->name }}" @else value="{{ old('name') }}" @endif >
                             @error('name')<span
                                                 class="text-danger">{{ $message }}</span>@enderror
                             <input type="text" name="address" placeholder="Address" @if (isset($address->address))
                             value="{{ $address->address }}" @else value="{{ old('address') }}" @endif>
                             @error('address')<span
                                                 class="text-danger">{{ $message }}</span>@enderror
                             <input type="text" name="city" placeholder="City" @if (isset($address->city))
                             value="{{ $address->city }}" @else value="{{ old('city') }}" @endif>
                             @error('city')<span
                                                 class="text-danger">{{ $message }}</span>@enderror
                             <input type="text" name="state" placeholder="State" @if (isset($address->state))
                             value="{{ $address->state }}" @else value="{{ old('state') }}" @endif>
                             @error('state')<span
                                                 class="text-danger">{{ $message }}</span>@enderror
                             <select name="country">
                                 <option value="">Selct Country</option>
                                 @foreach ($country as $countries)
                                 <option value="{{ $countries->nicename }}" @if ($countries->nicename ==old('country'))
                                     selected @elseif($countries->nicename ==$address->country) selected
                                 @endif>{{ $countries->nicename }}</option>
                                 @endforeach
                                 
                             </select>
                             @error('country')<span
                                                 class="text-danger">{{ $message }}</span>@enderror
                             <input type="text" name="pincode" placeholder="Pincode" @if (isset($address->pincode))
                             value="{{ $address->pincode }}" @else value="{{ old('pincode') }}" @endif>
                             @error('pincode')<span
                                                 class="text-danger">{{ $message }}</span>@enderror
                             <input type="text" name="mobile" placeholder="Mobile" @if (isset($address->mobile))
                             value="{{ $address->mobile }}" @else value="{{ old('mobile') }}" @endif>
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

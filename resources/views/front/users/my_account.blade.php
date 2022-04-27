@php
use App\Models\Product;
@endphp
@extends('layouts.front_layouts.front_layout')
@section('content')

    <section id="form">
        <!--form-->
        <div class="container">
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Contact Details</h2>
                        <form id="update_account" action="{{ route('update_account', $user_details->id) }}" method="post">
                            {{-- <input type="text" required name="name" placeholder="Name" /> --}}
                            <p>Name</p>
                            <input type="text" required name="name" placeholder="Name"
                                value="{{ $user_details->name }}" />
                            <p>Address</p>
                            <input type="text" name="address" placeholder="Address"
                                value="{{ $user_details->address }}" />
                            <p>City</p>
                            <input type="text" name="city" placeholder="City" value="{{ $user_details->city }}" />
                            <p>State</p>
                            <input type="text" name="state" placeholder="State" value="{{ $user_details->state }}" />
                            <p>Country</p>
                            <select class="select2" name="country" id="country" style="padding: 10px 5px;">
                                <option value="">Select Country</option>
                                @foreach ($country as $countries)
                                <option value="{{ $countries->nicename }}" @if ($user_details->country == $countries->nicename)
                                    selected
                                @endif>{{ $countries->nicename  }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="country" placeholder="Country"
                                value="{{ $user_details->country }}" /> --}}
                            <p>Pincode</p>
                            <input type="text" name="pincode" placeholder="Pincode"
                                value="{{ $user_details->pincode }}" />
                            <p>Mobile</p>
                            <input type="text" name="mobile" placeholder="Mobile" value="{{ $user_details->mobile }}" />
                            <p>Email Address</p>
                            <input type="email" name="email" placeholder="Email Address" readonly
                                value="{{ $user_details->email }}" />

                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Update Password</h2>
                        <form id="update_password" action="{{ route('update_password') }}" method="post">
                            <p>Current Password</p>
                            <input type="password" required name="current_password" id="current_password" route="{{ route('check_current_password') }}" placeholder="Current Password" />
                            <span id="cnt_err"></span>
                            <p>New Password</p>
                            <input type="password" required name="new_password" id="new_password" placeholder="New Password" />
                            <p>Confirm Password</p>
                            <input type="password" required name="confirm_password" id="confirm_password" placeholder="Confirm Password" />
                            <button type="submit" required class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/form-->






@endsection

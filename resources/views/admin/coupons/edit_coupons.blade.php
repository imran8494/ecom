@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add Coupons</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                    type="button" href="#" aria-disabled="false" role="link" tabindex="-1">Cancel</a>
                            </li>
                        </ol>
                    </div>


                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="row im-flex">
                <div class="col-md-8 mx-auto">
                    @if (Session::has('sms'))
                        <div class="alert alert-default-success alert-dismissible fade show" role="alert">
                            <strong> {{ Session::get('sms') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="">
                            <div class="card-header">
                                <h3 class="card-title" id="heading">Add Coupons </h3>
                            </div>
                            <div id="success_message" class="btn-success"></div>
                            <form action="{{ route('update_coupons',$coupons->id) }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="coupon_code">Coupon Code: </label><span>
                                                {{ $coupons->coupon_code }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="coupon_type">Coupon Type</label>
                                            <br>
                                            <input {{ $coupons->coupon_type == 'Multiple Times' ? 'checked' : '' }}
                                                type="radio" name="coupon_type" value="Multiple Times">&nbsp;&nbsp;Multiple
                                            Times&nbsp;&nbsp;&nbsp;
                                            <input {{ $coupons->coupon_type == 'Single Times' ? 'checked' : '' }}
                                                type="radio" name="coupon_type" value="Single Times">&nbsp;Single Times
                                            <br>
                                            @error('coupon_type')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="amount_type">Amount Type</label>
                                            <br>
                                            <input {{ $coupons->amount_type == 'Percentage' ? 'checked' : '' }} type="radio"
                                                name="amount_type" value="Percentage">&nbsp;&nbsp;Percentage
                                            (%)&nbsp;&nbsp;&nbsp;
                                            <input {{ $coupons->amount_type == 'Fixed' ? 'checked' : '' }} type="radio"
                                                name="amount_type" value="Fixed">&nbsp;Fixed (BDT)
                                            <br>
                                            @error('amount_type')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input type="text" class="form-control" name="amount"
                                                value="{{ $coupons->amount }}">
                                            @error('amount')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="categories">Select Categories</label>
                                            <select name="categories[]" class="form-control select2" multiple
                                                style="width: 100%;">
                                                @foreach ($categories as $section)
                                                    <optgroup label="{{ $section->name }}"></optgroup>
                                                    @foreach ($section->categories as $category)
                                                        <option value="{{ $category->id }}" @if (in_array($category->id, $coupons_category)) selected @endif>
                                                            &nbsp;--&nbsp;&nbsp;{{ $category->category_name }}</option>
                                                        @foreach ($category->subcategories as $subcategory)
                                                            <option value="{{ $subcategory->id }}" @if (in_array($subcategory->id, $coupons_category)) selected @endif>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;{{ $subcategory->category_name }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            </select>
                                            @error('section_name')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="users">Select Users</label>
                                            <select name="users[]" class="form-control select2" multiple
                                                style="width: 100%;">
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->email }}" @if (in_array($user->email, $coupons_users)) selected @endif>{{ $user->email }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('users')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="expiry_date">Expiry Date</label>
                                            <input type="date" class="form-control" name="expiry_date"
                                                value="{{ $coupons->expiry_date }}">
                                            @error('expiry_date')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                                        </div>



                                        <div class="float-right">
                                            <button id="send_form" type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>


                                </div>
                            </form>

                        </div>
                    </div>

                </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->


@endsection

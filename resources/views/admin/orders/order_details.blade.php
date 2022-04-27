@extends('layouts.admin_layouts.admin_layout')
@section('content')






    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Order Details #{{ $order->id }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Order Details</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Order Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Order Date</td>
                                            <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Order Status</td>
                                            <td>{{ $order->order_status }}</td>
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
                                            <td>Order Total</td>
                                            <td>{{ $order->grand_total }}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping Charges</td>
                                            <td>{{ $order->shipping_charges }}</td>
                                        </tr>
                                        <tr>
                                            <td>Coupon Code</td>
                                            <td>{{ $order->coupon_code }}</td>
                                        </tr>
                                        <tr>
                                            <td>Coupon Amount</td>
                                            <td>{{ $order->coupon_amount }}</td>
                                        </tr>
                                        <tr>
                                            <td>Payment Method</td>
                                            <td>{{ $order->payment_method }}</td>
                                        </tr>
                                        <tr>
                                            <td>Payment Gateway</td>
                                            <td>{{ $order->payment_gateway }}</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Delivery Address</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">

                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $order->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{ $order->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td>{{ $order->city }}</td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td>{{ $order->state }}</td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td>{{ $order->country }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pincode</td>
                                            <td>{{ $order->pincode }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mobile</td>
                                            <td>{{ $order->mobile }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User Details</h3>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $user_details->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $user_details->email }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Billing Address</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $user_details->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{ $user_details->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td>{{ $user_details->city }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{ $user_details->state }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{ $user_details->country }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{ $user_details->pincode }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{ $user_details->mobile }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Update Order Status</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <form action="{{ route('update_order_status', $order->id) }}" method="post">
                                            <tr>
                                                <td>
                                                    <select class="form-control select2" id="order_status"
                                                        name="order_status" id="order_status">
                                                        <option value="">Select Status</option>
                                                        @foreach ($order_status as $status)
                                                            <option value="{{ $status->name }}" @if ($order->order_status == $status->name) selected @endif>
                                                                {{ $status->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div @if (empty($order->courier_name)) id="courier_name" @endif
                                                        class="form-group mt-3">
                                                        <input type="text" class="form-control" name="courier_name"
                                                            placeholder="Courier Name"
                                                            value="{{ $order->courier_name }}">
                                                    </div>
                                                    <div @if (empty($order->tracking_number)) id="tracking_number" @endif
                                                        class="form-group">
                                                        <input type="text" class="form-control" name="tracking_number"
                                                            placeholder="Tracking Number"
                                                            value="{{ $order->tracking_number }}">
                                                    </div>
                                                    <div class="float-right mt-2">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <table class="table table-bordered">
                                                @foreach ($order_status_logs as $logs)
                                                    <tr>
                                                        <th>{{ $logs->order_status }}</th>
                                                        <td>{{ date('F j, Y, g:i a', strtotime($logs->created_at)) }}</td>
                                                    </tr>
                                                @endforeach

                                            </table>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>


                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ordered Products</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Product Size</th>
                                            <th>Product Color </th>
                                            <th>Product Quantity </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->order_details as $ordered_products)

                                            <tr>
                                                <td>asfdf</td>
                                                <td>{{ $ordered_products->product_code }}</td>
                                                <td>{{ $ordered_products->product_name }}</td>
                                                <td>{{ $ordered_products->product_size }}</td>
                                                <td>{{ $ordered_products->product_color }}</td>
                                                <td>{{ $ordered_products->product_qty }}</td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>











@endsection

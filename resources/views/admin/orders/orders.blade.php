@extends('layouts.admin_layouts.admin_layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
              {{Session::get('success')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>
                <a style="max-width: 150px; float: right;" class="btn btn-block btn-info" href="{{ route('add_product') }}">Add Product</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 5%;text-align:center;">Order ID</th>
                    <th style="width: 13%;text-align:center;">Order Date</th>
                    <th style="width: 11%;text-align:center;">Customer Name</th>
                    <th style="width: 11%;text-align:center;">Customer Email</th>
                    <th style="width: 12%;text-align:center;">Ordered Products</th>
                    <th style="width: 11%;text-align:center;">Order Amount </th>
                    <th style="width: 11%;text-align:center;">Order Status</th>
                    <th style="width: 11%;text-align:center;">Payment Method</th>
                    <th style="width: 15%;text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($orders as $orders)
            
                  <tr>
                    <td>{{ $orders->id }}</td>
                    <td>{{ date('d-m-Y',strtotime($orders->created_at)) }}</td>
                    <td>{{$orders->name}}</td>
                    <td>{{$orders->email}}</td>
                    <td>
                        @foreach ($orders->order_details as $ordered_proudcts)
                            {{$ordered_proudcts->product_code}} <br>
                        @endforeach
                    </td>
                    
                    <td>{{$orders->grand_total}}</td>
                    
                    <td>{{$orders->order_status}}</td>
                    <td>{{$orders->payment_method}}</td>
                    <td style="width: 15%;text-align:center;">
                      <a href="{{ route('customer_order_details',$orders->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip"
                        data-placement="top" title="Order Details">
                        <i class="fa fa-file" aria-hidden="true"></i>
                     </a>
                     @if ($orders->order_status == "Shipped" || $orders->order_status == "Delivered"|| $orders->order_status == "Paid")
                     <a href="{{ route('order_invoice',$orders->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip"
                      data-placement="top" title="View Order Invoice">
                      <i class="fas fa-print" aria-hidden="true"></i>
                   </a>
                   @endif
                   @if ($orders->order_status == "Shipped" || $orders->order_status == "Delivered"|| $orders->order_status == "Paid")
                   <a href="{{ route('order_invoice_pdf',$orders->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip"
                    data-placement="top" title="View Pdf Order Invoice">
                    <i class="fas fa-file-pdf"></i>
                 </a>
                 @endif
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
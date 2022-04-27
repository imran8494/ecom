@extends('layouts.admin_layouts.admin_layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupons</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Coupons</li>
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
                <h3 class="card-title">Coupons</h3>
                <div class="float-right">
                  <a href="{{ route('coupons.create') }}"><button class="btn btn-sm
                  btn-success"><i class="fas fa-plus"></i> Add Coupons</button></a>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="coupons" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Coupon Type</th>
                    <th>Amount</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                @foreach($coupon as $coupons)
                  <tr id="coupons_{{$coupons->id}}">
                    <td>{{$coupons->id}}</td>
                    <td>{{$coupons->coupon_code}}</td>
                    <td>{{$coupons->coupon_type}}</td>
                    <td>{{$coupons->amount}}
                        @if ($coupons->amount_type == 'Percentage')
                            %
                        @else
                            INR
                        @endif
                    </td>
                    <td>{{$coupons->expiry_date}}</td>
                    <td>
                      <input route="{{ route('update_coupon_status') }}" data-id="{{$coupons->id}}" class="toggle-class" type="checkbox" data-onstyle="btn btn-xs btn-success" data-offstyle="btn btn-xs btn-danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $coupons->status ? 'checked' : '' }}>
                   </td>
                    <td>



                      <a href="{{ route('coupons.show',$coupons->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip"
                        data-placement="top" title="Edit">
                         <i class="fa fa-edit"></i>
                     </a>

                     {{-- <a href="javascript:void(0)" class="btn btn-xs btn-warning confirmDelete" data-toggle="tooltip" data-placement="top" record="product" recordid="{{$coupons->id}}" data-target="{{ route('coupons.destroy') }}"
                      title="Delete">
                       <i class="fa fa-trash" aria-hidden="true"></i>
                     </a> --}}
                     <a href="javascript:void(0)" class="btn btn-xs btn-warning confirmDelete" data-toggle="tooltip" data-placement="top" record="coupons" recordid="{{$coupons->id}}" data-target="{{ route('delete_coupons',$coupons->id) }}"
                      title="Delete">
                       <i class="fa fa-trash" aria-hidden="true"></i>
                     </a>


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

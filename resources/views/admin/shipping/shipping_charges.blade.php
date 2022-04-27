@extends('layouts.admin_layouts.admin_layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Shipping Charges</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Shipping Charges</li>
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
                <h3 class="card-title">Shipping Charges</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="products" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Country</th>
                    <th>0-500g</th>
                    <th>501-1000g</th>
                    <th>1001-2000g</th>
                    <th>2001-5000g</th>
                    <th>Above 5000g</th>
                    <th>Status</th>
                    <th>Actions</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                @foreach($shipp_charge as $shipping_charges)
                  <tr id="shipping_charges_{{$shipping_charges['id']}}">
                    <td>{{$shipping_charges['id']}}</td>
                    <td>{{$shipping_charges['country']}}</td>
                    <td>{{$shipping_charges['0_500g']}}</td>
                    <td>{{$shipping_charges['501_1000g']}}</td>
                    <td>{{$shipping_charges['1001_2000g']}}</td>
                    <td>{{$shipping_charges['2001_5000g']}}</td>
                    <td>{{$shipping_charges['above_5000g']}}</td>
                    <td>
                      <input route="{{ route('update_shipping_charges_status') }}" data-id="{{$shipping_charges['id']}}" class="toggle-class" type="checkbox" data-onstyle="btn btn-xs btn-success" data-offstyle="btn btn-xs btn-danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $shipping_charges['status'] ? 'checked' : '' }}>
                   </td>
                    <td>



                      <a href="{{ route('shipping_charges_edit',$shipping_charges['id']) }}" class="btn btn-xs btn-info" data-toggle="tooltip"
                        data-placement="top" title="Edit">
                         <i class="fa fa-edit"></i>
                     </a>

                     {{-- <a href="javascript:void(0)" class="btn btn-xs btn-warning confirmDelete" data-toggle="tooltip" data-placement="top" record="product" recordid="{{$shipping_charges->id}}" data-target="{{ route('shipping_charges.destroy') }}"
                      title="Delete">
                       <i class="fa fa-trash" aria-hidden="true"></i>
                     </a> --}}
                     {{-- <a href="javascript:void(0)" class="btn btn-xs btn-warning confirmDelete" data-toggle="tooltip" data-placement="top" record="shipping_charges" recordid="{{$shipping_charges->id}}" data-target="{{ route('delete_shipping_charges',$shipping_charges->id) }}"
                      title="Delete">
                       <i class="fa fa-trash" aria-hidden="true"></i>
                     </a> --}}


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

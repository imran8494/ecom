@extends('layouts.admin_layouts.admin_layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
                <h3 class="card-title">Products</h3>
                <a style="max-width: 150px; float: right;" class="btn btn-block btn-info" href="{{ route('add_product') }}">Add Product</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="products" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 5%;text-align:center;">ID</th>
                    <th style="width: 13%;text-align:center;">Product Name</th>
                    <th style="width: 11%;text-align:center;">Product Code</th>
                    <th style="width: 11%;text-align:center;">Product Color</th>
                    <th style="width: 12%;text-align:center;">Product Image</th>
                    <th style="width: 11%;text-align:center;">Category</th>
                    <th style="width: 11%;text-align:center;">Section</th>
                    <th style="width: 11%;text-align:center;">Status</th>
                    <th style="width: 15%;text-align:center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($products as $products)
            
                  <tr>
                    <td>{{$sl++}}</td>
                    <td>{{$products->product_name}}</td>
                    <td>{{$products->product_code}}</td>
                    <td>{{$products->product_color}}</td>
                    <td>
                      @if (!empty($products->product_image))
                      <img style="width: 100px;height:100px;" src="{{ asset('images/product_images/small/'.$products->product_image) }}" alt="">
                      @else
                      <img style="width: 100px;height:100px;" src="{{ asset('images/product_images/small/dummy-images.jpg') }}" alt="">
                      @endif
                    </td>
                    <td>{{$products->category->category_name}}</td>
                    <td>{{$products->section->name}}</td>
                    <td>
                        {{-- {!! show_data_status($products->status) !!} --}}
                        @if($products->status == 1)
                        <a class="updateproductstatus" id="product_{{$products->id}}" product_id="{{$products->id}}" data-target="{{ route('update_product_status') }}" href="javascript:void(0)">Active</a>                            
                        @else
                          <a class="updateproductstatus" id="product_{{$products->id}}" product_id="{{$products->id}}" href="javascript:void(0)">Inactive</a>  
                        @endif

                    </td>
                    <td style="width: 15%;text-align:center;">
                      <a href="{{ route('get_edit_product',$products->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip"
                        data-placement="top" title="Edit">
                         <i class="fa fa-edit"></i>
                     </a>
                     <a href="{{ route('product_attributes',$products->id) }}" class="btn btn-xs btn-success" data-toggle="tooltip"
                      data-placement="top" title="Add/Edit Product Attributes">
                      <i class="fa fa-plus-circle" aria-hidden="true"></i>
                   </a>
                   <a href="{{ route('product_images',$products->id) }}" class="btn btn-xs btn-success" data-toggle="tooltip"
                    data-placement="top" title="Add/Edit Product Images">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                 </a>
                     <a href="javascript:void(0)" class="btn btn-xs btn-warning confirmDelete" data-toggle="tooltip" data-placement="top" record="product" recordid="{{$products->id}}" data-target="{{ route('delete_product',$products->id) }}"
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
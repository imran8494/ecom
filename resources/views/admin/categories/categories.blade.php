@extends('layouts.admin_layouts.admin_layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
                <h3 class="card-title">Categories</h3>
                <a style="max-width: 150px; float: right;" class="btn btn-block btn-info" href="{{ route('add_category') }}">Add Category</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Parent Category</th>
                    <th>Section</th>
                    <th>Url</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                @foreach($data as $Categories)
                @if (!isset($Categories->parentcategories->category_name))
                    <?php $parent_cat = "Root"; ?>
                @else
                    <?php $parent_cat = $Categories->parentcategories->category_name; ?>
                @endif
                  <tr>
                    <td>{{$Categories->id}}</td>
                    <td>{{$Categories->category_name}}</td>
                    <td>{{ $parent_cat }}</td>
                    @if(!empty($Categories->section->name))
                    <td>{{$Categories->section->name}}</td>
                    @endif
                    <td>{{$Categories->url}}</td>
                    <td>

                        @if($Categories->status == 1)
                        <a class="updateCategoriestatus" id="category_{{$Categories->id}}" category_id="{{$Categories->id}}" data-target="{{ route('update_category_status') }}" href="javascript:void(0)">Active</a>                            
                        @else
                          <a class="updateCategoriestatus" id="category_{{$Categories->id}}" category_id="{{$Categories->id}}" data-target="{{ route('update_category_status') }}" href="javascript:void(0)">Inactive</a>  
                        @endif

                    </td>
                    <td>
                      <a href="{{route('edit_category',$Categories->id)}}" class="btn btn-xs btn-info" data-toggle="tooltip"
                        data-placement="top" title="Edit">
                         <i class="fa fa-edit"></i>
                     </a>

                     <a href="javascript:void(0)" class="btn btn-xs btn-warning confirmDelete" data-toggle="tooltip" data-placement="top" record="category" recordid="{{$Categories->id}}" data-target="{{ route('delete_category',$Categories->id) }}"
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
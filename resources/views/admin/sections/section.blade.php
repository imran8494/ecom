@extends('layouts.admin_layouts.admin_layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sections</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sections</li>
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
                <h3 class="card-title">Sections</h3>
                <div class="float-right">
                  <a href="{{ route('add_section') }}"><button class="btn btn-sm
                  btn-success"><i class="fas fa-plus"></i> Add Section</button></a>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="sections" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                @foreach($data as $sections)
                  <tr>
                    <td>{{$sections->id}}</td>
                    <td>{{$sections->name}}</td>
                    <td>

                        @if($sections->status == 1)
                        <a class="updateSectionStatus" id="section_{{$sections->id}}" section_id="{{$sections->id}}" data-target="{{ route('update_section_status') }}" href="javascript:void(0)">Active</a>                            
                        @else
                          <a class="updateSectionStatus" id="section_{{$sections->id}}" section_id="{{$sections->id}}" data-target="{{ route('update_section_status') }}" href="javascript:void(0)">Inactive</a>  
                        @endif

                    </td>
                    <td>



                      <a href="{{ route('edit_section',$sections->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip"
                        data-placement="top" title="Edit">
                         <i class="fa fa-edit"></i>
                     </a>

                     <a href="javascript:void(0)" class="btn btn-xs btn-warning confirmDelete" data-toggle="tooltip" data-placement="top" record="product" recordid="{{$sections->id}}" data-target="{{ route('delete_section',$sections->id) }}"
                      title="Delete">
                       <i class="fa fa-trash" aria-hidden="true"></i>
                     </a>



                    </td>
                   
                  </tr>
                  @endforeach
                  </tbody>
                  {{-- <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                  </tr>
                  </tfoot> --}}
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
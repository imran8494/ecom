@extends('layouts.admin_layouts.admin_layout')
@section('content')

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
              {{Session::get('success')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form name="CategoryForm" id="CategoryForm" method="post" @if(empty($getdata)) action="{{ route('add_category') }}" @else action="{{ route('edit_category',$getdata->id) }}" @endif enctype="multipart/form-data">@csrf
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_name">Category Name </label>
                        <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Category Name" @if(!empty($getdata->category_name)) value="{{$getdata->category_name}}" @else value="{{ old('category_name') }}" @endif>
                    </div>
                    <div id="appendCategoriesLevel">
                        @include('admin.categories.append_category_level')
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Section</label>
                      <select name="section_id" id="section_id" data-target="{{ route('append_category_level') }}" class="form-control select2" style="width: 100%;">
                        <option>Select</option>
                        @foreach ($data as $element)

                        <option value="{{$element->id}}" @if(!empty($getdata->section_id) && $getdata->section_id == $element->id ) selected="" @endif>{{$element->name}}</option>
                        
                           
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="category_image" class="custom-file-input" id="category_image">
                            <label class="custom-file-label" for="category_image">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                      </div>
                      @if(!empty($getdata->category_image))
          <div style="margin-top: -15px;">
              <img width="70px" height="50px" src="{{ asset('images/category_images/'.$getdata->category_image) }}"> <a class="confirmDelete" record="category-image" recordid="{{$getdata->id}}" href="javascript:void(0)"> &nbsp;&nbsp;&nbsp;Delete Image</a>
          </div>

                      @endif
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_discount">Category Discount </label>
                        <input type="text" class="form-control" name="category_discount" id="category_discount" placeholder="Category Name" @if(!empty($getdata->category_discount)) value="{{$getdata->category_discount}}" @else value="{{ old('category_discount') }}" @endif>
                    </div>
                    <div class="form-group">
                            <label>Category Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter ..." >@if(!empty($getdata->description)) {{$getdata->description}} @else {{ old('description') }} @endif</textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">Category Url </label>
                        <input type="text" class="form-control" name="url" id="url" placeholder="Category Name" @if(!empty($getdata->url)) value="{{$getdata->url}}" @else value="{{ old('url') }}" @endif>
                    </div>
                    <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <textarea name="meta_title" id="meta_title" class="form-control" rows="3" placeholder="Enter ...">@if(!empty($getdata->meta_title)) {{$getdata->meta_title}} @else {{ old('meta_title') }} @endif</textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" class="form-control" rows="3" placeholder="Enter ..." >@if(!empty($getdata->meta_description)) {{$getdata->meta_description}} @else {{ old('meta_description') }} @endif</textarea>
                    </div>
                   
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="3" placeholder="Enter ..." > @if(!empty($getdata->meta_keywords)) {{$getdata->meta_keywords}} @else {{ old('meta_keywords') }} @endif </textarea>
                    </div>
                  </div>

                </div>
      

              </div>

              <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </div>
        </form>
      </div>
    </section>

  </div>








@endsection
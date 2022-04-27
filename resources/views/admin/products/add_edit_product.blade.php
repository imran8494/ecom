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
              <li class="breadcrumb-item active">Products</li>
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
        <form class="form-horizontal" name="ProductForm" id="ProductForm" method="post" @if(!empty($getdata->id)) action="{{ route('edit_product',$getdata->id) }}" @else action="{{ route('add_product') }}" @endif enctype="multipart/form-data">@csrf
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
                      <label>Select Category</label>
                      <select name="category_id" id="category_id" class="form-control select2" style="width: 100%;">
                        <option>Select</option>
                        @foreach ($categories as $section)
                            <optgroup label="{{$section->name}}" ></optgroup>
                            @foreach ($section->categories as $category)
                                <option value="{{$category->id}}" @if(!empty(@old('category_id')) && $category->id == @old('category_id')) selected="" @endif @if(!empty($getdata->category_id) && $getdata->category_id == $category->id) selected @endif>&nbsp;--&nbsp;&nbsp;{{$category->category_name}}</option>
                                @foreach ($category->subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}" @if(!empty(@old('category_id')) && $subcategory->id == @old('category_id')) selected="" @endif  @if(!empty($getdata->category_id) && $getdata->category_id == $subcategory->id) selected @endif >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;{{$subcategory->category_name}}</option>
                                @endforeach
                            @endforeach 
                        @endforeach 
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_code">Product Code </label>
                        <input type="text" name="product_code" class="form-control" id="product_code" placeholder="Product Code" @if(!empty($getdata->product_code)) value="{{$getdata->product_code}}" @else value="{{ old('product_code') }}" @endif>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_name">Product Name </label>
                        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name" @if(!empty($getdata->product_name)) value="{{$getdata->product_name}}" @else value="{{ old('product_name') }}" @endif>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="brand_id">Brand</label>

                    <select name="brand_id" id="brand_id" class="form-control select2" style="width: 100%;">
                      <option>Select</option>
                      @foreach ($brands as $brand)
                          <option value="{{$brand->id}}" @if(!empty($getdata->brand_id) && $getdata->brand_id == $brand->id) selected @endif {{ old('brand') == $brand ? "selected" : "" }}>{{$brand->brand_name}}</option>
                      @endforeach
                      
                    </select>
                </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_color">Product Color </label>
                        <input type="text" name="product_color" class="form-control" id="product_color" placeholder="product Name" @if(!empty($getdata->product_color)) value="{{$getdata->product_color}}" @else value="{{ old('product_color') }}" @endif>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_price">Product Price </label>
                        <input type="text" name="product_price" class="form-control" id="product_price" placeholder="product Name" @if(!empty($getdata->product_price)) value="{{$getdata->product_price}}" @else value="{{ old('product_price') }}" @endif>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_weight">Product Weight </label>
                        <input type="text" name="product_weight" class="form-control" id="product_weight" placeholder="product Name" @if(!empty($getdata->product_weight)) value="{{$getdata->product_weight}}" @else value="{{ old('product_weight') }}" @endif>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_discount">Product Discount(%) </label>
                        <input type="text" name="product_discount" class="form-control" id="product_discount" placeholder="product Name" @if(!empty($getdata->product_discount)) value="{{$getdata->product_discount}}" @else value="{{ old('product_discount') }}" @endif>
                    </div>
                  </div>
                  <div class="col-md-6">
                    
                    <div class="form-group">
                        <label for="exampleInputFile">Product Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="product_image" class="custom-file-input" id="product_image">
                            <label class="custom-file-label" for="product_image">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                      Recommended size:(1040x1200)
                      </div>
                  </div>
                  <div class="col-md-6">
                    
                    <div class="form-group">
                        <label for="exampleInputFile">Product Video</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="product_video" class="custom-file-input" id="product_video">
                            <label class="custom-file-label" for="product_video">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                      </div>
                      
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Fabric</label>
                      <select name="fabric" id="fabric" class="form-control select2" style="width: 100%;">
                        <option>Select</option>
                        @foreach ($fabric as $fabric)
                            <option value="{{$fabric}}" @if(!empty($getdata->fabric) && $getdata->fabric == $fabric) selected @endif {{ old('fabric') == $fabric ? "selected" : "" }}>{{$fabric}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Sleeve</label>
                      <select name="sleeve" id="sleeve" class="form-control select2" style="width: 100%;">
                        <option>Select</option>
                        @foreach ($sleeve as $sleeve)
                            <option value="{{$sleeve}}" @if(!empty($getdata->sleeve) && $getdata->sleeve == $sleeve) selected @endif {{ old('sleeve') == $sleeve ? "selected" : "" }}>{{$sleeve}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Pattern</label>
                      <select name="pattern" id="pattern" class="form-control select2" style="width: 100%;">
                        <option>Select</option>
                        @foreach ($pattern as $pattern)
                            <option value="{{$pattern}}" @if(!empty($getdata->pattern) && $getdata->pattern == $pattern) selected @endif {{ old('pattern') == $pattern ? "selected" : "" }}>{{$pattern}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Fit</label>
                      <select name="fit" id="fit" class="form-control select2" style="width: 100%;">
                        <option>Select</option>
                        @foreach ($fit as $fit)
                            <option value="{{$fit}}" @if(!empty($getdata->fit) && $getdata->fit == $fit) selected @endif {{ old('fit') == $fit ? "selected" : "" }}>{{$fit}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Occasion</label>
                      <select name="occasion" id="occasion" class="form-control select2" style="width: 100%;">
                        <option>Select</option>
                        @foreach ($occasion as $occasion)
                            <option value="{{$occasion}}" @if(!empty($getdata->occasion) && $getdata->occasion == $occasion) selected @endif {{ old('occasion') == $occasion ? "selected" : "" }}>{{$occasion}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                            <label for="meta_keywords">Is Featured Products</label>
                            <br><input type="checkbox" name="is_featured" id="is_featured" @if(!empty($getdata->is_featured) && $getdata->is_featured == 'Yes') checked @endif>&nbsp;&nbsp;&nbsp;Yes
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                            <label>Product Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter ..." >@if(!empty($getdata->description)) {{$getdata->description}} @else {{ old('description') }} @endif</textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                            <label>Wash Care</label>
                            <textarea name="wash_care" id="wash_care" class="form-control" rows="3" placeholder="Enter ..." >@if(!empty($getdata->wash_care)) {{$getdata->wash_care}} @else {{ old('wash_care') }} @endif</textarea>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
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
                            <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="3"placeholder="Enter ..." > @if(!empty($getdata->meta_keywords)) {{$getdata->meta_keywords}} @else {{ old('meta_keywords') }} @endif </textarea>
                    </div>
                  </div>
                  

                </div>
                <div class="float-right">
                  <button id="send_form" type="submit" class="btn btn-primary">Save</button>
              </div>

              </div>

          
            </div>
        </form>
      </div>
    </section>

  </div>








@endsection
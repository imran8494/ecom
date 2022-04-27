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
                            <li class="breadcrumb-item active">Product Attribute</li>
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
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form name="ProductForm" id="ProductForm" method="post"
                    action="{{ route('submit_product_attribute', $data->id) }}">@csrf
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Product Attribute</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Product Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email"
                                                value="{{ $data->product_name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Product Code</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3"
                                                value="{{ $data->product_code }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Product Color</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email"
                                                value="{{ $data->product_color }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if ($data->product_image != null)
                                        <img style="width: 145px;height:145px;"
                                            src="{{ asset('images/product_images/large/' . $data->product_image) }}"
                                            alt="">

                                    @else
                                        <img style="width: 145px;height:145px;"
                                            src="{{ asset('images/product_images/small/dummy-images.jpg') }}" alt="">

                                    @endif
                                </div>
                            </div>
                            <table class="table" id="dynamicTable">

                                <tr>
                                    <th>Size</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Add or Remove</th>
                                </tr>

                                <tr>

                                    <td>
                                        <input type="text" name="size[]" placeholder="Size" class="form-control" required />
                                    </td>
                                    <td>
                                        <input type="text" name="sku[]" placeholder="SKU" class="form-control" required />
                                    </td>
                                    <td>
                                        <input type="number" name="price[]" placeholder="Price" class="form-control"
                                            required />
                                    </td>
                                    <td>
                                        <input type="number" name="stock[]" placeholder="Stock" class="form-control"
                                            required />
                                    </td>

                                    <td>
                                        <button type="button" name="add" id="add_more" class="btn btn-success">+
                                        </button>
                                    </td>

                                </tr>

                            </table>
                            <div class="float-right">
                                <button id="send_form" type="submit" class="btn btn-primary">Add Attributes</button>
                            </div>

                        </div>


                    </div>
                </form>

                <!-- /.card-header -->
                <div class="card">
                    <div class="card-body">
                        <form name="updatePrAttr" id="updatePrAttr" method="post"
                            action="{{ route('update_product_attribute') }}">@csrf
                            <table id="sections" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Size</th>
                                        <th>Sku</th>
                                        <th>Price</th>
                                        <th>Stock </th>
                                        <th>Status </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->attributes as $attribute)
                                        <tr>
                                            <input type="hidden" name="attribute_id[]" value="{{ $attribute->id }}">
                                            <td>{{ $sl++ }}</td>
                                            <td>{{ $attribute->size }}</td>
                                            <td>{{ $attribute->sku }}</td>
                                            <td>
                                                <input type="number" class="form-control" name="price[]"
                                                    value="{{ $attribute->price }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="stock[]"
                                                    value="{{ $attribute->stock }}">
                                            </td>
                                            <td>
                                                {{-- {!! show_data_status($attribute->status) !!} --}}
                                                @if ($attribute->status == 1)
                                                    <a class="updateattributetatus" id="attribute_{{ $attribute->id }}"
                                                        attribute_id="{{ $attribute->id }}"
                                                        data-target="{{ route('update_product_attribute_status') }}"
                                                        href="javascript:void(0)">Active</a>
                                                @else
                                                    <a class="updateattributetatus" id="attribute_{{ $attribute->id }}"
                                                        attribute_id="{{ $attribute->id }}" data-target="{{ route('update_product_attribute_status') }}"
                                                        href="javascript:void(0)">Inactive</a>
                                                @endif

                                            </td>
                                            <td>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-xs btn-warning confirmDelete"
                                                    data-toggle="tooltip" data-placement="top" record="product"
                                                    recordid="{{ $attribute->id }}"
                                                    data-target="{{ route('delete_product_attribute', $attribute->id) }}"
                                                    title="Delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="footer mt-2">
                                <div class="float-right">
                                    <button id="send_form" type="submit" class="btn btn-primary">Update Attributes</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- /.card-body -->
                </div>


            </div>
        </section>

    </div>








@endsection

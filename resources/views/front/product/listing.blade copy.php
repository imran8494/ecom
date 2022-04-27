@extends('layouts.front_layouts.front_layout')
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <!--features_items-->
            <h2 class="title text-center"> {{ $cat_details['category_details']['category_name'] }} </h2>
            <p style="font-size: 13px;">{{ $cat_details['category_details']['description'] }}</p>
            <div class="row">
                <div class="col-md-4 text-left">
                    <h5>
                        <span class="badge badge-info"> {{ count($cat_products) }}</span>
                        <span>products are available</span>
                    </h5>
                </div>
                <div class="col-md-4 text-right">
                    <h5>Sort By</h5>
                </div>
                <div class="col-md-4 text-left">
                    <form id="sort_product" name="sort_product">
                        <select name="sort" id="sort" style="width: 96%">
                            <option>Select</option>
                            <option value="latest_products" @if (isset($_GET['sort']) && $_GET['sort'] == 'latest_products') selected @endif>Latest Products</option>
                            <option value="product_a_z" @if (isset($_GET['sort']) && $_GET['sort'] == 'product_a_z') selected @endif>Product name (A - Z)</option>
                            <option value="product_z_a" @if (isset($_GET['sort']) && $_GET['sort'] == 'product_z_a') selected @endif>Product name (Z - A)</option>
                            <option value="lowest_price" @if (isset($_GET['sort']) && $_GET['sort'] == 'lowest_price') selected @endif>Price lowest first</option>
                            <option value="highest_price" @if (isset($_GET['sort']) && $_GET['sort'] == 'highest_price') selected @endif>Price highest first</option>
                        </select>
                    </form>
                </div>
            </div>
            @foreach ($cat_products as $item)

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                @php
                                    $product_image_path = 'images/product_images/medium/' . $item->product_image;
                                @endphp
                                @if (!empty($item->product_image) && file_exists($product_image_path))
                                    <img src="{{ asset($product_image_path) }}" alt="" />

                                @else
                                    <img src="{{ asset('images/product_images/medium/520x600.png') }}" alt="" />

                                @endif
                                <h2>${{ $item->product_price }}</h2>
                                <p>{{ $item->product_name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                    cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>${{ $item->product_price }}</h2>
                                    <p>{{ $item->product_name }}</p>

                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                        to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                @if (!empty($item->brands['brand_name']))
                                    <li><a href="#"><i class="fa fa-plus-square"></i>{{ $item->brands['brand_name'] }}</a>
                                    </li>
                                @else
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Non Brand</a></li>

                                @endif
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="text-right">
            <div class="pagination">
                @if (isset($_GET['sort']) && !empty($_GET['sort']))
                    {{ $cat_products->appends(['sort' => $_GET['sort']])->links() }}
                @else
                    {{ $cat_products->links() }}
                @endif

            </div>
        </div>

        <!--features_items-->
    </div>
@endsection

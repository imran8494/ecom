@extends('layouts.front_layouts.front_layout')
@section('content')
<div class="col-sm-9">
    <ol class="breadcrumb float-sm-right">
      <li ><a href="{{ route('home') }}">Home</a></li>
      <li ><a href="{{ url('/'. $cat_details['category_details']['url']) }}">{{  $cat_details['category_details']['category_name']}}</a></li>
    </ol>
  </div>
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
                        <input type="hidden" name="url" id="url" value="{{ $url }}">
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
            <div class="filter_products">
            @include('front.product.ajax_filter_products')
        </div>

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

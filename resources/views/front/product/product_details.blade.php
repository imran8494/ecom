@php
    use App\Models\Product;
@endphp
@extends('layouts.front_layouts.front_layout')
@section('content')
    <div class="col-sm-9">
        <ol class="breadcrumb float-sm-right">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a
                    href="{{ url('/' . $product_details['category']['url']) }}">{{ $product_details['category']['category_name'] }}</a>
            </li>
            <li>{{ $product_details['product_name'] }}</li>
        </ol>
    </div>

    <div class="col-sm-9 padding-right">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('error_message'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="product-details">
            <!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{ asset('images/product_images/details/' . $product_details['product_image']) }}"
                        alt="" />
                    <h3>ZOOM</h3>
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->

                    <div class="carousel-inner">
                        @foreach ($mlt_img_arr as $key => $mltpl_images)

                            <div class="item i=@if ($key==0) active @endif ">

                                                 @foreach ($mltpl_images as $images)

                                <a href=""><img
                                        src="{{ asset('images/product_images/details_slider/' . $images['images']) }}"
                                        alt=""></a>

                        @endforeach

                    </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>

        </div>

        <div class="col-sm-7">
            <form method="post" action="{{ route('add_to_cart') }}">@csrf
                <div class="product-information">
                    <!--/product-information-->
                    <img src="{{ asset('front/images/product-details/new.jpg') }}" class="newarrival" alt="" />
                    <h2>{{ $product_details['product_name'] }}</h2>
                    <p>Web ID: 1089772</p>
                    <img src="{{ asset('front/images/product-details/rating.png') }}" alt="" /><br>

                    @php
                        $discounted_price = Product::discounted_price($product_details['id']);
                        
                    @endphp
                    @if ($discounted_price > 0)
                        <h3 id="cut_price"><del style="color: black;">$
                                    {{ $product_details['product_price'] }}</del></h3>
                    @endif

                    <span>
                        <input type="hidden" name="price" value="{{ $product_details['product_price'] }}">
                        <input type="hidden" name="product_id" value="{{ $product_details['id'] }}">


                        @if ($discounted_price > 0)
                            <span class="get_price">$ {{ $discounted_price }}</span>
                        @else
                            <span class="get_price">$ {{ $product_details['product_price'] }}</span>
                        @endif
                        <label>Quantity:</label>
                        <input type="number" name="quantity" required />
                        <button type="submit" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                    </span>
                    <div class="control-group">
                        <select style="width: 50%;" route="{{ route('get_price') }}" name="size" id="size">
                            <option>Select Size</option>
                            @foreach ($product_details['attributes'] as $attributes)
                                <option value="{{ $attributes['id'] }}">{{ $attributes['size'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <p><b><select name="" id=""><option value="">Select</option><option value="">adfasdf</option> </select> </b> In Stock</p> --}}
                    <p><b>Availability:</b>{{ $items_available }} items in stock</p>
                    <p><b>Condition:</b> New</p>
                    <p><b>Brand:</b> {{ $product_details['brands']['brand_name'] }}</p>
                    <a href=""><img src="{{ asset('front/images/product-details/share.png') }}"
                            class="share img-responsive" alt="" /></a>
                </div>
            </form>
            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->

    <div class="category-tab shop-details-tab">
        <!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#details" data-toggle="tab">Details</a></li>
                {{-- <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li> --}}
                <li><a href="#tag" data-toggle="tab">Tag</a></li>
                <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="details">
                <table class="table table-hover">
                    <tr>
                        <td width="30%">Product Code</td>
                        <td>: {{ $product_details['product_code'] }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Product Color</td>
                        <td>: {{ $product_details['product_color'] }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Product Weight</td>
                        <td>: {{ $product_details['product_weight'] }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Wash Care</td>
                        <td>: {{ $product_details['wash_care'] }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Febric</td>
                        <td>: {{ $product_details['fabric'] }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Sleeve</td>
                        <td>: {{ $product_details['pattern'] }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Pattern</td>
                        <td>: {{ $product_details['sleeve'] }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Fit</td>
                        <td>: {{ $product_details['fit'] }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Occasion</td>
                        <td>: {{ $product_details['occasion'] }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Meta Title</td>
                        <td>: {{ $product_details['meta_title'] }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Meta Description</td>
                        <td>: {{ $product_details['meta_description'] }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Meta Keywords</td>
                        <td>: {{ $product_details['meta_keywords'] }}</td>
                    </tr>
                </table>

            </div>

            {{-- <div class="tab-pane fade" id="companyprofile">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('front/images/home/gallery1.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('front/images/home/gallery3.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('front/images/home/gallery2.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('front/images/home/gallery4.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="tab-pane fade" id="tag">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('front/images/home/gallery1.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('front/images/home/gallery2.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('front/images/home/gallery3.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('front/images/home/gallery4.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade active in" id="reviews">
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p>{{ $product_details['description'] }}</p>
                    <p><b>Write Your Review</b></p>

                    <form action="#">
                        <span>
                            <input type="text" placeholder="Your Name" />
                            <input type="email" placeholder="Email Address" />
                        </span>
                        <textarea name=""></textarea>
                        <b>Rating: </b> <img src="{{ asset('front/images/product-details/rating.png') }}" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--/category-tab-->

    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">Related products</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($rel_pr_arr_chnk as $key => $rel_products)

                    <div class="item @if ($key==0) active @endif ">
                                   @foreach ($rel_products as $products)
                        <a href="{{ url('/product-details/' . $products['id'] . '/' . $products['product_name']) }}">
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">


                                            @php
                                                $product_image_path = 'images/product_images/recommended/' . $products['product_image'];
                                            @endphp
                                            @if (!empty($products['product_image']) && file_exists($product_image_path))
                                                <img src="{{ asset($product_image_path) }}" alt="" />

                                            @else
                                                <img src="{{ asset('images/product_images/medium/520x600.png') }}"
                                                    alt="" />

                                            @endif

                                            <h2>
                                                @php
                            $discounted_price = Product::discounted_price($products['id']);
                            
                        @endphp
                        @if ($discounted_price > 0)
                            <del style="color: black;">$ {{ $products['product_price'] }}</del>
                            $ {{ $discounted_price }}
                        @else
                            $ {{ $products['product_price'] }}
                        @endif 
                                            
                                            
                                            </h2>
                                            <p>{{ $products['product_name'] }}</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                @endforeach

            </div>
            @endforeach
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
    </div>
    <!--/recommended_items-->

    </div>
@endsection

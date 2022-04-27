@php
use App\Models\Product;

@endphp
@foreach ($cat_products as $item)

    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    @php
                        $product_image_path = 'images/product_images/featured_images/' . $item->product_image;
                    @endphp
                    @if (!empty($item->product_image) && file_exists($product_image_path))
                        <img src="{{ asset($product_image_path) }}" alt="" />

                    @else
                        <img src="{{ asset('images/product_images/medium/520x600.png') }}" alt="" />

                    @endif
                    <h2>
                        @php
                            $discounted_price = Product::discounted_price($item->id);
                            
                        @endphp
                        @if ($discounted_price > 0)
                            <del style="color: black;">$ {{ $item->product_price }}</del>
                            $ {{ $discounted_price }}
                        @else
                            $ {{ $item->product_price }}
                        @endif
                    </h2>
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
                    <li><a href="{{ url('/product-details/' . $item->id . '/' . $item->product_name) }}"><i
                                class="fa fa-plus-square"></i>Product Details</a></li>

                </ul>
            </div>
        </div>
    </div>
@endforeach

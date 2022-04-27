<?php
use App\Models\Section;

$get_section = Section::sections();
// echo "<pre>";print_r($get_section);
?>
<div class="col-sm-3" >
    <div class="left-sidebar" id="side_bars">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian">
            <!--category-productsr-->


            <div class="panel panel-default">
                @foreach ($get_section as $section)
                    @if (count($section->categories) > 0)
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="#{{ $section->name }}">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    {{ $section->name }}
                                </a>
                            </h4>
                        </div>
                        <div id="{{ $section->name }}" class="panel-collapse collapse">
                            <div class="panel-body">
                                @foreach ($section->categories as $category)

                                    <ul>
                                        <li><a href="{{ url('/'.$category->url) }}">{{ $category->category_name }} </a></li>
                                        @foreach ($category->subcategories as $subcategory)
                                            <li> --<a
                                                    href="{{ url('/'.$subcategory->url) }}">{{ $subcategory->category_name }}
                                                </a></li>
                                        @endforeach

                                    </ul>
                                @endforeach

                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
        <!--/category-products-->

        <div class="brands_products">
            <!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                    <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                    <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                    <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                    <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                    <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                    <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                </ul>
            </div>
        </div>
        <!--/brands_products-->
        @if (isset($page_name) && $page_name == 'listing')

            <div class="brands_products">
                <!--brands_products-->
                <h2>Filters</h2>
                <div class="brands-name">
                    <ul class="nav  nav-stacked">
                        <li><a style="color: #FE980F;">Fabric</a></li>
                        @foreach ($fabric as $fabrics)
                            <li><a> &nbsp;<input class="fabric" type="checkbox" name="fabric[]"
                                        id="{{ $fabrics }}" value="{{ $fabrics }}"> {{ $fabrics }}</a></li>
                        @endforeach
                        <li><a style="color: #FE980F;">Sleeve</a></li>
                        @foreach ($sleeve as $sleeves)
                            <li><a> &nbsp;<input class="sleeve" type="checkbox" name="sleeve[]"
                                        id="{{ $sleeves }}" value="{{ $sleeves }}"> {{ $sleeves }}</a></li>
                    @endforeach
                        <li><a style="color: #FE980F;">Pattern</a></li>
                        @foreach ($pattern as $patterns)
                            <li><a> &nbsp;<input class="pattern" type="checkbox" value="{{ $patterns }}" name="pattern[]"
                                        id="{{ $patterns }}"> {{ $patterns }}</a></li>
                        @endforeach
                        <li><a style="color: #FE980F;">Fit</a></li>
                        @foreach ($fit as $fits)
                            <li><a> &nbsp;<input class="fit" type="checkbox" value="{{ $fits }}" name="fit[]"
                                        id="{{ $fits }}"> {{ $fits }}</a></li>
                        @endforeach
                        <li><a style="color: #FE980F;">Occasion</a></li>
                        @foreach ($occasion as $occasions)
                            <li><a> &nbsp;<input class="occasion" type="checkbox" value="{{ $occasions }}" name="occasion[]"
                                        id="{{ $occasions }}"> {{ $occasions }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="price-range">
            <!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5"
                    data-slider-value="[250,450]" id="sl2"><br />
                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div>
        <!--/price-range-->
        <!--shipping-->
        {{-- <div class="shipping text-center">
            <img src="{{ asset('front/images/home/shipping.jpg') }}" alt="" />
        </div> --}}
        <!--/shipping-->

    </div>
</div>

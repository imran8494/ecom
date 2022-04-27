@php
use App\Models\Banner;
$banners = Banner::get_banners();
// dd($banner);die;
@endphp
@if (isset($page_name) && $page_name == 'Index')
    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">


                            @foreach ($banners as $key => $banner)


                                <div class="item @if ($key==1) active @endif ">
                                <div class=" col-sm-6">
                                    <h1>{{ $banner->company_name }}</h1>
                                    <h2>{{ $banner->title }}</h2>
                                    <p>{{ $banner->details }}</p>

                                    <a @if (!empty($banner->link)) href="{{ $banner->link }}"
                                    @else
                                        href="{{ $banner->link }}" @endif><button
                                            type="button" class="btn btn-default get">Get it now</button></a>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('images/banner_images/' . $banner->image) }}"
                                        class="girl img-responsive" alt="{{ $banner->alt }}" />
                                    {{-- <img src="{{ asset('front/images/home/pricing.png') }}"  class="pricing" alt="" /> --}}
                                </div>
                        </div>



@endforeach


</div>

<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
    <i class="fa fa-angle-left"></i>
</a>
<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
    <i class="fa fa-angle-right"></i>
</a>
</div>

</div>
</div>
</div>
</section>
<!--/slider-->
@endif

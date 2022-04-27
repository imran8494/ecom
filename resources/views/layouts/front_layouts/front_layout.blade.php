<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('front/js/html5shiv.js') }}"></script>
    <script src="{{ asset('front/js/respond.min.js') }}"></script>
    <![endif]-->
    {{-- <link rel="stylesheet" href="{{ asset('front/css/intlTelInput.css') }}"> --}}

    <link rel="shortcut icon" href="{{ asset('front/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('front/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('front/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('front/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"
        href="{{ asset('front/images/ico/apple-touch-icon-57-precomposed.png') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
</head>
<!--/head-->

<body>

    @include('layouts.front_layouts.front_header')
    @include('layouts.front_layouts.front_slider')
    <section>
        <div class="container">
            <div class="row">
                @include('layouts.front_layouts.front_sidebar')

                @yield('content')
            </div>
        </div>
    </section>

    @include('layouts.front_layouts.front_footer')


    <script src="{{ asset('front/js/jquery.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('front/js/price-range.js') }}"></script>
    {{-- <script src="{{asset('front/js/intlTelInput.js')}}"></script> --}}

    <script src="{{ asset('front/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script src="{{ asset('front/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('front/js/front_script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>

    <script>

    var input = document.querySelector("#phone");

    window.intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function(success) {
            // Get your api-key at https://ipdata.co/
            fetch("https://api.ipdata.co/?api-key=test")
                .then(function(response) {
                    if (!response.ok) return success("");
                    return response.json();
                })
                .then(function(ipdata) {
                    success(ipdata.country_code);
                });
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js",
    });




    // active sidebar

    $(function () {
        var url = window.location;
        // for single sidebar menu
        $('ul.nav-sidebar a').filter(function () {
            return this.href == url;
        }).addClass('active');

        // for sidebar menu and treeview
        $('ul.nav-treeview a').filter(function () {
            return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview")
            .css({'display': 'block'})
            .addClass('menu-open').prev('a')
            .addClass('active');
    });




</script>

</body>

</html>

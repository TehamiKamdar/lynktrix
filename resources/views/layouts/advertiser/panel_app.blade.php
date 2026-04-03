<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" href="{{ \App\Helper\Static\Methods::staticAsset("img/favicon.png") }}">

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- inject:css-->
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/bootstrap/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/fontawesome.css") }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/line-awesome.min.css") }}">

    @stack('styles')

    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/style.css") }}">

    <style>
        .w-10 {
            width: 10% !important;
        }

        .navbar-left .navbar-brand {
            margin-right: 65px !important;
        }

        .navbar-left .navbar-brand svg, .navbar-left .navbar-brand img {
            max-width: 80%; !important;
        }

        .strikingDash-top-menu ul li a {
             padding: unset;
        }

        .footer-wrapper {
            padding: 10px 12px !important;
        }

        .strikingDash-top-menu ul li:hover > .subMenu, .dropdown-custom .dropdown-wrapper {
            top: 20px !important
        }
        .select2-container--default .select2-selection--multiple .select2-selection__clear {
            margin: -2px -10px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin: 10px 0 !important;
        }
        .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--multiple {
            min-height: 46px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered li,
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin: 10px 0 10px 10px !important;
        }
        .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--multiple {
            padding: unset !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin-bottom: 5px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            padding: 0 20px 0 5px !important;
        }
    </style>

</head>

<body class="top-menu layout-light overlayScroll">

@include("partial.advertiser.mobile")
@include("partial.advertiser.header")
<main class="main-content">
    @yield("content")
    @include("partial.advertiser.footer")
</main>

<div id="overlayer">
    <span class="loader-overlay">
        <div class="atbd-spin-dots spin-lg">
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
        </div>
    </span>
</div>

<script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery/jquery-3.5.1.min.js") }}"></script>
<script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery/jquery-ui.js") }}"></script>
<script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/bootstrap/popper.js") }}"></script>
<script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/bootstrap/bootstrap.min.js") }}"></script>
<script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/feather.min.js") }}"></script>

@stack('scripts')

<script>
    // Preloader
    window.addEventListener('load', function () {

        $(".loader-overlay").delay(500).fadeOut("slow");
        $("#overlayer").fadeOut(500, function () {
            $('body').removeClass('overlayScroll');
        });

        document.querySelector('body').classList.add("loaded")

        /* feather icon */
        feather.replace();

        /* sidebar collapse  */
        const sidebarToggle = document.querySelector(".sidebar-toggle");

        function sidebarCollapse() {
            $('.overlay-dark-sidebar').toggleClass('show');
            document.querySelector(".sidebar").classList.toggle("sidebar-collapse");
            document.querySelector(".sidebar").classList.toggle("collapsed");
            document.querySelector(".contents").classList.toggle("expanded");
        }

        if (sidebarToggle) {
            sidebarToggle.addEventListener("click", function (e) {
                e.preventDefault();
                sidebarCollapse();
            });
        }

        /* sidebar nav events */
        $(".sidebar_nav .has-child ul").hide();
        $(".sidebar_nav .has-child.open ul").show();
        $(".sidebar_nav .has-child >a").on("click", function (e) {
            e.preventDefault();
            $(this).parent().next("has-child").slideUp();
            $(this).parent().parent().children(".has-child").children("ul").slideUp();
            $(this).parent().parent().children(".has-child").removeClass("open");
            if ($(this).next().is(":visible")) {
                $(this).parent().removeClass("open");
            } else {
                $(this).parent().addClass("open");
                $(this).next().slideDown();
            }
        });

        /* Header mobile view */
        $(window).on('resize', function () {
            var screenSize = window.innerWidth;
            if ($(this).width() <= 767.98) {
                $(".navbar-right__menu").appendTo(".mobile-author-actions");
                // $(".search-form").appendTo(".mobile-search");
                $(".contents").addClass("expanded");
                $(".sidebar ").removeClass("sidebar-collapse");
                $(".sidebar ").addClass("collapsed");
            } else {
                $(".navbar-right__menu").appendTo(".navbar-right");
            }
        })
            .trigger("resize");

        $(window)
            .bind("resize", function () {
                var screenSize = window.innerWidth;
                if ($(this).width() > 767.98) {
                    $(".atbd-mail-sidebar").addClass("show");
                }
            })
            .trigger("resize");

        $(window)
            .bind("resize", function () {
                var screenSize = window.innerWidth;
                if ($(this).width() <= 991) {
                    $(".sidebar").removeClass("sidebar-collapse");
                    $(".sidebar").addClass("collapsed");
                    $(".sidebar-toggle").on("click", function () {
                        $(".overlay-dark-sidebar").toggleClass("show");
                    });
                    $(".overlay-dark-sidebar").on("click", function () {
                        $(this).removeClass("show");
                        $(".sidebar").removeClass("sidebar-collapse");
                        $(".sidebar").addClass("collapsed");
                    });
                }
            })
            .trigger("resize");

        /* Mobile Menu */
        $(window)
            .bind("resize", function () {
                var screenSize = window.innerWidth;
                if ($(this).width() <= 991.98) {
                    $(".menu-horizontal").appendTo(".mobile-nav-wrapper");
                }
            })
            .trigger("resize");
    });
</script>

@if(env("APP_ENV") == "production" && empty(request()->search))
    <!-- Hotjar Tracking Code for https://app.linkscircle.com/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:3451709,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
@endif

</body>
</html>

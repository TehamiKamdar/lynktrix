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
        .contents {
            padding: 60px 15px 72px 295px !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__clear {
            margin: -3px -6px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin: 10px 0 !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered li,
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin: 7px 0 7px 10px !important;
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

<body class="side-menu layout-light overlayScroll">

    @include("partial.admin.mobile")
    @include("partial.admin.header")
    <main class="main-content">
        @include("partial.admin.aside")
        @yield("content")
        @include("partial.admin.footer")
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
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/admin_extra.js") }}"></script>

    @stack("editor")

    @stack('scripts')
    @stack('extended_scripts')

</body>
</html>

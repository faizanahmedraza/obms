<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
          content="obms admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, obms admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets/cms/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/cms/images/favicon.png') }}" type="image/x-icon">
    <title>OBMS</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
          rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/vector-map.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/style.css') }}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/responsive.css') }}">
    @stack('styles')
</head>
<body>
<!-- Loader starts-->
<div class="loader-wrapper" id="loader">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start       -->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
@include('cms.layouts._header')
<!-- Page Header Ends -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
    @include('cms.layouts._sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <!-- Container-fluid starts-->
            @yield('content')
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
    @include('cms.layouts._footer')
    <!-- footer end-->
    </div>
</div>
<!-- latest jquery-->
<!-- latest jquery-->
<script src="{{ asset('assets/cms/js/jquery-3.5.1.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('assets/cms/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/cms/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('assets/cms/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('assets/cms/js/config.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('assets/cms/js/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('assets/cms/js/bootstrap/bootstrap.min.js') }}"></script>
<!-- Plugins JS start-->
<script src="{{ asset('assets/cms/js/chart/chartist/chartist.js') }}"></script>
<script src="{{ asset('assets/cms/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
<script src="{{ asset('assets/cms/js/chart/knob/knob.min.js') }}"></script>
<script src="{{ asset('assets/cms/js/chart/knob/knob-chart.js') }}"></script>
<script src="{{ asset('assets/cms/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/cms/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('assets/cms/js/prism/prism.min.js') }}"></script>
<script src="{{ asset('assets/cms/js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/cms/js/counter/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/cms/js/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/cms/js/counter/counter-custom.js') }}"></script>
<script src="{{ asset('assets/cms/js/custom-card/custom-card.js') }}"></script>
<script src="{{ asset('assets/cms/js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/cms/js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/cms/js/vector-map/map/jquery-jvectormap-us-aea-en.js') }}"></script>
<script src="{{ asset('assets/cms/js/vector-map/map/jquery-jvectormap-uk-mill-en.js') }}"></script>
<script src="{{ asset('assets/cms/js/vector-map/map/jquery-jvectormap-au-mill.js') }}"></script>
<script src="{{ asset('assets/cms/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js') }}"></script>
<script src="{{ asset('assets/cms/js/vector-map/map/jquery-jvectormap-in-mill.js') }}"></script>
<script src="{{ asset('assets/cms/js/vector-map/map/jquery-jvectormap-asia-mill.js') }}"></script>
<script src="{{ asset('assets/cms/js/dashboard/default.js') }}"></script>
<script src="{{ asset('assets/cms/js/datepicker/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('assets/cms/js/datepicker/date-picker/datepicker.en.js') }}"></script>
<script src="{{ asset('assets/cms/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('assets/cms/js/script.js') }}"></script>
<script src="{{ asset('assets/cms/js/theme-customizer/customizer.js') }}"></script>
<!-- Custom Scripts-->
@stack('scripts')
</body>
</html>
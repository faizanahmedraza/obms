<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>OBMS</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('assets/web/images/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
          rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('assets/web/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/color/theme-color.css') }}" id="jssDefault" rel="stylesheet">
    <link href="{{ asset('assets/web/css/switcher-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/responsive.css') }}" rel="stylesheet">
    @stack('styles')
</head>


<!-- page wrapper -->
<body>

<div class="boxed_wrapper">

    <!-- preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close"><i class="far fa-times"></i></div>
        </div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>
        <div class="layer layer-three"><span class="overlay"></span></div>
    </div>
    <!-- preloader end -->

    <!-- switcher menu -->
    <div class="switcher">
        <div class="switch_btn">
            <button><i class="fas fa-palette"></i></button>
        </div>
        <div class="switch_menu">
            <!-- color changer -->
            <div class="switcher_container">
                <ul id="styleOptions" title="switch styling">
                    <li>
                        <a href="javascript: void(0)" data-theme="green" class="green-color"></a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" data-theme="pink" class="pink-color"></a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" data-theme="violet" class="violet-color"></a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" data-theme="crimson" class="crimson-color"></a>
                    </li>
                    <li>
                        <a href="javascript: void(0)" data-theme="orange" class="orange-color"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end switcher menu -->


    <!-- header -->
    @include('web.layouts._header')
    <!-- header end -->

    <!-- content -->
    @yield('content')
    <!-- content end -->

    <!-- footer -->
    <footer class="main-footer">
        <div class="footer-top bg-color-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget about-widget">
                            <div class="widget-title">
                                <h3>About</h3>
                            </div>
                            <div class="text">
                                <p>Lorem ipsum dolor amet consetetur adi pisicing elit sed eiusm tempor in cididunt ut
                                    labore dolore magna aliqua enim ad minim venitam</p>
                                <p>Quis nostrud exercita laboris nisi ut aliquip commodo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget ml-70">
                            <div class="widget-title">
                                <h3>Services</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="links-list class">
                                    <li><a href="">About Us</a></li>
                                    <li><a href="">Listing</a></li>
                                    <li><a href="">How It Works</a></li>
                                    <li><a href="">Our Services</a></li>
                                    <li><a href="">Our Blog</a></li>
                                    <li><a href="">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget post-widget">
                            <div class="widget-title">
                                <h3>Top News</h3>
                            </div>
                            <div class="post-inner">
                                <div class="post">
                                    <figure class="post-thumb"><a href=""><img
                                                    src="{{ asset('assets/web/images/resource/footer-post-1.jpg') }}" alt=""></a>
                                    </figure>
                                    <h5><a href="">To Join OBMS As A Vendor</a></h5>
                                    <p>Mar 25, 2020</p>
                                </div>
                                <div class="post">
                                    <figure class="post-thumb"><a href=""><img
                                                    src="{{ asset('assets/web/images/resource/footer-post-2.jpg') }}" alt=""></a>
                                    </figure>
                                    <h5><a href="">Ways to Increase Earnings on your business</a></h5>
                                    <p>Mar 24, 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget contact-widget">
                            <div class="widget-title">
                                <h3>Contacts</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="info-list clearfix">
                                    <li><i class="fas fa-map-marker-alt"></i>BUKC Karachi, Sindh
                                    </li>
                                    <li><i class="fas fa-microphone"></i><a href="tel:23055873407">+92-332-5774617</a>
                                    </li>
                                    <li><i class="fas fa-envelope"></i><a href="mailto:info@example.com">info@obms.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="inner-box clearfix">
                    <figure class="footer-logo"><a href=""><img src="{{ asset('assets/web/images/footer-logo') }}"
                                                                            alt=""></a></figure>
                    <div class="copyright pull-left">
                        <p><a href="">OBMS</a> &copy; 2021 All Right Reserved</p>
                    </div>
                    <ul class="footer-nav pull-right clearfix">
                        <li><a href="">Terms of Service</a></li>
                        <li><a href="">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fal fa-angle-up"></span>
    </button>
</div>

{{ \TawkTo::widgetCode() }}
<!-- jequery plugins -->
<script src="{{ asset('assets/web/js/jquery.js') }}"></script>
<script src="{{ asset('assets/web/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/web/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/web/js/owl.js') }}"></script>
<script src="{{ asset('assets/web/js/wow.js') }}"></script>
<script src="{{ asset('assets/web/js/validation.js') }}"></script>
<script src="{{ asset('assets/web/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/web/js/appear.js') }}"></script>
<script src="{{ asset('assets/web/js/scrollbar.js') }}"></script>
<script src="{{ asset('assets/web/js/isotope.js') }}"></script>
<script src="{{ asset('assets/web/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/web/js/jQuery.style.switcher.min.js') }}"></script>
<script src="{{ asset('assets/web/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/web/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/web/js/nav-tool.js') }}"></script>
<!-- main-js -->
<script src="{{ asset('assets/web/js/script.js') }}"></script>
@stack('scripts')
</body><!-- End of .page_wrapper -->
</html>
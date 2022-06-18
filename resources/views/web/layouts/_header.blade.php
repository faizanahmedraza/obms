<!-- main header -->
<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="top-inner clearfix">
            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-map-marker-alt"></i>BUKC Karachi, Sindh
                    </li>
                    <li><i class="far fa-clock"></i>Mon - Sat 9.00 - 18.00</li>
                    <li><i class="far fa-phone"></i><a href="tel:2512353256">+92-332-5774617</a></li>
                </ul>
            </div>
            <div class="right-column pull-right">
                <ul class="social-links clearfix">
                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href=""><i class="fab fa-vimeo-v"></i></a></li>
                </ul>
                <div class="sign-box">
                    <a href="{{route('web.signin')}}"><i class="fas fa-user"></i>Sign In</a>
                </div>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{route('web.home')}}" class=""><img src="{{ asset('assets/web/images/logos/logo_214.png') }}" alt="" style="width: 100px;"></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="dropdown"><a href=""><span>Venues</span></a>
                                    <ul>
                                        <li><a href="{{route('web.venues',['param' => \App\Models\Venue::VENUE_TYPES[0]])}}">Lawns</a></li>
                                        <li><a href="{{route('web.venues',['param' => \App\Models\Venue::VENUE_TYPES[1]])}}">Hotels</a></li>
                                        <li><a href="{{route('web.venues',['param' => \App\Models\Venue::VENUE_TYPES[2]])}}">Resorts</a></li>
                                        <li><a href="{{route('web.venues',['param' => \App\Models\Venue::VENUE_TYPES[3]])}}">Banquet Halls</a></li>
                                        <li><a href="{{route('web.venues',['param' => \App\Models\Venue::VENUE_TYPES[4]])}}">Marriage Halls</a></li>
                                    </ul>
                                </li>
{{--                                <li class="dropdown"><a href=""><span>Events</span></a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="">Engagements</a></li>--}}
{{--                                        <li><a href="">Weddings</a></li>--}}
{{--                                        <li><a href="">After Weddings</a></li>--}}
{{--                                        <li><a href="">Birthdays</a></li>--}}
{{--                                        <li><a href="">Rehearsal Dinners</a></li>--}}
{{--                                        <li><a href="">Corporate Events</a></li>--}}
{{--                                        <li><a href="">Holiday Parties</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
                                <li class="dropdown"><a href=""><span>Vendors</span></a>
                                    <ul>
                                        <li><a href="{{route('web.vendors',['param' => \App\Models\Vendor::VENDOR_TYPES[0]])}}">Food</a></li>
                                        <li><a href="{{route('web.vendors',['param' => \App\Models\Vendor::VENDOR_TYPES[1]])}}">Makeup</a></li>
                                        <li><a href="{{route('web.vendors',['param' => \App\Models\Vendor::VENDOR_TYPES[2]])}}">Groom Wear</a></li>
                                        <li><a href="{{route('web.vendors',['param' => \App\Models\Vendor::VENDOR_TYPES[3]])}}">Bridal Wear</a></li>
                                        <li><a href="{{route('web.vendors',['param' => \App\Models\Vendor::VENDOR_TYPES[4]])}}">Rental Cars</a></li>
                                        <li><a href="{{route('web.vendors',['param' => \App\Models\Vendor::VENDOR_TYPES[5]])}}">Invites & Gifts</a></li>
{{--                                        <li><a href="{{route('web.vendors',['param' => \App\Models\Vendor::VENDOR_TYPES['food']])}}">Wedding Entertainment</a></li>--}}
                                        <li><a href="{{route('web.vendors',['param' => \App\Models\Vendor::VENDOR_TYPES[6]])}}">Jewellery & Accessories</a></li>
                                        <li><a href="{{route('web.vendors',['param' => \App\Models\Vendor::VENDOR_TYPES[7]])}}">Planning & Decor / Florists</a></li>
                                        <li><a href="{{route('web.vendors',['param' => \App\Models\Vendor::VENDOR_TYPES[8]])}}">Photographers & Choreographers</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('web.gallery')}}"><span>Gallery</span></a></li>
                                <li><a href="{{route('web.contact-us')}}"><span>Contact Us</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{route('web.home')}}"><img src="{{ asset('assets/web/images/logos/logo_214.png') }}"
                                                                     alt="" style="width: 100px;"></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->
<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">
        <div class="nav-logo"><a href="{{route('web.home')}}"><img src="{{ asset('assets/web/images/logos/logo_214.png') }}" alt=""
                                                          title="" style="width: 100px;"></a>
        </div>
        <div class="menu-outer">
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>Chicago 12, Melborne City, USA</li>
                <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                <li><a href="mailto:info@example.com">info@example.com</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href=""><span class="fab fa-twitter"></span></a></li>
                <li><a href=""><span class="fab fa-facebook-square"></span></a></li>
                <li><a href=""><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href=""><span class="fab fa-instagram"></span></a></li>
                <li><a href=""><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div>
<!-- End Mobile Menu -->
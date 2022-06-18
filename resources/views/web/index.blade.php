@extends('web.layouts.master')

@push('styles')
    <link href="{{ asset('assets/web/css/jquery.daterangepicker.css') }}" rel="stylesheet">
    <style>
        .comiseo-daterangepicker-triggerbutton.ui-button, .comiseo-daterangepicker-triggerbutton.ui-button:focus, .comiseo-daterangepicker-triggerbutton.ui-button:active {
            min-width: 100%;
            padding: 0px 20px;
            border: 1px solid #e5e7ec !important;
            background: transparent !important;
            clear: both;
            user-select: none;
            cursor: pointer;
            outline: inherit !important;
        }

        .ui-button-text:first-of-type {
            position: relative;
            display: block;
            height: 50px;
            line-height: 50px;
            font-family: 'Rubik', sans-serif !important;
            font-size: 14px;
            font-weight: 400;
            color: #808288;
            background: transparent;
            border-radius: 5px;
            text-transform: uppercase;
        }

        .comiseo-daterangepicker-triggerbutton.ui-button .ui-button-text:first-child:after {
            position: absolute;
            content: "\f107";
            font-family: 'Font Awesome 5 Pro';
            font-size: 16px;
            color: #808288;
            top: 0px;
            right: 0px;
            margin: 0px;
            font-weight: 700;
            border: none !important;
            transform: rotate(
                    0deg
            ) !important;
        }

        .ui-button-icon {
            display: none !important;
        }
    </style>
@endpush

@section('content')
    <!-- banner-section -->
    <section class="banner-section" style="background-image: url(assets/web/images/banner/banner_1.jpg);">
        <div class="auto-container">
            <div class="inner-container">
                <div class="content-box centred">
                    <h2 class="text-capitalize">We execute your dreams into reality</h2>
                    <p>Bring our space to your next event and Be a guest at your own event</p>
                </div>
                <div class="search-field">
                    <div class="inner-box">
                        <div class="top-search">
                            <form action="{{route('web.search')}}" method="POST"
                                  class="search-form">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                                        <div class="form-group">
                                            <label>Search Venue</label>
                                            <div class="field-input">
                                                <i class="fas fa-search"></i>
                                                    <input type="search" value="{{request('search')}}" name="search"
                                                           placeholder="Search by Venue, Vendor Service ..."
                                                           required="">
                                            </div>
                                        </div>
                                    </div>
                                    {{--                                    <div class="col-lg-4 col-md-6 col-sm-12 column">--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <label>Location</label>--}}
                                    {{--                                            <div class="select-box">--}}
                                    {{--                                                <i class="far fa-compass"></i>--}}
                                    {{--                                                <select class="wide">--}}
                                    {{--                                                    <option data-display="Input location">Input location</option>--}}
                                    {{--                                                    <option value="1">New York</option>--}}
                                    {{--                                                    <option value="2">California</option>--}}
                                    {{--                                                    <option value="3">London</option>--}}
                                    {{--                                                    <option value="4">Maxico</option>--}}
                                    {{--                                                </select>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="col-lg-4 col-md-6 col-sm-12 column">--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <label>Event Type</label>--}}
                                    {{--                                            <div class="select-box">--}}
                                    {{--                                                <select class="wide">--}}
                                    {{--                                                    <option value="">All Type</option>--}}
                                    {{--                                                    <option value="1">Laxury</option>--}}
                                    {{--                                                    <option value="2">Classic</option>--}}
                                    {{--                                                    <option value="3">Modern</option>--}}
                                    {{--                                                    <option value="4">New</option>--}}
                                    {{--                                                </select>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>
                                <div class="search-btn">
                                    <button type="submit"><i class="fas fa-search"></i>Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="switch_btn_one ">
                            <button class="nav-btn nav-toggler navSidebar-button clearfix search__toggler">Advanced
                                Search<i class="fas fa-angle-down"></i></button>
                            <div class="advanced-search">
                                <div class="close-btn">
                                    <a href="#" class="close-side-widget"><i class="far fa-times"></i></a>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-6 col-sm-12 column">
                                        <div class="form-group">
                                            <label>Distance from Location</label>
                                            <div class="select-box">
                                                <select class="wide">
                                                    <option data-display="Distance from Location">Distance from
                                                        Location
                                                    </option>
                                                    <option value="2">Within 1 Mile</option>
                                                    <option value="3">Within 2 Mile</option>
                                                    <option value="4">Within 3 Mile</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 column">
                                        <div class="form-group">
                                            <label>Number Of Guests</label>
                                            <div class="select-box">
                                                <select class="wide">
                                                    <option value="1">Upto 100</option>
                                                    <option value="2">Upto 200</option>
                                                    <option value="3">Upto 300</option>
                                                    <option value="4">Upto 400</option>
                                                    <option value="4">Upto 500</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 column">
                                        <div class="form-group">
                                            <label>Sort by</label>
                                            <div class="select-box">
                                                <select class="wide">
                                                    <option value="1">Top Rating</option>
                                                    <option value="2">New Rooms</option>
                                                    <option value="3">Classic Rooms</option>
                                                    <option value="4">Luxry Rooms</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 column">
                                        <div class="form-group">
                                            <label>Dates</label>
                                            <div class="field-input">
                                                <input name="date" class="ui-datepicker-multi ui-datepicker-multi-2"
                                                       placeholder="TOUR DATE" id="datepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6 col-sm-12 column">
                                        <div class="range-box">
                                            <div class="price-range">
                                                <h6>Select Price Range</h6>
                                                <div class="range-input">
                                                    <div class="input"><input type="text" class="property-amount"
                                                                              name="field-name" readonly=""></div>
                                                </div>
                                                <div class="price-range-slider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- category-section -->
    <section class="category-section centred">
        <div class="auto-container">
            <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                <ul class="category-list clearfix">
                    <li>
                        <div class="category-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-1"></i></div>
                                <h5><a href="">Engagements</a></h5>
                                <span>52</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="category-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-2"></i></div>
                                <h5><a href="">Weddings</a></h5>
                                <span>20</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="category-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-3"></i></div>
                                <h5><a href="">Birthdays</a></h5>
                                <span>35</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="category-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-4"></i></div>
                                <h5><a href="">Corporate Events</a></h5>
                                <span>10</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="category-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-5"></i></div>
                                <h5><a href="">Rehearsal Dinners</a></h5>
                                <span>27</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="more-btn"><a href="" class="theme-btn btn-one">All Categories</a></div>
            </div>
        </div>
    </section>
    <!-- category-section end -->


    <!-- feature-section -->
    <section class="feature-section sec-pad bg-color-1">
        <div class="auto-container">
            <div class="sec-title centred">
                <h5>Features</h5>
                <h2>Featured Banquets</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br/>labore
                    dolore magna aliqua enim.</p>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                         data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="assets/web/images/feature/feature-1.jpg" alt="">
                                </figure>
                                <div class="batch"><i class="icon-11"></i></div>
                                <span class="category">Featured</span>
                            </div>
                            <div class="lower-content">
                                <div class="title-text mt-3"><h4><a href="">Villa on Grand Avenue</a>
                                    </h4></div>
                                <div class="price-box clearfix">
                                    <div class="price-info pull-left">
                                        <h6>Start From</h6>
                                        <h4>$30,000.00</h4>
                                    </div>
                                    <ul class="other-option pull-right clearfix">
                                        <li><a href=""><i class="icon-12"></i></a></li>
                                        <li><a href=""><i class="icon-13"></i></a></li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                <div class="btn-box"><a href="" class="theme-btn btn-two">See
                                        Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated" data-wow-delay="300ms"
                         data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="assets/web/images/feature/feature-2.jpg" alt="">
                                </figure>
                                <div class="batch"><i class="icon-11"></i></div>
                                <span class="category">Featured</span>
                            </div>
                            <div class="lower-content">
                                <div class="title-text mt-3"><h4><a href="">Countyard Venues</a>
                                    </h4></div>
                                <div class="price-box clearfix">
                                    <div class="price-info pull-left">
                                        <h6>Start From</h6>
                                        <h4>$45,000.00</h4>
                                    </div>
                                    <ul class="other-option pull-right clearfix">
                                        <li><a href=""><i class="icon-12"></i></a></li>
                                        <li><a href=""><i class="icon-13"></i></a></li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                <div class="btn-box"><a href="" class="theme-btn btn-two">See
                                        Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated" data-wow-delay="600ms"
                         data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="assets/web/images/feature/feature-3.jpg" alt="">
                                </figure>
                                <div class="batch"><i class="icon-11"></i></div>
                                <span class="category">Featured</span>
                            </div>
                            <div class="lower-content">
                                <div class="title-text mt-3"><h4><a href="">Luxury Villa With Pool</a>
                                    </h4></div>
                                <div class="price-box clearfix">
                                    <div class="price-info pull-left">
                                        <h6>Start From</h6>
                                        <h4>$63,000.00</h4>
                                    </div>
                                    <ul class="other-option pull-right clearfix">
                                        <li><a href=""><i class="icon-12"></i></a></li>
                                        <li><a href=""><i class="icon-13"></i></a></li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                <div class="btn-box"><a href="" class="theme-btn btn-two">See
                                        Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="more-btn centred"><a href="Banquet-list.html" class="theme-btn btn-one">View All Listing</a>
            </div>
        </div>
    </section>
    <!-- feature-section end -->


    <!-- video-section -->
    <section class="video-section centred" style="background-image: url(assets/web/images/background/video-1.jpg);">
        <div class="auto-container">
            <div class="video-inner">
                <div class="video-btn">
                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image"
                       data-caption=""><i class="icon-17"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- video-section end -->


    <!-- deals-section -->
    <section class="deals-section sec-pad">
        <div class="auto-container">
            <div class="sec-title">
                <h5>Hot Banquet</h5>
                <h2>Our Best Deals</h2>
            </div>
            <div class="deals-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                <div class="single-item">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                            <div class="deals-block-one">
                                <div class="inner-box">
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">Featured</span>
                                    <div class="lower-content">
                                        <div class="title-text"><h4><a href="">Villa on Grand
                                                    Avenue</a></h4></div>
                                        <div class="price-box clearfix">
                                            <div class="price-info pull-left">
                                                <h6>Start From</h6>
                                                <h4>$30,000.00</h4>
                                            </div>
                                            <ul class="other-option pull-right clearfix">
                                                <li><a href=""><i class="icon-12"></i></a></li>
                                                <li><a href=""><i class="icon-13"></i></a></li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm tempor
                                            incididunt labore.</p>
                                        <div class="btn-box"><a href="" class="theme-btn btn-one">See
                                                Details</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                            <div class="image-box">
                                <figure class="image"><img src="assets/web/images/resource/deals-1.jpg" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-item">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                            <div class="deals-block-one">
                                <div class="inner-box">
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">Featured</span>
                                    <div class="lower-content">
                                        <div class="title-text"><h4><a href="">Countyard Venues</a></h4></div>
                                        <div class="price-box clearfix">
                                            <div class="price-info pull-left">
                                                <h6>Start From</h6>
                                                <h4>$45,000.00</h4>
                                            </div>
                                            <ul class="other-option pull-right clearfix">
                                                <li><a href=""><i class="icon-12"></i></a></li>
                                                <li><a href=""><i class="icon-13"></i></a></li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm tempor
                                            incididunt labore.</p>
                                        <div class="btn-box"><a href="" class="theme-btn btn-one">See
                                                Details</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                            <div class="image-box">
                                <figure class="image"><img src="assets/web/images/resource/deals-1.jpg" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-item">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                            <div class="deals-block-one">
                                <div class="inner-box">
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">Featured</span>
                                    <div class="lower-content">
                                        <div class="title-text"><h4><a href="">Luxury Villa With
                                                    Pool</a></h4></div>
                                        <div class="price-box clearfix">
                                            <div class="price-info pull-left">
                                                <h6>Start From</h6>
                                                <h4>$63,000.00</h4>
                                            </div>
                                            <ul class="other-option pull-right clearfix">
                                                <li><a href=""><i class="icon-12"></i></a></li>
                                                <li><a href=""><i class="icon-13"></i></a></li>
                                            </ul>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm tempor
                                            incididunt labore.</p>
                                        <div class="btn-box"><a href="" class="theme-btn btn-one">See
                                                Details</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                            <div class="image-box">
                                <figure class="image"><img src="assets/web/images/resource/deals-1.jpg" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- deals-section end -->


    <!-- testimonial-section end -->
    <section class="testimonial-section bg-color-1 centred">
        <div class="pattern-layer" style="background-image: url(assets/web/images/shape/shape-1.png);"></div>
        <div class="auto-container">
            <div class="sec-title">
                <h5>Testimonials</h5>
                <h2>What They Say About Us</h2>
            </div>
            <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                <div class="testimonial-block-one">
                    <div class="inner-box">
                        <figure class="thumb-box"><img src="assets/web/images/resource/testimonial-1.jpg" alt="">
                        </figure>
                        <div class="text">
                            <p>Our goal each day is to ensure that our residents’ needs are not only met but exceeded.
                                To make that happen we are committed to provid ing an environment in which residents can
                                enjoy.</p>
                        </div>
                        <div class="author-info">
                            <h4>Rebeka Dawson</h4>
                            <span class="designation">Instructor</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-block-one">
                    <div class="inner-box">
                        <figure class="thumb-box"><img src="assets/web/images/resource/testimonial-2.jpg" alt="">
                        </figure>
                        <div class="text">
                            <p>Our goal each day is to ensure that our residents’ needs are not only met but exceeded.
                                To make that happen we are committed to provid ing an environment in which residents can
                                enjoy.</p>
                        </div>
                        <div class="author-info">
                            <h4>Marc Kenneth</h4>
                            <span class="designation">Founder CEO</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-block-one">
                    <div class="inner-box">
                        <figure class="thumb-box"><img src="assets/web/images/resource/testimonial-1.jpg" alt="">
                        </figure>
                        <div class="text">
                            <p>Our goal each day is to ensure that our residents’ needs are not only met but exceeded.
                                To make that happen we are committed to provid ing an environment in which residents can
                                enjoy.</p>
                        </div>
                        <div class="author-info">
                            <h4>Owen Lester</h4>
                            <span class="designation">Manager</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-section end -->


    <!-- chooseus-section -->
    <section class="chooseus-section">
        <div class="auto-container">
            <div class="inner-container bg-color-2">
                <div class="upper-box clearfix">
                    <div class="sec-title light">
                        <h5>Why Choose Us?</h5>
                        <h2>Reasons To Choose Us</h2>
                    </div>
                    <div class="btn-box">
                        <a href="" class="theme-btn btn-one">All Categories</a>
                    </div>
                </div>
                <div class="lower-box">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-19"></i></div>
                                    <h4>Best Reputation Venues</h4>
                                    <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-26"></i></div>
                                    <h4>Best Vendors</h4>
                                    <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-21"></i></div>
                                    <h4>Personalized Service</h4>
                                    <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- chooseus-section end -->


    <!-- place-section -->
    <section class="place-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <h5>Top Places</h5>
                <h2>Most Popular Places</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br/>labore
                    dolore magna aliqua enim.</p>
            </div>
            <div class="sortable-masonry">
                <div class="items-container row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration brand marketing software">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/web/images/resource/place-1.jpg" alt="">
                                </figure>
                                <div class="text">
                                    <h4><a href="">GULSHAN</a></h4>
                                    <p>10 Banquets</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all brand illustration print software logo">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/web/images/resource/place-2.jpg" alt="">
                                </figure>
                                <div class="text">
                                    <h4><a href="">CLIFTON</a></h4>
                                    <p>08 Banquets</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration marketing logo">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/web/images/resource/place-3.jpg" alt="">
                                </figure>
                                <div class="text">
                                    <h4><a href="">DEFENCE VIEW</a></h4>
                                    <p>29 Banquets</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-12 masonry-item small-column all brand marketing print software">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/web/images/resource/place-4.jpg" alt="">
                                </figure>
                                <div class="text">
                                    <h4><a href="">NAZIMABAD</a></h4>
                                    <p>05 Banquets</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- place-section end -->


    <!-- team-section -->
    <section class="team-section sec-pad centred bg-color-1">
        <div class="pattern-layer" style="background-image: url(assets/web/images/shape/shape-1.png);"></div>
        <div class="auto-container">
            <div class="sec-title">
                <h5>Our Clients</h5>
                <h2>Meet Our Excellent Clients</h2>
            </div>
            <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="assets/web/images/team/team-1.jpg" alt=""></figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h4><a href="">Merrie Lewis</a></h4>
                                <span class="designation">Senior Agent</span>
                                <ul class="social-links clearfix">
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="assets/web/images/team/team-2.jpg" alt=""></figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h4><a href="">Parks Missie</a></h4>
                                <span class="designation">Senior Agent</span>
                                <ul class="social-links clearfix">
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="assets/web/images/team/team-3.jpg" alt=""></figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h4><a href="">Mariana Buenos</a></h4>
                                <span class="designation">Senior Agent</span>
                                <ul class="social-links clearfix">
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="assets/web/images/team/team-4.jpg" alt=""></figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h4><a href="">Stephen Fowler</a></h4>
                                <span class="designation">Senior Agent</span>
                                <ul class="social-links clearfix">
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="assets/web/images/team/team-5.jpg" alt=""></figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h4><a href="">Daisy Phillips</a></h4>
                                <span class="designation">Senior Agent</span>
                                <ul class="social-links clearfix">
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team-section end -->


    <!-- cta-section -->
    <section class="cta-section bg-color-2">
        <div class="pattern-layer" style="background-image: url(assets/web/images/shape/shape-2.png);"></div>
        <div class="auto-container">
            <div class="inner-box clearfix">
                <div class="text pull-left">
                    <h2>Looking to a Luxury Banquet ?</h2>
                </div>
                <div class="btn-box pull-right">
                    <a href="" class="theme-btn btn-three">Venues</a>
                    <a href="" class="theme-btn btn-one">Events</a>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-section end -->
@endsection

@push('scripts')
    <script src="{{ asset('assets/web/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/jquery.daterangepicker.min.js') }}"></script>
    <script>
        $(function () {
            $("#datepicker").daterangepicker({
                presetRanges: [{
                    text: 'Today',
                    dateStart: function () {
                        return moment()
                    },
                    dateEnd: function () {
                        return moment()
                    }
                }, {
                    text: 'Tomorrow',
                    dateStart: function () {
                        return moment().add('days', 1)
                    },
                    dateEnd: function () {
                        return moment().add('days', 1)
                    }
                }, {
                    text: 'Next 7 Days',
                    dateStart: function () {
                        return moment()
                    },
                    dateEnd: function () {
                        return moment().add('days', 6)
                    }
                }, {
                    text: 'Next Week',
                    dateStart: function () {
                        return moment().add('weeks', 1).startOf('week')
                    },
                    dateEnd: function () {
                        return moment().add('weeks', 1).endOf('week')
                    }
                }],
                applyOnMenuSelect: false,
                datepickerOptions: {
                    numberOfMonths: 2,
                    minDate: 0,
                    maxDate: null,
                    mirrorOnCollision: true,
                }
            });
        });

    </script>
@endpush
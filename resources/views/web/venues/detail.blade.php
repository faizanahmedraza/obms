@extends('web.layouts.master')

@push('styles')
@endpush

@section('content')
    <!--Page Title-->
    <section class="page-title centred" style="background-image: url({{$venue->image}});">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>{{$venue_title}} Details</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/">Home</a></li>
                    <li>{{$venue_title}} Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- agent-details -->
    <section class="agent-details">
        <div class="auto-container">
            <div class="agent-details-content">
                <div class="agents-block-one">
                    <div class="inner-box mr-0">
                        <iframe width="100%" height="583" src="{{$venue->price_per_hour}}"
                                frameborder="0" allowfullscreen=""
                                allow="vr" data-uw-styling-context="true"></iframe>
                        <div class="content-box pl-0">
                            <div class="upper clearfix">
                                <div class="title-inner pull-left">
                                    <h4>{{$venue->venue_name}}</h4>
                                    <span class="designation">{{ucwords($venue_title)}}</span>
                                </div>
                                <ul class="social-list pull-right clearfix">
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="text">
                                <p>{{$venue->additional_details}}</p>
                            </div>
                            <ul class="info clearfix mr-0">
                                <li><i class="fab fa fa-envelope"></i><a href="mailto:{{$venue->venue->user->name}}">{{$venue->venue->user->name}}</a>
                                </li>
                                <li><i class="fab fa fa-phone"></i><a href="tel:">{{$venue->venue->user->contact_number}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- agent-details end -->


    <!-- agents-page-section -->
{{--    <section class="agents-page-section agent-details-page">--}}
{{--        <div class="auto-container">--}}
{{--            <div class="row clearfix">--}}
{{--                <div class="col-lg-8 col-md-12 col-sm-12 content-side">--}}
{{--                    <div class="agents-content-side tabs-box">--}}
{{--                        <div class="group-title">--}}
{{--                            <h3>Other Banquets</h3>--}}
{{--                        </div>--}}
{{--                        <div class="item-shorting clearfix">--}}
{{--                            <div class="left-column pull-left">--}}
{{--                                <div class="tab-btn-box">--}}
{{--                                    <ul class="tab-btns tab-buttons centred clearfix">--}}
{{--                                        <li class="tab-btn active-btn" data-tab="#tab-1">Lawns</li>--}}
{{--                                        <li class="tab-btn" data-tab="#tab-2">Banquets</li>--}}
{{--                                        <li class="tab-btn" data-tab="#tab-3">Halls</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="right-column pull-right clearfix">--}}
{{--                                <div class="short-box clearfix">--}}
{{--                                    <div class="select-box">--}}
{{--                                        <select class="wide">--}}
{{--                                            <option data-display="Sort by: Newest">Sort by: Newest</option>--}}
{{--                                            <option value="1">New Arrival</option>--}}
{{--                                            <option value="2">Top Rated</option>--}}
{{--                                            <option value="3">Offer Place</option>--}}
{{--                                            <option value="4">Most Place</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="short-menu clearfix">--}}
{{--                                    <button class="list-view on"><i class="icon-35"></i></button>--}}
{{--                                    <button class="grid-view"><i class="icon-36"></i></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tabs-content">--}}
{{--                            <div class="tab active-tab" id="tab-1">--}}
{{--                                <div class="wrapper list">--}}
{{--                                    <div class="deals-list-content list-item">--}}
{{--                                        <div class="deals-block-one">--}}
{{--                                            <div class="inner-box">--}}
{{--                                                <div class="image-box">--}}
{{--                                                    <figure class="image"><img src="{{asset('assets/web/images/venues/107.jpg')}}"--}}
{{--                                                                               alt="" style="width: 320px!important; height: 330px!important;"></figure>--}}
{{--                                                    <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                    <span class="category">Featured</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="lower-content">--}}
{{--                                                    <div class="title-text"><h4><a href="property-details.html">The Ritz Banquet</a></h4></div>--}}
{{--                                                    <div class="price-box clearfix">--}}
{{--                                                        <div class="price-info pull-left">--}}
{{--                                                            <h6>Start From</h6>--}}
{{--                                                            <h4>$30,000.00</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="author-box pull-right">--}}
{{--                                                            <figure class="author-thumb">--}}
{{--                                                                <img src="assets/images/feature/author-1.jpg" alt="">--}}
{{--                                                                <span>Banquets</span>--}}
{{--                                                            </figure>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do--}}
{{--                                                        tempor incididunt labore.</p>--}}
{{--                                                    <div class="other-info-box clearfix">--}}
{{--                                                        <div class="btn-box pull-left"><a href="property-details.html"--}}
{{--                                                                                          class="theme-btn btn-two">See--}}
{{--                                                                Details</a></div>--}}
{{--                                                        <ul class="other-option pull-right clearfix">--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-12"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-13"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="deals-grid-content">--}}
{{--                                        <div class="row clearfix">--}}
{{--                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">--}}
{{--                                                <div class="feature-block-one">--}}
{{--                                                    <div class="inner-box">--}}
{{--                                                        <div class="image-box">--}}
{{--                                                            <figure class="image"><img--}}
{{--                                                                        src="{{asset('assets/web/images/venues/107.jpg')}}"--}}
{{--                                                                        alt=""></figure>--}}
{{--                                                            <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                            <span class="category">Featured</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="lower-content">--}}
{{--                                                            <div class="author-info clearfix">--}}
{{--                                                                <div class="author pull-left">--}}
{{--                                                                    <figure class="author-thumb"><img--}}
{{--                                                                                src="assets/images/feature/author-1.jpg"--}}
{{--                                                                                alt=""></figure>--}}
{{--                                                                    <h6>Banquets</h6>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="buy-btn pull-right"><a--}}
{{--                                                                            href="property-details.html">For Buy</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="title-text"><h4><a href="property-details.html">Luxury--}}
{{--                                                                        Villa With Pool</a></h4></div>--}}
{{--                                                            <div class="price-box clearfix">--}}
{{--                                                                <div class="price-info pull-left">--}}
{{--                                                                    <h6>Start From</h6>--}}
{{--                                                                    <h4>$30,000.00</h4>--}}
{{--                                                                </div>--}}
{{--                                                                <ul class="other-option pull-right clearfix">--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-12"></i></a></li>--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-13"></i></a></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing--}}
{{--                                                                sed.</p>--}}
{{--                                                            <ul class="more-details clearfix">--}}
{{--                                                                <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                                <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                                <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                            </ul>--}}
{{--                                                            <div class="btn-box"><a href="property-details.html"--}}
{{--                                                                                    class="theme-btn btn-two">See--}}
{{--                                                                    Details</a></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab" id="tab-2">--}}
{{--                                <div class="wrapper list">--}}
{{--                                    <div class="deals-list-content list-item">--}}
{{--                                        <div class="deals-block-one">--}}
{{--                                            <div class="inner-box">--}}
{{--                                                <div class="image-box">--}}
{{--                                                    <figure class="image"><img src="{{asset('assets/web/images/venues/107.jpg')}}"--}}
{{--                                                                               alt=""></figure>--}}
{{--                                                    <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                    <span class="category">Featured</span>--}}
{{--                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="lower-content">--}}
{{--                                                    <div class="title-text"><h4><a href="property-details.html">Villa on--}}
{{--                                                                Grand Avenue</a></h4></div>--}}
{{--                                                    <div class="price-box clearfix">--}}
{{--                                                        <div class="price-info pull-left">--}}
{{--                                                            <h6>Start From</h6>--}}
{{--                                                            <h4>$30,000.00</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="author-box pull-right">--}}
{{--                                                            <figure class="author-thumb">--}}
{{--                                                                <img src="assets/images/feature/author-1.jpg" alt="">--}}
{{--                                                                <span>Banquets</span>--}}
{{--                                                            </figure>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do--}}
{{--                                                        tempor incididunt labore.</p>--}}
{{--                                                    <ul class="more-details clearfix">--}}
{{--                                                        <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                        <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                        <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                    </ul>--}}
{{--                                                    <div class="other-info-box clearfix">--}}
{{--                                                        <div class="btn-box pull-left"><a href="property-details.html"--}}
{{--                                                                                          class="theme-btn btn-two">See--}}
{{--                                                                Details</a></div>--}}
{{--                                                        <ul class="other-option pull-right clearfix">--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-12"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-13"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="deals-grid-content">--}}
{{--                                        <div class="row clearfix">--}}
{{--                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">--}}
{{--                                                <div class="feature-block-one">--}}
{{--                                                    <div class="inner-box">--}}
{{--                                                        <div class="image-box">--}}
{{--                                                            <figure class="image"><img--}}
{{--                                                                        src="assets/images/feature/feature-1.jpg"--}}
{{--                                                                        alt=""></figure>--}}
{{--                                                            <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                            <span class="category">Featured</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="lower-content">--}}
{{--                                                            <div class="author-info clearfix">--}}
{{--                                                                <div class="author pull-left">--}}
{{--                                                                    <figure class="author-thumb"><img--}}
{{--                                                                                src="assets/images/feature/author-1.jpg"--}}
{{--                                                                                alt=""></figure>--}}
{{--                                                                    <h6>Banquets</h6>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="buy-btn pull-right"><a--}}
{{--                                                                            href="property-details.html">For Buy</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="title-text"><h4><a href="property-details.html">Luxury--}}
{{--                                                                        Villa With Pool</a></h4></div>--}}
{{--                                                            <div class="price-box clearfix">--}}
{{--                                                                <div class="price-info pull-left">--}}
{{--                                                                    <h6>Start From</h6>--}}
{{--                                                                    <h4>$30,000.00</h4>--}}
{{--                                                                </div>--}}
{{--                                                                <ul class="other-option pull-right clearfix">--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-12"></i></a></li>--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-13"></i></a></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing--}}
{{--                                                                sed.</p>--}}
{{--                                                            <ul class="more-details clearfix">--}}
{{--                                                                <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                                <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                                <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                            </ul>--}}
{{--                                                            <div class="btn-box"><a href="property-details.html"--}}
{{--                                                                                    class="theme-btn btn-two">See--}}
{{--                                                                    Details</a></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">--}}
{{--                                                <div class="feature-block-one">--}}
{{--                                                    <div class="inner-box">--}}
{{--                                                        <div class="image-box">--}}
{{--                                                            <figure class="image"><img--}}
{{--                                                                        src="assets/images/feature/feature-2.jpg"--}}
{{--                                                                        alt=""></figure>--}}
{{--                                                            <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                            <span class="category">Featured</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="lower-content">--}}
{{--                                                            <div class="author-info clearfix">--}}
{{--                                                                <div class="author pull-left">--}}
{{--                                                                    <figure class="author-thumb"><img--}}
{{--                                                                                src="assets/images/feature/author-2.jpg"--}}
{{--                                                                                alt=""></figure>--}}
{{--                                                                    <h6>Robert Niro</h6>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="buy-btn pull-right"><a--}}
{{--                                                                            href="property-details.html">For Rent</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="title-text"><h4><a href="property-details.html">Contemporary--}}
{{--                                                                        Apartment</a></h4></div>--}}
{{--                                                            <div class="price-box clearfix">--}}
{{--                                                                <div class="price-info pull-left">--}}
{{--                                                                    <h6>Start From</h6>--}}
{{--                                                                    <h4>$45,000.00</h4>--}}
{{--                                                                </div>--}}
{{--                                                                <ul class="other-option pull-right clearfix">--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-12"></i></a></li>--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-13"></i></a></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing--}}
{{--                                                                sed.</p>--}}
{{--                                                            <ul class="more-details clearfix">--}}
{{--                                                                <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                                <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                                <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                            </ul>--}}
{{--                                                            <div class="btn-box"><a href="property-details.html"--}}
{{--                                                                                    class="theme-btn btn-two">See--}}
{{--                                                                    Details</a></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">--}}
{{--                                                <div class="feature-block-one">--}}
{{--                                                    <div class="inner-box">--}}
{{--                                                        <div class="image-box">--}}
{{--                                                            <figure class="image"><img--}}
{{--                                                                        src="assets/images/feature/feature-3.jpg"--}}
{{--                                                                        alt=""></figure>--}}
{{--                                                            <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                            <span class="category">Featured</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="lower-content">--}}
{{--                                                            <div class="author-info clearfix">--}}
{{--                                                                <div class="author pull-left">--}}
{{--                                                                    <figure class="author-thumb"><img--}}
{{--                                                                                src="assets/images/feature/author-3.jpg"--}}
{{--                                                                                alt=""></figure>--}}
{{--                                                                    <h6>Keira Mel</h6>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="buy-btn pull-right"><a--}}
{{--                                                                            href="property-details.html">Sold Out</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="title-text"><h4><a href="property-details.html">Luxury--}}
{{--                                                                        Villa With Pool</a></h4></div>--}}
{{--                                                            <div class="price-box clearfix">--}}
{{--                                                                <div class="price-info pull-left">--}}
{{--                                                                    <h6>Start From</h6>--}}
{{--                                                                    <h4>$63,000.00</h4>--}}
{{--                                                                </div>--}}
{{--                                                                <ul class="other-option pull-right clearfix">--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-12"></i></a></li>--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-13"></i></a></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing--}}
{{--                                                                sed.</p>--}}
{{--                                                            <ul class="more-details clearfix">--}}
{{--                                                                <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                                <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                                <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                            </ul>--}}
{{--                                                            <div class="btn-box"><a href="property-details.html"--}}
{{--                                                                                    class="theme-btn btn-two">See--}}
{{--                                                                    Details</a></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">--}}
{{--                                                <div class="feature-block-one">--}}
{{--                                                    <div class="inner-box">--}}
{{--                                                        <div class="image-box">--}}
{{--                                                            <figure class="image"><img--}}
{{--                                                                        src="assets/images/feature/feature-4.jpg"--}}
{{--                                                                        alt=""></figure>--}}
{{--                                                            <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                            <span class="category">Featured</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="lower-content">--}}
{{--                                                            <div class="author-info clearfix">--}}
{{--                                                                <div class="author pull-left">--}}
{{--                                                                    <figure class="author-thumb"><img--}}
{{--                                                                                src="assets/images/feature/author-1.jpg"--}}
{{--                                                                                alt=""></figure>--}}
{{--                                                                    <h6>Banquets</h6>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="buy-btn pull-right"><a--}}
{{--                                                                            href="property-details.html">For Buy</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="title-text"><h4><a href="property-details.html">Home--}}
{{--                                                                        in Merrick Way</a></h4></div>--}}
{{--                                                            <div class="price-box clearfix">--}}
{{--                                                                <div class="price-info pull-left">--}}
{{--                                                                    <h6>Start From</h6>--}}
{{--                                                                    <h4>$30,000.00</h4>--}}
{{--                                                                </div>--}}
{{--                                                                <ul class="other-option pull-right clearfix">--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-12"></i></a></li>--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-13"></i></a></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing--}}
{{--                                                                sed.</p>--}}
{{--                                                            <ul class="more-details clearfix">--}}
{{--                                                                <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                                <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                                <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                            </ul>--}}
{{--                                                            <div class="btn-box"><a href="property-details.html"--}}
{{--                                                                                    class="theme-btn btn-two">See--}}
{{--                                                                    Details</a></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">--}}
{{--                                                <div class="feature-block-one">--}}
{{--                                                    <div class="inner-box">--}}
{{--                                                        <div class="image-box">--}}
{{--                                                            <figure class="image"><img--}}
{{--                                                                        src="assets/images/feature/feature-5.jpg"--}}
{{--                                                                        alt=""></figure>--}}
{{--                                                            <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                            <span class="category">Featured</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="lower-content">--}}
{{--                                                            <div class="author-info clearfix">--}}
{{--                                                                <div class="author pull-left">--}}
{{--                                                                    <figure class="author-thumb"><img--}}
{{--                                                                                src="assets/images/feature/author-2.jpg"--}}
{{--                                                                                alt=""></figure>--}}
{{--                                                                    <h6>Robert Niro</h6>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="buy-btn pull-right"><a--}}
{{--                                                                            href="property-details.html">For Rent</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="title-text"><h4><a href="property-details.html">Apartment--}}
{{--                                                                        in Glasgow</a></h4></div>--}}
{{--                                                            <div class="price-box clearfix">--}}
{{--                                                                <div class="price-info pull-left">--}}
{{--                                                                    <h6>Start From</h6>--}}
{{--                                                                    <h4>$45,000.00</h4>--}}
{{--                                                                </div>--}}
{{--                                                                <ul class="other-option pull-right clearfix">--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-12"></i></a></li>--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-13"></i></a></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing--}}
{{--                                                                sed.</p>--}}
{{--                                                            <ul class="more-details clearfix">--}}
{{--                                                                <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                                <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                                <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                            </ul>--}}
{{--                                                            <div class="btn-box"><a href="property-details.html"--}}
{{--                                                                                    class="theme-btn btn-two">See--}}
{{--                                                                    Details</a></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">--}}
{{--                                                <div class="feature-block-one">--}}
{{--                                                    <div class="inner-box">--}}
{{--                                                        <div class="image-box">--}}
{{--                                                            <figure class="image"><img--}}
{{--                                                                        src="assets/images/feature/feature-6.jpg"--}}
{{--                                                                        alt=""></figure>--}}
{{--                                                            <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                            <span class="category">Featured</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="lower-content">--}}
{{--                                                            <div class="author-info clearfix">--}}
{{--                                                                <div class="author pull-left">--}}
{{--                                                                    <figure class="author-thumb"><img--}}
{{--                                                                                src="assets/images/feature/author-3.jpg"--}}
{{--                                                                                alt=""></figure>--}}
{{--                                                                    <h6>Keira Mel</h6>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="buy-btn pull-right"><a--}}
{{--                                                                            href="property-details.html">Sold Out</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="title-text"><h4><a href="property-details.html">Family--}}
{{--                                                                        Home For Sale</a></h4></div>--}}
{{--                                                            <div class="price-box clearfix">--}}
{{--                                                                <div class="price-info pull-left">--}}
{{--                                                                    <h6>Start From</h6>--}}
{{--                                                                    <h4>$63,000.00</h4>--}}
{{--                                                                </div>--}}
{{--                                                                <ul class="other-option pull-right clearfix">--}}
{{--                                                                    <li><a href="agents-details.html"><i--}}
{{--                                                                                    class="icon-12"></i></a></li>--}}
{{--                                                                    <li><a href="agents-details.html"><i--}}
{{--                                                                                    class="icon-13"></i></a></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing--}}
{{--                                                                sed.</p>--}}
{{--                                                            <ul class="more-details clearfix">--}}
{{--                                                                <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                                <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                                <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                            </ul>--}}
{{--                                                            <div class="btn-box"><a href="property-details.html"--}}
{{--                                                                                    class="theme-btn btn-two">See--}}
{{--                                                                    Details</a></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab" id="tab-3">--}}
{{--                                <div class="wrapper list">--}}
{{--                                    <div class="deals-list-content list-item">--}}
{{--                                        <div class="deals-block-one">--}}
{{--                                            <div class="inner-box">--}}
{{--                                                <div class="image-box">--}}
{{--                                                    <figure class="image"><img src="assets/images/resource/deals-3.jpg"--}}
{{--                                                                               alt=""></figure>--}}
{{--                                                    <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                    <span class="category">Featured</span>--}}
{{--                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="lower-content">--}}
{{--                                                    <div class="title-text"><h4><a href="property-details.html">Villa on--}}
{{--                                                                Grand Avenue</a></h4></div>--}}
{{--                                                    <div class="price-box clearfix">--}}
{{--                                                        <div class="price-info pull-left">--}}
{{--                                                            <h6>Start From</h6>--}}
{{--                                                            <h4>$30,000.00</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="author-box pull-right">--}}
{{--                                                            <figure class="author-thumb">--}}
{{--                                                                <img src="assets/images/feature/author-1.jpg" alt="">--}}
{{--                                                                <span>Banquets</span>--}}
{{--                                                            </figure>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do--}}
{{--                                                        tempor incididunt labore.</p>--}}
{{--                                                    <ul class="more-details clearfix">--}}
{{--                                                        <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                        <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                        <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                    </ul>--}}
{{--                                                    <div class="other-info-box clearfix">--}}
{{--                                                        <div class="btn-box pull-left"><a href="property-details.html"--}}
{{--                                                                                          class="theme-btn btn-two">See--}}
{{--                                                                Details</a></div>--}}
{{--                                                        <ul class="other-option pull-right clearfix">--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-12"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-13"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="deals-block-one">--}}
{{--                                            <div class="inner-box">--}}
{{--                                                <div class="image-box">--}}
{{--                                                    <figure class="image"><img src="assets/images/resource/deals-4.jpg"--}}
{{--                                                                               alt=""></figure>--}}
{{--                                                    <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                    <span class="category">Featured</span>--}}
{{--                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="lower-content">--}}
{{--                                                    <div class="title-text"><h4><a href="property-details.html">Contemporary--}}
{{--                                                                Apartment</a></h4></div>--}}
{{--                                                    <div class="price-box clearfix">--}}
{{--                                                        <div class="price-info pull-left">--}}
{{--                                                            <h6>Start From</h6>--}}
{{--                                                            <h4>$20,000.00</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="author-box pull-right">--}}
{{--                                                            <figure class="author-thumb">--}}
{{--                                                                <img src="assets/images/feature/author-1.jpg" alt="">--}}
{{--                                                                <span>Banquets</span>--}}
{{--                                                            </figure>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do--}}
{{--                                                        tempor incididunt labore.</p>--}}
{{--                                                    <ul class="more-details clearfix">--}}
{{--                                                        <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                        <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                        <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                    </ul>--}}
{{--                                                    <div class="other-info-box clearfix">--}}
{{--                                                        <div class="btn-box pull-left"><a href="property-details.html"--}}
{{--                                                                                          class="theme-btn btn-two">See--}}
{{--                                                                Details</a></div>--}}
{{--                                                        <ul class="other-option pull-right clearfix">--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-12"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-13"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="deals-block-one">--}}
{{--                                            <div class="inner-box">--}}
{{--                                                <div class="image-box">--}}
{{--                                                    <figure class="image"><img src="assets/images/resource/deals-5.jpg"--}}
{{--                                                                               alt=""></figure>--}}
{{--                                                    <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                    <span class="category">Featured</span>--}}
{{--                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="lower-content">--}}
{{--                                                    <div class="title-text"><h4><a href="property-details.html">Luxury--}}
{{--                                                                Villa With Pool</a></h4></div>--}}
{{--                                                    <div class="price-box clearfix">--}}
{{--                                                        <div class="price-info pull-left">--}}
{{--                                                            <h6>Start From</h6>--}}
{{--                                                            <h4>$35,000.00</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="author-box pull-right">--}}
{{--                                                            <figure class="author-thumb">--}}
{{--                                                                <img src="assets/images/feature/author-1.jpg" alt="">--}}
{{--                                                                <span>Banquets</span>--}}
{{--                                                            </figure>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do--}}
{{--                                                        tempor incididunt labore.</p>--}}
{{--                                                    <ul class="more-details clearfix">--}}
{{--                                                        <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                        <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                        <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                    </ul>--}}
{{--                                                    <div class="other-info-box clearfix">--}}
{{--                                                        <div class="btn-box pull-left"><a href="property-details.html"--}}
{{--                                                                                          class="theme-btn btn-two">See--}}
{{--                                                                Details</a></div>--}}
{{--                                                        <ul class="other-option pull-right clearfix">--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-12"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-13"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="deals-block-one">--}}
{{--                                            <div class="inner-box">--}}
{{--                                                <div class="image-box">--}}
{{--                                                    <figure class="image"><img src="assets/images/resource/deals-6.jpg"--}}
{{--                                                                               alt=""></figure>--}}
{{--                                                    <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                    <span class="category">Featured</span>--}}
{{--                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="lower-content">--}}
{{--                                                    <div class="title-text"><h4><a href="property-details.html">Home in--}}
{{--                                                                Merrick Way</a></h4></div>--}}
{{--                                                    <div class="price-box clearfix">--}}
{{--                                                        <div class="price-info pull-left">--}}
{{--                                                            <h6>Start From</h6>--}}
{{--                                                            <h4>$45,000.00</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="author-box pull-right">--}}
{{--                                                            <figure class="author-thumb">--}}
{{--                                                                <img src="assets/images/feature/author-1.jpg" alt="">--}}
{{--                                                                <span>Banquets</span>--}}
{{--                                                            </figure>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do--}}
{{--                                                        tempor incididunt labore.</p>--}}
{{--                                                    <ul class="more-details clearfix">--}}
{{--                                                        <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                        <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                        <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                    </ul>--}}
{{--                                                    <div class="other-info-box clearfix">--}}
{{--                                                        <div class="btn-box pull-left"><a href="property-details.html"--}}
{{--                                                                                          class="theme-btn btn-two">See--}}
{{--                                                                Details</a></div>--}}
{{--                                                        <ul class="other-option pull-right clearfix">--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-12"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-13"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="deals-block-one">--}}
{{--                                            <div class="inner-box">--}}
{{--                                                <div class="image-box">--}}
{{--                                                    <figure class="image"><img src="assets/images/resource/deals-7.jpg"--}}
{{--                                                                               alt=""></figure>--}}
{{--                                                    <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                    <span class="category">Featured</span>--}}
{{--                                                    <div class="buy-btn"><a href="property-details.html">For Buy</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="lower-content">--}}
{{--                                                    <div class="title-text"><h4><a href="property-details.html">Apartment--}}
{{--                                                                in Glasgow</a></h4></div>--}}
{{--                                                    <div class="price-box clearfix">--}}
{{--                                                        <div class="price-info pull-left">--}}
{{--                                                            <h6>Start From</h6>--}}
{{--                                                            <h4>$40,000.00</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="author-box pull-right">--}}
{{--                                                            <figure class="author-thumb">--}}
{{--                                                                <img src="assets/images/feature/author-1.jpg" alt="">--}}
{{--                                                                <span>Banquets</span>--}}
{{--                                                            </figure>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed eiusm do--}}
{{--                                                        tempor incididunt labore.</p>--}}
{{--                                                    <ul class="more-details clearfix">--}}
{{--                                                        <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                        <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                        <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                    </ul>--}}
{{--                                                    <div class="other-info-box clearfix">--}}
{{--                                                        <div class="btn-box pull-left"><a href="property-details.html"--}}
{{--                                                                                          class="theme-btn btn-two">See--}}
{{--                                                                Details</a></div>--}}
{{--                                                        <ul class="other-option pull-right clearfix">--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-12"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                            <li><a href="property-details.html"><i class="icon-13"></i></a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="deals-grid-content">--}}
{{--                                        <div class="row clearfix">--}}
{{--                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">--}}
{{--                                                <div class="feature-block-one">--}}
{{--                                                    <div class="inner-box">--}}
{{--                                                        <div class="image-box">--}}
{{--                                                            <figure class="image"><img--}}
{{--                                                                        src="assets/images/feature/feature-1.jpg"--}}
{{--                                                                        alt=""></figure>--}}
{{--                                                            <div class="batch"><i class="icon-11"></i></div>--}}
{{--                                                            <span class="category">Featured</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="lower-content">--}}
{{--                                                            <div class="author-info clearfix">--}}
{{--                                                                <div class="author pull-left">--}}
{{--                                                                    <figure class="author-thumb"><img--}}
{{--                                                                                src="assets/images/feature/author-1.jpg"--}}
{{--                                                                                alt=""></figure>--}}
{{--                                                                    <h6>Banquets</h6>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="buy-btn pull-right"><a--}}
{{--                                                                            href="property-details.html">For Buy</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="title-text"><h4><a href="property-details.html">Luxury--}}
{{--                                                                        Villa With Pool</a></h4></div>--}}
{{--                                                            <div class="price-box clearfix">--}}
{{--                                                                <div class="price-info pull-left">--}}
{{--                                                                    <h6>Start From</h6>--}}
{{--                                                                    <h4>$30,000.00</h4>--}}
{{--                                                                </div>--}}
{{--                                                                <ul class="other-option pull-right clearfix">--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-12"></i></a></li>--}}
{{--                                                                    <li><a href="property-details.html"><i--}}
{{--                                                                                    class="icon-13"></i></a></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing--}}
{{--                                                                sed.</p>--}}
{{--                                                            <ul class="more-details clearfix">--}}
{{--                                                                <li><i class="icon-14"></i>3 Beds</li>--}}
{{--                                                                <li><i class="icon-15"></i>2 Baths</li>--}}
{{--                                                                <li><i class="icon-16"></i>600 Sq Ft</li>--}}
{{--                                                            </ul>--}}
{{--                                                            <div class="btn-box"><a href="property-details.html"--}}
{{--                                                                                    class="theme-btn btn-two">See--}}
{{--                                                                    Details</a></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">--}}
{{--                    <div class="default-sidebar agent-sidebar">--}}
{{--                        <div class="agents-contact sidebar-widget">--}}
{{--                            <div class="widget-title">--}}
{{--                                <h5>Contact To Arbat</h5>--}}
{{--                            </div>--}}
{{--                            <div class="form-inner">--}}
{{--                                <form action="https://azim.commonsupport.com/Realshed/contact.html" method="post"--}}
{{--                                      class="default-form">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="text" name="name" placeholder="Your Name" required="">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="email" name="email" placeholder="Email Address" required="">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="tel" name="phone" placeholder="Phone" required="">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <textarea name="message" placeholder="Your Message"></textarea>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <button type="submit" class="theme-btn btn-one">Send Message</button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- agents-page-section end -->
@endsection

@push('scripts')
@endpush
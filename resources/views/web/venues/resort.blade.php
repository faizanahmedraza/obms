@extends('web.layouts.master')

@push('styles')
@endpush

@section('content')
    <!--Page Title-->
    <section class="page-title centred" style="background-image: url(/assets/web/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Resorts View</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="">Home</a></li>
                    <li>Resorts List View</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- agents-page-section -->
    <section class="agents-page-section agents-list">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="default-sidebar agent-sidebar">
                        <div class="agents-search sidebar-widget">
                            <div class="widget-title">
                                <h5>Find Resort</h5>
                            </div>
                            <div class="search-inner">
                                <form action="">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Enter Resort Name" required="">
                                    </div>
                                    <div class="form-group">
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="All Categories">All Categories</option>
                                                <option value="1">New Arrival</option>
                                                <option value="2">Top Rated</option>
                                                <option value="3">Most Search</option>
                                                <option value="4">Recent Place</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="All Cities">All Cities</option>
                                                <option value="1">New York</option>
                                                <option value="2">California</option>
                                                <option value="3">London</option>
                                                <option value="4">Maxico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="theme-btn btn-one">Search Resort</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="category-widget sidebar-widget">
                            <div class="widget-title">
                                <h5>Status Of Resort</h5>
                            </div>
                            <ul class="category-list clearfix">
                                <li><a href="">For Persons <span>(200)</span></a></li>
                                <li><a href="">For Persons <span>(700)</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="agency-content-side">
                        <div class="item-shorting clearfix">
                            <div class="left-column pull-left">
                                <h5>Search Reasults: <span>Showing 1-5 of 20 Listings</span></h5>
                            </div>
                            <div class="right-column pull-right clearfix">
                                <div class="short-box clearfix">
                                    <div class="select-box">
                                        <select class="wide">
                                            <option data-display="Sort by: Newest">Sort by: Newest</option>
                                            <option value="1">New Arrival</option>
                                            <option value="2">Top Rated</option>
                                            <option value="3">Offer Place</option>
                                            <option value="4">Most Place</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="short-menu clearfix">
                                    <button class="list-view on"><i class="icon-35"></i></button>
                                    <button class="grid-view"><i class="icon-36"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="wrapper list">
                            <div class="agents-list-content list-item">
                                <div class="agents-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="{{asset('assets/web/images/venues/101.jpg')}}" style="width: 270px!important; height: 330px!important;" alt=""></figure>
                                        <div class="content-box">
                                            <div class="upper clearfix">
                                                <div class="title-inner pull-left">
                                                    <h4><a href="{{route('web.resorts.details',['id' => 1])}}">Resort Arbat</a></h4>
                                                    <span class="designation">Resort</span>
                                                </div>
                                                <ul class="social-list pull-right clearfix">
                                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="text">
                                                <p>Get the oars in the water and start rowing. Execution is the single
                                                    biggest factor...</p>
                                            </div>
                                            <ul class="info clearfix">
                                                <li><i class="fab fa fa-envelope"></i><a
                                                            href="mailto:info@realhome.com">info@arbatlawn.com</a></li>
                                                <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">030 3057
                                                        1965</a></li>
                                            </ul>
                                            <div class="btn-box">
                                                <a href="" class="theme-btn btn-two">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="agents-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="{{asset('assets/web/images/venues/102.jpg')}}" style="width: 270px!important; height: 330px!important;" alt=""></figure>
                                        <div class="content-box">
                                            <div class="upper clearfix">
                                                <div class="title-inner pull-left">
                                                    <h4><a href="">Diamond Conference Resort</a></h4>
                                                    <span class="designation">Resort</span>
                                                </div>
                                                <ul class="social-list pull-right clearfix">
                                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="text">
                                                <p>Get the oars in the water and start rowing. Execution is the single
                                                    biggest factor...</p>
                                            </div>
                                            <ul class="info clearfix">
                                                <li><i class="fab fa fa-envelope"></i><a
                                                            href="mailto:info@housetlk.com">info@diamondconference.com</a></li>
                                                <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">030 3057
                                                        1965</a></li>
                                            </ul>
                                            <div class="btn-box">
                                                <a href="" class="theme-btn btn-two">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="agents-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="{{asset('assets/web/images/venues/107.jpg')}}" style="width: 270px!important; height: 330px!important;" alt=""></figure>
                                        <div class="content-box">
                                            <div class="upper clearfix">
                                                <div class="title-inner pull-left">
                                                    <h4><a href="">Resort Hall</a></h4>
                                                    <span class="designation">Resort</span>
                                                </div>
                                                <ul class="social-list pull-right clearfix">
                                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="text">
                                                <p>Get the oars in the water and start rowing. Execution is the single
                                                    biggest factor...</p>
                                            </div>
                                            <ul class="info clearfix">
                                                <li><i class="fab fa fa-envelope"></i><a
                                                            href="mailto:info@homegarden.com">info@lawnhall.com</a>
                                                </li>
                                                <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">030 3057
                                                        1965</a></li>
                                            </ul>
                                            <div class="btn-box">
                                                <a href="" class="theme-btn btn-two">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="agents-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="{{asset('assets/web/images/venues/103.jpg')}}" style="width: 270px!important; height: 330px!important;" alt=""></figure>
                                        <div class="content-box">
                                            <div class="upper clearfix">
                                                <div class="title-inner pull-left">
                                                    <h4><a href="">Red Bar Wedding</a></h4>
                                                    <span class="designation">Resort</span>
                                                </div>
                                                <ul class="social-list pull-right clearfix">
                                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="text">
                                                <p>Get the oars in the water and start rowing. Execution is the single
                                                    biggest factor...</p>
                                            </div>
                                            <ul class="info clearfix">
                                                <li><i class="fab fa fa-envelope"></i><a
                                                            href="mailto:info@property.com">info@redbar.com</a></li>
                                                <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">030 3057
                                                        1965</a></li>
                                            </ul>
                                            <div class="btn-box">
                                                <a href="" class="theme-btn btn-two">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="agents-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="{{asset('assets/web/images/venues/104.jpg')}}" style="width: 270px!important; height: 330px!important;" alt=""></figure>
                                        <div class="content-box">
                                            <div class="upper clearfix">
                                                <div class="title-inner pull-left">
                                                    <h4><a href="">Bona Dea Wedding</a></h4>
                                                    <span class="designation">Resort</span>
                                                </div>
                                                <ul class="social-list pull-right clearfix">
                                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="text">
                                                <p>Get the oars in the water and start rowing. Execution is the single
                                                    biggest factor...</p>
                                            </div>
                                            <ul class="info clearfix">
                                                <li><i class="fab fa fa-envelope"></i><a
                                                            href="mailto:info@investment.com">info@bonadea.com</a>
                                                </li>
                                                <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">030 3057
                                                        1965</a></li>
                                            </ul>
                                            <div class="btn-box">
                                                <a href="" class="theme-btn btn-two">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="agents-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="{{asset('assets/web/images/venues/101.jpg')}}" style="width: 270px!important; height: 330px!important;" alt=""></figure>
                                        <div class="content-box">
                                            <div class="upper clearfix">
                                                <div class="title-inner pull-left">
                                                    <h4><a href="">Resortdeal</a></h4>
                                                    <span class="designation">Resort</span>
                                                </div>
                                                <ul class="social-list pull-right clearfix">
                                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="text">
                                                <p>Get the oars in the water and start rowing. Execution is the single
                                                    biggest factor...</p>
                                            </div>
                                            <ul class="info clearfix">
                                                <li><i class="fab fa fa-envelope"></i><a
                                                            href="mailto:jennifer@realshed.com">jennifer@realshed.com</a>
                                                </li>
                                                <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">030 3057
                                                        1965</a></li>
                                            </ul>
                                            <div class="btn-box">
                                                <a href="" class="theme-btn btn-two">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="agents-grid-content">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 agents-block">
                                        <div class="agents-block-two">
                                            <div class="inner-box">
                                                <figure class="image-box"><img src="{{asset('assets/web/images/venues/101.jpg')}}" style="width: 270px!important; height: 330px!important;" alt=""></figure>
                                                <div class="content-box">
                                                    <div class="title-inner">
                                                        <h4><a href="">Realhome Estate</a></h4>
                                                        <span class="designation">Resort</span>
                                                    </div>
                                                    <div class="text">
                                                        <p>Get the oars in the water and start rowing execution.</p>
                                                    </div>
                                                    <ul class="info clearfix">
                                                        <li><i class="fab fa fa-envelope"></i><a
                                                                    href="mailto:info@realhome.com">info@realhome.com</a>
                                                        </li>
                                                        <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">030
                                                                3057 1965</a></li>
                                                    </ul>
                                                    <div class="btn-box">
                                                        <a href="" class="theme-btn btn-two">View Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 agents-block">
                                        <div class="agents-block-two">
                                            <div class="inner-box">
                                                <figure class="image-box"><img src="{{asset('assets/web/images/venues/102.jpg')}}" style="width: 270px!important; height: 330px!important;" alt=""></figure>
                                                <div class="content-box">
                                                    <div class="title-inner">
                                                        <h4><a href="">Housetlk Resort</a></h4>
                                                        <span class="designation">Resort</span>
                                                    </div>
                                                    <div class="text">
                                                        <p>Get the oars in the water and start rowing execution.</p>
                                                    </div>
                                                    <ul class="info clearfix">
                                                        <li><i class="fab fa fa-envelope"></i><a
                                                                    href="mailto:info@housetlk.com">info@housetlk.com</a>
                                                        </li>
                                                        <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">030
                                                                3057 1965</a></li>
                                                    </ul>
                                                    <div class="btn-box">
                                                        <a href="" class="theme-btn btn-two">View Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 agents-block">
                                        <div class="agents-block-two">
                                            <div class="inner-box">
                                                <figure class="image-box"><img src="{{asset('assets/web/images/venues/103   .jpg')}}" style="width: 270px!important; height: 330px!important;" alt=""></figure>
                                                <div class="content-box">
                                                    <div class="title-inner">
                                                        <h4><a href="">Home & Garden</a></h4>
                                                        <span class="designation">Resort</span>
                                                    </div>
                                                    <div class="text">
                                                        <p>Get the oars in the water and start rowing execution.</p>
                                                    </div>
                                                    <ul class="info clearfix">
                                                        <li><i class="fab fa fa-envelope"></i><a
                                                                    href="mailto:info@homegarden.com">info@homegarden.com</a>
                                                        </li>
                                                        <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">030
                                                                3057 1965</a></li>
                                                    </ul>
                                                    <div class="btn-box">
                                                        <a href="" class="theme-btn btn-two">View Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 agents-block">
                                        <div class="agents-block-two">
                                            <div class="inner-box">
                                                <figure class="image-box"><img src="{{asset('assets/web/images/venues/104.jpg')}}" style="width: 270px!important; height: 330px!important;" alt=""></figure>
                                                <div class="content-box">
                                                    <div class="title-inner">
                                                        <h4><a href="">Resort Company</a></h4>
                                                        <span class="designation">Resort</span>
                                                    </div>
                                                    <div class="text">
                                                        <p>Get the oars in the water and start rowing execution.</p>
                                                    </div>
                                                    <ul class="info clearfix">
                                                        <li><i class="fab fa fa-envelope"></i><a
                                                                    href="mailto:info@property.com">info@property.com</a>
                                                        </li>
                                                        <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">030
                                                                3057 1965</a></li>
                                                    </ul>
                                                    <div class="btn-box">
                                                        <a href="" class="theme-btn btn-two">View Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 agents-block">
                                        <div class="agents-block-two">
                                            <div class="inner-box">
                                                <figure class="image-box"><img src="{{asset('assets/web/images/venues/105.jpg')}}" style="width: 270px!important; height: 330px!important;" alt=""></figure>
                                                <div class="content-box">
                                                    <div class="title-inner">
                                                        <h4><a href="">Realty Investment</a></h4>
                                                        <span class="designation">Resort</span>
                                                    </div>
                                                    <div class="text">
                                                        <p>Get the oars in the water and start rowing execution.</p>
                                                    </div>
                                                    <ul class="info clearfix">
                                                        <li><i class="fab fa fa-envelope"></i><a
                                                                    href="mailto:info@investment.com">info@investment.com</a>
                                                        </li>
                                                        <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">030
                                                                3057 1965</a></li>
                                                    </ul>
                                                    <div class="btn-box">
                                                        <a href="" class="theme-btn btn-two">View Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 agents-block">
                                        <div class="agents-block-two">
                                            <div class="inner-box">
                                                <figure class="image-box"><img src="{{asset('assets/web/images/venues/106.jpg')}}" style="width: 270px!important; height: 330px!important;" alt=""></figure>
                                                <div class="content-box">
                                                    <div class="title-inner">
                                                        <h4><a href="">Ritz Resort</a></h4>
                                                        <span class="designation">Resort</span>
                                                    </div>
                                                    <div class="text">
                                                        <p>Get the oars in the water and start rowing execution.</p>
                                                    </div>
                                                    <ul class="info clearfix">
                                                        <li><i class="fab fa fa-envelope"></i><a
                                                                    href="mailto:info@propertydeal.com">info@ritzlawn.com</a>
                                                        </li>
                                                        <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">030
                                                                3057 1965</a></li>
                                                    </ul>
                                                    <div class="btn-box">
                                                        <a href="" class="theme-btn btn-two">View Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination-wrapper">
                            <ul class="pagination clearfix">
                                <li><a href="" class="current">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href=""><i class="fas fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- agents-page-section end -->
@endsection

@push('scripts')
@endpush
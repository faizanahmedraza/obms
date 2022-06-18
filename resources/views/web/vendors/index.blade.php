@extends('web.layouts.master')

@push('styles')
@endpush

@section('content')
    <!--Page Title-->
    <section class="page-title centred" style="background-image: url(/assets/web/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>{{$vendor_title}} View</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="">Home</a></li>
                    <li>{{$vendor_title}} List View</li>
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
                                <h5>Find {{$vendor_title}}</h5>
                            </div>
                            <div class="search-inner">
                                <form action="">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Enter Hotel Name" required="">
                                    </div>
                                    <div class="form-group">
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="All Categories">All Categories</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="All Cities">All Cities</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="theme-btn btn-one">Search Hotel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="category-widget sidebar-widget">
                            <div class="widget-title">
                                <h5>Status Of Hotel</h5>
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
                                @forelse($vendors as $vendor)
                                    <div class="agents-block-one">
                                        <div class="inner-box">
                                            <figure class="image-box"><img
                                                        src="{{$vendor->image}}"
                                                        style="width: 270px!important; height: 330px!important;" alt="">
                                            </figure>
                                            <div class="content-box">
                                                <div class="upper clearfix">
                                                    <div class="title-inner pull-left">
                                                        <h4>
                                                            <a href="{{route('web.vendors.detail',['param' => $vendor_title,'id' => $vendor->id])}}">{{$vendor->vendor_name}}</a>
                                                        </h4>
                                                        <span class="designation">{{ucwords($vendor_title)}}</span>
                                                    </div>
                                                    <ul class="social-list pull-right clearfix">
                                                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="text">
                                                    <p>{{$vendor->additional_details}}</p>
                                                </div>
                                                <ul class="info clearfix">
                                                    <li><i class="fab fa fa-envelope"></i><a
                                                                href="mailto:info@realhome.com">{{$vendor->vendor->user->email}}</a>
                                                    </li>
                                                    <li><i class="fab fa fa-phone"></i><a
                                                                href="tel:{{$vendor->vendor->user->contact_number}}">{{$vendor->vendor->user->contact_number}}</a>
                                                    </li>
                                                </ul>
                                                <div class="btn-box">
                                                    <a href="{{route('web.vendors.detail',['param' => $vendor_title,'id' => $vendor->id])}}"
                                                       class="theme-btn btn-two">View Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            <div class="agents-grid-content">
                                <div class="row clearfix">
                                    @forelse($vendors as $vendor)
                                    <div class="col-lg-6 col-md-6 col-sm-12 agents-block">
                                        <div class="agents-block-two">
                                            <div class="inner-box">
                                                <figure class="image-box"><img
                                                            src="{{$vendor->image}}"
                                                            style="width: 270px!important; height: 330px!important;"
                                                            alt=""></figure>
                                                <div class="content-box">
                                                    <div class="title-inner">
                                                        <h4><a href="{{route('web.vendors.detail',['param' => $vendor_title,'id' => $vendor->id])}}">{{$vendor->vendor_name}}</a></h4>
                                                        <span class="designation">{{ucwords($vendor_title)}}</span>
                                                    </div>
                                                    <div class="text">
                                                        <p>{{$vendor->additional_details}}</p>
                                                    </div>
                                                    <ul class="info clearfix">
                                                        <li><i class="fab fa fa-envelope"></i><a
                                                                    href="mailto:{{$vendor->vendor->user->email}}">{{$vendor->vendor->user->email}}</a>
                                                        </li>
                                                        <li><i class="fab fa fa-phone"></i><a href="tel:{{$vendor->vendor->user->contact_number}}">{{$vendor->vendor->user->contact_number}}</a></li>
                                                    </ul>
                                                    <div class="btn-box">
                                                        <a href="" class="theme-btn btn-two">{{route('web.vendors.detail',['param' => $vendor_title,'id' => $vendor->id])}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="pagination-wrapper">
                            {{$vendors->links()}}
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
@extends('web.layouts.master')

@push('styles')
@endpush

@section('content')
    <!--Page Title-->
    <section class="page-title centred" style="background-image: url(/assets/web/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Search Results View</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="">Home</a></li>
                    <li>Search List</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- agents-page-section -->
    <section class="agents-page-section agents-list">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                    <div class="agency-content-side">
{{--                        <div class="item-shorting clearfix">--}}
{{--                            <div class="left-column pull-left">--}}
{{--                                <h5>Search Reasults: <span>Showing 1-5 of 20 Listings</span></h5>--}}
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
                        <div class="wrapper list">
                            <div class="agents-list-content list-item">
                                @forelse($venues as $venue)
                                    <div class="agents-block-one">
                                        <div class="inner-box">
                                            <figure class="image-box"><img
                                                        src="{{$venue->image}}"
                                                        style="width: 270px!important; height: 330px!important;" alt="">
                                            </figure>
                                            <div class="content-box">
                                                <div class="upper clearfix">
                                                    <div class="title-inner pull-left">
                                                        <h4>
                                                            <a href="{{route('web.venues.detail',['param' => $venue->venue_type,'id' => $venue->id])}}">{{$venue->venue_name}}</a>
                                                        </h4>
                                                        <span class="designation">{{ucwords($venue->venue_type)}}</span>
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
                                                <ul class="info clearfix">
                                                    <li><i class="fab fa fa-envelope"></i><a
                                                                href="mailto:info@realhome.com">{{$venue->venue->user->email}}</a>
                                                    </li>
                                                    <li><i class="fab fa fa-phone"></i><a
                                                                href="tel:{{$venue->venue->user->contact_number}}">{{$venue->venue->user->contact_number}}</a>
                                                    </li>
                                                </ul>
                                                <div class="btn-box">
                                                    <a href="{{route('web.venues.detail',['param' => $venue->venue_type,'id' => $venue->id])}}"
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
                                    @forelse($venues as $venue)
                                    <div class="col-lg-6 col-md-6 col-sm-12 agents-block">
                                        <div class="agents-block-two">
                                            <div class="inner-box">
                                                <figure class="image-box"><img
                                                            src="{{$venue->image}}"
                                                            style="width: 270px!important; height: 330px!important;"
                                                            alt=""></figure>
                                                <div class="content-box">
                                                    <div class="title-inner">
                                                        <h4><a href="{{route('web.venues.detail',['param' => $venue->venue_type,'id' => $venue->id])}}">{{$venue->venue_name}}</a></h4>
                                                        <span class="designation">{{ucwords($venue->venue_type)}}</span>
                                                    </div>
                                                    <div class="text">
                                                        <p>{{$venue->additional_details}}</p>
                                                    </div>
                                                    <ul class="info clearfix">
                                                        <li><i class="fab fa fa-envelope"></i><a
                                                                    href="mailto:{{$venue->venue->user->email}}">{{$venue->venue->user->email}}</a>
                                                        </li>
                                                        <li><i class="fab fa fa-phone"></i><a href="tel:{{$venue->venue->user->contact_number}}">{{$venue->venue->user->contact_number}}</a></li>
                                                    </ul>
                                                    <div class="btn-box">
                                                        <a href="" class="theme-btn btn-two">{{route('web.venues.detail',['param' => $venue->venue_type,'id' => $venue->id])}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <p>No Results Found!</p>
                                    @endforelse
                                </div>
                            </div>
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
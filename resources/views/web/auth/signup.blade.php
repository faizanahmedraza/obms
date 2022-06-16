@extends('web.layouts.master')

@push('styles')
    <style>
        .main-footer {
            z-index: -1 !important;
        }
    </style>
@endpush

@section('content')
    <!--Page Title-->
    <section class="page-title-two bg-color-1 centred">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url(assets/web/images/shape/shape-9.png);"></div>
            <div class="pattern-2" style="background-image: url(assets/web/images/shape/shape-10.png);"></div>
        </div>
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Sign Up</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/">Home</a></li>
                    <li>Sign Up</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <!-- ragister-section -->
    <section class="ragister-section centred my-4">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                    <div class="tabs-box">
                        <div class="tab-btn-box mb-3">
                            <ul class="tab-btns tab-buttons centred clearfix">
                                <li class="tab-btn {{ ((session()->has('active_key') && session()->get('active_key') === "web.vendor.signup.store") || !session()->has('active_key')) ? 'active-btn' : ''  }}" data-tab="#tab-1">Vendor</li>
                                <li class="tab-btn {{ (session()->has('active_key') && session()->get('active_key') === "web.venue.signup.store") ? 'active-btn' : '' }}" data-tab="#tab-2">Venue</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <p>Are you looking for venue and vendor services? <a href="{{route('web.customer.signup')}}" style="color: #2dbe6c;">Register Here</a></p>
                        </div>
                        <div class="tabs-content">
                            <div class="tab {{ ((session()->has('active_key') && session()->get('active_key') === "web.vendor.signup.store") || !session()->has('active_key')) ? 'active-tab' : '' }}" id="tab-1">
                                <div class="inner-box">
                                    <h4>Sign Up</h4>
                                    <form action="{{route('web.vendor.signup.store')}}" method="post" class="default-form">
                                        @csrf
                                        @if (session()->has('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Success!</strong> {{session()->get('success')}}
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        @if ((session()->has('active_key') && session()->get('active_key') === "web.vendor.signup.store") && $errors->any())
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Whoops!</strong>
                                                <ul class="text-left">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <input type="hidden" name="role" value="Vendor">
                                        <div class="form-group">
                                            <label>Service Name</label>
                                            <input type="text" name="service_name" value="{{old('service_name')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="service_type">Service Type</label>
                                            <select id="service_type" name="service_type" class="wide">
                                                <option data-display="Select Type">Select Type</option>
                                                @foreach($vendors as $vendor)
                                                    <option value="{{old('service_type',$vendor)}}">{{ucwords(str_replace(['_and_','_'],['/',' '],$vendor))}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" style="margin-top: 80px;">
                                            <label for="email_vendor">Email Address</label>
                                            <input id="email_vendor" type="email" name="email_vendor" value="{{old('email_vendor')}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact_vendor">Contact Number</label>
                                            <input id="contact_vendor" type="number" name="contact_number_vendor" value="{{old('contact_number_vendor')}}" required>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Sign up</button>
                                        </div>
                                    </form>
                                    <div class="othre-text">
                                        <p>Already have an account? <a href="{{route('web.signin')}}">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab {{ (session()->has('active_key') && session()->get('active_key') === "web.venue.signup.store") ? 'active-tab' : '' }}" id="tab-2">
                                <div class="inner-box">
                                    <h4>Sign Up</h4>
                                    <form action="{{route('web.venue.signup.store')}}" method="post" class="default-form">
                                        @csrf
                                        @if (session()->has('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Success!</strong> {{session()->get('success')}}
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        @if ((session()->has('active_key') && session()->get('active_key') === "web.venue.signup.store") && $errors->any())
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Whoops!</strong>
                                                <ul class="text-left">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <input type="hidden" name="role" value="Venue">
                                        <div class="form-group">
                                            <label>Venue Name</label>
                                            <input type="text" name="venue_name" value="{{old('venue_name')}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="venue_type">Venue Type</label>
                                            <div class="select-box">
                                                <select id="service_type" name="venue_type" class="wide">
                                                    <option data-display="Select Type">Select Type</option>
                                                    @foreach($venues as $venue)
                                                        <option value="{{old('venue_type',$venue)}}">{{ucwords(str_replace('_',' ',$venue))}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 80px;">
                                            <label for="email_venue">Email Address</label>
                                            <input id="email_venue" type="email" name="email_venue" value="{{old('email_venue')}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact_venue">Contact Number</label>
                                            <input id="contact_venue" type="number" name="contact_number_venue" value="{{old('contact_number_venue')}}" required>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Sign up</button>
                                        </div>
                                    </form>
                                    <div class="othre-text">
                                        <p>Already have an account? <a href="{{route('web.signin')}}">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ragister-section end -->
@endsection
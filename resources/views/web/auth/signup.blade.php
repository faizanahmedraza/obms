@extends('web.layouts.master')

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
                        <div class="tab-btn-box">
                            <ul class="tab-btns tab-buttons centred clearfix">
                                <li class="tab-btn active-btn" data-tab="#tab-1">Vendor</li>
                                <li class="tab-btn" data-tab="#tab-2">User</li>
                            </ul>
                        </div>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="tab-1">
                                <div class="inner-box">
                                    <h4>Sign Up</h4>
                                    <form action="{{route('web.signup.store')}}" method="post" class="default-form">
                                        @csrf
                                        <input type="hidden" name="role" value="vendor">
                                        <div class="form-group">
                                            <label>Service Name</label>
                                           <input type="text" name="service_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="service_type">Service Type</label>
                                            <div class="select-box">
                                                <select id="service_type" name="service_type" class="wide">
                                                    <option data-display="Select Type">Select Type</option>
                                                    <option value="1">Yearly</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 80px;">
                                            <label>Your Name</label>
                                            <input type="text" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="text" name="name" required>
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
                            <div class="tab" id="tab-2">
                                <div class="inner-box">
                                    <h4>Sign Up</h4>
                                    <form action="{{route('web.signup.store')}}" method="post" class="default-form">
                                        @csrf
                                        <input type="hidden" name="role" value="customer">
                                        <div class="form-group">
                                            <label>Your Name</label>
                                            <input type="text" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="name" required>
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
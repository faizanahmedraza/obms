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
                <h1>Sign In</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">Home</a></li>
                    <li>Sign In</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <!-- Login-section -->
    <section class="ragister-section centred my-4">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                    <div class="inner-box">
                        <h4>Sign in</h4>
                        <form action="{{route('web.signin.store')}}" method="POST"
                              class="default-form">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="name" required="">
                            </div>
                            <a class="d-flex justify-content-end text-secondary mb-3" href="{{route('web.password.request')}}">Forgot
                                    Password? </a>
                            <div class="form-group message-btn">
                                <button type="submit" class="theme-btn btn-one">Sign in</button>
                            </div>
                        </form>
                        <div class="othre-text">
                            <p>Have not any account? <a href="{{route('web.signup')}}">Register Now</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login-section end -->
@endsection
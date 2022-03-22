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
                <h1>Reset Password</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="">Home</a></li>
                    <li>Reset Password</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <!-- Login-section -->
    <section class="ragister-section centred sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                    <div class="inner-box">
                        <h4>Reset Password</h4>
                        <form action="{{route('web.password.update')}}" method="POST"
                              class="default-form">
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="name" required="">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="name" required="">
                            </div>
                            <div class="form-group message-btn">
                                <button type="submit" class="theme-btn btn-one">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login-section end -->
@endsection
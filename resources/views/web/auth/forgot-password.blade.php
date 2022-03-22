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
                <h1>Forgot Password</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="">Home</a></li>
                    <li>Forgot Password</li>
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
                        <h4>Forgot Password</h4>
                        <form action="{{route('web.password.email')}}" method="POST"
                              class="default-form">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                             aria-label="Danger:">
                                            <use xlink:href="#exclamation-triangle-fill"/>
                                        </svg>
                                        <strong>Whoops!</strong>
                                    </div>
                                    <div class="mt-2">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                             aria-label="Success:">
                                            <use xlink:href="#check-circle-fill"/>
                                        </svg>
                                        <strong>Success!</strong>
                                    </div>
                                    <div class="mt-2">
                                        {{session()->get('success')}}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" required="">
                            </div>
                            <div class="form-group message-btn">
                                <button type="submit" class="theme-btn btn-one">Reset Password Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login-section end -->
@endsection
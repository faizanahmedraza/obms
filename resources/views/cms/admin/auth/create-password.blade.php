@extends('cms.admin.auth.master')

@section('title')
    OMBS - CREATE PASSWORD
@endsection

@section('content')
    <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{asset('assets/cms/images/login/3.jpg')}}"
                               alt="loginpage"></div>
    <div class="col-xl-7 p-0">
        <div class="login-card">
            <div class="login-main">
                <form action="{{route('admin.verification.store')}}" method="POST" class="theme-form login-form">
                    <h4>User Verification -- Create Password </h4>

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

                    @csrf
                    <div class="form-group">
                        <label class="col-form-label" for="email">Enter Email </label>
                        <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                            <input class="form-control" type="email" id="email" name="email"
                                   placeholder="Test@gmail.com" value="" required/>
                        </div>
                    </div>
                    <div class="form-group"><span class="reset-password-link">If don't receive Email?  <a
                                    class="btn-link text-danger"
                                    href="{{route('admin.resend.password.email')}}" id="resend">Resend</a></span></div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Send</button>
                    </div>
                    <p>Already have an password?<a class="ms-2" href="{{route('admin.login')}}">Sign in </a></p>
                </form>
            </div>
        </div>
    </div>
@endsection
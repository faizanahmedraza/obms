@extends('cms.admin.auth.master')

@section('title')
    OMBS - LOGIN
@endsection

@section('content')
    <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{asset('assets/cms/images/login/2.jpg')}}"
                               alt="loginpage"></div>
    <div class="col-xl-7 p-0">
        <div class="login-card">
            <form action="{{route('admin.login.store')}}" method="POST" class="theme-form login-form">
                <h4>Login</h4>
                <h6>Welcome back! Log in to your account.</h6>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="d-flex justify-content-start align-items-center">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
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
                    <label for="email">Email Address</label>
                    <div class="input-group"><span class="input-group-text"><i
                                    class="icon-email"></i></span>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Test@gmail.com"
                               value="{{old('email')}}" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                        <input class="form-control pr-3" id="password" type="password" name="password"
                               placeholder="*********">
                        <span class="toggle-password"><i class="fa fa-fw fa-eye-slash fa-fw "></i></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <input id="checkbox1" type="checkbox">
                        <label class="text-muted" for="checkbox1">Remember password</label>
                    </div>
                    <a class="link" href="{{route('admin.password.request')}}">Forgot password?</a>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $("form").submit(function () {
            showLoader();
        });
    </script>
@endpush
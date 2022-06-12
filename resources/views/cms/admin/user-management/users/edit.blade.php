@extends('cms.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">{{$pageTitle}}</h4>
                                    <a href="javascript:void(0)" onclick="window.history.go(-1)"
                                       class="btn btn-primary">← Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.users.update',['id'=>$user->id])}}"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Whoops!</strong> {{session()->get('error')}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Whoops!</strong>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fname">Name</label>
                                                    <input type="text" class="form-control" id="fname" name="name"
                                                           placeholder="Enter Name" value="{{old('name',$user->name)}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                           placeholder="Enter Email"
                                                           value="{{old('email',$user->email)}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dob">Date Of Birth</label>
                                                    <input type="date" class="form-control" id="datepicker" name="dob"
                                                           placeholder="Enter Date Of Birth"
                                                           value="{{old('dob',$user->dob)}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select class="form-control" name="role" id="role">
                                                        <option value="">Select</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->id}}" data-role="{{$role->name}}"s {{ $role->id == (int)old('role',$user->roles->first()->id) ? "selected" : "" }}>{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 service_type_div">
                                                <div class="form-group">
                                                    <label for="service_name">Service Name</label>
                                                    <input type="text" class="form-control" id="service_name" name="service_name"
                                                           placeholder="Enter Service" value="{{old('service_name')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 service_type_div">
                                                <div class="form-group">
                                                    <label for="service_type">Service Type</label>
                                                    <select class="form-control" name="service_type" id="service_type">
                                                        <option value="">Select</option>
                                                        @foreach($vendors as $vendor)
                                                            <option value="{{old('service_type',$vendor)}}" {{ old('service_type') === $vendor ? "selected" : "" }}>{{ucwords(str_replace(['_and_','_'],['/',' '],$vendor))}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 venue_type_div">
                                                <div class="form-group">
                                                    <label for="venue_name">Venue Name</label>
                                                    <input type="text" class="form-control" id="venue_name" name="venue_name"
                                                           placeholder="Enter Venue" value="{{old('venue_name')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 venue_type_div">
                                                <div class="form-group">
                                                    <label for="venue_type">Venue Type</label>
                                                    <select class="form-control" name="venue_type" id="venue_type">
                                                        <option value="">Select</option>
                                                        @foreach($venues as $venue)
                                                            <option value="{{old('venue_type',$venue)}}" {{ old('venue_type') === $venue ? "selected" : "" }}>{{ucwords(str_replace('_',' ',$venue))}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-check" style="padding-left: 0;">
                                                    <label>Gender</label><br>
                                                    <label class="form-radio-label">
                                                        <input class="form-radio-input" type="radio" name="gender"
                                                               value="male" {{ old('gender',$user->gender) === "male" ? "checked" : ""}}>
                                                        <span class="form-radio-sign">Male</span>
                                                    </label>
                                                    <label class="form-radio-label ml-3">
                                                        <input class="form-radio-input" type="radio" name="gender"
                                                               value="female" {{ old('gender',$user->gender) === "female" ? "checked" : ""}}>
                                                        <span class="form-radio-sign">Female</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="profile">Profile</label>
                                                    <input type="file" class="form-control" id="profile" name="avatar">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="{{$user->avatar}}" max-width="100%" height="200px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var role = $("#role").find(':selected').data('role');
        if (role) {
            switch (role) {
                case "Vendor":
                    $(".service_type_div").show();
                    $(".venue_type_div").hide();
                    break;
                case "Venue":
                    $(".venue_type_div").show();
                    $(".service_type_div").hide();
                    break;
                default:
                    $(".service_type_div").hide();
                    $(".venue_type_div").hide();
                    break;
            }
        } else {
            $(".service_type_div").hide();
            $(".venue_type_div").hide();
        }

        $("#role").change(function () {
            switch ($(this).find(':selected').data('role')) {
                case "Vendor":
                    $(".service_type_div").show();
                    $(".venue_type_div").hide();
                    break;
                case "Venue":
                    $(".venue_type_div").show();
                    $(".service_type_div").hide();
                    break;
                default:
                    $(".service_type_div").hide();
                    $(".venue_type_div").hide();
                    break;
            }
        });

    </script>
@endpush
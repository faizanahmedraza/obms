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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Name</label>
                                                <input type="text" class="form-control" id="fname" name="name"
                                                       placeholder="Enter Name" value="{{old('name',$user->name)}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                       placeholder="Enter Email"
                                                       value="{{old('email',$user->email)}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dob">Date Of Birth</label>
                                                <input type="date" class="form-control" id="datepicker" name="dob"
                                                       placeholder="Enter Date Of Birth"
                                                       value="{{old('dob',$user->dob)}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <input type="date" class="form-control" id="" name="role"
                                                       placeholder=""
                                                       value="{{$user->roles->first()->id}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check" style="padding-left: 0;">
                                                <label>Gender</label><br>
                                                <label class="form-radio-label">
                                                    <input class="form-radio-input" type="radio" name="gender"
                                                           value="male" {{ empty($user->gender) || $user->gender === "male" ? "checked readonly" : ""}}>
                                                    <span class="form-radio-sign">Male</span>
                                                </label>
                                                <label class="form-radio-label ml-3">
                                                    <input class="form-radio-input" type="radio" name="gender"
                                                           value="female" {{ $user->gender === "female" ? "checked readonly" : ""}}>
                                                    <span class="form-radio-sign">Female</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{$user->avatar}}" max-width="100%" height="200px">
                                        </div>
                                    </div>
                                </div>
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
        var role = '{{old('role',$user->roles->first()->id)}}';
        if (role) {
            switch (role) {
                case "4":
                    $(".service_type_div").show();
                    $(".venue_type_div").hide();
                    break;
                case "6":
                    $(".venue_type_div").show();
                    $(".service_type_div").hide();
                    break;
                default:
                    $(".service_type_div").hide();
                    $(".venue_type_div").hide();
                    break;
            }
        }
    </script>
@endpush
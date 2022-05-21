@extends('cms.layouts.master')

@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Base inputs</h3>
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
                                <form method="POST" action="{{route('admin.users.store')}}"
                                      enctype="multipart/form-data">
                                    @csrf
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
                                                    <label for="fname">First Name</label>
                                                    <input type="text" class="form-control" id="fname" name="first_name"
                                                           placeholder="Enter First Name" value="{{old('first_name')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lname">Last Name</label>
                                                    <input type="text" class="form-control" id="lname" name="last_name"
                                                           placeholder="Enter Last Name" value="{{old('last_name')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                           placeholder="Enter Email" value="{{old('email')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dob">Date Of Birth</label>
                                                    <input type="date" class="form-control" id="datepicker" name="dob"
                                                           placeholder="Enter Date Of Birth" value="{{old('dob')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select class="form-control" name="role" id="role">
                                                        <option value="">Select</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->id}}" {{ $role->id == (int)old('role') ? "selected" : "" }}>{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <label>Gender</label><br>
                                                    <label class="form-radio-label">
                                                        <input class="form-radio-input" type="radio" name="gender"
                                                               value="male" {{ old('gender') === "male" ? "checked" : ""}}>
                                                        <span class="form-radio-sign">Male</span>
                                                    </label>
                                                    <label class="form-radio-label ml-3">
                                                        <input class="form-radio-input" type="radio" name="gender"
                                                               value="female" {{ old('gender') === "female" ? "checked" : ""}}>
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

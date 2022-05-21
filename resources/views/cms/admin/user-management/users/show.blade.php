@extends('admin.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">User Detail</h4>
                                    <a href="{{route('admin.users.index')}}" class="btn btn-primary">← Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname">First Name</label>
                                            <input type="text" class="form-control"
                                                   value="{{old('first_name',$user->first_name)}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input type="text" class="form-control"
                                                   value="{{old('last_name',$user->last_name)}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="uname">User Name</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                </div>
                                                <input type="text" class="form-control"
                                                       value="{{old('username',$user->username)}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" value="{{old('email',$user->email)}}"
                                                   readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dob">Date Of Birth</label>
                                            <input type="date" class="form-control" value="{{old('dob',$user->dob)}}"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <label>Gender</label><br>
                                            <label class="form-radio-label">
                                                <input class="form-radio-input" type="radio" name="gender"
                                                       value="male" {{ old('gender',$user->gender) === "male" ? "checked disabled" : "disabled"}}>
                                                <span class="form-radio-sign">Male</span>
                                            </label>
                                            <label class="form-radio-label ml-3">
                                                <input class="form-radio-input" type="radio" name="gender"
                                                       value="female" {{ old('gender',$user->gender) === "female" ? "checked disabled" : "disabled"}}>
                                                <span class="form-radio-sign">Female</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="roles">Roles</label>
                                            <select class="form-control" multiple readonly>
                                                <option value="">Select</option>
                                                @foreach($user->roles as $role)
                                                    <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                @endforeach
                                            </select>
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

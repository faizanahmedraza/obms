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
                                    <h4 class="card-title">Update User</h4>
                                    <a href="{{route('admin.users.index')}}" class="btn btn-primary">← Back</a>
                                </div>
                            </div>
                            <form method="POST" action="{{route('admin.users.update',['user'=>$user->id])}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @if ($errors->any())
                                    <div class="container pt-2">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Whoops!</strong>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">First Name</label>
                                                <input type="text" class="form-control" id="fname" name="first_name"
                                                       placeholder="Enter First Name" value="{{old('first_name',$user->first_name)}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lname">Last Name</label>
                                                <input type="text" class="form-control" id="lname" name="last_name"
                                                       placeholder="Enter Last Name" value="{{old('last_name',$user->last_name)}}">
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
                                                    <input type="text" class="form-control" id="uname" name="username"
                                                           placeholder="Enter UserName" aria-label="Username"
                                                           aria-describedby="basic-addon1" value="{{old('username',$user->username)}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                       placeholder="Enter Email" value="{{old('email',$user->email)}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dob">Date Of Birth</label>
                                                <input type="date" class="form-control" id="datepicker" name="dob"
                                                       placeholder="Enter Date Of Birth" value="{{old('dob',$user->dob)}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
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
                                            <div class="form-group">
                                                @php $roleIds = (array)old('roles',$user->roles->pluck('id')->toArray()); @endphp
                                                <label for="roles">Roles</label>
                                                <select class="form-control" id="roles" name="roles[]" multiple>
                                                    <option value="">Select</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}" {{ in_array($role->id, $roleIds) ? "selected" : "" }}>{{$role->name}}</option>
                                                    @endforeach
                                                </select>
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
@endsection

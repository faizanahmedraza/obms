@extends('cms.layouts.master')

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
                                    <h4 class="card-title">Create Venue Booking</h4>
                                    <a href="{{route('venue-bookings.index')}}"
                                       class="btn btn-primary">← Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('venue-bookings.store')}}">
                                    @csrf
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Success!</strong> {{session()->get('error')}}
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
                                        <div class="row mb-2">
                                            @if(auth()->user()->roles->first()->name != 'Customer')
                                                <div class="col-md-12">
                                                    <label for="vendor">Customer</label>
                                                    <select class="form-control" name="customer" id="customer">
                                                        <option value="">Select</option>
                                                        @foreach($customers as $val)
                                                            <option value="{{$val->id}}" {{old('customer') == $val->id ? 'selected' : ""}}>{{ucwords($val->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                            <div class="col-md-12">
                                                <label for="venue">Venue</label>
                                                <select class="form-control" name="venue" id="venue">
                                                    <option value="">Select</option>
                                                    @foreach($venues as $val)
                                                        <option value="{{$val->id}}" {{old('venue') == $val->id ? 'selected' : ""}}>{{ucwords($val->venue_name)}}
                                                            -- ({{ucwords($val->venue_type)}})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">Date</label>
                                                    <input type="date" class="form-control" id="date"
                                                           name="date"
                                                           placeholder="Select Day"
                                                           value="{{old('date')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start_time">Start Time</label>
                                                    <input type="time" class="form-control" id="start_time"
                                                           name="start_time"
                                                           placeholder="Select Time"
                                                           value="{{old('start_time')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="end_time">End Time</label>
                                                    <input type="time" class="form-control" id="end_time"
                                                           name="end_time"
                                                           placeholder="Select Time"
                                                           value="{{old('end_time')}}">
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

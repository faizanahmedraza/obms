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
                                    <h4 class="card-title">Edit Vendor Service</h4>
                                    <a href="javascript:void(0)" onclick="window.history.go(-1)"
                                       class="btn btn-primary">← Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.vendor-bookings.update',['id' => $booking->id])}}"
                                      enctype="multipart/form-data">
                                    @method('PUT')
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
                                            <div class="col-md-6">
                                                <label for="customer">Customer</label>
                                                <select class="form-control" name="customer" id="customer">
                                                    <option value="">Select</option>
                                                    @foreach($customers as $val)
                                                        <option value="{{$val->id}}" {{old('customer',$booking->customer_id) == $val->id ? 'selected' : ""}}>{{ucwords($val->name)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="vendor">Vendor Service</label>
                                                <select class="form-control" name="vendor" id="vendor">
                                                    <option value="">Select</option>
                                                    @foreach($vendors as $val)
                                                        <option value="{{$val->id}}" {{old('vendor',$booking->vendor_service_id) == $val->id ? 'selected' : ""}}>{{ucwords($val->service_name)}} -- ({{ucwords($val->service_type)}})</option>
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
                                                           value="{{old('date',$booking->date)}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start_time">Start Time</label>
                                                    <input type="time" class="form-control" id="start_time"
                                                           name="start_time"
                                                           placeholder="Select Time"
                                                           value="{{old('start_time',$booking->start_time)}}">
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
                                                           value="{{old('end_time',$booking->end_time)}}">
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

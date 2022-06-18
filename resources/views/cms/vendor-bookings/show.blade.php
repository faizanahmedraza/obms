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
                                    <h4 class="card-title">Vendor Service Details</h4>
                                    <a href="javascript:void(0)" onclick="window.history.go(-1)"
                                       class="btn btn-primary">← Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    @if(auth()->user()->roles->first()->name != 'Customer')
                                        <div class="col-md-12">
                                            <label for="vendor">Customer</label>
                                            <input type="text" class="form-control"
                                                   value="{{$booking->customer->user->name}}" disabled>
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <label for="vendor">Vendor Service</label>
                                        <input type="text" class="form-control"
                                               value="{{$booking->vendorService->vendor->service_name}}" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" class="form-control" id="date"
                                                   name="date"
                                                   placeholder="Select Day"
                                                   value="{{old('date',$booking->date)}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_time">Start Time</label>
                                            <input type="time" class="form-control" id="start_time"
                                                   name="start_time"
                                                   placeholder="Select Time"
                                                   value="{{old('start_time',$booking->start_time)}}" disabled>
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
                                                   value="{{old('end_time',$booking->end_time)}}" disabled>
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

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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="venue_name">Vendor</label>
                                            <input type="text" class="form-control" id="venue_name"
                                                   name="venue_name"
                                                   value="{{$vendor->vendor->user->name}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="service_name">Service Name</label>
                                            <input type="text" class="form-control" id="service_name"
                                                   name="service_name"
                                                   placeholder="Enter Service Name"
                                                   value="{{old('service_name',$vendor->service_name)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="service_type">Service Type</label>
                                            <select class="form-control" name="service_type" id="service_type">
                                                <option value=""></option>
                                                @foreach($service_types as $val)
                                                    <option value="{{$val}}" {{old('service_type',$vendor->service_type) == $val ? 'selected' : ""}}>{{ucwords($val)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="country" name="country"
                                                   placeholder="Enter Country"
                                                   value="{{old('country',$vendor->country)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                   placeholder="Enter City" value="{{old('city',$vendor->city)}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                   placeholder="Enter Address"
                                                   value="{{old('address',$vendor->address)}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price_per_hour">Price Per Hour</label>
                                            <input type="number" class="form-control" id="price_per_hour"
                                                   name="price_per_hour"
                                                   placeholder="Enter Price Per Hour"
                                                   value="{{old('price_per_hour',$vendor->price_per_hour)}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <img src="{{$venue->image}}" height="200px"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="additional_details">Additional Details</label>
                                            <textarea class="form-control" name="additional_details"
                                                      id="additional_details">{{old('additional_details',$vendor->additional_details)}}</textarea>
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

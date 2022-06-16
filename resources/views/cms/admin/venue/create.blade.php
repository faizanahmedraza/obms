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
                                    <h4 class="card-title">Create Venue Service</h4>
                                    <a href="javascript:void(0)" onclick="window.history.go(-1)"
                                       class="btn btn-primary">← Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.venues.store')}}"
                                      enctype="multipart/form-data">
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
                                            <div class="col-md-12">
                                                <label for="vendor">Venue Owners</label>
                                                <select class="form-control" name="venue_owner" id="venue_owner">
                                                    <option value="">Select</option>
                                                    @foreach($venueUsers as $val)
                                                        <option value="{{$val->id}}" {{old('venue_owner') == $val->id ? 'selected' : ""}}>{{ucwords($val->name)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="venue_name">Venue Name</label>
                                                    <input type="text" class="form-control" id="venue_name"
                                                           name="venue_name"
                                                           placeholder="Enter Venue Name"
                                                           value="{{old('venue_name')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="venue_type">Venue Type</label>
                                                    <select class="form-control" name="venue_type" id="venue_type">
                                                        <option value=""></option>
                                                        @foreach($venue_types as $val)
                                                            <option value="{{$val}}" {{old('venue_type') == $val ? 'selected' : ""}}>{{ucwords($val)}}</option>
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
                                                           placeholder="Enter Country" value="{{old('country')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input type="text" class="form-control" id="city" name="city"
                                                           placeholder="Enter City" value="{{old('city')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                           placeholder="Enter Address" value="{{old('address')}}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price_per_hour">Price Per Hour</label>
                                                    <input type="number" class="form-control" id="price_per_hour"
                                                           name="price_per_hour"
                                                           placeholder="Enter Price Per Hour"
                                                           value="{{old('price_per_hour')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input type="file" class="form-control" id="image" name="image">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="virtual_tour">Virtual Tour Url</label>
                                                    <input type="url" class="form-control" id="virtual_tour"
                                                           name="virtual_tour" value="{{old('virtual_tour')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="additional_details">Additional Details</label>
                                                    <textarea class="form-control" name="additional_details"
                                                              id="additional_details">{{old('additional_details')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <label>Is Vendor Services Included?</label><br>
                                                    <label class="form-radio-label">
                                                        <input class="form-radio-input" type="radio" name="is_vendors_included"
                                                               value="1" {{ old('is_vendors_included') == 1 ? "checked" : ""}}>
                                                        <span class="form-radio-sign">Yes</span>
                                                    </label>
                                                    <label class="form-radio-label ml-3">
                                                        <input class="form-radio-input" type="radio" name="is_vendors_included"
                                                               value="0" {{ old('is_vendors_included') == 0 ? "checked" : ""}}>
                                                        <span class="form-radio-sign">No</span>
                                                    </label>
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

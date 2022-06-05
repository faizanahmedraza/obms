@extends('cms.layouts.master')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/css/datatables.css') }}">
@endpush

@section('content')
    <div class="container-fluid dashboard-default-sec">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5>Venue Services</h5>
                            <a class="btn btn-primary" href="{{route('venue.venues.create')}}">Create +</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{session()->get('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Whoops!</strong> {{session()->get('error')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                            <table class="display" id="venues">
                                <thead>
                                <tr>
                                    <th>Service Name</th>
                                    <th>Service Type</th>
                                    <th>Country</th>
                                    <th>Price Per Hour</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($venues as $venue)
                                    <tr>
                                        <td>{{ucwords($venue->venue_name)}}</td>
                                        <td>{{ucwords($venue->venue_type)}}</td>
                                        <td>{{ucwords($venue->country)}}</td>
                                        <td>${{number_format($venue->price_per_hour,2)}}</td>
                                        <td>{{$venue->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('venue.venues.show',['id' => $venue->id])}}"
                                               style="cursor: pointer;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{route('venue.venues.edit',['id' => $venue->id])}}"
                                               style="cursor: pointer;"><i class="fa fa-pencil-square-o"
                                                                           aria-hidden="true"></i></a>
                                            <a href="javascript:void(0);"
                                               style="cursor: pointer;" onclick="onDeleteVendor('{{$venue->id}}')"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/cms/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/cms/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/cms/js/axios.min.js') }}"></script>
    <script>
        $("#venues").DataTable();

        function onDeleteVendor(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this venue service!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            })
                .then(willDelete => {
                    if (willDelete) {
                        axios.delete(`/venue/venues/${id}/delete`)
                            .then(response => {
                                swal(response.data.msg, {
                                    icon: "success",
                                    closeOnClickOutside: false
                                }).then(successBtnClick => {
                                    if (successBtnClick) {
                                        window.location.reload();
                                    }
                                });
                            })
                            .catch(error => {
                                swal(error.response.data.msg, {
                                    icon: "error",
                                    dangerMode: true
                                })
                            });
                    }
                });
        }
    </script>
@endpush
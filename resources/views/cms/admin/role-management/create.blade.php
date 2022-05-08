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
                        <h5>ROLES</h5>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{session()->get('success')}}
                                <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="display" id="roles">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($roles as $role)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>

                                        </td>
                                    </tr>
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
    <script>
        $("#roles").DataTable();
    </script>
@endpush
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
                            <h5>ROLES</h5>
                            <a class="btn btn-primary" href="{{route('admin.roles.create')}}">Create +</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{session()->get('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
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
                                @forelse($roles as $key => $role)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            <a href="{{route('admin.roles.show',['role' => $role->id])}}"
                                               style="cursor: pointer;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            @if(!in_array($role->name,config('obms.private_roles')))
                                                <a href="{{route('admin.roles.edit',['role' => $role->id])}}"
                                                   style="cursor: pointer;"><i class="fa fa-pencil-square-o"
                                                                               aria-hidden="true"></i></a>
                                                <a href="javascript:void(0);"
                                                   style="cursor: pointer;" onclick="onDeleteRole('{{$role->id}}')"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            @endif
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
        $("#roles").DataTable();

        function onDeleteRole(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this role!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            })
                .then(willDelete => {
                    if (willDelete) {
                        axios.delete(`/admin/roles/${id}/delete`)
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
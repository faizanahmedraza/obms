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
                            <h5>{{$pageTitle}}</h5>
                            <a class="btn btn-primary" href="{{route('admin.users.create')}}">Create +</a>
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
                            <table class="display" id="users">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ucwords($user->name)}}</td>
                                        <td>{{$user->roles->first()->name ?? ''}}</td>
                                        <td>{{ucwords($user->email)}}</td>
                                        <td>{{ucwords($user->created_at->diffForHumans())}}</td>
                                        <td>
                                            <a href="{{route('admin.users.show',['id' => $user->id])}}"
                                               style="cursor: pointer;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            @if($user->roles->first()->name != 'Super Admin' && auth()->id() != $user->id)
                                                <a href="{{route('admin.users.edit',['id' => $user->id])}}"
                                                   style="cursor: pointer;"><i class="fa fa-pencil-square-o"
                                                                               aria-hidden="true"></i></a>
                                                <a href="javascript:void(0);"
                                                   style="cursor: pointer;" onclick="onDeleteUser({{$user->id}})"><i
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
        $("#users").DataTable();

        function onDeleteUser(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this user!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            })
                .then(willDelete => {
                    if (willDelete) {
                        axios.delete(`/admin/users/${id}/delete`)
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
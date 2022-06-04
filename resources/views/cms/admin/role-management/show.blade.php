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
                                    <h4 class="card-title">Role Detail</h4>
                                    <a href="javascript:void(0)" onclick="window.history.go(-1)"
                                       class="btn btn-primary">← Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="role">Name *</label>
                                            <input type="text" class="form-control"
                                                   value="{{old('name',$role->name)}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="text-dark">Permissions *</h6>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="accordion accordion-flush" id="accordion">
                                            @php $permissionIds = (array)old('permissions',$permissions); @endphp
                                            @forelse($permissionHeaders as $key => $val)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne{{$key+1}}">
                                                        <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseOne{{$key+1}}"
                                                                aria-expanded="true"
                                                                aria-controls="collapseOne{{$key+1}}">
                                                            {{getPermissionHeader($val->name)}}
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne{{$key+1}}"
                                                         class="accordion-collapse collapse {{$key === 0 ? "show" : ""}} role-body"
                                                         aria-labelledby="headingOne{{$key+1}}"
                                                         data-bs-parent="#accordion">
                                                        <div class="accordion-body">
                                                            @if (!$loop->first)
                                                                <div class="d-flex">
                                                                    <input type="checkbox"
                                                                           class="me-1"
                                                                           id="checkbox{{$key+1}}" disabled>
                                                                    Select All
                                                                </div>
                                                            @endif
                                                            @foreach($val->permissions as $permission)
                                                                <div class="row">
                                                                    <br>
                                                                    <label><input
                                                                                type="checkbox"
                                                                                data-parent="checkbox{{$key+1}}"
                                                                                {{in_array($permission->id, $permissionIds) ? "checked disabled" : "disabled"}}>
                                                                        {{$permission->name}}</label>
                                                                    <br>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                            @endforelse
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

@push('scripts')
    <script>
        $(function () {
            $.each($(".role-body").find('input'), function () {
                if (this.checked) {
                    $("#" + $(this).data('parent')).prop("checked", true);
                }
            })
        });
    </script>
@endpush
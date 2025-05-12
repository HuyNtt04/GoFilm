@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Sửa Quyền</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Permissions</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.permissions.edit',$permission->id) }}">Edit Permission</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Permission
                        <a href="{{url('admin/permissions')}}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form id="permissionForm" data-parsley-validate action="{{url('admin/permissions/'.$permission->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Permission Name</label>
                            <input type="text" value="{{old('name',$permission->name)}}" name="name" class="form-control"
                                required
                                data-parsley-required-message="Tên quyền không được bỏ trống"
                            />
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
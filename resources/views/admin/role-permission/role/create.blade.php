@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Thêm Vai Trò</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.roles.create') }}">Add Role</a></li>
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
                    <h4>Create Role
                        <a href="{{url('admin/roles')}}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form data-parsley-validate action="{{url('admin/roles')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Role Name</label>
                            <input type="text" name="name" class="form-control"
                                required
                                data-parsley-required-message="Tên vai trò không được bỏ trống"
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
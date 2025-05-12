@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Gán Quyền Hạn</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.roles.addPermsToRole',$role->id) }}">Add Permissions To Role</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Role: {{$role->name}}
                        <a href="{{url('admin/roles')}}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{url('admin/roles/'.$role->id.'/give-permissions')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            @error('permission')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label for="name">Permissions</label>
                            <div class="row">
                                @foreach ($permissions as $permission )
                                    <div class="col-md-2">
                                        <label for="permission">
                                            <input type="checkbox" name="permission[]" value="{{$permission->name}}" 
                                            {{ in_array($permission->id,$rolePermissions) ? 'checked':''}}
                                            />{{$permission->name}}
                                        </label>
                                    </div>
                                @endforeach
                            @error('permission') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
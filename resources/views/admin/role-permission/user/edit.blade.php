@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Sửa Người Dùng</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.edit',$user->id) }}">Edit User</a></li>
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
                    <h4>Edit User
                        <a href="{{url('admin/users')}}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form data-parsley-validate action="{{url('admin/users/'.$user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" value="{{old('name',$user->name)}}" name="name" class="form-control"
                                required
                                data-parsley-required-message="Tên Người dùng không được bỏ trống"
                                data-parsley-maxlength="255"
                                data-parsley-maxlength-message="Tên Người dùng không được vượt quá 255 kí tự!"
                            />
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" value="{{old('email',$user->email)}}" name="email" class="form-control"
                                required
                                data-parsley-required-message="Email không được bỏ trống!"
                                data-parsley-type="email"
                                data-parsley-type-message="Vui lòng nhập đúng định dạng Email!"
                            />
                            </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" value="{{old('password')}}" name="password" class="form-control"
                                required
                                data-parsley-required-message="Mật khẩu không được bỏ trống!"
                                data-parsley-maxlength="20"
                                data-parsley-maxlength-message="Mật khẩu không được vượt quá 20 kí tự!"
                                data-parsley-minlength="8"
                                data-parsley-minlength-message="Mật khẩu không được ít hơn 8 kí tự!"
                            />
                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        <div class="mb-3">
                            <label for="">Roles</label>
                            <select name="roles[]" class="form-control" multiple>
                                <option value="#">Select Role</option>
                                @foreach ($roles as $role)
                                <option value="{{$role}}" {{in_array($role,$userRoles) ? 'selected' : ''}}>{{$role}}</option>
                                @endforeach
                            </select>
                            @error('roles') <span class="text-danger">{{$message}}</span> @enderror
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
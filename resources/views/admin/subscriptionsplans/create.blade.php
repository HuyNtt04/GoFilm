@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Thêm Gói</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.subscriptionsplans.index') }}">Subscriptions Plans</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.subscriptionsplans.create') }}">Add Plan</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Thêm Gói Đăng Ký</h2>
        <a href="{{route('admin.subscriptionsplans.index')}}" class="btn-secondary">Quay Lại</a>
    </div>
    <div class="form-container">
        <form data-parsley-validate action="{{ route('admin.subscriptionsplans.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Tên gói:</label>
                <input
                    type="text" name="name" class="form-control"
                    required
                    data-parsley-maxlength="255"
                    data-parsley-required-message="Vui lòng nhập tên gói"
                    data-parsley-maxlength-message="Tên gói không được dài quá 255 ký tự"
                >
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="duration">Thời Hạn:</label>
                <input type="string" name="duration" class="form-control"
                    required
                    data-parsley-maxlength="50"
                    data-parsley-required-message="Vui lòng nhập thời hạn"
                    data-parsley-maxlength-message="Thời hạn không được dài quá 50 ký tự"
                >
                @error('duration')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="number" name="price" class="form-control"
                    required
                    data-parsley-type="number"
                    data-parsley-minlength="0"
                    data-parsley-required-message="Vui lòng nhập giá của gói"
                    data-parsley-type-message="Vui lòng nhập gói hợp lệ"
                    data-parsley-minlength-message="Giá không được có giá trị âm"
                >
                @error('price')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="btn-container">
                <button type="submit" class="btn-primary">Thêm</button>
            </div>
        </form>
    </div>
</div>

@endsection
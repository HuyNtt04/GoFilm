@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Sửa Đăng ký</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.subscriptions.index') }}">Subscriptions</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.subscriptions.edit',$subscription->id) }}">Edit Subscription</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Sửa Gói Đăng Ký</h2>
        <a href="{{route('admin.subscriptions.index',$subscription->id)}}" class="btn-secondary">Quay Lại</a>
    </div>
    <div class="form-container">
        <form data-parsley-validate action="{{ route('admin.subscriptions.update',$subscription->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_plan">Gói</label>
                <select name="id_plan" required>
                    @foreach ($subscriptions_plans as $subscriptions_plan)
                        <option value="{{ $subscriptions_plan->id }}" {{ old('id_plan',$subscription->id_plan) == $subscriptions_plan->id ? 'selected' : '' }}>{{ $subscriptions_plan->name }}</option>
                    @endforeach
                </select>
                @error('id_plan')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_user">Người đăng ký</label>
                <select name="id_user" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('id_user',$subscription->id_user) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('id_plan')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Start_date">Ngày bắt đầu:</label>
                <input
                    type="date" value="{{ old('Start_date',$subscription->Start_date) }}" name="Start_date" class="form-control"
                    required
                    data-parsley-type="date" 
                    data-parsley-error-message="Hãy nhập ngày bắt đầu thích hợp!" 
                    data-parsley-min="{{ \Carbon\Carbon::now()->toDateString() }}" 
                    data-parsley-error-message="Ngày bắt đầu không được ở quá khứ!"
                >
                @error('Start_date')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="End_date">Ngày hết hạn:</label>
                <input type="date" value="{{ old('End_date',$subscription->End_date) }}" name="End_date" class="form-control"
                    data-parsley-type="date" 
                    data-parsley-error-message="Hãy nhập ngày hết hạn thích hợp!" 
                    data-parsley-min="{{ \Carbon\Carbon::now()->toDateString() }}" 
                    data-parsley-error-message="Ngày hết hạn không được ở quá khứ" 
                    data-parsley-gte="Start_date" 
                    data-parsley-error-message="Ngày hết hạn phải lớn hơn hoặc bằng ngày bắt đầu"
                >
                @error('End_date')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Status">Trạng thái</label>
                <select name="Status" required>
                    <option value="active" {{ old('Status',$subscription->Status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('Status',$subscription->Status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="expired" {{ old('Status',$subscription->Status) == 'expired' ? 'selected' : '' }}>Expired</option>
                </select>
                @error('Status')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Payment_status">Trạng thái thanh toán</label>
                <select name="Payment_status" required>
                    <option value="0" {{ old('Payment_status',$subscription->Payment_status) == 0 ? 'selected' : '' }}>Chưa thanh toán</option>
                    <option value="1" {{ old('Payment_status',$subscription->Payment_status) == 1 ? 'selected' : '' }}>Đã thanh toán</option>
                </select>
                @error('Status')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="btn-container">
                <button type="submit" class="btn-primary">Sửa</button>
            </div>
        </form>
    </div>
</div>

@endsection
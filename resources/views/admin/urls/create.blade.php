@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Thêm Đường Dẫn</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.movie.index') }}">Movies</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.episodes.index',$episode->movie->id) }}">Episodes</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.urls.index',$episode->id) }}">Urls</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.urls.create',$episode->id) }}">Add Url</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Thêm Url</h2>
        <a href="{{route('admin.urls.index',$episode->id)}}" class="btn-secondary">Quay Lại</a>
    </div>
    <div class="form-container">
        <form data-parsley-validate action="{{ route('admin.urls.store',$episode->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="url">Url:</label>
                <input
                    type="url" name="url" class="form-control"
                    required
                    data-parsley-maxlength="65535"
                    data-parsley-type="url"
                    data-parsley-required-message="Vui lòng nhập Url"
                    data-parsley-maxlength-message="Url không được dài quá 65535 ký tự"
                    data-parsley-type-message="Vui lòng nhập Url hợp lệ"

                >
                @error('url')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="server_name">Tên Server:</label>
                <input type="text" name="server_name" class="form-control"
                    required
                    data-parsley-maxlength="50"
                    data-parsley-required-message="Vui lòng nhập tên server"
                    data-parsley-maxlength-message="Url không được dài quá 50 ký tự"
                >
                @error('server_name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <select name="resolution" required data-parsley-required-message="Vui lòng chọn độ phân giải.">
                    <option value="">-- Chọn độ phân giải --</option>
                    <option value="360p">360p</option>
                    <option value="480p">480p</option>
                    <option value="720p">720p</option>
                    <option value="1080p">1080p</option>
                    <option value="4K">4K</option>
                </select>
                @error('resolution')
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

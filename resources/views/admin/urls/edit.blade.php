@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Sửa Đường Dẫn</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.movie.index') }}">Movies</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.episodes.index',$episode->movie->id) }}">Episodes</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.urls.index',$episode->id) }}">Urls</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.urls.edit',['episode'=>$episode->id,'url'=>$url->id]) }}">Edit Url</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container recentOrders">
    <div class="cardHeader">
        <h2>Sửa Url</h2>
        <a href="{{ route('admin.urls.index',$episode->id) }}" class="btn btn-secondary">Quay Lại</a>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-container">
        <form data-parsley-validate action="{{ route('admin.urls.update', ['episode'=>$episode->id,'url'=>$url->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="url">Url:</label>
                <input type="url" name="url"
                    required
                    data-parsley-type="url"
                    data-parsley-maxlength="65535"
                    data-parsley-required-message="Vui lòng nhập Url"
                    data-parsley-maxlength-message="Url không được dài quá 65535 ký tự"
                    class="form-control" value="{{ old('url',$url->url) }}" 
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
                    value="{{ old('server_name',$url->server_name) }}" 
                >
                @error('server_name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <select name="resolution"
                    required
                    data-parsley-required-message="Vui lòng chọn độ phân giải.">
                    <option value="">-- Chọn độ phân giải --</option>
                    <option value="360p" {{ $url->resolution == '360p' ? 'selected' : '' }}>360p</option>
                    <option value="480p" {{ $url->resolution == '480p' ? 'selected' : '' }}>480p</option>
                    <option value="720p" {{ $url->resolution == '720p' ? 'selected' : '' }}>720p</option>
                    <option value="1080p" {{ $url->resolution == '1080p' ? 'selected' : '' }}>1080p</option>
                    <option value="4K" {{ $url->resolution == '4K' ? 'selected' : '' }}>4K</option>
                </select>
                @error('resolution')
                        <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
            </div>
        </form>
    </div>
</div>
@endsection
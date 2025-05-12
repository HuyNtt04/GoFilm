@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Sửa Tập</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.movie.index') }}">Movies</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.episodes.index',$movie->id) }}">Episodes</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.episodes.edit',['movie'=>$movie->id,'episode'=>$episode->id]) }}">Edit Episode</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container recentOrders">
    <div class="cardHeader">
        <h2>Sửa Tập</h2>
        <a href="{{ route('admin.episodes.index',$movie->id) }}" class="btn btn-secondary">Quay Lại</a>
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
        <form data-parsley-validate action="{{ route('admin.episodes.update', ['movie'=>$movie->id,'episode'=>$episode->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" name="title"
                    required
                    data-parsley-maxlength="255"
                    data-parsley-required-message="Vui lòng nhập tiêu đề"
                    data-parsley-maxlength-message="Tiêu đề không được dài quá 255 ký tự"
                    class="form-control" value="{{ old('title',$episode->title) }}" 
                >
                @error('title')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Mô Tả:</label>
                <input type="text" name="description" class="form-control"
                    required
                    data-parsley-required-message="Vui lòng nhập mô tả"
                    value="{{ old('description',$episode->description) }}" 
                >
                @error('description')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="duration">Thời Lượng:</label>
                <input type="number" name="duration" class="form-control"
                    required
                    data-parsley-type="number"
                    data-parsley-required-message="Vui lòng nhập thời lượng của tập"
                    data-parsley-type-message="Vui lòng nhập thời lượng tập hợp lệ"
                    value="{{old('duration', $episode->duration )}}"
                >
                @error('duration')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="episode">Episode:</label>
                <input type="number" name="episode" class="form-control"
                    required
                    data-parsley-type="number"
                    data-parsley-required-message="Tập mấy?"
                    data-parsley-type-message="Vui lòng nhập tập phim hợp lệ"
                    value="{{old('episode', $episode->episode )}}"
                >
                @error('episode')
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
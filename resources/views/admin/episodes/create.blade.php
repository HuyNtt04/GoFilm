@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Thêm Tập</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.movie.index') }}">Movies</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.episodes.index',$movie->id) }}">Episodes</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.episodes.create',$movie->id) }}">Add Episode</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Thêm Tập</h2>
        <a href="{{route('admin.episodes.index',$movie->id)}}" class="btn-secondary">Quay Lại</a>
    </div>
    <div class="form-container">
        <form data-parsley-validate action="{{ route('admin.episodes.store',$movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input
                    type="text" name="title" class="form-control"
                    required
                    data-parsley-maxlength="255"
                    data-parsley-required-message="Vui lòng nhập tiêu đề"
                    data-parsley-maxlength-message="Tiêu đề không được dài quá 255 ký tự"
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
                    data-parsley-required-message="Vui lòng nhập thời lượng của phim"
                    data-parsley-type-message="Vui lòng nhập thời lượng phim hợp lệ"
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
                    data-parsley-required-message="Vui lòng nhập thời lượng của phim"
                    data-parsley-type-message="Vui lòng nhập thời lượng phim hợp lệ"
                >
                @error('episode')
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
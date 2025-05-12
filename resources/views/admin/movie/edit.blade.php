@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Sửa Phim</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.movie.index') }}">Movies</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.movie.edit',$movie->id) }}">Edit Movie</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container recentOrders">
    <div class="cardHeader">
        <h2>Sửa Phim</h2>
        <a href="{{ route('admin.movie.index') }}" class="btn btn-secondary">Quay Lại</a>
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
        <form data-parsley-validate action="{{ route('admin.movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_category">Phim:</label>
                <div class="row">
                    @foreach ( $categories as $category )
                        <div class="col-md-2">
                            <input type="checkbox"
                                @if ($loop->first)
                                data-parsley-mincheck="1"
                                data-parsley-mincheck-message="Vui lòng chọn ít nhất 1 thể loại"
                                data-parsley-errors-container="#category-error"
                                @endif
                                name="id_category[]" value="{{ $category->id }}" {{ in_array($category->id, $movieCategories) ? 'checked':''}} >{{$category->name }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" name="title"
                    required
                    data-parsley-maxlength="255"
                    data-parsley-required-message="Vui lòng nhập tiêu đề"
                    data-parsley-maxlength-message="Tiêu đề không được dài quá 255 ký tự"
                    class="form-control" value="{{ old('title',$movie->title) }}" 
                >
                @error('title')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="is_series">Phim:</label>
                <select required 
                        name="is_series" id="is_series"
                >
                    <option value="0" {{ old('is_series',$movie->is_series) == 0 ? 'selected' : '' }}>Phim lẻ</option>
                    <option value="1" {{ old('is_series',$movie->is_series) == 1 ? 'selected' : '' }}>Phim bộ</option>
                </select>
                @error('is_series')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Mô Tả:</label>
                <input type="text" name="description" class="form-control"
                    required
                    data-parsley-required-message="Vui lòng nhập mô tả"
                    value="{{ old('description',$movie->description) }}" 
                >
                @error('description')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="thumbnail">Thumbnail:</label>
                <input type="file" id="thumbnail" name="thumbnail" class="form-control"
                    required
                    accept=".jpeg,.jpg,.png,.gif,.svg"
                    data-parsley-required-message="Vui lòng chọn ảnh"
                    data-parsley-filemaxmegabytes="1"
                    data-parsley-filemimetypes="image/jpeg, image/png, image/jpg, image/gif, image/svg+xml"
                    value="{{old('thumbnail', $movie->thumbnail )}}" 
                >
                @error('thumbnail')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <div id="thumbnail_preview"></div>
            </div>
            <div class="form-group">
                <label for="cast">Diễn viên:</label>
                <input type="text" name="cast" class="form-control"
                    required
                    data-parsley-required-message="Vui lòng thêm diễn viên"
                    value="{{old('cast', $movie->cast )}}" 
                >
                @error('cast')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="director">Đạo Diễn:</label>
                <input type="text" name="director" class="form-control"
                    required
                    data-parsley-required-message="Vui lòng thêm đạo diễn"
                    value="{{old('director', $movie->director )}}" 
                >
                @error('director')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="release_year">Năm Phát Hành:</label>
                <input type="number" name="release_year" class="form-control"
                    required
                    data-parsley-type="number"
                    data-parsley-required-message="Vui lòng nhập năm phát hành của phim"
                    data-parsley-type-message="Vui lòng nhập một năm hợp lệ"    
                    value="{{old('release_year', $movie->release_year )}}" 
                >
            </div>
            <div class="form-group">
                <label for="country">Quốc Gia:</label>
                <input type="text" name="country" class="form-control"
                    required
                    data-parsley-required-message="Vui lòng thêm quốc gia"
                    value="{{old('country', $movie->country )}}" 
                >
                @error('country')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="views">Lượt xem:</label>
                <input type="number" name="views" class="form-control"
                    required
                    data-parsley-type="number"
                    data-parsley-required-message="Vui lòng nhập lượt xem"
                    data-parsley-type-message="Vui lòng nhập lượt xem hợp lệ"
                    value="{{old('views', $movie->views )}}" 
                >
                @error('views')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="film_duration">Thời Lượng:</label>
                <input type="number" name="film_duration" class="form-control"
                    required
                    data-parsley-type="number"
                    data-parsley-required-message="Vui lòng nhập thời lượng của phim"
                    data-parsley-type-message="Vui lòng nhập thời lượng phim hợp lệ"
                    value="{{old('film_duration', $movie->film_duration )}}"
                >
                @error('film_duration')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Hình Ảnh:</label>
                <input type="file" name="image[]" id="images" class="form-control"
                    required
                    data-parsley-required-message="Vui lòng chọn ít nhất một hình ảnh"
                    data-parsley-filemax="2048"
                    data-parsley-filetype="image"
                    data-parsley-filetypes="jpeg,png,jpg,gif,svg"
                    data-parsley-maxsize="2048"
                    value="{{old('image', $movie->image )}}" multiple>
                <div id="image_preview"></div>
                @error('image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
            </div>
        </form>
    </div>
</div>
@push('scripts')
    <script type='module' src="{{ asset('js/admin/admin.js') }}"></script>
    @endpush
@endsection
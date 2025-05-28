@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Category</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form data-parsley-validate action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" class="form-control" value="{{ $category->name }}" 
            required
            data-parsley-maxlength="255"
            data-parsley-required-message="Vui lòng nhập tên loại!"
            data-parsley-maxlength-message="Tên loại phải ít hơn hoặc bằng 255 kí tự!"
            >
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
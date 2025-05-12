@extends('layouts.admin')

@section('content')
<style>
.form-container {
    max-width: 500px;
    margin: 0 auto;
    background: var(--white);
    padding: 20px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
    border-radius: 10px;
}

.form-container h1 {
    text-align: center;
    color: var(--blue);
    font-weight: 600;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-weight: 600;
    display: block;
    margin-bottom: 5px;
    color: var(--black1);
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
}

.btn-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.btn-primary {
    background: #1795ce;
    color: var(--white);
    padding: 10px 15px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s;
    border: none;
    cursor: pointer;
}

.btn-primary:hover {
    background: #0f7ab9;
}

.btn-secondary {
    background: #ccc;
    color: var(--black1);
    padding: 10px 15px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s;
}

.btn-secondary:hover {
    background: #b3b3b3;
}

.alert-danger {
    background: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 15px;
}

.alert-danger ul {
    margin: 0;
    padding-left: 20px;
}
</style>
<div class="form-container">
    <h1>Add Category</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form data-parsley-validate action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" 
            required
            data-parsley-maxlength="255"
            data-parsley-required-message="Vui lòng nhập tên loại!"
            data-parsley-maxlength-message="Tên loại phải ít hơn hoặc bằng 255 kí tự!"
            >
        </div>

        <div class="btn-container">
            <button type="submit" class="btn-primary">Save</button>
            <a href="{{ route('admin.category.index') }}" class="btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
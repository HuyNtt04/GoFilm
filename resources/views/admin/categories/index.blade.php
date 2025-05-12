@extends('layouts.admin')

@section('content')
<style>
.Category {
    position: relative;
    display: grid;
    min-height: 500px;
    background: var(--white);
    padding: 20px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
    border-radius: 20px;
}

.cardHeader {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.cardHeader h2 {
    font-weight: 600;
    color: var(--blue);
}

.cardHeader .btn {
    position: relative;
    padding: 5px 10px;
    background: var(--blue);
    text-decoration: none;
    color: var(--white);
    border-radius: 6px;
}

/* Popup Form */
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    justify-content: center;
    align-items: center;
}

.popup-form {
    background: var(--white);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.2);
    width: 400px;
    text-align: center;
}

.popup-form h2 {
    margin-bottom: 20px;
    color: var(--blue);
}

.popup-form .form-group {
    margin-bottom: 15px;
    text-align: left;
}

.popup-form label {
    font-weight: 600;
}

.popup-form input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
}

.popup-form .btn-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.popup-form .btn-primary {
    background: #1795ce;
    color: var(--white);
    padding: 10px 15px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
}

.popup-form .btn-primary:hover {
    background: #0f7ab9;
}

.popup-form .btn-secondary {
    background: #ccc;
    color: var(--black1);
    padding: 10px 15px;
    border-radius: 6px;
    cursor: pointer;
}

.popup-form .btn-secondary:hover {
    background: #b3b3b3;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.table thead td {
    font-weight: 600;
}

.Category table tr {
    color: var(--black1);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.Category table tr:last-child {
    border-bottom: none;
}

.Category table tbody tr:hover {
    background: var(--blue);
    color: var(--white);
}

.Category table tr td {
    padding: 10px;
}

.Category table tr td:last-child {
    text-align: end;
}

.Category table tr td:nth-child(2) {
    /* text-align: end; */
}

.Category table tr td:nth-child(3) {
    text-align: center;
}

.status.delivered {
    padding: 2px 4px;
    background: #8de02c;
    color: var(--white);
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
}

.status.pending {
    padding: 2px 4px;
    background: #e9b10a;
    color: var(--white);
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
}

.status.return {
    padding: 2px 4px;
    background: #f00;
    color: var(--white);
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
}

.status.inProgress {
    padding: 2px 4px;
    background: #1795ce;
    color: var(--white);
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
}

.btn-edit,
.btn-delete {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: 0.3s;
}

.btn-edit {
    background: #1795ce;
    color: var(--white);
}

.btn-edit:hover {
    background: #0f7ab9;
}

.btn-delete {
    background: #f00;
    color: var(--white);
    border: none;
    cursor: pointer;
}

.btn-delete:hover {
    background: #d90000;
}
</style>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Categories</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Categories</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="Category">
    <div class="cardHeader">
        <h2>Categories</h2>
        <button class="btn" onclick="openForm()">Add Category</button>
        <button href="{{ route('admin.category.delete')}}" class="btn-delete" id="delete-categories">Xóa</button>
    </div>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <td>
                    <label class="container">
                        <input type="checkbox" class="check-all">
                        <div class="checkmark"></div>
                    </label>
                <td>ID</td>
                <td>Name</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr id="category-{{$category->id}}">\
                <td>
                    <label class="container">
                        <input type="checkbox" class="delete-checkbox" value="{{ $category->id }}">
                        <div class="checkmark"></div>
                    </label>
                </td>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <button class="btn-edit" onclick="openFormEdit()">Edit Category</button>
                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn-delete delete-category">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="links">{{ $categories->onEachSide(1)->links() }}</div>

</div>

<!-- Popup Form -->
<div class="overlay" id="overlay">
    <div class="popup-form">
        <h2>Add Category</h2>
        <form action="{{ route('admin.category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn-primary">Save</button>
                <button type="button" class="btn-secondary" onclick="closeForm()">Cancel</button>
            </div>
        </form>
    </div>
</div>
<div class="overlay" id="overlay-edit">
    <div class="popup-form">
        <h2>Update category</h2>
        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn-primary">Update</button>
                <button type="button" class="btn-secondary" onclick="closeFormEdit()">Cancel</button>
            </div>
        </form>
    </div>
</div>
<script>
function openForm() {
    document.getElementById("overlay").style.display = "flex";
}

function closeForm() {
    document.getElementById("overlay").style.display = "none";
}

function openFormEdit() {
    document.getElementById("overlay-edit").style.display = "flex";
}

function closeFormEdit() {
    document.getElementById("overlay-edit").style.display = "none";
}
</script>
    @push('scripts')
        <script type='module' src="{{ asset('js/admin/categories/delete.js') }}"></script>
        <script type='module' src="{{ asset('js/admin/admin.js') }}"></script>
    @endpush
@endsection
@extends('layouts.admin')

@section('content')
<style>
.recentOrders {
    position: relative;
    display: grid;
    min-height: 500px;
    background: var(--white);
    padding: 20px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
    border-radius: 20px;
}

.cardHeader h2 {
    font-weight: 600;
    color: var(--blue);
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.table thead td {
    font-weight: 600;
}

.recentOrders table tr {
    color: var(--black1);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.recentOrders table tbody tr:hover {
    background: var(--blue);
    color: var(--white);
}

.recentOrders table tr td {
    padding: 10px;
}

.btn-add,
.btn-edit,
.btn-delete,
.btn-detail {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: 0.3s;
}

.btn-add {
    background: var(--blue);
    color: var(--white);
}

.btn-add:hover {
    scale: 1.1;
}

.btn-detail {
    background: #ffa500;
    color: white;
}

.btn-detail:hover {
    background: #cc8400;
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

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 80%;
    max-width: 600px;
    position: relative;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 20px;
    font-weight: bold;
}

.close-modal {
    cursor: pointer;
    font-size: 25px;
    font-weight: bold;
}
</style>
@push('css')
<link rel="stylesheet" href="{{ asset('css/admin/checkbox.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/delete.css') }}">
@endpush
@if(session('success'))
@push('scripts')
<script>
Swal.fire({
    icon: 'success',
    title: 'Thành công!',
    text: "{{ session('success') }}",
});
</script>
@endpush
@endif
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Comments</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.comments.index') }}">Comments</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Bình luận</h2>
        <button href="{{ route('admin.comments.delete')}}" class="btn-delete" id="delete-comments">Xóa</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <td>
                    <label class="container">
                        <input type="checkbox" class="check-all">
                        <div class="checkmark"></div>
                    </label>
                </td>
                <td>ID</td>
                <td>Phim</td>
                <td>Người bình luận</td>
                <td>Nội dung</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
            <tr id="comment-{{$comment->id}}">
                <td>
                    <label class="container">
                        <input type="checkbox" class="delete-checkbox" value="{{ $comment->id }}">
                        <div class="checkmark"></div>
                    </label>
                </td>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->movie->title }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->content }}</td>
                <td>
                    <a class="btn-edit" href="{{ route('admin.replyComments.index', ['comment'=>$comment->id]) }}"
                        class="btn-edit">
                        Phản hồi
                    </a>
                    <form action="{{ route('admin.comments.destroy', ['comment'=>$comment->id]) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn-delete delete-comment">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="links">{{ $comments->onEachSide(1)->links() }}</div>
</div>
@push('scripts')
<script type='module' src="{{ asset('js/admin/comments/delete.js') }}"></script>
<script type='module' src="{{ asset('js/admin/admin.js') }}"></script>
@endpush
@endsection
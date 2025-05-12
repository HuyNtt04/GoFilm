@extends('layouts.admin')

@section('content')
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Phim đã xóa mềm</h2>
        <a href="{{ route('admin.movie.index') }}" class="btn-add">Quay lại</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Tiêu Đề</td>
                <td>Thumbnail</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->id }}</td>
                <td>{{ $movie->title }}</td>
                <td><img src="{{ $movie->thumbnail }}" width="50"></td>
                <td>
                    <!-- Khôi phục phim -->
                    <form action="{{ route('admin.movie.restore', $movie->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-restore">Khôi phục</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
.btn-restore {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 6px;
    background: #27ae60;
    color: white;
    transition: 0.3s;
}

.btn-restore:hover {
    background: #219150;
}
</style>
@endsection
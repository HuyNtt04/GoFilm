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

.cardHeader {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
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

.btn-link {


    background: var(--white);
    color: var(--blue);
    border: 1px solid var(--blue);
    border-radius: 6px;
    padding: 6px 12px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: 0.3s;
}

.btn-link,
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
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Danh sách link phim: {{ $movie->title }}</h2>
        <a href="{{ route('admin.movie.index') }}" class="btn-link">Quay lại</a>
    </div>
    @if($links->isEmpty())
    <p>Không có link nào.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Server</th>
                <th>Resolution</th>
                <th>URL</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($links as $link)
            <tr>
                <td>{{ $link->id }}</td>
                <td>{{ $link->server_name }}</td>
                <td>{{ $link->resolution }}</td>
                <td>
                    <!-- Hiện URL rút gọn -->
                    {{ \Illuminate\Support\Str::limit($link->url, 50) }}
                </td>
                <td>
                    <!-- Nút Chi tiết mở modal -->
                    <button class="btn-detail" data-url="{{ $link->url }}">Chi tiết</button>
                <td><a class="btn-edit" href="{{ $link->url }}" target="_blank">Xem thử</a></td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>


<!-- Modal hiển thị URL -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Chi tiết Link Phim</h3>
        <p id="full-url"></p>
    </div>
</div>

<!-- CSS cho modal -->
<style>
/* Ẩn modal ban đầu */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

/* Nội dung modal */
.modal-content {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    max-width: 80%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

/* Nút đóng */
.close {
    float: right;
    font-size: 28px;
    cursor: pointer;
}
</style>

<!-- JavaScript xử lý modal -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('modal');
    const fullUrlText = document.getElementById('full-url');
    const closeBtn = document.querySelector('.close');

    // Mở modal
    document.querySelectorAll('.btn-detail').forEach(button => {
        button.addEventListener('click', function() {
            const url = this.getAttribute('data-url');
            fullUrlText.textContent = url;
            modal.style.display = 'flex';
        });
    });
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});
</script>
@endsection
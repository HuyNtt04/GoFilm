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
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Movies</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.movie.index') }}">Movies</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Movies</h2>
        <a href="{{ route('admin.movie.create') }}" class="btn-add">Thêm Phim</a>
        <button href="{{ route('admin.movie.del') }}" style="opacity: 0.5" class="btn" id="soft-delete">
            <svg viewBox="0 0 15 17.5" height="17.5" width="15" xmlns="http://www.w3.org/2000/svg" class="icon">
                <path transform="translate(-2.5 -1.25)"
                    d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z"
                    id="Fill"></path>
            </svg>
        </button>
        @can('delete movie')
        <a href="{{ route('admin.movie.bin') }}" class="bin-button">
            🗑️
        </a>
        @endcan
    </div>
    <form method="GET" action="{{ route('admin.movie.index') }}">
        <select name="is_series" onchange="this.form.submit()">
            <option value="0" {{ $is_series === false ? 'selected' : '' }}>Phim lẻ</option>
            <option value="1" {{ $is_series === true ? 'selected' : '' }}>Phim bộ</option>
        </select>
    </form>
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
                <td>Tiêu Đề</td>
                <td>Thumbnail</td>
                <td>Loại</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr id="movie-{{$movie->id}}">
                <td>
                    <label class="container">
                        <input type="checkbox" class="delete-checkbox" value="{{ $movie->id }}">
                        <div class="checkmark"></div>
                    </label>
                </td>
                <td>{{ $movie->id }}</td>
                <td>{{ $movie->title }}</td>
                <td>
                    <img src="{{ asset($movie->thumbnail) }}" alt="Thumbnail" width="100">
                </td>
                <td>
                    @foreach ( $movie->categories as $category)
                    {{ $category->name }},
                    @endforeach
                </td>

                <td>
                    <button class="btn-detail" onclick="showMovieDetail({{ $movie->id }})">Chi Tiết</button>
                    </button>

                    <a class="btn-edit" href="{{ route('admin.movie.edit', $movie->id) }}" class="btn-edit">Edit</a>
                    <label for="isDeleted">
                        <button class="bin btn-delete" name="isDeleted" data-id="{{ $movie->id }}">Xóa</button>
                    </label>
                    <a class="btn-edit" href="{{ route('admin.episodes.index', $movie->id) }}" class="btn-edit">Tập</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="links">{{ $movies->onEachSide(1)->links() }}</div>

</div>
<!-- Modal thêm phim -->
<div id="addMovieModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span>Thêm Phim</span>
            <span class="close-modal" onclick="closeAddMovieModal()">&times;</span>
        </div>
        <form action="{{ route('admin.movie.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" class="form-control" required>
            <br>
            <label for="description">Mô Tả:</label>
            <input type="text" name="description" class="form-control" required>
            <br>
            <label for="thumbnail">Thumbnail:</label>
            <input type="file" name="thumbnail" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</div>
<!-- Modal hiển thị chi tiết phim -->
<div id="movieModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span>Chi Tiết Phim</span>
            <span class="close-modal" onclick="closeModal()">&times;</span>
        </div>
        <div id="movieDetails"></div>
    </div>
</div>

<script>
function showMovieDetail(movieId) {
    fetch(`/admin/movie/${movieId}/detail`)
        .then(response => response.json())
        .then(data => {
            let modalContent = `
                <p><strong>ID:</strong> ${data.id}</p>
                <p><strong>Tiêu đề:</strong> ${data.title}</p>
                <p><strong>Mô tả:</strong> ${data.description}</p>
                <p><strong>Diễn Viên:</strong> ${data.cast}</p>
                <p><strong>Đạo Diễn:</strong> ${data.director}</p>
                <p><strong>Ngày Phát Hành:</strong> ${data.release_year}</p>
                <p><strong>Quốc Tịch:</strong> ${data.country}</p>
                <p><strong>Lượt Xem:</strong> ${data.views}</p>
                <p><strong>Thời Lượng:</strong> ${data.film_duration}</p>
                <p><strong>Ảnh:</strong> <img src="http://127.0.0.1:8000/${data.thumbnail}" width="100"></p>
            `;
            document.getElementById('movieDetails').innerHTML = modalContent;
            document.getElementById('movieModal').style.display = 'flex';
        })
        .catch(error => console.error('Lỗi:', error));
}

function closeModal() {
    document.getElementById('movieModal').style.display = 'none';
}
</script>
@push('scripts')
<script type='module' src="{{ asset('js/admin/movie/movie.js') }}"></script>
<script type='module' src="{{ asset('js/admin/admin.js') }}"></script>
@endpush
@endsection
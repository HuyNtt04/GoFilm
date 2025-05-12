

<?php $__env->startSection('content'); ?>
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
binShow
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
        <h2>Thùng Rác Phim</h2>
        <a href="<?php echo e(route('admin.movie.bin.restore')); ?>" id="restore">Phục hồi</a>
        <a href="<?php echo e(route('admin.movie.bin.delete')); ?>" class="btn" id="delete">
            <svg viewBox="0 0 15 17.5" height="17.5" width="15" xmlns="http://www.w3.org/2000/svg" class="icon">
                <path transform="translate(-2.5 -1.25)" d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z" id="Fill"></path>
            </svg>
        </a>
        <a href="<?php echo e(route('admin.movie.index')); ?>" class="btn-add">⬅ Quay lại</a>
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
                <td>Tiêu Đề</td>
                <td>Thumbnail</td>
                <td>Loại</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="movie-<?php echo e($movie->id); ?>">
                <td>
                    <label class="container">
                        <input type="checkbox" class="delete-checkbox" value="<?php echo e($movie->id); ?>">
                        <div class="checkmark"></div>
                    </label>
                </td>
                <td><?php echo e($movie->id); ?></td>
                <td><?php echo e($movie->title); ?></td>
                <td>
                    <img src="<?php echo e(asset($movie->thumbnail)); ?>" alt="Thumbnail" width="100">
                </td>
                <td>
                    <?php $__currentLoopData = $movie->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($category->name); ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>

                <td>
                    <button class="btn-detail" onclick="showMovieDetail(<?php echo e($movie->id); ?>)">Chi Tiết</button>

                    <button type="submit" name="isDeleted" class="restore btn-link" data-id="<?php echo e($movie->id); ?>">Phục hồi</button>
                    <form action="<?php echo e(route('admin.movie.destroy', $movie->id)); ?>" method="POST"
                        style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="button" id="delete-forever" class="btn-delete">Xóa Vĩnh Viễn</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>


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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\GoFilm\GoFilm\resources\views/admin/movie/bin.blade.php ENDPATH**/ ?>
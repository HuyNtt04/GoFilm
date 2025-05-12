

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
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/admin/checkbox.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/admin/delete.css')); ?>">
<?php $__env->stopPush(); ?>
<?php if(session('success')): ?>
<?php $__env->startPush('scripts'); ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Thành công!',
    text: "<?php echo e(session('success')); ?>",
});
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Episodes</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.movie.index')); ?>">Movies</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.episodes.index',$movieID)); ?>">Episodes</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Episodes</h2>
        <a href="<?php echo e(route('admin.episodes.create',$movieID)); ?>" class="btn-add">Thêm Tập</a>
        <button href="<?php echo e(route('admin.episodes.delete',$movieID)); ?>" class="btn-delete" id="delete-eps">Xóa</button>
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
                <td>Tiêu đề</td>
                <td>Mô tả</td>
                <td>Thời lượng</td>
                <td>Tập</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="episode-<?php echo e($episode->id); ?>">
                <td>
                    <label class="container">
                        <input type="checkbox" class="delete-checkbox" value="<?php echo e($episode->id); ?>">
                        <div class="checkmark"></div>
                    </label>
                </td>
                <td><?php echo e($episode->id); ?></td>
                <td><?php echo e($episode->movie->title); ?></td>
                <td><?php echo e($episode->title); ?></td>
                <td><?php echo e($episode->description); ?></td>
                <td><?php echo e($episode->duration); ?></td>
                <td><?php echo e($episode->episode); ?></td>
                <td>
                    <a class="btn-edit"
                        href="<?php echo e(route('admin.episodes.edit', ['movie'=>$movieID,'episode'=>$episode->id])); ?>"
                        class="btn-edit">Edit</a>
                    <form
                        action="<?php echo e(route('admin.episodes.destroy', ['movie'=>$episode->movie->id,'episode'=>$episode->id])); ?>"
                        method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="button" class="btn-delete delete-ep">Delete</button>
                    </form>
                    <a class="btn-edit" href="<?php echo e(route('admin.urls.index', ['episode'=>$episode->id])); ?>"
                        class="btn-edit">Urls</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="links"><?php echo e($episodes->onEachSide(1)->links()); ?></div>
</div>
<?php $__env->startPush('scripts'); ?>
<script type='module' src="<?php echo e(asset('js/admin/episodes/delete.js')); ?>"></script>
<script type='module' src="<?php echo e(asset('js/admin/admin.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views/admin/episodes/index.blade.php ENDPATH**/ ?>
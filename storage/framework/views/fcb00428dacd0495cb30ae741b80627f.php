

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
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Thùng Rác</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.notifications.index')); ?>">Notifications</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.notifications.bin')); ?>">Bin</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Thùng Rác thông báo</h2>
        <a href="<?php echo e(route('admin.notifications.bin.restore')); ?>" id="restore-noti">Phục hồi</a>
        <a href="<?php echo e(route('admin.notifications.bin.delete')); ?>" class="btn" id="delete-noti">
            <svg viewBox="0 0 15 17.5" height="17.5" width="15" xmlns="http://www.w3.org/2000/svg" class="icon">
                <path transform="translate(-2.5 -1.25)" d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z" id="Fill"></path>
            </svg>
        </a>
        <a href="<?php echo e(route('admin.notifications.index')); ?>" class="btn-add">⬅ Quay lại</a>
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
                <td>Nội dung</td>
                <td>Người nhận</td>
                <td>Trạng thái</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="notification-<?php echo e($notification->id); ?>">
                <td>
                    <label class="container">
                        <input type="checkbox" class="delete-checkbox" value="<?php echo e($notification->id); ?>">
                        <div class="checkmark"></div>
                    </label>
                </td>
                <td><?php echo e($notification->id); ?></td>
                <td><?php echo e($notification->content); ?></td>
                <td><?php echo e($notification->receiver->name); ?></td>
                <td>
                    <?php echo e($notification->status == 0 ? 'Chưa xem' : 'Đã xem'); ?>

                </td>

                <td>
                    <button type="submit" name="isDeleted" class="restore-noti btn-link" data-id="<?php echo e($notification->id); ?>">Phục hồi</button>
                    <form action="<?php echo e(route('admin.notifications.destroy', $notification->id)); ?>" method="POST"
                        style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button  type="button" class="btn-delete delete-forever-noti" name="isDeleted" data-id="<?php echo e($notification->id); ?>">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->startPush('scripts'); ?>
<script type='module' src="<?php echo e(asset('js/admin/notifications/bin.js')); ?>"></script>
<script type='module' src="<?php echo e(asset('js/admin/admin.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views/admin/notifications/bin.blade.php ENDPATH**/ ?>
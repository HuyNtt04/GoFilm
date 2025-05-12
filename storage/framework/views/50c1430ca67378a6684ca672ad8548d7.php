

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Sửa Gói</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.subscriptionsplans.index')); ?>">Subscriptions Plans</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.subscriptionsplans.edit',$subscriptionsplan->id)); ?>">Edit Plan</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Sửa Gói Đăng Ký</h2>
        <a href="<?php echo e(route('admin.subscriptionsplans.index',$subscriptionsplan->id)); ?>" class="btn-secondary">Quay Lại</a>
    </div>
    <div class="form-container">
        <form data-parsley-validate action="<?php echo e(route('admin.subscriptionsplans.update',$subscriptionsplan->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="name">Tên gói:</label>
                <input
                    type="text" value="<?php echo e(old('name',$subscriptionsplan->name)); ?>" name="name" class="form-control"
                    required
                    data-parsley-maxlength="255"
                    data-parsley-required-message="Vui lòng nhập tên gói"
                    data-parsley-maxlength-message="Tên gói không được dài quá 255 ký tự"
                >
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="duration">Thời Hạn:</label>
                <input type="string" value="<?php echo e(old('duration',$subscriptionsplan->duration)); ?>" name="duration" class="form-control"
                    required
                    data-parsley-maxlength="50"
                    data-parsley-required-message="Vui lòng nhập thời hạn"
                    data-parsley-maxlength-message="Thời hạn không được dài quá 50 ký tự"
                >
                <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="number" value="<?php echo e(old('price',$subscriptionsplan->price)); ?>" name="price" class="form-control"
                    required
                    data-parsley-type="number"
                    data-parsley-minlength="0"
                    data-parsley-required-message="Vui lòng nhập giá của gói"
                    data-parsley-type-message="Vui lòng nhập gói hợp lệ"
                    data-parsley-minlength-message="Giá không được có giá trị âm"
                >
                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn-primary">Thêm</button>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views/admin/subscriptionsplans/edit.blade.php ENDPATH**/ ?>
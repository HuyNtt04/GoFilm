

<?php $__env->startSection('content'); ?>
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Thêm Url</h2>
        <a href="<?php echo e(route('admin.urls.index',$episode->id)); ?>" class="btn-secondary">Quay Lại</a>
    </div>
    <div class="form-container">
        <form data-parsley-validate action="<?php echo e(route('admin.urls.store',$episode->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="url">Url:</label>
                <input
                    type="url" name="url" class="form-control"
                    required
                    data-parsley-maxlength="65535"
                    data-parsley-type="url"
                    data-parsley-required-message="Vui lòng nhập Url"
                    data-parsley-maxlength-message="Url không được dài quá 65535 ký tự"
                    data-parsley-type-message="Vui lòng nhập Url hợp lệ"

                >
                <?php $__errorArgs = ['url'];
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
                <label for="server_name">Tên Server:</label>
                <input type="text" name="server_name" class="form-control"
                    required
                    data-parsley-maxlength="50"
                    data-parsley-required-message="Vui lòng nhập tên server"
                    data-parsley-maxlength-message="Url không được dài quá 50 ký tự"
                >
                <?php $__errorArgs = ['server_name'];
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
                <select name="resolution" required data-parsley-required-message="Vui lòng chọn độ phân giải.">
                    <option value="">-- Chọn độ phân giải --</option>
                    <option value="360p">360p</option>
                    <option value="480p">480p</option>
                    <option value="720p">720p</option>
                    <option value="1080p">1080p</option>
                    <option value="4K">4K</option>
                </select>
                <?php $__errorArgs = ['resolution'];
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views/admin/urls/create.blade.php ENDPATH**/ ?>
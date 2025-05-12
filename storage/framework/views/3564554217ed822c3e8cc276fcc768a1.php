

<?php $__env->startSection('content'); ?>
<div class="recentOrders">
    <div class="cardHeader">
        <h2>Sửa Gói Đăng Ký</h2>
        <a href="<?php echo e(route('admin.subscriptions.index',$subscription->id)); ?>" class="btn-secondary">Quay Lại</a>
    </div>
    <div class="form-container">
        <form data-parsley-validate action="<?php echo e(route('admin.subscriptions.update',$subscription->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="id_plan">Gói</label>
                <select name="id_plan" required>
                    <?php $__currentLoopData = $subscriptions_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriptions_plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($subscriptions_plan->id); ?>" <?php echo e(old('id_plan',$subscription->id_plan) == $subscriptions_plan->id ? 'selected' : ''); ?>><?php echo e($subscriptions_plan->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['id_plan'];
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
                <label for="id_user">Người đăng ký</label>
                <select name="id_user" required>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>" <?php echo e(old('id_user',$subscription->id_user) == $user->id ? 'selected' : ''); ?>><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['id_plan'];
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
                <label for="Start_date">Ngày bắt đầu:</label>
                <input
                    type="date" value="<?php echo e(old('Start_date',$subscription->Start_date)); ?>" name="Start_date" class="form-control"
                    required
                    data-parsley-type="date" 
                    data-parsley-error-message="Hãy nhập ngày bắt đầu thích hợp!" 
                    data-parsley-min="<?php echo e(\Carbon\Carbon::now()->toDateString()); ?>" 
                    data-parsley-error-message="Ngày bắt đầu không được ở quá khứ!"
                >
                <?php $__errorArgs = ['Start_date'];
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
                <label for="End_date">Ngày hết hạn:</label>
                <input type="date" value="<?php echo e(old('End_date',$subscription->End_date)); ?>" name="End_date" class="form-control"
                    data-parsley-type="date" 
                    data-parsley-error-message="Hãy nhập ngày hết hạn thích hợp!" 
                    data-parsley-min="<?php echo e(\Carbon\Carbon::now()->toDateString()); ?>" 
                    data-parsley-error-message="Ngày hết hạn không được ở quá khứ" 
                    data-parsley-gte="Start_date" 
                    data-parsley-error-message="Ngày hết hạn phải lớn hơn hoặc bằng ngày bắt đầu"
                >
                <?php $__errorArgs = ['End_date'];
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
                <label for="Status">Trạng thái</label>
                <select name="Status" required>
                    <option value="active" <?php echo e(old('Status',$subscription->Status) == 'active' ? 'selected' : ''); ?>>Active</option>
                    <option value="inactive" <?php echo e(old('Status',$subscription->Status) == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                    <option value="expired" <?php echo e(old('Status',$subscription->Status) == 'expired' ? 'selected' : ''); ?>>Expired</option>
                </select>
                <?php $__errorArgs = ['Status'];
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
                <label for="Payment_status">Trạng thái thanh toán</label>
                <select name="Payment_status" required>
                    <option value="0" <?php echo e(old('Payment_status',$subscription->Payment_status) == 0 ? 'selected' : ''); ?>>Chưa thanh toán</option>
                    <option value="1" <?php echo e(old('Payment_status',$subscription->Payment_status) == 1 ? 'selected' : ''); ?>>Đã thanh toán</option>
                </select>
                <?php $__errorArgs = ['Status'];
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
                <button type="submit" class="btn-primary">Sửa</button>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views/admin/subscriptions/edit.blade.php ENDPATH**/ ?>
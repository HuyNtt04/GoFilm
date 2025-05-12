
<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <?php if(session('status')): ?>
            <div class="alert alert-success"><?php echo e(session('status')); ?></div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <h4>Role: <?php echo e($role->name); ?>

                        <a href="<?php echo e(url('admin/roles')); ?>" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="<?php echo e(url('admin/roles/'.$role->id.'/give-permissions')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="mb-3">
                            <?php $__errorArgs = ['permission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <label for="name">Permissions</label>
                            <div class="row">
                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-2">
                                        <label for="permission">
                                            <input type="checkbox" name="permission[]" value="<?php echo e($permission->name); ?>" 
                                            <?php echo e(in_array($permission->id,$rolePermissions) ? 'checked':''); ?>

                                            /><?php echo e($permission->name); ?>

                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__errorArgs = ['permission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\GoFilm\GoFilm\resources\views/admin/role-permission/role/add-permissions.blade.php ENDPATH**/ ?>
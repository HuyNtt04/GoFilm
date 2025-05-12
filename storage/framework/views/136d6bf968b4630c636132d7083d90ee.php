
<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Thêm Quyền</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.permissions.index')); ?>">Permissions</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.permissions.create')); ?>">Add Permission</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Permission
                        <a href="<?php echo e(url('admin/permissions')); ?>" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form id="permissionForm" data-parsley-validate action="<?php echo e(url('admin/permissions')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="">Permission Name</label>
                            <input type="text" name="name" class="form-control"
                                required
                                data-parsley-required-message="Tên quyền không được bỏ trống"
                                data-parsley-trigger="change"
                                data-parsley-unique
                                data-parsley-error-message="This field is required and must be unique."
                            />
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    $('#permissionForm').parsley();

    window.Parsley.addValidator('unique', {
        validateString: function(value, field) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: '<?php echo e(route("admin.permissions.check-unique")); ?>',
                    method: 'POST',
                    data: {
                        name: value,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function(response) {
                        if (response.isUnique) {
                            resolve();
                        } else {
                            reject('Quyền lợi đã có!');
                        }
                    },
                    error: function() {
                        reject('Error checking uniqueness.');
                    }
                });
            });
        },
        priority: 32
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views/admin/role-permission/permission/create.blade.php ENDPATH**/ ?>
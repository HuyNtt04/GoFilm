

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Sửa Đường Dẫn</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.movie.index')); ?>">Movies</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.episodes.index',$episode->movie->id)); ?>">Episodes</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.urls.index',$episode->id)); ?>">Urls</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.urls.edit',['episode'=>$episode->id,'url'=>$url->id])); ?>">Edit Url</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container recentOrders">
    <div class="cardHeader">
        <h2>Sửa Url</h2>
        <a href="<?php echo e(route('admin.urls.index',$episode->id)); ?>" class="btn btn-secondary">Quay Lại</a>
    </div>
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <div class="form-container">
        <form data-parsley-validate action="<?php echo e(route('admin.urls.update', ['episode'=>$episode->id,'url'=>$url->id])); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="url">Url:</label>
                <input type="url" name="url"
                    required
                    data-parsley-type="url"
                    data-parsley-maxlength="65535"
                    data-parsley-required-message="Vui lòng nhập Url"
                    data-parsley-maxlength-message="Url không được dài quá 65535 ký tự"
                    class="form-control" value="<?php echo e(old('url',$url->url)); ?>" 
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
                    value="<?php echo e(old('server_name',$url->server_name)); ?>" 
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
                <select name="resolution"
                    required
                    data-parsley-required-message="Vui lòng chọn độ phân giải.">
                    <option value="">-- Chọn độ phân giải --</option>
                    <option value="360p" <?php echo e($url->resolution == '360p' ? 'selected' : ''); ?>>360p</option>
                    <option value="480p" <?php echo e($url->resolution == '480p' ? 'selected' : ''); ?>>480p</option>
                    <option value="720p" <?php echo e($url->resolution == '720p' ? 'selected' : ''); ?>>720p</option>
                    <option value="1080p" <?php echo e($url->resolution == '1080p' ? 'selected' : ''); ?>>1080p</option>
                    <option value="4K" <?php echo e($url->resolution == '4K' ? 'selected' : ''); ?>>4K</option>
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
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views/admin/urls/edit.blade.php ENDPATH**/ ?>
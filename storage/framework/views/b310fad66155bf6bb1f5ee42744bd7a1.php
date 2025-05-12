

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Sửa Phim</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.movie.index')); ?>">Movies</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.movie.edit',$movie->id)); ?>">Edit Movie</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container recentOrders">
    <div class="cardHeader">
        <h2>Sửa Phim</h2>
        <a href="<?php echo e(route('admin.movie.index')); ?>" class="btn btn-secondary">Quay Lại</a>
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
        <form data-parsley-validate action="<?php echo e(route('admin.movie.update', $movie->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="id_category">Phim:</label>
                <div class="row">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-2">
                            <input type="checkbox"
                                <?php if($loop->first): ?>
                                data-parsley-mincheck="1"
                                data-parsley-mincheck-message="Vui lòng chọn ít nhất 1 thể loại"
                                data-parsley-errors-container="#category-error"
                                <?php endif; ?>
                                name="id_category[]" value="<?php echo e($category->id); ?>" <?php echo e(in_array($category->id, $movieCategories) ? 'checked':''); ?> ><?php echo e($category->name); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" name="title"
                    required
                    data-parsley-maxlength="255"
                    data-parsley-required-message="Vui lòng nhập tiêu đề"
                    data-parsley-maxlength-message="Tiêu đề không được dài quá 255 ký tự"
                    class="form-control" value="<?php echo e(old('title',$movie->title)); ?>" 
                >
                <?php $__errorArgs = ['title'];
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
                <label for="is_series">Phim:</label>
                <select required 
                        name="is_series" id="is_series"
                >
                    <option value="0" <?php echo e(old('is_series',$movie->is_series) == 0 ? 'selected' : ''); ?>>Phim lẻ</option>
                    <option value="1" <?php echo e(old('is_series',$movie->is_series) == 1 ? 'selected' : ''); ?>>Phim bộ</option>
                </select>
                <?php $__errorArgs = ['is_series'];
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
                <label for="description">Mô Tả:</label>
                <input type="text" name="description" class="form-control"
                    required
                    data-parsley-required-message="Vui lòng nhập mô tả"
                    value="<?php echo e(old('description',$movie->description)); ?>" 
                >
                <?php $__errorArgs = ['description'];
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
                <label for="thumbnail">Thumbnail:</label>
                <input type="file" id="thumbnail" name="thumbnail" class="form-control"
                    required
                    accept=".jpeg,.jpg,.png,.gif,.svg"
                    data-parsley-required-message="Vui lòng chọn ảnh"
                    data-parsley-filemaxmegabytes="1"
                    data-parsley-filemimetypes="image/jpeg, image/png, image/jpg, image/gif, image/svg+xml"
                    value="<?php echo e(old('thumbnail', $movie->thumbnail )); ?>" 
                >
                <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-message"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <div id="thumbnail_preview"></div>
            </div>
            <div class="form-group">
                <label for="cast">Diễn viên:</label>
                <input type="text" name="cast" class="form-control"
                    required
                    data-parsley-required-message="Vui lòng thêm diễn viên"
                    value="<?php echo e(old('cast', $movie->cast )); ?>" 
                >
                <?php $__errorArgs = ['cast'];
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
                <label for="director">Đạo Diễn:</label>
                <input type="text" name="director" class="form-control"
                    required
                    data-parsley-required-message="Vui lòng thêm đạo diễn"
                    value="<?php echo e(old('director', $movie->director )); ?>" 
                >
                <?php $__errorArgs = ['director'];
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
                <label for="release_year">Năm Phát Hành:</label>
                <input type="number" name="release_year" class="form-control"
                    required
                    data-parsley-type="number"
                    data-parsley-required-message="Vui lòng nhập năm phát hành của phim"
                    data-parsley-type-message="Vui lòng nhập một năm hợp lệ"    
                    value="<?php echo e(old('release_year', $movie->release_year )); ?>" 
                >
            </div>
            <div class="form-group">
                <label for="country">Quốc Gia:</label>
                <input type="text" name="country" class="form-control"
                    required
                    data-parsley-required-message="Vui lòng thêm quốc gia"
                    value="<?php echo e(old('country', $movie->country )); ?>" 
                >
                <?php $__errorArgs = ['country'];
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
                <label for="views">Lượt xem:</label>
                <input type="number" name="views" class="form-control"
                    required
                    data-parsley-type="number"
                    data-parsley-required-message="Vui lòng nhập lượt xem"
                    data-parsley-type-message="Vui lòng nhập lượt xem hợp lệ"
                    value="<?php echo e(old('views', $movie->views )); ?>" 
                >
                <?php $__errorArgs = ['views'];
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
                <label for="film_duration">Thời Lượng:</label>
                <input type="number" name="film_duration" class="form-control"
                    required
                    data-parsley-type="number"
                    data-parsley-required-message="Vui lòng nhập thời lượng của phim"
                    data-parsley-type-message="Vui lòng nhập thời lượng phim hợp lệ"
                    value="<?php echo e(old('film_duration', $movie->film_duration )); ?>"
                >
                <?php $__errorArgs = ['film_duration'];
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
                <label for="image">Hình Ảnh:</label>
                <input type="file" name="image[]" id="images" class="form-control"
                    required
                    data-parsley-required-message="Vui lòng chọn ít nhất một hình ảnh"
                    data-parsley-filemax="2048"
                    data-parsley-filetype="image"
                    data-parsley-filetypes="jpeg,png,jpg,gif,svg"
                    data-parsley-maxsize="2048"
                    value="<?php echo e(old('image', $movie->image )); ?>" multiple>
                <div id="image_preview"></div>
                <?php $__errorArgs = ['image'];
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
<?php $__env->startPush('scripts'); ?>
    <script type='module' src="<?php echo e(asset('js/admin/admin.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views/admin/movie/edit.blade.php ENDPATH**/ ?>
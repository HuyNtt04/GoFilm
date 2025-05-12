<?php $__env->startSection('title', 'Chi tiết danh mục'); ?>



<?php $__env->startSection('container'); ?>
<br><br><br>
<!-- Category Details Page -->
<section class="py-6 px-6 max-w-7xl mx-auto">
    <h3 class="text-xl font-semibold mb-4">Phim theo chủ đề: <?php echo e($category->name); ?></h3>

    <?php if(!empty($movies) && count($movies) > 0): ?>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="rounded-xl p-4 bg-gradient-to-br from-pink-600 to-rose-400 shadow hover:scale-105 transition">
            <img src="<?php echo e(asset($movie->thumbnail)); ?>" alt="<?php echo e($movie->title); ?>"
                class="w-full h-40 object-cover rounded-md mb-3">
            <h4 class="font-bold text-white mb-1"><?php echo e($movie->title); ?></h4>
            <a href="<?php echo e(route('MovieInfo.show', $movie->id)); ?>" class="text-white text-sm opacity-80 hover:underline">
                Xem chi tiết <i class="fas fa-chevron-right text-xs ml-1"></i>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <p class="text-gray-600">Không có phim nào thuộc danh mục này.</p>
    <?php endif; ?>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\DuAnTotNghiep\Project\download\final3\GoFilm\GoFilm\resources\views/user/CateDetail.blade.php ENDPATH**/ ?>
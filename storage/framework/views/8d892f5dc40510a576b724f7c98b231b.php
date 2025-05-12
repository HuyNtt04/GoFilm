<?php $__env->startSection('title', 'Các thể loại phim'); ?>



<?php $__env->startSection('container'); ?>
<!-- Content padding-top for fixed header -->
<div class="pt-28 max-w-7xl mx-auto px-6">
    <h2 class="text-2xl font-bold mb-6">Các chủ đề</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        <!-- Repeatable box item -->
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div
            class="rounded-xl p-4 bg-gradient-to-br <?php echo e($category -> classColor); ?> shadow hover:scale-[1.03] transition h-32">
            <h4 class="font-bold text-white text-lg mb-2"><?php echo e($category -> name); ?></h4>
            <a href="<?php echo e(Route('MoviesByCategory.index', $category -> id)); ?>"
                class="text-white text-sm opacity-90 hover:underline">Xem toàn bộ <i
                    class="fas fa-chevron-right text-xs ml-1"></i></a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('../layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views/user/movie_categories.blade.php ENDPATH**/ ?>
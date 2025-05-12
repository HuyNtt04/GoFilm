<?php $__env->startSection('title', 'Các thể loại phim'); ?>



<?php $__env->startSection('container'); ?>
<div class="pt-28 max-w-7xl mx-auto px-6">
    <h2 class="text-2xl font-bold mb-6">Các chủ đề</h2>

    <section class="py-6 px-6 max-w-7xl mx-auto">
        <h3 class="text-xl font-semibold mb-4">Bạn đang quan tâm gì?</h3>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="rounded-xl p-4 bg-gradient-to-br <?php echo e($category->gradient); ?> shadow hover:scale-105 transition">
                <h4 class="font-bold text-white mb-1"><?php echo e($category->name); ?></h4>
                <a href="<?php echo e(route('category.show', $category->id)); ?>"
                    class="text-white text-sm opacity-80 hover:underline">
                    Xem chủ đề <i class="fas fa-chevron-right text-xs ml-1"></i>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('../layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\DuAnTotNghiep\Project\download\final3\GoFilm\GoFilm\resources\views/user/movie_categories.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Phim bộ'); ?>



<?php $__env->startSection('container'); ?>
<!-- Content -->
<main class="pt-28 max-w-7xl mx-auto px-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Phim bộ</h2>
        <button class="text-sm flex items-center gap-2 text-white hover:text-yellow-400">
            <i class="fas fa-filter"></i>
            Bộ lọc
        </button>
    </div>

    <div id="movieList" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">

        <?php if($movies->isEmpty()): ?>
        <div class="text-white text-center py-10">
            <p class="text-lg font-semibold">Không có phim nào để hiển thị.</p>
        </div>
        <?php else: ?>
        <?php for($i = 0; $i < count($movies); $i++): ?> <div
            class="bg-white/5 rounded-md overflow-hidden shadow hover:scale-[1.02] transition duration-200">
            <a href="<?php echo e(route('MovieInfo.show', $movies[$i]->id)); ?>">
                <img src="<?php echo e(asset($movies[$i]->thumbnail)); ?>" alt="<?php echo e($movies[$i]->title); ?>"
                    class="w-full h-60 object-cover">
                <div class="p-3">
                    <p class="text-sm font-semibold text-white"><?php echo e($movies[$i]->title); ?></p>
                    <span class="inline-block mt-2 px-2 py-0.5 text-xs bg-white/10 rounded text-white">P.Đ.B</span>
                </div>
            </a>
    </div>
    <?php endfor; ?>
    <?php endif; ?>


    </div>

    <div class="mt-5">
        <?php echo e($movies->links()); ?>

    </div>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('../layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\DuAnTotNghiep\Project\download\final3\GoFilm\GoFilm\resources\views/user/series.blade.php ENDPATH**/ ?>
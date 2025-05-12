<?php $__env->startSection('title', 'Danh sách phim'); ?>



<?php $__env->startSection('container'); ?>
    <!-- Content -->
    <main class="pt-28 max-w-7xl mx-auto px-6">
     
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold"><?php echo e($nameSection); ?></h2>
        </div>
 
        <div id="movieList" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
            <?php if($moviesByCondition->isEmpty()): ?>
                <div class="text-white text-center py-10">
                    <p class="text-lg font-semibold">Chưa có phim đó! </p>
                </div>
            <?php endif; ?>
            <?php $__currentLoopData = $moviesByCondition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movieByCondition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white/5 rounded-md overflow-hidden shadow hover:scale-[1.02] transition duration-200">
                <a href="<?php echo e(route('MovieInfo.show', $movieByCondition -> id)); ?>">
                    <img src="<?php echo e(asset($movieByCondition ->thumbnail)); ?>" alt="<?php echo e($movieByCondition ->title); ?>"
                        class="w-full h-60 object-cover">
                    <div class="p-3">
                        <p class="text-sm font-semibold text-white"><?php echo e($movieByCondition ->title); ?></p>
                        <span class="inline-block mt-2 px-2 py-0.5 text-xs bg-white/10 rounded text-white">P.Đ.B</span>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>

        <div  class="mt-5">
            <?php echo e($moviesByCondition -> links()); ?>

        </div>
        
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('../layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\GoFilm\GoFilm\resources\views/user/movies_by_condition.blade.php ENDPATH**/ ?>
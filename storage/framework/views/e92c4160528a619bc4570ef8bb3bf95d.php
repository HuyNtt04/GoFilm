
<?php $__env->startSection('container'); ?>

<div class="container mx-auto px-4 py-8 text-white bg-gray-950 " style="margin-top: 75.98px;">

    <div class="mb-8">
        <a href="<?php echo e(route('home.index')); ?>" class="inline-flex items-center text-gray-400 hover:text-white transition">
            <i class="fas fa-arrow-left mr-2"></i> Quay lại trang chủ
        </a>
    </div>
    <p class="text-center text-gray-400 text-sm max-w-md mx-auto mb-10">Chúc mừng bạn đã đăng ký gói VIP thành công. Bạn
        giờ đã là người dùng Premium!</p>
</div>
<?php $__env->stopSection(); ?>
<style lang="blade" scoped>
.container {
    margin: 0 auto;
    padding: 20px;
    max-width: 800px;
    background-color: #1a1a1a;
    color: white;
    border-radius: 8px;
}

h1 {
    font-size: 2rem;
    margin-bottom: 20px;
}

p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.btn:hover {
    background-color: #0056b3;
}
</style>
<?php echo $__env->make('../layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\GoFilm\GoFilm\resources\views/user/subscriptions/success.blade.php ENDPATH**/ ?>
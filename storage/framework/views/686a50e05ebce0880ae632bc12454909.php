<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?php echo $__env->yieldContent('title'); ?> </title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>

<body class="bg-[#0e0f1a] text-white font-sans">

    <!-- ✅ Transparent Fixed Navbar -->
    <header id="mainHeader" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Logo -->
            <a href="<?php echo e(route('home.index')); ?>" class="flex items-center space-x-3 hover:opacity-90 transition">
                <div class="leading-tight">
                    <h1 class="text-xl font-bold text-yellow-600">GO Film</h1>
                    <p class="text-xs text-gray-400">Phim hay cá rổ</p>
                </div>
            </a>

            <!-- Search -->
            <!-- Container chung -->
            <div class="flex items-center justify-start space-x-8 flex-1 mx-4">

                <!-- Search -->
                <div class="w-96">
                    <form action="<?php echo e(route('MoviesByCondition.index', 'search')); ?>" method="get">

                        <div
                            class="flex items-center px-4 py-2 rounded-full text-sm bg-white/10 backdrop-md text-white placeholder-gray-300 border border-white/10 focus-within:ring-1 focus-within:ring-yellow-400 hover:bg-white/20 transition">
                            <input type="text" name="keywords" placeholder="Tìm kiếm phim, diễn viên..."
                                class="flex-1 bg-transparent outline-none placeholder-gray-300 text-white" />
                            <button type="submit"> <i class="fas fa-search text-gray-300 ml-2"></i></button>

                        </div>
                    </form>
                </div>

                <!-- Navigation -->
                <nav class="flex items-center text-sm hidden md:flex w-full">
                    <!-- Menu links -->
                    <div class="flex space-x-[20px]">
                        <a href="<?php echo e(route('MovieCategories.index')); ?>" class="hover:text-yellow-400">Chủ đề</a>
                        <a href="<?php echo e(route('SingleMovies.index')); ?>" class="hover:text-yellow-400">Phim lẻ</a>
                        <a href="<?php echo e(route('SeriesMovies.index')); ?>" class="hover:text-yellow-400">Phim bộ</a>
                        <a href="<?php echo e(route('vip.movies')); ?>" class="hover:text-yellow-400">Phim VIP</a>
                        <!-- <a href="/gioithieu" class="hover:text-yellow-400">Giới thiệu</a> -->
                        <a href="/lienhe" class="hover:text-yellow-400">Liên hệ</a>
                        <a href="<?php echo e(route('subscriptions.plans')); ?>"
                            class="hover:text-white text-yellow-400 text-lg font-bold">PREMIUM+</a>
                    </div>

                    <!-- Thành viên button -->
                    <?php if(auth()->check()): ?>
                    <div class="ml-auto" style=" display: flex;flex-direction: row;">
                        <button
                            class="flex items-center px-4 py-2 bg-white text-black rounded-full hover:ring-1 hover:ring-white transition"
                            style="margin-left: 30%;">
                            <i class="fas fa-user mr-2"></i>
                            <span class="text-sm font-semibold">
                                <a href="<?php echo e(route('profile.index')); ?>"><?php echo e(auth()->user()->name); ?></a>
                            </span>
                            
                        </button>
                        <button
                            class="flex items-center px-4 py-2 bg-white text-black rounded-full hover:ring-1 hover:ring-white transition"
                            style="margin-left: 30%;">
                            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin|employee')): ?>
                            <span class="text-sm font-semibold">
                                <a href="<?php echo e(route('admin.index')); ?>">Quản lý</a>
                            </span>
                            <?php endif; ?>
                        </button>
                        </span>
                        <?php else: ?>
                        <button
                            class="flex items-center px-4 py-2 bg-white text-black rounded-full hover:ring-1 hover:ring-white transition"
                            style="margin-left: 30%;">
                            <span><a href="<?php echo e(route('login')); ?>">Thành viên</a></span>
                        </button>
                        <?php endif; ?>

                    </div>
                </nav>


    </header>

    <?php echo $__env->yieldContent('container'); ?>

    <footer class="mt-10 pt-6 bg-[#0f0f1a] text-white text-sm px-4 py-8">
        <div class="max-w-screen-xl mx-auto space-y-6">

            <!-- Logo & Social -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div class="flex items-center gap-3">
                    <img src="https://via.placeholder.com/40x40" alt="Logo" class="w-10 h-10 rounded-full" />
                    <div class="text-xl font-bold">Ro<span class="text-yellow-400">Phim</span></div>
                    <span class="text-white/60 text-sm">Phim hay cả rổ</span>
                </div>
                <div class="flex gap-3 text-white/70">
                    <a href="#"><i class="fab fa-telegram-plane text-lg"></i></a>
                    <a href="#"><i class="fab fa-facebook-f text-lg"></i></a>
                    <a href="#"><i class="fab fa-tiktok text-lg"></i></a>
                    <a href="#"><i class="fab fa-youtube text-lg"></i></a>
                    <a href="#"><i class="fab fa-discord text-lg"></i></a>
                    <a href="#"><i class="fab fa-instagram text-lg"></i></a>
                </div>
            </div>

            <!-- Menu -->
            <div class="flex flex-wrap gap-x-6 gap-y-2 text-white/70">
                <a href="#" class="hover:text-white transition">Hỏi-Đáp</a>
                <a href="#" class="hover:text-white transition">Chính sách bảo mật</a>
                <a href="#" class="hover:text-white transition">Điều khoản sử dụng</a>
                <a href="#" class="hover:text-white transition">Giới thiệu</a>
                <a href="#" class="hover:text-white transition">Liên hệ</a>
            </div>

            <!-- Danh mục -->
            <div class="flex flex-wrap gap-x-4 gap-y-2 text-white/70">
                <a href="#" class="hover:text-yellow-400">Dongphim</a>
                <a href="#" class="hover:text-yellow-400">Ghienphim</a>
                <a href="#" class="hover:text-yellow-400">Motphim</a>
                <a href="#" class="hover:text-yellow-400">Subnhanh</a>
            </div>

            <!-- Mô tả -->
            <div class="text-white/60 leading-relaxed text-[15px]">
                RoPhim – Phim hay cả rổ – Trang xem phim online chất lượng cao miễn phí Vietsub, thuyết minh, lồng tiếng
                full
                HD.
                Kho phim mới khổng lồ, phim chiếu rạp, phim bộ, phim lẻ từ nhiều quốc gia như Việt Nam, Hàn Quốc, Trung
                Quốc,
                Thái Lan,
                Nhật Bản, Âu Mỹ… đa dạng thể loại. Khám phá nền tảng phim trực tuyến hay nhất 2024 chất lượng 4K!
            </div>

            <!-- Copyright -->
            <div class="text-white/40 text-xs mt-4">© 2024 RoPhim</div>

        </div>
    </footer>

    <?php echo $__env->yieldPushContent('js'); ?>


</body>

</html><?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views////layouts/user.blade.php ENDPATH**/ ?>
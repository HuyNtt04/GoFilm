<?php $__env->startSection('title', 'Phim lẻ'); ?>



<?php $__env->startSection('container'); ?>

<!-- Main Content -->
<main class="pt-24 pb-16 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Left Sidebar - Account Management -->
            <div class="w-full md:w-72 shrink-0">
                <div class="bg-[#1a1b2e] rounded-lg shadow-lg overflow-hidden border border-gray-800/50">
                    <div class="p-6">
                        <h2 class="text-lg font-bold mb-6">Quản lý tài khoản</h2>
                        <!-- User Profile -->
                        <div class="flex flex-col items-center justify-center mb-6 pb-6 border-b border-gray-700/50">
                            <div class="w-24 h-24 rounded-full overflow-hidden mb-3">
                                <img src="<?php echo e(asset('images/'.$user -> image)); ?>" alt="User avatar"
                                    class="w-full h-full object-cover" />
                            </div>
                            <h3 class="font-bold text-lg"> <?php echo e($user -> name); ?> </h3>
                            <p class="text-gray-400 text-sm"><?php echo e($user -> email); ?></p>
                            <form action="<?php echo e(route('logout')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <button type="submit"
                                    class="mt-3 text-sm py-1 px-4 rounded-full border border-gray-700 hover:bg-gray-700/50 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-1"></i> Thoát</a>
                                </button>
                            </form>
                        </div>
                        <!-- Sidebar Menu -->
                        <nav class="space-y-1">
                            <a href="#"
                                class="favorite-tab flex items-center py-3 px-4 rounded-lg bg-gray-800/50 text-yellow-400 hover:bg-gray-700/30 transition-colors"
                                data-tab="favorite">
                                <i class="fas fa-heart w-5 text-center mr-3"></i>
                                <span>Yêu thích</span>
                            </a>
                            <a href="#"
                                class="watchlist-tab flex items-center py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700/30 hover:text-yellow-400 transition-colors"
                                data-tab="watchlist">
                                <i class="fas fa-list w-5 text-center mr-3"></i>
                                <span>Danh sách</span>
                            </a>
                            <a href="#"
                                class="continue-tab flex items-center py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700/30 hover:text-yellow-400 transition-colors"
                                data-tab="continue">
                                <i class="fas fa-history w-5 text-center mr-3"></i>
                                <span>Xem tiếp</span>
                            </a>
                            <a href="#"
                                class="account-tab flex items-center py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700/30 hover:text-yellow-400 transition-colors"
                                data-tab="account">
                                <i class="fas fa-user w-5 text-center mr-3"></i>
                                <span>Tài khoản</span>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Right Content - Tabs Content -->
            <div class="flex-1">
                <!-- Favorites Tab -->
                <div id="favorite-content"
                    class="content-tab bg-[#1a1b2e] rounded-lg shadow-lg border border-gray-800/50 p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold">Yêu thích</h2>
                        <div class="flex items-center">
                            <button
                                class="bg-gray-700 text-white px-2 py-1 rounded border border-gray-600 hover:bg-gray-600 transition">
                                Phim
                            </button>
                        </div>
                    </div>
                    <!-- Movie Slider Container -->
                    <div class="relative">
                        <div class="overflow-hidden">
                            <div id="favorites-slider"
                                class="movie-slider flex space-x-4 overflow-x-auto pb-4 scrollbar-hide">

                                <!-- Movie Posters -->
                                <?php $__currentLoopData = $userFavoriteMovies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userFavoriteMovie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div
                                    class="movie-poster relative flex-shrink-0 w-36 h-56 rounded-lg overflow-hidden group">
                                    <a href="#" class="block w-full h-full relative">
                                        <img src="<?php echo e(asset($userFavoriteMovie->thumbnail)); ?>"
                                            alt="<?php echo e($userFavoriteMovie->title); ?>" class="w-full h-full object-cover">
                                        <div
                                            class="absolute bottom-0 left-0 right-0 p-2 bg-gradient-to-t from-black/80 to-transparent">
                                            <div class="flex gap-1 mb-1">
                                                <span class="text-xs px-1 bg-gray-700 rounded">P.ĐỘ</span>
                                                <span class="text-xs px-1 bg-green-800 rounded">T.Minh</span>
                                            </div>
                                            <a href="<?php echo e(route('MovieInfo.show', $userFavoriteMovie->id)); ?>">
                                                <h3 class="text-sm font-medium truncate"><?php echo e($userFavoriteMovie->title); ?>

                                                </h3>
                                            </a>
                                        </div>
                                    </a>
                                    <form action="<?php echo e(route('FavoriteMovies.destroyFavoriteInProfile')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($userFavoriteMovie->favoriteID); ?>">
                                        <button
                                            class="remove-btn absolute top-1 right-1 bg-black/70 hover:bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center transition-opacity"
                                            data-id="1">
                                            <i class="fas fa-times text-xs"></i>
                                        </button>
                                    </form>

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <!-- Add more movies here -->
                            </div>
                        </div>
                        <!-- Navigation Buttons -->
                        <button id="fav-prev"
                            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-black/70 hover:bg-black text-white rounded-full p-2 focus:outline-none hidden">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button id="fav-next"
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-black/70 hover:bg-black text-white rounded-full p-2 focus:outline-none">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <!-- Watchlist Tab -->
                <div id="watchlist-content"
                    class="content-tab bg-[#1a1b2e] rounded-lg shadow-lg border border-gray-800/50 p-6 hidden">
                    <h2 class="text-xl font-bold mb-6">Danh sách</h2>
                    <p class="text-gray-400">Danh sách phim của bạn hiện đang trống.</p>
                </div>
                <!-- Continue Watching Tab -->
                <div id="continue-content"
                    class="content-tab bg-[#1a1b2e] rounded-lg shadow-lg border border-gray-800/50 p-6 hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold">Xem tiếp</h2>
                    </div>
                    <!-- Continue Watching Slider Container -->
                    <div class="relative">
                        <div class="overflow-hidden">
                            <div id="continue-slider"
                                class="movie-slider flex space-x-4 overflow-x-auto pb-4 scrollbar-hide">
                                <!-- Movie Posters -->
                                <div
                                    class="movie-poster relative flex-shrink-0 w-36 h-56 rounded-lg overflow-hidden group">
                                    <a href="#" class="block w-full h-full relative">
                                        <img src="https://via.placeholder.com/200x300" alt="Deadpool & Wolverine"
                                            class="w-full h-full object-cover">
                                        <div
                                            class="absolute bottom-0 left-0 right-0 p-2 bg-gradient-to-t from-black/80 to-transparent">
                                            <div class="flex gap-1 mb-1">
                                                <span class="text-xs px-1 bg-gray-700 rounded">P.ĐỘ</span>
                                                <span class="text-xs px-1 bg-green-800 rounded">T.Minh</span>
                                            </div>
                                            <h3 class="text-sm font-medium truncate">Deadpool & Wolverine</h3>
                                        </div>
                                    </a>
                                    <button
                                        class="remove-btn absolute top-1 right-1 bg-black/70 hover:bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 transition-opacity"
                                        data-id="8">
                                        <i class="fas fa-times text-xs"></i>
                                    </button>
                                </div>
                                <div
                                    class="movie-poster relative flex-shrink-0 w-36 h-56 rounded-lg overflow-hidden group">
                                    <a href="#" class="block w-full h-full relative">
                                        <img src="https://via.placeholder.com/200x300" alt="Squid Game"
                                            class="w-full h-full object-cover">
                                        <div
                                            class="absolute bottom-0 left-0 right-0 p-2 bg-gradient-to-t from-black/80 to-transparent">
                                            <div class="flex gap-1 mb-1">
                                                <span class="text-xs px-1 bg-gray-700 rounded">P.ĐỘ</span>
                                                <span class="text-xs px-1 bg-green-800 rounded">T.Minh</span>
                                            </div>
                                            <h3 class="text-sm font-medium truncate">Squid Game</h3>
                                        </div>
                                    </a>
                                    <button
                                        class="remove-btn absolute top-1 right-1 bg-black/70 hover:bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 transition-opacity"
                                        data-id="9">
                                        <i class="fas fa-times text-xs"></i>
                                    </button>
                                </div>
                                <!-- Add more movies here -->
                            </div>
                        </div>
                        <!-- Navigation Buttons -->
                        <button id="cont-prev"
                            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-black/70 hover:bg-black text-white rounded-full p-2 focus:outline-none hidden">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button id="cont-next"
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-black/70 hover:bg-black text-white rounded-full p-2 focus:outline-none">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <!-- Account Tab -->
                <div id="account-content"
                    class="content-tab bg-[#1a1b2e] rounded-lg shadow-lg border border-gray-800/50 p-6 hidden">
                    <h2 class="text-xl font-bold mb-6">Tài khoản</h2>
                    <p class="text-gray-400 mb-8">Cập nhật thông tin tài khoản</p>
                    <form enctype="multipart/form-data" action="<?php echo e(route('profile.update', $user->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                            <!-- Account Form -->
                            <div class="md:col-span-2 space-y-6">
                                <!-- Email -->
                                <div class="space-y-2">
                                    <label class="block text-sm text-gray-400">Email</label>
                                    <input type="email" value="<?php echo e($user -> email); ?>"
                                        class="w-full bg-[#141526] border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400"
                                        readonly />
                                </div>
                                <!-- Username -->
                                <div class="space-y-2">
                                    <label class="block text-sm text-gray-400">Tên hiển thị</label>
                                    <input type="text" name="name" value="<?php echo e($user -> name); ?>"
                                        class="w-full bg-[#141526] border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400" />
                                </div>
                                <!-- Gender -->
                                <div class="space-y-2">
                                    <label class="block text-sm text-gray-400">Giới tính</label>
                                    <div class="flex items-center space-x-6 mt-2">
                                        <label class="inline-flex items-center">
                                            <input value="1" type="radio" name="gender"
                                                class="form-radio text-yellow-500" <?php if($user -> gender == 1): ?> checked
                                            <?php endif; ?> />
                                            <span class="ml-2">Nam</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input value="2" type="radio" name="gender"
                                                class="form-radio text-yellow-500" <?php if($user -> gender == 2): ?> checked
                                            <?php endif; ?> />
                                            <span class="ml-2">Nữ</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input value="0" type="radio" name="gender"
                                                class="form-radio text-yellow-500" <?php if($user -> gender == 0): ?> checked
                                            <?php endif; ?> />
                                            <span class="ml-2">Không xác định</span>
                                        </label>
                                    </div>
                                </div>
                                <!-- Update Button -->
                                <div class="pt-4">
                                    <button
                                        class="bg-yellow-500 hover:bg-yellow-600 text-black font-medium py-2 px-6 rounded-md transition-colors">
                                        Cập nhật
                                    </button>
                                </div>
                                <!-- Password Link -->
                                
                            </div>
                            <!-- Avatar Section -->
                            <div class="flex flex-col items-center">
                                <div class="w-48 h-48 rounded-full overflow-hidden mb-4 border-4 border-gray-800">
                                    <img src="<?php echo e(asset('images/'.$user -> image)); ?>" alt="Avatar"
                                        class="w-full h-full object-cover" />
                                </div>
                                <input id="upload_file_image" type="file" name="image"
                                    class="w-40 h-8 text-sm file:px-2 file:py-1 file:text-sm file:bg-gray-700 file:text-white file:rounded-md file:border-0 file:cursor-pointer hover:file:bg-gray-600" />
                                <label for="upload_file_image"
                                    class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-md transition-colors mt-2">
                                    Đổi ảnh đại diện
                                </label>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tab functionality
    initTabs();
    // Initialize slider navigation
    updateSliderNavigation(document.getElementById('favorites-slider'), document.getElementById('fav-prev'),
        document.getElementById('fav-next'));
    updateSliderNavigation(document.getElementById('continue-slider'), document.getElementById('cont-prev'),
        document.getElementById('cont-next'));
});

function initTabs() {
    const tabLinks = document.querySelectorAll('[data-tab]');
    const contentTabs = document.querySelectorAll('.content-tab');
    tabLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            // Remove active class from all tabs
            tabLinks.forEach(t => {
                t.classList.remove('bg-gray-800/50', 'text-yellow-400');
                t.classList.add('text-gray-300');
            });
            // Add active class to current tab
            this.classList.add('bg-gray-800/50', 'text-yellow-400');
            this.classList.remove('text-gray-300');
            // Hide all content
            contentTabs.forEach(tab => tab.classList.add('hidden'));
            // Show selected content
            const selectedContent = document.getElementById(this.getAttribute('data-tab') + '-content');
            if (selectedContent) {
                selectedContent.classList.remove('hidden');
            }
        });
    });
}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('../layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views/user/profile.blade.php ENDPATH**/ ?>
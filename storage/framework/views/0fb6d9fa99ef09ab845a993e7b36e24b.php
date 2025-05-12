
<?php $__env->startSection('title', 'Chi tiết phim'); ?>

<?php $__env->startSection('container'); ?>

    <script>
        function showTab(tab) {
            ["episodes", "cast", "recommend"].forEach(id => {
                document.getElementById(`${id}Tab`).classList.add("hidden");
                document.getElementById(`tab-${id}`).classList.remove("border-b-2", "border-yellow-400",
                    "text-yellow-400");
                document.getElementById(`tab-${id}`).classList.add("text-gray-300");
            });
            document.getElementById(`${tab}Tab`).classList.remove("hidden");
            document.getElementById(`tab-${tab}`).classList.add("border-b-2", "border-yellow-400", "text-yellow-400");
        }
        document.addEventListener("DOMContentLoaded", function() {
            showTab("episodes");
        });
    </script>

    <main class="pt-28 max-w-7xl mx-auto px-6">
        <!-- Thông tin phim + Player -->
        <div class="bg-white/5 rounded-xl p-6 md:flex gap-6 mb-10 shadow-inner">
            <!-- Poster -->
            <div class="md:w-1/4 flex-shrink-0">
                <img src="<?php echo e(asset($movie->thumbnail)); ?>" alt="Poster" class="rounded-lg w-full" />
                <h2 class="text-xl font-bold mt-4"><?php echo e($movie->title); ?></h2>
                <p class="text-sm text-yellow-400"><?php echo e($movie->title); ?></p>
                <div class="mt-2 flex flex-wrap gap-2 text-xs text-gray-300">
                    <span class="bg-yellow-400 text-black px-2 py-1 rounded">IMDb <?php echo e($movie->views ?? '8.7'); ?></span>
                    <span class="border px-2 py-1 rounded">T18</span>
                    <span class="border px-2 py-1 rounded"><?php echo e($movie->release_year); ?></span>
                    <?php if($movie->is_series): ?>
                        <span class="border px-2 py-1 rounded">Phần <?php echo e($movie->season ?? '1'); ?></span>
                        <span class="border px-2 py-1 rounded">Tập <?php echo e($movie->current_episode ?? '6'); ?></span>
                    <?php else: ?>
                        <span class="border px-2 py-1 rounded">HD</span>
                    <?php endif; ?>
                </div>
                <p class="text-sm text-gray-400 mt-3">
                    <?php echo e($movie->is_series ? "Đã chiếu: {$movie->current_episode} / {$movie->total_episode} tập" : 'Đang chiếu: 1 tập'); ?>

                </p>

                <!-- Mô tả phim -->
                <div class="mt-4 text-sm text-gray-300">
                    <h3 class="font-semibold text-white mb-1">Giới thiệu:</h3>
                    <p><?php echo e($movie->description); ?></p>
                </div>
            </div>

            <!-- Player + Controls -->
            <div class="md:w-3/4 mt-6 md:mt-0">
                <iframe class="w-full aspect-video rounded-lg shadow"
                    src="https://www.youtube.com/embed/<?php echo e($movie->trailer_youtube_id ?? 'NPoHPNeU9fc'); ?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                <div class="flex gap-4 mt-4 flex-wrap">
                    <?php if(isset($isBlocked) && $isBlocked): ?>
                        <div class="alert alert-warning">
                            <strong>Phim này chỉ dành cho tài khoản VIP.</strong>
                        </div>
                    <?php else: ?>
                        <a class="px-5 py-2 bg-yellow-400 text-black rounded-full font-semibold hover:bg-yellow-300"
                            href="<?php echo e(route('MovieDetail.show', $movie->id)); ?>"><i class="fas fa-play mr-2"></i>Xem ngay</a>
                    <?php endif; ?>

                
                    <?php if(Auth()->check()): ?>
                        <?php if($favoriteMovie == null): ?>
                            <form action="<?php echo e(route('FavoriteMovies.store')); ?>" method="post" class="contents">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id_user" value="<?php echo e($id_user); ?>">
                                <input type="hidden" name="id_movie" value="<?php echo e($movieInfo->id); ?>">
                                <button type="submit" name="submit" class="bg-white/10 text-white px-4 py-2 rounded-full hover:bg-red-600 flex items-center gap-2">
                                    <i class="fas fa-heart"></i> Yêu thích
                                </button>
                            </form>
                        <?php else: ?>
                            <form action="<?php echo e(Route('FavoriteMovies.destroy')); ?>" method="post" class="contents">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id_movie" value="<?php echo e($favoriteMovie->id_movie); ?>"> 
                                <input type="hidden" name="id" value="<?php echo e($favoriteMovie->id); ?>"> 
                                <button type="submit" name="submit" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 flex items-center gap-2">
                                    <i class="fas fa-heart"></i> Yêu thích
                                </button>
                            </form>
                        <?php endif; ?>
                        
                    <?php endif; ?>
                    
                    <button class="bg-white/10 text-white px-4 py-2 rounded-full hover:bg-white/20"><i
                            class="fas fa-bookmark mr-2"></i>Thêm vào</button>
                    <button class="bg-white/10 text-white px-4 py-2 rounded-full hover:bg-white/20"><i
                            class="fas fa-share-alt mr-2"></i>Chia sẻ</button>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="border-b border-white/10 mb-6">
            <div class="flex space-x-6 text-sm font-semibold">
                <button onclick="showTab('episodes')" id="tab-episodes"
                    class="py-2 border-b-2 border-yellow-400 text-yellow-400">Tập phim</button>
                <button onclick="showTab('cast')" id="tab-cast" class="py-2 text-gray-300 hover:text-white">Diễn
                    viên</button>
                <button onclick="showTab('recommend')" id="tab-recommend" class="py-2 text-gray-300 hover:text-white">Đề
                    xuất</button>
            </div>
        </div>

        <div id="tabContent">
            <!-- Tab Tập phim -->
            <div id="episodesTab">
                <?php if(isset($isBlocked) && $isBlocked): ?>
                    <div class="alert alert-warning">
                        <strong>Phim này chỉ dành cho tài khoản VIP.</strong>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <?php if($episodes->isNotEmpty()): ?>
                            <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('MovieDetail.show', ['id' => $movie->id, 'tap' => $episode->episode])); ?>"
                                    class="bg-white/10 hover:bg-yellow-400 hover:text-black text-white font-semibold py-2 rounded text-center">
                                    Tập <?php echo e($episode->episode); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <p class="text-gray-400">Chưa có tập phim nào.</p>
                        <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Tab Diễn viên -->
        <div id="castTab" class="hidden">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                <?php $casts = explode(',', $movie->cast); ?>
                <?php $__currentLoopData = $casts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white/5 p-4 rounded text-center">
                        <i class='fas fa-user-circle text-3xl mb-2'></i>
                        <div class='text-sm'><?php echo e(trim($actor)); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Tab Đề xuất -->
        <div id="recommendTab" class="hidden">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                <?php $__currentLoopData = $recommendations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('MovieDetail.show', $recommend->id)); ?>"
                        class="bg-white/5 p-2 rounded hover:bg-white/10 transition text-center text-sm">
                        <img src="<?php echo e(asset($recommend->thumbnail)); ?>" class="rounded mb-2 w-full aspect-[2/3] object-cover">
                        <div><?php echo e($recommend->title); ?></div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        </div>



        
        <section class="mt-10 mb-20 px-4">
            <!-- Đường line mờ ngăn cách -->
            <div class="border-t border-gray-700 opacity-30 mb-8"></div>

            <!-- Container nhỏ gọn, căn trái -->
            <div class="max-w-xl text-white">

                <!-- Tiêu đề & Tabs -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-2 text-xl font-semibold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 8h2a2 2 0 012 2v7a2 2 0 01-2 2h-2m-4 0H7a2 2 0 01-2-2v-7a2 2 0 012-2h6m0-4v4m0 0l-2-2m2 2l2-2" />
                        </svg>
                        Bình luận <span class="text-yellow-400">(5)</span>
                    </div>
                    <div class="space-x-2 text-sm">
                        <button class="px-3 py-1 rounded border text-white bg-white/10 border-white/20">Bình luận</button>
                        <button
                            class="px-3 py-1 rounded border text-white border-white/20 hover:bg-white/10 transition">Đánh
                            giá</button>
                    </div>
                </div>

                <!-- Thông báo đăng nhập -->
                <?php if(!Auth::check()): ?>
                    <p class="text-sm text-gray-400 mb-4">Vui lòng <a href="#"
                            class="text-yellow-400 hover:underline">đăng nhập</a> để tham gia bình luận.</p>
                <?php endif; ?>

                <!-- Form bình luận chính -->
                <?php if(Auth::check()): ?>
                    <form action="<?php echo e(route('Comments.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="bg-[#1c1c1c] rounded-xl p-4 mb-6">
                            <textarea required name="content"
                                class="w-full bg-transparent text-white resize-none placeholder-gray-500 border-none focus:ring-0"
                                placeholder="Viết bình luận" rows="4" maxlength="1000"></textarea>

                            <input type="hidden" name="id_movie" value="<?php echo e($movieInfo->id); ?>">
                            <input type="hidden" name="id_user" value="<?php echo e($id_user); ?>">

                            <div class="flex justify-between items-center mt-2">
                                <label class="flex items-center gap-1 text-sm text-gray-400 cursor-pointer">
                                    <input type="checkbox" class="form-checkbox text-yellow-400" />
                                    Tiết lộ?
                                </label>
                                <div class="text-sm text-gray-500">0 / 1000</div>

                                <button type="submit"
                                    class="flex items-center gap-1 text-yellow-400 font-semibold hover:text-yellow-300 transition">
                                    Gửi <span>&#x279E;</span>
                                </button>

                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <!-- Bình luận -->
                    <!-- Form bình luận -->
                    <div class="bg-[#1c1c1c] rounded-xl p-4 mb-6">
                        <textarea class="w-full bg-transparent text-white resize-none placeholder-gray-500 border-none focus:ring-0"
                            placeholder="Viết bình luận" rows="4" maxlength="1000"></textarea>
                        <div class="flex justify-between items-center mt-2">
                            <label class="flex items-center gap-1 text-sm text-gray-400 cursor-pointer">
                                <input type="checkbox" class="form-checkbox text-yellow-400" />
                                Tiết lộ?
                            </label>
                            <div class="text-sm text-gray-500">0 / 1000</div>
                            <a href="<?php echo e(route('login')); ?>"
                                class="flex items-center gap-1 text-yellow-400 font-semibold hover:text-yellow-300 transition">
                                Gửi <span>&#x279E;</span>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Danh sách bình luận -->
                <div class="space-y-6">

                    <?php $__currentLoopData = $latestCommentsByMovie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestCommentByMovie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Bình luận 1 -->
                        <div class="flex gap-4 items-start">
                            <img src="https://i.pravatar.cc/40?img=32" class="w-10 h-10 rounded-full" />
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <span class="font-semibold"><?php echo e($latestCommentByMovie->name); ?></span>
                                        <span class="text-yellow-400">∞</span>
                                        <span class="text-xs text-gray-400">
                                            <?php echo e($latestCommentByMovie->dateTimeAgo); ?></span>
                                    </div>
                                    <span class="text-xs text-gray-500 bg-white/10 px-2 py-1 rounded">P.2 - Tập 1</span>
                                </div>
                                <p class="mt-1 text-gray-300"><?php echo e($latestCommentByMovie->content); ?></p>
                                <div class="flex items-center text-sm mt-2 text-gray-500 gap-4">
                                    <button class="hover:underline reply-toggle-btn">👍</button>
                                    <button class="hover:underline reply-toggle-btn">Trả lời</button>
                                    <button class="hover:underline">... Thêm</button>
                                </div>

                                <!-- Form phản hồi nhỏ -->
                                <form action="<?php echo e(route('Replies.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="reply-form hidden mt-3">
                                        <input type="hidden" name="idMovie" value="<?php echo e($movieInfo->id); ?>">
                                        <input type="hidden" name="sender_id" value="<?php echo e($id_user); ?>">
                                        <input type="hidden" name="received_id"
                                            value="<?php echo e($latestCommentByMovie->idUser); ?>">
                                        <input type="hidden" name="comment_id" value="<?php echo e($latestCommentByMovie->id); ?>">
                                        <textarea name="content" rows="2" placeholder="Phản hồi..."
                                            class="w-full bg-[#2a2a2a] text-sm text-white p-2 rounded resize-none"></textarea>
                                        <div class="flex justify-end mt-2">
                                            <button type="submit"
                                                class="px-3 py-1 text-sm bg-yellow-500 text-black rounded hover:bg-yellow-400">Gửi
                                                phản hồi</button>
                                        </div>
                                    </div>
                                </form>

                                <!-- Danh sách phản hồi con (thụt vào) -->
                                <div class="mt-4 ml-6 space-y-4">
                                    <!-- Phản hồi 1 -->
                                    <?php $__currentLoopData = $latestCommentByMovie->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="flex gap-3 items-start">
                                            <img src="<?php echo e($reply -> image); ?>" class="w-9 h-9 rounded-full" />
                                            <div class="flex-1">
                                                <div class="flex justify-between items-center">
                                                    <span class="font-semibold"><?php echo e($reply->name); ?></span>
                                                    <span class="text-xs text-gray-400"><?php echo e($reply->diffTimeAgoFormatted); ?></span>
                                                </div>
                                                <p class="text-gray-300 text-sm mt-1"> <?php echo e($reply->content); ?> </p>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.reply-toggle-btn').forEach(button => {
                button.addEventListener('click', () => {
                    const replyForm = button.closest('.flex-1').querySelector('.reply-form');
                    if (replyForm) {
                        replyForm.classList.toggle('hidden');
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<style>
    .alert {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        border-radius: 5px;

    }

    .alert a {
        color: #155724;
        text-decoration: underline;
    }
</style>

<?php echo $__env->make('../layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\DuAnTotNghiep\Project\download\final4\GoFilm\GoFilm\resources\views/user/movie_info.blade.php ENDPATH**/ ?>
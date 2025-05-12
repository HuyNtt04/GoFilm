<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/Admin/style.css')); ?>" />
    <?php echo $__env->yieldPushContent('css'); ?>
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="container">
        <?php echo $__env->make('layouts.admin.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <!-- =========== Scripts =========  -->
    <script>
    let list = document.querySelectorAll(".navigation li");

    function activeLink() {
        list.forEach((item) => {
            item.classList.remove("hovered");
        });
        this.classList.add("hovered");
    }

    list.forEach((item) => item.addEventListener("mouseover", activeLink));

    // Menu Toggle
    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");

    toggle.onclick = function() {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };
    document.getElementById('images').addEventListener('change', function(event) {
        const files = event.target.files;
        const container = document.getElementById('image_preview');
        container.innerHTML = ''; // Xóa các hình ảnh cũ trong container

        // Duyệt qua tất cả các file được chọn
        for (let i = 0; i < files.length; i++) {
            const file = files[i];

            if (file.type.startsWith('image/')) {
                const objectURL = URL.createObjectURL(file);

                const img = document.createElement('img');
                img.src = objectURL;
                img.alt = file.name;
                img.style.maxWidth = '200px'; // Chỉ định kích thước tối đa nếu cần
                img.style.margin = '10px';

                container.appendChild(img);
            }
        }
    });
    document.getElementById('thumbnail').addEventListener('change', function(event) {
        const files = event.target.files;
        const container = document.getElementById('thumbnail_preview');
        container.innerHTML = ''; // Xóa các hình ảnh cũ trong container

        // Duyệt qua tất cả các file được chọn
        for (let i = 0; i < files.length; i++) {
            const file = files[i];

            if (file.type.startsWith('image/')) {
                const objectURL = URL.createObjectURL(file);

                const img = document.createElement('img');
                img.src = objectURL;
                img.alt = file.name;
                img.style.maxWidth = '200px'; // Chỉ định kích thước tối đa nếu cần
                img.style.margin = '10px';

                container.appendChild(img);
            }
        }
    });
    </script>

    <!-- ====== ionicons ======= -->
    <!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type='module' src="<?php echo e(asset('js/admin/movie/bin.js')); ?>"></script>
    <script type='module' src="<?php echo e(asset('js/admin/movie/movie.js')); ?>"></script>
    <script type='module' src="<?php echo e(asset('js/admin/notifications/bin.js')); ?>"></script>
    <script type='module' src="<?php echo e(asset('js/admin/notifications/notifications.js')); ?>"></script>
    <script type='module' src="<?php echo e(asset('js/admin/admin.js')); ?>"></script>
    <script type='module' src="<?php echo e(asset('js/admin/episodes/delete.js')); ?>"></script>
    <script type='module' src="<?php echo e(asset('js/admin/subsplans/delete.js')); ?>"></script>
    <script type='module' src="<?php echo e(asset('js/admin/subs/delete.js')); ?>"></script>
    <script type='module' src="<?php echo e(asset('js/admin/categories/delete.js')); ?>"></script>
    <script type='module' src="<?php echo e(asset('js/admin/replies/delete.js')); ?>"></script>
    <script type='module' src="<?php echo e(asset('js/admin/comments/delete.js')); ?>"></script>
</body>

</html><?php /**PATH D:\Laravel\GoFilm\GoFilm\resources\views/layouts/admin.blade.php ENDPATH**/ ?>
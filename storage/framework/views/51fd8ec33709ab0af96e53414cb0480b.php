<nav class="pcoded-navbar">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >
            
            
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Categories</label>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.category.index')); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Loại</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Movies</label>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.movie.index')); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Phim</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Action</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="<?php echo e(route('admin.movie.create')); ?>">Thêm</a></li>
                        <li><a href="<?php echo e(route('admin.movie.bin')); ?>">Thùng rác</a></li>
                    </ul>
                </li>
                <?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Users</label>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.users.index')); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Người Dùng</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Action</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?php echo e(route('admin.users.create')); ?>">Thêm</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Roles</label>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.roles.index')); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Vai Trò</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Action</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?php echo e(route('admin.roles.create')); ?>">Thêm</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Permissions</label>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.permissions.index')); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Quyền Lợi</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Action</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?php echo e(route('admin.permissions.create')); ?>">Thêm</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <li class="nav-item pcoded-menu-caption">
                    <label>Notifications</label>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.notifications.index')); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Thông Báo</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Action</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="<?php echo e(route('admin.notifications.bin')); ?>">Thùng rác</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Subscriptions Plans</label>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.subscriptionsplans.index')); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Gói</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Action</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="<?php echo e(route('admin.subscriptionsplans.create')); ?>">Thêm</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Subscriptions</label>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.subscriptions.index')); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Đăng Ký</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Comments</label>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.comments.index')); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Bình Luận</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav><?php /**PATH /home/exfjkuc5yqp3/gofilm.click/resources/views/layouts/admin/nav.blade.php ENDPATH**/ ?>
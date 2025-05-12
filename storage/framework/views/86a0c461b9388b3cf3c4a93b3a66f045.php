<div class="navigation">
    <ul>
        <li>
            <a href="/admin">
                <span class="icon">
                    <ion-icon name="logo-apple"></ion-icon>
                </span>
                <span class="title">Admin</span>
            </a>
        </li>

        <li>
            <a href="/admin">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="/admin/category">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Categories</span>
            </a>
        </li>
        <li>
            <a href="/admin/movie">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Movies</span>
            </a>
        </li>
        <?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>
        <li>
            <a href="/admin/users">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Customers</span>
            </a>
        </li>
        <li>
            <a href="/admin/roles">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Roles</span>
            </a>
        </li>
        <li>
            <a href="/admin/permissions">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Permissions</span>
            </a>
        </li>
        <?php endif; ?>
        <li>
            <a href="/admin/notifications">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Notifications</span>
            </a>
        </li>
        <li>
            <a href="/admin/subscriptionsplans">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Subscriptions Plans</span>
            </a>
        </li>
        <li>
            <a href="/admin/subscriptions">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Subscriptions</span>
            </a>
        </li>
        <li>
            <a href="/admin/comments">
                <span class="icon">
                    <ion-icon name="settings-outline"></ion-icon>
                </span>
                <span class="title">Comments</span>
            </a>
        </li>

        <li>
            <span class="icon">
                <ion-icon name="log-out-outline"></ion-icon>
            </span>
            <span class="title">

                <form action="<?php echo e(route('logout')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="mt-3 text-sm py-1 px-4 rounded-full border border-gray-700 hover:bg-gray-700/50 transition-colors">
                        <i class="fas fa-sign-out-alt mr-1"></i> Thoát</a>
                    </button>
                </form>
            </span>
        </li>
    </ul>
</div><?php /**PATH D:\Laravel\GoFilm\GoFilm\resources\views/layouts/admin/header.blade.php ENDPATH**/ ?>
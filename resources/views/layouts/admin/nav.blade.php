<nav class="pcoded-navbar">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >
            
            
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Categories</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Loại</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Movies</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.movie.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Phim</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Action</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.movie.create') }}">Thêm</a></li>
                        <li><a href="{{ route('admin.movie.bin') }}">Thùng rác</a></li>
                    </ul>
                </li>
                @role('admin')
                    <li class="nav-item pcoded-menu-caption">
                        <label>Users</label>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Người Dùng</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Action</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ route('admin.users.create') }}">Thêm</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Roles</label>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.roles.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Vai Trò</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Action</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ route('admin.roles.create') }}">Thêm</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Permissions</label>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.permissions.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Quyền Lợi</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Action</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ route('admin.permissions.create') }}">Thêm</a></li>
                        </ul>
                    </li>
                @endrole
                <li class="nav-item pcoded-menu-caption">
                    <label>Notifications</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.notifications.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Thông Báo</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Action</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.notifications.bin') }}">Thùng rác</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Subscriptions Plans</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.subscriptionsplans.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Gói</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Action</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.subscriptionsplans.create') }}">Thêm</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Subscriptions</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.subscriptions.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Đăng Ký</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Comments</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.comments.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Danh Sách Bình Luận</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
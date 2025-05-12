<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="{{url('/')}}" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <h1 class="text-xl font-bold text-yellow-600" style="color:orange">GO Film</h1>

            <img src="{{ asset('images/logo-icon.png') }}" alt="" class="logo-thumb">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <span>{{Auth::user()->name}}</span>
                            <form action="{{ route('logout') }}" class="dud-logout" title="Logout" method="post">
                                @csrf
                                <button type="submit" id="logout-submit">
                                    <i class="feather icon-log-out"></i>
                                </button>
                            </form>
                        </div>
                        <ul class="pro-body">
                            <li><a href="{{route('profile.index')}}" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>	
</header>
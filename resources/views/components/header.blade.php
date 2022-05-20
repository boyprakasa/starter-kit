<header class="topbar" data-navbarbg="skin1">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i>
            </a>
            <a class="navbar-brand" href=".">
                <b class="logo-icon">
                    <img src="/xa/assets/images/logo-icon.png" alt="homepage" class="dark-logo">
                    <img src="/xa/assets/images/logo-light-icon.png" alt="homepage" class="light-logo">
                </b>
                <span class="logo-text">
                    <img src="/xa/assets/images/logo-text.png" alt="homepage" class="dark-logo">
                    <img src="/xa/assets/images/logo-light-text.png" class="light-logo" alt="homepage">
                </span>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin1">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light"
                        href="javascript:void(0)" data-sidebartype="mini-sidebar"><i
                            class="mdi mdi-menu font-24"></i></a></li>
            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="/xa/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <span class="with-arrow"><span class="bg-primary"></span></span>
                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white mb-2">
                            <div class=""><img src="/xa/assets/images/users/1.jpg" alt="user"
                                    class="img-circle" width="60"></div>
                            <div class="ml-2">
                                <h4 class="mb-0">{{ auth()->user()->name }}</h4>
                                <p class=" mb-0">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        @if (auth()->user()->verified)
                            <a class="dropdown-item" href="{{ route('profile') }}"><i class="ti-user mr-1 ml-1"></i>
                                Profil & Pengaturan Akun
                            </a>
                            <div class="dropdown-divider"></div>
                        @endif
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" style="outline: none; box-shadow: none" type="submit"><i
                                    class="fa fa-power-off mr-1 ml-1"></i> Keluar
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

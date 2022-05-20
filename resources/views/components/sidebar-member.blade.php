<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                @if (auth()->user()->verified)
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('home') }}"
                            aria-expanded="false">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    @can('N01', 'N02', 'N03')
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="fas fa-window-restore"></i>
                                <span class="hide-menu">Permohonan</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <i class="fas fa-file-alt"></i>
                                        <span class="hide-menu"> Baru</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <i class="fas fa-file-excel"></i>
                                        <span class="hide-menu"> Revisi</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="javascript:void(0)" class="sidebar-link">
                                        <i class="fas fa-file-powerpoint"></i>
                                        <span class="hide-menu"> Proses</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    @role('Super Admin|Admin')
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="fas fa-users"></i>
                                <span class="hide-menu">Pemohon</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <i class="fas fa-angle-double-right"></i>
                                        <span class="hide-menu"> Akun</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="javascript:void(0)" class="sidebar-link">
                                        <i class="fas fa-angle-double-right"></i>
                                        <span class="hide-menu"> Profil</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endrole

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i
                                class="fas fa-book"></i><span class="hide-menu">Laporan</span>
                        </a>
                    </li>

                    @role('Super Admin|Admin')
                        <div class="dropdown-divider"></div>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('informasi.index') }}" aria-expanded="false">
                                <i class="fas fa-info-circle"></i><span class="hide-menu">Informasi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('download.index') }}" aria-expanded="false">
                                <i class="fas fa-download"></i><span class="hide-menu">Download</span>
                            </a>
                        </li>
                    @endrole

                    @role('Super Admin')
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="fas fa-briefcase"></i>
                                <span class="hide-menu">Master</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.index') }}" class="sidebar-link">
                                        <i class="fas fa-angle-double-right"></i>
                                        <span class="hide-menu">Admin</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('service.index') }}" class="sidebar-link">
                                        <i class="fas fa-angle-double-right"></i>
                                        <span class="hide-menu"> Layanan</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('requirements.index') }}" class="sidebar-link">
                                        <i class="fas fa-angle-double-right"></i>
                                        <span class="hide-menu"> Syarat</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('requirements-list.index') }}" class="sidebar-link">
                                        <i class="fas fa-angle-double-right"></i>
                                        <span class="hide-menu"> Persyaratan</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('signature.index') }}" class="sidebar-link">
                                        <i class="fas fa-angle-double-right"></i>
                                        <span class="hide-menu"> Tanda Tangan</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endrole
                @endif

            </ul>
        </nav>
    </div>
</aside>

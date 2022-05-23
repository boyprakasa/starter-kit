<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                @if (auth()->user()->hasVerifiedEmail())
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('home') }}"
                            aria-expanded="false">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i
                                class="fas fa-file-alt"></i><span class="hide-menu">Permohonan</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('download.index') }}" aria-expanded="false"><i
                                class="fas fa-download"></i><span class="hide-menu">Download</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('informasi.index') }}" aria-expanded="false"><i
                                class="fas fa-info-circle"></i><span class="hide-menu">Informasi</span>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>

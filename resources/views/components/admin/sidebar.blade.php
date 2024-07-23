<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="index.html">MIS</a>
                </div>

                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Beranda</li>

                <li class="sidebar-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">LOB</li>

                <li class="sidebar-item {{ request()->routeIs(['dashboard.klaim.*']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.klaim.index') }}" class='sidebar-link'>
                        <i class="bi bi-text-indent-left"></i>
                        <span>Klaim LOB</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs(['dashboard.lob.klaim']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.lob.klaim') }}" class='sidebar-link'>
                        <i class="bi bi-text-indent-left"></i>
                        <span>LOB</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs(['dashboard.log.*']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.log.index') }}" class='sidebar-link'>
                        <i class="bi bi-text-indent-left"></i>
                        <span>Activity Log</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('admin/dashboard') }}">
                <p>Nama<br>Pukesmas</p>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">#</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user"></i>
                    <span>Data Pasien</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                        <a href="{{ route('data-pasien.index') }}" class="nav-link">
                            <span>Lihat Data Pasien</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-th"></i>
                    <span>Data Dokter</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                        <a href="#" class="nav-link">
                            <span>Lihat Data Dokter</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-th"></i>
                    <span>Jadwal Praktek</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                        <a href="#" class="nav-link">
                            <span>Lihat Jadawal Praktek</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-th"></i>
                    <span>Data Kunjungan</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                        <a href="#" class="nav-link">
                            <span>Kunjungan Pasien</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-th"></i>
                    <span>Data Rekap</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                        <a href="#" class="nav-link">
                            <span>Lihat Rekap Pasien</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a class="btn btn-danger btn-lg btn-block btn-icon-split" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </aside>
</div>
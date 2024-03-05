<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('admin/dashboard') }}">
                <p style="color: black; font-weight: bold; font-size: 20px;">Pukesmas<br>Prembun</p>
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
                    <span style="color: black; font-weight: bold; font-size: 20px;">Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user"></i>
                    <span style="color: black; font-weight: bold; font-size: 20px;">DATA</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                        <a href="{{ route('data-pasien.index') }}" class="nav-link">
                            <span style="color: black; font-size: 20px;">Lihat Data Pasien</span>
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                        <a href="{{ route('data-dokter.index') }}" class="nav-link">
                            <span style="color: black; font-size: 20px;">Lihat Data Dokter</span>
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                        <a href="{{ route('data-poli.index') }}" class="nav-link">
                            <span style="color: black; font-size: 20px;">Lihat Data Poli</span>
                        </a>
                    </li>
                </ul>
                <!--
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                        <a href="{{ route('data-kunjung.index') }}" class="nav-link">
                            <span>Lihat Data Kunjungan</span>
                        </a>
                    </li>
                </ul>
                -->
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                        <a href="{{ route('data-rekap.index') }}" class="nav-link">
                            <span style="color: black; font-size: 20px;">Lihat Data Rekap</span>
                        </a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                        <a href="{{ route('data-dianogsa.index') }}" class="nav-link">
                            <span style="color: black; font-size: 20px;">Lihat Data Dianogsa</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-th"></i>
                    <span style="color: black; font-weight: bold; font-size: 20px;">Jadwal Praktek</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                        <a href="{{ route('data-jadwal-praktek.index') }}" class="nav-link">
                            <span style="color: black; font-size: 20px;">Lihat Jadwal Praktek</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-th"></i>
                    <span style="color: black; font-weight: bold; font-size: 20px;">Pegawai</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                        <a href="{{ route('data-pegawai.index') }}" class="nav-link">
                            <span style="color: black; font-size: 20px;">Lihat Pegawai</span>
                        </a>
                    </li>
                </ul>
            </li>

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
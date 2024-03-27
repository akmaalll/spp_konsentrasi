<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="">SPPIE</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="">SPP</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown ">
            <a href="" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Pengelolaan Data Mahasiswa</li>
        <li class="nav-item dropdown ">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i>
                <span>Mahasiswa</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('index.mahasiswa') }}">Data Mahasiswa</a></li>
                <li><a class="nav-link" href="{{ route('create.mahasiswa') }}">Tambah Data</a></li>
            </ul>
        </li>
        <li class="menu-header">Pengelolaan Data Jurusan</li>
        <li class="nav-item dropdown ">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-friends"></i>
                <span>Jurusan</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="">Data Jurusan</a></li>
                <li><a class="nav-link" href="">Tambah Data </a></li>
            </ul>
        </li>
        <li class="menu-header">Pengelolaan Data SPP</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-dollar-sign"></i>
                <span>SPP</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="">Data SPP</a></li>
                <li><a class="nav-link" href="">Log History SPP</a></li>
            </ul>
        </li>
    </ul>

    <div class=" mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-plus"></i> Tambah Transaksi
        </a>
    </div>
</aside>

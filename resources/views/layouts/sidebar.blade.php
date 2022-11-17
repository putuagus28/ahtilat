<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>DATA MASTER</span>
        </h6>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('akuns*') ? 'active' : '' }}" href="{{ route('akuns.index') }}">
                    <span data-feather="clipboard" class="align-text-bottom"></span>
                    Data Akun
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('kategoriproduks*') ? 'active' : '' }}"
                    href="{{ route('kategoriproduks.index') }}">
                    <span data-feather="list" class="align-text-bottom"></span>
                    Data Kategori Produk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('produks*') ? 'active' : '' }}" href="{{ route('produks.index') }}">
                    <span data-feather="package" class="align-text-bottom"></span>
                    Data Produk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('pelanggans*') ? 'active' : '' }}"
                    href="{{ route('pelanggans.index') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Data Pelanggan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Data User
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>TRANSAKSI JUAL BELI</span>
        </h6>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                    href="/dashboard/categories">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Pembelian
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                    href="/dashboard/categories">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Hutang Pembelian
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                    href="/dashboard/categories">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Penjualan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                    href="/dashboard/categories">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Piutang Penjualan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('jurnalumums*') ? 'active' : '' }}" href="/jurnalumums">
                    <span data-feather="book" class="align-text-bottom"></span>
                    Jurnal Umum
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>LAPORAN</span>
        </h6>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                    href="/dashboard/categories">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Data Laporan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('laporan/laporan-jurnal-umum') ? 'active' : '' }}"
                    href="{{ route('laporan-jurnal-umum') }}">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Laporan Jurnal Umum
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('laporan/laporan-neraca-saldo') ? 'active' : '' }}"
                    href="{{ route('laporan-neraca-saldo') }}">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Laporan Neraca Saldo
                </a>
            </li>
        </ul>
    </div>
</nav>

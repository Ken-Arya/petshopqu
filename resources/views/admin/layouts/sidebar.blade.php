<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/data-produk') ? 'active' : '' }}" href="/admin/data-produk">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Data Produk
                </a>
            </li>
        </ul>
    </div>
</nav>

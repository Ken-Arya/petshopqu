<main>
    <div class="container">

        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 ">
                <img src="{{ asset('storage/img/logo.png') }}" width=100% height=50%>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" href="/">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Produk' ? 'active' : '' }}" href="/produk">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Blog' ? 'active' : '' }}" href="/blog">Keranjang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Jadwal Pelajaran' ? 'active' : '' }}"
                        href="/jadwalpelajaran">Test</a>
                </li>
            </ul>


            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">
                    @auth
                        <li><a class="dropdown-item" href="#">Admin Dashboard</a></li>
                    @else
                        <li><a class="dropdown-item" href="#">Admin</a></li>
                    @endauth
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
                <a class="nav-link {{ $title === 'Login' ? 'active' : '' }}" href="/login">
                    <button type="button" class="btn btn-outline-primary me-2">Login</button>
                </a>
            </div>
        </header>
    </div>
</main>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

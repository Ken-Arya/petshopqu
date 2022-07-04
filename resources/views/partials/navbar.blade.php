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
                @auth
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->nama_pelanggan }}
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/admin">
                                    Dashboard Admin
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right">
                                    </i>
                                    Logout
                                </button>
                            </form>
                        </ul>
                    </div>
                @else
                    <a class="nav-link {{ $title === 'Login' ? 'active' : '' }}" href="/login">
                        <button type="button" class="btn btn-outline-primary me-2">Login
                        </button>
                    </a>
                @endauth
            </div>
        </header>
    </div>
</main>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

{{-- <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
aria-expanded="false">
Action
</button>
<ul class="dropdown-menu">
@auth
    <li><a class="dropdown-item" href="/admin">Admin Dashboard</a></li>
@else
    <li><a class="dropdown-item" href="/admin">Admin</a></li>
@endauth
<li>
    <hr class="dropdown-divider">
</li>
<li>
    <form action="/logout" method="post">
        <button type="submit" class="dropdown-item"><i
                class="bi bi-box-arrow-right"></i>Logout</button>
    </form>
</li>
</ul>
<a class="nav-link {{ $title === 'Login' ? 'active' : '' }}" href="/login">
<button type="button" class="btn btn-outline-primary me-2">Login</button>
</a> --}}


{{-- @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{ auth()->user()->nama_pelanggan }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/dashboard">
                                    <i class="bi bi-layout-text-sidebar-reverse">
                                    </i>
                                    Dashboard Admin
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    <button type="submit" class="dropdown-item"><i
                                            class="bi bi-box-arrow-right"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ $title === 'Login' ? 'active' : '' }}" href="/login">
                                <button type="button" class="btn btn-outline-primary me-2">Login
                                </button>
                            </a>
                        </li>
                    </ul>
                @endauth --}}

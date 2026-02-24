<nav class="navbar navbar-expand-lg bg-body-tertiary py-2 py-lg-2" data-bs-theme="dark">
    <div class="container-fluid px-2 px-sm-3 gap-2 gap-lg-3">
        <!-- Brand -->
        <a class="navbar-brand d-flex align-items-center ms-1 ms-lg-3" href="#">
            <img src="/images/logo.png" alt="Logo" class="img-fluid me-2"
                style="width: clamp(28px, 7vw, 45px); height: auto;">
            <span class="fw-semibold d-sm-inline">ForeCry</span>
        </a>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 gap-2 gap-lg-3">
                <li class="nav-item">
                    <a @class([
                        'nav-link',
                        'px-2',
                        'px-lg-3',
                        'py-2',
                        'py-lg-3',
                        'active' => request()->routeIs('beranda'),
                    ]) href="{{ route('beranda') }}"
                        aria-current="{{ request()->routeIs('beranda') ? 'page' : false }}">
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a @class([
                        'nav-link',
                        'px-2',
                        'px-lg-3',
                        'py-2',
                        'py-lg-3',
                        'active' => request()->routeIs('prediksi.*'),
                    ]) href="{{ route('prediksi.index') }}">
                        Prediksi
                    </a>
                </li>
                <li class="nav-item">
                    <a @class([
                        'nav-link',
                        'px-2',
                        'px-lg-3',
                        'py-2',
                        'py-lg-3',
                        'active' => request()->routeIs('berita.*'),
                    ]) href="{{ route('berita.index') }}">
                        Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a @class([
                        'nav-link',
                        'px-2',
                        'px-lg-3',
                        'py-2',
                        'py-lg-3',
                        'active' => request()->routeIs('tentang'),
                    ]) href="{{ route('tentang') }}">
                        Tentang
                    </a>
                </li>
            </ul>
        </div>

        <!-- Avatar -->
        @auth
        <!-- Jika sudah login -->
        {{-- <img src="/images/default_avatar.png"
            alt="Profile"
            class="rounded-circle"
            width="30"
            height="30">--}}
        <form id="logout-form" action="/logout" method="POST">
            @csrf
            <button class="btn btn-outline-danger px-4" type="submit" onclick="return confirmLogout()">
                Logout
            </button>
        </form>
        @endauth
        <script>
            function confirmLogout() {
                return confirm("Apakah Anda yakin ingin logout?");
            }
        </script>

        @guest
            <!-- Jika belum login -->
            <a href="{{ route('login') }}" class="btn btn-success px-4">
                Login
            </a>
        @endguest

        <!-- Toggler -->
        <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>
</nav>


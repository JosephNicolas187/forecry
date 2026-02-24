<footer class="mt-auto border-top border-secondary bg-body-tertiary text-white" data-bs-theme="dark">
    <div class="container-xxl py-4">
        <div class="row g-3 align-items-center">

            {{-- Brand / Logo --}}
            <div class="col-12 col-md-4 d-flex align-items-center justify-content-center justify-content-md-start">
                <img src="/images/logo.png" alt=".LOGO" class="me-2" style="width:36px; height:auto;">
                <span class="fw-semibold">ForeCry</span>
            </div>

            {{-- Nav Footer --}}
            <nav class="col-12 col-md-4">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a href="{{ route('beranda') }}" class="nav-link px-2 link-light">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('prediksi.index') }}" class="nav-link px-2 link-light">Prediksi</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('berita.index') }}" class="nav-link px-2 link-light">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tentang') }}" class="nav-link px-2 link-light">Tentang</a>
                    </li>
                </ul>
            </nav>

            {{-- Socials --}}
            <div class="col-12 col-md-4">
                <div class="d-flex justify-content-center justify-content-md-end gap-3">
                    <a href="#" class="link-light" aria-label="GitHub"><i class="bi bi-github fs-5"></i></a>
                    <a href="#" class="link-light" aria-label="Twitter/X"><i class="bi bi-twitter-x fs-5"></i></a>
                    <a href="#" class="link-light" aria-label="LinkedIn"><i class="bi bi-linkedin fs-5"></i></a>
                </div>
            </div>
        </div>

        <hr class="border-secondary opacity-50 my-4">

        <div class="row small text-white-50">
            <div class="col-12 col-lg-8">
                <p class="mb-2 mb-lg-0">
                    *ForeCry adalah alat bantu analisis. Bukan ajakan atau nasihat investasi. Selalu lakukan riset
                    mandiri.
                </p>
            </div>
            <div class="col-12 col-lg-4 text-lg-end">
                <span>&copy; {{ now()->year }} ForeCry — All rights reserved.</span>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</footer>

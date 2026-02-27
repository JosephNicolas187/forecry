<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang • .LOGO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sedikit estetika saja */
        .hero-glow {
            position: relative;
            overflow: hidden;
            background: #0f0f0f;
            border: 1px solid rgba(255, 255, 255, .12);
        }

        .hero-glow::after {
            content: "";
            position: absolute;
            inset: auto -20% -40% -20%;
            height: 60%;
            background: radial-gradient(60% 100% at 50% 100%, rgba(0, 255, 150, .25), transparent 70%);
            pointer-events: none;
        }

        .soft-card {
            background: var(--bs-body-tertiary);
            border: 1px solid rgba(255, 255, 255, .12);
        }
    </style>
</head>

<body class="bg-dark text-white" data-bs-theme="dark">
    <x-navbar></x-navbar>

    <main class="container-xxl py-4">

        <!-- HERO -->
        <section class="hero-glow rounded-3 p-4 p-md-5 mb-4">
            <div class="row align-items-center g-3 justify-content-center">
                <div
                    class="col-lg-5 d-flex flex-column align-items-center align-items-lg-start text-center text-lg-start">
                    <h1 class="display-5 fw-bold mb-2">Tentang <span class="text-success">ForeCry</span></h1>
                    <p class="lead text-white-75 mb-3">
                        ForeCry menggabungkan <strong>LSTM</strong> (deret waktu) dan <strong>FinBERT</strong> (sentimen
                        finansial)
                        untuk memproyeksikan harga kripto secara lebih kontekstual terhadap berita dan kondisi pasar.
                    </p>
                    <div class="d-flex gap-2 justify-content-center justify-content-lg-start">
                        <a href="{{ route('prediksi.index') }}" class="btn btn-success px-4">Mulai Prediksi</a>
                        <a href="{{ route('berita.index') }}" class="btn btn-outline-light px-4">Lihat Berita</a>
                    </div>
                </div>

                <div class="col-8 col-sm-6 col-md-5 col-lg-3 d-flex justify-content-center">
                    <img src="/images/logo.png" alt=".LOGO" class="img-fluid w-100">
                </div>

            </div>
        </section>

        <!-- KEUNGGULAN -->
        <section class="mb-4">
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <div class="card soft-card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-activity fs-3 text-success me-2"></i>
                                <h5 class="mb-0">Prediksi Deret Waktu</h5>
                            </div>
                            <p class="text-white-75 mb-0">
                                LSTM memodelkan pola historis (OHLCV) dan menangkap dependensi jangka panjang
                                sehingga proyeksi harga lebih stabil terhadap noise jangka pendek.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card soft-card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-chat-square-text fs-3 text-success me-2"></i>
                                <h5 class="mb-0">Sentimen Finansial</h5>
                            </div>
                            <p class="text-white-75 mb-0">
                                FinBERT mengklasifikasi sentimen berita kripto (positif/netral/negatif) dan
                                mengubahnya menjadi fitur numerik yang memperkaya input model.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card soft-card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-cloud-arrow-down fs-3 text-success me-2"></i>
                                <h5 class="mb-0">Berita Terbaru</h5>
                            </div>
                            <p class="text-white-75 mb-0">
                                Mengumpulkan dan menampilkan berita kripto terkini dari sumber terpercaya
                                sebagai referensi informasi pasar dan pendukung analisis sentimen.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CARA KERJA -->
        <section class="mb-4">
            <div class="card soft-card">
                <div class="card-header border-secondary">
                    <h5 class="mb-0">Cara Kerja</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-12 col-md-3">
                            <div class="d-flex">
                                <span class="badge rounded-pill text-bg-success me-3">1</span>
                                <div>
                                    <h6 class="mb-1">Pengumpulan Data</h6>
                                    <p class="text-white-75 small mb-0">Histori harga (Binance) & berita kripto terkini
                                        dikumpulkan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="d-flex">
                                <span class="badge rounded-pill text-bg-success me-3">2</span>
                                <div>
                                    <h6 class="mb-1">Pra-proses</h6>
                                    <p class="text-white-75 small mb-0">Normalisasi harga, windowing deret waktu,
                                        tokenisasi teks.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="d-flex">
                                <span class="badge rounded-pill text-bg-success me-3">3</span>
                                <div>
                                    <h6 class="mb-1">Pemodelan</h6>
                                    <p class="text-white-75 small mb-0">LSTM memprediksi harga; FinBERT memberi skor
                                        sentimen.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="d-flex">
                                <span class="badge rounded-pill text-bg-success me-3">4</span>
                                <div>
                                    <h6 class="mb-1">Hasil Prediksi</h6>
                                    <p class="text-white-75 small mb-0">Menampilkan hasil prediksi harga secara informatif.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- STATISTIK -->
        <section class="mb-4">
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <div class="card soft-card text-center h-100">
                        <div class="card-body">
                            <div class="display-6 fw-bold">5</div>
                            <div class="text-white-50">Sumber Berita Populer</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card soft-card text-center h-100">
                        <div class="card-body">
                            <div class="display-6 fw-bold">4</div>
                            <div class="text-white-50">Jenis interval prediksi Bitcoin</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card soft-card text-center h-100">
                        <div class="card-body">
                            <div class="display-6 fw-bold">24/7</div>
                            <div class="text-white-50">Pembaruan Sentimen</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section class="mb-4">
            <div class="card soft-card">
                <div class="card-header border-secondary">
                    <h5 class="mb-0">FAQ</h5>
                </div>
                <div class="card-body">
                    <div class="accordion accordion-flush" id="faq">
                        <div class="accordion-item bg-transparent border-secondary">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent text-white" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#q1">Apakah ini ajakan
                                    investasi?</button>
                            </h2>
                            <div id="q1" class="accordion-collapse collapse" data-bs-parent="#faq">
                                <div class="accordion-body text-white-75">
                                    Tidak. Forecry adalah alat bantu analisis menggunakan model LSTM-FinBert. Selalu lakukan riset mandiri.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item bg-transparent border-secondary">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent text-white" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#q2">Darimana sumber datanya?</button>
                            </h2>
                            <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faq">
                                <div class="accordion-body text-white-75">
                                    Harga dari penyedia pasar kripto Binance. Berita dari media finansial
                                    populer.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item bg-transparent border-secondary">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent text-white" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#q4">Apakah real-time?</button>
                            </h2>
                            <div id="q4" class="accordion-collapse collapse" data-bs-parent="#faq">
                                <div class="accordion-body text-white-75">
                                    Pembaruan harga mengikuti interval pilihan; berita diproses berkala (hingga 24/7).
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA BAWAH -->
        <section class="mb-2">
            <div
                class="soft-card rounded-3 p-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <div class="mb-3 mb-md-0">
                    <h4 class="mb-1">Siap mencoba ForeCry?</h4>
                    <p class="mb-0 text-white-50 small">Lihatlah prediksi harganya.
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('prediksi.index') }}" class="btn btn-success">Mulai Prediksi</a>
                    <a href="{{ route('berita.index') }}" class="btn btn-outline-light">Lihat Berita</a>
                </div>
            </div>
        </section>

    </main>
    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

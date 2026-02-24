<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda • .LOGO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://s3.tradingview.com/tv.js"></script>
</head>

<body class="bg-dark text-white" data-bs-theme="dark">
    <x-navbar></x-navbar>

    <main class="container-xxl py-4">

        <!-- HERO -->
        <section class="bg-body-tertiary border border-secondary rounded-3 p-4 p-md-5 mb-4 d-flex align-items-center">
            <div class="row align-items-center w-100 g-4">
                <div class="col-lg-7">
                    <h1 class="display-5 fw-bold mb-2">
                        Prediksi harga kripto <span class="text-success">lebih kontekstual</span>
                    </h1>
                    <p class="lead text-white-75">
                        ForeCry menggabungkan <strong>LSTM</strong> & <strong>FinBERT</strong> untuk
                        memproyeksikan harga dan menimbang sentimen pasar.
                    </p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('prediksi.index') }}" class="btn btn-success px-4">Mulai Prediksi</a>
                        <a href="{{ route('tentang') }}" class="btn btn-outline-light px-4">Pelajari</a>
                    </div>
                </div>

                </div>
            </div>
        </section>

        <!-- 3 KOLOM -->
        <div class="row g-3">
            <!-- Ringkasan Pasar -->
            <div class="col-12 col-lg-4">
                <div class="card bg-body-tertiary border-secondary h-100">
                    <div class="card-header border-secondary">
                        <h5 class="mb-0">Harga BTC Terkini</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-success me-2">Live</span>
                            <span class="text-white-50 small">Ringkasan Pasar</span>
                        </div>

                        <!-- Widget Chart -->
                        <div class="rounded border border-secondary overflow-hidden" style="height:240px;">
                            <div class="tradingview-widget-container" style="height:100%; width:100%;">
                                <tv-mini-chart symbol="BITSTAMP:BTCUSD"></tv-mini-chart>
                            </div>
                        </div>

                        <a href="{{ route('prediksi.index') }}" class="btn btn-outline-light w-100 mt-3">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>


            <!-- Sentimen Terkini -->
            <div class="col-12 col-lg-4">
                <div class="card bg-body-tertiary border-secondary h-100">
                    <div class="card-header border-secondary">
                        <h5 class="mb-0">Sentimen Terkini</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @foreach ($news as $item)
                                <a class="list-group-item list-group-item-action ...">
                                    {{ $item->title_raw }}
                                    @if ($item->sentiment_label === 'positive')
                                        <span class="badge bg-success">Positive</span>
                                    @elseif ($item->sentiment_label === 'negative')
                                        <span class="badge bg-danger">Negative</span>
                                    @else
                                        <span class="badge bg-secondary">Neutral</span>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('berita.index') }}" class="btn btn-sm btn-outline-light">Semua Berita</a>
                    </div>
                </div>
            </div>

            <!-- Kenapa .LOGO? -->
            <div class="col-12 col-lg-4">
                <div class="card bg-body-tertiary border-secondary h-100">
                    <div class="card-header border-secondary">
                        <h5 class="mb-0">Kenapa ForeCry?</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled m-0">
                            <li class="mb-3"><span class="text-success">●</span> LSTM untuk pola deret waktu</li>
                            <li class="mb-3"><span class="text-success">●</span> FinBERT untuk sentimen finansial</li>
                            <li class="mb-3"><span class="text-success">●</span> Integrasi data Binance & berita</li>
                            <li class="mb-0"><span class="text-success">●</span> Ekspor hasil (CSV/XLSX)</li>
                        </ul>
                    </div>
                    <div class="card-footer text-white-50 small">*Fitur demo — sesuaikan dengan modulmu.</div>
                </div>
            </div>
        </div>
    </main>
    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://widgets.tradingview-widget.com/w/id/tv-mini-chart.js"></script>
@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif
</body>

</html>

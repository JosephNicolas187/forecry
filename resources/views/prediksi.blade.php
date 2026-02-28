<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>.LOGO • Prediksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://s3.tradingview.com/tv.js"></script>
</head>

<body class="bg-dark text-white" data-bs-theme="dark">
    <x-navbar></x-navbar>

    <main class="container-xxl py-4">
        <div class="chart-box mb-4 position-relative">
            <div style="height:420px">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container" style="height:100%;width:100%">
                    <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%"></div>
                    {{-- <div class="tradingview-widget-copyright"><a
                            href="https://www.tradingview.com/symbols/BTCUSD/?exchange=BITSTAMP" rel="noopener nofollow"
                            target="_blank"><span class="blue-text">Bitcoin price</span></a><span class="trademark"> by
                            TradingView</span></div> --}}
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                        {
                            "allow_symbol_change": true,
                            "calendar": false,
                            "details": false,
                            "hide_side_toolbar": false,
                            "hide_top_toolbar": false,
                            "hide_legend": false,
                            "hide_volume": false,
                            "hotlist": false,
                            "interval": "D",
                            "locale": "en",
                            "save_image": true,
                            "style": "1",
                            "symbol": "BITSTAMP:BTCUSD",
                            "theme": "dark",
                            "timezone": "Etc/UTC",
                            "backgroundColor": "#0F0F0F",
                            "gridColor": "rgba(242, 242, 242, 0.06)",
                            "watchlist": [],
                            "withdateranges": false,
                            "compareSymbols": [],
                            "studies": [],
                            "autosize": true
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
        </div>



        <!-- 3 KARTU DI BAWAH -->
        <div class="row g-3">

            <!-- Kartu Aksi (kiri) -->
            <div class="col-12 col-lg-3">
                <div class="card bg-body-tertiary border-secondary h-100">
                    <div class="card-body">

                        <!-- Waktu -->
                        <div class="mb-3 pb-2 border-bottom border-secondary">

                            <div class="fw-bold h5">UTC</div>
                            <div id="utcTime" style="color: #3fb161d2" class="fw-bold h3"></div>

                        </div>
                        <div class="mb-3 pb-2 border-bottom border-secondary">

                            <div class="fw-bold h5">WIB</div>
                            <div id="wibTime" style="color: #bbdaa7" class="fw-bold h3"></div>

                        </div>

                        <h6 class="text-uppercase text-white-50 mb-2">Catatan :</h6>
                        <ul class="small text-white-50 mb-0 ps-3">
                            <li>Prediksi menggunakan LSTM-FinBERT.</li>
                            <li>Sentimen berasal dari berita kripto.</li>
                            <li>Rentang waktu dapat diubah pada toolbar.</li>
                            <li>Hasil prediksi bukan ajakan/penasihatan investasi.</li>
                        </ul>
                    </div>
                </div>
            </div>



            <!-- Kartu Prediksi Harga (tengah) -->
            <div class="col-12 col-lg-3">
                <div class="card bg-body-tertiary border-secondary h-100">
                    <div class="card-header border-secondary">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title mb-0">Prediksi Harga</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('prediksi.predict') }}" id="predictForm">
                            @csrf

                            <!-- Interval -->
                            <div class="mb-3">
                                <label class="form-label small text-white-50">Interval</label>
                                <select name="interval"
                                    class="form-select form-select-sm bg-dark text-white border-secondary">
                                    <option value="30min">30 Menit</option>
                                    <option value="1h">1 Jam</option>
                                    <option value="4h">4 Jam</option>
                                    <option value="12h">12 Jam</option>
                                </select>
                            </div>

                            {{-- <!-- Lookback -->
                            <div class="mb-3">
                                <label class="form-label small text-white-50">Lookback Window</label>
                                <input type="number" name="lookback" value="60"
                                    class="form-control form-control-sm bg-dark text-white border-secondary">
                            </div> --}}

                            <!-- Tombol -->
                            <div class="d-grid">
                                @auth
                                    <!-- Jika sudah login -->
                                    <button type="submit" name="mode" value="prev" class="btn btn-outline-light mb-2">
                                        Prediksi Harga Sebelumnya
                                    </button>
                                    <button type="submit" name="mode" value="next" class="btn btn-success btn-sm">
                                        Prediksi Harga
                                    </button>
                                @endauth

                                @guest
                                    <!-- Jika belum login -->
                                    <a href="{{ route('login') }}" class="btn btn-success btn-sm">
                                        Prediksi Harga
                                    </a>
                                @endguest
                            </div>
                        </form>

                        <!-- Loader -->
                        <div id="predictLoader" class="text-center my-3 d-none pt-4">
                            <div class="spinner-border text-light" role="status"></div>
                            <div class="small text-white-50 mt-2">Menghitung prediksi...</div>
                        </div>

                        <!-- Hasil Prediksi -->
                        <div class="pt-3" id="predictResult"></div>
                    </div>
                </div>
            </div>

            <!-- Kartu Analisis Sentimen (kanan) -->
            <div class="col-12 col-lg-6">
                <div class="card bg-body-tertiary border-secondary h-100">
                    <div class="card-header border-secondary">
                        <h5 class="card-title mb-0">Analisis Sentimen Berita Terbaru</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive" style="max-height: 360px;">
                            <table class="table table-dark table-hover align-middle mb-0">
                                <thead>
                                    <tr class="text-white-50">
                                        <th style="width: 22%;">Waktu</th>
                                        <th>Berita</th>
                                        <th>Label</th>
                                        <th class="text-end" style="width: 20%;">Sent Skor</th>
                                    </tr>
                                </thead>
                                <tbody class="small">
                                    @foreach ($news as $item)
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">
                                                    {{ $item->published_at_utc->setTimezone('Asia/Jakarta')->format('Y M d') }}
                                                </div>
                                                <div class="text-white-50 small">
                                                    {{ $item->published_at_utc->setTimezone('Asia/Jakarta')->format('H:i:s') }}
                                                    WIB
                                                </div>
                                            </td>

                                            <td>
                                                <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer"
                                                    class="text-white text-decoration-none link-primary">

                                                    {{ $item->title_short }}
                                                </a>
                                            </td>

                                            <td class="text-center">
                                                @if ($item->sentiment_label === 'positive')
                                                    <span class="badge bg-success">Positive</span>
                                                @elseif ($item->sentiment_label === 'negative')
                                                    <span class="badge bg-danger">Negative</span>
                                                @else
                                                    <span class="badge bg-secondary">Neutral</span>
                                                @endif
                                            </td>

                                            <td class="text-end">
                                                {{ number_format($item->sentiment_score, 6) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <span class="small text-white-50">Sumber: agregasi berita kripto</span>
                        <a href="{{ route('berita.index') }}" class="btn btn-sm btn-outline-light">Lihat semua</a>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <x-footer />

    <script>
        function updateTimes() {
            const now = new Date();

            // UTC
            const utcString = now.toISOString().replace("T", " ").substring(0, 19);

            // WIB = UTC + 7
            const wibDate = new Date(now.getTime() + 7 * 60 * 60 * 1000);
            const wibString = wibDate.toISOString().replace("T", " ").substring(0, 19);

            document.getElementById("utcTime").textContent = utcString;
            document.getElementById("wibTime").textContent = wibString;
        }

        updateTimes();
        setInterval(updateTimes, 1000);
    </script>
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            new TradingView.widget({
                container_id: "tvChart",
                width: "100%",
                height: 420,
                symbol: "BINANCE:BTCUSDT",
                interval: "60",
                theme: "dark",
            });
        });
    </script> --}}

    <script>
        let clickedButton = null;

        // Tangkap tombol mana yang diklik
        document.querySelectorAll('#predictForm button[type="submit"]').forEach(btn => {
            btn.addEventListener("click", function() {
                clickedButton = this;
            });
        });

        document.getElementById("predictForm").addEventListener("submit", async function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            // 🔥 INI YANG PENTING
            if (clickedButton) {
                formData.set("mode", clickedButton.value);
            }

            document.getElementById("predictLoader").classList.remove("d-none");
            document.getElementById("predictResult").innerHTML = "";

            try {
                const response = await fetch(form.action, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": form.querySelector('input[name="_token"]').value
                    },
                    body: formData
                });

                const data = await response.json();

                document.getElementById("predictLoader").classList.add("d-none");

                let icon = "■",
                    label = "Stabil",
                    color = "text-secondary";

                if (data.predicted_close > data.last_close) {
                    icon = "▲";
                    label = "Naik";
                    color = "text-success";
                } else if (data.predicted_close < data.last_close) {
                    icon = "▼";
                    label = "Turun";
                    color = "text-danger";
                }

                document.getElementById("predictResult").innerHTML = `
                <hr class="border-secondary">
                <div class="text-center">
                    <div class="small text-white-50">
                        Mode: ${clickedButton.value}
                    </div>
                    <div class="small text-white-50">
                        ${data.predicted_time} UTC
                    </div>
                    <div class="fs-4 fw-bold ${color}">
                        ${Number(data.predicted_close).toFixed(2)}
                    </div>
                    <div class="small ${color}">
                        ${icon} ${label}
                    </div>
                    <div class="small text-white-50">
                        Last Close: ${Number(data.last_close).toFixed(2)}
                    </div>
                </div>
            `;

            } catch (err) {
                document.getElementById("predictLoader").classList.add("d-none");
                document.getElementById("predictResult").innerHTML = `
                <hr class="border-secondary">
                <div class="alert alert-danger small mb-0">
                    Error saat memprediksi!
                </div>
            `;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

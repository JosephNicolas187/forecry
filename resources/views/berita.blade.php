<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita • .LOGO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white" data-bs-theme="dark">
    <x-navbar></x-navbar>

    <main class="container-xxl p-4">

        <form method="GET" action="{{ route('berita.index') }}">
            <div class="row">

                <!-- SEARCH -->
                <section class="col-12 bg-body-tertiary border border-secondary rounded-3 p-3 mb-3">
                    <div class="row g-2 align-items-center">
                        <div class="col-12 col-md-10">
                            <input type="text" name="keyword" value="{{ request('keyword') }}"
                                class="form-control bg-body-tertiary border-secondary text-white"
                                placeholder="Cari berita">
                        </div>

                        <div class="col-12 col-md-2 d-flex gap-2">
                            <button class="btn btn-primary flex-fill">Cari</button>
                            <a href="{{ route('berita.index') }}" class="btn btn-outline-light flex-fill">Reset</a>
                        </div>
                    </div>
                </section>

                <div class="row g-0">
                    <!-- SIDEBAR -->
                    <aside class="col-12 col-lg-3 pe-lg-3">
                        <div class="card bg-body-tertiary border-secondary ">
                            <div class="card-header border-secondary">
                                <h5 class="mb-0">Filter</h5>
                            </div>

                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="small text-white-50">Rentang Tanggal</label>
                                    <input type="date" name="start_date" value="{{ request('start_date') }}"
                                        class="form-control bg-body-tertiary border-secondary text-white mb-2">

                                    <input type="date" name="end_date" value="{{ request('end_date') }}"
                                        class="form-control bg-body-tertiary border-secondary text-white">
                                </div>

                                <div class="mb-3">
                                    <label class="small text-white-50">Sumber</label>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach (['CoinDesk', 'Cointelegraph', 'The Block', 'Bitcoin Magazine', 'NewsBTC'] as $src)
                                            <label class="badge border border-secondary">
                                                <input type="checkbox" name="source[]" value="{{ $src }}"
                                                    @checked(in_array($src, request('source', [])))>
                                                {{ $src }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <button class="btn btn-success w-100">Terapkan Filter</button>
                            </div>
                        </div>
                    </aside>

                    <section class="col-12 col-lg-9 p-0">
                        <div class="card bg-body-tertiary border-secondary">
                            <div class="card-header border-secondary">
                                <h5 class="mb-0">Berita Terkini</h5>
                            </div>

                            <div class="list-group list-group-flush" style="max-height: 65vh; overflow-y: auto;">
                                @forelse ($news as $item)
                                    <div class="list-group-item list-group-item-dark bg-body-tertiary text-white">

                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">
                                                <a href="{{ $item->link }}" target="_blank"
                                                    class="text-white text-decoration-none link-primary">
                                                    {{ \Illuminate\Support\Str::limit($item->title_raw, 80) }}
                                                </a>
                                            </h6>

                                            <small class="text-white-50 text-end">
                                                {{ \Carbon\Carbon::parse($item->published_at_utc)->timezone('Asia/Jakarta')->format('Y M d') }}
                                                {{ \Carbon\Carbon::parse($item->published_at_utc)->timezone('Asia/Jakarta')->format('H:i:s') }}
                                                WIB
                                            </small>
                                        </div>

                                        <p class="small mb-1 text-white-75">
                                            {{ $item->source }}
                                        </p>

                                        @if ($item->sentiment_label === 'positive')
                                            <span class="badge bg-success">Positive</span>
                                        @elseif ($item->sentiment_label === 'negative')
                                            <span class="badge bg-danger">Negative</span>
                                        @else
                                            <span class="badge bg-secondary">Neutral</span>
                                        @endif
                                    </div>
                                @empty
                                    <div class="p-3 text-white-50 text-center">
                                        Tidak ada berita ditemukan.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </section>
                </div>

            </div>

        </form>


    </main>
    <x-footer></x-footer>
    <!-- Optional: Bootstrap Icons (untuk ikon search) -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

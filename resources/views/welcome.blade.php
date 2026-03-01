<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forecry - LSTM FinBERT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

    <!-- Section full height, center content -->
    <section class="position-relative overflow-hidden min-vh-100 d-flex align-items-center">
        <div class="container text-center position-relative z-3">
            <img src="{{ asset('images/logo.png') }}" alt="ForeCry Logo" class="img-fluid"
                style="width: clamp(120px, 25vw, 280px); height: auto;">
            <p class="mt-0 text-white-50">
                ForeCry adalah sebuah sistem dengan implementasi <span class="fw-semibold">LSTM-FinBERT</span><br>
                untuk memprediksi harga masa depan.
            </p>
            <a href="{{ route('beranda') }}" class="btn btn-outline-light px-4 mt-3">Coba</a>
        </div>


    </section>

    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

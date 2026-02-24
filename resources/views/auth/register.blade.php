<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Register | ForeCry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #1f2428;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            background: #2a2f34;
            border: 1px solid #3a3f45;
            border-radius: 12px;
        }

        .form-control {
            background: #1f2428;
            border: 1px solid #3a3f45;
            color: #fff;
        }

        .form-control:focus {
            background: #1f2428;
            color: #fff;
            border-color: #198754;
            box-shadow: none;
        }
    </style>
</head>

<body>

    <div class="col-md-4">
        <div class="card auth-card p-4 text-light">
            <h3 class="text-center h1 mb-3">
                <span class="text-success">Fore</span>Cry
            </h3>
            <p class="text-center text-secondary h5 mb-3">
                Buat akun baru
            </p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror">

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation"
                        class="form-control @error('password') is-invalid @enderror">
                </div>


                <button type="submit" class="btn btn-success w-100">
                    Daftar
                </button>

                <p class="text-center mt-3 text-secondary">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-success text-decoration-none">
                        Login
                    </a>
                </p>
            </form>
        </div>
    </div>
@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif
</body>

</html>

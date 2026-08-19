<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Chendora Café</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fffaf6;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        .card-header {
            background-color: #5a3d2b;
            color: #fff;
            font-weight: 600;
            text-align: center;
            font-size: 20px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .btn-primary {
            background-color: #5a3d2b;
            border: none;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #7b4e38;
        }
        .form-control:focus {
            border-color: #b97a57;
            box-shadow: 0 0 5px rgba(185, 122, 87, 0.5);
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Login ke Chendora Café
                </div>
                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        
                        <!-- Username (sudah diganti dari email) -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input id="username" type="text" name="username"
                                   class="form-control @error('username') is-invalid @enderror"
                                   value="{{ old('username') }}" required autofocus placeholder="Masukkan username kamu">

                            @error('username')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   required placeholder="Masukkan password">
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Ingat saya</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none text-secondary">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
                    </form>

                    <div class="text-center mt-3">
                        <p class="text-muted small">Belum punya akun?
                            <a href="{{ route('register') }}" class="text-decoration-none" style="color: #5a3d2b;">Daftar di sini</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

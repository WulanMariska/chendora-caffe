<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chendora Café - @yield('title', 'Dashboard')</title>

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- ✅ Custom CSS -->
    <style>
        body {
            background-color: #fffaf6;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #5a3d2b;
        }
        .navbar-brand {
            color: #f7d9aa !important;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .navbar-nav .nav-link {
            color: #f8ede3 !important;
            margin-right: 18px;
            font-weight: 500;
            transition: 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: #ffdd99 !important;
        }
        .dropdown-item:hover {
            background-color: #ffeccc;
        }
        footer {
            background-color: #5a3d2b;
            color: white;
            text-align: center;
            padding: 12px 0;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <!-- 🌸 Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('product.index') }}">🍨 Chendora Café</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.index') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('resep') }}">Resep</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>

                    {{-- 🌟 Hanya tampil untuk admin --}}
                    @auth
                        @if(auth()->user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
                            </li>
                        @endif
                    @endauth

                    {{-- 👤 Info User dan Logout --}}
                    @auth
                        <li class="nav-item ms-3">
                            <span class="text-white fw-semibold">
                                👤 {{ Auth::user()->name }}
                            </span>
                        </li>
                        <li class="nav-item ms-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-light ms-2">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- 🌿 Konten halaman -->
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- 🌺 Footer -->
    <footer>
        <p>© 2025 Chendora Café — Cita Rasa Tradisional dengan Sentuhan Modern</p>
    </footer>

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

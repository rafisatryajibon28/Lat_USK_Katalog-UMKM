<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Katalog UMKM SMK')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --navy: #1e3a5f;
            --navy-dark: #152c4a;
            --navy-soft: #e8eef5;
            --bg: #f7f8f9;
            --border: #e5e7eb;
            --text: #1f2937;
            --muted: #6b7280;
        }
        body { background: var(--bg); color: var(--text); }
        a { color: var(--navy); text-decoration: none; }
        a:hover { color: var(--navy-dark); }

        .navbar {
            background: #fff;
            border-bottom: 1px solid var(--border);
        }
        .navbar-brand { color: var(--navy) !important; font-weight: 700; }
        .nav-link { color: var(--muted) !important; font-weight: 500; }
        .nav-link:hover, .nav-link.active { color: var(--navy) !important; }

        .btn-primary {
            background: var(--navy); border-color: var(--navy); font-weight: 500;
        }
        .btn-primary:hover { background: var(--navy-dark); border-color: var(--navy-dark); }
        .btn-outline-primary {
            color: var(--navy); border-color: var(--navy);
        }
        .btn-outline-primary:hover { background: var(--navy); color: #fff; border-color: var(--navy); }

        .card {
            border: 1px solid var(--border);
            border-radius: 8px;
            box-shadow: none;
            background: #fff;
        }
        .price { color: var(--navy); font-weight: 700; }
        .badge-soft {
            background: var(--navy-soft); color: var(--navy);
            font-weight: 500; border-radius: 4px;
        }
        .img-box {
            height: 150px; background: var(--navy-soft);
            display: flex; align-items: center; justify-content: center;
            color: var(--navy); font-size: 1.8rem; opacity: 0.45;
        }
        .filter-btn {
            display: inline-block;
            padding: 4px 12px; margin: 2px;
            border: 1px solid var(--border); border-radius: 4px;
            background: #fff; color: var(--muted);
            font-size: 0.85rem; text-decoration: none;
        }
        .filter-btn:hover, .filter-btn.active {
            background: var(--navy); color: #fff; border-color: var(--navy);
        }
        .form-control:focus {
            border-color: var(--navy); box-shadow: 0 0 0 2px rgba(30,58,95,0.15);
        }
        footer {
            background: #fff; border-top: 1px solid var(--border);
            color: var(--muted); font-size: 0.9rem;
        }
        .page-title { color: var(--text); font-weight: 700; }
        .table th { background: var(--navy-soft); color: var(--navy); font-weight: 600; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Katalog UMKM SMK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('katalog') || request()->routeIs('detail') ? 'active' : '' }}" href="{{ route('katalog') }}">Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}" href="{{ route('admin.index') }}">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>

    <footer class="py-3 mt-4">
        <div class="container text-center">
            &copy; {{ date('Y') }} Katalog UMKM Siswa SMK
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
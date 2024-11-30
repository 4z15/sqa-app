<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CRUD Mahasiswa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #e0e5ec;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .navbar-custom {
            background: #e0e5ec;
            border-radius: 12px;
            box-shadow: 6px 6px 12px #babecc, -6px -6px 12px #ffffff;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #333;
        }

        .container {
            margin-top: 20px;
        }

        .neumorphic {
            background: #e0e5ec;
            border-radius: 12px;
            box-shadow: 6px 6px 12px #babecc, -6px -6px 12px #ffffff;
            padding: 20px;
        }

        .neumorphic:hover {
            box-shadow: inset 6px 6px 12px #babecc, inset -6px -6px 12px #ffffff;
        }

        .btn-neumorphic {
            background: #e0e5ec;
            border: none;
            border-radius: 12px;
            box-shadow: 6px 6px 12px #babecc, -6px -6px 12px #ffffff;
            color: #333;
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-neumorphic:hover {
            box-shadow: inset 6px 6px 12px #babecc, inset -6px -6px 12px #ffffff;
        }

        footer {
            margin-top: 50px;
            background: #e0e5ec;
            border-radius: 12px;
            box-shadow: 6px 6px 12px #babecc, -6px -6px 12px #ffffff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom mb-4 p-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('mahasiswa.index') }}">CRUD Mahasiswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mahasiswa.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="neumorphic">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} CRUD Mahasiswa. All Rights Reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

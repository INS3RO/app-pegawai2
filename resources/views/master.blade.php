<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>
    {{-- CDN Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">App Pegawai</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('employees*') ? 'active' : '' }}" href="{{ route('employees.index') }}">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('departments*') ? 'active' : '' }}" href="{{ route('departments.index') }}">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('positions*') ? 'active' : '' }}" href="{{ route('positions.index') }}">Positions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('attendance*') ? 'active' : '' }}" href="{{ route('attendance.index') }}">Absensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('salaries*') ? 'active' : '' }}" href="{{ route('salaries.index') }}">Gaji</a>
                    </li>
                     {{----}}
                </ul>
            </div>
        </div>
    </nav>

    {{-- Konten Utama --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="text-center py-4 text-muted border-top mt-5">
        &copy; {{ date('Y') }} Aplikasi Kepegawaian - Framework Programming
    </footer>

    {{-- CDN Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
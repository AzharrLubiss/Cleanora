<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Cleanora Laundry - Premium Laundry Service')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link href="{{ asset('assets/css/pelanggan.css') }}" rel="stylesheet">
    <!-- CDN Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top custom-navbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                <div class="brand-icon">
                    <i class="bi bi-droplet-fill"></i>
                </div>
                <span class="brand-text">Cleanora<span class="text-primary-gradient">.</span></span>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('layanan') }}" class="nav-link {{ request()->routeIs('layanan') ? 'active' : '' }}">
                            Layanan
                        </a>
                    </li>
                    @auth

                    <li class="nav-item">
                        <a
                            href="{{ route('dashboard') }}"
                            class="nav-link"
                        >
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                type="submit"
                                class="btn btn-link nav-link"
                            >
                                Logout
                            </button>
                        </form>
                    </li>

                    @else

                    <li class="nav-item">
                        <a
                            href="{{ route('login') }}"
                            class="nav-link"
                        >
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="{{ route('register') }}"
                            class="nav-link"
                        >
                            Register
                        </a>
                    </li>

                    @endif
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a href="{{ auth()->check() ? route('pesanan.create') : route('login') }}" class="btn btn-primary-custom shadow-sm">
                            <i class="bi bi-bag-check me-1"></i> Pesan Laundry
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-wrapper">
        @yield('content')
    </main>

    <footer class="footer-section">
        <div class="container">
            <div class="row g-4 justify-content-between align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="footer-brand mb-3">
                        <i class="bi bi-droplet-fill me-2 text-primary-gradient"></i>Cleanora Laundry
                    </div>
                    <p class="footer-desc">
                        Layanan laundry premium dengan penanganan profesional, cepat, higienis, dan terpercaya untuk pakaian kesayangan Anda.
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 text-md-end">
                    <ul class="list-unstyled contact-list mb-0">
                        <li class="mb-2">
                            <i class="bi bi-whatsapp text-success me-2"></i>
                            <a href="https://wa.me/6281234567890" target="_blank" class="text-decoration-none text-light">0812-3456-7890</a>
                        </li>
                        <li>
                            <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                            <span>Metro, Lampung</span>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="text-center footer-copy">
                <small>&copy; {{ date('Y') }} Cleanora Laundry. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>
    <script src="{{ asset('assets/js/pelanggan.js') }}"></script>
</body>

</html>
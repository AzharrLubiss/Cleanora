@extends('layouts.pelanggan')

@section('title', 'Beranda - Cleanora Laundry')

@section('content')

{{-- ==========================================
     HERO SECTION
   ========================================== --}}
<section class="hero-section position-relative py-5 overflow-hidden">
    <div class="container py-lg-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="hero-content">
                    <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2 rounded-pill mb-3">
                        <i class="bi bi-shield-check me-1"></i> Layanan Laundry Profesional
                    </span>

                    <h1 class="display-4 fw-bold text-dark lh-sm mb-3">
                        Pakaian Clean & Fresh <br>
                        <span class="text-primary-gradient">Tanpa Repot.</span>
                    </h1>

                    <p class="lead text-secondary mb-4 fs-6">
                        Cleanora Laundry memberikan perawatan terbaik untuk pakaian kesayangan Anda. Proses higienis, ramah kain, dan tepat waktu.
                    </p>

                    <div class="d-flex flex-wrap gap-3 align-items-center">
                        <a href="#" class="btn btn-primary-custom shadow-sm">
                            <i class="bi bi-basket2 me-2"></i> Pesan Laundry
                        </a>

                        <a href="{{ route('layanan') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-semibold">
                            Lihat Layanan <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>

                    <div class="d-flex gap-4 mt-4 pt-3 border-top">
                        <div>
                            <h5 class="fw-bold mb-0 text-dark">100%</h5>
                            <small class="text-muted">Higienis</small>
                        </div>
                        <div class="border-end"></div>
                        <div>
                            <h5 class="fw-bold mb-0 text-dark">Express</h5>
                            <small class="text-muted">Layanan Cepat</small>
                        </div>
                        <div class="border-end"></div>
                        <div>
                            <h5 class="fw-bold mb-0 text-dark">4.9/5</h5>
                            <small class="text-muted">Rating Pelanggan</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 text-center">
                <div class="hero-image-wrapper position-relative">
                    <div class="hero-blob"></div>
                    <img src="https://images.unsplash.com/photo-1517677208171-0bc6725a3e60?auto=format&fit=crop&q=80&w=800"
                        alt="Cleanora Laundry Service"
                        class="img-fluid rounded-4 shadow-lg position-relative hero-img"
                        style="max-height: 420px; object-fit: cover; width: 100%;">
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ==========================================
     KENAPA MEMILIH KAMI
   ========================================== --}}
<section class="py-5 bg-white">
    <div class="container py-lg-4">
        <div class="text-center max-w-600 mx-auto mb-5">
            <span class="text-primary fw-bold text-uppercase tracking-wider small">Keunggulan Kami</span>
            <h2 class="fw-bold text-dark mt-1">Mengapa Memilih Cleanora?</h2>
            <p class="text-muted">Kami menjamin setiap pakaian Anda ditangani dengan standar kebersihan dan kehati-hatian tertinggi.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm p-3 feature-card">
                    <div class="card-body">
                        <div class="icon-shape bg-primary-subtle text-primary rounded-3 mb-3">
                            <i class="bi bi-lightning-charge-fill fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Proses Tepat Waktu</h5>
                        <p class="text-muted small mb-0">Selesai sesuai estimasi, tanpa pengerjaan yang tertunda.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm p-3 feature-card">
                    <div class="card-body">
                        <div class="icon-shape bg-success-subtle text-success rounded-3 mb-3">
                            <i class="bi bi-wallet2 fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Harga Transparan</h5>
                        <p class="text-muted small mb-0">Tarif bersahabat dan jelas, tanpa biaya tersembunyi.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm p-3 feature-card">
                    <div class="card-body">
                        <div class="icon-shape bg-warning-subtle text-warning rounded-3 mb-3">
                            <i class="bi bi-sparkles fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Bersih & Harum</h5>
                        <p class="text-muted small mb-0">Menggunakan deterjen premium dan pewangi tahan lama.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm p-3 feature-card">
                    <div class="card-body">
                        <div class="icon-shape bg-danger-subtle text-danger rounded-3 mb-3">
                            <i class="bi bi-truck fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Layanan Antar Jemput</h5>
                        <p class="text-muted small mb-0">Tinggal santai di rumah, kurir kami yang akan menjemput.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ==========================================
     LAYANAN UNGGULAN
   ========================================== --}}
<section class="py-5 bg-light position-relative">
    <div class="container py-lg-4">
        <div class="text-center max-w-600 mx-auto mb-5">
            <span class="text-primary fw-bold text-uppercase tracking-wider small">Pilihan Paket</span>
            <h2 class="fw-bold text-dark mt-1">Layanan Unggulan</h2>
            <p class="text-muted">Pilih jenis paket layanan yang sesuai dengan kebutuhan pakaian Anda.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($layanans as $layanan)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm service-card overflow-hidden">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                                Paket Laundry
                            </span>
                            <small class="text-muted">
                                <i class="bi bi-clock me-1"></i>{{ $layanan->estimasi_waktu }}
                            </small>
                        </div>

                        <h4 class="fw-bold mb-2">{{ $layanan->nama }}</h4>
                        <p class="text-muted small mb-4 flex-grow-1">{{ $layanan->deskripsi }}</p>

                        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small d-block">Mulai dari</span>
                                <h4 class="fw-bold text-primary mb-0">
                                    Rp {{ number_format($layanan->harga_per_kg, 0, ',', '.') }}
                                    <small class="fs-6 text-muted fw-normal">/Kg</small>
                                </h4>
                            </div>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle p-2">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">
                <p>Belum ada layanan yang tersedia saat ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>


{{-- ==========================================
     CARA KERJA
   ========================================== --}}
<section class="py-5 bg-white">
    <div class="container py-lg-4">
        <div class="text-center max-w-600 mx-auto mb-5">
            <span class="text-primary fw-bold text-uppercase tracking-wider small">Proses Praktis</span>
            <h2 class="fw-bold text-dark mt-1">Cara Kerja Mudah</h2>
            <p class="text-muted">Hanya perlu 3 langkah mudah untuk menikmati pakaian bersih dan wangi.</p>
        </div>

        <div class="row g-4 text-center position-relative">
            <div class="col-md-4">
                <div class="step-card p-4">
                    <div class="step-number bg-primary text-white mx-auto mb-3 shadow">1</div>
                    <h5 class="fw-bold mb-2">Buat Pesanan</h5>
                    <p class="text-muted small mb-0">Pilih layanan yang Anda butuhkan melalui website atau WhatsApp.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="step-card p-4">
                    <div class="step-number bg-primary text-white mx-auto mb-3 shadow">2</div>
                    <h5 class="fw-bold mb-2">Proses Pencucian</h5>
                    <p class="text-muted small mb-0">Tim profesional kami mencuci, mengeringkan, dan menyetrika pakaian Anda.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="step-card p-4">
                    <div class="step-number bg-primary text-white mx-auto mb-3 shadow">3</div>
                    <h5 class="fw-bold mb-2">Siap Diantar / Diambil</h5>
                    <p class="text-muted small mb-0">Pakaian bersih, wangi, dan rapi siap kembali ke tangan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ==========================================
     CTA BANNER
   ========================================== --}}
<section class="py-5">
    <div class="container">
        <div class="cta-banner rounded-4 p-5 text-center text-white position-relative overflow-hidden shadow-lg"
            style="background: linear-gradient(135deg, #0d6efd, #0284c7);">
            <div class="position-relative z-1 max-w-600 mx-auto">
                <h2 class="fw-bold mb-3">Siap Merasakan Layanan Laundry Premium?</h2>
                <p class="mb-4 text-white-50">Percayakan pakaian Anda kepada kami. Nikmati hari Anda tanpa terbebani cucian menumpuk.</p>
                <a href="#" class="btn btn-light btn-lg rounded-pill px-5 fw-bold text-primary shadow-sm">
                    Pesan Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
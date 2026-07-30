@extends('layouts.pelanggan')

@section('title', 'Daftar Layanan - Cleanora Laundry')

@section('content')

{{-- ==========================================
     PAGE HEADER
   ========================================== --}}
<section class="position-relative py-5 text-white overflow-hidden"
    style="background: linear-gradient(135deg, #0d6efd, #0284c7);">
    <div class="container py-lg-4 text-center position-relative z-1">
        <span class="badge bg-white bg-opacity-20 text-white fw-semibold px-3 py-2 rounded-pill mb-3 backdrop-blur">
            <i class="bi bi-stars me-1"></i> Pilihan Terbaik Untuk Anda
        </span>
        <h1 class="fw-bold display-5 mb-2">Daftar Layanan Laundry</h1>
        <p class="lead text-white-50 max-w-600 mx-auto mb-0 fs-6">
            Pilih paket layanan berkualitas tinggi yang diproses secara higienis, profesional, dan tepat waktu.
        </p>
    </div>
</section>

{{-- ==========================================
     DAFTAR LAYANAN CARD
   ========================================== --}}
<section class="py-5 bg-light">
    <div class="container py-lg-3">
        <div class="row g-4 justify-content-center">

            @forelse ($layanans as $layanan)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm service-card rounded-4 overflow-hidden bg-white">
                    <div class="card-body p-4 d-flex flex-column">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2 rounded-pill">
                                Paket Laundry
                            </span>
                            <div class="icon-shape bg-primary-subtle text-primary rounded-circle">
                                <iconify-icon icon="mdi:washing-machine" width="28"></iconify-icon>
                            </div>
                        </div>

                        <h4 class="fw-bold text-dark mb-1">{{ $layanan->nama }}</h4>

                        <div class="d-flex align-items-baseline gap-1 my-3">
                            <h2 class="text-primary fw-bold mb-0">
                                Rp {{ number_format($layanan->harga_per_kg, 0, ',', '.') }}
                            </h2>
                            <span class="text-muted fw-medium fs-6">/ Kg</span>
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-3 px-3 py-2 bg-light rounded-3 text-secondary small">
                            <i class="bi bi-clock-history text-primary fs-6"></i>
                            <span>Estimasi pengerjaan: <strong>{{ $layanan->estimasi_waktu }}</strong></span>
                        </div>

                        <p class="text-muted small mb-4 flex-grow-1 line-clamp-3">
                            {{ $layanan->deskripsi }}
                        </p>

                        <div class="pt-3 border-top mt-auto">
                            @auth
                            <a href="#" class="btn btn-primary-custom w-100 shadow-sm text-center">
                                <i class="bi bi-cart-plus me-1"></i> Pesan Sekarang
                            </a>
                            @else
                            <a href="#" class="btn btn-outline-primary w-100 rounded-pill py-2 fw-semibold">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Login Untuk Memesan
                            </a>
                            @endauth
                        </div>

                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 text-center p-5 bg-white">
                    <div class="icon-shape bg-warning-subtle text-warning rounded-circle mx-auto mb-3" style="width: 70px; height: 70px;">
                        <i class="bi bi-exclamation-triangle fs-2"></i>
                    </div>
                    <h4 class="fw-bold text-dark">Belum Ada Layanan</h4>
                    <p class="text-muted mb-0">Saat ini belum ada paket layanan yang ditambahkan oleh admin.</p>
                </div>
            </div>
            @endforelse

        </div>
    </div>
</section>

@endsection
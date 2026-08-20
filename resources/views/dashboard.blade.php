@extends('layouts.pelanggan')

@section('title', 'Dashboard Pelanggan - Cleanora Laundry')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container py-lg-2">

        {{-- Welcome Banner Header --}}
        <div class="card border-0 shadow-sm rounded-4 bg-primary text-white mb-4 overflow-hidden position-relative"
             style="background: linear-gradient(135deg, #0d6efd, #0284c7);">
            <div class="card-body p-4 p-lg-5 position-relative z-1">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <span class="badge bg-white text-primary fw-semibold px-3 py-2 rounded-pill mb-3 shadow-sm">
                            Dashboard Pelanggan
                        </span>
                        <h2 class="fw-bold mb-2">Halo, {{ $user->name }}! 👋</h2>
                        <p class="mb-0 text-white-50">
                            Selamat datang kembali di Cleanora Laundry. Pantau status pesanan dan buat pesanan baru dengan mudah di sini.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('pesanan.create') }}" class="btn btn-light btn-lg rounded-pill px-4 fw-bold text-primary shadow-sm">
                            + Pesan Laundry Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Cards Statistik --}}
        <div class="row g-4 mb-4">

            {{-- Total Pesanan --}}
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small text-uppercase fw-bold tracking-wider">Total Pesanan</span>
                            <h2 class="fw-bold text-dark mt-2 mb-0">{{ $jumlahPesanan }}</h2>
                            <small class="text-muted">Riwayat transaksi Anda</small>
                        </div>
                        <div class="bg-primary-subtle text-primary p-3 rounded-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Status Pesanan Terbaru --}}
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small text-uppercase fw-bold tracking-wider">Status Terbaru</span>
                            <h5 class="fw-bold text-dark mt-2 mb-0">
                                @if($pesananTerbaru)
                                    @php
                                        $statusClass = match(strtolower($pesananTerbaru->status)) {
                                            'selesai' => 'bg-success-subtle text-success',
                                            'diproses', 'dicuci' => 'bg-warning-subtle text-warning',
                                            'dibatalkan' => 'bg-danger-subtle text-danger',
                                            default => 'bg-info-subtle text-info'
                                        };
                                    @endphp
                                    <span class="badge {{ $statusClass }} rounded-pill px-3 py-2 fs-6">
                                        {{ ucfirst($pesananTerbaru->status) }}
                                    </span>
                                @else
                                    <span class="text-muted fs-6 fw-normal">Belum Ada Pesanan</span>
                                @endif
                            </h5>
                            <small class="text-muted">Proses cucian terakhir</small>
                        </div>
                        <div class="bg-warning-subtle text-warning p-3 rounded-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.122.34zm1.728.901a7 7 0 0 0-.797-.555l.537-.844c.329.21.64.443.93.698zm1.819 1.301a7 7 0 0 0-.585-.758l.732-.682c.264.283.507.583.729.897zm1.18 1.637a7 7 0 0 0-.349-.884l.873-.489c.162.35.297.712.404 1.082zM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m8-5a.5.5 0 0 0-1 0v4.793l-2.146 2.147a.5.5 0 0 0 .708.708l2.5-2.5A.5.5 0 0 0 9 7.5z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Action / Pesan Sekarang (Sudah Dirapikan) --}}
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-3 bg-white">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <span class="text-muted small text-uppercase fw-bold tracking-wider">Layanan Cepat</span>
                            <div class="my-auto">
                                <h5 class="fw-bold text-dark mb-1">Cucian Menumpuk?</h5>
                                <a href="{{ route('pesanan.create') }}" class="text-primary fw-semibold text-decoration-none small d-inline-flex align-items-center">
                                    <span>Klik untuk order</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-right ms-1" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="bg-success-subtle text-success p-3 rounded-4 flex-shrink-0 ms-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Detail Pesanan Terbaru --}}
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white py-3 px-4 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0">Rincian Pesanan Terakhir</h5>
                <span class="badge bg-light text-muted fw-normal px-3 py-2 rounded-pill">Informasi Terupdate</span>
            </div>

            <div class="card-body p-4">
                @if($pesananTerbaru)
                    <div class="row g-3">
                        <div class="col-sm-6 col-md-3">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block mb-1">Kode Pesanan</small>
                                <span class="fw-bold text-primary fs-6">#{{ $pesananTerbaru->kode_pesanan }}</span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block mb-1">Paket Layanan</small>
                                <span class="fw-bold text-dark fs-6">{{ $pesananTerbaru->layanan->nama ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block mb-1">Berat / Jumlah</small>
                                <span class="fw-bold text-dark fs-6">{{ $pesananTerbaru->berat }} Kg</span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="p-3 bg-light rounded-3">
                                <small class="text-muted d-block mb-1">Total Tagihan</small>
                                <span class="fw-bold text-success fs-6">
                                    Rp {{ number_format($pesananTerbaru->total_harga, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-4">
                        <div class="mb-3 text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-inbox" viewBox="0 0 16 16">
                                <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a1 1 0 0 1 .228.626v3.31a2.5 2.5 0 0 1-2.5 2.5H2.5A2.5 2.5 0 0 1 0 12.125V8.814a1 1 0 0 1 .228-.626z"/>
                            </svg>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Belum Ada Pesanan</h6>
                        <p class="text-muted small mb-3">Anda belum membuat pesanan laundry apapun saat ini.</p>
                        <a href="{{ route('pesanan.create') }}" class="btn btn-primary btn-sm rounded-pill px-4">
                            Mulai Pesan Sekarang
                        </a>
                    </div>
                @endif
            </div>
        </div>

    </div>
</section>
@endsection
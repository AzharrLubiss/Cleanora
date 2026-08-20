@extends('layouts.pelanggan')

@section('title', 'Riwayat Pesanan - Cleanora')

@section('content')

<section class="py-5">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Riwayat Pesanan</h2>
                <p class="text-muted mb-0">
                    Semua pesanan laundry Anda.
                </p>
            </div>

            <a href="{{ route('pesanan.create') }}"
               class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                Pesan Laundry
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body">

                @forelse($pesanans as $pesanan)

                    <div class="border-bottom py-3">
                        <div class="row align-items-center g-3">

                            <div class="col-md-3">
                                <small class="text-muted">Kode Pesanan</small>
                                <div class="fw-bold">
                                    {{ $pesanan->kode_pesanan }}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <small class="text-muted">Layanan</small>
                                <div>
                                    {{ $pesanan->layanan->nama }}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <small class="text-muted">Berat</small>
                                <div>
                                    {{ $pesanan->berat }} Kg
                                </div>
                            </div>

                            <div class="col-md-2">
                                <small class="text-muted">Total</small>
                                <div class="fw-semibold">
                                    Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <small class="text-muted">Status</small>

                                <div>
                                    @php
                                        $statusClass = match($pesanan->status) {
                                            'menunggu' => 'bg-secondary',
                                            'dicuci' => 'bg-primary',
                                            'dikeringkan' => 'bg-info text-dark',
                                            'disetrika' => 'bg-warning text-dark',
                                            'siap_diambil' => 'bg-success',
                                            'selesai' => 'bg-dark',
                                            default => 'bg-secondary',
                                        };
                                    @endphp

                                    <span class="badge {{ $statusClass }}">
                                        {{ ucwords(str_replace('_', ' ', $pesanan->status)) }}
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-1 text-md-end">
                                <a
                                    href="{{ route('pesanan.show', $pesanan) }}"
                                    class="btn btn-sm btn-outline-primary"
                                >
                                    Detail
                                </a>
                            </div>

                        </div>
                    </div>

                @empty

                    <div class="text-center py-5">
                        <i class="bi bi-basket fs-1 text-muted"></i>

                        <h5 class="fw-bold mt-3">
                            Belum Ada Pesanan
                        </h5>

                        <p class="text-muted">
                            Anda belum memiliki pesanan laundry.
                        </p>

                        <a
                            href="{{ route('pesanan.create') }}"
                            class="btn btn-primary"
                        >
                            Pesan Sekarang
                        </a>
                    </div>

                @endforelse

            </div>
        </div>

        <div class="mt-4">
            {{ $pesanans->links() }}
        </div>

    </div>
</section>

@endsection
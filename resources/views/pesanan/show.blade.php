@extends('layouts.pelanggan')

@section('title', 'Detail Pesanan - Cleanora')

@section('content')

<section class="py-5">
    <div class="container" style="max-width: 900px;">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Detail Pesanan</h2>
                <p class="text-muted mb-0">
                    {{ $pesanan->kode_pesanan }}
                </p>
            </div>

            <a
                href="{{ route('pesanan.index') }}"
                class="btn btn-outline-secondary"
            >
                Kembali
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-4">

                <div class="row g-4">

                    <div class="col-md-6">
                        <small class="text-muted">Kode Pesanan</small>
                        <h5 class="fw-bold">
                            {{ $pesanan->kode_pesanan }}
                        </h5>
                    </div>

                    <div class="col-md-6">
                        <small class="text-muted">Tanggal Masuk</small>
                        <h5 class="fw-bold">
                            {{ \Carbon\Carbon::parse($pesanan->tanggal_masuk)->format('d M Y') }}
                        </h5>
                    </div>

                    <div class="col-md-6">
                        <small class="text-muted">Layanan</small>
                        <h5 class="fw-bold">
                            {{ $pesanan->layanan->nama }}
                        </h5>
                    </div>

                    <div class="col-md-6">
                        <small class="text-muted">Berat</small>
                        <h5 class="fw-bold">
                            {{ $pesanan->berat }} Kg
                        </h5>
                    </div>

                    <div class="col-md-6">
                        <small class="text-muted">Harga / Kg</small>
                        <h5 class="fw-bold">
                            Rp {{ number_format($pesanan->harga_per_kg, 0, ',', '.') }}
                        </h5>
                    </div>

                    <div class="col-md-6">
                        <small class="text-muted">Total Harga</small>
                        <h5 class="fw-bold text-primary">
                            Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                        </h5>
                    </div>

                </div>

            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-0 p-4">
                <h5 class="fw-bold mb-0">
                    Status Laundry
                </h5>
            </div>

            <div class="card-body p-4">

                @php
                    $statuses = [
                        'menunggu' => 'Pesanan Diterima',
                        'dicuci' => 'Sedang Dicuci',
                        'disetrika' => 'Sedang Disetrika',
                        'siap_diambil' => 'Siap Diambil',
                        'selesai' => 'Selesai',
                    ];

                    $keys = array_keys($statuses);
                    $currentIndex = array_search($pesanan->status, $keys);
                @endphp

                @foreach($statuses as $key => $label)

                    @php
                        $index = array_search($key, $keys);

                        if ($index < $currentIndex) {
                            $class = 'bg-success';
                            $icon = 'bi-check-lg';
                        } elseif ($index === $currentIndex) {
                            $class = 'bg-primary';
                            $icon = 'bi-arrow-right';
                        } else {
                            $class = 'bg-light text-secondary';
                            $icon = 'bi-circle';
                        }
                    @endphp

                    <div class="d-flex align-items-center mb-3">

                        <div
                            class="rounded-circle {{ $class }} d-flex align-items-center justify-content-center"
                            style="width: 42px; height: 42px;"
                        >
                            <i class="bi {{ $icon }}"></i>
                        </div>

                        <div class="ms-3">
                            <div class="fw-semibold">
                                {{ $label }}
                            </div>

                            @if($key === $pesanan->status)
                                <small class="text-primary">
                                    Status saat ini
                                </small>
                            @endif
                        </div>

                    </div>

                @endforeach

            </div>
        </div>

        @if($pesanan->catatan)
            <div class="alert alert-light border mt-4">
                <strong>Catatan:</strong><br>
                {{ $pesanan->catatan }}
            </div>
        @endif

    </div>
</section>

@endsection
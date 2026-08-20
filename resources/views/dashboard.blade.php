@extends('layouts.pelanggan')

@section('title', 'Dashboard')

@section('content')

<div class="container py-5">

    {{-- Header --}}
    <div class="mb-4">

        <h2 class="fw-bold">
            Halo, {{ $user->name }} 
        </h2>

        <p class="text-muted">
            Selamat datang di Dashboard Pelanggan Cleanora Laundry.
        </p>

    </div>

    {{-- Statistik --}}
    <div class="row g-4 mb-5">

        <div class="col-lg-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <i class="bi bi-bag-check-fill text-primary fs-1"></i>

                    <h5 class="mt-3">
                        Total Pesanan
                    </h5>

                    <h2 class="fw-bold">
                        {{ $jumlahPesanan }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <i class="bi bi-clock-history text-warning fs-1"></i>

                    <h5 class="mt-3">
                        Status Terbaru
                    </h5>

                    <h4 class="fw-bold">

                        {{ $pesananTerbaru->status ?? 'Belum Ada Pesanan' }}

                    </h4>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <i class="bi bi-plus-circle-fill text-success fs-1"></i>

                    <h5 class="mt-3">
                        Buat Pesanan
                    </h5>

                    <a href="{{ route('pesanan.create') }}"
                        class="btn btn-success mt-2">

                        Pesan Laundry

                    </a>

                </div>

            </div>

        </div>

    </div>

    {{-- Pesanan Terbaru --}}
    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">

                Pesanan Terbaru

            </h5>

        </div>

        <div class="card-body">

            @if($pesananTerbaru)

            <table class="table">

                <tr>
                    <th>Kode Pesanan</th>
                    <td>{{ $pesananTerbaru->kode_pesanan }}</td>
                </tr>

                <tr>
                    <th>Layanan</th>
                    <td>{{ $pesananTerbaru->layanan->nama }}</td>
                </tr>

                <tr>
                    <th>Berat</th>
                    <td>{{ $pesananTerbaru->berat }} Kg</td>
                </tr>

                <tr>
                    <th>Total Harga</th>
                    <td>
                        Rp {{ number_format($pesananTerbaru->total_harga,0,',','.') }}
                    </td>
                </tr>

                <tr>
                    <th>Status</th>

                    <td>

                        <span class="badge bg-primary">

                            {{ $pesananTerbaru->status }}

                        </span>

                    </td>

                </tr>

            </table>

            @else

            <div class="alert alert-info">

                Anda belum memiliki pesanan.

            </div>

            @endif

        </div>

    </div>

</div>

@endsection
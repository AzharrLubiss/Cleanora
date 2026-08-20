@extends('layouts.pelanggan')

@section('title', 'Pesan Laundry - Cleanora')

@section('content')

<section class="py-5">
    <div class="container" style="max-width: 850px;">

        <div class="mb-4">
            <h2 class="fw-bold">Pesan Laundry</h2>
            <p class="text-muted">
                Isi data berikut untuk membuat pesanan laundry.
            </p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">

                <form action="{{ route('pesanan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Pilih Layanan
                        </label>

                        <select
                            name="layanan_id"
                            id="layanan_id"
                            class="form-select"
                            required
                        >
                            <option value="">-- Pilih Layanan --</option>

                            @foreach($layanans as $layanan)
                                <option
                                    value="{{ $layanan->id }}"
                                    data-harga="{{ $layanan->harga_per_kg }}"
                                    {{ old('layanan_id') == $layanan->id ? 'selected' : '' }}
                                >
                                    {{ $layanan->nama }}
                                    - Rp {{ number_format($layanan->harga_per_kg, 0, ',', '.') }}/Kg
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Berat Laundry (Kg)
                        </label>

                        <input
                            type="number"
                            name="berat"
                            id="berat"
                            class="form-control"
                            min="1"
                            step="0.1"
                            value="{{ old('berat') }}"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Catatan
                        </label>

                        <textarea
                            name="catatan"
                            class="form-control"
                            rows="4"
                            placeholder="Contoh: Pisahkan pakaian putih..."
                        >{{ old('catatan') }}</textarea>
                    </div>

                    <div class="alert alert-primary">
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold">Perkiraan Total</span>
                            <strong id="totalHarga">Rp 0</strong>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <a
                            href="{{ route('dashboard') }}"
                            class="btn btn-outline-secondary"
                        >
                            Kembali
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary flex-grow-1"
                        >
                            <i class="bi bi-bag-check me-1"></i>
                            Buat Pesanan
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</section>

<script>
    const layanan = document.getElementById('layanan_id');
    const berat = document.getElementById('berat');
    const totalHarga = document.getElementById('totalHarga');

    function hitungTotal() {
        const selected = layanan.options[layanan.selectedIndex];
        const harga = Number(selected.dataset.harga || 0);
        const jumlahBerat = Number(berat.value || 0);

        const total = harga * jumlahBerat;

        totalHarga.textContent =
            'Rp ' + total.toLocaleString('id-ID');
    }

    layanan.addEventListener('change', hitungTotal);
    berat.addEventListener('input', hitungTotal);

    hitungTotal();
</script>

@endsection
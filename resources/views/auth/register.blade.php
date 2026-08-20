@extends('layouts.pelanggan')

@section('title', 'Daftar Akun - Cleanora Laundry')

@section('content')
<section class="py-5 bg-light min-vh-100 d-flex align-items-center">
    <div class="container py-lg-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-sm-5">
                        
                        <div class="text-center mb-4">
                            <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2 rounded-pill mb-2">
                                Registrasi Pelanggan
                            </span>
                            <h3 class="fw-bold text-dark mb-1">Buat Akun Baru</h3>
                            <p class="text-muted small">Nikmati kemudahan pesan laundry secara online</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold text-dark small">Nama Lengkap</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" 
                                    class="form-control bg-light rounded-3 @error('name') is-invalid @enderror" 
                                    placeholder="Masukkan nama lengkap" required autofocus autocomplete="name">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold text-dark small">Alamat Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                    class="form-control bg-light rounded-3 @error('email') is-invalid @enderror" 
                                    placeholder="nama@email.com" required autocomplete="username">
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nomor_whatsapp" class="form-label fw-semibold text-dark small">Nomor WhatsApp</label>
                                <input id="nomor_whatsapp" type="text" name="nomor_whatsapp" value="{{ old('nomor_whatsapp') }}" 
                                    class="form-control bg-light rounded-3 @error('nomor_whatsapp') is-invalid @enderror" 
                                    placeholder="6281234567890">
                                @error('nomor_whatsapp')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="password" class="form-label fw-semibold text-dark small">Kata Sandi</label>
                                    <input id="password" type="password" name="password" 
                                        class="form-control bg-light rounded-3 @error('password') is-invalid @enderror" 
                                        placeholder="••••••••" required autocomplete="new-password">
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="password_confirmation" class="form-label fw-semibold text-dark small">Konfirmasi Sandi</label>
                                    <input id="password_confirmation" type="password" name="password_confirmation" 
                                        class="form-control bg-light rounded-3 @error('password_confirmation') is-invalid @enderror" 
                                        placeholder="••••••••" required autocomplete="new-password">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 rounded-3 py-2.5 fw-bold shadow-sm mb-3">
                                Daftar Sekarang
                            </button>

                            <div class="text-center pt-3 border-top">
                                <p class="text-muted small mb-0">
                                    Sudah punya akun? 
                                    <a href="{{ route('login') }}" class="fw-bold text-primary text-decoration-none">Masuk di sini</a>
                                </p>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
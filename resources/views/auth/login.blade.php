@extends('layouts.pelanggan')

@section('title', 'Masuk - Cleanora Laundry')

@section('content')
<section class="py-5 bg-light min-vh-100 d-flex align-items-center">
    <div class="container py-lg-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5">
                
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show mb-4 rounded-3 shadow-sm" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-sm-5">
                        
                        <div class="text-center mb-4">
                            <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2 rounded-pill mb-2">
                                Area Pelanggan
                            </span>
                            <h3 class="fw-bold text-dark mb-1">Selamat Datang Kembali</h3>
                            <p class="text-muted small">Masuk untuk mengelola pesanan laundry Anda</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold text-dark small">Alamat Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                    class="form-control bg-light rounded-3 @error('email') is-invalid @enderror" 
                                    placeholder="nama@email.com" required autofocus autocomplete="username">
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold text-dark small">Kata Sandi</label>
                                <input id="password" type="password" name="password" 
                                    class="form-control bg-light rounded-3 @error('password') is-invalid @enderror" 
                                    placeholder="••••••••" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                    <label class="form-check-label small text-muted cursor-pointer" for="remember_me">
                                        Ingat Saya
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-none small fw-semibold text-primary">
                                        Lupa kata sandi?
                                    </a>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary w-100 rounded-3 py-2.5 fw-bold shadow-sm mb-3">
                                Masuk Sekarang
                            </button>

                            <div class="text-center pt-3 border-top">
                                <p class="text-muted small mb-0">
                                    Belum punya akun? 
                                    <a href="{{ route('register') }}" class="fw-bold text-primary text-decoration-none">Daftar Akun Baru</a>
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
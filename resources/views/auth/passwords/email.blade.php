@extends('layouts.app')

{{-- Menambahkan CSS kustom yang sama dengan halaman login --}}
@section('styles')
<style>
    .auth-bg {
        /* Ganti dengan URL gambar latar belakang Anda */
        background-image: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?q=80&w=1920');
        background-size: cover;
        background-position: center;
    }
    .card-reset {
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.85);
    }
</style>
@endsection

{{-- Pastikan menggunakan section 'auth' --}}
@section('auth')
<div class="col-md-8 col-lg-6 col-xxl-4 mx-auto auth-bg">
    <div class="card shadow-lg border-0 rounded-lg overflow-hidden card-reset">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <a href="/" class="d-block">
                    <img src="{{ asset('admin/assets/images/auth/LOGOSELO.png') }}" width="180" alt="Logo">
                </a>
            </div>

            <h4 class="text-center fw-bold mb-3">Lupa Password</h4>
            <p class="text-center text-muted mb-4">Masukkan email Anda dan kami akan mengirimkan link untuk mereset password Anda.</p>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Alamat Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary w-100 py-2 fs-5 rounded">
                        Kirim Link Reset Password
                    </button>
                </div>
            </form>

            <div class="text-center mt-4">
                <p class="mb-0">Ingat password Anda? <a href="{{ route('login') }}" class="text-primary fw-bold">Login di sini</a></p>
            </div>
        </div>
    </div>
</div>
@endsection

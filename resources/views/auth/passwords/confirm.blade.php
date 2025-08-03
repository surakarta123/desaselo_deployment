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
    .card-confirm {
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.85);
    }
</style>
@endsection

{{-- Pastikan menggunakan section 'auth' --}}
@section('auth')
<div class="col-md-8 col-lg-6 col-xxl-4 mx-auto auth-bg">
    <div class="card shadow-lg border-0 rounded-lg overflow-hidden card-confirm">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <a href="/" class="d-block">
                    <img src="{{ asset('admin/assets/images/auth/LOGOSELO.png') }}" width="180" alt="Logo">
                </a>
            </div>

            <h4 class="text-center fw-bold mb-3">Konfirmasi Password</h4>
            <p class="text-center text-muted mb-4">Untuk keamanan, silakan konfirmasi password Anda sebelum melanjutkan.</p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary w-100 py-2 fs-5 rounded">
                        Konfirmasi Password
                    </button>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-center mt-3">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Lupa Password Anda?
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection

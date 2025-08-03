@extends('layouts.app')

@section('styles')
<style>
    .auth-bg {
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

@section('auth')
<div class="col-md-8 col-lg-6 col-xxl-4 mx-auto auth-bg">
    <div class="card shadow-lg border-0 rounded-lg overflow-hidden card-reset">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <a href="/" class="d-block">
                    <img src="{{ asset('admin/assets/images/auth/LOGOSELO.png') }}" width="180" alt="Logo">
                </a>
            </div>

            <h4 class="text-center fw-bold mb-3">Buat Password Baru</h4>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Alamat Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password Baru</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="form-label fw-bold">Konfirmasi Password Baru</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary w-100 py-2 fs-5 rounded">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

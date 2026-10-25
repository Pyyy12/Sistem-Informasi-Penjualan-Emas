@extends('layouts.app')
@section('title', 'Masuk')
@section('content')
<div class="auth-section"><div class="auth-card"><div class="auth-mark"><i class="bi bi-gem"></i></div><span class="eyebrow">WELCOME BACK</span><h1 class="section-title mt-2">Masuk ke <span>Aurelia</span></h1><p class="text-secondary">Lanjutkan pengalaman belanja emas Anda.</p>
<form method="POST" action="{{ route('login.post') }}" class="mt-4">@csrf<div class="mb-3"><label class="form-label">Email</label><input class="form-control form-control-lg" type="email" name="email" value="{{ old('email') }}" required autofocus></div><div class="mb-3"><label class="form-label">Password</label><input class="form-control form-control-lg" type="password" name="password" required></div><div class="form-check mb-4"><input class="form-check-input" type="checkbox" name="remember" id="remember"><label for="remember" class="form-check-label">Ingat saya</label></div><button class="btn btn-gold btn-lg w-100">Masuk <i class="bi bi-arrow-right ms-2"></i></button></form><p class="text-center text-secondary mt-4 mb-0">Belum punya akun? <a class="text-gold" href="{{ route('register') }}">Daftar sekarang</a></p></div></div>
@endsection

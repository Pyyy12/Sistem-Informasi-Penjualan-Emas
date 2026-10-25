<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Aurelia Gold') — Aurelia Gold</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/aurelia.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark nav-gold sticky-top">
  <div class="container">
    <a class="navbar-brand brand-gold" href="{{ route('store.index') }}"><i class="bi bi-gem me-2"></i>AURELIA<span> GOLD</span></a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainNav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
        <li class="nav-item"><a class="nav-link" href="{{ route('store.index') }}">Beranda & Produk</a></li>
        @auth
          <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}"><i class="bi bi-bag me-1"></i>Keranjang</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Pesanan Saya</a></li>
          @if(auth()->user()->is_admin)<li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>@endif
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-outline-gold btn-sm">Keluar</button></form>
          </li>
        @else
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>
          <li class="nav-item"><a class="btn btn-gold btn-sm px-3" href="{{ route('register') }}">Daftar</a></li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
@if(session('success') || session('error') || $errors->any())
<div class="container mt-3">
  @if(session('success'))<div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button class="btn-close" data-bs-dismiss="alert"></button></div>@endif
  @if(session('error'))<div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}<button class="btn-close" data-bs-dismiss="alert"></button></div>@endif
  @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
</div>
@endif
<main>@yield('content')</main>
<footer class="footer-gold mt-5"><div class="container py-4 d-flex flex-column flex-md-row justify-content-between gap-2"><div><div class="brand-gold">AURELIA GOLD</div><small class="text-secondary">Keindahan bernilai, pilihan penuh makna.</small></div><small class="text-secondary">© {{ date('Y') }} Aurelia Gold. Harga pada demo ini dikelola admin.</small></div></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>

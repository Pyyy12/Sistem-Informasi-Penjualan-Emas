@extends('layouts.app')
@section('title', 'Koleksi Emas')
@section('content')
<section class="hero-gold">
  <div class="container py-5 py-lg-6">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <span class="eyebrow"><i class="bi bi-stars me-2"></i>TIMELESS VALUE, ELEGANT CHOICE</span>
        <h1 class="hero-title mt-3">Simpan nilai.<br><span>Kenakan keindahan.</span></h1>
        <p class="hero-copy mt-3">Temukan koleksi emas pilihan, dari emas batangan hingga perhiasan elegan untuk setiap momen berharga.</p>
        <a href="#koleksi" class="btn btn-gold btn-lg mt-3">Jelajahi Koleksi <i class="bi bi-arrow-right ms-2"></i></a>
        <div class="hero-trust mt-4"><span><i class="bi bi-patch-check"></i> Detail produk transparan</span><span><i class="bi bi-shield-check"></i> Transaksi tercatat</span></div>
      </div>
      <div class="col-lg-5"><div class="hero-image-wrap"><img src="https://images.unsplash.com/photo-1610375461246-83df859d849d?w=1200" alt="Emas batangan premium" class="hero-image"><div class="floating-note"><i class="bi bi-gem"></i><div><strong>Gold Collection</strong><small>Curated with care</small></div></div></div></div>
    </div>
  </div>
</section>
<section class="container py-5" id="koleksi">
  <div class="section-heading d-flex flex-column flex-lg-row justify-content-between gap-3 align-items-lg-end">
    <div><span class="eyebrow">PILIHAN KAMI</span><h2 class="section-title mt-2">Koleksi <span>unggulan</span></h2><p class="text-secondary mb-0">Pilih produk sesuai kebutuhan dan gaya Anda.</p></div>
    <form class="d-flex flex-column flex-sm-row gap-2" method="GET">
      <input class="form-control search-gold" name="q" value="{{ request('q') }}" placeholder="Cari produk emas...">
      <select class="form-select search-gold" name="category"><option value="">Semua kategori</option><option value="batangan" @selected(request('category')==='batangan')>Emas batangan</option><option value="perhiasan" @selected(request('category')==='perhiasan')>Perhiasan</option><option value="koin" @selected(request('category')==='koin')>Koin emas</option></select>
      <button class="btn btn-gold"><i class="bi bi-search"></i></button>
    </form>
  </div>
  <div class="row g-4 mt-2">
    @forelse($products as $product)
    <div class="col-sm-6 col-lg-4">
      <article class="product-card h-100">
        <a href="{{ route('store.show', $product) }}" class="product-image-link"><img class="product-image" src="{{ $product->image_url ?: 'https://images.unsplash.com/photo-1610375461246-83df859d849d?w=900' }}" alt="{{ $product->name }}" loading="lazy"><span class="product-category">{{ ucfirst($product->category) }}</span></a>
        <div class="p-3 p-lg-4"><div class="d-flex justify-content-between gap-2"><h3 class="product-title">{{ $product->name }}</h3><span class="purity">{{ $product->purity }}</span></div><p class="text-secondary small mb-3">{{ number_format($product->weight_gram, 2, ',', '.') }} gram · Kadar {{ $product->purity }}</p><div class="d-flex align-items-center justify-content-between"><div><small class="text-secondary d-block">Harga produk</small><strong class="price-gold">Rp{{ number_format($product->price, 0, ',', '.') }}</strong></div><a class="round-arrow" href="{{ route('store.show', $product) }}"><i class="bi bi-arrow-up-right"></i></a></div></div>
      </article>
    </div>
    @empty <div class="col-12"><div class="empty-state"><i class="bi bi-search"></i><h3>Produk belum ditemukan</h3><p>Coba kata kunci atau kategori lainnya.</p></div></div> @endforelse
  </div>
  <div class="mt-4">{{ $products->links() }}</div>
</section>
<section class="container pb-5"><div class="benefit-strip row g-3"><div class="col-md-4"><div class="benefit"><i class="bi bi-patch-check"></i><div><strong>Informasi transparan</strong><small>Berat, kadar, stok, dan harga ditampilkan.</small></div></div></div><div class="col-md-4"><div class="benefit"><i class="bi bi-lock"></i><div><strong>Akun terlindungi</strong><small>Login dan sesi pengguna Laravel.</small></div></div></div><div class="col-md-4"><div class="benefit"><i class="bi bi-receipt"></i><div><strong>Riwayat pesanan</strong><small>Pantau status pesanan Anda.</small></div></div></div></div></section>
@endsection

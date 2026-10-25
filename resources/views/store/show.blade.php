@extends('layouts.app')
@section('title', $product->name)
@section('content')
<div class="container py-5">
  <div class="mb-4"><a href="{{ route('store.index') }}" class="back-link"><i class="bi bi-arrow-left me-2"></i>Kembali ke koleksi</a></div>
  <div class="row g-5 align-items-start">
    <div class="col-lg-6"><div class="detail-image-wrap"><img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="detail-image"></div></div>
    <div class="col-lg-6"><span class="eyebrow">{{ strtoupper($product->category) }} COLLECTION</span><h1 class="detail-title mt-3">{{ $product->name }}</h1><div class="detail-price mt-3">Rp{{ number_format($product->price, 0, ',', '.') }}</div><p class="text-secondary mt-3">{{ $product->description }}</p>
      <div class="spec-grid my-4"><div><small>Berat</small><strong>{{ number_format($product->weight_gram, 2, ',', '.') }} gram</strong></div><div><small>Kadar</small><strong>{{ $product->purity }}</strong></div><div><small>Kategori</small><strong>{{ ucfirst($product->category) }}</strong></div><div><small>Ketersediaan</small><strong>{{ $product->stock > 0 ? 'Stok tersedia' : 'Stok habis' }}</strong></div></div>
      @if($product->stock > 0)
      <form action="{{ route('cart.add', $product) }}" method="POST" class="d-flex gap-3 align-items-end">@csrf<div><label class="form-label">Jumlah</label><input class="form-control quantity-input" type="number" name="quantity" value="1" min="1" max="{{ min($product->stock, 20) }}"></div><button class="btn btn-gold btn-lg flex-grow-1"><i class="bi bi-bag-plus me-2"></i>Tambah ke Keranjang</button></form>
      @else <button class="btn btn-secondary" disabled>Stok habis</button> @endif
      <div class="notice-soft mt-4"><i class="bi bi-info-circle me-2"></i>Harga dan stok mengikuti data yang dikelola admin. Pastikan spesifikasi produk telah dibaca sebelum checkout.</div>
    </div>
  </div>
  @if($related->count())<h2 class="section-title mt-5 mb-3">Pilihan <span>lainnya</span></h2><div class="row g-3">@foreach($related as $item)<div class="col-6 col-lg-3"><a class="related-card" href="{{ route('store.show', $item) }}"><img src="{{ $item->image_url }}" alt="{{ $item->name }}"><strong>{{ $item->name }}</strong><span>Rp{{ number_format($item->price, 0, ',', '.') }}</span></a></div>@endforeach</div>@endif
</div>
@endsection

@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
<div class="container py-5"><div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3"><div><span class="eyebrow">AURELIA CONTROL CENTER</span><h1 class="section-title mt-2">Dashboard <span>admin</span></h1><p class="text-secondary">Ringkasan toko dan aktivitas pesanan.</p></div><div class="d-flex gap-2"><a href="{{ route('admin.produk.index') }}" class="btn btn-outline-gold">Kelola Produk</a><a href="{{ route('admin.orders.index') }}" class="btn btn-gold">Kelola Pesanan</a></div></div>
<div class="row g-3 mt-2"><div class="col-6 col-xl-3"><div class="stat-card"><span>Total Produk</span><strong>{{ number_format($productCount) }}</strong><i class="bi bi-gem"></i></div></div><div class="col-6 col-xl-3"><div class="stat-card"><span>Total Pesanan</span><strong>{{ number_format($orderCount) }}</strong><i class="bi bi-receipt"></i></div></div><div class="col-6 col-xl-3"><div class="stat-card"><span>Pelanggan</span><strong>{{ number_format($customerCount) }}</strong><i class="bi bi-people"></i></div></div><div class="col-6 col-xl-3"><div class="stat-card"><span>Pendapatan Dibayar</span><strong class="stat-money">Rp{{ number_format($revenue, 0, ',', '.') }}</strong><i class="bi bi-graph-up-arrow"></i></div></div></div>
<div class="row g-4 mt-1"><div class="col-lg-7"><div class="admin-panel"><h3 class="panel-title">Pendapatan per bulan</h3><canvas id="salesChart" height="125"></canvas></div></div><div class="col-lg-5"><div class="admin-panel"><h3 class="panel-title">Akses cepat</h3><a class="quick-link" href="{{ route('admin.produk.create') }}"><i class="bi bi-plus-circle"></i><span><strong>Tambah produk baru</strong><small>Masukkan produk emas ke katalog</small></span><i class="bi bi-chevron-right ms-auto"></i></a><a class="quick-link" href="{{ route('admin.orders.index') }}"><i class="bi bi-box-seam"></i><span><strong>Perbarui status pesanan</strong><small>Kelola status pesanan dan pembayaran</small></span><i class="bi bi-chevron-right ms-auto"></i></a></div></div></div>
<div class="admin-panel mt-4"><div class="d-flex justify-content-between align-items-center mb-3"><h3 class="panel-title mb-0">Pesanan terbaru</h3><a class="text-gold" href="{{ route('admin.orders.index') }}">Lihat semua</a></div><div class="table-responsive"><table class="table align-middle"><thead><tr><th>Pesanan</th><th>Pelanggan</th><th>Tanggal</th><th>Total</th><th>Status</th></tr></thead><tbody>@forelse($recentOrders as $order)<tr><td>{{ $order->order_number }}</td><td>{{ $order->customer_name }}</td><td>{{ $order->created_at->format('d/m/Y') }}</td><td>Rp{{ number_format($order->total, 0, ',', '.') }}</td><td><span class="status-pill">{{ ucfirst($order->status) }}</span></td></tr>@empty<tr><td colspan="5" class="text-center text-secondary py-4">Belum ada pesanan.</td></tr>@endforelse</tbody></table></div></div></div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('salesChart'), {
 type:'line',
 data:{labels:['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],datasets:[{label:'Pendapatan (Rp)',data:@json($chart),borderColor:'#c9a44c',backgroundColor:'rgba(201,164,76,.12)',fill:true,tension:.35,pointRadius:3}]},
 options:{responsive:true,plugins:{legend:{display:false}},scales:{y:{beginAtZero:true,ticks:{callback:value=>'Rp '+Number(value).toLocaleString('id-ID')}}}}
});
</script>
@endpush

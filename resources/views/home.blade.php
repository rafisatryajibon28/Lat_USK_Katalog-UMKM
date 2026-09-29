@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="mb-4">
    <h3 class="page-title">Katalog UMKM Siswa SMK</h3>
    <p class="text-muted mb-3">Produk kreatif hasil karya siswa SMK.</p>
    <a href="{{ route('katalog') }}" class="btn btn-primary btn-sm">Lihat Katalog</a>
    <a href="{{ route('admin.index') }}" class="btn btn-outline-primary btn-sm">Admin</a>
</div>

<div class="row g-3 mb-4">
    <div class="col-4">
        <div class="card p-3 text-center">
            <div class="fs-4 fw-bold" style="color:#1e3a5f;">{{ $totalProduk }}</div>
            <small class="text-muted">Produk</small>
        </div>
    </div>
    <div class="col-4">
        <div class="card p-3 text-center">
            <div class="fs-4 fw-bold" style="color:#1e3a5f;">{{ $totalKategori }}</div>
            <small class="text-muted">Kategori</small>
        </div>
    </div>
    <div class="col-4">
        <div class="card p-3 text-center">
            <div class="fs-4 fw-bold" style="color:#1e3a5f;">{{ number_format($totalStok) }}</div>
            <small class="text-muted">Stok</small>
        </div>
    </div>
</div>

<h5 class="fw-bold mb-3">Produk Terbaru</h5>
<div class="row g-3">
    @forelse($produkTerbaru as $produk)
    <div class="col-6 col-md-3">
        <div class="card h-100">
            @if($produk->gambar && $produk->gambar !== 'default.jpg')
                <img src="{{ asset('storage/produk/'.$produk->gambar) }}" style="height:150px;width:100%;object-fit:cover;" alt="">
            @else
                <div class="img-box">📦</div>
            @endif
            <div class="card-body p-2">
                <span class="badge badge-soft">{{ $produk->kategori }}</span>
                <div class="fw-semibold mt-1">{{ $produk->nama }}</div>
                <div class="price">{{ $produk->harga_formatted }}</div>
                <a href="{{ route('detail', $produk->id) }}" class="btn btn-primary btn-sm w-100 mt-2">Detail</a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12"><p class="text-muted">Belum ada produk.</p></div>
    @endforelse
</div>
@endsection
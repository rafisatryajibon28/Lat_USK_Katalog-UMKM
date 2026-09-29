@extends('layouts.app')

@section('title', 'Katalog')

@section('content')
<h5 class="page-title mb-3">Katalog Produk</h5>

<form method="GET" action="{{ route('katalog') }}" class="mb-3">
    @if($kategoriFilter !== '')
        <input type="hidden" name="kategori" value="{{ $kategoriFilter }}">
    @endif
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Cari produk..." value="{{ $keyword }}">
        <button class="btn btn-primary" type="submit">Cari</button>
        @if($keyword !== '' || $kategoriFilter !== '')
            <a href="{{ route('katalog') }}" class="btn btn-outline-secondary">Reset</a>
        @endif
    </div>
</form>

<div class="mb-3">
    <a href="{{ route('katalog', array_filter(['q' => $keyword ?: null])) }}"
       class="filter-btn {{ $kategoriFilter === '' ? 'active' : '' }}">Semua</a>
    @foreach($kategoris as $kat)
        <a href="{{ route('katalog', array_filter(['kategori' => $kat, 'q' => $keyword ?: null])) }}"
           class="filter-btn {{ $kategoriFilter === $kat ? 'active' : '' }}">{{ $kat }}</a>
    @endforeach
</div>

@if($keyword !== '' || $kategoriFilter !== '')
    <p class="text-muted small">Ditemukan {{ $produks->count() }} produk</p>
@endif

<div class="row g-3">
    @forelse($produks as $produk)
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
                <small class="text-muted d-block">Stok: {{ $produk->stok }}</small>
                <a href="{{ route('detail', $produk->id) }}" class="btn btn-primary btn-sm w-100 mt-2">Detail</a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12"><p class="text-muted">Produk tidak ditemukan.</p></div>
    @endforelse
</div>
@endsection
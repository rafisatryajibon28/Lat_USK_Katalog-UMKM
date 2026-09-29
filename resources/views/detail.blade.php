@extends('layouts.app')

@section('title', $produk->nama)

@section('content')
<a href="{{ route('katalog') }}" class="small">&larr; Kembali ke Katalog</a>

<div class="row g-4 mt-1">
    <div class="col-md-5">
        @if($produk->gambar && $produk->gambar !== 'default.jpg')
            <img src="{{ asset('storage/produk/'.$produk->gambar) }}" class="w-100 rounded" style="max-height:320px;object-fit:cover;" alt="">
        @else
            <div class="img-box rounded" style="height:280px;">📦</div>
        @endif
    </div>
    <div class="col-md-7">
        <span class="badge badge-soft">{{ $produk->kategori }}</span>
        <h4 class="fw-bold mt-2">{{ $produk->nama }}</h4>
        <p class="text-muted small mb-1">Kode: {{ $produk->kode }}</p>
        <div class="price fs-4 mb-2">{{ $produk->harga_formatted }}</div>
        <p class="small text-muted">Stok: {{ $produk->stok }}</p>
        <hr>
        <p>{{ $produk->deskripsi }}</p>
        <a href="{{ route('admin.edit', $produk->id) }}" class="btn btn-outline-primary btn-sm">Edit Produk</a>
    </div>
</div>
@endsection
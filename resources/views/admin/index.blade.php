@extends('layouts.app')

@section('title', 'Admin - Kelola Produk')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h5 class="page-title mb-0">Kelola Produk</h5>
        <small class="text-muted">Total: {{ $produks->count() }} produk</small>
    </div>
    <a href="{{ route('admin.tambah') }}" class="btn btn-primary btn-sm">+ Tambah Produk</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produks as $i => $produk)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td><code>{{ $produk->kode }}</code></td>
                    <td>{{ $produk->nama }}</td>
                    <td><span class="badge badge-soft">{{ $produk->kategori }}</span></td>
                    <td>{{ $produk->harga_formatted }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>
                        <a href="{{ route('detail', $produk->id) }}" class="btn btn-outline-primary btn-sm">Lihat</a>
                        <a href="{{ route('admin.edit', $produk->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.hapus', $produk->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus produk {{ $produk->nama }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-secondary btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                        Belum ada data.
                        <a href="{{ route('admin.tambah') }}">Tambah produk</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
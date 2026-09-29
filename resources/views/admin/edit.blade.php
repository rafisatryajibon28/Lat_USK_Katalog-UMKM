@extends('layouts.app')

@section('title', 'Admin - Ubah Produk')

@section('content')
<div class="container mt-4 mb-5">
    <div class="page-header">
        <h2 class="fw-bold mb-1" style="color:#1e3a5f;"><i class="bi bi-pencil"></i> Ubah Produk</h2>
        <p class="text-muted mb-0">Edit data produk: <strong>{{ $produk->nama }}</strong></p>
    </div>

    <div class="card admin-card">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.update', $produk->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="kode" class="form-label">Kode Produk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror"
                               id="kode" name="kode" value="{{ old('kode', $produk->kode) }}" required>
                        @error('kode') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-8">
                        <label for="nama" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                               id="nama" name="nama" value="{{ old('nama', $produk->nama) }}" required>
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                               id="kategori" name="kategori" list="kategori-list"
                               value="{{ old('kategori', $produk->kategori) }}" required>
                        <datalist id="kategori-list">
                            @foreach($kategoris as $kat)
                                <option value="{{ $kat }}">
                            @endforeach
                        </datalist>
                        @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="harga" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror"
                               id="harga" name="harga" value="{{ old('harga', $produk->harga) }}" min="0" required>
                        @error('harga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="stok" class="form-label">Stok <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror"
                               id="stok" name="stok" value="{{ old('stok', $produk->stok) }}" min="0" required>
                        @error('stok') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- UPLOAD GAMBAR --}}
                    <div class="col-md-6">
                        <label for="gambar" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                               id="gambar" name="gambar" accept="image/jpeg,image/png,image/webp">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar. Maks 2 MB.</small>
                        @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gambar Saat Ini</label>
                        <div>
                            @if($produk->gambar && $produk->gambar !== 'default.jpg')
                                <img src="{{ asset('storage/produk/' . $produk->gambar) }}"
                                     alt="{{ $produk->nama }}"
                                     style="max-height:120px; border-radius:10px; border:1px solid #e2e8f0;">
                            @else
                                <div class="img-placeholder" style="height:100px; width:140px; font-size:2rem; border-radius:10px;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </div>
                        <div id="preview-box" class="d-none mt-2">
                            <label class="form-label">Preview Baru</label>
                            <img id="preview-img" src="" alt="Preview" style="max-height:120px; border-radius:10px; border:1px solid #e2e8f0;">
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                  id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
                    <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary"><i class="bi bi-x-circle"></i> Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('gambar').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const box = document.getElementById('preview-box');
    const img = document.getElementById('preview-img');
    if (file) {
        img.src = URL.createObjectURL(file);
        box.classList.remove('d-none');
    } else {
        box.classList.add('d-none');
    }
});
</script>
@endpush
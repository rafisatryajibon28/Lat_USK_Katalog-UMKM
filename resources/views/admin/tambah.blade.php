@extends('layouts.app')

@section('title', 'Admin - Tambah Produk')

@section('content')
<div class="container mt-4 mb-5">
    <div class="page-header">
        <h2 class="fw-bold mb-1" style="color: #1e3a5f;"><i class="bi bi-plus-circle"></i> Tambah Produk Baru</h2>
        <p class="text-muted mb-0">Isi formulir di bawah untuk menambahkan produk</p>
    </div>

    <div class="card admin-card">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="kode" class="form-label">Kode Produk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror"
                               id="kode" name="kode" value="{{ old('kode') }}" placeholder="Contoh: P009" required>
                        @error('kode') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-8">
                        <label for="nama" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                               id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama produk" required>
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                               id="kategori" name="kategori" list="kategori-list"
                               value="{{ old('kategori') }}" placeholder="Contoh: Fashion" required>
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
                               id="harga" name="harga" value="{{ old('harga') }}" placeholder="50000" min="0" required>
                        @error('harga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="stok" class="form-label">Stok <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror"
                               id="stok" name="stok" value="{{ old('stok') }}" placeholder="10" min="0" required>
                        @error('stok') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- UPLOAD GAMBAR --}}
                    <div class="col-md-6">
                        <label for="gambar" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                               id="gambar" name="gambar" accept="image/jpeg,image/png,image/webp">
                        <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal 2 MB.</small>
                        @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <div id="preview-box" class="d-none">
                            <label class="form-label">Preview</label>
                            <div>
                                <img id="preview-img" src="" alt="Preview" style="max-height:120px; border-radius:10px; border:1px solid #e2e8f0;">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                  id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Produk</button>
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
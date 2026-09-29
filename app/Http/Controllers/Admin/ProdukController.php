<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProdukController extends Controller
{
    public function index(): View
    {
        $produks = Produk::orderBy('id', 'asc')->get();
        return view('admin.index', compact('produks'));
    }

    public function create(): View
    {
        $kategoris = Produk::select('kategori')->distinct()->orderBy('kategori')->pluck('kategori');
        return view('admin.tambah', compact('kategoris'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:10|unique:produks,kode',
            'nama' => 'required|string|max:100',
            'kategori' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'kode.required' => 'Kode produk wajib diisi.',
            'kode.unique' => 'Kode produk sudah digunakan.',
            'nama.required' => 'Nama produk wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.numeric' => 'Stok harus berupa angka.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar: jpg, jpeg, png, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('produk', $namaFile, 'public');
            $validated['gambar'] = $namaFile;
        } else {
            $validated['gambar'] = 'default.jpg';
        }

        Produk::create($validated);

        return redirect()->route('admin.index')
            ->with('success', 'Produk "' . $validated['nama'] . '" berhasil ditambahkan!');
    }

    public function edit(int $id): View
    {
        $produk = Produk::findOrFail($id);
        $kategoris = Produk::select('kategori')->distinct()->orderBy('kategori')->pluck('kategori');
        return view('admin.edit', compact('produk', 'kategoris'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $produk = Produk::findOrFail($id);

        $validated = $request->validate([
            'kode' => 'required|string|max:10|unique:produks,kode,' . $id,
            'nama' => 'required|string|max:100',
            'kategori' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'kode.required' => 'Kode produk wajib diisi.',
            'kode.unique' => 'Kode produk sudah digunakan.',
            'nama.required' => 'Nama produk wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.numeric' => 'Stok harus berupa angka.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar: jpg, jpeg, png, atau webp.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        // Upload gambar baru (jika ada)
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama (kecuali default)
            if ($produk->gambar && $produk->gambar !== 'default.jpg') {
                Storage::disk('public')->delete('produk/' . $produk->gambar);
            }
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('produk', $namaFile, 'public');
            $validated['gambar'] = $namaFile;
        }

        $produk->update($validated);

        return redirect()->route('admin.index')
            ->with('success', 'Produk "' . $validated['nama'] . '" berhasil diperbarui!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $produk = Produk::findOrFail($id);
        $nama = $produk->nama;

        // Hapus file gambar
        if ($produk->gambar && $produk->gambar !== 'default.jpg') {
            Storage::disk('public')->delete('produk/' . $produk->gambar);
        }

        $produk->delete();

        return redirect()->route('admin.index')
            ->with('success', 'Produk "' . $nama . '" berhasil dihapus!');
    }
}
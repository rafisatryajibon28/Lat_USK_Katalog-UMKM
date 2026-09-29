<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KatalogController extends Controller
{
    public function index(Request $request): View
    {
        $keyword = $request->input('q', '');
        $kategoriFilter = $request->input('kategori', '');

        $query = Produk::query();

        if ($keyword !== '') {
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%")
                  ->orWhere('kategori', 'like', "%{$keyword}%")
                  ->orWhere('kode', 'like', "%{$keyword}%");
            });
        }

        if ($kategoriFilter !== '') {
            $query->where('kategori', $kategoriFilter);
        }

        $produks = $query->orderBy('id', 'asc')->get();
        $kategoris = Produk::select('kategori')->distinct()->orderBy('kategori')->pluck('kategori');

        return view('katalog', compact('produks', 'kategoris', 'keyword', 'kategoriFilter'));
    }

    public function show(int $id): View
    {
        $produk = Produk::findOrFail($id);
        return view('detail', compact('produk'));
    }
}

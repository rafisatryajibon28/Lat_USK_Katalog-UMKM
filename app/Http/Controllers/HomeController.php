<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $totalProduk = Produk::count();
        $totalKategori = Produk::distinct('kategori')->count('kategori');
        $totalStok = Produk::sum('stok');
        $produkTerbaru = Produk::orderBy('id', 'desc')->limit(4)->get();

        return view('home', compact('totalProduk', 'totalKategori', 'totalStok', 'produkTerbaru'));
    }
}

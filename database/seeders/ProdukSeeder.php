<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $produks = [
            [
                'kode' => 'P001',
                'nama' => 'Kaos SMK Kreatif',
                'kategori' => 'Fashion',
                'harga' => 75000,
                'stok' => 20,
                'deskripsi' => 'Kaos desain siswa SMK dengan bahan cotton combed 30s, nyaman dipakai sehari-hari.',
                'gambar' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'P002',
                'nama' => 'Totebag Edukasi',
                'kategori' => 'Aksesori',
                'harga' => 45000,
                'stok' => 15,
                'deskripsi' => 'Totebag untuk kegiatan sekolah, berbahan canvas tebal dan tahan lama.',
                'gambar' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'P003',
                'nama' => 'Notebook Pelajar',
                'kategori' => 'Alat Tulis',
                'harga' => 25000,
                'stok' => 30,
                'deskripsi' => 'Notebook untuk catatan belajar, 80 halaman, kertas HVS 70gsm.',
                'gambar' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'P004',
                'nama' => 'Tumbler Sekolah',
                'kategori' => 'Aksesori',
                'harga' => 65000,
                'stok' => 18,
                'deskripsi' => 'Botol minum reusable kapasitas 500ml, material stainless steel.',
                'gambar' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'P005',
                'nama' => 'Stiker Kreatif',
                'kategori' => 'Aksesori',
                'harga' => 15000,
                'stok' => 50,
                'deskripsi' => 'Paket stiker bertema edukasi, berisi 20 stiker berbagai desain.',
                'gambar' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'P006',
                'nama' => 'Pin Ekskul',
                'kategori' => 'Aksesori',
                'harga' => 10000,
                'stok' => 40,
                'deskripsi' => 'Pin kegiatan ekstrakurikuler, diameter 4.5cm, material logam berkualitas.',
                'gambar' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'P007',
                'nama' => 'Topi Sekolah',
                'kategori' => 'Fashion',
                'harga' => 55000,
                'stok' => 12,
                'deskripsi' => 'Topi model kasual dengan bordir logo SMK, bahan twill cotton.',
                'gambar' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'P008',
                'nama' => 'Mug Kelas',
                'kategori' => 'Perlengkapan',
                'harga' => 35000,
                'stok' => 25,
                'deskripsi' => 'Mug souvenir kelas kapasitas 300ml, ceramic premium dengan desain custom.',
                'gambar' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('produks')->insert($produks);
    }
}

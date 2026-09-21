<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

Route::get('/katalog-matkul', [CourseController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/kurikulum', function () {
    return view('menu-kurikulum'); // Sesuaikan dengan nama file view kurikulummu
});
Route::get('/repositori', function (Request $request) {
    // Data asli & Tersinkronisasi dengan repository.unair.ac.id
    // Data asli & Tersinkronisasi dengan repository.unair.ac.id
    $semua_karya = [
        [
            'judul' => 'Literasi Digital Dalam Menghadapi Informasi Pandemi Covid-19 Pada Mahasiswa',
            'nama'  => 'Regita Al Hafidha',
            'jenis' => 'Skripsi',
            'tahun' => '2020',
            'gambar'=> 'https://placehold.co/400x300/f8f9fa/6c757d?text=PDF+\nRepositori', // Thumbnail ala PDF
            'link'  => 'https://repository.unair.ac.id/104369/'
        ],
        [
            'judul' => 'Pemenuhan Kebutuhan Informasi Pemustaka di Perpustakaan Universitas Airlangga',
            'nama'  => 'Muhammad Syaikhul Majduddin',
            'jenis' => 'Skripsi',
            'tahun' => '2019',
            'gambar'=> 'https://placehold.co/400x300/f8f9fa/6c757d?text=PDF+\nRepositori',
            'link'  => 'https://repository.unair.ac.id/82985/'
        ],
        [
            'judul' => 'Tingkat Literasi Media Sosial Mahasiswa Ilmu Informasi dan Perpustakaan',
            'nama'  => 'Dian Eka Putri', 
            'jenis' => 'Artikel',
            'tahun' => '2019',
            'gambar'=> 'https://placehold.co/400x300/f8f9fa/6c757d?text=PDF+\nRepositori',
            'link'  => 'https://repository.unair.ac.id/94887/'
        ],
        [
            'judul' => 'Analisis Sistem Informasi Perpustakaan (SIPUS) Menggunakan Model UTAUT',
            'nama'  => 'Bagas Dwi Santoso', 
            'jenis' => 'Skripsi',
            'tahun' => '2018',
            'gambar'=> 'https://placehold.co/400x300/f8f9fa/6c757d?text=PDF+\nRepositori',
            'link'  => 'https://repository.unair.ac.id/68427/'
        ]
    ];

    $karya_iip = collect($semua_karya);

    // Fitur Pencarian
    if ($request->filled('search')) {
        $search = strtolower($request->search);
        $karya_iip = $karya_iip->filter(function($karya) use ($search) {
            return Str::contains(strtolower($karya['judul']), $search) || 
                   Str::contains(strtolower($karya['nama']), $search);
        });
    }

    // Filter Dropdown
    if ($request->filled('jenis') && $request->jenis != 'Semua') {
        $karya_iip = $karya_iip->where('jenis', $request->jenis);
    }
    if ($request->filled('tahun') && $request->tahun != 'Semua') {
        $karya_iip = $karya_iip->where('tahun', $request->tahun);
    }

    return view('repositori', ['karya_iip' => $karya_iip]);
});
Route::get('/home', function () {
    $tokoh = [];  // Variabel untuk mengatasi error sebelumnya
    $berita = []; // Variabel penampung data berita untuk mengatasi error ini

    return view('home', compact('tokoh', 'berita'));
});

// Lakukan hal yang sama untuk rute utama (root) jika mengarah ke halaman home
Route::get('/', function () {
    $tokoh = [];
    $berita = [];

    return view('home', compact('tokoh', 'berita'));
});
Route::get('/semua-berita', function () {
    $berita = []; // Data sementara penampung berita
    
    // Sesuaikan nama view-nya menjadi 'berita-semua'
    return view('berita-semua', compact('berita'));
});
Route::get('/peta-kurikulum', function () {
    return view('peta-kurikulum');
});
// Rute untuk Halaman Menu Utama Lab Klasifikasi (Sesuai gambar)
Route::get('/lab-klasifikasi', function () {
    return view('lab-klasifikasi');
});

// Halaman Menu Utama Lab Klasifikasi
Route::get('/lab-klasifikasi', function () {
    return view('lab-klasifikasi');
});

// Halaman "Apa Sih DDC Itu?" (Grid 10 Kelas)
Route::get('/pengenalan-ddc', function () {
    return view('pengenalan-ddc');
});

// Halaman "Sistem Peminjaman & Cek Status" (Yang isinya Kalkulator DDC)
Route::get('/calculator-ddc', function () {
    return view('calculator-ddc');
});
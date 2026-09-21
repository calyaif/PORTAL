@extends('layouts.main')
@section('title', 'Repositori - NODE.US')
@section('custom-css')
<style>
    .container { max-width: 900px; margin: 0 auto; background: rgba(0,0,0,0.25); padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
    h1 { font-family: 'Fredoka One', cursive; font-size: 2.5rem; margin-top: 0; text-shadow: 2px 2px 0px #cf3a20; }
    .section-box { background: rgba(255,255,255,0.15); padding: 25px; border-radius: 15px; margin-top: 20px; }
    .section-box h3 { margin-top: 0; font-family: 'Fredoka One', cursive; color: #ffd700; }
    p { font-family: 'Open Sauce', sans-serif; line-height: 1.6; }
</style>
@endsection
@section('content')
    <div class="container">
        <h1>Repositori & Publikasi</h1>
        <p>Arsip digital karya ilmiah mahasiswa serta jendela akses resmi menuju jurnal program studi.</p>
        <div class="section-box">
            <h3>📂 Repositori Karya Mahasiswa</h3>
            <p>Pencarian terarsip untuk Tugas Akhir, Skripsi, dan Laporan Magang dengan standar skema metadata internasional Dublin Core.</p>
        </div>
        <div class="section-box">
            <h3>📰 Gerbang Jurnal Palimpsest</h3>
            <p>Akses edisi terbaru jurnal ilmiah, tautan langsung ke sistem Open Journal Systems (OJS).</p>
        </div>
    </div>
@endsection
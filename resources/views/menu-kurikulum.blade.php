@extends('layouts.main')
@section('title', 'Kurikulum - NODE.US')

@section('custom-css')
<style>
    .container { max-width: 900px; margin: 0 auto; background: rgba(0,0,0,0.25); padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
    h1 { font-family: 'Fredoka One', cursive; font-size: 2.5rem; margin-top: 0; text-shadow: 2px 2px 0px #cf3a20; color: white; }
    
    .section-box { 
        background: rgba(255,255,255,0.15); 
        padding: 25px; 
        border-radius: 15px; 
        margin-top: 20px; 
        transition: 0.3s ease; 
    }
    
    /* Efek hover khusus untuk kartu yang bisa diklik */
    .card-link { text-decoration: none; display: block; }
    .card-link .section-box:hover { 
        background: rgba(255,255,255,0.25); 
        transform: translateY(-3px); 
        border: 1px solid rgba(255, 255, 255, 0.4);
    }
    
    .section-box h3 { margin-top: 0; font-family: 'Fredoka One', cursive; color: #ffd700; font-size: 1.3rem; }
    p { font-family: 'Open Sauce', sans-serif; line-height: 1.6; color: white; margin-bottom: 0; }
</style>
@endsection

@section('content')
    <div class="container">
        <h1>Akademik & Kurikulum</h1>
        <p>Pusat informasi komprehensif mengenai peta jalur studi, silabus mata kuliah, hingga fasilitas laboratorium penunjang.</p>
        
        <!-- Kartu Peta Kurikulum (Sekarang dibungkus card-link dan ada di dalam container) -->
        <a href="/peta-kurikulum" class="card-link">
            <div class="section-box">
                <h3>Alur Pengambilan SKS & Peta Studi</h3>
                <p>Panduan terstruktur alur pengambilan SKS</p>
            </div>
        </a>

        <!-- Kartu Katalog Mata Kuliah -->
        <a href="/katalog-matkul" class="card-link">
            <div class="section-box">
                <h3>📚 Katalog Mata Kuliah</h3>
                <p>Berisi Deskripsi Mata Kuliah.</p>
            </div>
        </a>
    </div>
@endsection
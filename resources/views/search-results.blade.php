@extends('layouts.main')
@section('title', 'Hasil Pencarian - NODE.US')
@section('custom-css')
<style>
    .container { max-width: 900px; margin: 0 auto; background: rgba(0,0,0,0.25); padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
    h1 { font-family: 'Fredoka One', cursive; margin-top: 0; color: #ffd700; }
    h2 { font-family: 'Fredoka One', cursive; border-bottom: 2px solid rgba(255,255,255,0.2); padding-bottom: 10px; margin-top: 30px; }
    .feature-card { display: block; background: rgba(255,255,255,0.15); padding: 20px; border-radius: 12px; margin-bottom: 15px; text-decoration: none; color: #fff; transition: 0.3s; border-left: 5px solid transparent; }
    .feature-card:hover { background: rgba(255,255,255,0.25); border-left: 5px solid #ffd700; transform: translateX(5px); }
    .feature-card h3 { margin: 0 0 5px 0; color: #ffd700; font-family: 'Fredoka One', cursive; }
    .feature-card p { margin: 0; font-size: 0.9rem; opacity: 0.9; font-family: 'Open Sauce', sans-serif; }
    
    .berita-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
    .berita-card { background: rgba(255, 230, 200, 0.4); border-radius: 15px; padding: 15px; text-decoration: none; color: #fdf6ec; display: flex; flex-direction: column; transition: 0.3s; }
    .berita-card:hover { transform: translateY(-5px); background: rgba(255, 230, 200, 0.6); }
    .berita-card h4 { margin: 0 0 10px 0; font-family: 'Fredoka One', cursive; font-size: 1.1rem; }
    .no-result { text-align: center; padding: 40px; background: rgba(0,0,0,0.1); border-radius: 12px; font-weight: bold; font-size: 1.2rem; font-family: 'Open Sauce', sans-serif;}
</style>
@endsection
@section('content')
    <div class="container">
        <h1>Hasil Pencarian untuk: "{{ $keyword }}"</h1>
        @if(count($matchedFeatures) == 0 && count($matchedBerita) == 0)
            <div class="no-result">
                Mohon maaf, tidak ditemukan fitur atau berita dengan kata kunci "{{ $keyword }}".<br>
                <span style="font-size: 0.9rem; font-weight: normal;">Coba gunakan kata kunci lain seperti: jadwal, magang, repositori, atau skripsi.</span>
            </div>
        @else
            @if(count($matchedFeatures) > 0)
                <h2>🎯 Akses Cepat Menu/Fitur</h2>
                @foreach($matchedFeatures as $feat)
                    <a href="{{ $feat['url'] }}" class="feature-card">
                        <h3>{{ $feat['judul'] }}</h3>
                        <p>{{ $feat['deskripsi'] }}</p>
                    </a>
                @endforeach
            @endif
            @if(count($matchedBerita) > 0)
                <h2>📰 Berita Terkait</h2>
                <div class="berita-grid">
                    @foreach($matchedBerita as $berita)
                        <a href="/berita/{{ $berita->id }}" class="berita-card">
                            <h4>{{ $berita->judul }}</h4>
                            <p style="margin: 0; font-size: 0.85rem; font-family: 'Open Sauce', sans-serif;">{{ $berita->cuplikan }}</p>
                        </a>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
@endsection
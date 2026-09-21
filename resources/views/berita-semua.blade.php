@extends('layouts.main')
@section('title', 'Semua Berita - NODE.US')
@section('custom-css')
<style>
    h1 { font-family: 'Fredoka One', cursive; font-size: 2.5rem; margin: 0 0 30px 0; text-shadow: 2px 2px 0px #cf3a20; text-align: center; }
    .berita-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; max-width: 1200px; margin: 0 auto; }
    .berita-card { background: rgba(255, 230, 200, 0.4); border-radius: 20px; padding: 20px; text-decoration: none; color: #fdf6ec; display: flex; flex-direction: column; transition: 0.3s; }
    .berita-card:hover { transform: translateY(-8px); background: rgba(255, 230, 200, 0.6); }
    .berita-card img { width: 100%; height: 200px; object-fit: cover; border-radius: 12px; margin-bottom: 15px; }
    .berita-card h3 { margin: 0 0 10px 0; font-family: 'Fredoka One', cursive; font-size: 1.3rem; }
    .berita-card p { margin: 0; font-family: 'Open Sauce', sans-serif; font-size: 0.9rem; line-height: 1.5; color: #fff; }
</style>
@endsection
@section('content')
    <h1>Semua Berita Terkini</h1>
    <div class="berita-grid">
        @forelse($berita as $item)
            <a href="/berita/{{ $item->id }}" class="berita-card">
                <img src="{{ asset('images/' . $item->gambar) }}" alt="Berita">
                <h3>{{ $item->judul }}</h3>
                <p>{{ $item->cuplikan }}</p>
            </a>
        @empty
            <p style="font-size: 1.2rem; font-weight: bold; text-align: center; grid-column: span 3;">Belum ada berita yang diunggah.</p>
        @endforelse
    </div>
@endsection
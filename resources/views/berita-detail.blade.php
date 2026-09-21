@extends('layouts.main')
@section('title', $berita->judul)
@section('custom-css')
<style>
    .container { max-width: 800px; margin: 0 auto; background: rgba(0,0,0,0.25); padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
    h1 { font-family: 'Fredoka One', cursive; margin-top: 0; font-size: 2.5rem; text-shadow: 2px 2px 0px #cf3a20; }
    .tanggal { font-size: 0.9rem; color: #ffd700; margin-bottom: 20px; font-family: 'Open Sauce', sans-serif; }
    .diedit { color: #ccc; font-style: italic; font-size: 0.8rem; margin-left: 10px; }
    img { width: 100%; border-radius: 15px; margin-bottom: 20px; max-height: 400px; object-fit: cover; }
    .isi-berita { line-height: 1.8; font-size: 1.05rem; font-family: 'Open Sauce', sans-serif; }
</style>
@endsection
@section('content')
    <div class="container">
        <h1>{{ $berita->judul }}</h1>
        <div class="tanggal">
            Dipublikasikan: {{ $berita->created_at->format('d M Y') }}
            @if($berita->created_at->ne($berita->updated_at))
                <span class="diedit">(Diedit: {{ $berita->updated_at->format('d M Y') }})</span>
            @endif
        </div>
        <img src="{{ asset('images/' . $berita->gambar) }}">
        <div class="isi-berita">
            {!! nl2br(e($berita->isi)) !!}
        </div>
    </div>
@endsection
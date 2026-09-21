@extends('layouts.main')
@section('title', 'Komunitas - NODE.US')
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
        <h1>Komunitas & Forum</h1>
        <p>Wadah kolaborasi aktif, ruang diskusi akademik, serta informasi kegiatan mahasiswa.</p>
        <div class="section-box">
            <h3>💬 Forum Diskusi Akademik</h3>
            <p>Ruang tanya jawab interaktif antar mahasiswa dan dosen pengampu.</p>
        </div>
        <div class="section-box">
            <h3>🏆 Info Magang, Lomba & Beasiswa</h3>
            <p>Papan pengumuman berkala mengenai kesempatan emas untuk mahasiswa.</p>
        </div>
    </div>
@endsection
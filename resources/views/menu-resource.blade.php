@extends('layouts.main')
@section('title', 'Resource Hub - NODE.US')
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
        <h1>Resource Hub & Bantuan</h1>
        <p>Pusat unduhan perangkat lunak pendukung riset, standar metadata, dan basis pengetahuan.</p>
        <div class="section-box">
            <h3>🛠️ Student Toolkit</h3>
            <p>Pusat tautan pengunduhan software penunjang studi (manajer referensi, editor metadata).</p>
        </div>
        <div class="section-box">
            <h3>❓ Knowledge Base & FAQ</h3>
            <p>Daftar pertanyaan yang sering diajukan seputar perkuliahan dan kemahasiswaan.</p>
        </div>
    </div>
@endsection
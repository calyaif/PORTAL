@extends('layouts.main')
@section('title', 'Apa Sih DDC Itu? - NODE.US')

@section('custom-css')
<style>
    /* Reset dasar agar padding tidak meluber */
    *, *::before, *::after { box-sizing: border-box; }

    /* PERBAIKAN "KEGELAPAN": Background dibuat transparent dan bayangan dihapus */
    .container { 
        max-width: 1000px; 
        margin: 100px auto 40px auto; 
        background: transparent; 
        padding: 20px 40px; /* Padding disesuaikan agar proporsional */
        border-radius: 20px; 
        box-shadow: none; 
    }
    
    .top-nav { display: flex; align-items: center; margin-bottom: 30px; } 
    .menu-btn { background: #111; color: #FFD700; border: none; padding: 10px 20px; border-radius: 25px; font-weight: bold; cursor: pointer; margin-right: 15px; text-decoration: none; font-size: 0.95rem; transition: 0.3s; }
    .menu-btn:hover { background: #000; transform: translateX(-3px); }
    
    /* Banner Pengantar */
    .intro-banner { 
        background: rgba(255, 255, 255, 0.15); /* Putih transparan biar cerah */
        padding: 35px; 
        border-radius: 15px; 
        margin-bottom: 35px; 
        border: 1px solid rgba(255, 255, 255, 0.3); 
    }
    .intro-banner h2 { font-family: 'Fredoka One', cursive; color: #FFD700; margin-top: 0; font-size: 1.8rem; text-shadow: 1px 1px 0px rgba(0,0,0,0.2); margin-bottom: 15px; }
    .intro-banner p { font-family: 'Open Sauce', sans-serif; line-height: 1.8; color: white; margin: 0; font-size: 1.05rem; }

    /* Tombol Akses & Download DDC */
    .action-container { display: flex; gap: 15px; margin-top: 25px; flex-wrap: wrap; }
    .btn-action { background: #111; color: #fff; padding: 12px 20px; border-radius: 25px; text-decoration: none; font-weight: bold; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 8px; transition: 0.2s; border: 1px solid rgba(255, 255, 255, 0.2); font-family: 'Open Sauce', sans-serif; }
    .btn-action:hover { background: #000; transform: translateY(-3px); border-color: #FFD700; }
    .btn-action.download { background: #cf3a20; border-color: #cf3a20; }
    .btn-action.download:hover { background: #a82e19; border-color: #FFD700; }

    /* Kotak Pencarian */
    .search-box { 
        width: 100%; 
        padding: 16px 25px; 
        border-radius: 30px; 
        border: none; 
        background: rgba(255, 255, 255, 0.95); /* Dibuat putih cerah seperti di kalkulator */
        color: #333; 
        font-weight: bold;
        font-size: 1.05rem; 
        margin-bottom: 35px; 
        outline: none; 
        font-family: 'Open Sauce', sans-serif; 
        transition: 0.3s;
    }
    .search-box:focus { box-shadow: 0 0 15px rgba(255, 215, 0, 0.5); }
    .search-box::placeholder { color: rgba(0, 0, 0, 0.4); font-weight: normal; }

    /* Grid Klasifikasi */
    .ddc-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; }
    
    .ddc-card { 
        background: rgba(255, 255, 255, 0.15); 
        padding: 25px; 
        border-radius: 15px; 
        border: 1px solid rgba(255, 255, 255, 0.3); 
        transition: 0.3s ease; 
        display: flex; 
        flex-direction: column; 
        justify-content: center;
    }
    .ddc-card:hover { background: rgba(255, 255, 255, 0.25); transform: translateY(-5px); border-color: #FFD700; box-shadow: 0 5px 15px rgba(0,0,0,0.15);}
    
    .ddc-code { font-family: 'Fredoka One', cursive; color: #FFD700; font-size: 1.6rem; margin-bottom: 10px; text-shadow: 1px 1px 0 rgba(0,0,0,0.3);}
    .ddc-title { font-family: 'Open Sauce', sans-serif; color: white; font-weight: bold; font-size: 1.1rem; margin: 0; line-height: 1.4; }
</style>
@endsection

@section('content')
    <div class="container">
        <!-- Navigasi Kembali -->
        <div class="top-nav">
            <a href="/lab-klasifikasi" class="menu-btn">← Kembali</a>
            <span style="opacity: 0.9; font-size: 0.95rem; font-family: 'Open Sauce', sans-serif; color: white; font-weight: bold;">Praktikum / Apa Sih DDC Itu?</span>
        </div>

        <div class="intro-banner">
            <h2>Sebenarnya ini angka apa sih...? 🤔</h2>
            <p>Pasti kalian pernah lihat nomor-nomor yang ada di rak perpustakaan kan? Itu disebut dengan <strong>Nomor Klasifikasi</strong>. Nomor ini diatur dengan beberapa sistem, namun yang paling lazim digunakan adalah <em>Dewey Decimal Classification (DDC)</em>. Dalam sistem DDC, seluruh ilmu pengetahuan dibagi menjadi 10 kategori utama dari 000 sampai 900.</p>
            
            <!-- Tombol Download 4 Volume & Akses DDC -->
            <div class="action-container">
                <a href="/dokumen/volume-1.pdf" download class="btn-action download">⬇️ DDC Vol. 1</a>
                <a href="/dokumen/VOLUME%202.pdf" download class="btn-action download">⬇️ DDC Vol. 2</a>
                <a href="/dokumen/VOLUME%203.pdf" download class="btn-action download">⬇️ DDC Vol. 3</a>
                <a href="/dokumen/VOLUME%204.pdf" download class="btn-action download">⬇️ DDC Vol. 4</a>
                
                <a href="https://www.oclc.org/en/dewey.html" target="_blank" class="btn-action">🌐 Akses e-DDC / WebDewey ↗</a>
            </div>
        </div>

        <input type="text" id="searchDDC" class="search-box" placeholder="Ketik kategori atau angka DDC (contoh: 300, Sains, Agama)..." onkeyup="filterDDC()">

        <div class="ddc-grid" id="ddcGrid">
            <div class="ddc-card" data-name="000 komputer informasi referensi umum">
                <div class="ddc-code">000</div><p class="ddc-title">Komputer, Informasi, dan Referensi Umum</p>
            </div>
            <div class="ddc-card" data-name="100 filsafat dan psikologi">
                <div class="ddc-code">100</div><p class="ddc-title">Filsafat dan Psikologi</p>
            </div>
            <div class="ddc-card" data-name="200 agama">
                <div class="ddc-code">200</div><p class="ddc-title">Agama</p>
            </div>
            <div class="ddc-card" data-name="300 ilmu sosial">
                <div class="ddc-code">300</div><p class="ddc-title">Ilmu Sosial</p>
            </div>
            <div class="ddc-card" data-name="400 bahasa">
                <div class="ddc-code">400</div><p class="ddc-title">Bahasa</p>
            </div>
            <div class="ddc-card" data-name="500 sains ilmu murni">
                <div class="ddc-code">500</div><p class="ddc-title">Sains</p>
            </div>
            <div class="ddc-card" data-name="600 teknologi ilmu terapan">
                <div class="ddc-code">600</div><p class="ddc-title">Teknologi</p>
            </div>
            <div class="ddc-card" data-name="700 seni dan rekreasi kesenian">
                <div class="ddc-code">700</div><p class="ddc-title">Seni dan Rekreasi</p>
            </div>
            <div class="ddc-card" data-name="800 sastra kesusastraan">
                <div class="ddc-code">800</div><p class="ddc-title">Sastra</p>
            </div>
            <div class="ddc-card" data-name="900 sejarah dan geografi">
                <div class="ddc-code">900</div><p class="ddc-title">Sejarah dan Geografi</p>
            </div>
        </div>
    </div>

    <script>
        function filterDDC() {
            let input = document.getElementById('searchDDC').value.toLowerCase();
            let cards = document.getElementsByClassName('ddc-card');
            for (let i = 0; i < cards.length; i++) {
                let text = cards[i].getAttribute('data-name');
                if (text.includes(input)) { cards[i].style.display = ""; } else { cards[i].style.display = "none"; }
            }
        }
    </script>
@endsection
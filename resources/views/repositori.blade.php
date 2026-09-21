@extends('layouts.main')
@section('title', 'Repositori Karya - NODE.US')

@section('custom-css')
<style>
    *, *::before, *::after { box-sizing: border-box; }
    
    .container { 
        max-width: 1100px; 
        margin: 100px auto 40px auto; 
        background: transparent; 
        padding: 20px 40px; 
        border-radius: 20px; 
        box-shadow: none; 
        position: relative; 
        z-index: 10; 
    }
    
    .top-nav { display: flex; align-items: center; margin-bottom: 30px; }
    .menu-btn { background: #111; color: #FFD700; border: none; padding: 10px 20px; border-radius: 25px; font-weight: bold; cursor: pointer; margin-right: 15px; text-decoration: none; font-size: 0.95rem; transition: 0.3s; position: relative; z-index: 15; }
    .menu-btn:hover { background: #000; transform: translateX(-3px); }
    
    h1 { font-family: 'Fredoka One', cursive; font-size: 2.3rem; margin-top: 0; text-shadow: 2px 2px 0px #cf3a20; color: white; margin-bottom: 25px; }

    /* Baris Pencarian & Filter */
    .filter-bar { display: flex; gap: 15px; margin-bottom: 35px; flex-wrap: wrap; position: relative; z-index: 15; }
    .search-input { 
        flex: 1; 
        min-width: 250px; 
        padding: 14px 20px; 
        border-radius: 25px; 
        border: none; 
        background: rgba(255, 255, 255, 0.95); 
        color: #333; 
        font-family: 'Open Sauce', sans-serif; 
        font-size: 1rem;
        font-weight: bold; 
        outline: none; 
        transition: 0.3s;
    }
    .search-input:focus { box-shadow: 0 0 15px rgba(255, 215, 0, 0.5); }
    .search-input::placeholder { color: rgba(0,0,0,0.4); font-weight: normal; }
    
    .filter-select { 
        padding: 14px 20px; 
        border-radius: 25px; 
        border: none; 
        background: rgba(255, 255, 255, 0.95); 
        color: #cf3a20; 
        font-family: 'Fredoka One', cursive; 
        font-size: 1rem;
        outline: none; 
        cursor: pointer; 
        transition: 0.3s;
    }
    .filter-select:focus { box-shadow: 0 0 15px rgba(255, 215, 0, 0.5); }

    .karya-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); 
        gap: 25px; 
        position: relative;
        z-index: 15;
    }
    
    .karya-card { 
        background: rgba(255, 255, 255, 0.15); 
        border-radius: 15px; 
        padding: 25px; 
        border: 1px solid rgba(255, 255, 255, 0.3); 
        display: flex; 
        flex-direction: column; 
        transition: 0.3s; 
    }
    .karya-card:hover { 
        background: rgba(255, 255, 255, 0.25); 
        transform: translateY(-5px); 
        border-color: #FFD700; 
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }
    
    .karya-img { width: 100%; height: 160px; background: rgba(255,255,255,0.9); border-radius: 10px; margin-bottom: 20px; display: flex; align-items: center; justify-content: center; font-family: 'Fredoka One', cursive; color: #cf3a20; font-size: 1.5rem; text-align: center; }
    .karya-title { font-family: 'Open Sauce', sans-serif; font-weight: bold; font-size: 1.1rem; color: white; margin: 0 0 10px 0; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    .karya-author { font-family: 'Open Sauce', sans-serif; font-size: 0.95rem; color: #FFD700; margin: 0 0 5px 0; font-weight: bold; }
    .karya-meta { font-family: 'Open Sauce', sans-serif; font-size: 0.85rem; color: rgba(255,255,255,0.9); margin: 0 0 20px 0; }
    
    .btn-lihat { margin-top: auto; align-self: flex-end; background: #111; color: white; padding: 10px 25px; border-radius: 25px; text-decoration: none; font-weight: bold; font-size: 0.9rem; font-family: 'Open Sauce', sans-serif; transition: 0.3s; border: 1px solid rgba(255,255,255,0.2); }
    .btn-lihat:hover { background: #000; border-color: #FFD700; }
    
    /* Pesan jika pencarian kosong */
    #noResultMessage { display: none; grid-column: 1 / -1; color: white; font-family: 'Open Sauce', sans-serif; text-align: center; padding: 30px; background: rgba(255,255,255,0.1); border-radius: 15px; }
</style>
@endsection

@section('content')
    <div class="container">
        <div class="top-nav">
            <a href="/" class="menu-btn">← Kembali</a>
            <span style="opacity: 0.9; font-size: 0.95rem; font-family: 'Open Sauce', sans-serif; color: white; font-weight: bold;">Showcase & Repositori</span>
        </div>

        <h1>Showcase dan Repositori Karya Mahasiswa</h1>

        <!-- Baris Filter & Pencarian (Ditambah ID dan Event Listener) -->
        <div class="filter-bar">
            <input type="text" id="searchKarya" class="search-input" placeholder="Cari judul atau nama penulis..." onkeyup="filterKarya()">
            
            <select id="filterJenis" class="filter-select" onchange="filterKarya()">
                <option value="">Semua Kategori</option>
                <option value="skripsi">Skripsi</option>
                <option value="jurnal">Jurnal</option>
            </select>
            
            <select id="filterTahun" class="filter-select" onchange="filterKarya()">
                <option value="">Semua Tahun</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2020">2020</option>
            </select>
        </div>

        <!-- Grid Karya Mahasiswa -->
        <div class="karya-grid" id="gridContainer">
            
            <!-- Kartu 1: Skripsi 2020 -->
            <div class="karya-card" data-title="Literasi Digital Dalam Menghadapi Informasi Pandemi Covid-19 Pada Mahasiswa" data-author="Regita Al Hafidha" data-jenis="skripsi" data-tahun="2020">
                <div class="karya-img">PDF<br>Repositori</div>
                <h3 class="karya-title">Literasi Digital Dalam Menghadapi Informasi Pandemi Covid-19 Pada Mahasiswa</h3>
                <p class="karya-author">Regita Al Hafidha</p>
                <p class="karya-meta">[Skripsi] - 2020</p>
                <a href="https://repository.unair.ac.id" target="_blank" class="btn-lihat">Lihat Karya</a>
            </div>

            <!-- Kartu 2: Skripsi 2023 -->
            <div class="karya-card" data-title="Perancangan Sistem Temu Kembali Informasi Arsip Statis Berbasis Web" data-author="Andi Setiawan" data-jenis="skripsi" data-tahun="2023">
                <div class="karya-img">PDF<br>Repositori</div>
                <h3 class="karya-title">Perancangan Sistem Temu Kembali Informasi Arsip Statis Berbasis Web</h3>
                <p class="karya-author">Andi Setiawan</p>
                <p class="karya-meta">[Skripsi] - 2023</p>
                <!-- href diubah jadi peringatan agar tidak melompat ke atas -->
                <a href="javascript:void(0)" onclick="alert('Ini adalah data dummy simulasi. Tidak ada file asli yang ditautkan.')" class="btn-lihat">Lihat Karya</a>
            </div>

            <!-- Kartu 3: Jurnal 2024 -->
            <div class="karya-card" data-title="Analisis Sentimen Pengguna Twitter Terhadap Layanan Perpustakaan Nasional" data-author="Siti Aminah" data-jenis="jurnal" data-tahun="2024">
                <div class="karya-img">PDF<br>Repositori</div>
                <h3 class="karya-title">Analisis Sentimen Pengguna Twitter Terhadap Layanan Perpustakaan Nasional</h3>
                <p class="karya-author">Siti Aminah</p>
                <p class="karya-meta">[Jurnal] - 2024</p>
                <!-- href diubah jadi peringatan agar tidak melompat ke atas -->
                <a href="javascript:void(0)" onclick="alert('Ini adalah data dummy simulasi. Tidak ada file asli yang ditautkan.')" class="btn-lihat">Lihat Karya</a>
            </div>
            
            <!-- Pesan jika tidak ada hasil -->
            <div id="noResultMessage">Maaf, karya dengan kriteria tersebut tidak ditemukan.</div>

        </div>
    </div>

    <!-- Script Filter Interaktif -->
    <script>
        function filterKarya() {
            // Ambil nilai dari input text dan dropdown
            let search = document.getElementById('searchKarya').value.toLowerCase();
            let jenis = document.getElementById('filterJenis').value.toLowerCase();
            let tahun = document.getElementById('filterTahun').value.toLowerCase();
            
            let cards = document.getElementsByClassName('karya-card');
            let visibleCount = 0;

            // Looping semua kartu untuk dicocokkan
            for (let i = 0; i < cards.length; i++) {
                let cardTitle = cards[i].getAttribute('data-title').toLowerCase();
                let cardAuthor = cards[i].getAttribute('data-author').toLowerCase();
                let cardJenis = cards[i].getAttribute('data-jenis').toLowerCase();
                let cardTahun = cards[i].getAttribute('data-tahun').toLowerCase();

                // Cek kecocokan (bisa berdasarkan judul ATAU penulis)
                let matchSearch = cardTitle.includes(search) || cardAuthor.includes(search);
                let matchJenis = (jenis === "" || cardJenis === jenis);
                let matchTahun = (tahun === "" || cardTahun === tahun);

                // Jika cocok ketiga syaratnya, tampilkan. Jika tidak, sembunyikan.
                if (matchSearch && matchJenis && matchTahun) {
                    cards[i].style.display = "flex";
                    visibleCount++;
                } else {
                    cards[i].style.display = "none";
                }
            }

            // Tampilkan pesan jika tidak ada kartu yang cocok
            if(visibleCount === 0) {
                document.getElementById('noResultMessage').style.display = "block";
            } else {
                document.getElementById('noResultMessage').style.display = "none";
            }
        }
    </script>
@endsection
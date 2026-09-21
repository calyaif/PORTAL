@extends('layouts.main')
@section('title', 'Peta Kurikulum & Panduan Studi - NODE.US')

@section('custom-css')
<style>
    .container { max-width: 1000px; margin: 0 auto; background: rgba(0,0,0,0.25); padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
    h1 { font-family: 'Fredoka One', cursive; font-size: 2.3rem; margin-top: 10px; text-shadow: 2px 2px 0px #cf3a20; color: white; }
    
    .top-nav { display: flex; align-items: center; margin-bottom: 20px; }
    .menu-btn {
        background: #111; color: #FFD700; border: none; padding: 8px 16px;
        border-radius: 20px; font-weight: bold; cursor: pointer; margin-right: 15px;
        text-decoration: none; font-size: 0.9rem;
    }
    
    .subtitle { 
        font-family: 'Open Sauce', sans-serif; 
        line-height: 1.6; 
        color: rgba(255, 255, 255, 0.9); 
        margin-bottom: 30px; 
        font-size: 1.05rem; 
    }

    /* Kotak Semester */
    .semester-box { 
        background: rgba(255, 255, 255, 0.15); 
        padding: 25px; 
        border-radius: 15px; 
        margin-top: 25px; 
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .semester-box h3 { 
        margin-top: 0; 
        font-family: 'Fredoka One', cursive; 
        color: #ffd700; 
        font-size: 1.25rem; 
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        padding-bottom: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .semester-guide {
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.9);
        margin: 12px 0 15px 0;
        line-height: 1.5;
        font-style: italic;
        background: rgba(0, 0, 0, 0.15);
        padding: 10px 15px;
        border-left: 4px solid #FFD700;
        border-radius: 0 8px 8px 0;
    }

    .semester-box h4 {
        color: #fff;
        font-size: 0.9rem;
        margin: 15px 0 6px 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .course-list {
        list-style-type: none;
        padding-left: 0;
        margin: 0;
    }

    .course-item {
        display: flex;
        justify-content: space-between;
        background: rgba(0, 0, 0, 0.15);
        padding: 8px 12px;
        margin-bottom: 5px;
        border-radius: 8px;
        font-size: 0.92rem;
        color: #fff;
    }

    .course-item span.sks {
        background: rgba(255, 215, 0, 0.2);
        color: #FFD700;
        padding: 2px 8px;
        border-radius: 6px;
        font-weight: bold;
    }

    /* Tombol Aksi */
    .action-container {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .btn-action {
        background: #111;
        color: #fff;
        padding: 12px 25px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: bold;
        font-size: 0.95rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: 0.2s;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .btn-action:hover {
        background: #000;
        transform: translateY(-2px);
        border-color: #FFD700;
    }
</style>
@endsection

@section('content')
    <div class="container">
        <!-- Navigasi Kembali -->
        <div class="top-nav">
            <a href="/kurikulum" class="menu-btn">← Kembali ke Kurikulum</a>
            <span style="opacity: 0.8; font-size: 0.9rem;">Akademik & Kurikulum / Peta Kurikulum</span>
        </div>

        <!-- Judul Utama -->
        <h1>Peta Struktur Kurikulum 2024 & Panduan Studi</h1>
        <p class="subtitle">Panduan lengkap sebaran mata kuliah, bobot SKS, serta strategi alur studi tiap semester di Program Studi S1 Ilmu Informasi dan Perpustakaan (IIP) UNAIR.</p>
        
        <!-- SEMESTER 1 -->
        <div class="semester-box">
            <h3><span>Semester 1</span> <span style="font-size: 0.9rem; color: #fff;">Total: 20 SKS</span></h3>
            <div class="semester-guide">
                💡 <strong>Panduan:</strong> Mahasiswa belum perlu melakukan <em>war</em> kelas. Seluruh mata kuliah wajib universitas dilakukan di Pembelajaran Dasar Bersama (PDB) (seperti Agama, Pancasila) dan dasar ditawarkan secara paket dan tersusun otomatis. Fokuslah menyesuaikan diri dengan ritme akademik kampus. Selain itu, PDB akan dilaksanakan di Kampus C UNAIR di Gedung Kulliah Bersama (GKB) atau Gedung Nano. Adapun yang melaksanakan PDB di Kampus B UNAIR, di gedung Eks-Farmasi. PDB akan dilaksanakan selama 1-2 semester, tergantung peraturan di tahun ajaran tersebut.
            </div>
            <h4>Mata Kuliah Wajib Universitas / Fakultas & Dasar</h4>
            <ul class="course-list">
                <li class="course-item"><span>Bahasa Indonesia</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Pancasila</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Kewarganegaraan</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Pilihan Agama (Islam / Kristen / Katolik / Hindu / Buddha / Kong Hu Chu)</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Data dan Pustaka</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Bahasa Inggris</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Etika Sosial Politik</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Logika dan Pemikiran Kritis</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Kemampuan Komunikasi dan Pengembangan Diri</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Pengantar Kolaborasi Keilmuan</span> <span class="sks">2 SKS</span></li>
            </ul>
        </div>

        <!-- SEMESTER 2 -->
        <div class="semester-box">
            <h3><span>Semester 2</span> <span style="font-size: 0.9rem; color: #fff;">Total: 20 SKS</span></h3>
            <div class="semester-guide">
                💡 <strong>Panduan:</strong> Memasuki pengenalan inti kepustakawanan (Pengantar IIP, Organisasi Informasi, Klasifikasi, dan Kearsipan). Ini adalah fase fondasi penting sebelum masuk ke tingkat analisis yang lebih mendalam.
            </div>
            <h4>Mata Kuliah Wajib Program Studi & Fakultas</h4>
            <ul class="course-list">
                <li class="course-item"><span>Teknik Penulisan Ilmiah</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Dasar Metodologi Penelitian Sosial</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Filsafat Ilmu</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Pengantar Ilmu Informasi dan Perpustakaan</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Dasar Organisasi Informasi</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Pengantar Kearsipan dan Dokumentasi</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Sistem Klasifikasi</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Manajemen Data</span> <span class="sks">2 SKS</span></li>
            </ul>
        </div>

        <!-- SEMESTER 3 -->
        <div class="semester-box">
            <h3><span>Semester 3</span> <span style="font-size: 0.9rem; color: #fff;">Wajib: 22 SKS | Pilihan: 12 SKS</span></h3>
            <div class="semester-guide">
                💡 <strong>Panduan:</strong> Beban studi mulai padat dengan riset kuantitatif dan sistem informasi. Mulai perhatikan pencapaian IPS agar kamu punya keleluasaan mengambil kuota SKS maksimal di semester berikutnya.
            </div>
            <h4>Mata Kuliah Wajib Program Studi</h4>
            <ul class="course-list">
                <li class="course-item"><span>Metode Penelitian Kuantitatif</span> <span class="sks">4 SKS</span></li>
                <li class="course-item"><span>Pengembangan Koleksi</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Pengindeksan dan Analisis Subjek</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Sistem Informasi Perpustakaan</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Sumber dan Layanan Informasi</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Sistem Temu Kembali Informasi</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Literasi Informasi</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Bahasa Inggris Lanjut</span> <span class="sks">2 SKS</span></li>
            </ul>
            <h4>Mata Kuliah Pilihan (Opsional)</h4>
            <ul class="course-list">
                <li class="course-item"><span>Kajian Publikasi dan HaKI</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Analisis Sistem Perpustakaan</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Kajian Literasi dan Budaya Baca</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Kajian Ruang Pusat Informasi</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Kajian Informasi dan Gender</span> <span class="sks">2 SKS</span></li>
            </ul>
        </div>

        <!-- SEMESTER 4 -->
        <div class="semester-box">
            <h3><span>Semester 4</span> <span style="font-size: 0.9rem; color: #fff;">Wajib: 19 SKS | Pilihan: 15 SKS</span></h3>
            <div class="semester-guide">
                💡 <strong>Panduan:</strong> Eksplorasi mendalam ke arah perpustakaan digital, manajemen arsip dinamis, dan perancangan aplikasi. Mulai pilih mata kuliah pilihan yang sejalan dengan ketertarikan risetmu.
            </div>
            <h4>Mata Kuliah Wajib Program Studi</h4>
            <ul class="course-list">
                <li class="course-item"><span>Sistem Katalogisasi</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Teori Ilmu Sosial untuk IIP</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Perilaku Informasi</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Perancangan Aplikasi Perpustakaan</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Manajemen Koleksi Non Buku</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Manajemen Arsip Dinamis</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Perpustakaan Digital</span> <span class="sks">3 SKS</span></li>
            </ul>
            <h4>Mata Kuliah Pilihan (Opsional)</h4>
            <ul class="course-list">
                <li class="course-item"><span>Etika Informasi</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Kajian Informasi dan Psikologi</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Kajian Kolaborasi Informasi dan Perpustakaan</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Informasi dan Kelompok Khusus</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Informasi dan Kebudayaan</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Analisis Informasi Bisnis</span> <span class="sks">3 SKS</span></li>
            </ul>
        </div>

        <!-- SEMESTER 5 -->
        <div class="semester-box">
            <h3><span>Semester 5</span> <span style="font-size: 0.9rem; color: #fff;">Wajib: 17 SKS | Pilihan: 11 SKS</span></h3>
            <div class="semester-guide">
                💡 <strong>Panduan:</strong> Semester penentuan fokus peminatan (Manajemen Perpustakaan, Kearsipan, atau Sistem Informasi). Penguatan metodologi lanjutan dan manajemen portal informasi dipelajari di sini.
            </div>
            <h4>Mata Kuliah Wajib Program Studi</h4>
            <ul class="course-list">
                <li class="course-item"><span>Total Quality Management (TQM)</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Manajemen Arsip Statis</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Metode Penelitian Informasi dan Perpustakaan</span> <span class="sks">4 SKS</span></li>
                <li class="course-item"><span>Perancangan Portal dan Aplikasi Informasi</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Manajemen Jasa Informasi</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Masyarakat Informasi</span> <span class="sks">3 SKS</span></li>
            </ul>
            <h4>Mata Kuliah Pilihan (Opsional)</h4>
            <ul class="course-list">
                <li class="course-item"><span>Informetrika</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Manajemen Arsip Elektronik</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Knowledge Management</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Kebijakan Informasi</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Manajemen Krisis dalam Informasi</span> <span class="sks">3 SKS</span></li>
            </ul>
        </div>

        <!-- SEMESTER 6 -->
        <div class="semester-box">
            <h3><span>Semester 6</span> <span style="font-size: 0.9rem; color: #fff;">Wajib: 14 SKS | Pilihan: 8 SKS</span></h3>
            <div class="semester-guide">
                💡 <strong>Panduan:</strong> Masa transisi menuju dunia profesional. Mulai mengaplikasikan teori ke dalam dunia kerja nyata melalui mata kuliah Magang (3 SKS), preservasi, serta pemasaran informasi.
            </div>
            <h4>Mata Kuliah Wajib Program Studi</h4>
            <ul class="course-list">
                <li class="course-item"><span>Pilihan Agama II (Lanjutan)</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Manajemen Preservasi, Konservasi, & Restorasi</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Kajian Masalah Informasi dan Perpustakaan</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Pemasaran Informasi</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Magang</span> <span class="sks">3 SKS</span></li>
            </ul>
            <h4>Mata Kuliah Pilihan (Opsional)</h4>
            <ul class="course-list">
                <li class="course-item"><span>Perencanaan Strategik Lembaga Informasi</span> <span class="sks">2 SKS</span></li>
                <li class="course-item"><span>Perancangan Komersial Elektronik</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Sains Data untuk Ilmu Sosial</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Audit Informasi</span> <span class="sks">2 SKS</span></li>
            </ul>
        </div>

        <!-- SEMESTER 7 & 8 -->
        <div class="semester-box">
            <h3><span>Semester 7 & 8</span> <span style="font-size: 0.9rem; color: #fff;">Riset & Tugas Akhir</span></h3>
            <div class="semester-guide">
                💡 <strong>Panduan:</strong> Tahap akhir perkuliahan. Fokus menyelesaikan Kuliah Kerja Nyata (KKN), menyusun Proposal Skripsi, atau mengonversi SKS melalui program MBKM hingga mencapai muara kelulusan (Skripsi).
            </div>
            <h4>Semester 7</h4>
            <ul class="course-list">
                <li class="course-item"><span>Kuliah Kerja Nyata (KKN)</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Proposal Skripsi Ilmu Informasi dan Perpustakaan</span> <span class="sks">3 SKS</span></li>
                <li class="course-item"><span>Pilihan / Konversi Program MBKM (Magang Terstruktur, KKN Tematik, Riset, dll.)</span> <span class="sks">Hingga 20 SKS</span></li>
            </ul>
            <h4 style="margin-top: 15px;">Semester 8</h4>
            <ul class="course-list">
                <li class="course-item"><span>Skripsi (Tugas Akhir)</span> <span class="sks">6 SKS</span></li>
            </ul>
        </div>

        <!-- Tombol Pintasan Aksi Cepat -->
        <div class="action-container">
            <a href="/katalog-matkul" class="btn-action">📚 Buka Katalog Mata Kuliah & RPS</a>
            <a href="https://dip.fisip.unair.ac.id/kurikulum/" target="_blank" class="btn-action">🌐 Arsip Kurikulum Resmi DIP FISIP ↗</a>
        </div>
    </div>
@endsection
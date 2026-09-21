<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kelola Berita</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sauce&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; padding: 0; font-family: 'Open Sauce', sans-serif; display: flex; height: 100vh; background-color: #f4f6f9; color: #333; }
        
        /* Sidebar */
        .sidebar { width: 260px; background: linear-gradient(to bottom, #8a1c14, #e24933); color: #fdf6ec; display: flex; flex-direction: column; box-shadow: 4px 0 15px rgba(0,0,0,0.1); z-index: 10; }
        .sidebar-header { padding: 30px 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar-header h2 { margin: 0; font-family: 'Arial Black', sans-serif; letter-spacing: 2px; font-size: 1.8rem; }
        .sidebar-header p { margin: 5px 0 0 0; font-size: 0.85rem; opacity: 0.8; }
        .nav-links { list-style: none; padding: 20px 0; margin: 0; flex-grow: 1; }
        .nav-links li { margin-bottom: 5px; }
        .nav-links a { display: block; color: #fdf6ec; text-decoration: none; padding: 15px 25px; font-weight: bold; transition: all 0.3s; border-left: 4px solid transparent; }
        .nav-links a:hover { background: rgba(255, 255, 255, 0.1); }
        .nav-links a.active { background: rgba(255, 255, 255, 0.2); border-left-color: #ffd700; color: #ffd700; }
        .back-to-web { padding: 20px; border-top: 1px solid rgba(255,255,255,0.1); }
        .back-to-web a { display: block; text-align: center; background: rgba(0,0,0,0.3); color: #fff; text-decoration: none; padding: 12px; border-radius: 8px; font-size: 0.9rem; transition: 0.3s; margin-bottom: 12px; }
        .back-to-web a:hover { background: rgba(0,0,0,0.5); }
        .btn-logout { background: #e74c3c; color: white; width: 100%; padding: 12px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 0.9rem; transition: 0.3s; }
        .btn-logout:hover { background: #c0392b; transform: translateY(-2px); }
        
        /* Konten Utama */
        .main-content { flex-grow: 1; padding: 40px; overflow-y: auto; }
        .page-title { margin-top: 0; font-size: 2rem; color: #8a1c14; margin-bottom: 30px; }
        .alert-success { background-color: #d4edda; color: #155724; padding: 15px 20px; border-radius: 8px; border: 1px solid #c3e6cb; margin-bottom: 25px; font-weight: bold; }
        
        /* Layout Grid */
        .content-grid { display: grid; grid-template-columns: 1fr 1.5fr; gap: 30px; }
        
        /* Kotak Form & Tabel */
        .card { background: #ffffff; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
        .card h3 { margin-top: 0; margin-bottom: 20px; color: #333; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: #555; }
        input[type="text"], input[type="file"], textarea { width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box; font-family: inherit; background-color: #f9f9f9; resize: vertical; }
        input[type="text"]:focus, textarea:focus { outline: none; border-color: #e24933; background-color: #fff; }
        button { width: 100%; padding: 14px; background-color: #ffd700; color: #111; border: none; border-radius: 8px; font-weight: bold; font-size: 1.1rem; cursor: pointer; transition: 0.3s; margin-top: 10px; }
        button:hover { background-color: #e6c200; transform: translateY(-2px); }

        /* Tabel */
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #f4f6f9; font-weight: bold; color: #666; }
        td img { width: 80px; height: 60px; object-fit: cover; border-radius: 8px; }
        
        @media (max-width: 1000px) { .content-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>NODE.US</h2>
            <p>Admin Portal IIP</p>
        </div>
        <ul class="nav-links">
            <!-- Hapus class="active" dari sini -->
            <li><a href="/admin">❖ Kebanggaan IIP</a></li>
            
            <!-- Pindahkan class="active" ke sini -->
            <li><a href="/admin/berita" class="active">📝 Berita Terkini</a></li>
            
            <li><a href="#">⚙️ Pengaturan Web</a></li>
        </ul>
        
        <div class="back-to-web">
            <a href="/home">← Kembali ke Website</a>
            
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Log Out (Keluar)</button>
            </form>
        </div>
    </aside>

    <!-- KONTEN UTAMA -->
    <main class="main-content">
        <h1 class="page-title">Kelola Berita Terkini</h1>
        
        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        <div class="content-grid">
            
            <!-- KIRI: FORM TAMBAH BERITA -->
            <div class="card">
                <h3>Tulis Berita Baru</h3>
                <form action="/admin/berita/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="judul" required placeholder="Masukkan judul berita...">
                    </div>
                    <div class="form-group">
                        <label>Cuplikan Singkat</label>
                        <input type="text" name="cuplikan" required placeholder="Tampil di kotak depan...">
                    </div>
                    <div class="form-group">
                        <label>Isi Berita Lengkap</label>
                        <!-- Textarea agar bisa menampung teks panjang dan baris baru -->
                        <textarea name="isi" rows="6" required placeholder="Tulis detail berita di sini..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar / Thumbnail Berita</label>
                        <input type="file" name="gambar" required accept="image/*">
                    </div>
                    <button type="submit">+ Publish Berita</button>
                </form>
            </div>

            <!-- KANAN: TABEL DAFTAR BERITA -->
            <div class="card">
                <h3>Daftar Berita Saat Ini</h3>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul & Cuplikan</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($berita as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><img src="{{ asset('images/' . $item->gambar) }}" alt="Berita"></td>
                            <td>
                                <strong>{{ $item->judul }}</strong><br>
                                <span style="font-size: 0.85rem; color: #666;">{{ $item->cuplikan }}</span>
                            </td>
                            <td style="text-align: center; white-space: nowrap;">
                                <!-- Tombol Hapus Berita -->
                                <form action="/admin/berita/delete/{{ $item->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: #e74c3c; color: white; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; font-size: 0.85rem; width: auto; margin-top:0;">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 30px; color: #888;">
                                Belum ada berita yang dipublikasikan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </main>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - NODE.US</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sauce&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sauce', sans-serif;
            display: flex;
            height: 100vh;
            background-color: #f4f6f9;
            color: #333;
        }

        /* Sidebar (Tetap sama) */
        .sidebar {
            width: 260px;
            background: linear-gradient(to bottom, #8a1c14, #e24933);
            color: #fdf6ec;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
            z-index: 10;
        }
        .sidebar-header {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar-header h2 { margin: 0; font-family: 'Arial Black', sans-serif; letter-spacing: 2px; font-size: 1.8rem; }
        .sidebar-header p { margin: 5px 0 0 0; font-size: 0.85rem; opacity: 0.8; }
        .nav-links { list-style: none; padding: 20px 0; margin: 0; flex-grow: 1; }
        .nav-links li { margin-bottom: 5px; }
        .nav-links a { display: block; color: #fdf6ec; text-decoration: none; padding: 15px 25px; font-weight: bold; transition: all 0.3s; border-left: 4px solid transparent; }
        .nav-links a:hover { background: rgba(255, 255, 255, 0.1); }
        .nav-links a.active { background: rgba(255, 255, 255, 0.2); border-left-color: #ffd700; color: #ffd700; }
        .back-to-web { padding: 20px; border-top: 1px solid rgba(255,255,255,0.1); }
        .back-to-web a { display: block; text-align: center; background: rgba(0,0,0,0.3); color: #fff; text-decoration: none; padding: 12px; border-radius: 8px; font-size: 0.9rem; transition: 0.3s; }
        .back-to-web a:hover { background: rgba(0,0,0,0.5); }

        /* Konten Utama */
        .main-content {
            flex-grow: 1;
            padding: 40px;
            overflow-y: auto;
        }
        .page-title { margin-top: 0; font-size: 2rem; color: #8a1c14; margin-bottom: 30px; }

        /* Pesan Sukses */
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px 20px;
            border-radius: 8px;
            border: 1px solid #c3e6cb;
            margin-bottom: 25px;
            font-weight: bold;
        }

        /* Layout Grid untuk Form dan Tabel */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr; /* Lebar kolom form vs tabel */
            gap: 30px;
        }

        /* Kotak Form */
        .card {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }
        .card h3 { margin-top: 0; margin-bottom: 20px; color: #333; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: #555; }
        input[type="text"], input[type="file"] { width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box; font-family: inherit; background-color: #f9f9f9; }
        input[type="text"]:focus { outline: none; border-color: #e24933; background-color: #fff; }
        button { width: 100%; padding: 14px; background-color: #ffd700; color: #111; border: none; border-radius: 8px; font-weight: bold; font-size: 1.1rem; cursor: pointer; transition: 0.3s; margin-top: 10px; }
        button:hover { background-color: #e6c200; transform: translateY(-2px); }

        /* Desain Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        th { background-color: #f4f6f9; font-weight: bold; color: #666; }
        td img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
            background-color: #ef451e; /* Background oranye agar foto transparan terlihat jelas */
        }
        
        /* Responsif (Jika layar kecil, tabel turun ke bawah form) */
        @media (max-width: 1000px) {
            .content-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>NODE.US</h2>
            <p>Admin Portal IIP</p>
        </div>
        <ul class="nav-links">
            <li><a href="/admin" class="active">❖ Kebanggaan IIP</a></li>
            <li><a href="/admin/berita">📝 Berita Terkini</a></li>
            <li><a href="#">⚙️ Pengaturan Web</a></li>
        </ul>
        <div class="back-to-web">
            <a href="/home">← Kembali ke Website</a>
        </div>
        <div style="padding: 20px; border-top: 1px solid rgba(255,255,255,0.1);">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" style="background: rgba(255,0,0,0.3); color: white; width: 100%; padding: 10px; border: 1px solid rgba(255,255,255,0.2); border-radius: 8px; font-weight: bold; cursor: pointer;">Log Out (Keluar)</button>
            </form>
        </div>
    </aside>

    <main class="main-content">
        <h1 class="page-title">Kelola Kebanggaan IIP</h1>
        
        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="alert-success">
                ✅ {{ session('success') }}
            </div>
        @endif

        <!-- Grid Container -->
        <div class="content-grid">
            
            <!-- Sisi Kiri: Kotak Form -->
            <div class="card">
                <h3>Tambah Data Baru</h3>
                <form action="/admin/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Tokoh</label>
                        <input type="text" name="nama" required placeholder="Contoh: Arin Nabilah">
                    </div>
                    <div class="form-group">
                        <label>Prestasi / Keterangan</label>
                        <input type="text" name="prestasi" required placeholder="Contoh: Mahasiswa Berprestasi">
                    </div>
                    <div class="form-group">
                        <label>Upload Foto Stiker (Wajib PNG)</label>
                        <input type="file" name="foto" required accept="image/png">
                    </div>
                    <button type="submit">+ Simpan Data</button>
                </form>
            </div>

            <!-- Sisi Kanan: Tabel Data -->
            <div class="card">
                <h3>Daftar Data Saat Ini</h3>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama & Prestasi</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tokoh as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><img src="{{ asset('images/' . $item->foto) }}" alt="Foto"></td>
                            <td>
                                <strong>{{ $item->nama }}</strong><br>
                                <span style="font-size: 0.85rem; color: #666;">{{ $item->prestasi }}</span>
                            </td>
                            <td style="text-align: center; white-space: nowrap;">
                                <!-- Tombol Edit -->
                                <a href="/admin/edit/{{ $item->id }}" style="background: #3498db; color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.85rem; margin-right: 5px; display: inline-block;">Edit</a>
                                
                                <!-- Tombol Hapus (Menggunakan Form dengan Method DELETE) -->
                                <form action="/admin/delete/{{ $item->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: #e74c3c; color: white; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; font-size: 0.85rem; width: auto; margin-top:0;">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 30px; color: #888;">
                                Belum ada data tokoh yang ditambahkan.
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
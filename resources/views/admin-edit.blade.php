<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data - NODE.US Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sauce&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sauce', sans-serif;
            background: linear-gradient(to right, #f53d33, #fa924b);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 450px;
        }
        h2 { margin-top: 0; color: #8a1c14; font-family: 'Arial Black', sans-serif; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: #555; }
        input[type="text"], input[type="file"] { width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box; font-family: inherit; background-color: #f9f9f9; }
        .preview-img { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; margin-bottom: 10px; background-color: #ef451e; }
        button { width: 100%; padding: 14px; background-color: #ffd700; color: #111; border: none; border-radius: 8px; font-weight: bold; font-size: 1.1rem; cursor: pointer; transition: 0.3s; margin-top: 10px; }
        button:hover { background-color: #e6c200; }
        .back-link { display: block; text-align: center; margin-top: 20px; color: #666; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="card">
        <h2>Edit Tokoh Kebanggaan</h2>
        
        <!-- Karena method PUT, kita gunakan directive @method('PUT') -->
        <form action="/admin/update/{{ $tokoh->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label>Nama Tokoh</label>
                <input type="text" name="nama" value="{{ $tokoh->nama }}" required>
            </div>
            
            <div class="form-group">
                <label>Prestasi / Keterangan</label>
                <input type="text" name="prestasi" value="{{ $tokoh->prestasi }}" required>
            </div>
            
            <div class="form-group">
                <label>Foto Saat Ini:</label>
                <img src="{{ asset('images/' . $tokoh->foto) }}" class="preview-img" alt="Foto">
                <label>Ganti Foto (Opsional, kosongkan jika tidak ingin mengubah)</label>
                <input type="file" name="foto" accept="image/png,image/jpeg">
            </div>
            
            <button type="submit">Simpan Perubahan</button>
        </form>
        
        <a href="/admin" class="back-link">← Batal / Kembali ke Dashboard</a>
    </div>

</body>
</html>
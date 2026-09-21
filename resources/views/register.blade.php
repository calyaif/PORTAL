<!DOCTYPE html>
<html lang="id">
<head>
    <title>Register - NODE.US</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sauce&display=swap" rel="stylesheet">
    <style>
        /* CSS-nya sama dengan login */
        body { font-family: 'Open Sauce', sans-serif; background: linear-gradient(to left, #f53d33, #fa924b); display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: #fee78c; padding: 40px; border-radius: 12px; width: 350px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        h2 { text-align: center; margin-top: 0; color: #8a1c14; font-family: 'Arial Black', sans-serif; }
        .input-group { margin-bottom: 15px; }
        input { width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #3498db; color: white; border: none; font-weight: bold; border-radius: 8px; cursor: pointer; font-size: 1.1rem; }
        .link { text-align: center; margin-top: 15px; font-size: 0.9rem; display: block; color: #555; text-decoration: none;}
        .link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Daftar Akun Baru</h2>
        <form action="/register" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="name" placeholder="Nama Lengkap" required>
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password (Min. 6 huruf)" required>
            </div>
            <button type="submit">Daftar Akun</button>
        </form>
        <a href="/login" class="link">Sudah punya akun? Login</a>
    </div>
</body>
</html>
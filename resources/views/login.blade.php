<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login Admin - NODE.US</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sauce&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Open Sauce', sans-serif; background: linear-gradient(to right, #f53d33, #fa924b); display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: #fee78c; padding: 40px; border-radius: 12px; width: 350px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        h2 { text-align: center; margin-top: 0; color: #8a1c14; font-family: 'Arial Black', sans-serif; }
        .input-group { margin-bottom: 20px; }
        input { width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #ffd700; border: none; font-weight: bold; border-radius: 8px; cursor: pointer; font-size: 1.1rem; }
        .error { color: red; font-size: 0.9rem; margin-bottom: 15px; text-align: center; }
        .success { color: green; font-size: 0.9rem; margin-bottom: 15px; text-align: center; background: #d4edda; padding: 10px; border-radius: 5px;}
        .link { text-align: center; margin-top: 15px; font-size: 0.9rem; display: block; color: #555; text-decoration: none;}
        .link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Login Admin</h2>
        
        @if(session('success')) <div class="success">{{ session('success') }}</div> @endif
        @if($errors->any()) <div class="error">{{ $errors->first() }}</div> @endif

        <form action="/login" method="POST">
            @csrf
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Masuk</button>
        </form>
        <a href="/register" class="link">Belum punya akun? Daftar di sini</a>
        <a href="/home" class="link" style="margin-top: 5px;">← Kembali ke Beranda</a>
    </div>
</body>
</html>
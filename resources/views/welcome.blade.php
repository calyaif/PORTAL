<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NODE.US - IIP UNAIR</title>
    <style>
        @font-face {
            font-family: 'Muro';
            src: url('{{asset('fonts/Muro.otf')}}')
        }
        @font-face {
            font-family: 'Aishiteru Lover';
            src: url('{{asset('fonts/Aishiteru-Lover.ttf')}}')
        }
        @font-face {
            font-family: 'Fair Prosper';
            src: url('{{asset('fonts/Fair-Prosper.ttf')}}')
        }
        body {
            background: linear-gradient(to right, #ff3131, #ff914d); /* Warna latar oranye */
            color: #fdf6ec; /* Warna teks off-white */
            margin: 0;
            padding: 0;
            font-family: 'Muro', sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }
        .header {
            display: flex;
            justify-content: space-between;
            padding: 2rem 3rem;
            font-weight: 700;
            font-size: 1.5rem;
        }
        .main-content {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .text-cursive-top {
            position: absolute;
            top: 2%;
            left: 36%;
            font-family: 'Aishiteru Lover', cursive; /* Font latin */
            font-size: 5.5rem;
            color: #0b0b0b;
            transform: rotate(-5deg);
            z-index: 10;
        }
        .text-node {
            font-family: 'Muro', sans-serif; /* Font tebal */
            font-size: 27vw;
            line-height: 1;
            letter-spacing: 2px;
            background-image: url('{{ asset('images/texture.png') }}'), linear-gradient(#fdf6ec, #fffae5);
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply;
    
            -webkit-background-clip: text;
            color: transparent;
            z-index: 5;
            transform: translateY(-10vh);
        }
        .text-cursive-bottom {
            position: absolute;
            bottom: 8%;
            right: 10%;
            font-family: 'Fair Prosper', cursive;
            font-size: 4.5rem;
            color: #0b0b0b;
            transform: rotate(-10deg);
            z-index: 99;
        }
        .text-cursive-bottom a {
            color: #0b0b0b;
            text-decoration: none; /* Menghilangkan garis bawah link */
            transition: opacity 0.3s ease;
        }
        .text-cursive-bottom a:hover {
            opacity: 0.7; /* Efek meredup saat kursor diarahkan */
        }
        .footer-text {
            position: absolute;
            bottom: 2rem;
            left: 3rem;
            width: 350px;
            font-size: 0.85rem;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <!-- Bagian Atas -->
    <div class="header">
        <div>IIP</div>
        <div>2028</div>
        <div>UNAIR</div>
    </div>

    <!-- Bagian Tengah Utama -->
    <div class="main-content">
        <div class="text-cursive-top">Welcome to</div>
        <div class="text-node">NODE.US</div>
        <div class="text-cursive-bottom"><a href="home">Let's explore.</a></div>
    </div>

    <!-- Bagian Kiri Bawah -->
    <div class="footer-text">
        Explore the world of Library and Information Science with a variety of tips and tricks. Wander through this vast world to discover information
    </div>
</body>
</html>
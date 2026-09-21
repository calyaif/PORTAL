@extends('layouts.main')
@section('title', 'Katalog Mata Kuliah - NODE.US')

@section('custom-css')
<style>
    .container { max-width: 950px; margin: 0 auto; background: rgba(0,0,0,0.25); padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
    h1 { font-family: 'Fredoka One', cursive; font-size: 2.5rem; margin-top: 0; text-shadow: 2px 2px 0px #cf3a20; color: white; }
    
    .top-nav { display: flex; align-items: center; margin-bottom: 20px; }
    .menu-btn {
        background: #111; color: #FFD700; border: none; padding: 8px 16px;
        border-radius: 20px; font-weight: bold; cursor: pointer; margin-right: 15px;
        text-decoration: none; font-size: 0.9rem;
    }

    .filter-container { margin-bottom: 30px; margin-top: 20px; }
    .filter-btn {
        background: rgba(255, 255, 255, 0.2);
        border: none; padding: 8px 16px; border-radius: 20px;
        color: white; cursor: pointer; margin-right: 8px; margin-bottom: 8px; font-weight: bold;
        transition: 0.2s;
    }
    .filter-btn:hover, .filter-btn.active { background: #FFD700; color: #333; }

    /* Styling Judul Semester */
    .semester-title {
        font-family: 'Fredoka One', cursive;
        color: #FFD700;
        font-size: 1.5rem;
        margin-top: 35px;
        margin-bottom: 15px;
        border-bottom: 2px dashed rgba(255, 255, 255, 0.3);
        padding-bottom: 5px;
    }

    .grid-container {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 15px;
    }
    .glass-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 20px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: 0.3s;
    }
    .glass-card:hover { background: rgba(255, 255, 255, 0.25); transform: translateY(-3px); }
    .glass-card h3 { color: #FFD700; margin-top: 0; font-family: 'Fredoka One', cursive; font-size: 1.1rem; }
    p { font-family: 'Open Sauce', sans-serif; line-height: 1.5; color: white; font-size: 0.9rem; }
</style>
@endsection

@section('content')
    <div class="container">
        <div class="top-nav">
            <a href="/kurikulum" class="menu-btn">← Kembali ke Kurikulum</a>
            <span style="opacity: 0.8; font-size: 0.9rem;">Akademik & Kurikulum / Katalog</span>
        </div>

        <h1>Katalog Mata Kuliah & RPS</h1>
        <p>Eksplorasi ringkasan silabus, Rencana Pembelajaran Semester (RPS), dan bobot SKS program studi secara terstruktur.</p>

        <!-- Tombol Filter Semester & Link Kurikulum Resmi UNAIR -->
        <div class="filter-container" style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center;">
            <div>
                <a href="/katalog-matkul"><button class="filter-btn {{ !request('smt') ? 'active' : '' }}">Semua Semester</button></a>
                @for ($i = 1; $i <= 8; $i++)
                    <a href="/katalog-matkul?smt={{ $i }}"><button class="filter-btn {{ request('smt') == $i ? 'active' : '' }}">Semester {{ $i }}</button></a>
                @endfor
            </div>

            <!-- Tombol Arsip Kurikulum Tahun Lain / Website Resmi DIP FISIP UNAIR -->
            <div>
                <a href="https://dip.fisip.unair.ac.id/kurikulum/" target="_blank" style="text-decoration: none;">
                    <button class="filter-btn" style="background: rgba(255, 215, 0, 0.3); border: 1px solid #FFD700; color: #FFD700;">
                        🌐 Arsip Kurikulum Lain (UNAIR) ↗
                    </button>
                </a>
            </div>
        </div>
        <!-- Looping Pengelompokan Berdasarkan Semester -->
        @foreach($courses as $semester => $semesterCourses)
            <div class="semester-section">
                <div class="semester-title">📚 Semester {{ $semester }}</div>
                
                <div class="grid-container">
                    @foreach($semesterCourses as $course)
                        <div class="glass-card">
                            <h3>{{ $course->name }}</h3>
                            <p><strong>{{ $course->code }}</strong> | SKS: {{ $course->sks }}</p>
                            <p>{{ $course->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
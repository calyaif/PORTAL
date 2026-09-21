<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kebanggaan;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        $tokoh = Kebanggaan::latest()->get(); 
        $berita = Berita::latest()->take(3)->get();
        
        return view('home', compact('tokoh', 'berita'));
    }

    public function semuaBerita(Request $request)
    {
        $query = Berita::latest();

        // Jika user mengetikkan kata kunci di search bar
        if ($request->has('q') && $request->q != '') {
            $keyword = $request->q;
            $query->where(function($q) use ($keyword) {
                $q->where('judul', 'like', "%{$keyword}%")
                  ->orWhere('cuplikan', 'like', "%{$keyword}%")
                  ->orWhere('isi', 'like', "%{$keyword}%");
            });
        }

        $berita = $query->get();
        
        return view('berita-semua', compact('berita'));
    }

    // Fungsi Pencarian Global (Fitur & Berita)
    public function search(Request $request)
    {
        $keyword = strtolower($request->q);

        // 1. Database Statis Fitur/Menu Website beserta Kata Kuncinya
        $features = [
            [
                'judul' => 'Akademik & Kurikulum',
                'deskripsi' => 'Peta kurikulum, katalog mata kuliah, RPS, dan fasilitas lab.',
                'url' => '/kurikulum',
                'keywords' => ['akademik', 'kurikulum', 'rps', 'mata kuliah', 'sks', 'jadwal', 'peminatan', 'silabus']
            ],
            [
                'judul' => 'Lab Klasifikasi (DDC/UDC)',
                'deskripsi' => 'Mesin pencari klasifikasi DDC/UDC dan sistem peminjaman lab.',
                'url' => '/lab-klasifikasi',
                'keywords' => ['lab', 'klasifikasi', 'ddc', 'udc', 'peminjaman', 'praktikum', 'tajuk subjek']
            ],
            [
                'judul' => 'Repositori & Publikasi',
                'deskripsi' => 'Repositori karya mahasiswa, skripsi, dan jurnal Palimpsest.',
                'url' => '/repositori',
                'keywords' => ['repositori', 'publikasi', 'jurnal', 'skripsi', 'tugas akhir', 'palimpsest', 'artikel', 'dublin core']
            ],
            [
                'judul' => 'Jejak Alumni & Karier',
                'deskripsi' => 'Peta sebaran alumni, skill matrix, dan direktori mentor.',
                'url' => '/alumni',
                'keywords' => ['alumni', 'karier', 'kerja', 'lulusan', 'mentor', 'skill', 'pekerjaan']
            ],
            [
                'judul' => 'Komunitas & Forum',
                'deskripsi' => 'Forum diskusi, info magang, lomba, beasiswa, dan himpunan.',
                'url' => '/komunitas',
                'keywords' => ['komunitas', 'forum', 'magang', 'lomba', 'beasiswa', 'hima', 'himpunan', 'kegiatan']
            ],
            [
                'judul' => 'Resource Hub & Bantuan',
                'deskripsi' => 'Student toolkit, software riset, standar metadata, dan FAQ.',
                'url' => '/resource-hub',
                'keywords' => ['resource', 'hub', 'bantuan', 'faq', 'software', 'toolkit', 'unduh', 'download', 'aplikasi']
            ],
        ];

        $matchedFeatures = [];
        $matchedBerita = [];

        if ($keyword) {
            // A. Mencari kecocokan di Fitur/Menu
            foreach ($features as $feat) {
                $inJudul = str_contains(strtolower($feat['judul']), $keyword);
                $inDesc = str_contains(strtolower($feat['deskripsi']), $keyword);
                $inKeywords = false;
                
                foreach ($feat['keywords'] as $kw) {
                    if (str_contains(strtolower($kw), $keyword)) {
                        $inKeywords = true; break;
                    }
                }
                
                if ($inJudul || $inDesc || $inKeywords) {
                    $matchedFeatures[] = $feat;
                }
            }

            // B. Mencari kecocokan di Berita Terkini
            $matchedBerita = Berita::where('judul', 'like', "%{$keyword}%")
                                   ->orWhere('cuplikan', 'like', "%{$keyword}%")
                                   ->get();
        }

        return view('search-results', compact('matchedFeatures', 'matchedBerita', 'keyword'));
    }
}
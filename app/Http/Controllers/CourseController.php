<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data mata kuliah, dikelompokkan berdasarkan kolom 'semester'
        // Jika ada filter pencarian/semester tertentu, kita tangani juga
        $smt = $request->query('smt');
        
        if ($smt) {
            // Jika tombol semester spesifik diklik (misal SMT 1)
            $courses = Course::where('semester', $smt)->get()->groupBy('semester');
        } else {
            // Jika melihat semua, kelompokkan dari semester 1 sampai 8
            $courses = Course::all()->groupBy('semester');
        }

        return view('courses.index', compact('courses', 'smt'));
    }
}
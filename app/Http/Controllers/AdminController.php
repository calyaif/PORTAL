<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kebanggaan;

class AdminController extends Controller
{
    public function index()
    {
        $tokoh = Kebanggaan::latest()->get(); 
        return view('admin', compact('tokoh'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'prestasi' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $namaFoto = time().'.'.$request->foto->extension();  
        $request->foto->move(public_path('images'), $namaFoto);

        $kebanggaan = new Kebanggaan;
        $kebanggaan->nama = $request->nama;
        $kebanggaan->prestasi = $request->prestasi;
        $kebanggaan->foto = $namaFoto;
        $kebanggaan->save();

        return redirect('/admin')->with('success', 'Data berhasil ditambahkan!');
    }

    // 1. Menampilkan halaman form edit berdasarkan ID
    public function edit($id)
    {
        $tokoh = Kebanggaan::findOrFail($id);
        return view('admin-edit', compact('tokoh'));
    }

    // 2. Memproses perubahan data (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'prestasi' => 'required',
            'foto' => 'image|mimes:png,jpg,jpeg|max:2048', // Foto opsional (boleh tidak diubah)
        ]);

        $kebanggaan = Kebanggaan::findOrFail($id);
        $kebanggaan->nama = $request->nama;
        $kebanggaan->prestasi = $request->prestasi;

        // Jika admin mengupload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            $oldImage = public_path('images/' . $kebanggaan->foto);
            if (file_exists($oldImage)) {
                @unlink($oldImage);
            }

            // Simpan foto baru
            $namaFoto = time().'.'.$request->foto->extension();  
            $request->foto->move(public_path('images'), $namaFoto);
            $kebanggaan->foto = $namaFoto;
        }

        $kebanggaan->save();

        return redirect('/admin')->with('success', 'Data berhasil diperbarui!');
    }

    // 3. Menghapus data
    public function destroy($id)
    {
        $kebanggaan = Kebanggaan::findOrFail($id);
        
        // Hapus file fisik gambarnya dari folder public/images
        $imagePath = public_path('images/' . $kebanggaan->foto);
        if (file_exists($imagePath)) {
            @unlink($imagePath);
        }

        // Hapus data dari database
        $kebanggaan->delete();

        return redirect('/admin')->with('success', 'Data berhasil dihapus!');
    }
}
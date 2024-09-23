<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;

class kategoriController extends Controller
{
    // view halaman daftar Kategori
    public function index(Request $request)
    {
        $search = $request->input('searchKategori');

        if (!empty($search)) {
            $kategori = kategori::where('nama', 'like', "%$search%")
                        ->paginate(10);
        } else {
            $kategori = kategori::paginate(10);
        }

        return view('kategori.view', compact('kategori', 'search'));
    }

    // untuk menyimpan KAtegori baru
    public function store(Request $request)
    {
        // Ambil jumlah kategori dengan nama yang sama
        $existingCount = Kategori::where('nama', $request->nama)->count();

        if ($existingCount > 0) {
            return back()->with('error', 'Kategori dengan nama yang sama sudah ada.');
        }

        $data = kategori::count();

        $request->validate([
            'nama' => 'required|unique:kategoris',
            'icon' => 'max:2048',
        ]);

        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('icon', 'public');
        } else {
            // Tidak ada gambar yang diunggah, berikan nilai default
            $iconPath = '/asset/book.png';
        }

        // Membuat kode kategori dengan format "kt{id_buku}"
        $kodeKategori = 'kt-' . ($data + 1); 

        // Simpan data buku ke database
        $kategori = new kategori();
        $kategori->nama = $request->input('nama');
        $kategori->kode = $kodeKategori;
        $kategori->icon = $iconPath;
        $kategori->save();

        return back()->with('success', 'Kategori baru berhasil ditambahkan');
    }

    // Hapus data kategori
    public function destroy($id){
        $kategori = kategori::find($id);

        if (!$kategori) {
            return redirect('/kategori')->with('error', 'Data tidak ditemukan.');
        }

        $kategori->delete();

        return back()->with('success', 'Kategori berhasil dihapus !');
    }
}

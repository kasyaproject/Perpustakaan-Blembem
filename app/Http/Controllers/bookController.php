<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\kategori;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Imagick;

class bookController extends Controller
{
    // view halaman daftar buku
    public function index(Request $request)
    {
        $search = $request->input('searchBuku');

        if (!empty($search)) {
            $buku = book::where('penulis', 'like', "%$search%")
                        ->orWhere('judul', 'like', "%$search%")
                        ->orWhere('kategori', 'like', "%$search%")
                        ->paginate(10);
        } else {
            $buku = book::paginate(10);
        }

        return view('book.view', compact('buku', 'search'));
    }

    // Hapus data buku
    public function destroy($id){
        $buku = book::find($id);

        if (!$buku) {
            return redirect('/book')->with('error', 'Data tidak ditemukan.');
        }

        $buku->delete();

        return redirect('/book')->with('success', 'Data berhasil diperbarui.');
    }

    // view halaman untuk input buku baru
    public function add()
    {
        $kategori = kategori::all();
        $uploader = Auth::user();

        return view('book.add', compact('kategori', 'uploader'));
    }

    // untuk menyimpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:books',
            'penulis' => 'required',
            'cover' => 'required|image|max:2048',
            'buku' => 'required|mimes:pdf|max:30048', 
            'kategori' => 'required',
            'deskripsi' => 'required',
            'sinopsis' => 'required',
            'halaman' => '',
            'penerbit' => '',
            'isbn' => '',
            'tanggal' => '',
            'panjang' => '',
            'berat' => '',
            'uploader' => 'required',
        ]);        

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('cover', 'public');
        } else {
            // Tidak ada gambar yang diunggah, berikan nilai default
            $coverPath = '/asset/default-akun.jpg';
        }
        if ($request->hasFile('buku')) {
            $bukuPath = $request->file('buku')->store('buku', 'public');
        } else {
            // Tidak ada gambar yang diunggah, berikan nilai default
            $bukuPath = '';
        }

        // Kategori buku
        $kategoriString = $request->input('kategori');
        $kategoriBuku = json_encode($kategoriString);

        // ubah formatt tanggal
        $inputTanggal = $request->input('tanggal');

        $tanggal = Carbon::createFromFormat('Y-m-d', $inputTanggal)->translatedFormat('d F Y');

        // Set nilai default jika input kosong
        $halaman = $request->input('halaman') ?? '-';
        $penerbit = $request->input('isbn') ?? '-';
        $isbn = $request->input('isbn') ?? '-';
        $berat = $request->input('berat') ?? '0.0';
        $panjang = $request->input('panjang') ?? '0.0';

        // Simpan data buku ke database
        $buku = new book();
        $buku->judul = $request->input('judul');
        $buku->penulis = $request->input('penulis');
        $buku->cover = $coverPath;
        $buku->buku = $bukuPath;
        $buku->kategori = $kategoriBuku;
        $buku->deskripsi = $request->input('deskripsi');
        $buku->sinopsis = $request->input('sinopsis');
        $buku->halaman = $halaman;
        $buku->penerbit = $penerbit;
        $buku->isbn = $isbn;
        $buku->tanggal = $tanggal;
        $buku->panjang = $panjang;
        $buku->berat = $berat;
        $buku->uploader = $request->input('uploader');
        $buku->viewcount = 0;
        $buku->save();

        return redirect()->route('book.index')->with('success', 'Buku berhasil ditambahkan');
    }

    // Melihat detail dari buku 
    public function detail($id)
    {
        $book = book::all()->where('id_buku', $id)->first();

        // Path to your PDF file
        $pdfFile = storage_path('app/public/' . $book->buku);

        // Create Imagick object
        $image = new Imagick();
        $image->setResolution(150, 150); // Set resolution (optional)

        // Read the PDF file
        $image->readImage($pdfFile);

        // Array to store image filenames
        $imageFiles = [];

        // Convert each page to JPG
        foreach ($image as $index => $page) {
            // Set the format to JPG
            $page->setImageFormat('jpg');

            // Set the filename for the JPG image
            $jpgFilename = 'output_' . $index . '.jpg';

            /// Write the JPG image to disk in the public/pages directory
            $page->writeImage('pages/' . $jpgFilename);

            // Push the filename to the array
            $imageFiles[] = 'pages/' . $jpgFilename;
        }

        // Destroy the Imagick object
        $image->destroy();

        return view('book.detail', compact('book', 'imageFiles'));
    }

    // Form untuk edit buku
    public function edit($id)
    {
        $book = book::all()->where('id_buku', $id)->first();

        $kategori = kategori::all();

        $inputTanggal = $book->tanggal;
        $tanggal = Carbon::createFromFormat('d F Y', $inputTanggal)->format('Y-m-d');

        return view('book.edit', compact('book', 'tanggal', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => [
                'required',
                Rule::unique('books')->ignore($id, 'id_buku'),
            ],
            'penulis' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'sinopsis' => 'required',
        ]);

        $buku = Book::findOrFail($id);

        // Kategori buku
        $kategoriString = $request->input('kategori');
        $kategoriBuku = json_encode($kategoriString);

        // Ubah format tanggal
        $inputTanggal = $request->input('tanggal');
        $tanggal = Carbon::createFromFormat('Y-m-d', $inputTanggal)->translatedFormat('d F Y');

        // Set nilai default jika input kosong
        $halaman = $request->input('halaman') ?? '-';
        $penerbit = $request->input('penerbit') ?? '-';
        $isbn = $request->input('isbn') ?? '-';
        $berat = $request->input('berat') ?? '0.0';
        $panjang = $request->input('panjang') ?? '0.0';

        $buku->judul = $request->input('judul');
        $buku->penulis = $request->input('penulis');
        $buku->kategori = $kategoriBuku;
        $buku->deskripsi = $request->input('deskripsi');
        $buku->sinopsis = $request->input('sinopsis');
        $buku->halaman = $halaman;
        $buku->penerbit = $penerbit;
        $buku->isbn = $isbn;
        $buku->tanggal = $tanggal;
        $buku->panjang = $panjang;
        $buku->berat = $berat;
        $buku->save();

        return redirect()->route('book.detail', $id)->with('success', 'Data buku berhasil diperbarui');
    }
}

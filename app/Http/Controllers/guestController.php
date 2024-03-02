<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\book;
use Imagick;


class guestController extends Controller
{
    // 
    public function index(Request $request)
    {
        $fillter = $request->input('fillter');
        $search = $request->input('searchBuku');

        $bukuQuery = book::query(); // Inisialisasi kueri buku

        if (!empty($fillter)) {
            // Jika ada filter, tambahkan kondisi filter pada kueri buku
            $bukuQuery->where('kategori', 'like', "%$fillter%");
        }

        if (!empty($search)) {
            // Jika ada pencarian, tambahkan kondisi pencarian pada kueri buku
            $bukuQuery->where(function ($query) use ($search) {
                $query->where('penulis', 'like', "%$search%")
                    ->orWhere('judul', 'like', "%$search%");
            });
        }

        // Lakukan paginasi pada kueri buku
        $buku = $bukuQuery->paginate(15);

        $kategori = kategori::all();        
        $rekomendasi = Book::orderBy('viewcount', 'desc')->take(6)->get();

        return view('index', compact('kategori', 'buku', 'rekomendasi', 'search', 'fillter'));
    }

    public function read($id)
    {
        $buku = book::find($id);
        $rekomendasi = Book::orderBy('viewcount', 'desc')->take(6)->get();

        // Path to your PDF file
        $pdfFile = storage_path('app/public/' . $buku->buku);

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

        // Increment view count
        $buku->viewcount++;
        $buku->save();

        // Pass the image filenames to the view
        return view('read-book', compact('buku', 'rekomendasi', 'imageFiles'));
    }
}

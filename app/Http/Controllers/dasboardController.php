<?php

namespace App\Http\Controllers;
use App\Models\book;
use App\Models\kategori;


class dasboardController extends Controller
{
    //
    public function index()
    {  
        $totalBooks = Book::count();
        $totalKategori = kategori::count();
        $totalRead = Book::sum('viewcount');

        return view('dashboard', compact('totalBooks', 'totalKategori', 'totalRead'));
    }
}

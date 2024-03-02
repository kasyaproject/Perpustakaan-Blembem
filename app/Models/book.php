<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'judul',
        'penulis',
        'cover',
        'buku',
        'kategori',
        'deskripsi',
        'sinopsis',
        'halaman',
        'penerbit',
        'isbn',
        'tanggal',
        'panjang',
        'berat',
    ];    
}

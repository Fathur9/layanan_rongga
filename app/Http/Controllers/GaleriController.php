<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = [
    (object)[
        'judul' => 'Kegiatan Bersih-bersih jalan raya',
        'gambar' => 'storage/galeri/galeri7.jpg',
        'tanggal' => '2025-04-20',
    ],
    (object)[
        'judul' => 'Rapat Semua Staff',
        'gambar' => 'storage/galeri/galeri3.jpeg',
        'tanggal' => '2025-03-15',
    ],
    (object)[
        'judul' => 'Kegiatan Senam Bersama Masyarakat',
        'gambar' => 'storage/galeri/galeri6.jpeg',
        'tanggal' => '2025-03-15',
    ],
];


         return view('galeri.index', compact('galeri'));
    

    }
}

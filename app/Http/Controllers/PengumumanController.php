<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
      $pengumuman = [
    (object)[
        'judul' => 'Idul Adha 2025',
        'isi' => 'pengingat untuk umat muslim karena idul adha sebentar lagi',
        'gambar' => 'pengumuman 1.jpeg',
        'tanggal' => '2025-05-18',
    ],
    (object)[
        'judul' => 'Masak Bersama Masyarakat',
        'isi' => 'Kegiatan ini agar seluruh masyarakat rukun dan bekerja sama',
        'gambar' => 'pengumuman 2.jpg',
        'tanggal' => '2025-05-10',
    ],
];

        return view('pengumuman.index', compact('pengumuman'));
    }
}

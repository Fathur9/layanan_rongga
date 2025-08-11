<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Berita;
use App\Models\Galeri;

class HomeController extends Controller
{
     public function index()
    {
         // Data pengumuman statis 
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

        // Data galeri statis
        $galeri = [
            (object)[
                'judul' => 'Kegiatan Bersih-bersih jalan raya',
                'gambar' => 'galeri 1.jpg',
                'tanggal' => '2025-04-20',
            ],
            (object)[
                'judul' => 'Rapat Semua Staff',
                'gambar' => 'galeri 2.jpg',
                'tanggal' => '2025-03-15',
            ],
        ];

        // Data berita statis
        $berita = collect([
            (object)[
                'judul' => 'Persib B2B Champion',
                'isi' => 'Perib berhasil menjuarain Bri Liga 1 sebanyak 2 kali dalam 2 musim',
                'gambar' => 'berita 1.jpg',
                'slug' => 'persib-b2b-champion',
                'tanggal' => '2025-05-17',
            ],
            (object)[
                'judul' => 'Barak Militer Bagi Siswa',
                'isi' => 'Kegiatan ini agar siswa dan siswa menjadi lebih disiplin dan bisa membangun diri yang lebih baik',
                'gambar' => 'berita 2.jpg',
                'slug' => 'barak-militer',
                'tanggal' => '2025-05-15',
            ],
            (object)[
                'judul' => 'Keindahan Wisata Kbb',
                'isi' => 'Meskipun wisata ini tempatnya lumayan terpencil tetapi keindahannya tiada tara',
                'gambar' => 'berita 3.jpg',
                'slug' => 'keindahan-wisata',
                'tanggal' => '2025-05-10',
            ],
            (object)[
                'judul' => 'Longsor',
                'isi' => 'Longsor di daerah kbb terjadi akibat hujan yang cukup tinggi',
                'gambar' => 'berita 4.jpg',
                'slug' => 'longsor',
                'tanggal' => '2025-05-05',
            ],
        ]);

        // Kirim data ke view
        return view('home', compact('pengumuman', 'galeri', 'berita'));
    }
}

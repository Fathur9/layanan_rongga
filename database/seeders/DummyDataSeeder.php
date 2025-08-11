<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengumuman;
use App\Models\Berita;
use App\Models\Galeri;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        // Isi data Pengumuman
        Pengumuman::create([
            'judul' => 'Pengumuman Pertama',
            'isi' => 'Ini adalah isi pengumuman pertama untuk pengujian.',
            'tanggal' => now(),
        ]);

        // Isi data Berita
        Berita::create([
            'judul' => 'Berita Terkini',
            'isi' => 'Berita terbaru mengenai pelayanan publik Kecamatan Rongga.',
            'tanggal' => now(),
            'gambar' => 'default.png', // pastikan gambarnya ada di storage/berita
            'slug' => 'berita-terkini', // buat slug sesuai struktur route kamu
        ]);

        // Isi data Galeri
        Galeri::create([
            'judul' => 'Kegiatan Sosialisasi',
            'tanggal' => now(),
            'gambar' => 'default.png', // pastikan gambarnya ada di storage/galeri
        ]);
    }
}

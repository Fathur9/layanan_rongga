<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    private function getDummyBerita()
{
    return collect([
        [
            'judul' => 'Gotong Royong Warga Rongga',
            'isi' => "Masyarakat Kecamatan Rongga melakukan kegiatan gotong royong untuk membersihkan lingkungan sekitar. Kegiatan ini dilaksanakan di sepanjang jalan utama desa dan melibatkan lebih dari 100 warga dari berbagai dusun. \n\nTujuan dari kegiatan ini adalah untuk meningkatkan kesadaran masyarakat terhadap pentingnya menjaga kebersihan dan kesehatan lingkungan. Kepala desa berharap kegiatan ini bisa menjadi rutinitas dan mempererat hubungan antarwarga.",
            'slug' => 'gotong-royong-warga-rongga',
            'gambar' => 'berita.jpg',
            'created_at' => now(),
        ],
        [
            'judul' => 'Pengumuman Pemilihan RT Baru',
            'isi' => "Pemerintah Kecamatan Rongga akan mengadakan pemilihan Ketua RT baru untuk periode 2025–2030. Proses pemilihan akan dimulai dengan pengumpulan nama calon pada tanggal 25 Mei 2025 dan pemungutan suara dijadwalkan berlangsung pada 2 Juni 2025. \n\nWarga diminta untuk aktif berpartisipasi karena RT memiliki peran strategis dalam pembangunan wilayah serta pelayanan publik di tingkat bawah. Semua warga dengan KTP aktif diharapkan hadir dan memberikan suaranya.",
            'slug' => 'pemilihan-rt-baru',
            'gambar' => 'berita 5.jpg',
            'created_at' => now()->subDays(2),
        ],
        [
            'judul' => 'Keindahan Wisata KBB',
            'isi' => "Kabupaten Bandung Barat (KBB) menyimpan banyak keindahan alam yang belum banyak diketahui publik. Salah satunya adalah Curug Cibareubeuy yang terletak di perbatasan Rongga. Tempat ini menawarkan keindahan air terjun alami, udara segar, dan rute tracking yang menantang. \n\nPemerintah daerah saat ini sedang merancang program promosi untuk meningkatkan jumlah wisatawan. Warga sekitar juga dilibatkan dalam pengelolaan agar ekonomi lokal bisa ikut tumbuh.",
            'slug' => 'keindahan-wisata',
            'gambar' => 'berita 3.jpg',
            'tanggal' => '2025-05-10',
            'created_at' => now()->subDays(3),
        ],
        [
            'judul' => 'Longsor di Kawasan Perbukitan',
            'isi' => "Akibat hujan deras selama tiga hari berturut-turut, tanah longsor terjadi di Desa Mekarsari, Kecamatan Rongga. Longsor menyebabkan akses jalan utama terputus dan beberapa rumah warga mengalami kerusakan ringan. \n\nTidak ada korban jiwa dalam peristiwa ini, namun beberapa warga terpaksa mengungsi ke balai desa. Pemerintah setempat segera mengirimkan alat berat untuk membersihkan material longsor dan mengkoordinasikan bantuan logistik bagi warga terdampak.",
            'slug' => 'longsor',
            'gambar' => 'berita 4.jpg',
            'tanggal' => '2025-05-05',
            'created_at' => now()->subDays(4),
        ],
        [
            'judul' => 'Persib B2B Champion',
            'isi' => "Persib Bandung kembali menorehkan sejarah dengan menjuarai BRI Liga 1 untuk musim kedua secara berturut-turut. Kemenangan ini disambut meriah oleh Bobotoh di seluruh penjuru Jawa Barat, termasuk warga Kecamatan Rongga yang menggelar nonton bareng di aula desa. \n\nPelatih Persib menyampaikan rasa terima kasih kepada suporter setia yang terus mendukung. Pemerintah Kecamatan Rongga bahkan berencana mengadakan acara syukuran sebagai bentuk apresiasi atas prestasi ini.",
            'slug' => 'persib-b2b-champion',
            'gambar' => 'berita 1.jpg',
            'tanggal' => '2025-05-17',
            'created_at' => now()->subDays(5),
        ],
        [
            'judul' => 'Barak Militer untuk Siswa',
            'isi' => "Sebagai bagian dari program pembinaan karakter, pemerintah Kecamatan Rongga bekerja sama dengan Koramil setempat mengadakan kegiatan barak militer bagi siswa SMA. Kegiatan ini berlangsung selama 3 hari di lapangan Kecamatan dan diikuti oleh 150 siswa. \n\nMateri yang diberikan meliputi kedisiplinan, kepemimpinan, dan cinta tanah air. Orang tua siswa menyambut baik program ini karena dinilai bisa membentuk kepribadian yang tangguh dan bertanggung jawab.",
            'slug' => 'barak-militer',
            'gambar' => 'berita 2.jpg',
            'tanggal' => '2025-05-15',
            'created_at' => now()->subDays(6),
        ],
    ]);
}

    public function index()
    {
        $berita = $this->getDummyBerita();
        return view('berita.index', compact('berita'));
    }

    public function show($slug)
    {
        $berita = $this->getDummyBerita();
        $item = $berita->firstWhere('slug', $slug);

        if (!$item) {
            abort(404); // tidak ditemukan
        }

        return view('berita.show', compact('item'));
    }

}

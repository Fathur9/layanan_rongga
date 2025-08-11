<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Layanan;
use App\Models\JenisSurat;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layanan = Layanan::where('nama', 'Administrasi Surat')->first();

        if ($layanan) {
            $jenis = [
                [
                    'nama' => 'Surat Domisili',
                    'persyaratan' => [
                        'Fotocopy KTP',
                        'Fotocopy KK',
                        'Surat Pengantar RT/RW',
                    ],
                ],
                [
                    'nama' => 'Surat Usaha',
                    'persyaratan' => [
                        'Fotocopy KTP',
                        'Fotocopy KK',
                        'Surat Keterangan Usaha dari RT/RW',
                    ],
                ],
                [
                    'nama' => 'Surat Kehilangan',
                    'persyaratan' => [
                        'Fotocopy KTP',
                        'Surat Pernyataan Kehilangan',
                        'Surat Pengantar RT/RW',
                    ],
                ],
            ];

            foreach ($jenis as $item) {
                JenisSurat::create([
                    'layanan_id' => $layanan->id,
                    'nama' => $item['nama'],
                    'persyaratan' => $item['persyaratan'],
                ]);
            }
        }
    }
}

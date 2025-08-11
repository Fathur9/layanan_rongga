<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        $layanans = [
            [
                'nama_layanan' => 'Perbaikan KTP',
                'persyaratan' => [
                    ['label' => 'Nama lengkap', 'tipe' => 'text', 'name' => 'nama_lengkap'],
                    ['label' => 'Alamat', 'tipe' => 'text', 'name' => 'alamat'],
                    ['label' => 'Nomor HP', 'tipe' => 'text', 'name' => 'nomor_hp'],
                    ['label' => 'Jenis perbaikan', 'tipe' => 'text', 'name' => 'jenis_perbaikan'],
                    ['label' => 'Upload Kartu Keluarga', 'tipe' => 'file', 'name' => 'upload_kk'],
                    ['label' => 'Upload Akta Lahir', 'tipe' => 'file', 'name' => 'upload_akta_lahir'],
                ]
            ],
            [
                'nama_layanan' => 'Pembuatan Kartu Keluarga',
                'persyaratan' => [
                    ['label' => 'Nama lengkap', 'tipe' => 'text', 'name' => 'nama_lengkap'],
                    ['label' => 'Alamat', 'tipe' => 'text', 'name' => 'alamat'],
                    ['label' => 'Nomor HP', 'tipe' => 'text', 'name' => 'nomor_hp'],
                    ['label' => 'Upload KK Lama', 'tipe' => 'file', 'name' => 'upload_kk_lama'],
                    ['label' => 'Upload Kutipan Akta Nikah', 'tipe' => 'file', 'name' => 'upload_akta_nikah'],
                    ['label' => 'Upload Surat Keterangan Pindah/Datang', 'tipe' => 'file', 'name' => 'upload_surat_pindah'],
                    ['label' => 'Upload Dokumen Pendukung', 'tipe' => 'file', 'name' => 'upload_dokumen_pendukung'],
                ]
            ],
            [
                'nama_layanan' => 'Membuat Surat Pindah',
                'persyaratan' => [
                    ['label' => 'Nama lengkap', 'tipe' => 'text', 'name' => 'nama_lengkap'],
                    ['label' => 'Alamat', 'tipe' => 'text', 'name' => 'alamat'],
                    ['label' => 'Nomor HP', 'tipe' => 'text', 'name' => 'nomor_hp'],
                    ['label' => 'Surat Pengantar RT/RW', 'tipe' => 'file', 'name' => 'surat_pengantar'],
                    ['label' => 'Upload KK', 'tipe' => 'file', 'name' => 'upload_kk'],
                    ['label' => 'Upload KTP', 'tipe' => 'file', 'name' => 'upload_ktp'],
                ]
            ],
            [
                'nama_layanan' => 'Penerbitan Surat SKSAW',
                'persyaratan' => [
                    ['label' => 'Nama lengkap', 'tipe' => 'text', 'name' => 'nama_lengkap'],
                    ['label' => 'Alamat', 'tipe' => 'text', 'name' => 'alamat'],
                    ['label' => 'Nomor HP', 'tipe' => 'text', 'name' => 'nomor_hp'],
                    ['label' => 'Surat Pernyataan Ahli Waris', 'tipe' => 'file', 'name' => 'surat_pernyataan_ahliwaris'],
                    ['label' => 'Surat 2 Saksi (materai)', 'tipe' => 'file', 'name' => 'surat_dua_saksi'],
                    ['label' => 'Upload Akta Kematian', 'tipe' => 'file', 'name' => 'upload_akta_kematian'],
                    ['label' => 'Upload Surat Nikah Almarhum', 'tipe' => 'file', 'name' => 'upload_nikah_almarhum'],
                    ['label' => 'Upload Akta Cerai', 'tipe' => 'file', 'name' => 'upload_akta_cerai'],
                    ['label' => 'Upload KTP', 'tipe' => 'file', 'name' => 'upload_ktp'],
                    ['label' => 'Upload KK', 'tipe' => 'file', 'name' => 'upload_kk'],
                    ['label' => 'Upload Akta Kelahiran Ahli Waris', 'tipe' => 'file', 'name' => 'upload_akta_lahir_waris'],
                ]
            ],
            [
                'nama_layanan' => 'PBB-P2',
                'persyaratan' => [
                    ['label' => 'Nama lengkap', 'tipe' => 'text', 'name' => 'nama_lengkap'],
                    ['label' => 'Alamat', 'tipe' => 'text', 'name' => 'alamat'],
                    ['label' => 'Nomor HP', 'tipe' => 'text', 'name' => 'nomor_hp'],
                    ['label' => 'Formulir Pelayanan PBB', 'tipe' => 'file', 'name' => 'formulir_pbb'],
                    ['label' => 'Upload KTP', 'tipe' => 'file', 'name' => 'upload_ktp'],
                    ['label' => 'Upload Bukti Kepemilikan Tanah', 'tipe' => 'file', 'name' => 'upload_bukti_tanah'],
                    ['label' => 'Upload SPPT Induk', 'tipe' => 'file', 'name' => 'upload_sppt'],
                ]
            ],
            [
                'nama_layanan' => 'Pencaker',
                'persyaratan' => [
                    ['label' => 'Nama lengkap', 'tipe' => 'text', 'name' => 'nama_lengkap'],
                    ['label' => 'Alamat', 'tipe' => 'text', 'name' => 'alamat'],
                    ['label' => 'Nomor HP', 'tipe' => 'text', 'name' => 'nomor_hp'],
                    ['label' => 'Upload KTP', 'tipe' => 'file', 'name' => 'upload_ktp'],
                    ['label' => 'Upload KK', 'tipe' => 'file', 'name' => 'upload_kk'],
                    ['label' => 'Upload Ijazah/SKL', 'tipe' => 'file', 'name' => 'upload_ijazah'],
                    ['label' => 'Upload Pas Foto 3x4', 'tipe' => 'file', 'name' => 'upload_pasfoto'],
                ]
            ],
            [
                'nama_layanan' => 'Pelayanan Penerbitan Surat Rekomendasi Proposal',
                'persyaratan' => [
                    ['label' => 'Nama lengkap', 'tipe' => 'text', 'name' => 'nama_lengkap'],
                    ['label' => 'Alamat', 'tipe' => 'text', 'name' => 'alamat'],
                    ['label' => 'Nomor HP', 'tipe' => 'text', 'name' => 'nomor_hp'],
                    ['label' => 'Upload Proposal', 'tipe' => 'file', 'name' => 'upload_proposal'],
                    ['label' => 'Upload Surat Rekomendasi', 'tipe' => 'file', 'name' => 'upload_surat_rekomendasi'],
                    ['label' => 'Upload KTP', 'tipe' => 'file', 'name' => 'upload_ktp'],
                ]
            ],
            [
                'nama_layanan' => 'Pembuatan SKTM',
                'persyaratan' => [
                    ['label' => 'Nama lengkap', 'tipe' => 'text', 'name' => 'nama_lengkap'],
                    ['label' => 'Alamat', 'tipe' => 'text', 'name' => 'alamat'],
                    ['label' => 'Nomor HP', 'tipe' => 'text', 'name' => 'nomor_hp'],
                    ['label' => 'Upload KK', 'tipe' => 'file', 'name' => 'upload_kk'],
                    ['label' => 'Upload KTP', 'tipe' => 'file', 'name' => 'upload_ktp'],
                    ['label' => 'Surat Pengantar RT/RW', 'tipe' => 'file', 'name' => 'surat_pengantar'],
                    ['label' => 'Upload SK Tidak Mampu dari Desa', 'tipe' => 'file', 'name' => 'upload_sktm_desa'],
                ]
            ],
            [
                'nama_layanan' => 'SKCK',
                'persyaratan' => [
                    ['label' => 'Nama lengkap', 'tipe' => 'text', 'name' => 'nama_lengkap'],
                    ['label' => 'Alamat', 'tipe' => 'text', 'name' => 'alamat'],
                    ['label' => 'Nomor HP', 'tipe' => 'text', 'name' => 'nomor_hp'],
                    ['label' => 'Surat Pengantar RT/RW', 'tipe' => 'file', 'name' => 'surat_pengantar'],
                    ['label' => 'Upload SKCK yang ditandatangani Kepala Desa', 'tipe' => 'file', 'name' => 'upload_skck'],
                    ['label' => 'Upload KTP', 'tipe' => 'file', 'name' => 'upload_ktp'],
                ]
            ],
        ];

        foreach ($layanans as $data) {
            Layanan::create([
                'nama_layanan' => $data['nama_layanan'],
                'persyaratan' => json_encode($data['persyaratan']),
            ]);
        }
    }
}

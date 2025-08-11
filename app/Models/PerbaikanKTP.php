<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbaikanKTP extends Model
{
    use HasFactory;

    protected $table = 'perbaikan_ktp';

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'tempat_tanggal_lahir',
        'alamat',
        'nomor_hp',
        'jenis_kelamin',
        'jenis_perbaikan',
        'keterangan_perbaikan',
        'upload_dokumen_pendukung',
        'upload_ktp_lama',
        'status',
        'catatan_admin',
    ];
}

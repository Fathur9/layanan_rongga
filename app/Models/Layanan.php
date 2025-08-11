<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'persyaratan',
    ];

    public function permohonanLayanan()
    {
        return $this->hasMany(PermohonanLayanan::class, 'layanan_id');
    }
}

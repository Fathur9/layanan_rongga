<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanLayanan extends Model
{
    use HasFactory;

    protected $table = 'permohonan_layanan';

    protected $fillable = [
        'user_id',
        'layanan_id',
        'status',
        'catatan_admin',
        'data',
        'file_surat',
    ];


    protected $casts = [
        'data' => 'array',
    ];


    protected $appends = ['data_permohonan'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

    public function getDataPermohonanAttribute()
    {
    return $this->data;
    }

}

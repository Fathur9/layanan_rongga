<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PermohonanLayanan;
use App\Models\Layanan;

class KtpController extends Controller
{
    public function create()
    {
        return view('user.layanan.ktp.perbaikan');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'nik' => 'required|string|max:20',
        'alamat' => 'required|string',
        'nomor_hp' => 'required|string|max:20',
        'jenis_perbaikan' => 'required|string',
        'keterangan_perbaikan' => 'required|string',
        'upload_dokumen_pendukung' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'upload_ktp_lama' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $dokumenPath = $request->file('upload_dokumen_pendukung')->store('dokumen_pendukung');
    $ktpLamaPath = $request->file('upload_ktp_lama')?->store('ktp_lama');

    $layanan = \App\Models\Layanan::where('nama_layanan', 'KTP Elektronik')->first();

    // CEK SEMUA DATA
    dd([
        'user_id' => auth()->id(),
        'layanan_id' => $layanan?->id,
        'status' => 'diproses',
        'data' => [
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            'jenis_perbaikan' => $request->jenis_perbaikan,
            'keterangan_perbaikan' => $request->keterangan_perbaikan,
            'upload_dokumen_pendukung' => $dokumenPath,
            'upload_ktp_lama' => $ktpLamaPath,
        ]
    ]);

        return redirect()->route('user.dashboard')->with('success', 'Permohonan berhasil dikirim!');
    }

    public function showForm(Request $request)
{
    $layanan = Layanan::findOrFail($request->layanan_id);
    $persyaratan = json_decode($layanan->persyaratan, true);

    return view('user.form.form-dinamis', [
        'layanan' => $layanan,
        'persyaratan' => $persyaratan
    ]);
}

}

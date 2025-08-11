<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerbaikanKTPController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'nik' => 'required|string|max:20',
        'alamat' => 'required|string',
        'nomor_hp' => 'required|string|max:20',
        'jenis_perbaikan' => 'required|string',
        'keterangan_perbaikan' => 'required|string',
        'upload_dokumen_pendukung' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'upload_ktp_lama' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);
        $dokumen = $request->file('upload_dokumen_pendukung')->store('dokumen', 'public');
        $ktp_lama = $request->file('upload_ktp_lama')?->store('ktp_lama', 'public');

        $status = $request->jenis_perbaikan === 'Foto / Sidik Jari' ? 'perlu_rekam' : 'menunggu';
        $catatan = $status === 'perlu_rekam' ? 'Silakan datang langsung ke Dukcapil untuk rekam ulang biometrik.' : null;

        PerbaikanKTP::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jenis_perbaikan' => $request->jenis_perbaikan,
            'keterangan_perbaikan' => $request->keterangan_perbaikan,
            'upload_dokumen_pendukung' => $dokumen,
            'upload_ktp_lama' => $ktp_lama,
            'status' => $status,
            'catatan_admin' => $catatan,
        ]);

        return redirect()->back()->with('success', 'Permohonan berhasil dikirim.');
    }

    public function indexAdmin()
    {
        $permohonan = PerbaikanKTP::latest()->get();
        return view('admin.perbaikan.index', compact('permohonan'));
    }

    public function show($id)
    {
        $data = PerbaikanKTP::findOrFail($id);
        return view('admin.perbaikan.show', compact('data'));
    }

    public function updateStatus(Request $request, $id)
    {
        $data = PerbaikanKTP::findOrFail($id);
        $data->status = $request->status;
        $data->catatan_admin = $request->catatan_admin;
        $data->save();

    return redirect()->route('admin.perbaikan.index')->with('success', 'Status permohonan berhasil diperbarui.');
    }

}


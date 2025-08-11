<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermohonanLayanan;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Collection;

class PermohonanController extends Controller
{
    public function index(Request $request)
{
    $status = $request->status ?? 'semua';
    $jenis = $request->jenis ?? 'layanan';

    $data = collect();

    if ($jenis === 'layanan' || $jenis === 'semua') {
        $layanan = PermohonanLayanan::with('user', 'layanan')
            ->when($status !== 'semua', fn($q) => $q->where('status', $status))
            ->get()
            ->map(function ($item) {
                return (object)[
                    'id' => $item->id,
                    'user' => $item->user->name,
                    'jenis' => 'layanan',
                    'judul' => $item->layanan->nama_layanan ?? '-',
                    'status' => $item->status,
                    'tanggal' => $item->created_at,
                ];
            });
        $data = $data->merge($layanan);
    }

    if ($jenis === 'pengaduan' || $jenis === 'semua') {
        $pengaduan = Pengaduan::with('user')
            ->when($status !== 'semua', fn($q) => $q->where('status', $status))
            ->get()
            ->map(function ($item) {
                return (object)[
                    'id' => $item->id,
                    'user' => $item->user->name,
                    'jenis' => 'pengaduan',
                    'judul' => $item->judul,
                    'status' => $item->status,
                    'tanggal' => $item->created_at,
                ];
            });
        $data = $data->merge($pengaduan);
    }

    // Urutkan data dari terbaru
    $data = $data->sortByDesc('tanggal')->values();

    // Pagination manual (karena data gabungan)
    $perPage = 10;
    $currentPage = $request->get('page', 1);
    $pagedData = $data->forPage($currentPage, $perPage);
    $permohonans = new \Illuminate\Pagination\LengthAwarePaginator(
        $pagedData,
        $data->count(),
        $perPage,
        $currentPage,
        ['path' => $request->url(), 'query' => $request->query()]
    );

    return view('admin.permohonan.index', compact('permohonans', 'status', 'jenis'));
}

   public function show($id)
{
    $permohonan = PermohonanLayanan::with('user', 'layanan')->findOrFail($id);
    return view('admin.permohonan.show', compact('permohonan'));
}

public function edit($id)
{
    $permohonan = \App\Models\PermohonanLayanan::with('user', 'layanan')->findOrFail($id);
    return view('admin.permohonan.edit', compact('permohonan'));
}

public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:menunggu,diproses,selesai,ditolak',
        'catatan_admin' => 'required|string',
        'file_surat' => 'nullable|file|mimes:pdf|max:2048',
    ]);

    $permohonan = \App\Models\PermohonanLayanan::findOrFail($id);
    $permohonan->status = $request->status;
    $permohonan->catatan_admin = $request->catatan_admin;

    if ($request->hasFile('file_surat')) {
        $filename = time() . '_' . $request->file_surat->getClientOriginalName();
        $request->file_surat->storeAs('public/surat', $filename);
        $permohonan->file_surat = $filename;
    }

    $permohonan->save();

    return redirect()->back()->with('success', 'Status berhasil diperbarui.');
}


}

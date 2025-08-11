<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermohonanLayanan;
use App\Models\Layanan;
use Carbon\Carbon;
use DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Validasi bulan dan tahun
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));
        $layananId = $request->input('layanan_id');

        if (!in_array($bulan, array_map(fn($m) => sprintf('%02d', $m), range(1, 12)))) {
            $bulan = date('m');
        }
        if ($tahun < 2020 || $tahun > date('Y')) {
            $tahun = date('Y');
        }

        // Ambil data layanan untuk filter dropdown
        $layanans = Layanan::all();

        // Ambil data permohonan dengan filter bulan, tahun dan layanan
        $permohonans = PermohonanLayanan::with('user', 'layanan')
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->when($layananId, function ($query) use ($layananId) {
                return $query->where('layanan_id', $layananId);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Hitung jumlah berdasarkan status
        $statusCounts = PermohonanLayanan::select('status', DB::raw('count(*) as total'))
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->when($layananId, fn($q) => $q->where('layanan_id', $layananId))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        $statuses = ['menunggu', 'diproses', 'selesai', 'ditolak'];
        $statusData = [];
        foreach ($statuses as $status) {
            $statusData[] = $statusCounts[$status] ?? 0;
        }

        return view('admin.laporan.index', compact(
            'permohonans',
            'bulan',
            'tahun',
            'statusData',
            'statuses',
            'layanans'
        ));
    }

    public function cetak(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');
        $layananId = $request->layanan_id;

        $permohonans = PermohonanLayanan::with('user', 'layanan')
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->when($layananId, fn($q) => $q->where('layanan_id', $layananId))
            ->get();

        return view('admin.laporan-cetak', compact('permohonans', 'bulan', 'tahun'));
    }
}

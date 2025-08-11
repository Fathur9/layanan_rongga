<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermohonanLayanan;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
{
    $total = PermohonanLayanan::count();
    $menunggu = PermohonanLayanan::where('status', 'menunggu')->count();
    $diproses = PermohonanLayanan::where('status', 'diproses')->count();
    $selesai = PermohonanLayanan::where('status', 'selesai')->count();
    $ditolak = PermohonanLayanan::where('status', 'ditolak')->count();

    $permohonans = PermohonanLayanan::with('user', 'layanan')->latest()->take(10)->get(); // ambil 10 terbaru

    return view('admin.dashboard', compact(
        'total', 'menunggu', 'diproses', 'selesai', 'ditolak', 'permohonans'
    ));
}
    public function getStatistik()
{
    return response()->json([
        'total'    => \App\Models\PermohonanLayanan::count(),
        'menunggu' => \App\Models\PermohonanLayanan::where('status', 'menunggu')->count(),
        'diproses' => \App\Models\PermohonanLayanan::where('status', 'diproses')->count(),
        'selesai'  => \App\Models\PermohonanLayanan::where('status', 'selesai')->count(),
        'ditolak'  => \App\Models\PermohonanLayanan::where('status', 'ditolak')->count(),
    ]);
}

}

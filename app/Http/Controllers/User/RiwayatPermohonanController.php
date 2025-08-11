<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PermohonanLayanan;

class RiwayatPermohonanController extends Controller
{
    public function index()
{
    $riwayat = PermohonanLayanan::where('user_id', Auth::id())
        ->with('layanan')
        ->latest()
        ->get();

    return view('user.riwayat.index', compact('riwayat'));
}

public function show($id)
{
    $permohonan = PermohonanLayanan::with('layanan')
        ->where('user_id', Auth::id())
        ->findOrFail($id);

    return view('user.riwayat.show', compact('permohonan'));
}

}

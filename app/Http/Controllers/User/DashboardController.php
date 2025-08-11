<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PermohonanLayanan;
use App\Models\Layanan;

class DashboardController extends Controller
{
    public function index()
    {
        $list_layanan = Layanan::all();
        return view('user.dashboard', compact('list_layanan'));
    }

    public function getStatistikSemua()
    {
        $userId = Auth::id();

        $query = PermohonanLayanan::where('user_id', $userId);

        return response()->json([
            'total'    => $query->count(),
            'menunggu' => (clone $query)->where('status', 'menunggu')->count(),
            'diproses' => (clone $query)->where('status', 'diproses')->count(),
            'selesai'  => (clone $query)->where('status', 'selesai')->count(),
            'ditolak'  => (clone $query)->where('status', 'ditolak')->count(),
        ]);
    }
}

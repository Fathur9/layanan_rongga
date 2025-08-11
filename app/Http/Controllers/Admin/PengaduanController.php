<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function show($id)
    {
        $pengaduan = Pengaduan::with('user')->findOrFail($id);

        return view('admin.pengaduan.show', compact('pengaduan'));
    }
}

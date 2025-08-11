<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
     public function index()
    {
        $pengaduan = Pengaduan::where('user_id', Auth::id())->latest()->get();
        return view('user.pengaduan.index', compact('pengaduan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $fotoPath = $request->file('foto')?->store('pengaduan_foto', 'public');

        Pengaduan::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $fotoPath,
            'status' => 'menunggu',
        ]);

        return back()->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function show($id)
{
    $pengaduan = Pengaduan::findOrFail($id);
    return view('user.pengaduan.show', compact('pengaduan'));
}


    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            $pengaduan->foto = $request->file('foto')->store('pengaduan_foto', 'public');
        }

        $pengaduan->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $pengaduan->foto,
        ]);

        return back()->with('success', 'Pengaduan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::where('user_id', Auth::id())->findOrFail($id);
        $pengaduan->delete();

        return back()->with('success', 'Pengaduan berhasil dihapus.');
    }

}

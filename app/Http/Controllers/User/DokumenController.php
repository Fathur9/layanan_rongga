<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::where('user_id', Auth::id())->get();
        return view('user.dokumen.index', compact('dokumen'));
    }

    public function create()
    {
        return view('user.dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $path = $request->file('file')->store('dokumen', 'public');

        Dokumen::create([
            'user_id' => Auth::id(),
            'nama_file' => $request->file('file')->getClientOriginalName(),
            'path' => $path,
        ]);

        return redirect()->route('user.dokumen.index')->with('success', 'Dokumen berhasil diunggah.');
    }

    public function destroy(Dokumen $dokumen)
    {
        if ($dokumen->user_id !== Auth::id()) {
            abort(403);
        }

        Storage::disk('public')->delete($dokumen->path);
        $dokumen->delete();

        return back()->with('success', 'Dokumen berhasil dihapus.');
    }
}

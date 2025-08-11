<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\PermohonanLayanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FormController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('user.form.create', compact('layanans'));
    }

    public function create($slug = null)
    {
        $layanans = Layanan::all();
        $layanan = null;
        $persyaratan = [];

        if ($slug) {
            $layanan = Layanan::where('slug', $slug)->firstOrFail();
            $persyaratan = json_decode($layanan->persyaratan, true);
        }

        return view('user.form.create', compact('layanans', 'layanan', 'persyaratan'));
    }

    public function store(Request $request, $slug)
    {
        $layanan = Layanan::where('slug', $slug)->firstOrFail();
        $persyaratan = json_decode($layanan->persyaratan, true);

        // Validasi input dinamis
        $rules = [];
        $messages = [];
        foreach ($persyaratan as $item) {
            $name = $item['name'];
            $label = $item['label'];
            $tipe = $item['tipe'];

            if ($tipe === 'file') {
                $rules[$name] = 'required|file|mimes:pdf,jpeg,jpg,png|max:2048';
                $messages["$name.required"] = "$label wajib diisi.";
                $messages["$name.file"] = "$label harus berupa file.";
                $messages["$name.mimes"] = "$label harus berupa file PDF, JPG, atau PNG.";
                $messages["$name.max"] = "$label maksimal berukuran 2MB.";
            } else {
                $rules[$name] = 'required|string';
                $messages["$name.required"] = "$label wajib diisi.";
            }
        }

        $request->validate($rules, $messages);

        // Simpan input
        $data_input = [];

        foreach ($persyaratan as $item) {
            $name = $item['name'];
            $tipe = $item['tipe'];

            if ($tipe === 'file' && $request->hasFile($name)) {
                $file = $request->file($name);
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/layanan', $filename, 'public');
                $data_input[$name] = $filename;
            } else {
                $data_input[$name] = $request->input($name);
            }
        }

        // Simpan ke database
        PermohonanLayanan::create([
            'user_id'    => Auth::id(),
            'layanan_id' => $layanan->id,
            'status'     => 'menunggu',
            'data'       => $data_input,
        ]);

        return redirect()->route('user.form.index')->with('success', 'Permohonan layanan berhasil dikirim.');
    }
}

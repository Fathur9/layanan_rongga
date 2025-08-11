<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index');
    }

    public function sejarah()
    {
        return view('profil.sejarah');
    }

    public function profilKecamatan()
    {
        return view('profil.profil-kecamatan');
    }

    public function struktur()
    {
        return view('profil.struktur');
    }

    public function tupoksi()
    {
        return view('profil.tupoksi');
    }

    public function program()
    {
        return view('profil.program');
    }

    public function pegawai()
    {
        return view('profil.pegawai');
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LayananController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    
    public function index()
    {
        return view('layanan.index');
    }

}

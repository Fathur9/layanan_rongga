@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h2 class="text-3xl font-extrabold text-white mb-10 text-center">Profil Kecamatan Rongga</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach([
            ['route' => 'profil.sejarah', 'title' => 'Data Penduduk', 'desc' => 'Data penduduk di kecamatan rongga.'],
            ['route' => 'profil.kecamatan', 'title' => 'Profil Kecamatan', 'desc' => 'Informasi umum wilayah dan demografi.'],
            ['route' => 'profil.struktur', 'title' => 'Struktur Organisasi', 'desc' => 'Struktur pemerintahan kecamatan.'],
            ['route' => 'profil.tupoksi', 'title' => 'Tupoksi', 'desc' => 'Tugas pokok dan fungsi kecamatan.'],
            ['route' => 'profil.program', 'title' => 'Program', 'desc' => 'Program kerja dan rencana strategis.'],
            ['route' => 'profil.pegawai', 'title' => 'Pegawai', 'desc' => 'Data dan informasi pegawai.']
        ] as $item)
        <a href="{{ route($item['route']) }}" class="bg-gradient-to-br from-green-600 to-green-800 hover:from-green-700 hover:to-green-900 text-white p-6 rounded-2xl shadow-lg transform hover:-translate-y-1 hover:scale-105 transition-all duration-300">
            <div class="flex items-center mb-4">
                <div class="bg-white bg-opacity-20 p-2 rounded-full mr-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold">{{ $item['title'] }}</h3>
            </div>
            <p class="text-sm text-white/90">{{ $item['desc'] }}</p>
        </a>
        @endforeach
    </div>
</div>
@endsection

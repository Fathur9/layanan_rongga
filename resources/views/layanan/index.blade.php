@extends('layouts.app')

@section('title', 'Layanan Masyarakat')

@section('content')
<section id="layanan" class="pt-12 bg-gray-900">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-12">Layanan Masyarakat Kecamatan Rongga</h2>

        @php
        $layanan = [
            ['icon' => 'bi-person-vcard', 'title' => 'KTP Elektronik', 'desc' => 'Penerbitan dan pencetakan KTP Elektronik.'],
            ['icon' => 'bi-people', 'title' => 'Kartu Keluarga (KK)', 'desc' => 'Pembuatan dan perubahan Kartu Keluarga.'],
            ['icon' => 'bi-journal-text', 'title' => 'SK Susunan Ahli Waris (SKSAW)', 'desc' => 'Surat keterangan susunan ahli waris.'],
            ['icon' => 'bi-geo-alt', 'title' => 'PBB - P2', 'desc' => 'Pelayanan Pajak Bumi dan Bangunan Pedesaan & Perkotaan.'],
            ['icon' => 'bi-person-workspace', 'title' => 'Kartu Pencari Kerja', 'desc' => 'Pelayanan kartu pencari kerja untuk masyarakat.'],
            ['icon' => 'bi-envelope-paper', 'title' => 'Surat keteranganTidak Mampu', 'desc' => 'Pelayanan surat keterangan tidak mampu untuk masyarakat.'],
            ['icon' => 'bi-file-earmark-text', 'title' => 'Pelayanan Proposal', 'desc' => 'Pengajuan proposal pembangunan atau bantuan.'],
            ['icon' => 'bi-arrow-left-right', 'title' => 'Surat Pindah', 'desc' => 'Pembuatan surat pindah penduduk.'],
            ['icon' => 'bi-shield-lock', 'title' => 'SKCK', 'desc' => 'Pelayanan surat pengantar SKCK ke Polsek.'],
        ];
        @endphp

        <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3">
        @foreach ($layanan as $item)
            <a href="{{ $item['link'] ?? '#' }}" class="group block bg-gray-800 border border-gray-700 p-8 rounded-xl shadow hover:shadow-xl transition-all duration-300">
                <div class="text-green-400 text-5xl mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="bi {{ $item['icon'] }}"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2 text-white group-hover:text-green-400">{{ $item['title'] }}</h3>
                <p class="text-gray-300 text-sm">{{ $item['desc'] }}</p>
            </a>
        @endforeach
        </div>

        {{-- Tombol Kembali --}}
        <div class="mt-10">
            <a href="{{ url('/') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</section>
@endsection

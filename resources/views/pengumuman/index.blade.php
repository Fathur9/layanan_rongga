@extends('layouts.app')

@section('title', 'Semua Pengumuman - Kecamatan Rongga')

@section('content')
<div class="container mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold mb-8 text-white border-b-4 border-blue-600 inline-block">
        Semua Pengumuman
    </h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($pengumuman as $item)
            <div class="bg-gray-800 rounded-lg overflow-hidden shadow hover:shadow-lg transition border border-gray-700">
                @if ($item->gambar)
                    <img src="{{ asset('storage/pengumuman/'.$item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-white mb-2">{{ $item->judul }}</h2>
                    <p class="text-gray-300 mb-4">{{ $item->isi }}</p>
                    <small class="text-gray-400 block">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</small>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Tombol Kembali --}}
    <div class="mt-10">
        <a href="{{ url('/') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
            ← Kembali ke Beranda
        </a>
    </div>
</div>
@endsection

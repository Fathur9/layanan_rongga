@extends('layouts.app')

@section('title', 'Galeri Kegiatan - Kecamatan Rongga')

@section('content')
<div class="container mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold mb-8 border-b-4 border-purple-500 text-white inline-block">
        Semua Galeri Kegiatan
    </h1>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
        {{-- Galeri 1 --}}
        <div class="overflow-hidden rounded-lg shadow-lg hover:scale-105 transform transition duration-300 bg-gray-800 border border-gray-700">
            <img src="{{ asset('storage/galeri/beberes.jpg') }}" alt="Kegiatan Bersih-bersih jalan raya" class="w-full h-40 object-cover">
            <div class="p-4 text-center text-white">
                <h4 class="font-semibold">Kegiatan Bersih-bersih jalan raya</h4>
                <small class="text-gray-400">20 Apr 2025</small>
            </div>
        </div>

        {{-- Galeri 2 --}}
        <div class="overflow-hidden rounded-lg shadow-lg hover:scale-105 transform transition duration-300 bg-gray-800 border border-gray-700">
            <img src="{{ asset('storage/galeri/rapat.jpeg') }}" alt="Rapat Semua Staff" class="w-full h-40 object-cover">
            <div class="p-4 text-center text-white">
                <h4 class="font-semibold">Rapat Semua Staff</h4>
                <small class="text-gray-400">15 Mar 2025</small>
            </div>
        </div>

        {{-- Galeri 3 --}}
        <div class="overflow-hidden rounded-lg shadow-lg hover:scale-105 transform transition duration-300 bg-gray-800 border border-gray-700">
            <img src="{{ asset('storage/galeri/senam.jpeg') }}" alt="Kegiatan Senam Bersama Masyarakat" class="w-full h-40 object-cover">
            <div class="p-4 text-center text-white">
                <h4 class="font-semibold">Kegiatan Senam Bersama Masyarakat</h4>
                <small class="text-gray-400">21 Mar 2025</small>
            </div>
        </div>

        {{-- Galeri 4 --}}
        <div class="overflow-hidden rounded-lg shadow-lg hover:scale-105 transform transition duration-300 bg-gray-800 border border-gray-700">
            <img src="{{ asset('storage/galeri/upacara.jpeg') }}" alt="Kegiatan Upacara" class="w-full h-40 object-cover">
            <div class="p-4 text-center text-white">
                <h4 class="font-semibold">Kegiatan Upacara</h4>
                <small class="text-gray-400">24 Mar 2025</small>
            </div>
        </div>

        {{-- Galeri 5 --}}
        <div class="overflow-hidden rounded-lg shadow-lg hover:scale-105 transform transition duration-300 bg-gray-800 border border-gray-700">
            <img src="{{ asset('storage/galeri/zoom.jpeg') }}" alt="Kegiatan Zoom Bersama Bupati" class="w-full h-40 object-cover">
            <div class="p-4 text-center text-white">
                <h4 class="font-semibold">Kegiatan Zoom Bersama Bupati</h4>
                <small class="text-gray-400">1 Apr 2025</small>
            </div>
        </div>

        {{-- Galeri 6 --}}
        <div class="overflow-hidden rounded-lg shadow-lg hover:scale-105 transform transition duration-300 bg-gray-800 border border-gray-700">
            <img src="{{ asset('storage/galeri/pelayanan.jpg') }}" alt="Kegiatan Pelayanan Masyarakat" class="w-full h-40 object-cover">
            <div class="p-4 text-center text-white">
                <h4 class="font-semibold">Kegiatan Pelayanan Masyarakat</h4>
                <small class="text-gray-400">15 Apr 2025</small>
            </div>
        </div>
    </div>

    {{-- Tombol kembali --}}
    <div class="text-center mt-10">
        <a href="{{ url('/') }}" class="inline-block px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            ← Kembali ke Beranda
        </a>
    </div>
</div>
@endsection

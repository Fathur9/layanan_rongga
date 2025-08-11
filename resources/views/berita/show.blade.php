@extends('layouts.app')

@section('title', $item['judul'] . ' - Kecamatan Rongga')

@section('content')
<section class="py-16 px-6 lg:px-20 bg-gray-900 text-gray-100 min-h-screen" data-aos="fade-up">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold text-white mb-6">
            {{ $item['judul'] }}
        </h1>
        <p class="text-gray-300 mb-6">
            {{ isset($item['created_at']) 
                ? \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d F Y') 
                : (isset($item['tanggal']) 
                    ? \Carbon\Carbon::parse($item['tanggal'])->translatedFormat('d F Y') 
                    : '-') }}
        </p>
        <img src="{{ asset('storage/berita/' . $item['gambar']) }}" alt="{{ $item['judul'] }}" class="rounded-lg mb-6 w-full object-cover max-h-[400px]">

        <div class="text-gray-200 leading-relaxed">
            {!! nl2br(e($item['isi'])) !!}
        </div>

        <div class="mt-10">
            <a href="{{ route('berita.index') }}" class="inline-block bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
                ← Kembali ke Daftar Berita
            </a>
        </div>
    </div>
</section>
@endsection

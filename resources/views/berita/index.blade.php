@extends('layouts.app')

@section('title', 'Berita - Kecamatan Rongga')

@section('content')
<section id="Berita" class="pt-12 bg-gray-900">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-10 border-b-4 border-blue-600 inline-block">
            Berita Terbaru
        </h1>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($berita as $item)
               <div class="bg-gray-800 rounded-lg shadow hover:shadow-xl transition overflow-hidden border border-gray-700 text-white" data-aos="fade-up" data-aos-delay="100">
    <img src="{{ asset('storage/berita/' . $item['gambar']) }}" alt="{{ $item['judul'] }}" class="w-full h-40 object-cover">

    <div class="p-5">
        <h2 class="text-xl font-semibold mb-2">
            {{ $item['judul'] }}
        </h2>
        <p class="text-gray-400 text-sm mb-4">
            {{ isset($item['created_at']) 
            ? \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d F Y') 
            : (isset($item['tanggal']) 
            ? \Carbon\Carbon::parse($item['tanggal'])->translatedFormat('d F Y') 
            : '-') }}
        </p>
        <p class="text-gray-300 line-clamp-4">
            {{ Str::limit(strip_tags($item['isi']), 120) }}
        </p>
        <a href="{{ route('berita.show', $item['slug']) }}" class="mt-4 inline-block text-blue-400 hover:underline font-semibold">
            Baca Selengkapnya →
        </a>
    </div>
</div>

            @empty
                <p class="text-gray-600 dark:text-gray-300">Belum ada berita tersedia.</p>
            @endforelse
        </div>

        <div class="mt-10">
            <a href="{{ url('/') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</section>
@endsection

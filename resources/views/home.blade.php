@extends('layouts.app')

@section('title', 'Beranda - Pelayanan Publik Kecamatan Rongga')

@section('content')

{{-- HERO SECTION --}}
<section class="relative min-h-screen flex flex-col md:flex-row items-center px-6 overflow-hidden bg-gradient-to-br from-blue-800 via-blue-900 to-black text-white">

  {{-- Teks di kiri --}}
  <div class="w-full md:w-1/2 relative z-10 max-w-xl space-y-6 px-4 text-center md:text-left">
    <h1 class="text-4xl md:text-5xl font-extrabold leading-tight drop-shadow-lg text-white">
      Selamat Datang di Website<br>
      <span class="text-yellow-400">Kecamatan Rongga</span>
    </h1>
    <p class="text-lg md:text-xl text-gray-200 drop-shadow-md">
      Pelayanan publik yang lebih mudah, cepat, dan transparan untuk masyarakat.
    </p>
    <a href="{{ route('layanan.index') }}" class="inline-block bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-semibold py-3 px-6 rounded-xl shadow-lg transition">
      Lihat Layanan
    </a>
  </div>

  {{-- Gambar di kanan --}}
  <div class="w-full md:w-1/2 flex justify-center md:justify-end mb-8 md:mb-0">
    <img src="{{ asset('img/ok-bg.png') }}" alt="Background" class="object-contain max-h-[70vh] md:max-h-[80vh]" />
  </div>

</section>

{{-- KONTEN UTAMA --}}
<div class="container mx-auto px-6 py-16 space-y-24">

    {{-- PENGUMUMAN TERBARU --}}
    <section id="pengumuman" class="scroll-mt-24" data-aos="fade-up">
        <h2 class="text-3xl font-bold mb-8 border-b-4 border-blue-600 inline-block text-white drop-shadow-md">Pengumuman Terbaru</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($pengumuman as $item)
                <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition border border-gray-700 flex flex-col">
                    <img src="{{ asset('storage/pengumuman/'.$item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover rounded mb-4">
                    <h3 class="text-xl font-semibold text-white drop-shadow-md">{{ $item->judul }}</h3>
                    <p class="text-gray-300 mt-2 line-clamp-4 flex-grow drop-shadow-sm">{{ $item->isi }}</p>
                    <small class="text-gray-400 mt-4 block drop-shadow-sm">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</small>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('pengumuman.index') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition drop-shadow-md">
                Lihat Semua Pengumuman
            </a>
        </div>
    </section>

    {{-- GALERI --}}
    <section id="galeri" class="scroll-mt-24" data-aos="fade-up" data-aos-delay="200">
        <h2 class="text-3xl font-bold mb-8 border-b-4 border-purple-600 inline-block text-white drop-shadow-md">Galeri Kegiatan</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ([
                ['src' => 'beberes.jpg', 'alt' => 'Kegiatan Bersih-bersih jalan raya', 'title' => 'Kegiatan Bersih-bersih jalan raya', 'date' => '20 Apr 2025'],
                ['src' => 'rapat.jpeg', 'alt' => 'Rapat Semua Staff', 'title' => 'Rapat Semua Staff', 'date' => '15 Mar 2025'],
                ['src' => 'senam.jpeg', 'alt' => 'Kegiatan Senam Bersama Masyarakat', 'title' => 'Kegiatan Senam Bersama Masyarakat', 'date' => '21 Mar 2025'],
            ] as $gallery)
                <div class="overflow-hidden rounded-lg shadow-md hover:scale-105 transform transition duration-300 bg-gray-800 border border-gray-700 flex flex-col">
                    <img src="{{ asset('storage/galeri/'.$gallery['src']) }}" alt="{{ $gallery['alt'] }}" class="w-full h-44 object-cover rounded-t-lg">
                    <div class="p-5 text-center flex flex-col flex-grow justify-between">
                        <h4 class="font-semibold text-white mb-2 drop-shadow-md">{{ $gallery['title'] }}</h4>
                        <small class="text-gray-400">{{ $gallery['date'] }}</small>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="w-full flex justify-center mt-10">
            <a href="{{ route('galeri.index') }}" class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition drop-shadow-md">
                Lihat Semua Galeri
            </a>
        </div>
    </section>

    {{-- RINGKASAN BERITA --}}
    <section id="berita-ringkasan" class="scroll-mt-24" data-aos="fade-up" data-aos-delay="400">
        <h2 class="text-3xl font-bold mb-8 border-b-4 border-blue-600 inline-block text-white drop-shadow-md">Berita Terbaru</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($berita->take(3) as $item)
                <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition border border-gray-700 flex flex-col">
                    <img src="{{ asset('storage/berita/'.$item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-40 object-cover rounded mb-4">
                    <h3 class="text-xl font-semibold text-white drop-shadow-md">{{ $item->judul }}</h3>
                    <p class="text-gray-300 mt-2 line-clamp-3 flex-grow drop-shadow-sm">{{ Str::limit($item->isi, 100) }}</p>
                    <a href="{{ route('berita.show', $item->slug) }}" class="text-blue-400 hover:underline mt-4 inline-block drop-shadow-sm">Baca Selengkapnya</a>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('berita.index') }}" class="text-blue-400 hover:underline mt-2 inline-block drop-shadow-sm">Lihat Semua Berita</a>
        </div>
    </section>

</div>
@endsection

@section('scripts')
    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-out-back',
            once: false,
            mirror: true,
            offset: 100
        });
    </script>
@endsection

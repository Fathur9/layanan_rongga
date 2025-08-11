@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<!-- Section: Kontak + Peta -->
<section id="kontak" class="bg-gray-900 text-white py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-green-400 mb-10">Hubungi Kami</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

            <!-- Maps -->
            <div class="w-full h-[300px]">
                <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63355.93504120628!2d107.19115214028391!3d-6.994277298115121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8baccb4f17d%3A0x2bfe271fa4d9c23b!2sKecamatan%20Rongga%2C%20Kabupaten%20Bandung%20Barat%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1717316028364!5m2!1sid!2sid"
                width="100%"
                height="100%"
                style="border:0; border-radius: 1rem;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Kontak Info -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-2xl font-bold text-green-400 mb-2">Alamat</h3>
                    <p class="text-gray-300">Jl. Lebaksaat, Cibedug, Rongga, Bojongsalam, Kec. Rongga, Kabupaten Bandung Barat, Jawa Barat</p>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-green-400 mb-2">Telepon</h3>
                    <p class="text-gray-300">(082)121360099</p>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-green-400 mb-2">Email</h3>
                    <p class="text-gray-300">kecamatan.rongga@gmail.com</p>
                </div>

                <div class="flex space-x-4 mt-4">
                    <a href="tel:0221234567" class="bg-green-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-green-600 transition">Telepon</a>
                    <a href="mailto:desa.rongga@example.com" class="bg-green-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-green-600 transition">Email</a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <script src="//unpkg.com/alpinejs" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kecamatan Rongga</title>
    <link rel="stylesheet" href="{{ vite_asset('resources/css/app.css') }}">
    <script src="{{ vite_asset('resources/js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-darkblue text-darkblue-contrast">

    

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Content --}}
    <main class="pt-20">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white mt-16 border-t border-gray-700">
    <div class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-10">

        {{-- Logo dan Deskripsi --}}
        <div>
            <div class="flex items-center mb-3 space-x-3">
                <img src="{{ asset('img/desa-bg.png') }}" alt="Logo Kecamatan" class="w-12 h-12">
                <h3 class="text-xl font-bold">Kecamatan Rongga</h3>
            </div>
            <p class="text-gray-300 text-sm leading-relaxed">
                Pelayanan publik berbasis digital untuk masyarakat Rongga yang lebih baik.
            </p>
        </div>

        {{-- Kontak --}}
        <div>
            <h4 class="text-lg font-semibold mb-4 border-b border-gray-700 pb-2">Kontak</h4>
            <ul class="space-y-2 text-sm text-gray-300">
                <li><strong>Alamat:</strong> Jl. Raya Rongga No. 123</li>
                <li><strong>Email:</strong> <a href="mailto:info@kecamatanrongga.go.id" class="text-blue-400 hover:underline">info@kecamatanrongga.go.id</a></li>
                <li><strong>Telepon:</strong> (022) 1234567</li>
            </ul>
        </div>

        {{-- Maps --}}
        <div>
            <h4 class="text-lg font-semibold mb-4 border-b border-gray-700 pb-2">Lokasi Kami</h4>
            <div class="rounded-lg overflow-hidden shadow-lg border border-gray-700">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126654.72867640428!2d107.2989644!3d-6.9742379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68ec5d46489fbf%3A0x8f18e57440432e58!2sKecamatan%20Rongga%2C%20Kabupaten%20Bandung%20Barat!5e0!3m2!1sid!2sid!4v1716119794525!5m2!1sid!2sid" 
                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </div>

    <div class="bg-gray-800 border-t border-gray-700 py-4 text-center text-sm text-gray-400">
        &copy; {{ date('Y') }} Kecamatan Rongga. All rights reserved.
    </div>
</footer>


</body>
</html>

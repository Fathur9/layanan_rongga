<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Dashboard')</title>

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    {{-- Alpine.js --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- Tailwind --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- Vite --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    {{-- Sidebar fixed --}}
    @include('user.layouts.sidebar-user')

    {{-- Konten utama dengan margin kiri sesuai lebar sidebar --}}
    <div class="ml-64 min-h-screen">
        {{-- Navbar fixed --}}
        @include('user.layouts.navbar-user')

        {{-- Main content --}}
        <main class="mt-20 p-6 min-h-screen"> {{-- <== GANTI pt-24 jadi mt-20 --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 max-w-xl mx-auto">
                    {{ session('success') }}
                </div>
            @endif
             @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 max-w-xl mx-auto">
        <strong>Terjadi kesalahan:</strong>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>


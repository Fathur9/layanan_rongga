<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

    @vite('resources/css/app.css')

<style>
    @media print {
        aside, nav, header, .print\:hidden, .no-print {
            display: none !important;
        }

        body, html {
            margin: 0 !important;
            padding: 0 !important;
            background: white !important;
            color: black !important;
        }

        main {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }
    }
</style>

</head>
<body class="flex h-screen bg-gray-100">

    {{-- Sidebar - tetap di kiri --}}
    <aside class="w-64 fixed top-0 left-0 h-full bg-white shadow-lg z-30">
        @include('admin.layouts.sidebar-admin')
    </aside>

    {{-- Konten Utama --}}
    <div class="flex-1 flex flex-col ml-64">

        {{-- Navbar - tetap di atas --}}
        <header class="sticky top-0 z-20 bg-white shadow">
            @include('admin.layouts.navbar-admin')
        </header>

        {{-- Konten Scrollable --}}
        <main class="flex-1 overflow-y-auto p-4">
            @yield('content')
        </main>
    </div>

@stack('scripts')
<script src="https://unpkg.com/alpinejs" defer></script>
</body>
</html>

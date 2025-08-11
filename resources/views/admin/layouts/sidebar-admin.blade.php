<div class="bg-gradient-to-b from-slate-800 to-slate-900 min-h-screen w-64 text-white p-6 shadow-2xl rounded-tr-3xl rounded-br-3xl" x-data="{ layananOpen: false }">
    <!-- Logo & Title -->
    <div class="flex items-center mb-8 space-x-3">
        <img src="{{ asset('img/desa-bg.png') }}" alt="Logo" class="w-10 h-10 drop-shadow-lg" />
        <h1 class="text-2xl font-bold tracking-wide">Admin Panel</h1>
    </div>

    <!-- Navigation -->
    <nav class="space-y-4 text-base font-medium">
        <!-- Dashboard -->
        <a href="{{ url('/admin/dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 transition shadow-md">
            <i class="fa-solid fa-house text-xl text-white drop-shadow-md"></i>
            <span>Dashboard</span>
        </a>

        {{-- Permohonan Layanan --}}
        <a href="{{ route('admin.permohonan.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-slate-700 transition shadow-md">
            <i class="fa-solid fa-list-check text-xl text-yellow-300 drop-shadow-md"></i>
            <span>Permohonan Layanan</span>
        </a>
        
        <!-- Laporan -->
        <a href="{{ route('admin.laporan.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-slate-700 transition shadow-md">
            <i class="fa-solid fa-chart-line text-xl text-green-300 drop-shadow-md"></i>
            <span>Laporan</span>
        </a>

        <!-- Pengaturan Admin -->
        <a href="{{ route('admin.pengaturan') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-slate-700 transition shadow-md {{ request()->routeIs('admin.pengaturan') ? 'bg-slate-700' : '' }}">
            <i class="fa-solid fa-gear text-xl text-indigo-300 drop-shadow-md"></i>
            <span>Pengaturan Admin</span>
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-slate-700 transition text-red-400 shadow-md">
                <i class="fa-solid fa-right-from-bracket text-xl drop-shadow-md"></i>
                <span>Logout</span>
            </button>
        </form>
    </nav>
</div>

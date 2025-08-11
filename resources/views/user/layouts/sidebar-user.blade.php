<div class="fixed top-0 left-0 h-screen w-64 bg-gradient-to-b from-slate-800 to-slate-900 text-white p-6 shadow-2xl overflow-y-auto rounded-tr-3xl rounded-br-3xl z-50">
    <!-- Logo & Title -->
    <div class="flex items-center mb-8 space-x-3">
        <img src="{{ asset('img/desa-bg.png') }}" alt="Logo" class="w-10 h-10 drop-shadow-lg" />
        <h1 class="text-2xl font-bold tracking-wide">User Panel</h1>
    </div>

    <!-- Navigation -->
    <nav class="space-y-4 text-base font-medium">
        <a href="{{ route('user.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 transition shadow-md">
            <i class="fa-solid fa-house text-xl text-white drop-shadow-md"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('user.form.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl bg-green-800 hover:bg-green-700 transition shadow-md">
            <i class="fa-solid fa-pen-to-square text-xl text-yellow-300 drop-shadow-md"></i>
            <span>Layanan Masyarakat</span>
        </a>

        <a href="{{ route('user.permohonan.riwayat') }}" class="flex items-center space-x-2 px-4 py-2 hover:bg-gray-800 rounded-md">
            <i class="fa-solid fa-clock-rotate-left text-lg"></i>
            <span>Riwayat Permohonan</span>
        </a>

        <a href="{{ route('user.pengaduan.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-slate-700 transition shadow-md">
            <i class="fa-solid fa-bullhorn text-xl text-red-400 drop-shadow-md"></i>
            <span>Pengaduan</span>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-slate-700 transition text-red-400 shadow-md">
                <i class="fa-solid fa-right-from-bracket text-xl drop-shadow-md"></i>
                <span>Logout</span>
            </button>
        </form>
    </nav>
</div>

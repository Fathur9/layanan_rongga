<nav class="bg-gradient-to-r from-blue-800 via-blue-900 to-black text-white px-4 py-4 shadow-md fixed top-0 w-full z-50"
     style="background-color: #0f172a !important;"
     x-data="{ mobileOpen: false, dropdownOpen: false }"
     x-init="mobileOpen = false; dropdownOpen = false">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <img src="/img/desa-bg.png" alt="Logo" class="w-12 h-12">
            <span class="text-2xl font-bold">Kecamatan Rongga</span>
        </div>

        <!-- Toggle Mobile -->
        <button @click="mobileOpen = !mobileOpen" class="md:hidden focus:outline-none">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Menu -->
        <div :class="{ 'block': mobileOpen, 'hidden': !mobileOpen }"
             class="md:flex md:items-center md:space-x-6 md:static absolute top-full left-0 w-full md:w-auto bg-gradient-to-r from-blue-800 via-blue-900 to-black z-50 md:z-auto hidden flex-col md:flex-row mt-3 md:mt-0">

            <a href="/" class="block px-4 py-2 text-lg hover:text-yellow-400">Home</a>
            <a href="/profil" class="block px-4 py-2 text-lg hover:text-yellow-400">Profil</a>
            <a href="/layanan" class="block px-4 py-2 text-lg hover:text-yellow-400">Layanan</a>
            <a href="/berita" class="block px-4 py-2 text-lg hover:text-yellow-400">Berita</a>
            <a href="/kontak" class="block px-4 py-2 text-lg hover:text-yellow-400">Kontak</a>
            <a href="/login" class="block px-4 py-2 text-lg bg-yellow-400 hover:bg-yellow-300 text-gray-900 rounded text-center md:ml-4 font-semibold">Login</a>
        </div>
    </div>
</nav>

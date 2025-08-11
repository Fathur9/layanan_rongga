<nav class="flex items-center justify-between px-6 py-3 bg-white shadow-md border-b">
    <!-- Kiri: Logo Dashboard -->
    <div class="text-xl font-semibold text-slate-700 flex items-center space-x-2">
        <i class="fa-solid fa-gauge-high text-indigo-600"></i>
        <span>Dashboard Pelayanan</span>    
    </div>

    <!-- Kanan: Jam dan Admin -->
    <div class="flex items-center space-x-8 text-sm font-medium text-slate-700">
        <!-- Jam -->
        <div class="flex items-center space-x-2">
            <i class="fa-regular fa-clock text-yellow-500"></i>
            <span id="clock" class="min-w-[50px]">--:--</span>
        </div>

        <!-- Admin Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="flex items-center space-x-2 focus:outline-none hover:text-indigo-600 transition">
                <div
                    class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-sm">
                    A
                </div>
                <span>Admin</span>
                <i class="fa-solid fa-chevron-down text-xs ml-1"></i>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" @click.outside="open = false" x-transition
                class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-md z-50 py-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition flex items-center space-x-2">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Clock Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function updateClock() {
            const now = new Date();
            const jam = now.getHours().toString().padStart(2, '0');
            const menit = now.getMinutes().toString().padStart(2, '0');
            document.getElementById('clock').textContent = `${jam}:${menit}`;
        }
        setInterval(updateClock, 1000);
        updateClock();
    });
</script>

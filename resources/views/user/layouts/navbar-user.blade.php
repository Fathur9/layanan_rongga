<nav class="fixed top-0 left-64 right-0 h-20 bg-white shadow-md border-b flex items-center justify-between px-6 z-50">
    <div class="text-xl font-semibold text-slate-700 flex items-center space-x-2">
        <i class="fa-solid fa-gauge-high text-indigo-600"></i>
        <span>Dashboard Pelayanan</span>
    </div>

    <ul class="flex items-center text-sm font-medium text-slate-700">
        <li class="ml-8 flex items-center space-x-2">
            <i class="fa-regular fa-clock text-yellow-500"></i>
            <span id="clock">--:--</span>
        </li>
        <li class="relative ml-10" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center space-x-2 hover:text-indigo-600">
                <i class="fa-regular fa-user text-indigo-500"></i>
                <span>{{ Auth::user()->name }}</span>
                <i class="fa-solid fa-chevron-down text-xs"></i>
            </button>
            <div x-show="open" @click.outside="open = false" x-transition
                 class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-md z-50 py-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 flex items-center space-x-2">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>

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

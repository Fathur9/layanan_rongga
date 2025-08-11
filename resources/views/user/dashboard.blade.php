@extends('user.layouts.user')

@section('content')
<h2 class="text-2xl font-bold mb-6">👋 Selamat datang, {{ Auth::user()->name }}</h2>

<div id="statistik-wrapper" class="mb-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
        @foreach ([
            ['label' => 'TOTAL', 'color' => 'bg-pink-500', 'icon' => '📋', 'id' => 'total'],
            ['label' => 'MENUNGGU', 'color' => 'bg-yellow-400', 'icon' => '⏳', 'id' => 'menunggu'],
            ['label' => 'DIPROSES', 'color' => 'bg-blue-400', 'icon' => '🔧', 'id' => 'diproses'],
            ['label' => 'SELESAI', 'color' => 'bg-green-500', 'icon' => '✅', 'id' => 'selesai'],
            ['label' => 'DITOLAK', 'color' => 'bg-red-500', 'icon' => '❌', 'id' => 'ditolak'],
        ] as $stat)
        <div class="p-4 {{ $stat['color'] }} text-white rounded-xl text-center shadow-md hover:scale-105 transition">
            <div class="text-3xl mb-1">{{ $stat['icon'] }}</div>
            <p class="text-sm">{{ $stat['label'] }}</p>
            <h3 id="{{ $stat['id'] }}" class="text-3xl font-bold">0</h3>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('{{ route('user.dashboard.statistik') }}')
            .then(res => res.json())
            .then(data => {
                document.getElementById('total').textContent = data.total;
                document.getElementById('menunggu').textContent = data.menunggu;
                document.getElementById('diproses').textContent = data.diproses;
                document.getElementById('selesai').textContent = data.selesai;
                document.getElementById('ditolak').textContent = data.ditolak;
            })
            .catch(err => {
                console.error('Gagal memuat data statistik:', err);
            });
    });
</script>
@endpush

@extends('admin.layouts.admin')

@section('content')
<h2 class="text-2xl font-bold mb-6">📊 Dashboard Admin</h2>

<div id="statistik-wrapper" class="mb-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
        @foreach ([
            ['label' => 'TOTAL', 'color' => 'bg-pink-500', 'icon' => '📋', 'id' => 'total'],
            ['label' => 'MENUNGGU', 'color' => 'bg-yellow-400', 'icon' => '⏳', 'id' => 'menunggu'],
            ['label' => 'DIPROSES', 'color' => 'bg-orange-400', 'icon' => '🔧', 'id' => 'diproses'],
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

<div class="mt-10">
    <h3 class="text-xl font-bold mb-4">📄 Daftar Permohonan Terbaru</h3>

    <!-- KURUNGAN TABEL -->
    <div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-md p-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 text-sm uppercase tracking-wide">
                <tr>
                    <th class="px-6 py-3 text-left">#</th>
                    <th class="px-6 py-3 text-left">Nama Pemohon</th>
                    <th class="px-6 py-3 text-left">Layanan</th>
                    <th class="px-6 py-3 text-left">Tanggal</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-800">
                @forelse ($permohonans as $index => $p)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $p->user->name ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $p->layanan->nama_layanan ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $p->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                {{ match($p->status) {
                                    'menunggu' => 'bg-yellow-100 text-yellow-800',
                                    'diproses' => 'bg-blue-100 text-blue-800',
                                    'selesai' => 'bg-green-100 text-green-800',
                                    'ditolak' => 'bg-red-100 text-red-800',
                                    default => 'bg-gray-100 text-gray-600',
                                } }}">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="#" class="inline-block text-sm font-medium text-blue-600 hover:text-blue-800 transition">
                                <i class="fas fa-eye mr-1"></i> Lihat
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500 italic">
                            Belum ada permohonan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('{{ route('admin.dashboard.statistik') }}')
            .then(res => res.json())
            .then(data => {
                console.log('Data Statistik:', data);
                document.getElementById('total').textContent = data.total;
                document.getElementById('menunggu').textContent = data.menunggu;
                document.getElementById('diproses').textContent = data.diproses;
                document.getElementById('selesai').textContent = data.selesai;
                document.getElementById('ditolak').textContent = data.ditolak;
            })
            .catch(err => console.error('Gagal memuat data statistik:', err));
    });
</script>
@endpush


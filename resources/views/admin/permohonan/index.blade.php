@extends('admin.layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 flex items-center gap-3">
        <i class="fas fa-layer-group text-indigo-600"></i> Daftar Permohonan Layanan
    </h1>

    {{-- Filter Dropdown --}}
    <div class="mb-6">
        <form method="GET" class="flex gap-4 flex-wrap items-end">
    <div>
        <label for="jenis" class="block text-sm font-medium text-gray-600 mb-1">Jenis Permohonan</label>
        <select name="jenis" id="jenis"
            class="w-full px-4 py-2 border rounded-xl text-sm shadow-sm"
            onchange="this.form.submit()">
            <option value="semua" {{ $jenis == 'semua' ? 'selected' : '' }}>🌐 Semua Jenis</option>
            <option value="layanan" {{ $jenis == 'layanan' ? 'selected' : '' }}>📄 Layanan</option>
            <option value="pengaduan" {{ $jenis == 'pengaduan' ? 'selected' : '' }}>📢 Pengaduan</option>
        </select>
    </div>
    <div>
        <label for="status" class="block text-sm font-medium text-gray-600 mb-1">Filter Status</label>
        <select name="status" id="status"
            class="w-full px-4 py-2 border rounded-xl text-sm shadow-sm"
            onchange="this.form.submit()">
            <option value="semua" {{ $status == 'semua' ? 'selected' : '' }}>🌐 Semua Status</option>
            <option value="menunggu" {{ $status == 'menunggu' ? 'selected' : '' }}>⏳ Menunggu</option>
            <option value="diproses" {{ $status == 'diproses' ? 'selected' : '' }}>⚙️ Diproses</option>
            <option value="selesai" {{ $status == 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
            <option value="ditolak" {{ $status == 'ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
        </select>
    </div>
</form>
    </div>

    {{-- Tabel Responsif --}}
    <div class="overflow-x-auto bg-white rounded-2xl shadow-md">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gradient-to-r from-indigo-100 to-indigo-200 text-indigo-800 font-semibold uppercase text-xs">
                <tr>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Layanan</th>
                    <th class="px-6 py-4 text-left">Status</th>
                    <th class="px-6 py-4 text-left">Tanggal</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700">
    @forelse ($permohonans as $item)
        <tr class="hover:bg-indigo-50 transition">
            <td class="px-6 py-4">{{ $item->user }}</td>
            <td class="px-6 py-4">
                @if ($item->jenis === 'layanan') 📄 @else 📢 @endif
                {{ $item->judul }}
            </td>
            <td class="px-6 py-4">
                @php
                    $badge = match($item->status) {
                        'menunggu' => 'bg-yellow-100 text-yellow-800',
                        'diproses' => 'bg-blue-100 text-blue-800',
                        'selesai' => 'bg-green-100 text-green-800',
                        'ditolak' => 'bg-red-100 text-red-800',
                        default => 'bg-gray-100 text-gray-600'
                    };
                @endphp
                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $badge }}">
                    {{ ucfirst($item->status) }}
                </span>
            </td>
            <td class="px-6 py-4">{{ $item->tanggal->format('d-m-Y H:i') }}</td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center gap-2">
                    @if ($item->jenis === 'layanan')
                        <a href="{{ route('admin.permohonan.show', $item->id) }}"
                            class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-800 bg-indigo-100 hover:bg-indigo-200 px-3 py-1 rounded-lg text-xs shadow">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                        <a href="{{ route('admin.permohonan.edit', $item->id) }}"
                            class="inline-flex items-center gap-1 bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-xs shadow">
                            <i class="fas fa-edit"></i> Proses
                        </a>
                    @else
                        <a href="{{ route('admin.pengaduan.show', $item->id) }}"
                            class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-800 bg-indigo-100 hover:bg-indigo-200 px-3 py-1 rounded-lg text-xs shadow">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                    @endif
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-6 py-6 text-center text-gray-400 italic">
                Tidak ada data untuk ditampilkan.
            </td>
        </tr>
    @endforelse
</tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $permohonans->withQueryString()->links() }}
    </div>
</div>
@endsection

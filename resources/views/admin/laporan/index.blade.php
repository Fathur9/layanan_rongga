@extends('admin.layouts.admin')

@section('content')
{{-- === Filter (sembunyi saat cetak) === --}}
<form method="GET" action="{{ route('admin.laporan.index') }}" class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6 print:hidden">
    <div>
        <label class="text-sm font-medium">Bulan</label>
        <select name="bulan" class="w-full px-3 py-2 rounded-lg shadow-sm border dark:bg-slate-800 dark:border-slate-700">
            @foreach(range(1, 12) as $b)
                <option value="{{ sprintf('%02d', $b) }}" {{ $bulan == sprintf('%02d', $b) ? 'selected' : '' }}>
                    {{ DateTime::createFromFormat('!m', $b)->format('F') }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="text-sm font-medium">Tahun</label>
        <select name="tahun" class="w-full px-3 py-2 rounded-lg shadow-sm border dark:bg-slate-800 dark:border-slate-700">
            @for($i = now()->year; $i >= 2020; $i--)
                <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
    </div>
    <div>
        <label class="text-sm font-medium">Layanan</label>
        <select name="layanan_id" class="w-full px-3 py-2 rounded-lg shadow-sm border dark:bg-slate-800 dark:border-slate-700">
            <option value="">Semua Layanan</option>
            @foreach($layanans as $layanan)
                <option value="{{ $layanan->id }}" {{ request('layanan_id') == $layanan->id ? 'selected' : '' }}>
                    {{ $layanan->nama_layanan }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="flex items-end">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
            <i class="fas fa-search mr-1"></i> Tampilkan
        </button>
    </div>
</form>

{{-- === Kop Surat: tampil saat print === --}}
<div class="hidden print:block text-center mb-4 border-b border-black pb-4">
    <img src="{{ asset('logo-kecamatan.png') }}" alt="Logo Kecamatan" class="mx-auto mb-2" style="width:80px;">
    <h1 class="text-xl font-bold uppercase">PEMERINTAH KABUPATEN BANDUNG BARAT</h1>
    <h2 class="text-lg font-semibold uppercase">KECAMATAN RONGGA</h2>
    <p class="text-sm">Jl. Lebaksaat, Cibedug, Rongga, Bojongsalam, Kec. Rongga, Kabupaten Bandung Barat, Jawa Barat</p>
    <p class="text-sm">Telp. (082)121360099 – Email: kecamatan.rongga@gmail.com</p>
    <hr class="my-2 border-t-2 border-black">
</div>

{{-- === Judul Laporan === --}}
<div class="text-center mb-6">
    <h1 class="text-2xl md:text-3xl font-bold uppercase print:text-lg">Laporan Permohonan Layanan</h1>
</div>

{{-- === Tabel Laporan === --}}
<div class="bg-white dark:bg-slate-800 shadow rounded-lg overflow-x-auto print:shadow-none print:bg-white">
    <table class="min-w-full text-sm text-left border border-gray-300 print:text-black">
        <thead class="bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-200 uppercase print:bg-white">
            <tr>
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Layanan</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($permohonans as $index => $p)
            <tr class="even:bg-gray-50 dark:even:bg-slate-700 print:bg-white print:text-black">
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $p->user->name ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $p->layanan->nama_layanan ?? '-' }}</td>
                <td class="border px-4 py-2 capitalize">{{ $p->status }}</td>
                <td class="border px-4 py-2">{{ $p->created_at->format('d M Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-4 text-gray-500 italic">Tidak ada data permohonan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- === Tombol Cetak (tidak muncul di print) === --}}
<div class="mt-6 flex gap-4 print:hidden">
    <a href="{{ route('admin.laporan.cetak', ['bulan' => request('bulan'), 'tahun' => request('tahun')]) }}" 
   target="_blank"
   class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow flex items-center gap-2">
    <i class="fas fa-print"></i> Cetak
</a>
</div>
@endsection

@extends('admin.layouts.admin')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Detail Pengaduan</h2>

    <div class="space-y-2 text-gray-700">
        <p><strong>Nama Pengadu:</strong> {{ $pengaduan->user->name }}</p>
        <p><strong>Judul:</strong> {{ $pengaduan->judul }}</p>
        <p><strong>Status:</strong>
            <span class="capitalize font-semibold
                @if($pengaduan->status === 'diproses') text-yellow-600
                @elseif($pengaduan->status === 'selesai') text-green-600
                @else text-red-600 @endif">
                {{ $pengaduan->status }}
            </span>
        </p>
        <p><strong>Isi Pengaduan:</strong><br>{{ $pengaduan->isi }}</p>
        <p><strong>Tanggal:</strong> {{ $pengaduan->created_at->format('d M Y, H:i') }}</p>

        @if($pengaduan->foto)
            <div class="mt-4">
                <strong>Foto Bukti:</strong><br>
                <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Pengaduan" class="w-64 rounded shadow">
            </div>
        @endif
    </div>

    <a href="{{ route('admin.permohonan.index') }}"
       class="inline-block mt-6 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded">
        ← Kembali
    </a>
</div>
@endsection

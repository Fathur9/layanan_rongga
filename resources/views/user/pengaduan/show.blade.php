@extends('user.layouts.user')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Detail Pengaduan</h2>

    <div class="space-y-2">
        <p><span class="font-semibold">Judul:</span> {{ $pengaduan->judul }}</p>
        <p><span class="font-semibold">Tanggal:</span> {{ $pengaduan->created_at->format('d M Y, H:i') }}</p>
        <p>
            <span class="font-semibold">Status:</span> 
            <span class="capitalize font-semibold 
                @if($pengaduan->status === 'diproses') text-yellow-600 
                @elseif($pengaduan->status === 'selesai') text-green-600 
                @else text-red-600 @endif">
                {{ $pengaduan->status }}
            </span>
        </p>
        <p class="mt-2"><span class="font-semibold">Isi Pengaduan:</span></p>
        <p class="text-gray-700">{{ $pengaduan->isi }}</p>

        @if($pengaduan->foto)
            <div class="mt-4">
                <p class="font-semibold">Foto:</p>
                <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Pengaduan" class="w-64 rounded shadow">
            </div>
        @endif
    </div>

    {{-- Tombol Aksi --}}
    <div class="mt-6 flex justify-between">
        <a href="{{ route('user.pengaduan.index') }}" class="text-sm bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
            Kembali
        </a>

        <div class="flex gap-2">
            <a href="{{ route('user.pengaduan.edit', $pengaduan->id) }}" class="text-sm bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                Edit
            </a>

            <form action="{{ route('user.pengaduan.destroy', $pengaduan->id) }}" method="POST" onsubmit="return confirm('Yakin hapus pengaduan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-sm bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

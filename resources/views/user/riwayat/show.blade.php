@extends('user.layouts.user')

@section('content')
<div class="max-w-3xl mx-auto py-8">

    {{-- Tombol Kembali --}}
    <div class="mb-6">
        <a href="{{ route('user.permohonan.riwayat') }}"
           class="inline-flex items-center text-sm text-gray-700 bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded transition">
            ← Kembali ke Riwayat Permohonan
        </a>
    </div>

    {{-- Judul --}}
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Detail Permohonan</h2>

    {{-- Box Detail --}}
    <div class="bg-white border border-gray-200 shadow-md rounded-xl p-6 space-y-6">

        <div class="flex justify-between">
            <span class="font-medium text-gray-600">Tanggal Permohonan</span>
            <span class="text-gray-800">{{ $permohonan->created_at->format('d M Y, H:i') }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-medium text-gray-600">Layanan</span>
            <span class="text-gray-800">{{ $permohonan->layanan->nama_layanan ?? '-' }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-medium text-gray-600">Status</span>
            <span class="capitalize font-semibold
                @if($permohonan->status === 'diproses') text-yellow-600
                @elseif($permohonan->status === 'selesai') text-green-600
                @else text-gray-600 @endif">
                {{ $permohonan->status }}
            </span>
        </div>

        <div>
            <span class="font-medium text-gray-600">Keterangan Tambahan</span>
            <p class="mt-2 text-gray-700 bg-gray-50 p-3 rounded">
                {{ $permohonan->catatan_admin ?? '-' }}
            </p>
        </div>

        {{-- ✅ Tampilkan link download jika selesai dan file tersedia --}}
        @if ($permohonan->status === 'selesai' && $permohonan->file_surat)
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded">
                <p class="font-semibold">✅ Surat sudah selesai. Silakan unduh surat Anda:</p>
                <a href="{{ asset('storage/surat/' . $permohonan->file_surat) }}"
                   target="_blank" class="underline text-blue-600">📄 Download Surat</a>
            </div>
        @endif

    </div>
</div>
@endsection

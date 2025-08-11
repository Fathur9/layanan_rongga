@extends('admin.layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-4">
    <div class="max-w-5xl mx-auto p-8 bg-white shadow-xl rounded-2xl border border-gray-100">
        <h2 class="text-3xl font-semibold text-blue-700 mb-8 flex items-center gap-3">
            <i class="fas fa-folder-open text-blue-600 text-2xl"></i>
            Detail Permohonan
        </h2>

        {{-- Info Umum --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 bg-gray-50 p-6 rounded-xl border border-gray-200">
            @forelse ($permohonan->data_permohonan as $key => $value)
    <div class="text-sm space-y-1">
        <div class="text-gray-600 font-semibold flex items-center gap-2">
            <i class="fas fa-tag text-gray-500"></i>
            {{ ucwords(str_replace('_', ' ', $key)) }}:
        </div>

        @if (Str::contains($value, ['.pdf', '.jpg', '.png']))
            <div class="flex items-center gap-4 mt-1 pl-6">
                <a href="{{ asset('storage/uploads/layanan/' . $value) }}" target="_blank"
                   class="inline-flex items-center text-blue-600 hover:text-blue-800 underline gap-1">
                    <i class="fas fa-eye"></i> Lihat Dokumen
                </a>
                <a href="{{ asset('storage/uploads/layanan/' . $value) }}" download
                   class="inline-flex items-center text-green-600 hover:text-green-800 underline gap-1">
                    <i class="fas fa-download"></i> Unduh
                </a>
            </div>
        @else
            <p class="text-gray-800 pl-6">{{ $value }}</p>
        @endif
    </div>
@empty
    <p class="text-gray-500 col-span-2 flex items-center gap-2">
        <i class="fas fa-info-circle text-gray-400"></i> Tidak ada data permohonan.
    </p>
@endforelse
        </div>

        {{-- Tombol Kembali --}}
        <div class="flex justify-between items-center mt-8">
            <a href="{{ route('admin.permohonan.index') }}"
               class="inline-flex items-center px-5 py-2.5 bg-red-200 text-gray-700 rounded-lg hover:bg-gray-300 transition gap-2">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>
    </div>
</div>
@endsection

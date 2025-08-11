@extends('admin.layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-4">
    <div class="max-w-4xl mx-auto p-8 bg-white shadow-xl rounded-2xl border border-gray-100">
        <h2 class="text-3xl font-bold mb-6 text-green-700 flex items-center gap-2">
            <i class="fas fa-tools text-green-600"></i> Proses Permohonan
        </h2>

        {{-- Toast Notification --}}
        @if (session('success') || $errors->any())
            <div
                id="toast-notif"
                class="fixed top-6 right-6 z-50 max-w-sm w-full bg-white shadow-lg border rounded-lg p-4 flex items-start space-x-3 transition transform duration-300 animate-slide-in"
                style="animation: slide-in 0.3s ease-out;"
            >
                <div class="text-xl">
                    @if (session('success'))
                        <i class="fas fa-check-circle text-green-500"></i>
                    @else
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                    @endif
                </div>
                <div class="text-sm text-gray-800">
                    @if (session('success'))
                        {{ session('success') }}
                    @else
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <button onclick="document.getElementById('toast-notif').remove()" class="ml-auto text-gray-500 hover:text-gray-800 text-sm">
                    &times;
                </button>
            </div>

            <style>
                @keyframes slide-in {
                    from {
                        opacity: 0;
                        transform: translateY(-20px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
            </style>

            <script>
                setTimeout(() => {
                    const toast = document.getElementById('toast-notif');
                    if (toast) {
                        toast.classList.add('opacity-0', 'transition', 'duration-500');
                        setTimeout(() => toast.remove(), 500);
                    }
                }, 4000);
            </script>
        @endif

        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 space-y-3 mb-8">
            <p class="flex items-center gap-2 text-gray-700">
                <i class="fas fa-user"></i>
                <strong>Nama Pemohon:</strong> {{ $permohonan->user->name }}
            </p>
            <p class="flex items-center gap-2 text-gray-700">
                <i class="fas fa-file-alt"></i>
                <strong>Layanan:</strong> {{ $permohonan->layanan->nama_layanan }}
            </p>
            <p class="flex items-center gap-2 text-gray-700">
                <i class="fas fa-info-circle"></i>
                <strong>Status Saat Ini:</strong>
                <span class="inline-block px-3 py-1 text-sm rounded-full
                    @if($permohonan->status == 'menunggu') bg-yellow-100 text-yellow-800 
                    @elseif($permohonan->status == 'diproses') bg-blue-100 text-blue-800
                    @elseif($permohonan->status == 'selesai') bg-green-100 text-green-800
                    @else bg-red-100 text-red-800 @endif">
                    {{ ucfirst($permohonan->status) }}
                </span>
            </p>
            <p class="flex items-center gap-2 text-gray-700">
                <i class="fas fa-clock"></i>
                <strong>Dikirim pada:</strong> {{ $permohonan->created_at->format('d M Y - H:i') }}
            </p>
        </div>

        <form action="{{ route('admin.permohonan.updateStatus', $permohonan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold mb-1 text-gray-700 flex items-center gap-2">
                    <i class="fas fa-sync-alt"></i> Ubah Status:
                </label>
                <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    @foreach (['menunggu', 'diproses', 'selesai', 'ditolak'] as $status)
                        <option value="{{ $status }}" {{ $permohonan->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1 text-gray-700 flex items-center gap-2">
                    <i class="fas fa-comment-alt"></i> Catatan Admin:
                </label>
                <textarea name="catatan_admin" rows="3"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('catatan_admin', $permohonan->catatan_admin) }}</textarea>

                @error('catatan_admin')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1 text-gray-700 flex items-center gap-2">
                    <i class="fas fa-paperclip"></i> Upload Surat (PDF):
                </label>
                <input type="file" name="file_surat" accept="application/pdf"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">

                @if ($permohonan->file_surat)
                    <p class="mt-3 text-sm text-green-700">
                        Sudah diunggah:
                        <a href="{{ asset('storage/surat/' . $permohonan->file_surat) }}" target="_blank" class="text-green-600 underline">Lihat Surat</a>
                    </p>
                @endif
            </div>

            <div class="flex items-center gap-4 pt-4 border-t mt-8">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition-all duration-200">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>

                <a href="{{ route('admin.permohonan.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

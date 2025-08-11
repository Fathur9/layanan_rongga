@extends('user.layouts.user')

@section('content')
<div class="max-w-5xl mx-auto py-8 space-y-6">

    {{-- Judul --}}
    <h2 class="text-2xl font-bold text-gray-800">Pengaduan Warga</h2>

    {{-- ✅ Alert Sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded shadow">
            <strong>Sukses:</strong> {{ session('success') }}
        </div>
    @endif

    {{-- ✅ Alert Error Global --}}
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow">
            <strong>Terjadi kesalahan:</strong>
            <ul class="list-disc pl-5 mt-2 space-y-1 text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Pengaduan --}}
    <div class="bg-white p-6 rounded-lg shadow space-y-4">
        <h3 class="text-lg font-semibold text-gray-700">Buat Pengaduan Baru</h3>
        <form action="{{ route('user.pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            {{-- Judul --}}
            <div>
                <label class="block font-medium">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                       class="w-full border rounded px-3 py-2 @error('judul') border-red-500 @enderror">
                @error('judul')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Isi Pengaduan --}}
            <div>
                <label class="block font-medium">Isi Pengaduan</label>
                <textarea name="isi" rows="4"
                          class="w-full border rounded px-3 py-2 @error('isi') border-red-500 @enderror">{{ old('isi') }}</textarea>
                @error('isi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Foto Opsional --}}
            <div>
                <label class="block font-medium">Foto (Opsional)</label>
                <input type="file" name="foto"
                       class="w-full border rounded px-3 py-2 @error('foto') border-red-500 @enderror">
                @error('foto')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition duration-200">
                Kirim Pengaduan
            </button>
        </form>
    </div>

    {{-- Riwayat Pengaduan --}}
    <div class="space-y-4 mt-6">
        <h3 class="text-xl font-semibold text-gray-700">Riwayat Pengaduan Saya</h3>

        @if($pengaduan->isEmpty())
            <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
                Belum ada pengaduan yang dikirim.
            </div>
        @else
            @foreach($pengaduan as $item)
                <div class="border p-4 rounded-lg flex items-center justify-between shadow hover:shadow-md transition">
                    <div class="flex flex-col">
                        <h4 class="font-semibold text-lg text-gray-800">{{ $item->judul }}</h4>
                        <p class="text-sm text-gray-500">Dikirim: {{ $item->created_at->format('d M Y, H:i') }}</p>
                        <p class="text-sm mt-1">Status:
                            <span class="capitalize font-semibold
                                @if($item->status === 'diproses') text-yellow-600
                                @elseif($item->status === 'selesai') text-green-600
                                @else text-red-600 @endif">
                                {{ $item->status }}
                            </span>
                        </p>
                    </div>
                    <div class="flex items-center gap-4">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="foto"
                                 class="w-20 h-20 object-cover rounded-md shadow">
                        @endif
                        <a href="{{ route('user.pengaduan.show', $item->id) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm rounded">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection

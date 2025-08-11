@extends('user.layouts.user')

@section('title', 'Pelayanan Perbaikan KTP')

@section('content')
<div class="p-6 bg-slate-900 text-white shadow-xl rounded-xl max-w-2xl w-full mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-2">Pelayanan Perbaikan KTP</h2>
    <p class="text-sm text-slate-400 mb-4">
        Silakan isi form berikut. Untuk perubahan biometrik (foto/sidik jari), Anda harus datang ke Dukcapil.
    </p>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="bg-green-600 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Validasi --}}
    @if ($errors->any())
        <div class="bg-red-600 text-white p-3 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.ktp.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="nama_lengkap" class="block mb-1">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" required
                   value="{{ old('nama_lengkap') }}"
                   class="w-full p-2 rounded bg-slate-800 border border-slate-700" />
        </div>

        <div>
            <label for="nik" class="block mb-1">NIK</label>
            <input type="text" name="nik" id="nik" required
                   value="{{ old('nik') }}"
                   class="w-full p-2 rounded bg-slate-800 border border-slate-700" />
        </div>

        <div>
            <label for="alamat" class="block mb-1">Alamat</label>
            <input type="text" name="alamat" id="alamat" required
                   value="{{ old('alamat') }}"
                   class="w-full p-2 rounded bg-slate-800 border border-slate-700" />
        </div>

        <div>
            <label for="nomor_hp" class="block mb-1">Nomor HP</label>
            <input type="text" name="nomor_hp" id="nomor_hp" required
                   value="{{ old('nomor_hp') }}"
                   class="w-full p-2 rounded bg-slate-800 border border-slate-700" />
        </div>

        <div>
            <label for="jenis_perbaikan" class="block mb-1">Jenis Perbaikan</label>
            <select name="jenis_perbaikan" id="jenis_perbaikan" required
                    class="w-full p-2 rounded bg-slate-800 border border-slate-700">
                <option value="">-- Pilih Jenis Perbaikan --</option>
                <option value="Nama" {{ old('jenis_perbaikan') == 'Nama' ? 'selected' : '' }}>Perubahan Nama</option>
                <option value="Tempat/Tanggal Lahir" {{ old('jenis_perbaikan') == 'Tempat/Tanggal Lahir' ? 'selected' : '' }}>Perubahan Tempat/Tanggal Lahir</option>
                <option value="Alamat" {{ old('jenis_perbaikan') == 'Alamat' ? 'selected' : '' }}>Perubahan Alamat</option>
                <option value="Jenis Kelamin" {{ old('jenis_perbaikan') == 'Jenis Kelamin' ? 'selected' : '' }}>Perubahan Jenis Kelamin</option>
                <option value="Foto / Sidik Jari" {{ old('jenis_perbaikan') == 'Foto / Sidik Jari' ? 'selected' : '' }}>Perbaikan Foto atau Sidik Jari</option>
                <option value="KTP Rusak" {{ old('jenis_perbaikan') == 'KTP Rusak' ? 'selected' : '' }}>KTP Rusak</option>
            </select>
        </div>

        <div>
            <label for="keterangan_perbaikan" class="block mb-1">Keterangan Perubahan</label>
            <textarea name="keterangan_perbaikan" id="keterangan_perbaikan" rows="3" required
                      class="w-full p-2 rounded bg-slate-800 border border-slate-700"
                      placeholder="Contoh: Nama dari 'Andi' menjadi 'Andi Saputra'">{{ old('keterangan_perbaikan') }}</textarea>
        </div>

        <div>
            <label for="upload_dokumen_pendukung" class="block mb-1">Upload Dokumen Pendukung</label>
            <input type="file" name="upload_dokumen_pendukung" id="upload_dokumen_pendukung" required
                   class="w-full p-2 rounded bg-slate-800 border border-slate-700" />
        </div>

        <div>
            <label for="upload_ktp_lama" class="block mb-1">Upload KTP Lama (jika ada)</label>
            <input type="file" name="upload_ktp_lama" id="upload_ktp_lama"
                   class="w-full p-2 rounded bg-slate-800 border border-slate-700" />
        </div>

        <div class="text-sm text-slate-300 bg-slate-800 p-3 rounded">
            <strong>Persyaratan:</strong>
            <ul class="list-disc ml-5 space-y-1">
                <li>Fotokopi KK</li>
                <li>Dokumen pendukung (akta, surat keterangan)</li>
                <li>KTP lama (jika masih ada)</li>
                <li>Foto 3x4 terbaru (latar biru/merah sesuai tahun)</li>
            </ul>
        </div>

        <div class="text-yellow-400 text-sm bg-yellow-900 p-3 rounded">
            <strong>Catatan:</strong> Untuk <u>Foto/Sidik Jari</u>, wajib datang langsung ke kantor Dukcapil.
        </div>

        <div class="flex items-center gap-3 mt-4">
            <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">
                Kirim Pengajuan
            </button>
            <a href="{{ route('user.dashboard') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                ← Kembali
            </a>
        </div>
    </form>
</div>
@endsection

@extends('user.layouts.user')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6 bg-white rounded-2xl shadow-lg">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-4">📄 Permohonan Layanan</h2>

    {{-- ✅ Alert Success --}}
    @if (session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            <strong>Sukses:</strong> {{ session('success') }}
        </div>
    @endif

    {{-- ✅ Alert Global Error --}}
    @if ($errors->any())
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <strong>Terjadi kesalahan:</strong>
            <ul class="list-disc pl-5 mt-2 space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Dropdown Pilih Layanan --}}
    <div class="mb-8">
        <label for="layananSelect" class="block text-sm font-semibold text-gray-700 mb-2">
            Pilih Jenis Layanan
        </label>
        <select id="layananSelect"
            class="w-full border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-lg p-3 shadow-sm">
            <option value="">-- Pilih Layanan --</option>
            @foreach ($layanans as $item)
                <option value="{{ route('user.form.create', $item->slug) }}"
                    {{ isset($layanan) && $layanan->slug == $item->slug ? 'selected' : '' }}>
                    {{ $item->nama_layanan }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Form Dinamis --}}
    @if(isset($layanan))
        <form method="POST" action="{{ route('user.form.store', $layanan->slug) }}"
              enctype="multipart/form-data"
              class="space-y-6 bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-inner">
            @csrf

            <h3 class="text-xl font-semibold text-gray-700 mb-4">
                Formulir: {{ $layanan->nama_layanan }}
            </h3>

            {{-- Catatan Khusus untuk Perbaikan KTP --}}
            @if(strtolower($layanan->slug) === 'perbaikan-ktp')
                <div class="p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 rounded">
                    ⚠️ <strong>Catatan:</strong> Layanan ini khusus untuk perbaikan data KTP seperti kesalahan penulisan nama, tempat/tanggal lahir, alamat, dan sebagainya.<br>
                    Jika Anda belum pernah melakukan perekaman KTP elektronik sebelumnya, silakan datang langsung ke kantor kecamatan untuk melakukan perekaman.
                </div>
            @endif

            {{-- Loop Input Dinamis --}}
            @foreach ($persyaratan as $item)
                @php
                    $field = $item['name'];
                    $label = $item['label'];
                    $tipe  = $item['tipe'];
                    $id    = \Illuminate\Support\Str::slug($field, '_');
                    $keterangan = $item['keterangan'] ?? null;
                @endphp

                <div>
                    <label for="{{ $id }}" class="block font-medium text-sm text-gray-700 mb-1">
                        {{ $label }}
                    </label>

                    @if($keterangan)
                        <p class="text-xs text-gray-500 mb-1">{{ $keterangan }}</p>
                    @endif

                    @if($tipe === 'text')
                        <input type="text" name="{{ $field }}" id="{{ $id }}"
                               value="{{ old($field) }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error($field) border-red-500 @enderror">
                    @elseif($tipe === 'file')
                        <input type="file" name="{{ $field }}" id="{{ $id }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error($field) border-red-500 @enderror">
                    @endif

                    @error($field)
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach

            <div class="pt-4 text-right">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-6 py-2 rounded-lg transition duration-200">
                    Kirim Permohonan
                </button>
            </div>
        </form>
    @endif
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('layananSelect').addEventListener('change', function () {
        const selectedUrl = this.value;
        if (selectedUrl) {
            window.location.href = selectedUrl;
        }
    });
</script>
@endpush

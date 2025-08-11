@extends('user.layouts.user')

@section('content')
<div class="max-w-5xl mx-auto py-8 space-y-6">
    <h2 class="text-2xl font-bold text-gray-800">Ajukan Permohonan Layanan</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded shadow">
            <strong>Terjadi kesalahan:</strong>
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('user.permohonan.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow space-y-4">
        @csrf

        <div>
            <label for="layanan_id" class="block font-medium">Pilih Layanan</label>
            <select name="layanan_id" id="layanan_id" class="w-full border rounded px-3 py-2 @error('layanan_id') border-red-500 @enderror" required>
                <option value="">-- Pilih Layanan --</option>
                @foreach($layanan as $l)
                    <option value="{{ $l->id }}" {{ old('layanan_id') == $l->id ? 'selected' : '' }}>
                        {{ $l->nama_layanan }}
                    </option>
                @endforeach
            </select>
            @error('layanan_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div id="jenis_surat_wrapper" style="display: none;">
            <label for="jenis_surat_id" class="block font-medium">Pilih Jenis Surat</label>
            <select name="jenis_surat_id" id="jenis_surat_id" class="w-full border rounded px-3 py-2 @error('jenis_surat_id') border-red-500 @enderror">
                <option value="">-- Pilih Jenis Surat --</option>
                @foreach($jenisSurat as $js)
                    <option value="{{ $js->id }}" {{ old('jenis_surat_id') == $js->id ? 'selected' : '' }}>
                        {{ $js->nama_surat }}
                    </option>
                @endforeach
            </select>
            @error('jenis_surat_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div id="form-persyaratan">
            {{-- Diisi melalui JavaScript --}}
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Ajukan
        </button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#layanan_id').change(function () {
        let layananId = $(this).val();
        let namaLayanan = $('#layanan_id option:selected').text();

        if (layananId && namaLayanan.toLowerCase().includes('administrasi surat')) {
            $('#jenis_surat_wrapper').show();
        } else {
            $('#jenis_surat_wrapper').hide();
            $('#jenis_surat_id').val('');
            generateFormPersyaratan([]);
        }
    });

    $('#jenis_surat_id').change(function () {
        let jenisSuratId = $(this).val();
        if (jenisSuratId) {
            $.post("{{ route('user.permohonan.persyaratan') }}", {
                _token: "{{ csrf_token() }}",
                jenis_surat_id: jenisSuratId
            }, function (data) {
                generateFormPersyaratan(data);
            });
        } else {
            generateFormPersyaratan([]);
        }
    });

    function generateFormPersyaratan(persyaratan) {
    let html = '';

    if (persyaratan.length === 0) {
        html += `
            <div>
                <label class="block font-medium">Nama Lengkap</label>
                <input type="text" name="data[nama]" value="{{ old('data.nama') }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-medium">NIK</label>
                <input type="text" name="data[nik]" value="{{ old('data.nik') }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-medium">Alamat</label>
                <input type="text" name="data[alamat]" value="{{ old('data.alamat') }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-medium">Nomor HP</label>
                <input type="text" name="data[no_hp]" value="{{ old('data.no_hp') }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-medium">Upload KTP</label>
                <input type="file" name="dokumen[ktp]" class="w-full">
            </div>
        `;
    } else {
        persyaratan.forEach((item) => {
            const key = item.toLowerCase().replace(/\s+/g, '_');
            if (item.toLowerCase().includes('upload') || item.toLowerCase().includes('fotocopy') || item.toLowerCase().includes('surat')) {
                html += `
                    <div>
                        <label class="block font-medium">${item}</label>
                        <input type="file" name="dokumen[${key}]" class="w-full">
                    </div>
                `;
            } else {
                html += `
                    <div>
                        <label class="block font-medium">${item}</label>
                        <input type="text" name="data[${key}]" value="{{ old('data.${key}') }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                `;
            }
        });
    }

    $('#form-persyaratan').html(html);
}

    @if(old('layanan_id'))
        $('#layanan_id').trigger('change');
    @endif
</script>
@endsection

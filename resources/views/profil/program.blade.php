@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-gray-900 shadow-md rounded-lg mt-6">
    <h1 class="text-3xl font-bold text-green-400 mb-8 text-center">Program dan Kegiatan Kecamatan</h1>
    <p class="text-gray-300 leading-relaxed mb-10 text-center">
        Pemerintah Kecamatan Tanjung Pasir telah merancang berbagai program dan kegiatan untuk meningkatkan kesejahteraan masyarakat, antara lain:
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Program Pembangunan Infrastruktur -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-4">Program Pembangunan Infrastruktur</h2>
            <p class="text-gray-300 leading-relaxed">
                Pembangunan jalan desa, jembatan, dan saluran irigasi yang bertujuan memperlancar akses transportasi dan mendukung kegiatan pertanian warga.
            </p>
        </div>

        <!-- Program Kesehatan -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-4">Program Kesehatan</h2>
            <p class="text-gray-300 leading-relaxed">
                Pelayanan posyandu untuk ibu dan anak, penyuluhan kesehatan berkala, serta pemberian bantuan gizi untuk meningkatkan kualitas hidup masyarakat.
            </p>
        </div>

        <!-- Program Pendidikan -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-4">Program Pendidikan</h2>
            <p class="text-gray-300 leading-relaxed">
                Menyediakan beasiswa bagi siswa berprestasi serta pelatihan keterampilan guna meningkatkan kapasitas pemuda desa menghadapi tantangan masa depan.
            </p>
        </div>

        <!-- Program Ekonomi -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-4">Program Ekonomi</h2>
            <p class="text-gray-300 leading-relaxed">
                Pengembangan usaha mikro, kecil, dan menengah (UMKM) melalui pelatihan kewirausahaan serta bantuan modal agar perekonomian desa lebih mandiri.
            </p>
        </div>

        <!-- Program Lingkungan -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-4">Program Lingkungan</h2>
            <p class="text-gray-300 leading-relaxed">
                Kegiatan penanaman pohon, pengelolaan sampah yang ramah lingkungan, dan pelestarian sumber daya alam agar desa tetap asri dan berkelanjutan.
            </p>
        </div>

        <!-- Program Partisipasi Masyarakat -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-4">Partisipasi Masyarakat</h2>
            <p class="text-gray-300 leading-relaxed">
                Melibatkan aktif masyarakat dalam setiap tahapan pelaksanaan program agar tercipta rasa memiliki dan keberhasilan pembangunan desa secara menyeluruh.
            </p>
        </div>
    </div>

    <p class="text-gray-300 leading-relaxed mt-10 text-center">
        Semua program tersebut dilaksanakan dengan melibatkan partisipasi aktif masyarakat untuk mencapai tujuan pembangunan desa yang berkelanjutan.
    </p>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-gray-900 shadow-md rounded-lg mt-6">
    <h1 class="text-3xl font-bold text-green-400 mb-8 text-center">Tugas Pokok dan Fungsi Perangkat Kecamatan Rongga</h1>
    <p class="text-gray-300 leading-relaxed mb-8 text-center">
        Berikut adalah tugas pokok dan fungsi dari masing-masing perangkat Kecamatan Rongga yang berperan dalam penyelenggaraan pemerintahan, pembangunan, dan pelayanan publik.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Camat -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-3">Camat - Ilman Suherlan, S.Sos., M.Si</h2>
            <p class="text-gray-300 leading-relaxed">
                Memimpin dan mengoordinasikan seluruh penyelenggaraan pemerintahan, pembangunan, dan kemasyarakatan di tingkat kecamatan. Camat juga bertugas menjalankan kebijakan pemerintah daerah serta memastikan pelayanan publik berjalan dengan baik.
            </p>
        </div>

        <!-- Sekretaris -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-3">Sekretaris Kecamatan - Badrul Muin, S.Pd., Kp</h2>
            <p class="text-gray-300 leading-relaxed">
                Mengelola administrasi dan kesekretariatan, menyusun program kerja, mengelola surat menyurat, arsip, serta membina kedisiplinan dan tata usaha pegawai kecamatan.
            </p>
        </div>

        <!-- Keuangan dan Program -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-3">Kepala Sub. Bagian Keuangan & Program - Asep, S.Sos</h2>
            <p class="text-gray-300 leading-relaxed">
                Menyusun dan mengelola anggaran, menyusun rencana kegiatan tahunan kecamatan, serta melakukan evaluasi dan pelaporan pelaksanaan program.
            </p>
        </div>

        <!-- Kepegawaian & Umum -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-3">Kepala Sub. Bagian Kepegawaian & Umum - Hendra, S.Sos</h2>
            <p class="text-gray-300 leading-relaxed">
                Mengelola administrasi kepegawaian, presensi, cuti, serta dokumentasi dan perlengkapan kantor kecamatan.
            </p>
        </div>

        <!-- Seksi Pemerintahan & Pelayanan -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-3">Kepala Seksi Tata Pemerintahan & Pelayanan - Saepul Muhtadin, S.Sos</h2>
            <p class="text-gray-300 leading-relaxed">
                Menangani urusan pemerintahan umum, pelayanan administrasi kependudukan, pengawasan desa, serta pemetaan wilayah.
            </p>
        </div>

        <!-- Seksi PMD -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-3">Kepala Seksi Pemberdayaan Masyarakat & Desa - Dindin Saepuloh, S.Sos</h2>
            <p class="text-gray-300 leading-relaxed">
                Membina desa dan masyarakat, mendampingi pelaksanaan pembangunan desa, serta meningkatkan kapasitas dan kemandirian masyarakat.
            </p>
        </div>

        <!-- Ketentraman & Ketertiban -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-3">Kepala Seksi Ketentraman & Ketertiban - Lili Saripudin, S.Sos</h2>
            <p class="text-gray-300 leading-relaxed">
                Mengoordinasikan dan menjaga keamanan serta ketertiban wilayah kecamatan, bekerja sama dengan aparat dan lembaga terkait, serta membina Linmas.
            </p>
        </div>

        <!-- Seksi Binwa -->
        <div class="border border-green-600 rounded-lg p-5 shadow hover:shadow-lg transition bg-gray-800">
            <h2 class="text-xl font-semibold text-green-400 mb-3">Kepala Seksi Binwa - Adis Sukmana, S.Sos., M.IP</h2>
            <p class="text-gray-300 leading-relaxed">
                Membina kehidupan berkeluarga dan menumbuhkan wawasan kebangsaan, serta mengedukasi masyarakat tentang nilai-nilai ideologi Pancasila dan bela negara.
            </p>
        </div>

    </div>
</div>
@endsection

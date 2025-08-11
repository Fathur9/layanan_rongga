@extends('layouts.app')

@section('content')
<div class="bg-gray-900 py-10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-green-400 mb-10">Struktur Organisasi Kecamatan Rongga</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Camat -->
            <div class="bg-green-800 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                <div class="text-gray-400 mb-2 text-sm font-medium tracking-wide">Camat Rongga</div>
                <h3 class="text-xl font-semibold text-white">Ilman Suherlan,S.Sos.,M.S.I</h3>
                <p class="text-white-300 text-sm mt-1">Nip.19720809 199303 1 004</p>
            </div>

            <!-- Sekretaris Kecamatan -->
            <div class="bg-green-800 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                <div class="text-gray-400 mb-2 text-sm font-medium tracking-wide">Sekretaris Kecamatan</div>
                <h3 class="text-xl font-semibold text-white">Badrul Muin, S.Pd.,Kp</h3>
                <p class="text-white-300 text-sm mt-1">Nip.19700101 199111 1 003</p>
            </div>

            <!-- Kasi Pemerintahan -->
            <div class="bg-green-800 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                <div class="text-gray-400 mb-2 text-sm font-medium tracking-wide">Kepala sub. bagian keu & Prog</div>
                <h3 class="text-xl font-semibold text-white">Asep, S.Sos</h3>
                <p class="text-white-300 text-sm mt-1">Nip.19680402 200701 1 047</p>
            </div>

            <!-- Kasi Pelayanan -->
            <div class="bg-green-800 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                <div class="text-gray-400 mb-2 text-sm font-medium tracking-wide">Kepala sub. bagian kepegawaian & umum</div>
                <h3 class="text-xl font-semibold text-white">Hendra, S.Sos</h3>
                <p class="text-white-300 text-sm mt-1">Nip.19741103 201412 1 002</p>
            </div>

            <!-- Kasubbag Umum & Kepegawaian -->
            <div class="bg-green-800 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                <div class="text-gray-400 mb-2 text-sm font-medium tracking-wide">Kepala seksi tata pem & yanlik</div>
                <h3 class="text-xl font-semibold text-white">Saepul Muhtadin, S.Sos</h3>
                <p class="text-green-300 text-sm mt-1">Nip.19740203 200701 1 010</p>
            </div>

            <!-- Staf Pelaksana 1 -->
            <div class="bg-green-800 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                <div class="text-gray-400 mb-2 text-sm font-medium tracking-wide">Kepala seksi PMD</div>
                <h3 class="text-xl font-semibold text-white">Dindin Saepuloh, S.Sos</h3>
                <p class="text-white-300 text-sm mt-1">Nip.19800220 201001 1 007</p>
            </div>

            <!-- Staf Pelaksana 2 -->
            <div class="bg-green-800 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                <div class="text-gray-400 mb-2 text-sm font-medium tracking-wide">Kepala Seksi Ketenrtaman & ketertiban</div>
                <h3 class="text-xl font-semibold text-white">Lili Saripudin, S.Sos</h3>
                <p class="text-white-300 text-sm mt-1">Nip.19730710 200906 1 001</p>
            </div>

            <!-- Staf Pelaksana 2 -->
            <div class="bg-green-800 rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                <div class="text-gray-400 mb-2 text-sm font-medium tracking-wide">Kepala Seksi Binwa</div>
                <h3 class="text-xl font-semibold text-white">Adis Sukmana, S.Sos, M.I.P</h3>
                <p class="text-white-300 text-sm mt-1">Nip.19730710 200906 1 002</p>
            </div>
        </div>
    </div>
</div>
@endsection

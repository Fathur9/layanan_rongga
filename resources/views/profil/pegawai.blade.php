@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-gray-900 shadow-md rounded-lg mt-6">
    <h1 class="text-3xl font-bold text-green-400 mb-6 text-center">Daftar Pegawai Kecamatan</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700 border border-gray-700 shadow-sm">
            <thead class="bg-green-700 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">NIP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Jabatan</th>
                </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-700 text-gray-200">
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4">Ilman Suherlan,S.Sos.,M.S.I</td>
                    <td class="px-6 py-4">19720809 199303 1 004</td>
                    <td class="px-6 py-4">Kepala Kecamatan</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">2</td>
                    <td class="px-6 py-4">Badrul Muin, S.Pd.,Kp</td>
                    <td class="px-6 py-4">19700101 199111 1 003</td>
                    <td class="px-6 py-4">Sek. Kecamatan</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">3</td>
                    <td class="px-6 py-4">Saepul Muhtadin, S.Sos</td>
                    <td class="px-6 py-4">19740203 200701  1 010</td>
                    <td class="px-6 py-4">Kasi Pem & Yanlink</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">4</td>
                    <td class="px-6 py-4">Dindin Saepuloh, S.Sos</td>
                    <td class="px-6 py-4">19800220 201001 1 007</td>
                    <td class="px-6 py-4">Kasi PMD</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">5</td>
                    <td class="px-6 py-4">Lili Saripudin, S.Sos</td>
                    <td class="px-6 py-4">19730710 200906 1 001</td>
                    <td class="px-6 py-4">Kasi Pemerintahan</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">6</td>
                    <td class="px-6 py-4">Adis Sukmana, S.Sos, M.I.P</td>
                    <td class="px-6 py-4">19730710 200906 1 002</td>
                    <td class="px-6 py-4">Kasi BINWAS</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">7</td>
                    <td class="px-6 py-4">Hendra, S.Sos</td>
                    <td class="px-6 py-4">19741103 201412 1 002</td>
                    <td class="px-6 py-4">Kasub KEPEG</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">8</td>
                    <td class="px-6 py-4">Asep, S.Sos</td>
                    <td class="px-6 py-4">19680402 200701 1 047</td>
                    <td class="px-6 py-4">Kasub.Prog & Keu</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">9</td>
                    <td class="px-6 py-4">Mahmudin, S.IP</td>
                    <td class="px-6 py-4">19950922 202012 1 005</td>
                    <td class="px-6 py-4">Bendahara Keu</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">10</td>
                    <td class="px-6 py-4">Iis</td>
                    <td class="px-6 py-4">-</td>
                    <td class="px-6 py-4">Pelaksana</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">11</td>
                    <td class="px-6 py-4">Hardian Sidik</td>
                    <td class="px-6 py-4">-</td>
                    <td class="px-6 py-4">Pelaksana</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">12</td>
                    <td class="px-6 py-4">Asep Ridwan Fasya, S.Pd</td>
                    <td class="px-6 py-4">-</td>
                    <td class="px-6 py-4">Pelaksana</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">13</td>
                    <td class="px-6 py-4">Mahmudin, S.IP</td>
                    <td class="px-6 py-4">-</td>
                    <td class="px-6 py-4">Pelaksana</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">14</td>
                    <td class="px-6 py-4">Nova Saputra</td>
                    <td class="px-6 py-4">-</td>
                    <td class="px-6 py-4">Pelaksana</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">15</td>
                    <td class="px-6 py-4">Muhtadil Hadi, S.Hut</td>
                    <td class="px-6 py-4">-</td>
                    <td class="px-6 py-4">Pelaksana</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">16</td>
                    <td class="px-6 py-4">Sypa Hiriyanti, S.Sos</td>
                    <td class="px-6 py-4">-</td>
                    <td class="px-6 py-4">Pelaksana</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">17</td>
                    <td class="px-6 py-4">Neng Lala, S.Sos</td>
                    <td class="px-6 py-4">-</td>
                    <td class="px-6 py-4">Pelaksana</td>
                </tr>
                <tr class="hover:bg-gray-700 transition">
                    <td class="px-6 py-4">18</td>
                    <td class="px-6 py-4">Ahmad Fauzi</td>
                    <td class="px-6 py-4">-</td>
                    <td class="px-6 py-4">Pelaksana</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

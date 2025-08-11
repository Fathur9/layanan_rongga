@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-gray-900 shadow-md rounded-lg mt-6">
    <h1 class="text-3xl font-bold text-green-400 mb-6 text-center">Data Penduduk Kecamatan Rongga</h1>

    <p class="text-gray-300 mb-4 text-sm text-center">
        Sumber Data: Semester I DKB Tahun 2021 - Disdukcapil Kab. Bandung Barat
    </p>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700 border border-gray-700 shadow-sm">
            <thead class="bg-green-700 text-white text-sm">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Desa</th>
                    <th class="px-4 py-2 text-left">Laki-laki</th>
                    <th class="px-2 py-2 text-left">%</th>
                    <th class="px-4 py-2 text-left">Perempuan</th>
                    <th class="px-2 py-2 text-left">%</th>
                    <th class="px-4 py-2 text-left">Jumlah</th>
                    <th class="px-2 py-2 text-left">%</th>
                </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-700 text-gray-200">
                @php
                    $data = [
                        ['CIBEDUG', 3424, '0.4%', 3312, '0.4%', 6736, '0.4%'],
                        ['BOJONG', 4087, '0.5%', 3933, '0.5%', 8020, '0.5%'],
                        ['BOJONGSALAM', 2672, '0.3%', 2512, '0.3%', 5184, '0.3%'],
                        ['CIBITUNG', 4951, '0.6%', 4505, '0.5%', 9456, '0.5%'],
                        ['CICADAS', 2604, '0.3%', 2395, '0.3%', 4999, '0.3%'],
                        ['CINENGAH', 3385, '0.4%', 3189, '0.4%', 6574, '0.4%'],
                        ['SUKAMANAH', 4248, '0.5%', 3903, '0.5%', 8151, '0.5%'],
                        ['SUKARESMI', 4214, '0.5%', 3991, '0.5%', 8205, '0.5%'],
                    ];
                @endphp

                @foreach ($data as $index => $row)
                    <tr class="hover:bg-gray-700 transition">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $row[0] }}</td>
                        <td class="px-4 py-2">{{ number_format($row[1]) }}</td>
                        <td class="px-2 py-2">{{ $row[2] }}</td>
                        <td class="px-4 py-2">{{ number_format($row[3]) }}</td>
                        <td class="px-2 py-2">{{ $row[4] }}</td>
                        <td class="px-4 py-2 font-semibold">{{ number_format($row[5]) }}</td>
                        <td class="px-2 py-2">{{ $row[6] }}</td>
                    </tr>
                @endforeach

                <tr class="bg-green-800 font-bold text-white">
                    <td class="px-4 py-2 text-center" colspan="2">JML KEC. RONGGA</td>
                    <td class="px-4 py-2">29,585</td>
                    <td class="px-2 py-2">3.4%</td>
                    <td class="px-4 py-2">27,740</td>
                    <td class="px-2 py-2">3.3%</td>
                    <td class="px-4 py-2">57,325</td>
                    <td class="px-2 py-2">3.3%</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #000;
            margin: 40px;
        }
        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
        }
        .kop-surat img {
            width: 80px;
            position: absolute;
            left: 40px;
            top: 40px;
        }
        hr {
            border: 1px solid #000;
            margin: 16px 0;
        }
        .judul {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
            font-size: 13px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
        .ttd {
            width: 100%;
            text-align: right;
            margin-top: 60px;
        }
        .ttd p {
            margin-bottom: 60px;
        }
        @media print {
            @page {
                margin: 20mm;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="kop-surat">
        <img src="{{ asset ('img/desa-bg.png') }}" alt="Logo">
        <h1>PEMERINTAH KABUPATEN BANDUNG BARAT</h1>
        <h2>KECAMATAN RONGGA</h2>
        <p>Jl. Lebaksaat, Cibedug, Rongga, Bojongsalam, Kec. Rongga, Kabupaten Bandung Barat, Jawa Barat</p>
        <p>Telp. (082)121360099 – Email: kecamatan.rongga@gmail.com</p>
        <hr>
    </div>

    <div class="judul">
        <h2>LAPORAN PERMOHONAN LAYANAN</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Layanan</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($permohonans as $index => $p)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $p->user->name ?? '-' }}</td>
                <td>{{ $p->layanan->nama_layanan ?? '-' }}</td>
                <td>{{ ucfirst($p->status) }}</td>
                <td>{{ $p->created_at->format('d M Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; font-style: italic;">Tidak ada data permohonan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>

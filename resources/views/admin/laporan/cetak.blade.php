<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            margin: 30px;
            color: #000;
        }

        .kop-surat {
            margin-bottom: 10px;
        }

        .header-flex {
            display: flex;
            align-items: center;
        }

        .header-flex img {
            width: 90px;
            margin-right: 20px;
        }

        .judul-header {
            flex: 1;
            text-align: center;
        }

        .judul-header h1,
        .judul-header h2,
        .judul-header p {
            margin: 0;
            padding: 0;
        }

        hr {
            border: 1px solid #000;
            margin-top: 8px;
            margin-bottom: 20px;
        }

        .judul {
            text-align: center;
            margin-bottom: 20px;
        }

        .judul h2 {
            margin: 0;
            font-size: 16pt;
        }

        .judul p {
            margin: 4px 0 0;
            font-size: 11pt;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 8px;
            text-align: left;
            font-size: 11pt;
        }

        .ttd {
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }

        .ttd .content {
            text-align: right;
            font-size: 11pt;
        }

        .ttd .content p {
            margin: 4px 0;
        }

        @media print {
            body {
                margin: 10mm;
            }

            .header-flex img {
                width: 90px !important;
                margin-right: 20px !important;
            }

            .judul-header {
                text-align: center !important;
            }

            .ttd {
                justify-content: flex-end !important;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="kop-surat">
        <div class="header-flex">
            <img src="{{ asset('img/desa-bg.png') }}" alt="Logo">
            <div class="judul-header">
                <h1>PEMERINTAH KABUPATEN BANDUNG BARAT</h1>
                <h2>KECAMATAN RONGGA</h2>
                <p>Jl. Lebaksaat, Cibedug, Rongga, Bojongsalam, Kec. Rongga, Kabupaten Bandung Barat, Jawa Barat</p>
                <p>Telp. (082)121360099 – Email: kecamatan.rongga@gmail.com</p>
            </div>
        </div>
        <hr>
    </div>

    <div class="judul">
        <h2>LAPORAN PERMOHONAN LAYANAN</h2>
        <p>Tanggal: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
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

    <div class="ttd">
        <div class="content">
            <p>Bandung Barat, {{ \Carbon\Carbon::parse('2025-07-22')->translatedFormat('d F Y') }}</p>
            <p>Camat Rongga,</p>
            <br><br>
            <p><strong>ILMAN SUHERLAN, S.Sos., M.Si</strong></p>
            <p>NIP. 19720101 199803 1 002</p>
        </div>
    </div>

</body>
</html>

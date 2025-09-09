<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat Denda</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Times New Roman', serif;
            padding: 20px;
            background: #fff;
        }

        .surat-denda {
            border: 1px solid #000;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            margin-bottom: 15px;
        }

        table td {
            padding: 6px;
            vertical-align: top;
        }

        hr {
            border-top: 1px solid #000;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .surat-denda {
                margin: 0;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <div class="surat-denda">
        <h5 class="text-center fw-bold">PERPUSTAKAAN SMPN 1 KUBUNG</h5>
        <p class="text-center fw-bold">SURAT DENDA</p>
        <hr>

        <p>Dengan ini kami memberitahukan bahwa siswa berikut:</p>

        <table>
            <tr>
                <td style="width:150px;">Nama Siswa</td>
                <td>: {{ $item->nama_anggota }}</td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td>: {{ $item->buku }}</td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td>: {{ \Carbon\Carbon::parse($item->tangal_pinjam)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Jatuh Tempo</td>
                <td>: {{ \Carbon\Carbon::parse($item->tangal_jatuhtempo)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Tanggal Dikembalikan</td>
                <td>: {{ \Carbon\Carbon::parse($item->tangal_dikembalikan)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Telat</td>
                <td>:
                    {{ \Carbon\Carbon::parse($item->tangal_dikembalikan)->diffInDays(\Carbon\Carbon::parse($item->tangal_jatuhtempo)) }}
                    hari</td>
            </tr>
            <tr>
                <td>Denda</td>
                <td>: Rp
                    {{ number_format(\Carbon\Carbon::parse($item->tangal_dikembalikan)->diffInDays(\Carbon\Carbon::parse($item->tangal_jatuhtempo)) * 2000, 0, ',', '.') }}
                </td>
            </tr>
        </table>

        <p>Diharapkan siswa segera melakukan pembayaran denda sesuai ketentuan kepada petugas perpustakaan.</p>

        <br><br>
        <div style="text-align:right;">
            Solok, {{ now()->translatedFormat('d F Y') }} <br>
            Petugas Perpustakaan
            <br><br><br>
            <strong>(__________________)</strong>
        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Peminjaman Buku</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Times New Roman', serif;
            background: #fff;
            padding: 20px;
        }

        .kartu {
            border: 1px solid #000;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            text-align: center;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .kartu {
                margin: 0;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <div class="kartu">
        <h5 class="text-center fw-bold mb-0">PERPUSTAKAAN SMPN 1 KUBUNG</h5>
        <p class="text-center fw-bold mb-3">KARTU BUKU</p>

        <div class="mb-3">
            <strong>Judul Buku:</strong> {{ $item->buku }}
        </div>

        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $riwayat)
                    <tr>
                        <td>{{ $riwayat->nama_anggota }}</td>
                        <td>{{ \Carbon\Carbon::parse($riwayat->tangal_pinjam)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($riwayat->tangal_dikembalikan)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach

                @if ($peminjaman->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            Belum ada yang mengembalikan buku ini
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

    </div>

</body>

</html>

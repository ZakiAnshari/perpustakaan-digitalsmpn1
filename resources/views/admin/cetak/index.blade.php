<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Perhitungan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-size: 13px;
            color: #000;
        }

        .header-logo {
            width: 80px;
            height: auto;
        }

        .kop-text {
            line-height: 1.3;
        }

        .kop-border {
            border-top: 3px solid #000;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000 !important;
            padding: 8px !important;
        }

        .signature-block {
            margin-top: 60px;
        }

        @media print {
            .no-print {
                display: none;
            }

            .table th,
            .table td {
                font-size: 12px !important;
                border: 1px solid #000 !important;
            }

            .header-logo {
                width: 70px;
            }
        }
    </style>
</head>

<body class="bg-white">

    <div class="container py-3">
        <!-- Kop Surat -->
        <div class="row align-items-center">
            <div class="col-2 text-start">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0Ik1cLokG8YpA1Au6Y49On1y4hWAPRRsJCw&s"
                    class="header-logo" alt="Logo BPJS">
            </div>
            <div class="col-8 text-center kop-text">
                <h5 class="mb-0 fw-bold text-uppercase">SMP Negeri 1 Kubung</h5>
                <h6 class="mb-0 text-uppercase">Sistem Informasi Perpustakaan</h6>
                <p class="mb-0"> Jl. Raya Kubung No.123, Kubung, Sumatera Barat, Indonesia, 27273</p>
            </div>

        </div>

        <!-- Garis Pembatas -->
        <div class="kop-border"></div>

        <!-- Judul Laporan -->


        <!-- Tabel Data -->
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th style="width: 5px;">No</th>
                        <th>Nama Anggota</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Jatuh Tempo</th>
                        <th>Tanggal Dikembalikan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Agus Pratama</td>
                        <td>Belajar Laravel 11</td>
                        <td>01-08-2025</td>
                        <td>15-08-2025</td>
                        <td>14-08-2025</td>
                        <td><span>Dikembalikan</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Siti Aminah</td>
                        <td>PHP untuk Pemula</td>
                        <td>02-08-2025</td>
                        <td>16-08-2025</td>
                        <td>-</td>
                        <td><span>Dipinjam</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Rudi Hartono</td>
                        <td>Algoritma dan Struktur Data</td>
                        <td>03-08-2025</td>
                        <td>17-08-2025</td>
                        <td>16-08-2025</td>
                        <td><span>Dikembalikan</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Lina Marlina</td>
                        <td>Desain Web Modern</td>
                        <td>04-08-2025</td>
                        <td>18-08-2025</td>
                        <td>-</td>
                        <td><span>Dipinjam</span></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Andi Wijaya</td>
                        <td>Basis Data MySQL</td>
                        <td>05-08-2025</td>
                        <td>19-08-2025</td>
                        <td>18-08-2025</td>
                        <td><span>Dikembalikan</span></td>
                    </tr>
                </tbody>
            </table>

        </div>

        <!-- Tanda Tangan -->
        <div class="row signature-block">
            <div class="col-6"></div>
            <div class="col-6 text-end">
                <p class="mb-1">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                <p class="mb-5">Kepala Cabang BPJS Kesehatan</p>
                <p class="fw-bold text-uppercase mb-1">Drs. H. Ahmad Yani, M.M</p>
                <p class="mb-0">NIP: 19720304 199601 1 003</p>
            </div>
        </div>

        <!-- Script Print -->
        <script type="text/javascript">
            window.print();
        </script>
    </div>

</body>

</html>

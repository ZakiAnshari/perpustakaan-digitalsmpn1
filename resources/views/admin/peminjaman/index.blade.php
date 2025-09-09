@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <h4 class="fw-bold d-flex align-items-center my-4">
                <i class="bx bx-book-alt me-2 text-primary" style="font-size: 1.5rem;"></i>
                <span class="text-muted fw-light me-1"></span> Data Peminjaman
            </h4>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h5>Table Peminjaman</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Form Search -->
                                <form method="GET" class="d-flex align-items-center my-3" style="max-width: 350px;">
                                    <div class="input-group shadow-sm" style="height: 38px; width: 100%;">
                                        <input type="text" name="name" value="{{ request('name') }}"
                                            class="form-control border-end-0 py-2 px-3" style="font-size: 0.9rem;"
                                            placeholder="Cari  ..." aria-label="Search">
                                        <button class="btn btn-outline-primary px-3" type="submit"
                                            style="font-size: 0.9rem;">
                                            <i class="bx bx-search"></i>
                                        </button>
                                    </div>
                                </form>


                                <!-- Judul -->
                                <!-- Tombol Aksi -->
                                <div class="d-flex gap-2">
                                    <!-- Tombol Tambah -->
                                    {{-- <button type="button"
                                        class="btn btn-outline-success account-image-reset  d-flex align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#addProductModal">
                                        <i class="bx bx-plus me-2 d-block"></i>
                                        <span>Tambah</span>
                                    </button> --}}
                                    {{-- <button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#modalDenda">
                                        <i class="bx bx-money"></i> Lihat Daftar Denda
                                    </button> --}}

                                    <button type="button" class="btn btn-outline-warning d-flex align-items-center"
                                        onclick="window.open('/cetak', '_blank')">
                                        <i class="bx bx-printer me-2 d-block"></i>
                                        <span>Cetak</span>
                                    </button>


                                </div>
                            </div>
                            <div class="modal fade" id="modalDenda" tabindex="-1" aria-labelledby="modalDendaLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl"> <!-- modal lebar -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalDendaLabel">
                                                Daftar Siswa Kena Denda
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped align-middle">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th style="width: 5%">No</th>
                                                            <th style="width: 20%">Nama Siswa</th>
                                                            <th style="width: 20%">Judul Buku</th>
                                                            <th style="width: 15%">Tanggal Pinjam</th>
                                                            <th style="width: 15%">Jatuh Tempo</th>
                                                            <th style="width: 15%">Tanggal Dikembalikan</th>
                                                            <th style="width: 10%">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        @php $no = 1; @endphp
                                                        @foreach ($peminjaman as $item)
                                                            @php
                                                                $isLate =
                                                                    $item->tangal_dikembalikan &&
                                                                    \Carbon\Carbon::parse(
                                                                        $item->tangal_dikembalikan,
                                                                    )->gt(
                                                                        \Carbon\Carbon::parse($item->tangal_jatuhtempo),
                                                                    );
                                                            @endphp
                                                            @if ($isLate)
                                                                <tr>
                                                                    <td>{{ $no++ }}</td>
                                                                    <td>{{ $item->nama_anggota }}</td>
                                                                    <td>{{ $item->buku }}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($item->tangal_pinjam)->format('d/m/Y') }}
                                                                    </td>
                                                                    <td>{{ \Carbon\Carbon::parse($item->tangal_jatuhtempo)->format('d/m/Y') }}
                                                                    </td>
                                                                    <td>{{ \Carbon\Carbon::parse($item->tangal_dikembalikan)->format('d/m/Y') }}
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-sm btn-success"
                                                                            onclick="bayarDenda(this, '{{ $item->nama_anggota }}')">
                                                                            Bayar Denda
                                                                        </button>
                                                                    </td>

                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            @if (
                                                $peminjaman->filter(fn($i) => $i->tangal_dikembalikan &&
                                                            \Carbon\Carbon::parse($i->tangal_dikembalikan)->gt(\Carbon\Carbon::parse($i->tangal_jatuhtempo)))->isEmpty())
                                                <p class="text-center text-muted mt-3">Tidak ada siswa yang kena denda.</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal tambah Data -->
                            <div class="modal fade" id="addProductModal" tabindex="-1"
                                aria-labelledby="addProductModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <!-- Judul -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addProductModalLabel">Tambah User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="peminjaman-add" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <!-- Kolom Kiri -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="nama_anggota" class="form-label">Nama
                                                                Anggota</label>
                                                            <select name="nama_anggota" id="nama_anggota"
                                                                class="form-control" required>
                                                                <option value="">-- Pilih Anggota --</option>
                                                                @foreach ($users as $user)
                                                                    <option value="{{ $user->name }}">{{ $user->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>



                                                        <div class="mb-3">
                                                            <label for="buku" class="form-label">Judul Buku</label>
                                                            <select name="buku" id="buku" class="form-control"
                                                                required>
                                                                <option value="">-- Pilih Buku --</option>
                                                                @foreach ($bukus as $item)
                                                                    <option value="{{ $item->judul }}">
                                                                        {{ $item->judul }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                        <div class="mb-3">
                                                            <label for="tangal_pinjam" class="form-label">Tanggal
                                                                Pinjam</label>
                                                            <input type="date" name="tangal_pinjam"
                                                                class="form-control" id="tangal_pinjam" required>
                                                        </div>
                                                    </div>

                                                    <!-- Kolom Kanan -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="tangal_jatuhtempo" class="form-label">Tanggal
                                                                Jatuh
                                                                Tempo</label>
                                                            <input type="date" name="tangal_jatuhtempo"
                                                                class="form-control" id="tangal_jatuhtempo" required>
                                                        </div>



                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select name="status" id="status" class="form-control"
                                                                required>
                                                                <option value="">-- Pilih Status --</option>
                                                                <option value="Dipinjam">Dipinjam</option>
                                                                <option value="Dikembalikan">Dikembalikan</option>
                                                                <option value="Terlambat">Terlambat</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>

                                            <!-- Tombol -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Table Data -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        {{-- <th>Buku</th> --}}
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Jatuh Tempo</th>
                                        <th>Tanggal Dikembalikan</th>
                                        <th>Status</th>
                                        <th style="text-align: center">Denda</th>
                                        <th style="width: 150px; text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp

                                    @foreach ($peminjaman as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                {{ $item->nama_anggota }}
                                            </td>

                                            {{-- <td>{{ $item->buku }}</td> --}}
                                            <td>{{ \Carbon\Carbon::parse($item->tangal_pinjam)->translatedFormat('d F Y') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($item->tangal_jatuhtempo)->translatedFormat('d F Y') }}
                                            </td>
                                            <td>
                                                @if (
                                                    $item->tangal_dikembalikan &&
                                                        \Carbon\Carbon::parse($item->tangal_dikembalikan)->gt(\Carbon\Carbon::parse($item->tangal_jatuhtempo)))
                                                    <span class="badge bg-danger">
                                                        {{ \Carbon\Carbon::parse($item->tangal_dikembalikan)->translatedFormat('d F Y') }}
                                                    </span>
                                                @else
                                                    {{ $item->tangal_dikembalikan
                                                        ? \Carbon\Carbon::parse($item->tangal_dikembalikan)->translatedFormat('d F Y')
                                                        : '-' }}
                                                @endif
                                            </td>

                                            <td>
                                                <span
                                                    class="badge {{ $item->status == 'dipinjam' ? 'bg-danger' : 'bg-success' }}">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                            <td>
                                                @if (
                                                    $item->tangal_dikembalikan &&
                                                        \Carbon\Carbon::parse($item->tangal_dikembalikan)->gt(\Carbon\Carbon::parse($item->tangal_jatuhtempo)))
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                                        data-bs-target="#modalSuratDenda{{ $item->id }}">
                                                        Cetak Surat Denda
                                                    </button>
                                                @else
                                                    <p style="text-align: center">___</p>
                                                @endif
                                            </td>



                                            <td>
                                                <!-- Tombol Edit -->
                                                <a href="peminjaman-edit/{{ $item->id }}"
                                                    class="btn btn-icon btn-outline-primary">
                                                    <i class="bx bx-edit-alt"></i>
                                                </a>

                                                <!-- Tombol Hapus -->
                                                <a href="javascript:void(0)"
                                                    onclick="confirmDeletePeminjaman({{ $item->id }}, @js($item->nama_anggota))"
                                                    style="display:inline;">
                                                    <button class="btn btn-icon btn-outline-danger">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </a>

                                                <!-- Tombol Kartu Peminjaman -->
                                                <button class="btn btn-icon btn-outline-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#modalKartu{{ $item->id }}">
                                                    <i class="bx bx-book"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> <!-- Tutup table -->


                            @foreach ($peminjaman as $item)
                                {{-- MODAL PEMINJAMAN BUKU --}}
                                <div class="modal fade" id="modalKartu{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="modalKartuLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Kartu Peminjaman Buku</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="kartu-{{ $item->id }}">
                                                <div class="p-3"
                                                    style="border:1px solid #000; background:#fff; font-family: 'Times New Roman', serif;">
                                                    <h5 class="text-center fw-bold mb-0">PERPUSTAKAAN SMPN 1 KUBUNG</h5>
                                                    <p class="text-center fw-bold mb-3">KARTU BUKU</p>

                                                    <div class="mb-3">
                                                        <strong>Judul Buku :</strong> {{ $item->buku }} <br>

                                                    </div>

                                                    <table class="table table-bordered"
                                                        style="width:100%; border-collapse: collapse; font-size:14px;">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th>Nama
                                                                    Peminjam</th>
                                                                <th>Tanggal
                                                                    Pinjam</th>
                                                                <th>Tanggal
                                                                    Kembali</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($peminjaman->where('buku', $item->buku)->whereNotNull('tangal_dikembalikan') as $riwayat)
                                                                <tr>
                                                                    <td>
                                                                        {{ $riwayat->nama_anggota }}</td>
                                                                    <td>
                                                                        {{ \Carbon\Carbon::parse($riwayat->tangal_pinjam)->format('d/m/Y') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ \Carbon\Carbon::parse($riwayat->tangal_dikembalikan)->format('d/m/Y') }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                            @if ($peminjaman->where('buku', $item->buku)->whereNotNull('tangal_dikembalikan')->isEmpty())
                                                                <tr>
                                                                    <td colspan="3" class="text-center text-muted"
                                                                        style="border:1px solid #000; padding:6px;">
                                                                        Belum ada yang mengembalikan buku ini
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Tombol Cetak -->
                                            <div class="modal-footer">
                                                <a href="{{ route('cetak.peminjaman', $item->id) }}" target="_blank"
                                                    class="btn btn-outline-primary">
                                                    <i class="bx bx-printer"></i> Cetak
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- MODAL CETAK DENDA --}}
                                <div class="modal fade" id="modalSuratDenda{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body" id="surat-denda-{{ $item->id }}">
                                                <div
                                                    style="padding:20px; border:1px solid #000; font-family:'Times New Roman', serif;">
                                                    <h5 class="text-center fw-bold">PERPUSTAKAAN SMPN 1 KUBUNG</h5>
                                                    <p class="text-center fw-bold">SURAT DENDA</p>
                                                    <hr>

                                                    <p>Dengan ini kami memberitahukan bahwa siswa berikut:</p>
                                                    <table style="width:100%; margin-bottom:15px;">
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
                                                            <td>:
                                                                {{ \Carbon\Carbon::parse($item->tangal_pinjam)->translatedFormat('d F Y') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jatuh Tempo</td>
                                                            <td>:
                                                                {{ \Carbon\Carbon::parse($item->tangal_jatuhtempo)->translatedFormat('d F Y') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Dikembalikan</td>
                                                            <td>:
                                                                {{ \Carbon\Carbon::parse($item->tangal_dikembalikan)->translatedFormat('d F Y') }}
                                                            </td>
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

                                                    <p>Diharapkan siswa segera melakukan pembayaran denda sesuai ketentuan
                                                        kepada petugas perpustakaan.</p>

                                                    <br><br>
                                                    <div style="text-align:right;">
                                                        Solok, {{ now()->translatedFormat('d F Y') }} <br>
                                                        Petugas Perpustakaan
                                                        <br><br><br>
                                                        <strong>(__________________)</strong>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tambahkan footer dengan tombol -->
                                            <div class="modal-footer">
                                               
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('cetak.denda', $item->id) }}" target="_blank"
                                                        class="btn btn-outline-primary">
                                                        <i class="bx bx-printer"></i> Cetak
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach





                            <!-- Pagination -->
                            <div class="d-flex justify-content-end mt-3">
                                {{ $peminjaman->appends(request()->input())->links('pagination::bootstrap-4') }}
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Script Print -->




    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeletePeminjaman(id, nama) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: `"${nama}" akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/peminjaman-destroy/${id}`;
                }
            });
        }
    </script>
    @include('sweetalert::alert')
    @include('sweetalert::alert')
@endsection

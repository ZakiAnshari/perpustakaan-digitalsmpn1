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
                                    <button type="button"
                                        class="btn btn-outline-success account-image-reset  d-flex align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#addProductModal">
                                        <i class="bx bx-plus me-2 d-block"></i>
                                        <span>Tambah</span>
                                    </button>
                                    <button type="button" class="btn btn-outline-warning d-flex align-items-center"
                                        onclick="window.open('/cetak', '_blank')">
                                        <i class="bx bx-printer me-2 d-block"></i>
                                        <span>Cetak</span>
                                    </button>


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
                                                                    <option value="{{ $item->judul }}">{{ $item->judul }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                        <div class="mb-3">
                                                            <label for="tangal_pinjam" class="form-label">Tanggal
                                                                Pinjam</label>
                                                            <input type="date" name="tangal_pinjam" class="form-control"
                                                                id="tangal_pinjam" required>
                                                        </div>
                                                    </div>

                                                    <!-- Kolom Kanan -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="tangal_jatuhtempo" class="form-label">Tanggal Jatuh
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
                                        <th>Nama Anggota</th>
                                        <th>Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Jatuh Tempo</th>
                                        <th>Tanggal Dikembalikan</th>
                                        <th>Status</th>
                                        <th style="width: 120px; text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($peminjaman as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nama_anggota }}</td>
                                            <td>{{ $item->buku }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tangal_pinjam)->translatedFormat('d F Y') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($item->tangal_jatuhtempo)->translatedFormat('d F Y') }}
                                            </td>
                                            <td>
                                                {{ $item->tangal_dikembalikan ? \Carbon\Carbon::parse($item->tangal_dikembalikan)->translatedFormat('d F Y') : '-' }}
                                            </td>

                                            <td>
                                                <span
                                                    class="badge 
                                                    @if ($item->status == 'Dipinjam') bg-warning
                                                    @elseif($item->status == 'Dikembalikan') bg-success
                                                    @else bg-secondary @endif">
                                                    {{ $item->status }}
                                                </span>
                                            </td>

                                            <td>
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
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>




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

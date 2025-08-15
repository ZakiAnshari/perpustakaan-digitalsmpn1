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
                                        onclick="window.location.href='/cetak'">
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
                                        {{-- <form action="buku-add" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <!-- Kolom Kiri -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="kode_buku" class="form-label">Kode Buku</label>
                                                            <input type="text" name="kode_buku" class="form-control"
                                                                id="kode_buku" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category_id" class="form-label">Kategori</label>
                                                            <select name="category_id" id="category_id" class="form-control"
                                                                required>
                                                                <option value="">-- Pilih Kategori --</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->nama_category }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="judul" class="form-label">Judul</label>
                                                            <input type="text" name="judul" class="form-control"
                                                                id="judul" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="pengarang" class="form-label">Pengarang</label>
                                                            <input type="text" name="pengarang" class="form-control"
                                                                id="pengarang" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="penerbit" class="form-label">Penerbit</label>
                                                            <input type="text" name="penerbit" class="form-control"
                                                                id="penerbit" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="tahun_terbit" class="form-label">Tahun
                                                                Terbit</label>
                                                            <input type="number" name="tahun_terbit" class="form-control"
                                                                id="tahun_terbit" required>
                                                        </div>
                                                    </div>

                                                    <!-- Kolom Kanan -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="isbn" class="form-label">ISBN</label>
                                                            <input type="text" name="isbn" class="form-control"
                                                                id="isbn" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="jumlah_stok" class="form-label">Jumlah
                                                                Stok</label>
                                                            <input type="number" name="jumlah_stok" class="form-control"
                                                                id="jumlah_stok" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="lokasi_rak" class="form-label">Lokasi Rak</label>
                                                            <input type="text" name="lokasi_rak" class="form-control"
                                                                id="lokasi_rak" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4"></textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="cover" class="form-label">Cover Buku</label>
                                                            <input type="file" name="cover" class="form-control"
                                                                id="cover">
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
                                        </form> --}}
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
                                    <tr>
                                        <td>1</td>
                                        <td>Agus Pratama</td>
                                        <td>Belajar Laravel 11</td>
                                        <td>2023-07-01</td>
                                        <td>2023-07-15</td>
                                        <td>2023-07-14</td>
                                        <td><span class="badge bg-success">Dikembalikan</span></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary">Edit</button>
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Siti Aminah</td>
                                        <td>PHP untuk Pemula</td>
                                        <td>2023-07-05</td>
                                        <td>2023-07-19</td>
                                        <td>-</td>
                                        <td><span class="badge bg-warning">Dipinjam</span></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary">Edit</button>
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Rudi Hartono</td>
                                        <td>Algoritma dan Struktur Data</td>
                                        <td>2023-06-20</td>
                                        <td>2023-07-04</td>
                                        <td>2023-07-03</td>
                                        <td><span class="badge bg-success">Dikembalikan</span></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary">Edit</button>
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Lina Marlina</td>
                                        <td>Desain Web Modern</td>
                                        <td>2023-07-10</td>
                                        <td>2023-07-24</td>
                                        <td>-</td>
                                        <td><span class="badge bg-warning">Dipinjam</span></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary">Edit</button>
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Andi Wijaya</td>
                                        <td>Basis Data MySQL</td>
                                        <td>2023-06-15</td>
                                        <td>2023-06-29</td>
                                        <td>2023-06-28</td>
                                        <td><span class="badge bg-success">Dikembalikan</span></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary">Edit</button>
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>




                            <!-- Pagination -->
                            {{-- <div class="d-flex justify-content-end mt-3">
                                {{ $users->appends(request()->input())->links('pagination::bootstrap-4') }}

                            </div> --}}


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('sweetalert::alert')
@endsection

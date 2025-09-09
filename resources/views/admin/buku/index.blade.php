@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <h4 class="fw-bold d-flex align-items-center my-4">
                <i class="bx bx-book me-2 text-primary" style="font-size: 1.5rem;"></i>
                <span class="text-muted fw-light me-1"></span> Data Buku
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
                            <h5>Table Data Buku</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Form Search -->
                                <form method="GET" class="d-flex align-items-center my-3" style="max-width: 350px;">
                                    <div class="input-group shadow-sm" style="height: 38px; width: 100%;">
                                        <input type="text" name="name" value="{{ request('name') }}"
                                            class="form-control border-end-0 py-2 px-3" style="font-size: 0.9rem;"
                                            placeholder="Cari..." aria-label="Search">
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
                                        <form action="book-add" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <!-- Kolom Kiri -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="book_code" class="form-label">Kode Buku</label>
                                                            <input type="text" name="book_code" class="form-control"
                                                                id="book_code" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category" class="form-label">Kategori</label>
                                                            <select name="category" id="category" class="form-control"
                                                                required>
                                                                <option value="">-- Pilih Kategori --</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->nama_category }}">
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
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Table Data -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Buku</th>
                                        <th>Judul</th>
                                        <th>Status</th>
                                        <th>Pengarang</th>
                                        <th style="width: 80px; text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bukus  as $index => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->book_code }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->pengarang }}</td>
                                            <td>
                                                
                                                <!-- Tombol Lihat -->
                                                <a href="buku-show/{{ $item->id }}"
                                                    class="btn btn-icon btn-outline-info" title="Lihat Data">
                                                    <i class="bx bx-show"></i>
                                                </a>

                                                <!-- Tombol Edit -->
                                                <a href="buku-edit/{{ $item->id }}"
                                                    class="btn btn-icon btn-outline-primary">
                                                    <i class="bx bx-edit-alt"></i>
                                                </a>

                                                <!-- Tombol Hapus -->
                                                <a href="javascript:void(0)"
                                                    onclick="confirmDeleteBuku({{ $item->id }}, @js($item->book_code))"
                                                    style="display:inline;">
                                                    <button class="btn btn-icon btn-outline-danger">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>


                            </table>


                            <!-- Pagination -->
                            <div class="d-flex justify-content-end mt-3">
                                {{ $bukus->appends(request()->input())->links('pagination::bootstrap-4') }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeleteBuku(id, nama) {
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
                    window.location.href = `/buku-destroy/${id}`;
                }
            });
        }
    </script>
    @include('sweetalert::alert')

@endsection

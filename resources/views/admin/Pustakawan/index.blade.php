@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <h4 class="fw-bold d-flex align-items-center my-4">
                <i class="bx bx-user me-2 text-primary" style="font-size: 1.5rem;"></i>
                <span class="text-muted fw-light me-1"></span> Data Pustakawan
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
                            <h5>Table Pustakawan</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Form Search -->
                                <form method="GET" class="d-flex align-items-center my-3" style="max-width: 350px;">
                                    <div class="input-group shadow-sm" style="height: 38px; width: 100%;">
                                        <input type="text" name="name" value="{{ request('name') }}"
                                            class="form-control border-end-0 py-2 px-3" style="font-size: 0.9rem;"
                                            placeholder="Cari nama pustakawan..." aria-label="Search">
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
                                            <h5 class="modal-title" id="addProductModalLabel">Tambah Pustakawan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="pustakawan-add" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <!-- Kolom Kiri -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Nama</label>
                                                            <input type="text" name="name" class="form-control"
                                                                id="name" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" name="email" class="form-control"
                                                                id="email" required>
                                                        </div>
                                                    </div>

                                                    <!-- Kolom Kanan -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Telepon</label>
                                                            <input type="text" name="phone" class="form-control"
                                                                id="phone">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="nip" class="form-label">NIP</label>
                                                            <input type="text" name="nip" class="form-control"
                                                                id="nip">
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
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>NIP</th>
                                        <th style="width: 120px; text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pustakawans  as $index => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->nip }}</td>
                                            <td>


                                                <a href="pustakawan-edit/{{ $item->id }}"
                                                    class="btn btn-icon btn-outline-primary">
                                                    <i class="bx bx-edit-alt"></i>
                                                </a>

                                                <!-- Tombol Hapus -->
                                                <a href="javascript:void(0)"
                                                    onclick="confirmDeletePustakawan({{ $item->id }}, @js($item->name))"
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
                            {{-- <div class="d-flex justify-content-end mt-3">
                                {{ $users->appends(request()->input())->links('pagination::bootstrap-4') }}

                            </div> --}}


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeletePustakawan(id, nama) {
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
                    window.location.href = `/pustakawan-destroy/${id}`;
                }
            });
        }
    </script>
    @include('sweetalert::alert')
@endsection

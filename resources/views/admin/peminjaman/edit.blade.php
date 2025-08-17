@extends('layouts.admin')
@section('title', 'Edit')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold d-flex align-items-center my-4">
            <i class="bx bx-id-card me-2 text-primary" style="font-size: 1.5rem;"></i>
            <span class="text-muted fw-light me-1"></span> Edit Peminjaman
        </h4>

        <div class="card">
            <div class="d-flex align-items-center justify-content-between border-bottom pb-2 mb-3">
                <a class="mx-4 my-4" href="{{ route('peminjaman.index') }}">
                    <button class="btn btn-outline-primary border-1 rounded-1 px-3 py-1 d-flex align-items-center"
                        data-bs-toggle="tooltip" title="Kembali">
                        <i class="bi bi-arrow-left fs-5 mx-1"></i>
                        <span class="fw-normal">Kembali</span>
                    </button>
                </a>
            </div>


            <div class="card-body">
                <div class="text-nowrap">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('peminjaman-edit/' . $peminjaman->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST') <!-- Gunakan method PUT untuk update data -->
                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tangal_dikembalikan" class="form-label">Tanggal Dikembalikan</label>
                                    <input type="date" name="tangal_dikembalikan" class="form-control"
                                        id="tangal_dikembalikan"
                                        value="{{ old('tangal_dikembalikan', $peminjaman->tangal_dikembalikan) }}">
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-lg-6">



                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="dipinjam">Dipinjam</option>
                                        <option value="dikembalikan">Dikembalikan</option>
                                        <option value="terlambat">Terlambat</option>
                                    </select>

                                </div>
                            </div>

                            <!-- Tombol -->
                            <div class="text-end btn-page mb-0 mt-4">
                                <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>


    </div>

    @include('sweetalert::alert')
@endsection

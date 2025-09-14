@extends('layouts.admin')
@section('title', 'Edit')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold d-flex align-items-center my-4">
            <i class="bx bx-book me-2 text-primary" style="font-size: 1.5rem;"></i>
            <span class="text-muted fw-light me-1"></span> Edit Buku
        </h4>
        <div class="card">
            <div class="d-flex align-items-center justify-content-between border-bottom pb-2 mb-3">
                <a class="mx-4 my-4" href="{{ route('buku.index') }}">
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
                    <form action="{{ url('buku-edit/' . $bukus->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST') <!-- Gunakan method PUT untuk update data -->
                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="kode_buku" class="form-label">Kode Buku</label>
                                    <input type="text" name="kode_buku" class="form-control" id="kode_buku"
                                        value="{{ $bukus->kode_buku }}">
                                </div>

                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori</label>
                                    <select name="category" id="category" class="form-control" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->nama_category }}"
                                                {{ $bukus->category == $category->nama_category ? 'selected' : '' }}>
                                                {{ $category->nama_category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>





                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" name="judul" class="form-control" id="judul"
                                        value="{{ $bukus->judul }}">
                                </div>

                                <div class="mb-3">
                                    <label for="pengarang" class="form-label">Pengarang</label>
                                    <input type="text" name="pengarang" class="form-control" id="pengarang"
                                        value="{{ $bukus->pengarang }}">
                                </div>

                                <div class="mb-3">
                                    <label for="penerbit" class="form-label">Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" id="penerbit"
                                        value="{{ $bukus->penerbit }}">
                                </div>

                                <div class="mb-3">
                                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                    <input type="number" name="tahun_terbit" class="form-control" id="tahun_terbit"
                                        value="{{ $bukus->tahun_terbit }}">
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="text" name="isbn" class="form-control" id="isbn"
                                        value="{{ $bukus->isbn }}">
                                </div>

                                <div class="mb-3">
                                    <label for="jumlah_stok" class="form-label">Jumlah Stok</label>
                                    <input type="number" name="jumlah_stok" class="form-control" id="jumlah_stok"
                                        value="{{ $bukus->jumlah_stok }}">
                                </div>

                                <div class="mb-3">
                                    <label for="lokasi_rak" class="form-label">Lokasi Rak</label>
                                    <input type="text" name="lokasi_rak" class="form-control" id="lokasi_rak"
                                        value="{{ $bukus->lokasi_rak }}">
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="1">{{ $bukus->deskripsi }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="cover" class="form-label">Cover Buku</label>
                                    <input type="file" name="cover" class="form-control" id="cover">


                                    <div class="text-center mt-3">
                                        @if ($bukus->cover)
                                            <img src="{{ asset('uploads/cover/' . $bukus->cover) }}" alt="Cover Buku"
                                                class="img-thumbnail" width="320">
                                        @else
                                            <div class="border p-5 text-muted">
                                                Cover Kosong
                                            </div>
                                        @endif
                                    </div>


                                </div>

                            </div>


                            <div class="text-end btn-page mb-0 mt-4">
                                <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary">Batal</a>
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

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
                <a class="mx-4 my-4" href="{{ route('ebook.index') }}">
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
                    <form action="{{ url('ebook-edit/' . $ebooks->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="judul_ebook" class="form-label">Judul Ebook</label>
                                    <input type="text" name="judul_ebook" class="form-control" id="judul_ebook"
                                        value="{{ old('judul_ebook', $ebooks->judul_ebook) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="penggarang" class="form-label">Pengarang</label>
                                    <input type="text" name="penggarang" class="form-control" id="penggarang"
                                        value="{{ old('penggarang', $ebooks->penggarang) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="penerbit" class="form-label">Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" id="penerbit"
                                        value="{{ old('penerbit', $ebooks->penerbit) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                    <input type="number" name="tahun_terbit" class="form-control" id="tahun_terbit"
                                        value="{{ old('tahun_terbit', $ebooks->tahun_terbit) }}" required>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="cover" class="form-label">Cover Ebook</label>
                                    <input type="file" name="cover" class="form-control" id="cover"
                                        accept=".jpg,.jpeg,.png">
                                    <div class="text-center mt-3">
                                        @if ($ebooks->cover)
                                            <img src="{{ asset('uploads/cover/' . $ebooks->cover) }}" alt="Cover Ebook"
                                                class="img-thumbnail" width="220">
                                        @else
                                            <div class="border p-5 text-muted">
                                                Cover Kosong
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="file_pdf" class="form-label">File PDF</label>
                                    <input type="file" name="file_pdf" class="form-control" id="file_pdf"
                                        accept=".pdf">
                                    <div class="mt-2">
                                        @if ($ebooks->file_pdf)
                                            <a href="{{ asset('uploads/pdf/' . $ebooks->file_pdf) }}" target="_blank"
                                                class="btn btn-sm btn-success">
                                                Lihat PDF Lama
                                            </a>
                                        @else
                                            <div class="text-muted">Tidak ada file PDF</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol -->
                            <div class="text-end btn-page mb-0 mt-4">
                                <a href="{{ route('ebook.index') }}" class="btn btn-outline-secondary">Batal</a>
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

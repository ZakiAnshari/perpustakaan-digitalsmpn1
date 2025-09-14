@extends('layouts.admin')
@section('title', 'Buku')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold d-flex align-items-center my-4">


            <i class="bx bx-user me-2 text-primary" style="font-size: 1.5rem;"></i>
            <span class="text-muted fw-light me-1"></span> Lihat Data Buku
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
                    <div class="row">
                        <!-- Kartu Kiri (Cover & Identitas Singkat) -->
                        <div class="col-lg-4 mb-4">
                            <div class="card h-100 border border-primary shadow-sm">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <!-- Cover Buku -->
                                    <div class="mb-3">
                                        @if ($bukus->cover)
                                            <img src="{{ asset('uploads/cover/' . $bukus->cover) }}" alt="Cover Buku"
                                                class="img-thumbnail"
                                                style="max-width: 100%; height: auto; border-radius: 8px;">
                                        @else
                                            <div class="border d-flex align-items-center justify-content-center"
                                                style="width: 100%; height: 250px; color: #6c757d; border-radius: 8px;">
                                                Cover Kosong
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Status Buku -->
                                    <p class="text-muted mb-0">{{ ucfirst($bukus->status) }}</p>
                                </div>

                            </div>
                        </div>


                        <!-- Kartu Kanan (Detail Buku) -->
                        <div class="col-lg-8 mb-4">
                            <div class="card h-100 border border-primary shadow-sm">
                                <div class="card-header bg-light border-bottom border-primary mb-3">
                                    <h5 class="mb-0 text-primary">Detail Buku</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row border-bottom pb-3 mb-3">
                                        <div class="col-md-12 text-center">
                                            <p class="mb-1 text-muted">Judul Buku</p>
                                            <h6 class="mb-0">{{ $bukus->judul }}</h6>
                                        </div>

                                    </div>


                                    <div class="row border-bottom pb-3 mb-3">
                                        <div class="col-md-6">
                                            <p class="mb-1 text-muted">Kode Buku</p>
                                            <h6 class="mb-0">{{ $bukus->kode_buku }}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-1 text-muted">Pengarang</p>
                                            <h6 class="mb-0">{{ $bukus->pengarang }}</h6>
                                        </div>
                                    </div>

                                    <div class="row border-bottom pb-3 mb-3">
                                        <div class="col-md-6">
                                            <p class="mb-1 text-muted">Penerbit</p>
                                            <h6 class="mb-0">{{ $bukus->penerbit }}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-1 text-muted">Tahun Terbit</p>
                                            <h6 class="mb-0">{{ $bukus->tahun_terbit }}</h6>
                                        </div>
                                    </div>

                                    <div class="row border-bottom pb-3 mb-3">
                                        <div class="col-md-6">
                                            <p class="mb-1 text-muted">ISBN</p>
                                            <h6 class="mb-0">{{ $bukus->isbn ?? '-' }}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-1 text-muted">Jumlah Stok</p>
                                            <h6 class="mb-0">{{ $bukus->jumlah_stok }}</h6>
                                        </div>
                                    </div>

                                    <div class="row border-bottom pb-3 mb-3">
                                        <div class="col-md-6">
                                            <p class="mb-1 text-muted">Lokasi Rak</p>
                                            <h6 class="mb-0">{{ $bukus->lokasi_rak }}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-1 text-muted">Kategori</p>
                                            <h6 class="mb-0">{{ $bukus->category }}</h6>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="mb-1 text-muted">Deskripsi</p>
                                            <h6 class="mb-0">{{ $bukus->deskripsi ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>


    </div>

    @include('sweetalert::alert')
@endsection

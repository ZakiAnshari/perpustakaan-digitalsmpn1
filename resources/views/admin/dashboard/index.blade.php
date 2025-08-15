@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">
                                    Selamat Datang, Pustakawan, di Sistem Informasi Perpustakaan SMP N 1 Kubung 🎉
                                </h5>
                                <p class="mb-4">
                                    Gunakan sistem ini untuk mengelola data buku, anggota, dan aktivitas perpustakaan secara
                                    cepat,
                                    terorganisir, dan efisien.
                                </p>

                                <a href="" class="btn btn-sm btn-outline-primary">
                                    Lihat Data Buku
                                </a>
                            </div>


                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('/backend/assets/img/illustrations/man-with-laptop-light.png') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (auth()->user()->role_id == 1)
                {{-- TOTAL BUKU --}}
                <div class="col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                                <h5 class="card-title text-center mb-3">Total Buku</h5>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="bi bi-book-fill text-primary" style="font-size: 3rem;"></i>
                                    <span class="badge bg-label-primary rounded-pill"
                                        style="font-size: 1.5rem; padding: 0.5rem 1rem;">
                                        {{ $bookCount }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TOTAL PUSTAKAWAN --}}
                <div class="col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                                <h5 class="card-title text-center mb-3">Total Pustakawan</h5>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="bi bi-person-workspace text-primary" style="font-size: 3rem;"></i>
                                    <span class="badge bg-label-primary rounded-pill"
                                        style="font-size: 1.5rem; padding: 0.5rem 1rem;">
                                        {{ $pustakawanCount }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TOTAL ANGGOTA --}}
                <div class="col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                                <h5 class="card-title text-center mb-3">Total Anggota</h5>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="bi bi-people-fill text-primary" style="font-size: 3rem;"></i>
                                    <span class="badge bg-label-primary rounded-pill"
                                        style="font-size: 1.5rem; padding: 0.5rem 1rem;">
                                        {{ $userCount }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TOTAL E-BOOK --}}
                <div class="col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                                <h5 class="card-title text-center mb-3">Total E-Book</h5>
                                <div class="d-flex align-items-center gap-3">
                                    <i class="bi bi-tablet-landscape-fill text-primary" style="font-size: 3rem;"></i>
                                    <span class="badge bg-label-primary rounded-pill"
                                        style="font-size: 1.5rem; padding: 0.5rem 1rem;">
                                        {{ $ebookCount }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="card-title text-center mb-3">Total Peminjam</h5>
                            <div class="d-flex align-items-center gap-3">
                                <!-- Ikon peminjam -->
                                <i class="bi bi-person-plus-fill text-primary" style="font-size: 3rem;"></i>
                                <span class="badge bg-label-primary rounded-pill"
                                    style="font-size: 1.5rem; padding: 0.5rem 1rem;">
                                    5
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="card-title text-center mb-3">Total Pengembalian</h5>
                            <div class="d-flex align-items-center gap-3">
                                <!-- Ikon pengembalian -->
                                <i class="bi bi-box-arrow-in-left text-primary" style="font-size: 3rem;"></i>
                                <span class="badge bg-label-primary rounded-pill"
                                    style="font-size: 1.5rem; padding: 0.5rem 1rem;">
                                    3
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    @include('sweetalert::alert')
@endsection

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Buku</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/backend') }}../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/backend') }}../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/backend/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/backend/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('/backend/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/config.js') }}"></script>

    <style>
        .card-img-top {
            max-height: 500px;
            width: auto;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
            <!-- Layout page -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="navbar-nav-left d-flex align-items-center">
                        <!-- Logo -->
                        <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0Ik1cLokG8YpA1Au6Y49On1y4hWAPRRsJCw&s"
                                alt="Logo" class="header-logo" style="height:40px;">
                            <span class="fw-bold">SMP N 1 KUBUNG</span>
                        </a>
                    </div>

                    <div class="navbar-nav ms-auto d-flex align-items-center gap-3">
                        <div class="nav-item d-flex align-items-center gap-2">
                            <a href="/buku" class="btn btn-outline-primary btn-sm active">Buku</a>
                            <a href="/ebook" class="btn btn-outline-primary btn-sm">E-Book</a>
                            <a href="/pengembalian" class="btn btn-outline-primary btn-sm">Kembalikan Buku</a>
                        </div>

                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown list-unstyled mb-0">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('backend/assets/img/avatars/' . (Auth::user()->jenis_kelamin == 'Perempuan' ? '6.png' : '1.png')) }}"
                                        alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-online me-3">
                                                <img src="{{ asset('backend/assets/img/avatars/' . (Auth::user()->jenis_kelamin == 'Perempuan' ? '6.png' : '1.png')) }}"
                                                    alt class="w-px-40 h-auto rounded-circle" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                <small class="text-muted">{{ Auth::user()->role->name }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="confirmLogout(event)">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Search & Filter -->
                        
                        <!-- Book Cards -->
                        <div class="container-xxl flex-grow-1 container">
                            <div class="card">
                                <div class="d-flex align-items-center justify-content-between border-bottom pb-2 mb-3">
                                    <a class="mx-4 my-4" href="{{ route('dashboardpinjam.index') }}">
                                        <button
                                            class="btn btn-outline-primary border-1 rounded-1 px-3 py-1 d-flex align-items-center"
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
                                                    <div
                                                        class="card-header bg-light border-bottom border-primary mb-3">
                                                        <h5 class="mb-0 text-primary">Cover Buku</h5>
                                                    </div>
                                                    <div
                                                        class="card-body d-flex flex-column align-items-center justify-content-center">
                                                        <!-- Cover Buku -->
                                                        <div class="mb-3">
                                                            @if ($bukus->cover)
                                                                <img src="{{ asset('uploads/cover/' . $bukus->cover) }}"
                                                                    alt="Cover Buku" class="img-thumbnail"
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
                                                    <div
                                                        class="card-header bg-light border-bottom border-primary mb-3">
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
                                                                <h6 class="mb-0">{{ $bukus->book_code }}</h6>
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



                    </div>
                    <!-- /Book Cards -->
                </div>
            </div>
            <!-- /Content wrapper -->
        </div>

        <!-- /Layout page -->
    </div>
    </div>
    <!-- /Layout wrapper -->
    {{-- <script>
        function confirmLogout(event) {
            event.preventDefault(); // cegah link reload ke "#"
            if (confirm("Yakin ingin logout?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmLogout(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan keluar dari sistem!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/logout';
                }
            });
        }
    </script>
    @include('sweetalert::alert')
    <!-- Core JS -->
    <script src="{{ asset('/backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/main.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>

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
                            <a href="/dashboardpinjam" class="btn btn-outline-primary btn-sm active">Buku</a>
                            {{-- <a href="/e-book" class="btn btn-outline-primary btn-sm">E-Book</a> --}}
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
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                                <form class="d-flex" role="search" method="GET"
                                    action="{{ route('dashboardpinjam.index') }}">
                                    <input class="form-control" type="search" name="q"
                                        value="{{ request('q') }}" placeholder="Cari buku..." aria-label="Search">
                                    <button class="btn btn-primary ms-2" type="submit">Cari</button>
                                </form>
                            </div>

                            <div class="col-lg-6">
                                <select class="form-select" name="category_id">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ isset($buku) && $buku->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->nama_category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <!-- Book Cards -->
                        <div class="row mb-5">
                            <div class="row">
                                @forelse ($bukus as $index => $item)
                                    <div class="col-md-6 col-lg-4 mb-3">
                                        <div class="card h-100 shadow-sm">

                                            {{-- Bagian gambar dengan ukuran fix --}}
                                            <div style="width: 100%; height: 250px; overflow: hidden;">
                                                <img src="{{ asset('uploads/cover/' . $item->cover) }}"
                                                    alt="{{ $item->judul }}" class="card-img-top"
                                                    style="width: 100%; height: 100%; object-fit: cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem;" />
                                            </div>

                                            {{-- Bagian isi card --}}
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title text-truncate">{{ $item->judul }}</h5>
                                                <div class="mt-auto">
                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <a href="{{ url('dashboardpinjam-show/' . $item->id) }}"
                                                                class="btn btn-outline-primary w-100">Lihat</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="col-12">
                                                                <button type="button"
                                                                    class="btn btn-outline-primary w-100"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#pinjamModal{{ $item->id }}">
                                                                    Pinjam
                                                                </button>
                                                            </div>

                                                            <!-- Modal Pinjam -->
                                                            <div class="modal fade"
                                                                id="pinjamModal{{ $item->id }}" tabindex="-1"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">

                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Form Peminjaman
                                                                                Buku</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"></button>
                                                                        </div>

                                                                        <form action="peminjaman-add" method="POST"
                                                                            enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Nama
                                                                                        Siswa</label>
                                                                                    <input type="text"
                                                                                        name="nama_anggota"
                                                                                        class="form-control"
                                                                                        value="{{ auth()->user()->name }}"
                                                                                        readonly>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Judul
                                                                                        Buku</label>
                                                                                    <input type="text"
                                                                                        name="buku"
                                                                                        class="form-control"
                                                                                        value="{{ $item->judul }}"
                                                                                        readonly>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Tanggal
                                                                                        Pinjam</label>
                                                                                    <input type="date"
                                                                                        id="tanggal_pinjam"
                                                                                        name="tangal_pinjam"
                                                                                        class="form-control"
                                                                                        value="{{ now()->toDateString() }}">
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Tanggal
                                                                                        Jatuh Tempo</label>
                                                                                    <input type="date"
                                                                                        id="tanggal_jatuh"
                                                                                        name="tangal_jatuhtempo"
                                                                                        class="form-control"
                                                                                        value="{{ now()->addDays(7)->toDateString() }}" readonly>
                                                                                </div>

                                                                                <input type="hidden" name="status"
                                                                                    value="dipinjam">
                                                                            </div>




                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Batal</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Pinjam</button>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <div class="card shadow-sm text-center p-4">
                                            <h5 class="mb-2">📚 Tidak ada buku ditemukan</h5>
                                            @if (request('q'))
                                                <p class="text-muted">
                                                    Hasil pencarian untuk
                                                    <strong>"{{ request('q') }}"</strong> tidak tersedia.
                                                </p>
                                            @else
                                                <p class="text-muted">Belum ada data buku yang tersedia.</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforelse

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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tglPinjam = document.getElementById("tanggal_pinjam");
            const tglJatuh = document.getElementById("tanggal_jatuh");

            tglPinjam.addEventListener("change", function() {
                let pinjamDate = new Date(this.value);
                if (!isNaN(pinjamDate.getTime())) {
                    // Tambahkan 7 hari
                    pinjamDate.setDate(pinjamDate.getDate() + 7);

                    // Format ke YYYY-MM-DD
                    let year = pinjamDate.getFullYear();
                    let month = String(pinjamDate.getMonth() + 1).padStart(2, '0');
                    let day = String(pinjamDate.getDate()).padStart(2, '0');

                    tglJatuh.value = `${year}-${month}-${day}`;
                }
            });
        });
    </script>
    <script>
        function alertPinjam(judul) {
            Swal.fire({
                title: 'Informasi',
                text: 'Untuk meminjam buku "' + judul + '", silakan langsung ke perpustakaan.',
                icon: 'info',
                confirmButtonText: 'Mengerti',
                confirmButtonColor: '#0d6efd'
            });
        }
    </script>

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

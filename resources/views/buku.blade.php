<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Buku</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/backend') }}../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/backend') }}../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/backend/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/backend/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
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
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="navbar-nav-left d-flex align-items-center">
                        <!-- Logo -->
                        <a class="navbar-brand" href="#">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0Ik1cLokG8YpA1Au6Y49On1y4hWAPRRsJCw&s" alt="Logo" class="header-logo" style="height:40px;">
                            SMP N 1 KUBUNG
                        </a>
                    </div>
                    <div class="navbar-nav d-flex align-items-center ms-auto" id="navbar-collapse">
                        <div class="nav-item d-flex align-items-center gap-2">
                            <a href="/buku" class="btn btn-outline-primary btn-sm active">Buku</a>
                            <a href="/ebook" class="btn btn-outline-primary btn-sm">E-Book</a>
                            <a href="/pengembalian" class="btn btn-outline-primary btn-sm">Kembalikan Buku</a>
                        </div>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Search & Filter -->
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <form class="d-flex" role="search">
                                    <input class="form-control w-100" type="search" placeholder="Cari buku..." aria-label="Search">
                                </form>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-lg-end">
                                <select class="form-select w-100">
                                    <option selected>Kategori</option>
                                    <option value="1">Fiksi</option>
                                    <option value="2">Non-Fiksi</option>
                                    <option value="3">Teknologi</option>
                                    <option value="4">Pendidikan</option>
                                </select>
                            </div>
                        </div>

                        <!-- Book Cards -->
                        <div class="row mb-5">
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <img class="card-img-top" src="https://www.malasngoding.com/wp-content/uploads/2020/02/Ebook-Panduan-Lengkap-Laravel-Untuk-Pemula-Dari-Dasar-Sampai-Membuat-Aplikasi-Keuangan.png" alt="Laravel Ebook" />
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <a href="#" class="btn btn-outline-primary w-100">Lihat</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="#" class="btn btn-outline-primary w-100">Pinjam</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <img class="card-img-top" src="https://elexmedia.s3.amazonaws.com/product/9786020486222.jpg" alt="Elexmedia Book" />
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <a href="#" class="btn btn-outline-primary w-100">Lihat</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="#" class="btn btn-outline-primary w-100">Pinjam</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <img class="card-img-top" src="https://penerbit.stekom.ac.id/public/journals/12/article_284_cover_en_US.jpg" alt="Stekom Book" />
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <a href="#" class="btn btn-outline-primary w-100">Lihat</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="#" class="btn btn-outline-primary w-100">Pinjam</a>
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

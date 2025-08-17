<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Login | SMPN 1</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/backend/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/backend/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/backend/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/backend/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('/backend/assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('/backend/assets/vendor/js/helpers.js') }}"></script>

    <!-- Theme config -->
    <script src="{{ asset('/backend/assets/js/config.js') }}"></script>
</head>

<style>
    body {
        position: relative;
        background: url("https://images.unsplash.com/photo-1457369804613-52c61a468e7d?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D") no-repeat center center fixed;
        background-size: cover;
    }

    /* Overlay gelap */
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        /* 0.4 = 40% gelap */
        z-index: -1;
    }
</style>

<body>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Login Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="app-brand justify-content-center mb-3">
                            <a href="index.html" class="app-brand-link gap-2">
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0Ik1cLokG8YpA1Au6Y49On1y4hWAPRRsJCw&s"
                                        alt="Logo Perpustakaan" width="70" height="70"
                                        style="object-fit: contain;">
                                </div>
                            </a>
                        </div>


                        <div class="app-brand justify-content-center text-center">
                            <a href="/login" class="app-brand-link" style="text-decoration: none;">
                                <span class="app-brand-text demo text-body fw-bolder"
                                    style="font-size: 24px; color: #696cff; text-transform: uppercase;">
                                    SMP N 1 KUBUNG
                                </span>
                            </a>
                        </div>

                        <h5 class="mb-2">
                            Selamat Datang di Sistem Informasi Perpustakaan SMP N 1 Kubung!
                            📚
                        </h5>
                        <p class="mb-4">
                            Silakan gunakan sistem ini untuk melakukan pengelolaan data buku dan
                            pustakawan secara mudah dan efisien.
                        </p>

                        <form action="{{ route('login') }}" method="POST" class="mb-3">
                            @csrf
                            <!-- Username Field -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    placeholder="Enter your username" value="{{ old('username') }}" autofocus />
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3 form-password-toggle">
                                <label for="password" class="form-label d-flex justify-content-between">
                                    <span>Password</span>
                                </label>

                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder=""
                                        aria-describedby="toggle-password" />
                                    <span class="input-group-text cursor-pointer" id="toggle-password">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary d-grid w-100">
                                    Sign in
                                </button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Sudah punya akun?</span>
                            <a href="/register">
                                <span>Masuk di sini</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Login Card -->
            </div>
        </div>
    </div>
    <!-- / Content -->

    <!-- Core JS -->
    <script src="{{ asset('/backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js/menu.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('/backend/assets/js/main.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    @include('sweetalert::alert')
</body>

</html>

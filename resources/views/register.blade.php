<!DOCTYPE html>
<html lang="id" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Registrasi</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

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

    .card {

        border-radius: 10px;

    }
</style>


<body>
    <div class="container-xxl d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card" style="max-width: 700px; width: 100%; margin: 20px 0;">
            <!-- Ubah ukuran di sini -->
            <div class="card-body">
                <div class="app-brand justify-content-center mb-3">
                    <a href="index.html" class="app-brand-link gap-2">
                        <div style="display: flex; justify-content: center; align-items: center;">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0Ik1cLokG8YpA1Au6Y49On1y4hWAPRRsJCw&s"
                                alt="Logo Perpustakaan" width="70" height="70" style="object-fit: contain;">
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


                {{-- Tampilkan pesan error jika ada --}}
                @if ($errors->any())
                    <div class="alert alert-danger mt-3" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <br>
                <p class="mb-4 text-center">
                    Selamat datang di halaman pendaftaran Sistem Informasi Perpustakaan SMP N 1 Kubung! 📚<br>
                    Silakan isi formulir berikut untuk membuat akun dan mulai mengakses layanan perpustakaan dengan
                    mudah dan cepat.
                </p>

                <form action="{{ route('register-store') }}" method="POST" class="mb-3">
                    @csrf
                    <div class="row">
                        <!-- Nama Lengkap -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Masukkan Nama" value="{{ old('name') }}" />
                            </div>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contact" class="form-label">Nomor Telepon / HP</label>
                                <input type="text" class="form-control" id="contact" name="contact"
                                    placeholder="+62" value="{{ old('contact') }}" />
                            </div>
                        </div>

                        <!-- NIS / NISN -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nisn" class="form-label">Nomor Induk Siswa (NIS) / NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn"
                                    placeholder="Masukkan Nomor Induk" value="{{ old('nisn') }}" />
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="@gmail.com" value="{{ old('email') }}" />
                            </div>
                        </div>

                        <!-- Kelas -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-control" id="kelas" name="kelas">
                                    <option value="">--Pilih--</option>
                                    <option value="VII" {{ old('kelas') == 'VII' ? 'selected' : '' }}>VII</option>
                                    <option value="VIII" {{ old('kelas') == 'VIII' ? 'selected' : '' }}>VIII
                                    </option>
                                    <option value="IX" {{ old('kelas') == 'IX' ? 'selected' : '' }}>IX</option>
                                </select>
                            </div>
                        </div>

                        <!-- Username -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukkan Username" value="{{ old('username') }}" />
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="">Pilih</option>
                                    <option value="Laki-laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-lg-6">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="Masukkan Password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                        </div>
                        <!-- Konfirmasi Password -->
                        <div class="col-lg-6">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password_confirmation" class="form-control"
                                        name="password_confirmation" placeholder="Masukkan Ulang Password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                        </div>




                        <input type="hidden" name="role_id" value="2">

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary d-grid w-100">Daftar</button>
                        </div>
                    </div>
                </form>

                <p class="text-center">
                    <span>Sudah punya akun?</span>
                    <a href="/login"><span>Masuk di sini</span></a>
                </p>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>


</html>

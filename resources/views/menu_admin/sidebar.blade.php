<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand justify-content-center mb-3 mt-3">
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
                style="font-size: 18px; color: #000000; text-transform: uppercase;">
                SMPN 1 KUBUNG
            </span>
        </a>
    </div>
    <!-- Digital Clock -->
    <div id="digital-clock" class="text-center my-2"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        @if (auth()->user()->role_id == 1)
            <!-- Dashboard -->


            {{-- BUKU --}}
            <li class="menu-item {{ Request::is('buku*', 'category*') ? 'open active' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-detail"></i>
                    <div data-i18n="Data Buku">Data Buku</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ Request::is('category') ? 'active' : '' }}">
                        <a href="{{ route('category.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-category"></i>
                            <div data-i18n="Kategori">Kategori</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('buku*') ? 'active' : '' }}">
                        <a href="{{ route('buku.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book"></i>
                            <div data-i18n="Buku">Buku</div>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- PUSTAKAWAN --}}
            <li class="menu-item {{ Request::is('pustakawan*') ? 'active' : '' }}">
                <a href="/pustakawan" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-id-card"></i>
                    <div data-i18n="Data Pustakawan">Data Pustakawan</div>
                </a>
            </li>

            {{-- ANGGOTA --}}
            <li class="menu-item {{ Request::is('anggota*') ? 'active' : '' }}">
                <a href="/anggota" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-group"></i>
                    <div data-i18n="Data Anggota">Data Anggota</div>
                </a>
            </li>

            {{-- E-BOOK --}}
            {{-- <li class="menu-item {{ Request::is('ebook*') ? 'active' : '' }}">
                <a href="/ebook" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book-open"></i>
                    <div data-i18n="Data E-Book">Data E-Book</div>
                </a>
            </li> --}}
        @endif

        {{-- PEMINJAMAN --}}
        @if (auth()->user()->role_id == 2)
            </li>

            <li class="menu-item {{ Request::is('peminjaman*') ? 'active' : '' }}">
                <a href="/peminjaman" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book-alt"></i>
                    <div data-i18n="Peminjaman">Status Peminjaman</div>
                </a>
            </li>
        @endif


        {{-- User --}}
        @if (auth()->check() && auth()->user()->role_id != 2)
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Hak Akses</span></li>
            {{-- USER --}}
            <li class="menu-item {{ Request::is('user*') ? 'active' : '' }}">
                <a href="/user" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user-circle"></i>
                    <div data-i18n="Analytics">User</div>
                </a>
            </li>
        @endif

    </ul>
</aside>

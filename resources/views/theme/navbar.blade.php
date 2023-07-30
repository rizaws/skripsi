<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ route('dashboard') }}"><img style="width: 100px; height: 100px;"
                            src="https://ppdb.mtsn2kotabjm.sch.id/img/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                        height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                opacity=".3"></path>
                            <g transform="translate(-210 -1)">
                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                        <label class="form-check-label"></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                        </path>
                    </svg>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item  {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard </span>
                    </a>
                </li>

                @if (Auth::user()->level == 'admin')
                    @php
                        $req = ['data_siswa', 'data_kelas', 'data_mapel', 'data_guru', 'ekskul', 'add_siswa'];
                    @endphp
                    <li class="sidebar-item  has-sub {{ Request::is($req) ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="fas fa-database"></i>
                            <span>Data Master</span>
                        </a>
                        <ul class="submenu {{ Request::is($req) ? 'active' : '' }}">
                            <li
                                class="submenu-item {{ Request::is('data_siswa') || Request::is('add_siswa') ? 'active' : '' }}">
                                <a href="{{ route('data_siswa') }}">Data Siswa</a>
                            </li>
                            <li class="submenu-item {{ Request::is('data_guru') ? 'active' : '' }}">
                                <a href="{{ route('data_guru') }}">Data Guru</a>
                            </li>
                            <li class="submenu-item {{ Request::is('data_kelas') ? 'active' : '' }}">
                                <a href="{{ route('data_kelas') }}">Data Kelas</a>
                            </li>
                            <li class="submenu-item {{ Request::is('data_mapel') ? 'active' : '' }}">
                                <a href="{{ route('data_mapel') }}">Data Mapel</a>
                            </li>
                            <li class="submenu-item {{ Request::is('ekskul') ? 'active' : '' }}">
                                <a href="{{ route('ekskul') }}">Data Ekstrakurikuler</a>
                            </li>
                        </ul>
                    </li>
                @else
                @endif



                @php
                    $reqK = ['absensi_siswa', 'jadwal_mapel', 'nilai_rapor', 'anggota_ekskul', 'prestasi_siswa', 'alumni', 'absensi_siswaMapel', 'absensi_guru'];
                @endphp

                <li class="sidebar-item  has-sub {{ Request::is($reqK) ? 'active' : '' }}">
                    <a href="lap_masuk" class='sidebar-link'>
                        <i class="fas fa-book"></i>
                        <span>Data Kegiatan Siswa</span>
                    </a>
                    @if (Auth::user()->level == 'admin')
                        <ul class="submenu {{ Request::is($reqK) ? 'active' : '' }}">
                            <li class="submenu-item {{ Request::is('anggota_ekskul') ? 'active' : '' }}">
                                <a href="{{ route('anggota_ekskul') }}">Anggota Ekskul</a>
                            </li>
                            <li class="submenu-item {{ Request::is('prestasi_siswa') ? 'active' : '' }}">
                                <a href="{{ route('prestasi_siswa') }}">Prestasi Siswa</a>
                            </li>
                            <li class="submenu-item {{ Request::is('absensi_guru') ? 'active' : '' }}">
                                <a href="{{ route('absensi_guru') }}">Absensi Guru</a>
                            </li>
                            <li class="submenu-item {{ Request::is('absensi_siswa') ? 'active' : '' }}">
                                <a href="{{ route('absensi_siswa') }}">Absensi</a>
                            </li>
                        </ul>
                    @else
                    @endif
                    @if (Auth::user()->level == 'guru')
                        <ul class="submenu {{ Request::is($reqK) ? 'active' : '' }}">
                            <li class="submenu-item {{ Request::is('absensi_siswa') ? 'active' : '' }}">
                                <a href="{{ route('absensi_siswa') }}">Absensi</a>
                            </li>
                            <li class="submenu-item {{ Request::is('nilai_rapor') ? 'active' : '' }}">
                                <a href="{{ route('nilai_rapor') }}">Nilai Rapor</a>
                            </li>
                        </ul>
                    @else
                    @endif
                    @php
                        $reqwali = ['absensi_siswa', 'nilai_rapor', 'absensi_siswaMapel'];
                    @endphp
                    @if (Auth::user()->level == 'wali')
                        <ul class="submenu {{ Request::is($reqwali) ? 'active' : '' }}">
                            <li class="submenu-item {{ Request::is('absensi_siswa') ? 'active' : '' }}">
                                <a href="{{ route('absensi_siswa') }}">Absensi</a>
                            </li>
                            <li class="submenu-item {{ Request::is('absensi_siswaMapel') ? 'active' : '' }}">
                                <a href="{{ route('absensi_siswaMapel') }}">Absensi per Mapel</a>
                            </li>
                            <li class="submenu-item {{ Request::is('nilai_rapor') ? 'active' : '' }}">
                                <a href="{{ route('nilai_rapor') }}">Nilai Rapor</a>
                            </li>

                        </ul>
                    @else
                    @endif
                    @if (Auth::user()->level == 'siswa')
                        <ul class="submenu {{ Request::is($reqK) ? 'active' : '' }}">
                            <li class="submenu-item {{ Request::is('prestasi_siswa') ? 'active' : '' }}">
                                <a href="{{ route('prestasi_siswa') }}">Prestasi Siswa</a>
                            </li>
                            <li class="submenu-item {{ Request::is('nilai_rapor') ? 'active' : '' }}">
                                <a href="{{ route('nilai_rapor') }}">Nilai Rapor</a>
                            </li>
                        </ul>
                    @else
                    @endif

                </li>

                @php
                    $reqL = ['LaporanSiswa', 'LaporanGuru', 'LaporanAbsen', 'LaporanJadwalPelajaran', 'LaporanNilaiRapor', 'LaporanAnggotaEskul', 'LaporanPrestasiSiswa', 'LaporanRaporSiswa'];
                @endphp
                <li class="sidebar-item  has-sub {{ Request::is($reqL) ? 'active' : '' }}">
                    <a href="lap_masuk" class='sidebar-link'>
                        <i class="fas fa-print"></i>
                        <span>Laporan</span>
                    </a>
                    @if (Auth::user()->level == 'admin')
                        <ul class="submenu {{ Request::is($reqL) ? 'active' : '' }}">
                            <li class="submenu-item {{ Request::is('LaporanSiswa') ? 'active' : '' }}">
                                <a href="{{ route('LaporanSiswa') }}">Siswa</a>
                            </li>
                            <li class="submenu-item {{ Request::is('LaporanGuru') ? 'active' : '' }}">
                                <a href="{{ route('LaporanGuru') }}">Guru</a>
                            </li>
                            <li class="submenu-item {{ Request::is('LaporanAbsen') ? 'active' : '' }}">
                                <a href="{{ route('LaporanAbsen') }}">Absensi</a>
                            </li>
                            <li class="submenu-item {{ Request::is('LaporanJadwalPelajaran') ? 'active' : '' }}">
                                <a href="{{ route('LaporanJadwalPelajaran') }}">Jadwal Pelajaran</a>
                            </li>
                            <li class="submenu-item {{ Request::is('LaporanNilaiRapor') ? 'active' : '' }}">
                                <a href="{{ route('LaporanNilaiRapor') }}">Nilai</a>
                            </li>
                            <li class="submenu-item {{ Request::is('LaporanRaporSiswa') ? 'active' : '' }}">
                                <a href="{{ route('LaporanRaporSiswa') }}">Rapor</a>
                            </li>
                            <li class="submenu-item {{ Request::is('LaporanAnggotaEskul') ? 'active' : '' }}">
                                <a href="{{ route('LaporanAnggotaEskul') }}">Ekstrakurikuler</a>
                            </li>
                            <li class="submenu-item {{ Request::is('LaporanPrestasiSiswa') ? 'active' : '' }}">
                                <a href="{{ route('LaporanPrestasiSiswa') }}">Prestasi</a>
                            </li>

                        </ul>
                    @else
                    @endif

                    @if (Auth::user()->level == 'guru')
                        <ul class="submenu {{ Request::is($reqL) ? 'active' : '' }}">
                            <li class="submenu-item {{ Request::is('LaporanGuru') ? 'active' : '' }}">
                                <a href="{{ route('LaporanGuru') }}">Guru</a>
                            </li>
                            <li class="submenu-item {{ Request::is('LaporanAbsen') ? 'active' : '' }}">
                                <a href="{{ route('LaporanAbsen') }}">Absensi</a>
                            </li>
                            <li class="submenu-item {{ Request::is('LaporanNilaiRapor') ? 'active' : '' }}">
                                <a href="{{ route('LaporanNilaiRapor') }}">Nilai</a>
                            </li>
                        </ul>
                    @else
                    @endif
                    @if (Auth::user()->level == 'alumni')
                        <ul class="submenu {{ Request::is($reqL) ? 'active' : '' }}">
                            <li class="submenu-item {{ Request::is('LaporanAnggotaEskul') ? 'active' : '' }}">
                                <a href="{{ route('LaporanAnggotaEskul') }}">Ekstrakurikuler</a>
                            </li>
                            <li class="submenu-item {{ Request::is('LaporanPrestasiSiswa') ? 'active' : '' }}">
                                <a href="{{ route('LaporanPrestasiSiswa') }}">Prestasi</a>
                            </li>
                            <li class="submenu-item {{ Request::is('LaporanSiswa') ? 'active' : '' }}">
                                <a href="{{ route('LaporanSiswa') }}">Siswa</a>
                            </li>
                        </ul>
                    @else
                    @endif
                    @if (Auth::user()->level == 'wali')
                        <ul class="submenu {{ Request::is($reqL) ? 'active' : '' }}">
                            <li class="submenu-item {{ Request::is('LaporanSiswa') ? 'active' : '' }}">
                                <a href="{{ route('LaporanSiswa') }}">Siswa</a>
                            </li>
                            <li class="submenu-item {{ Request::is('LaporanAbsen') ? 'active' : '' }}">
                                <a href="{{ route('LaporanAbsen') }}">Absensi</a>
                            </li>
                            <li class="submenu-item {{ Request::is('LaporanRaporSiswa') ? 'active' : '' }}">
                                <a href="{{ route('LaporanRaporSiswa') }}">Rapor</a>
                            </li>
                        </ul>
                    @else
                    @endif
                </li>

                @if (Auth::user()->level == 'admin')
                    <li class="sidebar-item  {{ Request::is('user') ? 'active' : '' }}">
                        <a href="{{ route('user') }}" class='sidebar-link'>
                            <i class="bi bi-file-person"></i>
                            <span>Data User</span>
                        </a>
                    </li>
                @else
                @endif
            </ul>
        </div>
    </div>
    <header>
        <nav class="navbar navbar-expand navbar-light navbar-top">
            <div class="container-fluid">
                <a href="#" class="burger-btn d-block">
                    <i class="bi bi-justify fs-3"></i>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-lg-0">
                    </ul>
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-menu d-flex">
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-gray-600">{{ ucwords(Auth::user()->name) }}</h6>
                                    <p class="mb-0 text-sm text-gray-600">{{ ucwords(Auth::user()->level) }}</p>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                            style="min-width: 11rem">
                            <li>
                                <h6 class="dropdown-header">Hello, {{ ucwords(Auth::user()->name) }}</h6>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i
                                        class="icon-mid bi bi-box-arrow-left me-2"></i>
                                    Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>

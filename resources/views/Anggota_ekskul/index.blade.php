@extends('theme.app')
@section('content')
    <div id="main">

        <div class="page-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <select name="id_ekskul" id="" class="choices form-select floar-end">
                                            <option value="">Semua Ekskul</option>
                                            @foreach ($ekskul as $e)
                                                <option
                                                    value="{{ $e->id_ekskul }}"{{ $id_ekskul == $e->id_ekskul ? 'selected' : '' }}>
                                                    {{ $e->nm_ekskul }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <button type="submit" class="btn btn-primary ">Filter</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>{{ $title }}: {{ $nm_ekskul }}</h6>
                                </div>
                                <div class="col-lg-6">
                                    <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal"
                                        data-bs-target="#tambah"><i class="fas fa-plus"></i> Tambah
                                        Anggota Ekskul</a>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Ekskul</th>
                                        <th>Kelas</th>
                                        <th>Tempat,Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anggota as $no => $a)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $a->nama }}</td>
                                            <td>{{ $a->nm_ekskul }}</td>
                                            <td>{{ $a->kelas }}{{ $a->huruf }}</td>
                                            <td>{{ $a->tempat_lahir }}, {{ tanggal($a->tgl_lahir) }}</td>
                                            <td>{{ $a->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning edit" data-bs-toggle="modal"
                                                    data-bs-target="#edit"
                                                    id_anggota_ekskul="{{ $a->id_anggota_ekskul }}"><i
                                                        class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('delete_anggota_ekskul', ['id_anggota_ekskul' => $a->id_anggota_ekskul]) }}"
                                                    class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <form action="{{ route('tambah_anggota_ekskul') }}" method="post">
            @csrf
            <div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Tambah Anggota</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="">Pilih Kelas</label>
                                    <select name="" id="" class="choices form-select get_siswa">
                                        <option value="">-Pilih Kelas-</option>
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->id_kelas }}">{{ $k->kelas }}{{ $k->huruf }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Pilih Siswa</label>
                                    <select name="id_siswa" id="" class="form-control load_siswa">

                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Ekstrakurikuler</label>
                                    <select name="id_ekskul" id="" class="choices form-select">
                                        <option value="">-Pilih Ekskul-</option>
                                        @foreach ($ekskul as $e)
                                            <option value="{{ $e->id_ekskul }}">{{ $e->nm_ekskul }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{ route('edit_anggota_ekskul') }}" method="post">
            @csrf
            <div class="modal fade text-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Edit Anggota Ekskul</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="anggota_ekskul"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>



        <form method="get" action="{{ route('delete_siswa') }}">
            <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <h5 class="text-danger ms-4 mt-4"><i class="fas fa-trash"></i> Hapus Data</h5>
                                <p class=" ms-4 mt-4">Apa anda yakin ingin menghapus ?</p>
                                <input type="hidden" class="id_siswa" name="id_siswa">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        {{-- <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; Pengadilan Negeri Banjarmasin</p>
            </div>
            <div class="float-end">
                <p> <span class="text-danger"><i class=" "></i></span> <a
                        href="https://saugi.me">PN Banjarmasin Kelas 1A</a></p>
            </div>
        </div>
    </footer> --}}
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('change', '.get_siswa', function() {
                var id_kelas = $(this).val();
                $.ajax({
                    type: "get",
                    url: "route('get_siswa')",
                    data: {
                        'id_kelas': id_kelas
                    },
                    success: function(data) {
                        $('.load_siswa').html(data)
                    }
                });
            });

            $(document).on('click', '.edit', function() {
                var id_anggota_ekskul = $(this).attr('id_anggota_ekskul');

                $.ajax({
                    type: "get",
                    url: "{{ route('get_edit_anggota_ekskul') }}",
                    data: {
                        'id_anggota_ekskul': id_anggota_ekskul
                    },
                    success: function(data) {
                        $('#anggota_ekskul').html(data);
                    }
                });
            });
        });
    </script>
@endsection

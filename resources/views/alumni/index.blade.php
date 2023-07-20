@extends('theme.app')
@section('content')
    <div id="main">

        <div class="page-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>{{ $title }}: {{ $nm_kelas }}</h6>
                                </div>
                                <div class="col-lg-6">

                                </div>
                            </div>


                        </div>
                        <div class="card-body">

                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Tempat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No Telp</th>
                                        <th>Melanjutkan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumni as $no => $s)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $s->nisn }}</td>
                                            <td>{{ $s->nama }}</td>
                                            <td>{{ $s->tempat_lahir }}</td>
                                            <td>{{ date('d-m-Y', strtotime($s->tgl_lahir)) }}</td>
                                            <td>{{ $s->no_telp }}</td>
                                            <td>{{ $s->melanjutkan }}</td>
                                            <td>

                                                <a href="#" data-bs-toggle="modal" data-bs-target="#lulus"
                                                    class="btn btn-sm btn-warning lulus" id_siswa="{{ $s->id_siswa }}"><i
                                                        class="fas fa-edit"></i></a>

                                                <a href="#" data-bs-toggle="modal" data-bs-target="#detail"
                                                    class="btn btn-sm btn-info detail" id_siswa="{{ $s->id_siswa }}"><i
                                                        class="fas fa-eye"></i></a>
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
        <div class="modal fade text-left" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">Detail Siswa</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div id="get_detail"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('lulus') }}" method="post">
            @csrf
            <div class="modal fade text-left" id="lulus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Siswa Lulus</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div id="siswa_lulus"></div>
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

        <form method="get" action="{{ route('delete_siswa') }}">
            <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <h5 class="text-danger ms-4 mt-4"><i class="fas fa-trash"></i> Hapus Data</h5>
                                <p class=" ms-4 mt-4">Apa anda yakin ingin menghapus ?</p>
                                <input type="hidden" class="id_siswa" name="id_siswa">
                                <input type="hidden" name="id_kelas" value="{{ $id_kelas }}">
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
            $(document).on('click', '.detail', function() {
                var id_siswa = $(this).attr('id_siswa');

                $.ajax({
                    type: "get",
                    url: "/detail_siswa?id_siswa=" + id_siswa,
                    success: function(data) {
                        $('#get_detail').html(data);
                    }
                });
            });
            $(document).on('click', '.lulus', function() {
                var id_siswa = $(this).attr('id_siswa');

                $.ajax({
                    type: "get",
                    url: "/siswa_lulus?id_siswa=" + id_siswa,
                    success: function(data) {
                        $('#siswa_lulus').html(data);
                    }
                });
            });
            $(document).on('click', '.hapus', function() {
                var id_siswa = $(this).attr('id_siswa');

                $('.id_siswa').val(id_siswa);
            });
        });
    </script>
@endsection

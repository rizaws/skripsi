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
                                    <h6>{{ $title }}</h6>
                                </div>
                                <div class="col-lg-6">
                                    <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal"
                                        data-bs-target="#tambah"><i class="fas fa-plus"></i> Tambah
                                        Kelas</a>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kelas</th>
                                        <th>Wali Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $no => $s)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $s->kelas }}{{ $s->huruf }}</td>
                                            <td>{{ $s->nm_guru }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning edit" data-bs-toggle="modal"
                                                    data-bs-target="#edit" id_kelas="{{ $s->id_kelas }}"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger hapus" data-bs-toggle="modal"
                                                    data-bs-target="#hapus" id_kelas="{{ $s->id_kelas }}"><i
                                                        class="fas fa-trash-alt"></i></a>
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


        <form action="{{ route('tambah_kelas') }}" method="post">
            @csrf
            <div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Tambah Kelas</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="">Kelas</label>
                                    <input type="number" min="7" max="9" class="form-control" name="kelas">
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Huruf</label>
                                    <input type="text" class="form-control" name="huruf">
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Wali Kelas</label>
                                    <select name="id_guru" id="" class="choices form-select">
                                        <option value="">-Pilih Wali Kelas-</option>
                                        @foreach ($guru as $g)
                                            <option value="{{ $g->id_guru }}">{{ $g->nm_guru }}</option>
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

        <form action="{{ route('edit_kelas') }}" method="post">
            @csrf
            <div class="modal fade text-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Edit Kelas</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="kelas"></div>
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


        <form method="get" action="{{ route('delete_kelas') }}">
            <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <h5 class="text-danger ms-4 mt-4"><i class="fas fa-trash"></i> Hapus Data</h5>
                                <p class=" ms-4 mt-4">Apa anda yakin ingin menghapus ?</p>
                                <input type="hidden" class="id_kelas" name="id_kelas">
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
                <p> <span class="text-danger"><i class=" "></i></span> <a href="https://saugi.me">PN Banjarmasin Kelas
                        1A</a></p>
            </div>
        </div>
    </footer> --}}
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit', function() {
                var id_kelas = $(this).attr('id_kelas');

                $.ajax({
                    type: "get",
                    url: "/get_edit_kelas?id_kelas=" + id_kelas,
                    success: function(data) {
                        $('#kelas').html(data);
                    }
                });
            });
            $(document).on('click', '.hapus', function() {
                var id_kelas = $(this).attr('id_kelas');

                $('.id_kelas').val(id_kelas);
            });
        });
    </script>
@endsection

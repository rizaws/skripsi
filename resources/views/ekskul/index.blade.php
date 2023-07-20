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
                                        Ekskul</a>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ekstrakurikuler</th>
                                        <th>Pembina</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ekskul as $no => $e)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $e->nm_ekskul }}</td>
                                            <td>{{ $e->nm_pembina }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning edit" data-bs-toggle="modal"
                                                    data-bs-target="#edit" id_ekskul="{{ $e->id_ekskul }}"><i
                                                        class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger hapus" data-bs-toggle="modal"
                                                    data-bs-target="#hapus" id_ekskul="{{ $e->id_ekskul }}"><i
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


        <form action="{{ route('tambah_ekskul') }}" method="post">
            @csrf
            <div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Tambah Ekstrakulier</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="">Nama Ekstrakulier</label>
                                    <input type="text" class="form-control" name="nm_ekskul">
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Nama Pembina</label>
                                    <input type="text" class="form-control" name="nm_pembina">
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

        <form action="{{ route('edit_ekskul') }}" method="post">
            @csrf
            <div class="modal fade text-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Edit Ekstrakurikuler</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="ekskul"></div>
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


        <form method="get" action="{{ route('delete_ekskul') }}">
            <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <h5 class="text-danger ms-4 mt-4"><i class="fas fa-trash"></i> Hapus Data</h5>
                                <p class=" ms-4 mt-4">Apa anda yakin ingin menghapus ?</p>
                                <input type="hidden" class="id_ekskul" name="id_ekskul">
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
                var id_ekskul = $(this).attr('id_ekskul');

                $.ajax({
                    type: "get",
                    url: "/get_edit_ekskul?id_ekskul=" + id_ekskul,
                    success: function(data) {
                        $('#ekskul').html(data);
                    }
                });
            });
            $(document).on('click', '.hapus', function() {
                var id_ekskul = $(this).attr('id_ekskul');

                $('.id_ekskul').val(id_ekskul);
            });
        });
    </script>
@endsection

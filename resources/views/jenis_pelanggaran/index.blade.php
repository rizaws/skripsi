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
                                        Jenis Pelanggaran</a>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Deskripsi Pelanggaran</th>
                                        <th>Point</th>
                                        <th>Sanksi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis_pelanggaran as $no => $s)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $s->deskripsi }}</td>
                                            <td>{{ $s->point }}</td>
                                            <td>{{ $s->hukuman }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning edit" data-bs-toggle="modal"
                                                    data-bs-target="#edit"
                                                    id_sub_pelanggaran="{{ $s->id_sub_pelanggaran }}"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger hapus" data-bs-toggle="modal"
                                                    data-bs-target="#hapus"
                                                    id_sub_pelanggaran="{{ $s->id_sub_pelanggaran }}"><i
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


        <form action="{{ route('tambah_jenis_pelanggaran') }}" method="post">
            @csrf
            <div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Tambah Jenis Pelanggaran</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi">
                                </div>
                                <div class="col-lg-2">
                                    <label for="">Point</label>
                                    <input type="text" class="form-control" name="point">
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Sanksi</label>
                                    <input type="text" class="form-control" name="hukuman">
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

        <form action="{{ route('edit_jenis_pelanggaran') }}" method="post">
            @csrf
            <div class="modal fade text-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Edit Jenis Pelanggaran</h5>
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


        <form method="get" action="{{ route('delete_jenis_pelanggaran') }}">
            <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <h5 class="text-danger ms-4 mt-4"><i class="fas fa-trash"></i> Hapus Data</h5>
                                <p class=" ms-4 mt-4">Apa anda yakin ingin menghapus ?</p>
                                <input type="hidden" class="id_sub_pelanggaran" name="id_sub_pelanggaran">
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
                var id_sub_pelanggaran = $(this).attr('id_sub_pelanggaran');

                $.ajax({
                    type: "get",
                    url: "{{ route('get_edit_jenis_pelanggaran') }}",
                    data: {
                        'id_sub_pelanggaran': id_sub_pelanggaran
                    },
                    success: function(data) {
                        $('#kelas').html(data);
                    }
                });
            });
            $(document).on('click', '.hapus', function() {
                var id_sub_pelanggaran = $(this).attr('id_sub_pelanggaran');

                $('.id_sub_pelanggaran').val(id_sub_pelanggaran);
            });
        });
    </script>
@endsection

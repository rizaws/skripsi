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
                                        Pelanggaran</a>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Jenis Pelanggaran</th>
                                        <th>Ket</th>
                                        <th>Point</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelanggaran as $no => $p)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ date('d-m-Y', strtotime($p->tanggal)) }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->kelas }}{{ $p->huruf }}</td>
                                            <td>{{ $p->deskripsi }}</td>
                                            <td>{{ $p->ket }}</td>
                                            <td>{{ $p->point }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning edit" data-bs-toggle="modal"
                                                    data-bs-target="#edit" id_pelanggaran="{{ $p->id_pelanggaran }}"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger hapus" data-bs-toggle="modal"
                                                    data-bs-target="#hapus" id_pelanggaran="{{ $p->id_pelanggaran }}"><i
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


        <form action="{{ route('tambah_pelanggaran') }}" method="post">
            @csrf
            <div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Tambah Pelanggaran</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tgl" class="form-control" id="">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Pilih Kelas</label>
                                    <select name="" id="" class="form-control get_siswa">
                                        <option value="">-Pilih Kelas-</option>
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->id_kelas }}">{{ $k->kelas }}{{ $k->huruf }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Pilih Siswa</label>
                                    <select name="id_siswa" id="" class="form-control load_siswa">

                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Pilih Jenis Pelanggaran</label>
                                    <select name="id_jenis_pelanggaran" id="" class="form-control ">
                                        <option value="">-Pilih Jenis Pelanggaran-</option>
                                        @foreach ($jenis_pelanggaran as $k)
                                            <option value="{{ $k->id_sub_pelanggaran }}">
                                                {{ $k->deskripsi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <label for="">Keterangan</label>
                                    <textarea name="ket" class="form-control" id="" cols="20" rows="5"></textarea>
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

        <form action="{{ route('edit_pelanggaran') }}" method="post">
            @csrf
            <div class="modal fade text-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Edit Pelanggaran</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
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


        <form method="get" action="{{ route('delete_pelanggaran') }}">
            <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <h5 class="text-danger ms-4 mt-4"><i class="fas fa-trash"></i> Hapus Data</h5>
                                <p class=" ms-4 mt-4">Apa anda yakin ingin menghapus ?</p>
                                <input type="hidden" class="id_pelanggaran" name="id_pelanggaran">
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
            $(document).on('change', '.get_siswa', function() {
                var id_kelas = $(this).val();
                $.ajax({
                    type: "get",
                    url: "{{ route('get_siswa') }}",
                    data: {
                        'id_kelas': id_kelas
                    },
                    success: function(data) {
                        $('.load_siswa').html(data)
                    }
                });
            });
            $(document).on('click', '.edit', function() {
                var id_pelanggaran = $(this).attr('id_pelanggaran');

                $.ajax({
                    type: "get",
                    url: "{{ route('get_edit_pelanggaran') }}",
                    data: {
                        'id_pelanggaran': id_pelanggaran
                    },
                    success: function(data) {
                        $('#kelas').html(data);
                    }
                });
            });
            $(document).on('click', '.hapus', function() {
                var id_pelanggaran = $(this).attr('id_pelanggaran');

                $('.id_pelanggaran').val(id_pelanggaran);
            });
        });
    </script>
@endsection

@extends('theme.app')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <select name="id_mapel" id="" class="choices form-select floar-end">
                                            <option value="">Semua Data</option>
                                            @foreach ($mapel as $m)
                                                <option
                                                    value="{{ $m->id_mapel }}"{{ $id_mapel == $m->id_mapel ? 'selected' : '' }}>
                                                    {{ $m->nm_mapel }}
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
                                    <h6>{{ $title }}: {{ empty($nm_mapel->nm_mapel) ? 'ALL' : $nm_mapel->nm_mapel }}
                                    </h6>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('tambah_data_guru') }}" class="btn btn-primary float-end"><i
                                            class="fas fa-plus"></i> Tambah
                                        Guru
                                    </a>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Tempat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Posisi</th>
                                        <th>TTD</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guru as $no => $g)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $g->nip }}</td>
                                            <td>{{ $g->nm_guru }}</td>
                                            <td>{{ $g->tempat_lahir }}</td>
                                            <td>{{ tanggal($g->tgl_lahir) }}</td>
                                            <td>{{ $g->posisi }}</td>
                                            <td>
                                                <div class="visible-print text-center">
                                                    {!! QrCode::size(80)->generate(url('/assets/ttd/' . $g->image)) !!}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#detail"
                                                    class="btn btn-sm btn-info detail" id_guru="{{ $g->id_guru }}"><i
                                                        class="fas fa-eye"></i></a>
                                                <a href="{{ route('edit_guru', ['id_guru' => $g->id_guru]) }}"
                                                    class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger hapus" data-bs-toggle="modal"
                                                    data-bs-target="#hapus" id_guru="{{ $g->id_guru }}"><i
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

        <form method="get" action="{{ route('delete_guru') }}">
            <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <h5 class="text-danger ms-4 mt-4"><i class="fas fa-trash"></i> Hapus Data</h5>
                                <p class=" ms-4 mt-4">Apa anda yakin ingin menghapus ?</p>
                                <input type="hidden" class="id_guru" name="id_guru">
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
            $(document).on('click', '.hapus', function() {
                var id_guru = $(this).attr('id_guru');

                $('.id_guru').val(id_guru);
            });
        });
    </script>
@endsection

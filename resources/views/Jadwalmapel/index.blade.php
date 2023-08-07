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
                                        <select name="id_kelas" id="" class="choices form-select floar-end">
                                            <option value="">-Pilih Kelas-</option>
                                            @foreach ($kelas as $k)
                                                <option
                                                    value="{{ $k->id_kelas }}"{{ $id_kelas == $k->id_kelas ? 'selected' : '' }}>
                                                    {{ $k->kelas }}{{ $k->huruf }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <button type="submit" class="btn btn-primary ">Pilih Kelas</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                    @if ($id_kelas == '0')
                    @else
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6>{{ $title }}: {{ $nm_kelas }}</h6>
                                    </div>
                                </div>


                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table table-bordered" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="vertical-align: middle">Waktu</th>
                                                <th rowspan="2" style="vertical-align: middle">Jam Ke</th>
                                                @foreach ($hari as $h)
                                                    <th>{{ $h->nm_hari }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jam_belajar as $j)
                                                <tr>
                                                    @if ($j->ket == '3' || $j->ket == '6' || $j->ket == '9')
                                                        <td>
                                                            <dt>{{ $j->dari }} - {{ $j->sampai }}</dt>
                                                        </td>
                                                        <td>
                                                            <dt>{{ $j->ket }}</dt>
                                                        </td>
                                                    @else
                                                        <td>{{ $j->dari }} - {{ $j->sampai }}</td>
                                                        <td>{{ $j->ket }}</td>
                                                    @endif

                                                    @foreach ($hari as $h)
                                                        @php
                                                            $jadwal = DB::selectOne("SELECT a.id_jadwalmapel, b.nm_mapel , c.nm_guru FROM jadwalmapel as a 
                                                        left join mapel as b on b.id_mapel = a.id_mapel
                                                        left join guru as c on c.id_guru = a.id_guru
                                                        where a.id_jam = '$j->id_jam_belajar' and a.id_hari = '$h->id_hari' and a.id_kelas = '$id_kelas'
                                                        ");
                                                        @endphp
                                                        <td>
                                                            @if (empty($jadwal))
                                                                @if ($j->ket == '3' || $j->ket == '6' || $j->ket == '9')
                                                                    <dt>Istirahat</dt>
                                                                @else
                                                                    <a href="#" class="tambah_jadwal_pelajaran"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#tambah_jadwal"
                                                                        id_kelas="{{ $id_kelas }}"
                                                                        id_jam="{{ $j->id_jam_belajar }}"
                                                                        id_hari="{{ $h->id_hari }}">
                                                                        <i class="fas fa-plus"></i>
                                                                    </a>
                                                                @endif
                                                            @else
                                                                <a href="#" class="tambah_jadwal_pelajaran"
                                                                    data-bs-toggle="modal" data-bs-target="#tambah_jadwal"
                                                                    id_kelas="{{ $id_kelas }}"
                                                                    id_jam="{{ $j->id_jam_belajar }}"
                                                                    id_hari="{{ $h->id_hari }}"
                                                                    id_jadwal={{ $jadwal->id_jadwalmapel }}>
                                                                    {{ $jadwal->nm_mapel }} <br> ({{ $jadwal->nm_guru }})
                                                                </a>
                                                            @endif

                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <form action="{{ route('save_jadwal') }}" method="post">
            @csrf
            <div class="modal fade text-left" id="tambah_jadwal" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Tambah Jadwal Pelajaran</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="id_kelas" class="id_kelas">
                                <input type="hidden" name="id_jam" class="id_jam">
                                <input type="hidden" name="id_hari" class="id_hari">
                                <input type="hidden" name="id_jadwal" class="id_jadwal">
                                <div class="col-lg-6">
                                    <label for="">Mata Pelajaran</label>
                                    <select name="id_mapel" id="" class="form-control pilih_mapel">
                                        <option value="">Pilih Mata Pelajaran</option>
                                        @foreach ($mapel as $m)
                                            <option value="{{ $m->id_mapel }}">{{ $m->nm_mapel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Guru</label>
                                    <select name="id_guru" id="" class="form-control load_guru">

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

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.tambah_jadwal_pelajaran', function() {
                var id_kelas = $(this).attr('id_kelas');
                var id_jam = $(this).attr('id_jam');
                var id_hari = $(this).attr('id_hari');
                var id_jadwal = $(this).attr('id_jadwal');

                $('.id_kelas').val(id_kelas);
                $('.id_jam').val(id_jam);
                $('.id_hari').val(id_hari);
                $('.id_jadwal').val(id_jadwal);
            });
            $(document).on('change', '.pilih_mapel', function() {
                var id_mapel = $(this).val();
                $.ajax({
                    type: "get",
                    url: "{{ route('get_guru') }}",
                    data: {
                        'id_mapel': id_mapel
                    },
                    success: function(data) {
                        $('.load_guru').html(data)
                    }
                });
            });
        });
    </script>
@endsection

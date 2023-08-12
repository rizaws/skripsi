@extends('theme.app')
@section('content')
    <div id="main">
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="">Kelas</label>
                                        <select name="id_kelas" id="" class="choices form-select floar-end">
                                            <option value="">Pilih Kelas</option>
                                            @foreach ($kelas as $k)
                                                <option
                                                    value="{{ $k->id_kelas }}"{{ $id_kelas == $k->id_kelas ? 'selected' : '' }}>
                                                    {{ $k->kelas }}{{ $k->huruf }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Mapel</label>
                                        <select name="id_mapel" id=""class="form-control floar-end id_mapel">
                                            <option value="">Pilih Mapel</option>
                                            @foreach ($mapel as $m)
                                                <option
                                                    value="{{ $m->id_mapel }}"{{ $id_mapel == $m->id_mapel ? 'selected' : '' }}>
                                                    {{ $m->nm_mapel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Dari</label>
                                        <input type="date" name="tgl1" class="form-control tgl"
                                            value="{{ $tgl1 }}">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Sampai</label>
                                        <input type="date" name="tgl2" class="form-control tgl"
                                            value="{{ $tgl2 }}">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Aksi</label> <br>
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
                                    <h6>{{ $title }}: {{ $nm_kelas }} ({{ tanggal($tgl1) }} ~
                                        {{ tanggal($tgl2) }}) </h6>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('qr_absensi_mapel', ['id_kelas' => $id_kelas, 'id_mapel' => $id_mapel, 'tgl1' => $tgl1, 'tgl2' => $tgl2]) }}"
                                        class="btn btn-primary float-end"><i class="fas fa-print"></i> Print
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (empty($id_kelas))
                            @else
                                <table class="table table-bordered" id="table_tes" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Hadir</th>
                                            <th>Tidak Hadir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $no => $s)
                                            @php
                                                $M = DB::selectOne("SELECT count(a.ket) as M FROM absen_mapel as a where id_siswa ='$s->id_siswa' and a.id_mapel = '$id_mapel' and a.ket = 'M' and a.tgl between '$tgl1' and '$tgl2' ");
                                                $A = DB::selectOne("SELECT count(a.ket) as A FROM absen_mapel as a where id_siswa ='$s->id_siswa' and a.id_mapel = '$id_mapel'  and a.ket = 'A' and a.tgl between '$tgl1' and '$tgl2' ");
                                            @endphp
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $s->nama }} </td>
                                                <td>{{ $M->M }}</td>
                                                <td>{{ $A->A }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>


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

@extends('theme.app')
@section('content')
    <div id="main">
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-8 mb-4">
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="">Dari</label>
                                        <input type="date" name="tgl1" class="form-control tgl"
                                            value="{{ $tgl1 }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Sampai</label>
                                        <input type="date" name="tgl2" class="form-control tgl"
                                            value="{{ $tgl2 }}">
                                    </div>
                                    <div class="col-lg-3">
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
                                    <h6>{{ $title }}:({{ tanggal($tgl1) }} ~
                                        {{ tanggal($tgl2) }}) </h6>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('QrAbsenGuru', ['tgl1' => $tgl1, 'tgl2' => $tgl2]) }}"
                                        class="btn btn-primary float-end"><i class="fas fa-print"></i> Print
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered" id="table_tes" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Masuk</th>
                                        <th>Izin</th>
                                        <th>Sakit</th>
                                        <th>Alpa</th>
                                        <th>Terlambat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guru as $no => $s)
                                        @php
                                            $M = DB::selectOne("SELECT count(a.ket) as M FROM absen_guru as a where id_guru ='$s->id_guru' and a.ket = 'M' and a.tgl between '$tgl1' and '$tgl2' ");
                                            $I = DB::selectOne("SELECT count(a.ket) as I FROM absen_guru as a where id_guru ='$s->id_guru' and a.ket = 'I' and a.tgl between '$tgl1' and '$tgl2' ");
                                            $S = DB::selectOne("SELECT count(a.ket) as S FROM absen_guru as a where id_guru ='$s->id_guru' and a.ket = 'S' and a.tgl between '$tgl1' and '$tgl2' ");
                                            $A = DB::selectOne("SELECT count(a.ket) as A FROM absen_guru as a where id_guru ='$s->id_guru' and a.ket = 'A' and a.tgl between '$tgl1' and '$tgl2' ");
                                            $T = DB::selectOne("SELECT count(a.ket) as T FROM absen_guru as a where id_guru ='$s->id_guru' and a.ket = 'T' and a.tgl between '$tgl1' and '$tgl2' ");
                                        @endphp
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $s->nm_guru }} </td>
                                            <td>{{ $M->M }}</td>
                                            <td>{{ $I->I }}</td>
                                            <td>{{ $S->S }}</td>
                                            <td>{{ $A->A }}</td>
                                            <td>{{ $T->T }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


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

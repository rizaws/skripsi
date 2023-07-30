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
                                            <option value="">--Semua Siswa--</option>
                                            @foreach ($kelas as $e)
                                                <option
                                                    value="{{ $e->id_kelas }}"{{ $id_kelas == $e->id_kelas ? 'selected' : '' }}>
                                                    {{ $e->kelas }}{{ $e->huruf }}
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
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>{{ $title }}: {{ $nm_kelas }}</h6>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('qr_prestasi', ['id_kelas' => $id_kelas]) }}"
                                        class="btn btn-primary float-end"><i class="fas fa-print"></i> Print
                                    </a>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Tempat,Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Prestasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prestasi as $no => $a)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $a->nama }}</td>
                                            <td>{{ $a->kelas }}{{ $a->huruf }}</td>
                                            <td>{{ $a->tempat_lahir }}, {{ tanggal($a->tgl_lahir) }}</td>
                                            <td>{{ $a->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ $a->prestasi }}</td>
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

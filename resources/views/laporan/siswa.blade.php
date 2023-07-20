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
                                            <option value="">Pilih Kelas</option>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>{{ $title }}: {{ $nm_kelas }}</h6>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('qr_siswa_perkelas', ['id_kelas' => $id_kelas]) }}"
                                        class="btn btn-primary float-end"><i class="fas fa-print"></i>
                                        Print</a>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            @if (empty($id_kelas))
                            @else
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Tempat</th>
                                            <th>Tanggal Lahir</th>
                                            <th>No Telp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $no => $s)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $s->nama }}</td>
                                                <td>{{ $s->tempat_lahir }}</td>
                                                <td>{{ date('d-m-Y', strtotime($s->tgl_lahir)) }}</td>
                                                <td>{{ $s->no_telp }}</td>
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

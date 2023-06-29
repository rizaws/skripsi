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
                                        <select name="id_kelas" id="" class="choices form-select floar-end">
                                            @foreach ($kelas as $k)
                                                <option
                                                    value="{{ $k->id_kelas }}"{{ $id_kelas == $k->id_kelas ? 'selected' : '' }}>
                                                    {{ $k->nm_kelas }}
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
                                    <a href="{{ route('print_jadwal', ['id_kelas' => $id_kelas]) }}"
                                        class="btn btn-primary float-end"><i class="fas fa-print"></i> Print
                                    </a>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered" style="text-align: center; ">
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
                                                        $jadwal = DB::selectOne("SELECT b.nm_mapel FROM jadwalmapel as a 
                                                        left join mapel as b on b.id_mapel = a.id_mapel
                                                        where a.id_jam = '$j->id_jam_belajar' and a.id_hari = '$h->id_hari' and a.id_kelas = '$id_kelas'
                                                        ");
                                                    @endphp
                                                    <td>
                                                        @if (empty($jadwal))
                                                            @if ($j->ket == '3' || $j->ket == '6' || $j->ket == '9')
                                                                <dt>Istirahat</dt>
                                                            @else
                                                                <p class="text-danger">belum diisi</p>
                                                            @endif
                                                        @else
                                                            {{ $jadwal->nm_mapel }}
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
                </div>
            </div>
        </div>



    </div>
@endsection

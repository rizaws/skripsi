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
                                    <a href="{{ route('qr_guru', ['id_mapel' => $id_mapel]) }}"
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
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Tempat</th>
                                        <th>Tanggal Lahir</th>
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
                                            <td><a class="btn btn-primary btn-sm"
                                                    href="{{ route('profil_guru', ['nip' => $g->nip]) }}"><i
                                                        class="fas fa-eye"></i></a></td>
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
@endsection

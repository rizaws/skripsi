@extends('laporan.theme.print')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>No Surat</th>
                    <th>Tanggal</th>
                    <th>Pengirim</th>
                    <th>Ditujukan</th>
                    <th>Perihal</th>
                    <th>Berkas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query as $no => $d)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $d->no_surat }}</td>
                        <td>{{ date('d/m/Y', strtotime($d->tgl_surat)) }}</td>
                        <td>{{ $d->pengirim }}</td>
                        <td>{{ $d->ditujukan }}</td>
                        <td>{{ $d->perihal }}</td>
                        <td>{{ $d->berkas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

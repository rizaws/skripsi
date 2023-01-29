@extends('laporan.theme.print')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Surat</th>
                    <th>Jenis Surat</th>
                    <th>Uraian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query as $no => $d)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $d->kd_js }}</td>
                        <td>{{ $d->jenis_surat }}</td>
                        <td>{{ $d->uraian }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

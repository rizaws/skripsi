@extends('theme.app')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <div class="row">
                <div class="col-lg-8">

                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="float: left">{{ $title }}</h3>
                                <a href="{{ route('saveLapDivisi') }}" class="btn btn-primary" style="float: right"
                                        >
                                        <i class="bi bi-filetype-pdf"></i> print
                                    </a>
                            </div>
                            <div class="card-body">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Divisi</th>
                                            <th>Nama Divisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $no => $d)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $d->kd_divisi }}</td>
                                                <td>{{ $d->nm_divisi }}</td>
                                              
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        

    </div>
@endsection

@extends('theme.app')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <h3 style="text-transform: capitalize">{{ $title }}</h3>
        </div>
        <div class="page-content">
            <form action="{{ route('saveLapMasuk') }}" method="get">
            <div class="row">
                <div class="col-lg-3">
                    <input type="hidden" name="jenis" value="{{ $jenis }}">
                    <div class="form-group">
                        <label for="">Dari</label>
                        <input type="date" class="form-control" name="tgl1">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Sampai</label>
                        <input type="date" class="form-control" name="tgl2">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Pengirim</label>
                        <select required name="pengirim" id="" class="form-control">
                            <option value="">- Pilih Pengirim -</option>
                            @foreach ($pengirim as $p)
                                <option value="{{ $jenis == 1 ? $p->pengirim : $p->suratMasuk->pengirim }}">{{ $jenis == 1 ? $p->pengirim : $p->suratMasuk->pengirim }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Aksi</label><br>
                        <button class="btn btn-primary" type="submit">Cetak</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
        

    </div>
@endsection

@extends('theme.app')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-content">
            <form action="{{ route('save_guru') }}" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h6>{{ $title }}</h6>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="">NIP</label>
                                        <input type="text" class="form-control" name="nip" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Nama Lengkap Guru</label>
                                        <input type="text" class="form-control" name="nm_guru" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir" required>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="" class="form-control">
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Mata Pelajaran yang Di ajar</label>
                                        <select name="id_mapel" id="" class="choices form-select floar-end">
                                            <option value="">Pilih Mapel</option>
                                            @foreach ($mapel as $m)
                                                <option value="{{ $m->id_mapel }}">{{ $m->nm_mapel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <label for="">Alamat Lengkap</label>
                                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-end">Simpan</button>
                                <a href="{{ route('data_guru') }}" class="btn btn-secondary me-2 float-end">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

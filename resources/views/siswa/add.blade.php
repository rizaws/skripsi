@extends('theme.app')
@section('content')
    <div id="main">
        <div class="page-content">
            <form action="{{ route('save_siswa') }}" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h6>Tambah Siswa Baru</h6>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="">Pilih Kelas</label>
                                        <select name="id_kelas" id="" class="choices form-select" required>
                                            <option value="">-Pilih Kelas-</option>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->id_kelas }}">{{ $k->kelas }}{{ $k->huruf }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr style="border: 1px solid blue">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">NISN</label>
                                        <input type="text" class="form-control" name="nisn" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="" class="form-control">
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Nama Orang Tua Laki-laki</label>
                                        <input type="text" class="form-control" name="nm_ayah" required>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Nama Orang Tua Perempuan</label>
                                        <input type="text" class="form-control" name="nm_ibu" required>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">No Telpon/Hp</label>
                                        <input type="text" class="form-control" name="no_telp" required>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <label for="">Alamat Lengkap</label>
                                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-end">Simpan</button>
                                <a href="{{ route('data_siswa') }}" class="btn btn-secondary me-2 float-end">Batal</a>
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

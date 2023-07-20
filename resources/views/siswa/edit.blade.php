@extends('theme.app')
@section('content')
    <div id="main">
        <div class="page-content">
            <form action="{{ route('save_edit_siswa') }}" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h6>{{ $title }}</h6>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="">Pilih Kelas</label>
                                        <select name="id_kelas" id="" class="choices form-select" required>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->id_kelas }}"
                                                    {{ $k->id_kelas == $siswa->id_kelas ? 'selected' : '' }}>
                                                    {{ $k->nm_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr style="border: 1px solid blue">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">NISN</label>
                                        <input type="text" class="form-control" name="nisn" required
                                            value="{{ $siswa->nisn }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" required
                                            value="{{ $siswa->nama }}">
                                        <input type="hidden" name="id_siswa" value="{{ $siswa->id_siswa }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" required
                                            value="{{ $siswa->tempat_lahir }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir" required
                                            value="{{ $siswa->tgl_lahir }}">
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Nama Orang Tua Laki-laki</label>
                                        <input type="text" class="form-control" name="nm_ayah" required
                                            value="{{ $siswa->nm_ayah }}">
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Nama Orang Tua Perempuan</label>
                                        <input type="text" class="form-control" name="nm_ibu" required
                                            value="{{ $siswa->nm_ibu }}">
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">No Telpon/Hp</label>
                                        <input type="text" class="form-control" name="no_telp" required
                                            value="{{ $siswa->no_telp }}">
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" required
                                            value="{{ $siswa->email }}">
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <label for="">Alamat Lengkap</label>
                                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $siswa->alamat }}
                                        </textarea>
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

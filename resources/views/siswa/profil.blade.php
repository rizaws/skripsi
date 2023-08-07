@extends('theme.app')
@section('content')
    <div id="main">
        <div class="page-content">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>{{ $title }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img id="gambarProfil" src="{{ asset('storage/image/' . $siswa->image) }}" alt="Avatar"
                                        width="100%" height="300px">
                                    <br>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="">NISN</label>
                                            <input type="text" name="username" class="form-control"
                                                value="{{ $siswa->nisn }}" readonly>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">Nama</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $siswa->nama }}" readonly>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">Kelas</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $siswa->kelas }}{{ $siswa->huruf }}" readonly>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">Status</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $siswa->lulus == 'T' ? 'Siswa Aktif' : 'Alumni' }}" readonly>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control"
                                                value="{{ $siswa->email }}" readonly>
                                        </div>

                                        <div class="col-lg-4">
                                            <label for="">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" required
                                                value="{{ $siswa->tempat_lahir }}"readonly>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir" required
                                                value="{{ $siswa->tgl_lahir }}"readonly>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">Jenis Kelamin</label>
                                            <input type="text" class="form-control" name="tgl_lahir" required
                                                value="{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}"readonly>
                                        </div>
                                        <div class="col-lg-4 mt-2">
                                            <label for="">Nama Orang Tua Laki-laki</label>
                                            <input type="text" class="form-control" name="nm_ayah" readonly
                                                value="{{ $siswa->nm_ayah }}">
                                        </div>
                                        <div class="col-lg-4 mt-2">
                                            <label for="">Nama Orang Tua Perempuan</label>
                                            <input type="text" class="form-control" name="nm_ibu" readonly
                                                value="{{ $siswa->nm_ibu }}">
                                        </div>
                                        <div class="col-lg-4 mt-2">
                                            <label for="">No Telpon/Hp</label>
                                            <input type="text" class="form-control" name="no_telp" readonly
                                                value="{{ $siswa->no_telp }}">
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <label for="">Alamat Lengkap</label>
                                            <textarea name="alamat" id="" cols="30" rows="5" class="form-control" readonly>{{ $siswa->alamat }}
                                                </textarea>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="{{ route('LaporanSiswa') }}" class="btn btn-secondary me-2 float-end">Batal</a>
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
@section('scripts')
    <script>
        $(document).ready(function() {
            // Tambahkan event listener untuk input file
            $('#inputFile').on('change', function() {
                // Dapatkan file yang dipilih oleh pengguna
                var file = $(this).prop('files')[0];

                // Buat URL sementara untuk file gambar yang dipilih
                var imageURL = URL.createObjectURL(file);

                // Ubah atribut src gambar dengan URL sementara
                $('#gambarProfil').attr('src', imageURL);
            });
        });
    </script>
@endsection

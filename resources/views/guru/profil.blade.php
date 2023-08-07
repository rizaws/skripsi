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
                                    <img id="gambarProfil" src="{{ asset('storage/image/' . $guru->image) }}" alt="Avatar"
                                        width="100%" height="300px">
                                    <br>
                                    {{-- <input type="file" class="form-control" name="image" id="inputFile">
                                        <input type="hidden" name="id" value="{{ $user->id }}"> --}}
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="">Nama</label> <br>
                                            <input type="text" class="form-control" value="{{ $guru->nm_guru }}"
                                                readonly>
                                        </div>

                                        <div class="col-lg-4">
                                            <label for="">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir"
                                                value="{{ $guru->tempat_lahir }}" readonly>
                                        </div>
                                        <div class="col-lg-4 ">
                                            <label for="">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir"
                                                value="{{ $guru->tgl_lahir }}" readonly>
                                        </div>
                                        <div class="col-lg-4 mt-2">
                                            <label for="">Jenis Kelamin</label>
                                            <input type="text" class="form-control" name="tgl_lahir"
                                                value="{{ $guru->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}"
                                                readonly>
                                        </div>
                                        <div class="col-lg-4 mt-2">
                                            <label for="">Mata Pelajaran yang Di ajar</label>
                                            <input type="text" class="form-control" name="tgl_lahir"
                                                value="{{ $guru->nm_mapel }}" readonly>

                                        </div>
                                        <div class="col-lg-4 mt-2">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" name="tgl_lahir"
                                                value="{{ $guru->email }}" readonly>

                                        </div>

                                        {{-- <input type="hidden" name="posisi" value="guru"> --}}
                                        <div class="col-lg-12 mt-2">
                                            <label for="">Alamat Lengkap</label>
                                            <textarea name="alamat" id="" cols="30" rows="5" class="form-control" readonly>{{ $guru->alamat }}</textarea>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">

                            <a href="{{ route('LaporanGuru') }}" class="btn btn-secondary me-2 float-end">Kembali</a>
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

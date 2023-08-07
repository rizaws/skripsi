@extends('theme.app')
@section('content')
    <div id="main">
        <div class="page-content">
            <form action="{{ route('update_profil') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h6>{{ $title }}</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img id="gambarProfil" src="{{ asset('storage/image/' . $user->image) }}"
                                            alt="Avatar" width="100%" height="300px">
                                        <br>
                                        <input type="file" class="form-control" name="image" id="inputFile">
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="">Username</label>
                                                <input type="text" name="username" class="form-control"
                                                    value="{{ $user->username }}" readonly>
                                                <input type="hidden" name="level" class="form-control"
                                                    value="{{ $user->level }}" readonly>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="">Nama</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $user->name }}">
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="">Email</label>
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ $user->email }}">
                                            </div>
                                            @if ($user->level == 'wali' || $user->level == 'guru')
                                                <div class="col-lg-4">
                                                    <label for="">Tempat Lahir</label>
                                                    <input type="text" class="form-control" name="tempat_lahir"
                                                        value="{{ $guru->tempat_lahir }}" required>
                                                </div>
                                                <div class="col-lg-4 mt-2">
                                                    <label for="">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" name="tgl_lahir"
                                                        value="{{ $guru->tgl_lahir }}" required>
                                                    <input type="hidden" class="form-control" name="posisi"
                                                        value="{{ $guru->posisi }}" required>
                                                </div>
                                                <div class="col-lg-4 mt-2">
                                                    <label for="">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin" id="" class="form-control">
                                                        <option value="L"
                                                            {{ $guru->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                            Laki-laki
                                                        </option>
                                                        <option value="P"
                                                            {{ $guru->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                            Perempuan
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 mt-2">
                                                    <label for="">Mata Pelajaran yang Di ajar</label>
                                                    <select name="id_mapel" id=""
                                                        class="choices form-select floar-end">
                                                        <option value="">Pilih Mapel</option>
                                                        @foreach ($mapel as $m)
                                                            <option value="{{ $m->id_mapel }}"
                                                                {{ $guru->id_mapel == $m->id_mapel ? 'Selected' : '' }}>
                                                                {{ $m->nm_mapel }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                {{-- <input type="hidden" name="posisi" value="guru"> --}}
                                                <div class="col-lg-8 mt-2">
                                                    <label for="">Alamat Lengkap</label>
                                                    <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $guru->alamat }}</textarea>
                                                </div>
                                            @elseif ($user->level == 'siswa' || $user->level == 'alumni')
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
                                                <div class="col-lg-4">
                                                    <label for="">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin" id="" class="form-control">
                                                        <option value="L"
                                                            {{ $siswa->jenis_kelamin == 'L' ? 'Selected' : '' }}>
                                                            Laki-laki</option>
                                                        <option value="P"
                                                            {{ $siswa->jenis_kelamin == 'P' ? 'Selected' : '' }}>
                                                            Perempuan</option>
                                                    </select>
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
                                                <div class="col-lg-12 mt-2">
                                                    <label for="">Alamat Lengkap</label>
                                                    <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $siswa->alamat }}
                                                </textarea>
                                                </div>
                                            @else
                                            @endif

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-end">Simpan</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2 float-end">Batal</a>
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

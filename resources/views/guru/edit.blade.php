@extends('theme.app')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-content">
            <form action="{{ route('save_edit_guru') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h6>{{ $title }}</h6>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="">NIP</label>
                                        <input type="text" class="form-control" name="nip"
                                            value="{{ $guru->nip }}" required>
                                        <input type="hidden" class="form-control" name="id_guru"
                                            value="{{ $guru->id_guru }}" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Nama Lengkap Guru</label>
                                        <input type="text" class="form-control" name="nm_guru"
                                            value="{{ $guru->nm_guru }}" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir"
                                            value="{{ $guru->tempat_lahir }}" required>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir"
                                            value="{{ $guru->tgl_lahir }}" required>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="" class="form-control">
                                            <option value="L" {{ $guru->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                Laki-laki
                                            </option>
                                            <option value="P" {{ $guru->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Mata Pelajaran yang Di ajar</label>
                                        <select name="id_mapel" id="" class="choices form-select floar-end">
                                            <option value="">Pilih Mapel</option>
                                            @foreach ($mapel as $m)
                                                <option value="{{ $m->id_mapel }}"
                                                    {{ $guru->id_mapel == $m->id_mapel ? 'Selected' : '' }}>
                                                    {{ $m->nm_mapel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Posisi</label>
                                        <select name="posisi" id="" class="choices form-select floar-end">
                                            <option value="">Pilih Posisi</option>

                                            <option value="kepsek" {{ $guru->posisi == 'kepsek' ? 'selected' : '' }}>Kepala
                                                Sekolah</option>
                                            <option value="guru" {{ $guru->posisi == 'guru' ? 'selected' : '' }}>Guru
                                            </option>
                                            <option value="wali" {{ $guru->posisi == 'wali' ? 'selected' : '' }}>Wali
                                                Kelas</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" id=""
                                            value="{{ $guru->email }}">
                                    </div>

                                    {{-- <input type="hidden" name="posisi" value="guru"> --}}
                                    <div class="col-lg-4 mt-2">
                                        <label for="">Alamat Lengkap</label>
                                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $guru->alamat }}</textarea>
                                    </div>

                                    {{-- <div class="col-lg-6">
                                    <label for="">Isi Tanda Tangan <p class="text-danger">*(kalo ttd tidak berubah
                                            tidak perlu di isi)
                                        </p></label>
                                    <canvas style="border: 1px solid #787878" id="signatureCanvas" width="500"
                                        height="150"></canvas>
                                    <input type="hidden" id="signatureInput" name="signature">
                                    <button class="btn btn-secondary btn-sm" id="clearButton">Ulang</button>
                                </div> --}}
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
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script>
        var canvas = document.getElementById('signatureCanvas');
        var signaturePad = new SignaturePad(canvas);

        var clearButton = document.getElementById('clearButton');
        clearButton.addEventListener('click', function() {
            signaturePad.clear();
        });

        var saveButton = document.getElementById('saveButton');
        saveButton.addEventListener('click', function() {
            if (signaturePad.isEmpty()) {
                var signatureData = signaturePad.toDataURL(); // Mengonversi tanda tangan menjadi data gambar

                // Kirim data tanda tangan ke server menggunakan AJAX
                var formData = new FormData();
                formData.append('signature', signatureData);
                formData.append('nip', document.getElementsByName('nip')[0].value);
                formData.append('nm_guru', document.getElementsByName('nm_guru')[0].value);
                formData.append('tempat_lahir', document.getElementsByName('tempat_lahir')[0].value);
                formData.append('tgl_lahir', document.getElementsByName('tgl_lahir')[0].value);
                formData.append('jenis_kelamin', document.getElementsByName('jenis_kelamin')[0].value);
                formData.append('id_mapel', document.getElementsByName('id_mapel')[0].value);
                formData.append('alamat', document.getElementsByName('alamat')[0].value);
                formData.append('posisi', document.getElementsByName('posisi')[0].value);
                formData.append('id_guru', document.getElementsByName('id_guru')[0].value);
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ route('save_edit_guru') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        alert('Data berhasil disimpan');
                        window.location.href = '{{ route('data_guru') }}';
                        // Lakukan tindakan atau perbarui tampilan sesuai kebutuhan Anda
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        alert('Tanda tangan gagal disimpan.');
                        // Handle error sesuai kebutuhan Anda
                    }
                });
            } else {
                var signatureData = signaturePad.toDataURL(); // Mengonversi tanda tangan menjadi data gambar

                // Kirim data tanda tangan ke server menggunakan AJAX
                var formData = new FormData();
                formData.append('signature', signatureData);
                formData.append('nip', document.getElementsByName('nip')[0].value);
                formData.append('nm_guru', document.getElementsByName('nm_guru')[0].value);
                formData.append('tempat_lahir', document.getElementsByName('tempat_lahir')[0].value);
                formData.append('tgl_lahir', document.getElementsByName('tgl_lahir')[0].value);
                formData.append('jenis_kelamin', document.getElementsByName('jenis_kelamin')[0].value);
                formData.append('id_mapel', document.getElementsByName('id_mapel')[0].value);
                formData.append('alamat', document.getElementsByName('alamat')[0].value);
                formData.append('posisi', document.getElementsByName('posisi')[0].value);
                formData.append('id_guru', document.getElementsByName('id_guru')[0].value);
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ route('save_edit_guru') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        alert('Data berhasil disimpan');
                        window.location.href = '{{ route('data_guru') }}';
                        // Lakukan tindakan atau perbarui tampilan sesuai kebutuhan Anda
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        alert('Tanda tangan gagal disimpan.');
                        // Handle error sesuai kebutuhan Anda
                    }
                });
            }
        });
    </script>
@endsection

@extends('theme.app')
@section('content')
    <div id="main">
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-10 mb-4">
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="">Kelas</label>
                                        <select name="id_kelas" id=""class="form-control floar-end id_kelas">
                                            <option value="">Pilih Kelas</option>
                                            @foreach ($kelas as $k)
                                                <option
                                                    value="{{ $k->id_kelas }}"{{ $id_kelas == $k->id_kelas ? 'selected' : '' }}>
                                                    {{ $k->kelas }}{{ $k->huruf }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Mapel</label>
                                        <select name="id_mapel" id=""class="form-control floar-end id_mapel">
                                            <option value="">Pilih Mapel</option>
                                            @foreach ($mapel as $m)
                                                <option
                                                    value="{{ $m->id_mapel }}"{{ $id_mapel == $m->id_mapel ? 'selected' : '' }}>
                                                    {{ $m->nm_mapel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Tanggal</label>
                                        <input type="date" name="tgl" class="form-control tgl"
                                            value="{{ $tgl }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Aksi</label> <br>
                                        <button type="submit" class="btn btn-primary ">Filter</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>{{ $title }}: </h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="load_absen"></div>
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
            var id_kelas = $('.id_kelas').val();
            var tgl = $('.tgl').val();
            var id_mapel = $('.id_mapel').val();

            load_absen();

            function load_absen() {
                $.ajax({
                    type: "get",
                    url: "/get_absenMapel?id_kelas=" + id_kelas + "&tgl=" + tgl + "&id_mapel=" + id_mapel,
                    success: function(data) {
                        $('#load_absen').html(data);
                        $('#table_tes').DataTable();
                    }
                });
            }

            $(document).on('click', '.absen', function() {
                var ket = $(this).attr('ket');
                var id_siswa = $(this).attr('id_siswa');
                var id_mapel = $(this).attr('id_mapel');
                var tgl = $(this).attr('tgl');
                $.ajax({
                    type: "get",
                    url: "/save_absenMapel?id_siswa=" + id_siswa + "&tgl=" + tgl + '&ket=' + ket +
                        '&id_mapel=' + id_mapel,
                    success: function(data) {
                        load_absen();
                        toastr.success('absen berhasil disimpan');
                    }
                });
            });
            $(document).on('click', '.btl_absen', function() {
                var ket = $(this).attr('ket');
                var id_siswa = $(this).attr('id_siswa');
                var id_mapel = $(this).attr('id_mapel');
                var tgl = $(this).attr('tgl');
                $.ajax({
                    type: "get",
                    url: "/btl_absenMapel?id_siswa=" + id_siswa + "&tgl=" + tgl + '&ket=' + ket +
                        "&id_mapel=" + id_mapel,
                    success: function(data) {
                        load_absen();
                        toastr.success('absen berhasil dibatalkan');
                    }
                });
            });



        });
    </script>
@endsection

@extends('theme.app')
@section('content')
    <div id="main">
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-8 mb-4">
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="">Tanggal</label>
                                        <input type="date" name="tgl" class="form-control tgl"
                                            value="{{ $tgl }}">
                                    </div>
                                    <div class="col-lg-4">
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
                                    <h6>{{ $title }}: ({{ tanggal($tgl) }})</h6>
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
            var tgl = $('.tgl').val();

            load_absen();

            function load_absen() {
                $.ajax({
                    type: "get",
                    url: "{{ route('get_absenGuru') }}",
                    data: {
                        'tgl': tgl
                    },
                    success: function(data) {
                        $('#load_absen').html(data);
                        $('#table_tes').DataTable();
                    }
                });
            }

            $(document).on('click', '.absen', function() {
                var ket = $(this).attr('ket');
                var id_guru = $(this).attr('id_guru');
                var tgl = $(this).attr('tgl');
                $.ajax({
                    type: "get",
                    url: "{{ route('save_absenGuru') }}",
                    data: {
                        'id_guru': id_guru,
                        'tgl': tgl,
                        'ket': ket
                    },
                    success: function(data) {
                        load_absen();
                        toastr.success('absen berhasil disimpan');
                    }
                });
            });
            $(document).on('click', '.btl_absen', function() {
                var ket = $(this).attr('ket');
                var id_guru = $(this).attr('id_guru');
                var tgl = $(this).attr('tgl');
                $.ajax({
                    type: "get",
                    url: "{{ route('btl_absenGuru') }}",
                    data: {
                        'id_guru': id_guru,
                        'tgl': tgl,
                        'ket': ket
                    },
                    success: function(data) {
                        load_absen();
                        toastr.success('absen berhasil dibatalkan');
                    }
                });
            });



        });
    </script>
@endsection

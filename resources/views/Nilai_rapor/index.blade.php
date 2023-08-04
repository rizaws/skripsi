@extends('theme.app')
@section('content')
<div id="main">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <form id="filter_nilai">
                            <div class="row">
                                <div class="col-lg-4">
                                    <select name="id_mapel" id="id_mapel" class="choices form-select floar-end">
                                        <option value="">--Pilih Mata Pelajaran--</option>
                                        @foreach ($mapel as $m)
                                        <option value="{{ $m->id_mapel }}">{{ $m->nm_mapel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select name="id_kelas" id="id_kelas" class="choices form-select floar-end">
                                        <option value="">--Pilih Kelas--</option>
                                        @foreach ($kelas as $k)
                                        <option value="{{ $k->id_kelas }}">{{ $k->kelas }}{{ $k->huruf }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <button type="submit" class="btn btn-primary ">Filter</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <div id="get_siswa">

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
                <p> <span class="text-danger"><i class=" "></i></span> <a href="https://saugi.me">PN Banjarmasin Kelas
                        1A</a></p>
            </div>
        </div>
    </footer> --}}
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
            $(document).on('submit', '#filter_nilai', function(e) {
                e.preventDefault();
            
                var id_mapel = $('#id_mapel').val();
                var id_kelas = $('#id_kelas').val();
                $.ajax({
                    type: "get",
                    url: "{{ route('get_rapor_siswa') }}",
                    data: {
                        'id_mapel': id_mapel,
                        'id_kelas': id_kelas
                    },
                    success: function(data) {
                        $("#get_siswa").html(data)
                    }
                });
            });
            $(document).on('submit', '#save_nilai', function(e) {
                e.preventDefault()
                var formVal = $("#save_nilai").serialize();
                var id_mapel = $('#id_mapel').val();
                var id_kelas = $('#id_kelas').val();


                $.ajax({
                    type: "GET",
                    url: "{{ route('save_nilai') }}?" + formVal,
                    success: function(r) {
                        toastr.success('Nilai siswa berhasil disimpan');
                        $.ajax({
                            type: "get",
                    url: "{{ route('get_rapor_siswa') }}",
                    data: {
                        'id_mapel': id_mapel,
                        'id_kelas': id_kelas
                    },
                    success: function(data) {
                        $("#get_siswa").html(data)
                    }
                        });
                    }
                });
            })
        });
</script>
@endsection
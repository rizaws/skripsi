<form id="save_nilai">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <h6>{{ $title }}</h6> <br>
                    <table>
                        <tr>
                            <td>Mata Pelajaran</td>
                            <td>:</td>
                            <td>{{ $mapel->nm_mapel }}</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>{{ $kelas->kelas }}{{ $kelas->huruf }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <a href="{{ route('qr_nilai_siswa', ['id_mapel' => $id_mapel, 'id_kelas' => $id_kelas]) }}"
                        class="btn btn-primary float-end"><i class="fas fa-print"></i> Print
                    </a>
                </div>
            </div>


        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Siswa</th>
                        <th width="10%">Nilai</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <input type="hidden" name="id_mapel" id="id_mapel" value="{{ $id_mapel }}">
                    <input type="hidden" name="id_kelas" value="{{ $id_kelas }}">
                    @foreach ($siswa as $no => $s)
                        @php
                            $nilai = DB::table('nilai')
                                ->where(['id_siswa' => $s->id_siswa, 'id_mapel' => $id_mapel])
                                ->first();
                        @endphp
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $nilai->nilai }}</td>
                            <td>{{ $nilai->ket }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</form>

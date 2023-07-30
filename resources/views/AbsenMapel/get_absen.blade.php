<table class="table table-bordered" id="table_tes" style="text-align: center">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Hadir</th>
            <th>Tidak Hadir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $no => $s)
            @php
                $absen = DB::table('absen_mapel')
                    ->where(['id_siswa' => $s->id_siswa, 'tgl' => $tgl, 'id_mapel' => $id_mapel])
                    ->first();
            @endphp
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $s->nama }} </td>
                <td>
                    <button ket="M" id_siswa="{{ $s->id_siswa }}" tgl="{{ $tgl }}"
                        id_mapel="{{ $id_mapel }}"
                        class="btn  {{ empty($absen->ket) ? 'btn-danger absen' : ($absen->ket == 'M' ? 'btn-success btl_absen' : 'btn-danger absen') }}  btn-sm">
                        <i
                            class="fas {{ empty($absen->ket) ? 'fa-times-circle' : ($absen->ket == 'M' ? 'fa-check' : 'fa-times-circle') }}"></i>
                    </button>
                </td>
                <td>
                    <button ket="A" id_siswa="{{ $s->id_siswa }}"
                        tgl="{{ $tgl }}"id_mapel="{{ $id_mapel }}"
                        class="btn  {{ empty($absen->ket) ? 'btn-danger absen' : ($absen->ket == 'A' ? 'btn-success btl_absen' : 'btn-danger absen') }}  btn-sm">
                        <i
                            class="fas {{ empty($absen->ket) ? 'fa-times-circle' : ($absen->ket == 'A' ? 'fa-check' : 'fa-times-circle') }}"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

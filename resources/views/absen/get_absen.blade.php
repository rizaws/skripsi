<table class="table table-bordered" id="table_tes" style="text-align: center">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Masuk</th>
            <th>Izin</th>
            <th>Sakit</th>
            <th>Alpa</th>
            <th>Terlambat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $no => $s)
            @php
                $absen = DB::table('absen')
                    ->where(['id_siswa' => $s->id_siswa, 'tgl' => $tgl])
                    ->first();
            @endphp
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $s->nama }} </td>
                <td>
                    <button ket="M" id_siswa="{{ $s->id_siswa }}" tgl="{{ $tgl }}"
                        class="btn  {{ empty($absen->ket) ? 'btn-danger absen' : ($absen->ket == 'M' ? 'btn-success btl_absen' : 'btn-danger absen') }}  btn-sm">
                        <i
                            class="fas {{ empty($absen->ket) ? 'fa-times-circle' : ($absen->ket == 'M' ? 'fa-check' : 'fa-times-circle') }}"></i>
                    </button>
                </td>
                <td>
                    <button ket="I" id_siswa="{{ $s->id_siswa }}" tgl="{{ $tgl }}"
                        class="btn  {{ empty($absen->ket) ? 'btn-danger absen' : ($absen->ket == 'I' ? 'btn-success btl_absen' : 'btn-danger absen') }}  btn-sm">
                        <i
                            class="fas {{ empty($absen->ket) ? 'fa-times-circle' : ($absen->ket == 'I' ? 'fa-check' : 'fa-times-circle') }}"></i>
                    </button>
                </td>
                <td>
                    <button ket="S" id_siswa="{{ $s->id_siswa }}" tgl="{{ $tgl }}"
                        class="btn  {{ empty($absen->ket) ? 'btn-danger absen' : ($absen->ket == 'S' ? 'btn-success btl_absen' : 'btn-danger absen') }}  btn-sm">
                        <i
                            class="fas {{ empty($absen->ket) ? 'fa-times-circle' : ($absen->ket == 'S' ? 'fa-check' : 'fa-times-circle') }}"></i>
                    </button>
                </td>
                <td>
                    <button ket="A" id_siswa="{{ $s->id_siswa }}" tgl="{{ $tgl }}"
                        class="btn  {{ empty($absen->ket) ? 'btn-danger absen' : ($absen->ket == 'A' ? 'btn-success btl_absen' : 'btn-danger absen') }}  btn-sm">
                        <i
                            class="fas {{ empty($absen->ket) ? 'fa-times-circle' : ($absen->ket == 'A' ? 'fa-check' : 'fa-times-circle') }}"></i>
                    </button>
                </td>
                <td>
                    <button ket="T" id_siswa="{{ $s->id_siswa }}" tgl="{{ $tgl }}"
                        class="btn  {{ empty($absen->ket) ? 'btn-danger absen' : ($absen->ket == 'T' ? 'btn-success btl_absen' : 'btn-danger absen') }}  btn-sm">
                        <i
                            class="fas {{ empty($absen->ket) ? 'fa-times-circle' : ($absen->ket == 'T' ? 'fa-check' : 'fa-times-circle') }}"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

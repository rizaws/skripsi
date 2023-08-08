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
                    <button class="btn  btn-primary float-end">Simpan Nilai</button>
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
                    <input type="hidden" name="posisi" value="{{ $guru->posisi }}">
                    @foreach ($siswa as $no => $s)
                        @php
                            $nilai = DB::table('nilai')
                                ->where(['id_siswa' => $s->id_siswa, 'id_mapel' => $id_mapel])
                                ->first();
                        @endphp
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $s->nama }}</td>

                            <td>
                                @if ($guru->posisi == 'guru')
                                    <input type="number" name="nilai[]" max="100"
                                        value="{{ empty($nilai->nilai) ? '0' : $nilai->nilai }}"
                                        class="form-control nilai nilai{{ $no + 1 }}"
                                        count="{{ $no + 1 }}">
                                    <input type="hidden" name="nilai_wali[]" max="100"
                                        value="{{ empty($nilai->nilai_wali) ? '0' : $nilai->nilai_wali }}"
                                        class="form-control">
                                @else
                                    <input type="hidden" name="nilai[]" max="100"
                                        value="{{ empty($nilai->nilai) ? '0' : $nilai->nilai }}" class="form-control">
                                    <input type="number" name="nilai_wali[]" max="100"
                                        value="{{ $nilai->nilai_wali == 0 || empty($nilai->nilai_wali) ? $nilai->nilai : $nilai->nilai_wali }}"
                                        class="form-control nilai nilai{{ $no + 1 }}"
                                        count="{{ $no + 1 }}">
                                @endif

                            </td>
                            <td>
                                @if ($guru->posisi == 'guru')
                                    <input type="text" name="ket[]" class="form-control ket{{ $no + 1 }}"
                                        value="{{ empty($nilai->ket) ? 'Sangat kurang' : $nilai->ket }}" readonly>
                                    <input type="hidden" name="ket_wali[]" class="form-control"
                                        value="{{ empty($nilai->ket_wali) ? 'Sangat Kurang' : $nilai->ket_wali }}"
                                        readonly>
                                @else
                                    <input type="text" name="ket_wali[]" class="form-control ket{{ $no + 1 }}"
                                        value="{{ empty($nilai->ket_wali) ? $nilai->ket : $nilai->ket_wali }}"
                                        readonly>
                                    <input type="hidden" name="ket[]" class="form-control"
                                        value="{{ empty($nilai->ket) ? 'Sangat kurang' : $nilai->ket }}" readonly>
                                @endif




                                <input type="hidden" name="id_siswa[]" class="form-control"
                                    value="{{ $s->id_siswa }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</form>

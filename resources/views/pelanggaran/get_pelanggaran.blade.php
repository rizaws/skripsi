<div class="row">
    <div class="col-lg-3">
        <label for="">Tanggal</label>
        <input type="date" name="tgl" class="form-control" id="" value="{{ $pelanggaran->tanggal }}">
        <input type="hidden" name="id_pelanggaran" class="form-control" id=""
            value="{{ $pelanggaran->id_pelanggaran }}">
    </div>
    <div class="col-lg-3">
        <label for="">Pilih Kelas</label>
        <select name="" id="" class="form-control get_siswa">
            <option value="">-Pilih Kelas-</option>
            @foreach ($kelas as $k)
                <option value="{{ $k->id_kelas }}" {{ $pelanggaran->id_kelas == $k->id_kelas ? 'selected' : '' }}>
                    {{ $k->kelas }}{{ $k->huruf }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-3">
        <label for="">Pilih Siswa</label>
        <select name="id_siswa" id="" class="form-control load_siswa">
            @foreach ($siswa as $k)
                <option value="{{ $k->id_siswa }}" {{ $pelanggaran->id_siswa == $k->id_siswa ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-3">
        <label for="">Pilih Jenis Pelanggaran</label>
        <select name="id_jenis_pelanggaran" id="" class="form-control ">
            <option value="">-Pilih Jenis Pelanggaran-</option>
            @foreach ($jenis_pelanggaran as $k)
                <option value="{{ $k->id_sub_pelanggaran }}"
                    {{ $pelanggaran->id_jenis_pelanggaran == $k->id_sub_pelanggaran ? 'selected' : '' }}>
                    {{ $k->deskripsi }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6 mt-2">
        <label for="">Keterangan</label>
        <textarea name="ket" class="form-control" id="" cols="20" rows="5">{{ $pelanggaran->ket }}</textarea>
    </div>
</div>

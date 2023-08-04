<div class="row">
    <div class="col-lg-4">
        <label for="">Pilih Kelas</label>
        <select name="" id="" class="form-control get_siswa">
            <option value="">-Pilih Kelas-</option>
            @foreach ($kelas as $k)
                <option value="{{ $k->id_kelas }}" {{ $k->id_kelas == $id_kelas ? 'Selected' : '' }}>{{ $k->kelas }}{{$k->huruf}}
                </option>
            @endforeach
        </select>
        <input type="hidden" name="id_prestasi" value="{{ $prestasi->id_prestasi }}">
    </div>
    <div class="col-lg-4">
        <label for="">Pilih Siswa</label>
        <select name="id_siswa" id="" class="form-control load_siswa">
            @foreach ($siswa as $s)
                <option value="{{ $s->id_siswa }}" {{ $prestasi->id_siswa == $s->id_siswa ? 'Selected' : '' }}>
                    {{ $s->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4">
        <label for="">Prestasi</label>
        <input type="text" class="form-control" name="prestasi" value="{{ $prestasi->prestasi }}">
    </div>
</div>

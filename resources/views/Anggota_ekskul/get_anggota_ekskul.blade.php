<div class="row">
    <div class="col-lg-4">
        <label for="">Pilih Kelas</label>
        <select name="" id="" class="choices form-select get_siswa">
            <option value="">-Pilih Kelas-</option>
            @foreach ($kelas as $k)
                <option value="{{ $k->id_kelas }}" {{ $k->id_kelas == $id_kelas ? 'Selected' : '' }}>
                    {{ $k->kelas }}{{ $k->huruf }}
                </option>
            @endforeach
        </select>
        <input type="hidden" name="id_anggota_ekskul" value="{{ $anggota->id_anggota_ekskul }}">
    </div>
    <div class="col-lg-4">
        <label for="">Pilih Siswa</label>
        <select name="id_siswa" id="" class="form-control load_siswa">
            @foreach ($siswa as $s)
                <option value="{{ $s->id_siswa }}" {{ $anggota->id_siswa == $s->id_siswa ? 'Selected' : '' }}>
                    {{ $s->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4">
        <label for="">Ekstrakurikuler</label>
        <select name="id_ekskul" id="" class="choices form-select">
            <option value="">-Pilih Ekskul-</option>
            @foreach ($ekskul as $e)
                <option value="{{ $e->id_ekskul }}" {{ $anggota->id_ekskul == $e->id_ekskul ? 'Selected' : '' }}>
                    {{ $e->nm_ekskul }}</option>
            @endforeach
        </select>

    </div>
</div>

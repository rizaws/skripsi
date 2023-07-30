<div class="row">
    <div class="col-lg-4">
        <label for="">Kelas</label>
        <input type="number" min="7" max="9" class="form-control" name="kelas" value="{{ $kelas->kelas }}">
        <input type="hidden" class="form-control" name="id_kelas" value="{{ $kelas->id_kelas }}">
    </div>
    <div class="col-lg-4">
        <label for="">Huruf</label>
        <input type="text" class="form-control" name="huruf" value="{{ $kelas->huruf }}">
    </div>
    <div class="col-lg-4">
        <label for="">Wali Kelas</label>
        <select name="id_guru" id="" class="choices form-select">
            <option value="">-Pilih Wali Kelas-</option>
            @foreach ($guru as $g)
                <option value="{{ $g->id_guru }}" {{ $kelas->id_guru == $g->id_guru ? 'Selected' : '' }}>
                    {{ $g->nm_guru }}</option>
            @endforeach
        </select>
    </div>
</div>

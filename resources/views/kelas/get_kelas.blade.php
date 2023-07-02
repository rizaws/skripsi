<div class="row">

    <div class="col-lg-6">
        <label for="">Nama Kelas</label>
        <input type="text" class="form-control" name="nm_kelas" value="{{ $kelas->nm_kelas }}">
        <input type="hidden" class="form-control" name="id_kelas" value="{{ $kelas->id_kelas }}">
    </div>
    <div class="col-lg-6">
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

<div class="row">
    <div class="col-lg-6">
        <label for="">Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" value="{{ $jenis_pelanggaran->deskripsi }}">
        <input type="hidden" class="form-control" name="id_sub_pelanggaran"
            value="{{ $jenis_pelanggaran->id_sub_pelanggaran }}">
    </div>
    <div class="col-lg-2">
        <label for="">Point</label>
        <input type="text" class="form-control" name="point" value="{{ $jenis_pelanggaran->point }}">
    </div>
    <div class="col-lg-4">
        <label for="">Sanksi</label>
        <input type="text" class="form-control" name="hukuman" value="{{ $jenis_pelanggaran->hukuman }}">
    </div>
</div>

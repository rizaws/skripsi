<div class="row">
    <div class="col-lg-4">
        <label for="">Tanggal Lulus</label>
        <input type="date" class="form-control" name="tgl_lulus" value="{{ $siswa->tgl_lulus }}">
    </div>
    <div class="col-lg-4">
        <label for="">NISN</label>
        <input type="text" name="nisn" class="form-control" value="{{ $siswa->nisn }}" readonly>
        <input type="hidden" name="id_siswa" class="form-control" value="{{ $siswa->id_siswa }}" readonly>
        <input type="hidden" name="id_kelas" class="form-control" value="{{ $siswa->id_kelas }}" readonly>
    </div>
    <div class="col-lg-4">
        <label for="">Nama</label>
        <input type="text" class="form-control" value="{{ $siswa->nama }}" readonly>
    </div>
    <div class="col-lg-4 mt-2">
        <label for="">Melanjutkan</label>
        <input type="text" name="melanjutkan" class="form-control" value="{{ $siswa->melanjutkan }}">
    </div>
</div>

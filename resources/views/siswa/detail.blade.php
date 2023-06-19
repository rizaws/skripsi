<div class="row">
    <div class="col-lg-12">
        <table class="table table-borderless">
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{ $siswa->nama }}</td>
                <td>Nama Ayah</td>
                <td>:</td>
                <td>{{ $siswa->nm_ayah }}</td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td>{{ $siswa->tempat_lahir }}</td>
                <td>Nama Ibu</td>
                <td>:</td>
                <td>{{ $siswa->nm_ibu }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>{{ date('d-m-Y', strtotime($siswa->tgl_lahir)) }}</td>
                <td>No Telp/Hp</td>
                <td>:</td>
                <td>{{ $siswa->no_telp }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $siswa->email }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td colspan="4">{{ $siswa->alamat }}</td>
            </tr>
        </table>
    </div>
</div>

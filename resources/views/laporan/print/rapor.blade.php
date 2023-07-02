<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?= $title ?></title>
</head>

<body>



    <div class="row justify-content-center">
        <div>
            <table width="100%">
                <tr>
                    <th width="30%">Nama Peserta Didik</th>
                    <th width="2%">:</th>
                    <td width="30%">{{ $siswa->nama }}</td>
                    <th>Kelas</th>
                    <th>:</th>
                    <td>{{ $siswa->nm_kelas }}</td>
                </tr>
                <tr>
                    <th width="30%">NISN</th>
                    <th width="2%">:</th>
                    <td>{{ $siswa->nisn }}</td>
                    <th>Fase</th>
                    <th>:</th>
                    <td>D</td>
                </tr>
                <tr>
                    <th width="30%">Sekolah</th>
                    <th width="2%">:</th>
                    <td>MTSN 2 Banjarmasin</td>
                    <th>Semester</th>
                    <th>:</th>
                    <td>2</td>
                </tr>
                <tr>
                    <th width="30%">Alamat</th>
                    <th width="2%">:</th>
                    <td>{{ $siswa->alamat }}</td>
                    <th>Tahun Pelajaran</th>
                    <th>:</th>
                    <td>2023/2024</td>
                </tr>
            </table>
            <br>
            <table width="100%" class="table table-bordered table-sm">
                <thead style="text-align: center">
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th width="5%">Nilai Akhir</th>
                    <th>Capaian Kompetensi</th>
                </thead>
                <tbody>
                    @foreach ($mapel as $no => $m)
                        @php
                            $nilai = DB::selectOne("SELECT * FROM nilai as a where a.id_mapel = '$m->id_mapel' and a.id_siswa = '$id_siswa'");
                        @endphp
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $m->nm_mapel }}</td>
                            <td>{{ empty($nilai->nilai) ? '-' : $nilai->nilai }}</td>
                            <td>{{ empty($nilai->ket) ? '-' : $nilai->ket }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <table width="100%" class="table table-bordered table-sm">
                <thead style="text-align: center">
                    <th>No</th>
                    <th>Ekstrakurikuler</th>
                    <th>Keterangan</th>
                </thead>
                <tbody>
                    @foreach ($ekskul as $no => $e)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $e->nm_ekskul }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-4">
            <table width="100%" class="table table-bordered table-sm">
                <thead style="text-align: center">
                    <tr>
                        <th colspan="2">Ketidakhadiran</th>
                    </tr>
                </thead>
                @php
                    $I = DB::selectOne("SELECT count(a.ket) as I FROM absen as a where id_siswa ='$id_siswa' and a.ket = 'I'");
                    $S = DB::selectOne("SELECT count(a.ket) as S FROM absen as a where id_siswa ='$id_siswa' and a.ket = 'S'");
                    $A = DB::selectOne("SELECT count(a.ket) as A FROM absen as a where id_siswa ='$id_siswa' and a.ket = 'A'");
                @endphp
                <tbody>
                    <tr>
                        <td>Sakit</td>
                        <td> {{ $S->S }} hari</td>
                    </tr>
                    <tr>
                        <td>Izin</td>
                        <td> {{ $I->I }} hari</td>
                    </tr>
                    <tr>
                        <td>Tanpa Keterangan</td>
                        <td> {{ $A->A }} hari</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
            <dt style="text-align: center">Banjarmasin,{{ tanggal(date('Y-m-d')) }}</dt>
        </div>
        <div class="col-4">
            <dt style="text-align: center">TTD Orang Tua Peserta Didik</dt>
        </div>
        <div class="col-4">
            <br>
            <br>
            <dt style="text-align: center">TTD Kepala Sekolah</dt>
            <br>
            <p class="text-center">{!! QrCode::size(100)->generate(url('/assets/ttd/' . $kepsek->image)) !!}</p>
            <p class="text-center"><u class="fw-bold text-center">{{ $kepsek->nm_guru }}</u></p>
            <p class="text-center">NIP:{{ $kepsek->nip }}</p>
        </div>
        <div class="col-4">
            <dt style="text-align: center">TTD Wali Kelas</dt>
            <br>
            <p class="text-center">{!! QrCode::size(100)->generate(url('/assets/ttd/' . $wali_kelas->image)) !!}</p>
            <p class="text-center"><u class="fw-bold text-center">{{ $wali_kelas->nm_guru }}</u></p>
            <p class="text-center">NIP:{{ $wali_kelas->nip }}</p>
        </div>


    </div>


    <!-- Optional JavaScript; choose one of the two! -->
    <script>
        window.print()
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>

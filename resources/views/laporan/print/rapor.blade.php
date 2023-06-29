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
        <div class="col-lg-12 mt-4">
            <h5 class="fw-bold text-center">MTS NEGERI 2 BANJARMASIN</h5>
        </div>
        <div class="col-lg-12">
            <h5 class="fw-bold text-center">TAHUN PELAJARAN 2023/2024</h5>
        </div>

        <div class="col-lg-12">
            <hr style="border:2px solid black;">
        </div>
        <div class="col-lg-12">
            <h5 class="fw-bold text-center ">Laporan Rapor Siswa</h5>
            <br>
            <br>
        </div>
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
                    <td>29292929</td>
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
            <table width="100%" class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai Akhir</th>
                    <th>Capaian Kompetensi</th>
                </thead>
                <tbody>
                    @foreach ($mapel as $no => $m)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $m->}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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

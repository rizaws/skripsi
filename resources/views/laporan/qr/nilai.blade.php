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
    <style>
        .konten {


            /* Border */
            border-top: 2px solid black;
            border-right: 2px solid black;
            border-bottom: 2px solid black;
            border-left: 2px solid black;
        }

        @media print {
            .konten {
                width: 210mm;
                /* Lebar kertas A4 */
                height: 297mm;
                /* Tinggi kertas A4 */
                padding: 10mm;
                /* Ruang padding di dalam kertas A4 */
            }
        }
    </style>
</head>

<body>


    <div class="konten">
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
                <h5 class="fw-bold text-center ">Laporan Data Nilai Siswa</h5>
                <br>
            </div>
            <div class="col-lg-12">
                <table width="50%">
                    <thead>
                        <tr>
                            <th width="45%">Kelas</th>
                            <th width="5%">:</th>
                            <td width="50%">{{ $kelas->kelas }}{{ $kelas->huruf }}</td>
                        </tr>
                        <tr>
                            <th width="45%">Wali Kelas</th>
                            <th width="5%">:</th>
                            <td width="50%">{{ $kelas->nm_guru }}</td>
                        </tr>
                        <tr>
                            <th width="45%">Mata Pelajaran</th>
                            <th width="5%">:</th>
                            <td width="50%">{{ $mapel->nm_mapel }}</td>
                        </tr>
                        <tr>
                            <th width="45%">Jumlah Siswa</th>
                            <th width="5%">:</th>
                            <td width="50%">{{ $siswa->jml_siswa }} Orang</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-lg-12">
                <br>
                <br>
                <br>
                <center>
                    <p>Disetujui:</p>
                    <h6><b>STAF TATA USAHA</b></h6>

                    <br>
                    <p class="text-center">Banjarmasin, <?= date('d F Y') ?></p>
                    <p class="text-center ">Mengetahui,</p>
                    <p class="text-center fw-bold">Kepala Sekolah MTS Negeri 2 Banjarmasin,</p>
                    <p class="text-center">{!! QrCode::size(100)->generate(url("/print_nilai?id_mapel=$id_mapel&id_kelas=$id_kelas")) !!}</p>
                    <p class="text-center"><u class="fw-bold text-center">{{ $kepsek->nm_guru }}</u></p>
                    <p class="text-center">NIP:{{ $kepsek->nip }}</p>
                </center>
            </div>


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

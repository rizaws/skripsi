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
            <h5 class="fw-bold text-center ">Laporan Nilai Siswa</h5>
            <br>
            <br>
        </div>
        <div class="col-lg-4">

        </div>
        <div class="col-lg-12">
            <p>Mapel : {{ $mapel->nm_mapel }}</p> <br>
            <p>Kelas : {{ $kelas->kelas }}{{ $kelas->huruf }}</p>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Siswa</th>
                        <th width="10%">Nilai</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <input type="hidden" name="id_mapel" id="id_mapel" value="{{ $id_mapel }}">
                    <input type="hidden" name="id_kelas" value="{{ $id_kelas }}">
                    @foreach ($siswa as $no => $s)
                        @php
                            $nilai = DB::table('nilai')
                                ->where(['id_siswa' => $s->id_siswa, 'id_mapel' => $id_mapel])
                                ->first();
                        @endphp
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>
                                @if (empty($nilai->nilai))
                                    F
                                @elseif ($nilai->nilai > '80')
                                    A
                                @elseif ($nilai->nilai > '60')
                                    B
                                @elseif ($nilai->nilai >= '50')
                                    C
                                @else
                                    D
                                @endif
                            </td>
                            <td>
                                @if (empty($nilai->nilai))
                                    Sangat Kurang
                                @elseif ($nilai->nilai > '80')
                                    Sangat Bagus
                                @elseif ($nilai->nilai > '60')
                                    Bagus
                                @elseif ($nilai->nilai >= '50')
                                    Cukup
                                @else
                                    Kurang
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-lg-6 col-6">
        </div>
        <div class="col-lg-6 col-6">
            <p class="text-center">Banjarmasin, <?= date('d F Y') ?></p>
        </div>
        <div class="col-lg-6 col-6">
        </div>
        <div class="col-6">
            <p class="text-center">Mengetahui,</p><br>
            <p class="text-center">Kepala MTS Negeri 2 Banjarmasin</p>
            <br>
            <br>
            <br>
            <p class="text-center"><u class="fw-bold text-center">{{ $kepsek->nm_guru }}</u></p>
            <p class="text-center">NIP:{{ $kepsek->nip }}</p>
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

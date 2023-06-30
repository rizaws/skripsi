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

    <style>
        th,
        td {
            padding: 8px;
        }
    </style>

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
            <h5 class="fw-bold text-center ">Laporan Jadwal Pelajaran</h5>
            <br>
            <br>
        </div>
        <div class="col-lg-4">

        </div>
        <div class="col-lg-12">
            <p>Kelas : {{ $nm_kelas }}</p>
            <table class="table table-bordered" width="100%" cellspacing="0" style="font-size: 10px">
                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align: middle">Waktu</th>
                        <th rowspan="2" style="vertical-align: middle">Jam Ke</th>
                        @foreach ($hari as $h)
                            <th>{{ $h->nm_hari }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jam_belajar as $j)
                        <tr>
                            @if ($j->ket == '3' || $j->ket == '6' || $j->ket == '9')
                                <td>
                                    <dt>{{ $j->dari }} - {{ $j->sampai }}</dt>
                                </td>
                                <td>
                                    <dt>{{ $j->ket }}</dt>
                                </td>
                            @else
                                <td>{{ $j->dari }} - {{ $j->sampai }}</td>
                                <td>{{ $j->ket }}</td>
                            @endif

                            @foreach ($hari as $h)
                                @php
                                    $jadwal = DB::selectOne("SELECT b.nm_mapel FROM jadwalmapel as a 
                                    left join mapel as b on b.id_mapel = a.id_mapel
                                    where a.id_jam = '$j->id_jam_belajar' and a.id_hari = '$h->id_hari' and a.id_kelas = '$id_kelas'
                                    ");
                                @endphp
                                <td>
                                    @if (empty($jadwal))
                                        @if ($j->ket == '3' || $j->ket == '6' || $j->ket == '9')
                                            <dt>Istirahat</dt>
                                        @else
                                            <p class="text-danger">belum diisi</p>
                                        @endif
                                    @else
                                        {{ $jadwal->nm_mapel }}
                                    @endif

                                </td>
                            @endforeach
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
            <p class="text-center">{!! QrCode::size(100)->generate(url('/assets/ttd/' . $kepsek->image)) !!}</p>
            <p class="text-center"><u class="fw-bold text-center">{{ $kepsek->nm_guru }}</u></p><br>
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

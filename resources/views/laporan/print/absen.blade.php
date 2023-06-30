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
            <h5 class="fw-bold text-center ">Laporan Absen Siswa</h5>
            <br>
            <br>
        </div>
        <div class="col-lg-4">

        </div>
        <div class="col-lg-12">
            <p>Kelas : {{ $nm_kelas }} ({{ tanggal($tgl1) }} ~
                {{ tanggal($tgl2) }})</p>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Masuk</th>
                        <th>Izin</th>
                        <th>Sakit</th>
                        <th>Alpa</th>
                        <th>Terlambat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $no => $s)
                        @php
                            $M = DB::selectOne("SELECT count(a.ket) as M FROM absen as a where id_siswa ='$s->id_siswa' and a.ket = 'M' and a.tgl between '$tgl1' and '$tgl2' ");
                            $I = DB::selectOne("SELECT count(a.ket) as I FROM absen as a where id_siswa ='$s->id_siswa' and a.ket = 'I' and a.tgl between '$tgl1' and '$tgl2' ");
                            $S = DB::selectOne("SELECT count(a.ket) as S FROM absen as a where id_siswa ='$s->id_siswa' and a.ket = 'S' and a.tgl between '$tgl1' and '$tgl2' ");
                            $A = DB::selectOne("SELECT count(a.ket) as A FROM absen as a where id_siswa ='$s->id_siswa' and a.ket = 'A' and a.tgl between '$tgl1' and '$tgl2' ");
                            $T = DB::selectOne("SELECT count(a.ket) as T FROM absen as a where id_siswa ='$s->id_siswa' and a.ket = 'T' and a.tgl between '$tgl1' and '$tgl2' ");
                        @endphp
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $s->nama }} </td>
                            <td>{{ $M->M }}</td>
                            <td>{{ $I->I }}</td>
                            <td>{{ $S->S }}</td>
                            <td>{{ $A->A }}</td>
                            <td>{{ $T->T }}</td>
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

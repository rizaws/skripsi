<style>
    body,
    table,
    td,
    a {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    table,
    td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
    }

    img {
        -ms-interpolation-mode: bicubic;
    }

    img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
    }

    table {
        border-collapse: collapse !important;
    }

    body {
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
    }

    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    div[style*="margin: 16px 0;"] {
        margin: 0 !important;
    }
</style>

@php

$siswa = DB::selectOne("SELECT * FROM siswa as a left join kelas as b on b.id_kelas = a.id_kelas where a.id_siswa =
$id_siswa");
@endphp

<body style="background-color: #f7f5fa; margin: 0 !important; padding: 0 !important;">

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td bgcolor="#D3D335" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="480">
                    <tr>
                        <td align="center">
                        </td>
                    </tr>
                    {{-- <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                            <div style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;"
                                border="0">Happy Kids</div>
                        </td>
                    </tr> --}}
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#D3D335" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="480">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top"
                            style="padding: 30px 30px 20px 30px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                            <img src="https://ppdb.mtsn2kotabjm.sch.id/img/logo.png" alt="" width="80px"> <br>
                            <h5 style="font-size: 32px; font-weight: 400; margin: 0;">Laporan Absensi siswa </h5>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="480">
                    <tr>
                        <td bgcolor="#ffffff" align="center">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>

                                    <th align="center" colspan="2" valign="top"
                                        style="padding-left:15px;padding-right:30px;padding-bottom:10px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                        Pemberitahuan Bahwa Siswa yang bernama : {{ $siswa->nama }} </th>
                                </tr>
                                <tr>

                                    <th align="center" colspan="2" valign="top"
                                        style="padding-left:15px;padding-right:30px;padding-bottom:10px;font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                        Kelas : {{ $siswa->kelas }}{{$siswa->huruf}} </th>
                                </tr>
                                <tr>
                                    <th colspan="2" valign="top" style="padding-left:15px;padding-right:30px;padding-bottom:10px;font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;text-align:center
                                        ">
                                        pada tanggal : {{ date('d-m-Y') }} dinyatakan
                                        @if ($ket == 'I')
                                        Izin
                                        @elseif ($ket == 'S')
                                        Sakit
                                        @elseif ($ket == 'A')
                                        Alpa
                                        @else
                                        Terlambat
                                        @endif


                                    </th>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td bgcolor="#ffffff" align="center">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center"
                                        style="padding: 30px 30px 30px 30px; border-top:1px solid #dddddd;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                @php
                                                $tgl = date('Y-m-d');
                                                @endphp
                                                {{-- <td align="left" style="border-radius: 3px;" bgcolor="#D3D335">
                                                    <a href="{{ route('download_cronjob', ['tgl1' => $tgl]) }}"
                                                        target="_blank"
                                                        style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 11px 22px; border-radius: 2px; border: 1px solid #D3D335; display: inline-block;">Donwload</a>
                                                </td> --}}
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>

                                    <th align="center" colspan="2" valign="top"
                                        style="padding-left:15px;padding-right:30px;padding-bottom:10px;font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                        Email dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.</th>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>

                                    <th align="center" colspan="2" valign="top"
                                        style="padding-left:15px;padding-right:30px;padding-bottom:10px;font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                    </th>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>

                                    <th align="center" colspan="2" valign="top"
                                        style="padding-left:15px;padding-right:30px;padding-bottom:10px;font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                    </th>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
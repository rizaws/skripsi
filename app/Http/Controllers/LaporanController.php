<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;

class LaporanController extends Controller
{
    public function LaporanSiswa(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '';
        } else {
            $id_kelas = $r->id_kelas;
        }


        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        $data =  [
            'title' => 'Data siswa',
            'nm_kelas' => empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
            'kelas' => DB::table('kelas')->get(),
            'siswa' => DB::table('siswa')->where('id_kelas', $id_kelas)->where('lulus', 'T')->get(),
            'id_kelas' => $id_kelas,
        ];
        return view('Laporan.siswa', $data);
    }

    public function qr_siswa_perkelas(Request $r)
    {
        $dompdf = new Dompdf();
        $kelas = DB::selectOne("SELECT * FROM kelas as a left join guru as b on b.id_guru = a.id_guru where a.id_kelas = $r->id_kelas");
        $data = [
            'title' => 'Laporan data siswa',
            'nm_kelas' => empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
            'kelas' => $kelas,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
            'siswa' => DB::selectOne("SELECT count(a.id_siswa) as jml_siswa FROM siswa as a where a.id_kelas = $r->id_kelas"),
            'id_kelas' => $r->id_kelas
        ];
        return view('Laporan.qr.qr_siswa', $data);
    }
    public function print_siswa(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '1';
        } else {
            $id_kelas = $r->id_kelas;
        }


        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        $data =  [
            'title' => 'Data siswa',
            'nm_kelas' => $kelas->kelas . $kelas->huruf,
            'kelas' => DB::table('kelas')->get(),
            'siswa' => DB::table('siswa')->where('id_kelas', $id_kelas)->get(),
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
            'id_kelas' => $id_kelas,
        ];
        return view('Laporan.print.siswa', $data);
    }
    public function LaporanGuru(Request $r)
    {
        if (empty($r->id_mapel)) {
            $guru =  DB::table('guru')->get();
        } else {
            $guru = DB::table('guru')->where('id_mapel', $r->id_mapel)->get();
        }

        $data =  [
            'title' => 'Data Guru',
            'nm_mapel' => DB::table('mapel')->where('id_mapel', $r->id_mapel)->first(),
            'mapel' => DB::table('mapel')->get(),
            'guru' => $guru,
            'id_mapel' => $r->id_mapel,
        ];
        return view('laporan.guru', $data);
    }

    public function qr_guru(Request $r)
    {
        if (empty($r->id_mapel)) {
            $guru =  DB::selectOne("SELECT count(a.id_guru) as jlh_guru FROM guru as a");
        } else {
            $guru = DB::selectOne("SELECT count(a.id_guru) as jlh_guru FROM guru as a where a.id_mapel = $r->id_mapel");
        }

        $data =  [
            'title' => 'Data Guru',
            'nm_mapel' => DB::table('mapel')->where('id_mapel', $r->id_mapel)->first(),
            'mapel' => DB::table('mapel')->get(),
            'guru' => $guru,
            'id_mapel' => $r->id_mapel,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
        ];
        return view('laporan.qr.qr_guru', $data);
    }
    public function print_guru(Request $r)
    {
        if (empty($r->id_mapel)) {
            $guru =  DB::table('guru')->get();
        } else {
            $guru = DB::table('guru')->where('id_mapel', $r->id_mapel)->get();
        }

        $data =  [
            'title' => 'Data Guru',
            'nm_mapel' => DB::table('mapel')->where('id_mapel', $r->id_mapel)->first(),
            'mapel' => DB::table('mapel')->get(),
            'guru' => $guru,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
            'id_mapel' => $r->id_mapel,
        ];
        return view('laporan.print.guru', $data);
    }

    public function LaporanAbsen(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '';
        } else {
            $id_kelas = $r->id_kelas;
        }
        if (empty($r->tgl1)) {
            $tgl1 = date('Y-m-01');
            $tgl2 = date('Y-m-t');
        } else {
            $tgl1 = $r->tgl1;
            $tgl2 = $r->tgl2;
        }


        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        $data =  [
            'title' => 'Data Absen siswa',
            'nm_kelas' => empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
            'kelas' => DB::table('kelas')->get(),
            'siswa' => DB::table('siswa')->where('id_kelas', $id_kelas)->get(),
            'id_kelas' => $id_kelas,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,

        ];
        return view('laporan.absen', $data);
    }

    public function qr_absensi_siswa(Request $r)
    {
        $kelas = DB::selectOne("SELECT * FROM kelas as a left join guru as b on b.id_guru = a.id_guru where a.id_kelas = $r->id_kelas");
        $data = [
            'title' => 'Laporan data siswa',
            'nm_kelas' => empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
            'kelas' => $kelas,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
            'siswa' => DB::selectOne("SELECT count(a.id_siswa) as jml_siswa FROM siswa as a where a.id_kelas = $r->id_kelas"),
            'id_kelas' => $r->id_kelas,
            'tgl1' => $r->tgl1,
            'tgl2' => $r->tgl2
        ];
        return view('Laporan.qr.qr_absen', $data);
    }

    public function print_absen(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '1';
        } else {
            $id_kelas = $r->id_kelas;
        }
        if (empty($r->tgl1)) {
            $tgl1 = date('Y-m-01');
            $tgl2 = date('Y-m-t');
        } else {
            $tgl1 = $r->tgl1;
            $tgl2 = $r->tgl2;
        }


        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        $data =  [
            'title' => 'Data Absen siswa',
            'nm_kelas' => empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
            'kelas' => DB::table('kelas')->get(),
            'siswa' => DB::table('siswa')->where('id_kelas', $id_kelas)->get(),
            'laki' => DB::selectOne("SELECT count(a.jenis_kelamin) as laki FROM siswa as a where a.id_kelas = $id_kelas and a.jenis_kelamin = 'L'"),
            'perempuan' => DB::selectOne("SELECT count(a.jenis_kelamin) as perempuan FROM siswa as a where a.id_kelas = $id_kelas and a.jenis_kelamin = 'P'"),
            'id_kelas' => $id_kelas,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),

        ];
        return view('laporan.print.absen', $data);
    }
    public function LaporanJadwalPelajaran(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '0';
        } else {
            $id_kelas = $r->id_kelas;
        }


        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        $data =  [
            'title' => 'Data Jadwal Pelajaran',
            'nm_kelas' => empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
            'kelas' => DB::table('kelas')->get(),
            'jadwal' => DB::table('jadwalmapel')->where('id_kelas', $id_kelas)->get(),
            'id_kelas' => $id_kelas,
            'hari' => DB::table('hari')->get(),
            'jam_belajar' => DB::table('jam_belajar')->get(),
            'mapel' => DB::table('mapel')->get(),

        ];
        return view('laporan.jadwal_pelajaran', $data);
    }

    public function print_jadwal(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '1';
        } else {
            $id_kelas = $r->id_kelas;
        }


        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        $data =  [
            'title' => 'Data Jadwal Pelajaran',
            'nm_kelas' => $kelas->kelas . $kelas->huruf,
            'kelas' => DB::table('kelas')->get(),
            'jadwal' => DB::table('jadwalmapel')->where('id_kelas', $id_kelas)->get(),
            'id_kelas' => $id_kelas,
            'hari' => DB::table('hari')->get(),
            'jam_belajar' => DB::table('jam_belajar')->get(),
            'mapel' => DB::table('mapel')->get(),
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
        ];
        return view('laporan.print.jadwal_pelajaran', $data);
    }

    public function qr_jadwal(Request $r)
    {
        $kelas = DB::selectOne("SELECT * FROM kelas as a left join guru as b on b.id_guru = a.id_guru where a.id_kelas = $r->id_kelas");
        $data = [
            'title' => 'Laporan data siswa',
            'nm_kelas' => empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
            'kelas' => $kelas,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
            'siswa' => DB::selectOne("SELECT count(a.id_siswa) as jml_siswa FROM siswa as a where a.id_kelas = $r->id_kelas"),
            'id_kelas' => $r->id_kelas,
            'tgl1' => $r->tgl1,
            'tgl2' => $r->tgl2
        ];
        return view('Laporan.qr.qr_jadwal', $data);
    }
    public function LaporanNilaiRapor(Request $r)
    {
        $id_mapel = $r->id_mapel;
        $data =  [
            'title' => 'Data Nilai',
            'nm_mapel' => DB::table('mapel')->where('id_mapel', $r->id_mapel)->first(),
            'mapel' => DB::table('mapel')->get(),
            'kelas' => DB::table('kelas')->get(),
        ];
        return view('laporan.nilai', $data);
    }
    public function qr_nilai_siswa(Request $r)
    {
        $kelas = DB::selectOne("SELECT * FROM kelas as a left join guru as b on b.id_guru = a.id_guru where a.id_kelas = $r->id_kelas");
        $data = [
            'title' => 'Data Nilai Rapor',
            'siswa' => DB::selectOne("SELECT count(a.id_siswa) as jml_siswa FROM siswa as a where a.id_kelas = $r->id_kelas"),
            'mapel' => DB::table('mapel')->where('id_mapel', $r->id_mapel)->first(),
            'kelas' => $kelas,
            'id_kelas' => $r->id_kelas,
            'id_mapel' => $r->id_mapel,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),

        ];
        return view('laporan.qr.nilai', $data);
    }
    public function get_nilai_siswa(Request $r)
    {
        $data = [
            'title' => 'Data Nilai Rapor',
            'siswa' => DB::table('siswa')->where('id_kelas', $r->id_kelas)->get(),
            'mapel' => DB::table('mapel')->where('id_mapel', $r->id_mapel)->first(),
            'kelas' => DB::table('kelas')->where('id_kelas', $r->id_kelas)->first(),
            'id_kelas' => $r->id_kelas,
            'id_mapel' => $r->id_mapel

        ];
        return view('laporan.get_nilai', $data);
    }

    public function print_nilai(Request $r)
    {
        $data = [
            'title' => 'Data Nilai Rapor',
            'siswa' => DB::table('siswa')->where('id_kelas', $r->id_kelas)->get(),
            'mapel' => DB::table('mapel')->where('id_mapel', $r->id_mapel)->first(),
            'kelas' => DB::table('kelas')->where('id_kelas', $r->id_kelas)->first(),
            'id_kelas' => $r->id_kelas,
            'id_mapel' => $r->id_mapel,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),

        ];
        return view('laporan.print.nilai', $data);
    }
    public function LaporanAnggotaEskul(Request $r)
    {
        if (empty($r->id_ekskul) || $r->id_ekskul == '0') {
            $ekskul = DB::select("SELECT * FROM anggota_ekskul as a 
            left join siswa as b on b.id_siswa = a.id_siswa 
            left join kelas as c on c.id_kelas = b.id_kelas
            left join ekskul as d on d.id_ekskul = a.id_ekskul
            order by a.id_anggota_ekskul");
            $id_ekskul = '0';
        } else {
            $id_ekskul = $r->id_ekskul;
            $ekskul = DB::select("SELECT * FROM anggota_ekskul as a 
            left join siswa as b on b.id_siswa = a.id_siswa 
            left join kelas as c on c.id_kelas = b.id_kelas
            left join ekskul as d on d.id_ekskul = a.id_ekskul
            where a.id_ekskul = $r->id_ekskul
            order by a.id_anggota_ekskul");
        }
        $nm_eskul = DB::table('ekskul')->where('id_ekskul', $id_ekskul)->first();

        $data = [
            'title' => 'Data anggota ekskul',
            'ekskul' => DB::table('ekskul')->orderBy('id_ekskul', 'DESC')->get(),
            'anggota' => $ekskul,
            'nm_ekskul' => empty($nm_eskul->nm_ekskul) ? 'Semua Ekskul' : $nm_eskul->nm_ekskul,
            'id_ekskul' => $id_ekskul,
            'kelas' => DB::table('kelas')->get()
        ];
        return view('laporan.ekskul', $data);
    }

    public function qr_ekskul(Request $r)
    {

        if (empty($r->id_ekskul) || $r->id_ekskul == '0') {
            $ekskul = DB::select("SELECT * FROM anggota_ekskul as a 
            left join siswa as b on b.id_siswa = a.id_siswa 
            left join kelas as c on c.id_kelas = b.id_kelas
            left join ekskul as d on d.id_ekskul = a.id_ekskul
            order by a.id_anggota_ekskul");
            $id_ekskul = '0';
        } else {
            $id_ekskul = $r->id_ekskul;
            $ekskul = DB::select("SELECT * FROM anggota_ekskul as a 
            left join siswa as b on b.id_siswa = a.id_siswa 
            left join kelas as c on c.id_kelas = b.id_kelas
            left join ekskul as d on d.id_ekskul = a.id_ekskul
            where a.id_ekskul = $r->id_ekskul
            order by a.id_anggota_ekskul");
        }
        $nm_eskul = DB::table('ekskul')->where('id_ekskul', $id_ekskul)->first();

        $data = [
            'title' => 'Data anggota ekskul',
            'ekskul' => DB::table('ekskul')->orderBy('id_ekskul', 'DESC')->get(),
            'anggota' => $ekskul,
            'nm_ekskul' => empty($nm_eskul->nm_ekskul) ? 'Semua Ekskul' : $nm_eskul->nm_ekskul,
            'id_ekskul' => $id_ekskul,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
            'kelas' => DB::table('kelas')->get()
        ];
        return view('laporan.qr.ekskul', $data);
    }

    public function print_ekskul(Request $r)
    {

        if (empty($r->id_ekskul) || $r->id_ekskul == '0') {
            $ekskul = DB::select("SELECT * FROM anggota_ekskul as a 
            left join siswa as b on b.id_siswa = a.id_siswa 
            left join kelas as c on c.id_kelas = b.id_kelas
            left join ekskul as d on d.id_ekskul = a.id_ekskul
            order by a.id_anggota_ekskul");
            $id_ekskul = '0';
        } else {
            $id_ekskul = $r->id_ekskul;
            $ekskul = DB::select("SELECT * FROM anggota_ekskul as a 
            left join siswa as b on b.id_siswa = a.id_siswa 
            left join kelas as c on c.id_kelas = b.id_kelas
            left join ekskul as d on d.id_ekskul = a.id_ekskul
            where a.id_ekskul = $r->id_ekskul
            order by a.id_anggota_ekskul");
        }
        $nm_eskul = DB::table('ekskul')->where('id_ekskul', $id_ekskul)->first();

        $data = [
            'title' => 'Data anggota ekskul',
            'ekskul' => DB::table('ekskul')->orderBy('id_ekskul', 'DESC')->get(),
            'anggota' => $ekskul,
            'nm_ekskul' => empty($nm_eskul->nm_ekskul) ? 'Semua Ekskul' : $nm_eskul->nm_ekskul,
            'id_ekskul' => $id_ekskul,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
            'kelas' => DB::table('kelas')->get()
        ];
        return view('laporan.print.ekskul', $data);
    }
    public function LaporanPrestasiSiswa(Request $r)
    {
        if (Auth::user()->level == 'siswa') {
            $id_kelas = '0';
            $siswa =  DB::table("siswa")->where('nisn',Auth::user()->username)->first();
            $prestasi = DB::select("SELECT * FROM prestasi as a 
            left join siswa as b on b.id_siswa = a.id_siswa 
            left join kelas as c on c.id_kelas = b.id_kelas 
            where a.id_siswa = '$siswa->id_siswa'
            ");
        } else {
            if (empty($r->id_kelas)) {
                $id_kelas = '0';
                $prestasi = DB::select("SELECT * FROM prestasi as a 
                left join siswa as b on b.id_siswa = a.id_siswa 
                left join kelas as c on c.id_kelas = b.id_kelas 
                ");
            } else {
                $id_kelas = $r->id_kelas;
                $prestasi = DB::select("SELECT * FROM prestasi as a 
                left join siswa as b on b.id_siswa = a.id_siswa 
                left join kelas as c on c.id_kelas = b.id_kelas 
                where b.id_kelas = '$r->id_kelas'
                ");
            }
        }
        
        


        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        $data =  [
            'title' => 'Data prestasi siswa ',
            'nm_kelas' => empty($kelas->kelas) ? 'Semua siswa' : $kelas->kelas . $kelas->huruf,
            'kelas' => DB::table('kelas')->get(),
            'prestasi' => $prestasi,
            'id_kelas' => $id_kelas,
            'level' =>Auth::user()->level
        ];
        return view('laporan.prestasi', $data);
    }

    public function qr_prestasi(Request $r)
    {
        if (Auth::user()->level == 'siswa') {
            $id_kelas = '0';
            $siswa =  DB::table("siswa")->where('nisn',Auth::user()->username)->first();
            $prestasi = DB::select("SELECT * FROM prestasi as a 
            left join siswa as b on b.id_siswa = a.id_siswa 
            left join kelas as c on c.id_kelas = b.id_kelas 
            where a.id_siswa = '$siswa->id_siswa'
            ");
        } else {
            if (empty($r->id_kelas)) {
                $id_kelas = '0';
                $prestasi = DB::select("SELECT * FROM prestasi as a 
                left join siswa as b on b.id_siswa = a.id_siswa 
                left join kelas as c on c.id_kelas = b.id_kelas 
                ");
            } else {
                $id_kelas = $r->id_kelas;
                $prestasi = DB::select("SELECT * FROM prestasi as a 
                left join siswa as b on b.id_siswa = a.id_siswa 
                left join kelas as c on c.id_kelas = b.id_kelas 
                where b.id_kelas = '$r->id_kelas'
                ");
            }
        }


        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        $data =  [
            'title' => 'Data prestasi siswa ',
            'nm_kelas' => empty($kelas->kelas) ? 'Semua siswa' : $kelas->kelas . $kelas->huruf,
            'kelas' => DB::table('kelas')->get(),
            'prestasi' => $prestasi,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
            'id_kelas' => $id_kelas,
        ];
        return view('laporan.qr.prestasi', $data);
    }

    public function print_prestasi(Request $r)
    {
        if (Auth::user()->level == 'siswa') {
            $id_kelas = '0';
            $siswa =  DB::table("siswa")->where('nisn',Auth::user()->username)->first();
            $prestasi = DB::select("SELECT * FROM prestasi as a 
            left join siswa as b on b.id_siswa = a.id_siswa 
            left join kelas as c on c.id_kelas = b.id_kelas 
            where a.id_siswa = '$siswa->id_siswa'
            ");
        } else {
            if (empty($r->id_kelas)) {
                $id_kelas = '0';
                $siswa ="null";
                $prestasi = DB::select("SELECT * FROM prestasi as a 
                left join siswa as b on b.id_siswa = a.id_siswa 
                left join kelas as c on c.id_kelas = b.id_kelas 
                ");
            } else {
                $id_kelas = $r->id_kelas;
                $siswa ="null";
                $prestasi = DB::select("SELECT * FROM prestasi as a 
                left join siswa as b on b.id_siswa = a.id_siswa 
                left join kelas as c on c.id_kelas = b.id_kelas 
                where b.id_kelas = '$r->id_kelas'
                ");
            }
        }


        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        $data =  [
            'title' => 'Data prestasi siswa ',
            'siswa' => $siswa,
            'nm_kelas' => empty($kelas->kelas) ? 'Semua siswa' : $kelas->kelas . $kelas->huruf,
            'kelas' => DB::table('kelas')->get(),
            'prestasi' => $prestasi,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
            'id_kelas' => $id_kelas,
            'level' =>Auth::user()->level
        ];
        return view('laporan.print.prestasi', $data);
    }
    public function LaporanRaporSiswa(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '1';
        } else {
            $id_kelas = $r->id_kelas;
        }
        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        $data =  [
            'title' => 'Data siswa',
            'nm_kelas' => empty($kelas->kelas) ? '' : $kelas->kelas . $kelas->huruf,
            'kelas' => DB::table('kelas')->get(),
            'siswa' => DB::table('siswa')->where('id_kelas', $id_kelas)->get(),
            'id_kelas' => $id_kelas,
        ];
        return view('laporan.rapor', $data);
    }

    public function qr_rapor(Request $r)
    {
        $siswa = DB::table('siswa')->join('kelas', 'kelas.id_kelas', 'siswa.id_kelas')->where('nisn', $r->nisn)->first();

        $data = [
            'title' => 'Print Rapor Siswa',
            'id_siswa' => $siswa->id_siswa,
            'siswa' => $siswa,
            'mapel' => DB::table('mapel')->get(),
            'ekskul' => DB::select("SELECT b.nm_ekskul FROM anggota_ekskul as a 
            left join ekskul as b on b.id_ekskul = a.id_ekskul
            where a.id_siswa = '$siswa->id_siswa'"),
            'wali_kelas' => DB::selectOne("SELECT * FROM kelas as a left join guru as b on b.id_guru = a.id_guru where a.id_kelas = $siswa->id_kelas"),
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
        ];
        return view('laporan.qr.rapor', $data);
    }

    public function print_rapor(Request $r)
    {
        $siswa = DB::table('siswa')->join('kelas', 'kelas.id_kelas', 'siswa.id_kelas')->where('id_siswa', $r->id_siswa)->first();

        $data = [
            'title' => 'Print Rapor Siswa',
            'id_siswa' => $r->id_siswa,
            'siswa' => $siswa,
            'mapel' => DB::table('mapel')->get(),
            'ekskul' => DB::select("SELECT b.nm_ekskul FROM anggota_ekskul as a 
            left join ekskul as b on b.id_ekskul = a.id_ekskul
            where a.id_siswa = '$r->id_siswa'"),
            'wali_kelas' => DB::selectOne("SELECT * FROM kelas as a left join guru as b on b.id_guru = a.id_guru where a.id_kelas = $siswa->id_kelas"),
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
        ];
        return view('laporan.print.rapor', $data);
    }

    public function LaporanAbsenGuru(Request $r)
    {
        if (empty($r->tgl1)) {
            $tgl1 = date('Y-m-01');
            $tgl2 = date('Y-m-t');
        } else {
            $tgl1 = $r->tgl1;
            $tgl2 = $r->tgl2;
        }
        $data =  [
            'title' => 'Data Absen Guru',
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'guru' => DB::table('guru')->get()

        ];
        return view('laporan.absen_guru', $data);
    }
    public function QrAbsenGuru(Request $r)
    {
        if (empty($r->tgl1)) {
            $tgl1 = date('Y-m-01');
            $tgl2 = date('Y-m-t');
        } else {
            $tgl1 = $r->tgl1;
            $tgl2 = $r->tgl2;
        }
        $data =  [
            'title' => 'Data Absen Guru',
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'guru' => DB::selectOne("SELECT count(a.id_guru) as jml_guru FROM guru as a "),
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),

        ];
        return view('laporan.qr.absen_guru', $data);
    }

    public function print_absen_guru(Request $r)
    {
        $tgl1 = $r->tgl1;
        $tgl2 = $r->tgl2;
        $data =  [
            'title' => 'Data Absen Guru',
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'guru' => DB::table('guru')->get(),
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),

        ];
        return view('laporan.print.absen_guru', $data);
    }

    public function LaporanAbsen_mapel(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '';
        } else {
            $id_kelas = $r->id_kelas;
        }
        if (empty($r->id_mapel)) {
            $id_mapel = '';
        } else {
            $id_mapel = $r->id_mapel;
        }
        if (empty($r->tgl1)) {
            $tgl1 = date('Y-m-01');
            $tgl2 = date('Y-m-t');
        } else {
            $tgl1 = $r->tgl1;
            $tgl2 = $r->tgl2;
        }
        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        $data =  [
            'title' => 'Data Absen Per Mapel',
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'kelas' => DB::table('kelas')->get(),
            'mapel' => DB::table('mapel')->get(),
            'siswa' => DB::table('siswa')->where('id_kelas', $id_kelas)->get(),
            'nm_kelas' =>   empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
            'id_kelas' => $id_kelas,
            'id_mapel' => $id_mapel,

        ];
        return view('laporan.absen_mapel', $data);
    }

    public function qr_absensi_mapel(Request $r)
    {
        $kelas = DB::selectOne("SELECT * FROM kelas as a left join guru as b on b.id_guru = a.id_guru where a.id_kelas = $r->id_kelas");
        $data = [
            'title' => 'Laporan data siswa',
            'nm_kelas' => empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
            'kelas' => $kelas,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),
            'siswa' => DB::selectOne("SELECT count(a.id_siswa) as jml_siswa FROM siswa as a where a.id_kelas = $r->id_kelas"),
            'tgl1' => $r->tgl1,
            'tgl2' => $r->tgl2,
            'mapel' => DB::table('mapel')->where('id_mapel', $r->id_mapel)->first(),
            'id_kelas' => $r->id_kelas,
            'id_mapel' => $r->id_mapel,
        ];
        return view('Laporan.qr.qr_absen_mapel', $data);
    }

    public function print_absen_mapel(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '';
        } else {
            $id_kelas = $r->id_kelas;
        }
        if (empty($r->id_mapel)) {
            $id_mapel = '';
        } else {
            $id_mapel = $r->id_mapel;
        }
        if (empty($r->tgl1)) {
            $tgl1 = date('Y-m-01');
            $tgl2 = date('Y-m-t');
        } else {
            $tgl1 = $r->tgl1;
            $tgl2 = $r->tgl2;
        }
        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        $data =  [
            'title' => 'Data Absen Per Mapel',
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'kelas' => DB::table('kelas')->get(),
            'mapel' => DB::table('mapel')->get(),
            'siswa' => DB::table('siswa')->where('id_kelas', $id_kelas)->get(),
            'nm_kelas' =>   empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
            'id_kelas' => $id_kelas,
            'id_mapel' => $id_mapel,
            'kepsek' => DB::table('guru')->where('posisi', 'kepsek')->first(),

        ];
        return view('laporan.print.absen_mapel', $data);
    }
}

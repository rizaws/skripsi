<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function LaporanSiswa(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '1';
        } else {
            $id_kelas = $r->id_kelas;
        }
        
       
       $kelas = DB::table('kelas')->where('id_kelas',$id_kelas)->first();
       $data =  [
        'title' => 'Data siswa',
        'nm_kelas' => $kelas->nm_kelas,
        'kelas' => DB::table('kelas')->get(),
        'siswa' => DB::table('siswa')->where('id_kelas',$id_kelas)->get(),
        'id_kelas' => $id_kelas,
       ];
       return view('Laporan.siswa',$data);
    }
    public function print_siswa(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '1';
        } else {
            $id_kelas = $r->id_kelas;
        }
        
       
       $kelas = DB::table('kelas')->where('id_kelas',$id_kelas)->first();
       $data =  [
        'title' => 'Data siswa',
        'nm_kelas' => $kelas->nm_kelas,
        'kelas' => DB::table('kelas')->get(),
        'siswa' => DB::table('siswa')->where('id_kelas',$id_kelas)->get(),
        'id_kelas' => $id_kelas,
       ];
       return view('Laporan.print.siswa',$data);
    }
    public function LaporanGuru(Request $r)
    {
        if (empty($r->id_mapel)) {
            $guru =  DB::table('guru')->get();
        } else {
           $guru = DB::table('guru')->where('id_mapel',$r->id_mapel)->get();
        }

       $data =  [
        'title' => 'Data Guru',
        'nm_mapel' => DB::table('mapel')->where('id_mapel',$r->id_mapel)->first(),
        'mapel' => DB::table('mapel')->get(),
        'guru' => $guru,
        'id_mapel' => $r->id_mapel,
       ];
       return view('laporan.guru',$data);
    }
    public function print_guru(Request $r)
    {
        if (empty($r->id_mapel)) {
            $guru =  DB::table('guru')->get();
        } else {
           $guru = DB::table('guru')->where('id_mapel',$r->id_mapel)->get();
        }

       $data =  [
        'title' => 'Data Guru',
        'nm_mapel' => DB::table('mapel')->where('id_mapel',$r->id_mapel)->first(),
        'mapel' => DB::table('mapel')->get(),
        'guru' => $guru,
        'id_mapel' => $r->id_mapel,
       ];
       return view('laporan.print.guru',$data);
    }
    public function LaporanAbsen(Request $r)
    {
        # code...
    }
    public function LaporanJadwalPelajaran(Request $r)
    {
        # code...
    }
    public function LaporanNilaiRapor(Request $r)
    {
        # code...
    }
    public function LaporanAnggotaEskul(Request $r)
    {
        # code...
    }
    public function LaporanPrestasiSiswa(Request $r)
    {
        # code...
    }
    public function LaporanRaporSiswa(Request $r)
    {
        # code...
    }
}

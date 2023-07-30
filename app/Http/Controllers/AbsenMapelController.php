<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenMapelController extends Controller
{
    public function index(Request $r)
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
        if (empty($r->tgl)) {
            $tgl = date('Y-m-d');
        } else {
            $tgl = $r->tgl;
        }
        $kelas = DB::table('kelas')->where('id_kelas',$id_kelas)->first();
        $data =  [
            'title' => 'Data Absen siswa per Mapel',
            'kelas' => DB::table('kelas')->get(),
            'mapel' => DB::table('mapel')->get(),
            'siswa' => DB::table('siswa')->where('id_kelas',$id_kelas)->get(),
            'tgl' => $tgl,
            'nm_kelas' =>   empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
            'id_kelas' => $id_kelas,
            'id_mapel' => $id_mapel,
           ];
           return view('AbsenMapel.index',$data);
    }

    public function get_absen(Request $r)
    {
        $id_kelas = $r->id_kelas;
        $id_mapel = $r->id_mapel;
        $tgl = $r->tgl;
        $kelas = DB::table('kelas')->where('id_kelas',$id_kelas)->first();
        $data =  [
            'title' => 'Data Absen siswa',
            'nm_kelas' => empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
            'kelas' => DB::table('kelas')->get(),
            'siswa' => DB::table('siswa')->where('id_kelas',$id_kelas)->get(),
            'id_kelas' => $id_kelas,
            'id_mapel' => $id_mapel,
            'tgl' => $tgl
            
        ];
       return view('AbsenMapel.get_absen',$data);
    }

    public function save_absenMapel(Request $r)
    {
        $id_siswa = $r->id_siswa;
        $tgl = $r->tgl;

        DB::table('absen_mapel')->where(['id_siswa'=>$id_siswa,'tgl'=>$tgl,'id_mapel'=>$r->id_mapel])->delete();
        $data = [
            'id_siswa' => $id_siswa,
            'id_mapel' => $r->id_mapel,
            'ket' => $r->ket,
            'tgl' => $tgl
        ];
        DB::table('absen_mapel')->insert($data);
    }
    public function btl_absenMapel(Request $r)
    {
        $id_siswa = $r->id_siswa;
        $tgl = $r->tgl;

        DB::table('absen_mapel')->where(['id_siswa'=>$id_siswa,'tgl'=>$tgl,'id_mapel' => $r->id_mapel])->delete();
    }
}

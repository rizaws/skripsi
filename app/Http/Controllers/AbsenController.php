<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    public function index(Request $r){
        if (empty($r->id_kelas)) {
            $id_kelas = '1';
        } else {
            $id_kelas = $r->id_kelas;
        }
        if (empty($r->tgl)) {
            $tgl = date('Y-m-d');
        } else {
            $tgl = $r->tgl;
        }
        
       
       $kelas = DB::table('kelas')->where('id_kelas',$id_kelas)->first();
       $data =  [
        'title' => 'Data Absen siswa',
        'nm_kelas' => $kelas->nm_kelas,
        'kelas' => DB::table('kelas')->get(),
        'siswa' => DB::table('siswa')->where('id_kelas',$id_kelas)->get(),
        'id_kelas' => $id_kelas,
        'tgl' => $tgl
        
       ];
       return view('Absen.index',$data);
    }

    public function get_absen(Request $r){
       $id_kelas = $r->id_kelas;
       $tgl = $r->tgl;
       $kelas = DB::table('kelas')->where('id_kelas',$id_kelas)->first();
       $data =  [
        'title' => 'Data Absen siswa',
        'nm_kelas' => $kelas->nm_kelas,
        'kelas' => DB::table('kelas')->get(),
        'siswa' => DB::table('siswa')->where('id_kelas',$id_kelas)->get(),
        'id_kelas' => $id_kelas,
        'tgl' => $tgl
        
       ];
       return view('Absen.get_absen',$data);
    }

    public function save_absen(Request $r)
    {
        $id_siswa = $r->id_siswa;
        $tgl = $r->tgl;

        DB::table('absen')->where(['id_siswa'=>$id_siswa,'tgl'=>$tgl])->delete();

        $data = [
            'id_siswa' => $id_siswa,
            'ket' => $r->ket,
            'tgl' => $tgl
        ];
        DB::table('absen')->insert($data);
    }
    public function btl_absen(Request $r)
    {
        $id_siswa = $r->id_siswa;
        $tgl = $r->tgl;

        DB::table('absen')->where(['id_siswa'=>$id_siswa,'tgl'=>$tgl])->delete();
    }
}

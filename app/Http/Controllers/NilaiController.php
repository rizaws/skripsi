<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index(Request $r)
    {
        
       $id_mapel = $r->id_mapel;
       $data =  [
        'title' => 'Data Nilai Rapor',
        'nm_mapel' => DB::table('mapel')->where('id_mapel',$r->id_mapel)->first(),
        'mapel' => DB::table('mapel')->get(),
        'kelas' => DB::table('kelas')->get(),
        'guru' => DB::table('guru')->where('nip',Auth::user()->username)->first(),
       ];
       return view('Nilai_rapor.index',$data);
    }

    public function get_rapor_siswa(Request $r)
    {
        $data = [
            'title' => 'Data Nilai Rapor',
            'siswa' => DB::table('siswa')->where('id_kelas',$r->id_kelas)->where('lulus','T')->get(),
            'mapel' => DB::table('mapel')->where('id_mapel',$r->id_mapel)->first(),
            'kelas' => DB::table('kelas')->where('id_kelas',$r->id_kelas)->first(),
            'guru' => DB::table('guru')->where('nip',Auth::user()->username)->first(),
            'id_kelas' => $r->id_kelas,
            'id_mapel' => $r->id_mapel

        ];
        return view('Nilai_rapor.get_nilai',$data);
    }

    public function save_nilai(Request $r)
    {

        DB::table('nilai')->where(['id_mapel'=>$r->id_mapel,'id_kelas'=> $r->id_kelas])->delete();

       
        
        for ($x=0; $x <count($r->id_siswa) ; $x++) { 
            $data = [
                'id_siswa' => $r->id_siswa[$x],
                'id_mapel' => $r->id_mapel,
                'nilai' => $r->nilai[$x],
                'nilai_wali' => $r->nilai_wali[$x],
                'ket' => $r->ket[$x],
                'ket_wali' => $r->ket_wali[$x],
                'id_kelas'=>$r->id_kelas
            ];
            DB::table('nilai')->insert($data);
        }
    }
}

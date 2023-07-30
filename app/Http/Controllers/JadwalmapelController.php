<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalmapelController extends Controller
{
    public function index(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '0';
        } else {
            $id_kelas = $r->id_kelas;
        }
        
       
       $kelas = DB::table('kelas')->where('id_kelas',$id_kelas)->first();

       
       
       $data =  [
        'title' => 'Data Jadwal Pelajaran',
        'nm_kelas' => empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
        'kelas' => DB::table('kelas')->get(),
        'jadwal' => DB::table('jadwalmapel')->where('id_kelas',$id_kelas)->get(),
        'id_kelas' => $id_kelas,
        'hari' => DB::table('hari')->get(),
        'jam_belajar' => DB::table('jam_belajar')->get(),
        'mapel' => DB::table('mapel')->get(),
       ];
       return view('Jadwalmapel.index',$data);
    }

    public function save_jadwal(Request $r)
    {

        DB::table('jadwalmapel')->where('id_jadwalmapel',$r->id_jadwal)->delete();
        $data=[
            'id_kelas'=> $r->id_kelas,
            'id_mapel'=> $r->id_mapel,
            'id_hari'=> $r->id_hari,
            'id_jam'=> $r->id_jam,
        ];
        DB::table('jadwalmapel')->insert($data);
        return redirect()->route('jadwal_mapel',['id_kelas'=> $r->id_kelas])->with('sukses', 'Berhasil menambah jadwal pelajaran');
    }
}

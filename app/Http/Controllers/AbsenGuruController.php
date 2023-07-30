<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenGuruController extends Controller
{
    public function index(Request $r)
    {
        if (empty($r->tgl)) {
            $tgl = date('Y-m-d');
        } else {
            $tgl = $r->tgl;
        }
       $data =  [
        'title' => 'Data Absen Guru',
        'tgl' => $tgl
        
       ];
       return view('AbsenGuru.index',$data);
    }

    public function get_absenGuru(Request $r)
    {
        $data =  [
            'title' => 'Data Absen Guru',
            'guru' => DB::table('guru')->get(),
            'tgl' => $r->tgl
            
           ];
           return view('AbsenGuru.get_absen',$data);
    }

    public function save_absenGuru(Request $r)
    {
        $id_guru = $r->id_guru;
        $tgl = $r->tgl;

        DB::table('absen_guru')->where(['id_guru'=>$id_guru,'tgl'=>$tgl])->delete();
        $data = [
            'id_guru' => $id_guru,
            'ket' => $r->ket,
            'tgl' => $tgl
        ];
        DB::table('absen_guru')->insert($data);
    }

    public function btl_absenGuru(Request $r)
    {
        $id_guru = $r->id_guru;
        $tgl = $r->tgl;

        DB::table('absen_guru')->where(['id_guru'=>$id_guru,'tgl'=>$tgl])->delete();
    }
}

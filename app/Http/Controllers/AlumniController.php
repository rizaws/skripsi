<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumniController extends Controller
{
    public function index(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '';
        } else {
            $id_kelas = $r->id_kelas;
        }
        
       
       $kelas = DB::table('kelas')->where('id_kelas',$id_kelas)->first();
       $data =  [
        'title' => 'Data alumni',
        'nm_kelas' => empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
        'kelas' => DB::table('kelas')->get(),
        'alumni' => DB::select("SELECT * FROM alumni as a left join siswa as b on b.id_siswa = a.id_siswa"),
        'id_kelas' => $id_kelas,
        'kelas_9' => $kelas
       ];
       return view('Alumni.index',$data);
    }
}

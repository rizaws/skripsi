<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\absenMail;

class AbsenController extends Controller
{
    public function index(Request $r){
        if (empty($r->id_kelas)) {
            $id_kelas = '';
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
        'nm_kelas' =>   empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
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
        'nm_kelas' => empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
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
        $email = DB::table('siswa')->where('id_siswa',$id_siswa)->first();
        $data = [
            'id_siswa' => $id_siswa,
            'ket' => $r->ket,
            'tgl' => $tgl
        ];
        DB::table('absen')->insert($data);
        $id_siswa =  $r->id_siswa;
        $ket =  $r->ket;
        if ($ket == 'M') {
            # code...
        } else {
            Mail::to($email->email)->send(new absenMail($id_siswa,$ket));
        }
        
        
    }
    public function btl_absen(Request $r)
    {
        $id_siswa = $r->id_siswa;
        $tgl = $r->tgl;

        DB::table('absen')->where(['id_siswa'=>$id_siswa,'tgl'=>$tgl])->delete();
    }
}

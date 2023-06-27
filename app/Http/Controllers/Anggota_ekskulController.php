<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Anggota_ekskulController extends Controller
{
    public function index(Request $r)
    {
        if (empty($r->id_ekskul)) {
            $id_ekskul = '1';
        } else {
            $id_ekskul = $r->id_ekskul;
        }
        $nm_eskul = DB::table('ekskul')->where('id_ekskul',$id_ekskul)->first();
        
        $data = [
            'title' => 'Data anggota ekskul',
            'ekskul' => DB::table('ekskul')->orderBy('id_ekskul','DESC')->get(),
            'anggota' => DB::select("SELECT * FROM anggota_ekskul as a left join siswa as b on b.id_siswa = a.id_siswa 
            left join kelas as c on c.id_kelas = b.id_kelas
            where a.id_ekskul = '$id_ekskul' order by a.id_anggota_ekskul"),
            'nm_ekskul' => $nm_eskul->nm_ekskul,
            'id_ekskul' => $id_ekskul,
            'kelas' => DB::table('kelas')->get()
        ];
        return view('Anggota_ekskul.index',$data);
    }

    public function get_siswa(Request $r)
    {
        $siswa = DB::select("SELECT * FROM siswa as a where a.id_kelas = '$r->id_kelas' ");

        echo "<option>-Pilih Siswa-</option>";
        foreach ($siswa as $s) {
            echo "<option value='$s->id_siswa'>$s->nama</option>";
        }
    }

    public function tambah_anggota_ekskul(Request $r)
    {
        $cek = DB::table('anggota_ekskul')->where([['id_siswa',$r->id_siswa],['id_ekskul',$r->id_ekskul]])->first();

        if (empty($cek)) {
            $data = [
                'id_siswa' => $r->id_siswa,
                'id_ekskul' => $r->id_ekskul
            ];
            DB::table('anggota_ekskul')->insert($data);
            return redirect()->route('anggota_ekskul',['id_ekskul'=>$r->id_ekskul])->with('sukses', 'Berhasil tambah data anggota');
        }else{
            return redirect()->route('anggota_ekskul',['id_ekskul'=>$r->id_ekskul])->with('error', 'Siswa sudah terdaftar');
        }
        
    }
}

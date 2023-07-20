<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Anggota_ekskulController extends Controller
{
    public function index(Request $r)
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
        $nm_eskul = DB::table('ekskul')->where('id_ekskul',$id_ekskul)->first();
        
        $data = [
            'title' => 'Data anggota ekskul',
            'ekskul' => DB::table('ekskul')->orderBy('id_ekskul','DESC')->get(),
            'anggota' => $ekskul,
            'nm_ekskul' => empty($nm_eskul->nm_ekskul) ? 'Semua Ekskul' : $nm_eskul->nm_ekskul,
            'id_ekskul' => $id_ekskul,
            'kelas' => DB::table('kelas')->get()
        ];
        return view('Anggota_ekskul.index',$data);
    }

    public function get_siswa(Request $r)
    {
        $siswa = DB::select("SELECT * FROM siswa as a where a.id_kelas = '$r->id_kelas' and a.lulus = 'T' ");

        echo "<option>-Pilih Siswa-</option>";
        foreach ($siswa as $s) {
            echo "<option value='$s->id_siswa'>$s->nama</option>";
        }
    }

    public function get_edit_anggota_ekskul(Request $r)
    {
        $anggota = DB::table('anggota_ekskul')->where('id_anggota_ekskul',$r->id_anggota_ekskul)->first();
        $siswa = DB::table('siswa')->where('id_siswa',$anggota->id_siswa)->first();
        $data = [
            'anggota' => $anggota,
            'kelas' => DB::table('kelas')->get(),
            'id_kelas' => $siswa->id_kelas,
            'ekskul' => DB::table('ekskul')->orderBy('id_ekskul','DESC')->get(),
            'siswa' => DB::table('siswa')->where('id_kelas',$siswa->id_kelas)->get()
        ];
        return view('Anggota_ekskul.get_anggota_ekskul',$data);
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
    public function edit_anggota_ekskul(Request $r)
    {
        $cek = DB::table('anggota_ekskul')->where([['id_siswa',$r->id_siswa],['id_ekskul',$r->id_ekskul]])->first();

        if (empty($cek)) {
            $data = [
                'id_siswa' => $r->id_siswa,
                'id_ekskul' => $r->id_ekskul
            ];
            DB::table('anggota_ekskul')->where('id_anggota_ekskul',$r->id_anggota_ekskul)->update($data);
            return redirect()->route('anggota_ekskul',['id_ekskul'=>$r->id_ekskul])->with('sukses', 'Berhasil tambah data anggota');
        }else{
            return redirect()->route('anggota_ekskul',['id_ekskul'=>$r->id_ekskul])->with('error', 'Siswa sudah terdaftar');
        }
        
    }

    public function delete(Request $r) {
        DB::table('anggota_ekskul')->where('id_anggota_ekskul',$r->id_anggota_ekskul)->delete();
        return redirect()->route('anggota_ekskul')->with('success', 'Berhasil dihapus');
    }
}

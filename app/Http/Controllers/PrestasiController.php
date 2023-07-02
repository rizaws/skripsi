<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestasiController extends Controller
{
    public function Index(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '0';
            $prestasi = DB::select("SELECT * FROM prestasi as a 
            left join siswa as b on b.id_siswa = a.id_siswa 
            left join kelas as c on c.id_kelas = b.id_kelas 
            ");
        } else {
            $id_kelas = $r->id_kelas;
            $prestasi = DB::select("SELECT * FROM prestasi as a 
            left join siswa as b on b.id_siswa = a.id_siswa 
            left join kelas as c on c.id_kelas = b.id_kelas 
            where b.id_kelas = '$r->id_kelas'
            ");
        }
        
       
       $kelas = DB::table('kelas')->where('id_kelas',$id_kelas)->first();
       $data =  [
        'title' => 'Data prestasi siswa ',
        'nm_kelas' => empty($kelas->nm_kelas) ? 'Semua siswa' : $kelas->nm_kelas ,
        'kelas' => DB::table('kelas')->get(),
        'prestasi' => $prestasi,
        'id_kelas' => $id_kelas,
       ];
       return view('prestasi.index',$data);
    }

    public function get_edit_prestasi(Request $r)
    {
        $prestasi = DB::table('prestasi')->where('id_prestasi',$r->id_prestasi)->first();
        $siswa = DB::table('siswa')->where('id_siswa',$prestasi->id_siswa)->first();
        $data = [
            'prestasi' => $prestasi,
            'kelas' => DB::table('kelas')->get(),
            'id_kelas' => $siswa->id_kelas,
            'ekskul' => DB::table('ekskul')->orderBy('id_ekskul','DESC')->get(),
            'siswa' => DB::table('siswa')->where('id_kelas',$siswa->id_kelas)->get()
        ];
        return view('prestasi.get_prestasi',$data);
    }

    public function tambah_siswa_prestasi(Request $r)
    {
        $data = [
            'id_siswa' => $r->id_siswa,
            'prestasi' => $r->prestasi
        ];
        DB::table('prestasi')->insert($data);
        return redirect()->route('prestasi_siswa')->with('sukses', 'Berhasil tambah data prestasi');
    }
    public function edit_prestasi(Request $r)
    {
        $data = [
            'id_siswa' => $r->id_siswa,
            'prestasi' => $r->prestasi
        ];
        DB::table('prestasi')->where('id_prestasi',$r->id_prestasi)->update($data);
        return redirect()->route('prestasi_siswa')->with('sukses', 'Berhasil edit data prestasi');
    }

    public function delete(Request $r) {
        DB::table('prestasi')->where('id_prestasi',$r->id_prestasi)->delete();
        return redirect()->route('prestasi_siswa')->with('success', 'Berhasil dihapus');
    }
}

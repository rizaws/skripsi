<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Daftar Kelas',
            'kelas' => DB::table('kelas')->get()
        ];
        return view('kelas.index', $data);
    }

    public function tambah_kelas(Request $r)
    {
        $data = [
            'nm_kelas'=> $r->nm_kelas
        ];
        DB::table('kelas')->insert($data);
        return redirect()->route('data_kelas')->with('sukses', 'Berhasil disimpan');
    }

    public function delete_kelas(Request $r){
        
        $siswa = DB::table('siswa')->where('id_kelas',$r->id_kelas)->first();

        if (empty($siswa)) {
            DB::table('kelas')->where('id_kelas',$r->id_kelas)->delete();
            return redirect()->route('data_kelas')->with('sukses', 'Berhasil dihapus');
        } else {
            return redirect()->route('data_kelas')->with('error', 'Kelas gagal dihapus');
        }  
    }

    public function get_edit_kelas(Request $r)
    {
        $data = [
            'kelas'=> DB::table('kelas')->where('id_kelas',$r->id_kelas)->first()
        ];
        return view('kelas.get_kelas',$data);
    }

    public function edit_kelas(Request $r)
    {
        $data = [
            'nm_kelas'=> $r->nm_kelas
        ];
        DB::table('kelas')->where('id_kelas',$r->id_kelas)->update($data);
        return redirect()->route('data_kelas')->with('sukses', 'Berhasil disimpan');
    }
}

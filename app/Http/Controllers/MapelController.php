<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Daftar Mata Pelajaran',
            'mapel' => DB::table('mapel')->get()
        ];
        return view('mapel.index', $data);
    }
    public function tambah_mapel(Request $r)
    {
        $data = [
            'nm_mapel'=> $r->nm_mapel
        ];
        DB::table('mapel')->insert($data);
        return redirect()->route('data_mapel')->with('sukses', 'Berhasil disimpan');
    }

    public function delete_mapel(Request $r){
        
        $siswa = DB::table('siswa')->where('id_mapel',$r->id_mapel)->first();

        if (empty($siswa)) {
            DB::table('mapel')->where('id_mapel',$r->id_mapel)->delete();
            return redirect()->route('data_mapel')->with('sukses', 'Berhasil dihapus');
        } else {
            return redirect()->route('data_mapel')->with('error', 'mapel gagal dihapus');
        }
        
        
    }

    public function get_edit_mapel(Request $r)
    {
        $data = [
            'mapel'=> DB::table('mapel')->where('id_mapel',$r->id_mapel)->first()
        ];
        return view('mapel.get_mapel',$data);
    }

    public function edit_mapel(Request $r)
    {
        $data = [
            'nm_mapel'=> $r->nm_mapel
        ];
        DB::table('mapel')->where('id_mapel',$r->id_mapel)->update($data);
        return redirect()->route('data_mapel')->with('sukses', 'Berhasil disimpan');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function index(Request $r)
    {
        if (empty($r->id_mapel)) {
            $guru =  DB::table('guru')->get();
        } else {
           $guru = DB::table('guru')->where('id_mapel',$r->id_mapel)->get();
        }

       $data =  [
        'title' => 'Data Guru',
        'nm_mapel' => DB::table('mapel')->where('id_mapel',$r->id_mapel)->first(),
        'mapel' => DB::table('mapel')->get(),
        'guru' => $guru,
        'id_mapel' => $r->id_mapel,
       ];
       return view('Guru.index',$data);
    }

    public function tambah_data_guru(Request $r)
    {
        $data =  [
            'title' => 'Tambah Data Guru',
            'mapel' => DB::table('mapel')->get(),
           ];
           return view('Guru.tambah',$data);
    }

    public function save_guru(Request $r)
    {
        $data = [
            'nip' => $r->nip,
            'nm_guru'=> $r->nm_guru,
            'tempat_lahir'=> $r->tempat_lahir,
            'tgl_lahir'=> $r->tgl_lahir,
            'jenis_kelamin'=> $r->jenis_kelamin,
            'id_mapel'=> $r->id_mapel,
            'alamat'=> $r->alamat,
        ];
        DB::table('guru')->insert($data);
        return redirect()->route('data_guru')->with('sukses', 'Berhasil tambah data guru');
    }

    public function delete_guru(Request $r)
    {
        DB::table('guru')->where('id_guru',$r->id_guru)->delete();
        return redirect()->route('data_guru')->with('sukses', 'Berhasil hapus data guru');
    }
}

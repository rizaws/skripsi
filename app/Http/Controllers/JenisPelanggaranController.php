<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisPelanggaranController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Daftar Pelanggaran',
            'jenis_pelanggaran' => DB::table('sub_jenis_pelanggaran')->get(),
        ];
        return view('jenis_pelanggaran.index', $data);
    }

    public function tambah_jenis_pelanggaran(Request $r)
    {
        $data = [
            'deskripsi'=> $r->deskripsi,
            'point'=> $r->point,
            'hukuman' => $r->hukuman
        ];
        DB::table('sub_jenis_pelanggaran')->insert($data);
        return redirect()->route('jenis_pelanggaran')->with('sukses', 'Berhasil disimpan');
    }

    public function delete_jenis_pelanggaran(Request $r){
        
        
            DB::table('sub_jenis_pelanggaran')->where('id_sub_pelanggaran',$r->id_sub_pelanggaran)->delete();
            return redirect()->route('jenis_pelanggaran')->with('sukses', 'Berhasil dihapus');
    }

    public function get_edit_jenis_pelanggaran(Request $r)
    {
        $data = [
            'jenis_pelanggaran'=> DB::table('sub_jenis_pelanggaran')->where('id_sub_pelanggaran',$r->id_sub_pelanggaran)->first(),
        ];
        return view('jenis_pelanggaran.get_edit_kelas',$data);
    }

    public function edit_jenis_pelanggaran(Request $r)
    {
        $data = [
            'deskripsi'=> $r->deskripsi,
            'point'=> $r->point,
            'hukuman' => $r->hukuman
        ];
        DB::table('sub_jenis_pelanggaran')->where('id_sub_pelanggaran',$r->id_sub_pelanggaran)->update($data);
        return redirect()->route('jenis_pelanggaran')->with('sukses', 'Berhasil disimpan');
    }
}

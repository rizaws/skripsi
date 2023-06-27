<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EkskulController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Data Ekskul',
            'ekskul' => DB::table('ekskul')->orderBy('id_ekskul','DESC')->get()
        ];
        return view('ekskul.index',$data);
    }

    public function tambah_ekskul(Request $r)
    {
        $data = [
            'nm_ekskul' => $r->nm_ekskul,
            'nm_pembina' => $r->nm_pembina
        ];
        DB::table('ekskul')->insert($data);
        return redirect()->route('ekskul')->with('sukses', 'Berhasil disimpan');
    }

    public function delete_ekskul(Request $r)
    {
        DB::table('ekskul')->where('id_ekskul',$r->id_ekskul)->delete();
        return redirect()->route('ekskul')->with('sukses', 'Berhasil dihapus');
    }
}

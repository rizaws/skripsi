<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jenis Surat',
            'jenisSurat' => JenisSurat::all()
        ];
        return view('jenis_surat.jenis_surat',$data);
    }

    public function tambah_js(Request $r)
    {
        $data = [
            'kd_js' => $r->kd_js,
            'jenis_surat' => $r->jenis_surat,
            'uraian' => $r->uraian,
        ];
        JenisSurat::create($data);
        return redirect()->route('jenis_surat')->with('sukses', 'Tambah jenis surat berhasil');
    }

    public function update(Request $r)
    {
        JenisSurat::find($r->id_js)->update([
            'kd_js' => $r->kd_js,
            'jenis_surat' => $r->jenis_surat,
            'uraian' => $r->uraian,
        ]);
        return redirect()->route('jenis_surat')->with('sukses', 'Berhasil Edit jenis surat');
    }

    public function destroy($id)
    {
        JenisSurat::find($id)->delete();
        return redirect()->route('jenis_surat')->with('sukses', 'Berhasil Hapus jenis surat');
    }
}

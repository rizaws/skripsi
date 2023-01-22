<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $lastNoSurat = SuratKeluar::latest()->first();
        $data = [
            'title' => 'Surat Keluar',
            'suratKeluar' => SuratKeluar::all(),
            'noSurat' => !empty($lastNoSurat) ? $lastNoSurat->no_surat+1 : 1001,
        ];
        return view('surat_keluar.surat_keluar', $data);
    }

    public function store(Request $r)
    {
        $file = $r->file('berkas');
        $fileDiterima = ['pdf', 'jpg', 'png', 'jpeg'];
        $cek = in_array($file->getClientOriginalExtension(), $fileDiterima);
        if($cek) {
            $file->move('upload', $file->getClientOriginalName());
            $data = [
                'no_surat' => $r->no_surat,
                'tgl_surat' => $r->tgl_surat,
                'pengirim' => $r->pengirim,
                'perihal' => $r->perihal,
                'ditujukan' => $r->ditujukan,
                'berkas' => $file->getClientOriginalName(),
            ];
            SuratKeluar::create($data);
            return redirect()->route('surat_keluar')->with('sukses', 'Tambah surat keluar berhasil');
        } else {
            return redirect()->route('surat_keluar')->with('error', 'File tidak didukung');
        }
        
    }

    public function update(Request $r)
    {
        SuratKeluar::find($r->id_surat_keluar)->update([
            'tgl_surat' => $r->tgl_surat,
            'pengirim' => $r->pengirim,
            'perihal' => $r->perihal,
            'ditujukan' => $r->ditujukan,
        ]);
        return redirect()->route('surat_keluar')->with('sukses', 'Berhasil edit surat keluar');
    }

    public function destroy($id)
    {
        SuratKeluar::find($id)->delete();
        return redirect()->route('surat_keluar')->with('sukses', 'Berhasil hapus surat keluar');
    }
}

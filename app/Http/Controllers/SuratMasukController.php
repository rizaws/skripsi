<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::all();
        $lastNoSurat = SuratMasuk::latest()->first()['no_surat'];
       
        $data = [
            'title' => 'Surat Masuk',
            'suratMasuk' => $suratMasuk,
            'noSurat' => $lastNoSurat+1 ?? 1001,
        ];
        
        return view('surat_masuk.surat_masuk', $data);
    }

    public function store(Request $r)
    {
    
        $data = [
            'no_surat' => $r->no_surat,
            'tgl_surat' => $r->tgl_surat,
            'pengirim' => $r->pengirim,
            'perihal' => $r->perihal,
            'sifat_surat' => $r->sifat_surat,
            'ditujukan' => $r->ditujukan,
            'berkas' => $r->berkas,
            'petugas' => $r->petugas,
            'status_disposisi' => 'Belum',
        ];
        SuratMasuk::create($data);
        return redirect()->route('surat_masuk')->with('sukses', 'Tambah surat masuk berhasil');
    }

    public function update(Request $r)
    {
        SuratMasuk::find($r->id_surat_masuk)->update([
            'tgl_surat' => $r->tgl_surat,
            'pengirim' => $r->pengirim,
            'perihal' => $r->perihal,
            'sifat_surat' => $r->sifat_surat,
            'ditujukan' => $r->ditujukan,
            'berkas' => $r->berkas,
            'petugas' => $r->petugas,
        ]);
        return redirect()->route('surat_masuk')->with('sukses', 'Berhasil edit surat masuk');
    }

    public function destroy($id)
    {
        SuratMasuk::find($id)->delete();
        return redirect()->route('surat_masuk')->with('sukses', 'Berhasil hapus surat masuk');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\SuratDisposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPSTORM_META\map;

class SuratDisposisiController extends Controller
{
    public function index()
    {
        $lastNoSurat = SuratDisposisi::latest()->first();
        
        $data = [
            'title' => 'Surat Disposisi',
            'suratMasuk' => SuratMasuk::where('status_disposisi', '!=', 'selesai')->get(),
            'suratDisposisi' => SuratDisposisi::with('suratMasuk')->orderBy('id', 'DESC')->get(),
            'noSurat' => !empty($lastNoSurat) ? $lastNoSurat->no_surat+1 : 1001,
            'js' => JenisSurat::all(),
       ];
        return view('surat_disposisi.surat_disposisi', $data);
    }

    public function tambahSuratDisposisi(Request $r)
    {
        $noAgenda = strtoupper(Str::random(4));
        $sm = SuratMasuk::find($r->id_sm)->update(['status_disposisi' => 'selesai']);
        $data = [
            'id_sm' => $r->id_sm,
            'id_js' => $r->id_js,
            'no_surat' => $r->no_surat,
            'isi_disposisi' => $r->isi_disposisi,
            'no_agenda' => $noAgenda,
            'tgl_disposisi' => date('Y-m-d'),
        ];
        SuratDisposisi::create($data);
        return redirect()->route('surat_disposisi')->with('sukses', 'Berhasil tambah surat disposisi');
    }

    public function update(Request $r) {
        $data = [
            'tgl_disposisi' => $r->tgl_surat,
            'isi_disposisi' => $r->isi_disposisi,
            'id_js' => $r->id_js,
        ];
        SuratDisposisi::find($r->id_disposisi)->update($data);
        return redirect()->route('surat_disposisi')->with('sukses', 'Berhasil edit surat disposisi');
    }

    public function destroy($id,$id_sm)
    {
        SuratMasuk::find($id_sm)->update(['status_disposisi' => 'Belum']);
        SuratDisposisi::find($id)->delete();
        return redirect()->route('surat_disposisi')->with('sukses', 'Berhasil hapus surat disposisi');
    }
}

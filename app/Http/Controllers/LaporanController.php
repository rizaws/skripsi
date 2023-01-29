<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\JenisSurat;
use App\Models\SuratDisposisi;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function suratMasuk($jenis)
    {
        $data = [
            'title' => $jenis == 1 ? 'Laporan Surat Masuk' : 'Laporan Surat Disposisi',
            'pengirim' => $jenis == 1 ? SuratMasuk::all() : SuratDisposisi::with('suratMasuk', 'jenisSurat')->get(),
            'jenis' => $jenis
        ];
        return view('laporan.surat_masuk.view',$data);
    }

    public function saveLapMasuk(Request $r)
    {
        $pengirim = $r->pengirim;
        $suratMasuk = SuratMasuk::whereBetween('tgl_surat', [$r->tgl1,$r->tgl2])->where('pengirim', $pengirim)->get();
        $suratDisposisi = SuratDisposisi::with([
            'suratMasuk' => function($query) use($pengirim) {
                $query->where('pengirim', $pengirim);
            }
        ])->whereBetween('tgl_disposisi', [$r->tgl1, $r->tgl2])->orderBy('id', 'DESC')->get();
        $data = [
            'query' => $r->jenis == 1 ? $suratMasuk : $suratDisposisi,
            'jenis' => $r->jenis,
            'tgl1' => $r->tgl1,
            'tgl2' => $r->tgl2,
            'filter' => 'Pengirim',
            'title' => $r->jenis == 1 ? 'Laporan Surat Masuk' : 'Laporan Surat Disposisi',
        ];

        return view('laporan.surat_masuk.print',$data);

    }

    public function suratKeluar()
    {
        $data = [
            'title' => "Laporan Surat Keluar",
            'datas' => SuratKeluar::all()
        ];
        return view('laporan.surat_keluar.view',$data);
    }

    public function saveLapKeluar(Request $r)
    {
        $data = [
            'query' => SuratKeluar::whereBetween('tgl_surat', [$r->tgl1, $r->tgl2])->where('ditujukan', $r->ditujukan)->get(),
            'tgl1' => $r->tgl1,
            'tgl2' => $r->tgl2,
            'filter' => 'Ditujukan',
            'title' => 'Laporan Surat Keluar'
        ];
        return view('laporan.surat_keluar.print',$data);
    }

    public function jenisSurat()
    {
        $data = [
            'title' => "Laporan Jenis Surat",
            'datas' => JenisSurat::all()
        ];
        return view('laporan.jenis_surat.view',$data);
    }

    public function saveLapJenisSurat(Request $r)
    {
        $data = [
            'query' => JenisSurat::where('kd_js', $r->kode)->get(),
            'title' => 'Laporan Jenis Surat'
        ];
        return view('laporan.jenis_surat.print',$data);
    }

    public function divisi()
    {
        $data = [
            'title' => "Laporan Divisi Surat",
            'datas' => Divisi::all()
        ];
        return view('laporan.divisi.view',$data);
    }

    public function saveLapDivisi(Request $r)
    {
        $data = [
            'query' => Divisi::all(),
            'title' => 'Laporan Divisi Surat'
        ];
        return view('laporan.divisi.print',$data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelanggaranSiswaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Pelanggaran Siswa',
            'pelanggaran' => DB::select("SELECT * FROM pelanggaran as a 
            left join siswa as b on b.id_siswa = a.id_siswa 
            left join kelas as c on c.id_kelas = b.id_kelas
            left join sub_jenis_pelanggaran as d on d.id_sub_pelanggaran = a.id_jenis_pelanggaran
            "),
            'kelas' => DB::table('kelas')->get(),
            'jenis_pelanggaran' => DB::table('sub_jenis_pelanggaran')->get()
        ];
        return view('pelanggaran.index', $data);
    }

    public function tambah_pelanggaran(Request $r)
    {
       $data = [
        'id_siswa' => $r->id_siswa,
        'id_jenis_pelanggaran' => $r->id_jenis_pelanggaran,
        'ket' => $r->ket,
        'tanggal' => $r->tgl,
       ];
       DB::table('pelanggaran')->insert($data);
       return redirect()->route('pelanggaran')->with('sukses', 'Berhasil disimpan');
    }

    public function delete_pelanggaran(Request $r)
    {
        DB::table('pelanggaran')->where('id_pelanggaran',$r->id_pelanggaran)->delete();
        return redirect()->route('pelanggaran')->with('sukses', 'Berhasil dihapus');
    }

    public function get_edit_pelanggaran(Request $r)
    {
        $pelanggaran =  DB::selectOne("SELECT * FROM pelanggaran as a 
        left join siswa as b on b.id_siswa = a.id_siswa 
        left join kelas as c on c.id_kelas = b.id_kelas
        left join sub_jenis_pelanggaran as d on d.id_sub_pelanggaran = a.id_jenis_pelanggaran
        where a.id_pelanggaran = $r->id_pelanggaran
        ");

        $data = [
            'pelanggaran' => $pelanggaran,
            'kelas' => DB::table('kelas')->get(),
            'jenis_pelanggaran' => DB::table('sub_jenis_pelanggaran')->get(),
            'siswa' => DB::table('siswa')->where('id_kelas' , $pelanggaran->id_kelas)->get()
        ];
        return view('pelanggaran.get_pelanggaran',$data);
    }
    public function edit_pelanggaran(Request $r)
    {
       $data = [
        'id_siswa' => $r->id_siswa,
        'id_jenis_pelanggaran' => $r->id_jenis_pelanggaran,
        'ket' => $r->ket,
        'tanggal' => $r->tgl,
       ];
       DB::table('pelanggaran')->where('id_pelanggaran',$r->id_pelanggaran)->update($data);
       return redirect()->route('pelanggaran')->with('sukses', 'Berhasil disimpan');
    }
}

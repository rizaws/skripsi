<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '1';
        } else {
            $id_kelas = $r->id_kelas;
        }
        
       
       $kelas = DB::table('kelas')->where('id_kelas',$id_kelas)->first();
       $data =  [
        'title' => 'Data siswa',
        'nm_kelas' => $kelas->nm_kelas,
        'kelas' => DB::table('kelas')->get(),
        'siswa' => DB::table('siswa')->where('id_kelas',$id_kelas)->get(),
        'id_kelas' => $id_kelas,
       ];
       return view('Siswa.index',$data);
    }

    public function tbh_siswa(Request $r)
    {
        $data =  [
            'title' => 'Data siswa',
            'kelas' => DB::table('kelas')->get(),
            
           ];
        return view('Siswa.add',$data);
    }

    public function save_siswa(Request $r)
    {
        $data = [
            'id_kelas'  => $r->id_kelas,
            'nisn'  => $r->nisn,
            'nama'  => $r->nama,
            'tempat_lahir'  => $r->tempat_lahir,
            'tgl_lahir'  => $r->tgl_lahir,
            'nm_ayah'  => $r->nm_ayah,
            'nm_ibu'  => $r->nm_ibu,
            'no_telp'  => $r->no_telp,
            'email'  => $r->email,
            'alamat'  => $r->alamat,
        ];
        DB::table('siswa')->insert($data);
        return redirect()->route('data_siswa',['id_kelas'=> $r->id_kelas])->with('sukses', 'Berhasil tambah data siswa');
    }

    public function detail(Request $r)
    {
       $id_siswa = $r->id_siswa;
       $data = [
        'siswa' => DB::table('siswa')->where('id_siswa',$id_siswa)->first()
       ];
       return view('Siswa.detail',$data);
    }

    public function delete_siswa(Request $r)
    {
        DB::table('siswa')->where('id_siswa',$r->id_siswa)->delete();
        return redirect()->route('data_siswa',['id_kelas'=> $r->id_kelas])->with('sukses', 'Berhasil menghapus siswa');
    }

    public function edit_siswa(Request $r)
    {
        $data =  [
            'title' => 'Edit data siswa',
            'kelas' => DB::table('kelas')->get(),
            'siswa' => DB::table('siswa')->where('id_siswa',$r->id_siswa)->first()
            
           ];
        return view('Siswa.edit',$data);
    }
    public function save_edit_siswa(Request $r)
    {
        $data = [
            'id_kelas'  => $r->id_kelas,
            'nisn'  => $r->nisn,
            'nama'  => $r->nama,
            'tempat_lahir'  => $r->tempat_lahir,
            'tgl_lahir'  => $r->tgl_lahir,
            'nm_ayah'  => $r->nm_ayah,
            'nm_ibu'  => $r->nm_ibu,
            'no_telp'  => $r->no_telp,
            'email'  => $r->email,
            'alamat'  => $r->alamat,
        ];
        DB::table('siswa')->where('id_siswa',$r->id_siswa)->update($data);
        return redirect()->route('data_siswa',['id_kelas'=> $r->id_kelas])->with('sukses', 'Berhasil tambah data siswa');
    }
}

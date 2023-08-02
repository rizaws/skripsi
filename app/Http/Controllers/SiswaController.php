<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class SiswaController extends Controller
{
    public function index(Request $r)
    {
        if (empty($r->id_kelas)) {
            $id_kelas = '';
        } else {
            $id_kelas = $r->id_kelas;
        }
        
       
       $kelas = DB::table('kelas')->where('id_kelas',$id_kelas)->first();
       $data =  [
        'title' => 'Data siswa',
        'nm_kelas' => empty($kelas) ? '' : $kelas->kelas . $kelas->huruf,
        'kelas' => DB::table('kelas')->get(),
        'siswa' => DB::table('siswa')->where('id_kelas',$id_kelas)->where('lulus','T')->orderBy('id_siswa','DESC')->get(),
        'id_kelas' => $id_kelas,
        'kelas_9' => $kelas
       ];
       return view('Siswa.index',$data);
    }

    public function tbh_siswa(Request $r)
    {
        $tahun = date('y');
        $tahun1 = date('Y');
        $siswa = DB::selectOne("SELECT max(a.urutan)  as urutan FROM siswa as a where a.tahun_ajaran = '$tahun1' group by a.tahun_ajaran ");
        if (empty($siswa->urutan)) {
            $nis = $tahun.'0001';
        }else{
        $nis = $siswa->urutan + 1;
        }
        $data =  [
            'title' => 'Data siswa',
            'kelas' => DB::table('kelas')->get(),
            'nis' => $nis
            
           ];
        return view('Siswa.add',$data);
    }

    public function save_siswa(Request $r)
    {
        $tahun = date('y');
        $tahun1 = date('Y');
        $siswa = DB::selectOne("SELECT max(a.urutan)  as urutan FROM siswa as a where a.tahun_ajaran = '$tahun1' group by a.tahun_ajaran ");
        if (empty($siswa->urutan)) {
            $nis = $tahun.'0001';
         }else{
            $nis = $siswa->urutan + 1;
        }
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
            'jenis_kelamin' => $r->jenis_kelamin,
            'tahun_ajaran' => date('Y'),
            'urutan' => $nis,
        ];
        DB::table('siswa')->insert($data);

        DB::table('users')->insert([
            'name' => $r->nama,
            'username' => $r->nisn,
            'level' => 'siswa',
            'email' => $r->email,
            'password' => Hash::make($r->nisn),
        ]);
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
            'jenis_kelamin'  => $r->jenis_kelamin,
        ];
        DB::table('siswa')->where('id_siswa',$r->id_siswa)->update($data);
        return redirect()->route('data_siswa',['id_kelas'=> $r->id_kelas])->with('sukses', 'Berhasil tambah data siswa');
    }

    public function siswa_lulus(Request $r)
    {
        // $siswa = DB::table('siswa')->where('id_siswa',$r->id_siswa)->first();
        
        $siswa = DB::selectOne("SELECT a.*, b.melanjutkan, b.tgl_lulus  FROM siswa as a left join alumni as b on b.id_siswa = a.id_siswa 
        where a.id_siswa = $r->id_siswa");
       
        $data = [
            'siswa' => $siswa
        ];
        return view('siswa.lulus',$data);
    }

    public function lulus(Request $r)
    {
        DB::table('siswa')->where('id_siswa',$r->id_siswa)->update(['lulus' => 'Y']);
        DB::table('users')->where('username',$r->nisn)->update(['level'=>'alumni']);

        $data = [
            'id_siswa' => $r->id_siswa,
            'melanjutkan' => $r->melanjutkan,
            'tgl_lulus' => $r->tgl_lulus
        ];
        DB::table('alumni')->insert($data);
        return redirect()->route('data_siswa',['id_kelas'=> $r->id_kelas])->with('sukses', 'Berhasil tambah data siswa');
    }
}

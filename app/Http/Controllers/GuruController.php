<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;



class GuruController extends Controller
{
    public function index(Request $r)
    {
        if (empty($r->id_mapel)) {
            $guru =  DB::table('guru')->orderBy('id_guru','DESC')->get();
        } else {
           $guru = DB::table('guru')->where('id_mapel',$r->id_mapel)->orderBy('id_guru','DESC')->get();
        }

       $data =  [
        'title' => 'Data Guru',
        'nm_mapel' => DB::table('mapel')->where('id_mapel',$r->id_mapel)->first(),
        'mapel' => DB::table('mapel')->get(),
        'guru' => $guru,
        'id_mapel' => $r->id_mapel,
       ];
       return view('Guru.index',$data);
    }

    public function tambah_data_guru(Request $r)
    {
        $data =  [
            'title' => 'Tambah Data Guru',
            'mapel' => DB::table('mapel')->get(),
            'guru' => DB::selectOne("SELECT a.nip FROM guru as a where a.posisi = 'kepsek'")
           ];
           return view('Guru.tambah',$data);
    }

    public function edit_guru(Request $r)
    {
        $data = [
            'title' => 'Edit Data Guru',
            'mapel' => DB::table('mapel')->get(),
            'guru' => DB::table('guru')->where('id_guru', $r->id_guru)->first(),
            'kepsek' => DB::selectOne("SELECT a.nip FROM guru as a where a.posisi = 'kepsek'")
        ];
        return view('Guru.edit', $data);
    }

    public function save_guru(Request $request)
    {
        // $validatedData = $request->validate([
        //     'signature' => 'required',
        // ]);

        // $signatureData = $validatedData['signature'];
        
        // $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData));

        // $filename = time() . '.png';

        // $path = public_path('assets/ttd/') . $filename;
        // file_put_contents($path, $imageData);

        // $request->validate([
        //     'username' => ['required', 'string', 'unique:users'],
        // ]);
        DB::table('users')->insert([
            'name' => $request->nm_guru,
            'username' => $request->nip,
            'level' => $request->posisi,
            'email' => $request->email,
            'password' => Hash::make($request->nip),
        ]);
       DB::table('guru')->insert([
            'nip' => $request->nip,
            'nm_guru'=> $request->nm_guru,
            'tempat_lahir'=> $request->tempat_lahir,
            'tgl_lahir'=> $request->tgl_lahir,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'id_mapel'=> $request->id_mapel,
            'alamat'=> $request->alamat,
            'posisi'=> $request->posisi,
            'email'=> $request->email,
            // 'image' => $filename,
        ]);
        
        
        
        
        return redirect()->route('data_guru')->with('success', 'Data guru berhasil disimpan.');

    }
    public function save_edit_guru(Request $request)
    {
        DB::table('users')->where('username',$request->nip)->update([
            'name' => $request->nm_guru,
            'username' => $request->nip,
            'level' => $request->posisi,
            'email' => $request->email,
            'password' => Hash::make($request->nip),
        ]);
           DB::table('guru')->where('id_guru', $request->id_guru)->update([
                'nip' => $request->nip,
                'nm_guru'=> $request->nm_guru,
                'tempat_lahir'=> $request->tempat_lahir,
                'tgl_lahir'=> $request->tgl_lahir,
                'jenis_kelamin'=> $request->jenis_kelamin,
                'id_mapel'=> $request->id_mapel,
                'alamat'=> $request->alamat,
                'posisi'=> $request->posisi,
            ]);

            
        return redirect()->route('data_guru')->with('success', 'Data guru berhasil disimpan.');
    }

    public function delete_guru(Request $r)
    {
        
        DB::table('guru')->where('id_guru',$r->id_guru)->delete();
        return redirect()->route('data_guru')->with('sukses', 'Berhasil hapus data guru');
    }

    
}

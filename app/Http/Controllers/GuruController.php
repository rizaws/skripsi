<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class GuruController extends Controller
{
    public function index(Request $r)
    {
        if (empty($r->id_mapel)) {
            $guru =  DB::table('guru')->get();
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
           ];
           return view('Guru.tambah',$data);
    }

    public function save_guru(Request $request)
    {
        $validatedData = $request->validate([
            'signature' => 'required',
        ]);

        $signatureData = $validatedData['signature'];
        
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData));

        $filename = time() . '.png';

        $path = public_path('assets/ttd/') . $filename;
        file_put_contents($path, $imageData);

       DB::table('guru')->insert([
            'nip' => $request->nip,
            'nm_guru'=> $request->nm_guru,
            'tempat_lahir'=> $request->tempat_lahir,
            'tgl_lahir'=> $request->tgl_lahir,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'id_mapel'=> $request->id_mapel,
            'alamat'=> $request->alamat,
            'posisi'=> $request->posisi,
            'image' => $filename,
        ]);
        
        return redirect()->route('data_guru')->with('success', 'Data guru berhasil disimpan.');

    }

    public function delete_guru(Request $r)
    {
        DB::table('guru')->where('id_guru',$r->id_guru)->delete();
        return redirect()->route('data_guru')->with('sukses', 'Berhasil hapus data guru');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'signature' => 'required',
        ]);

        $signatureData = $validatedData['signature'];
        
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData));

        $filename = time() . '.png';

        $path = public_path('assets/ttd/') . $filename;
        file_put_contents($path, $imageData);

        DB::table('tes')->insert([
            'user_id' => auth()->user()->id,
            'image' => $filename,
        ]);
        

        return response()->json(['success' => true]);
    }

    public function store2(Request $request)
    {
        $validatedData = $request->validate([
            'signature' => 'required',
        ]);

        $signatureData = $validatedData['signature'];
        
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData));

        $filename = time() . '.png';

        $path = public_path('assets/ttd/') . $filename;
        file_put_contents($path, $imageData);

        DB::table('guru')->insert([
            'nip' => $request->nip,
            'nm_guru'=> $request->nm_guru,
            'tempat_lahir'=> $request->tempat_lahir,
            'tgl_lahir'=> $request->tgl_lahir,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'id_mapel'=> $request->id_mapel,
            'alamat'=> $request->alamat,
            'image' => $filename,
        ]);
        

        return response()->json(['success' => true]);
    }
}

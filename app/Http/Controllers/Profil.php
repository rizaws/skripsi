<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Profil extends Controller
{
    public function index(Request $r)
    {
        $data =  [
            'title' => 'Profil',
            'user' => DB::table('users')->where('id',Auth::user()->id)->first(),
            'guru' => DB::table('guru')->where('nip',Auth::user()->username)->first(),
            'siswa' => DB::table('siswa')->where('nisn',Auth::user()->username)->first(),
            'mapel' => DB::table('mapel')->get(),
            
        ];
        return view('Profil.index',$data);
    }

    public function update(Request $r)
    {
      
        if (empty($r->image)) {
            DB::table('users')->where('id', $r->id)->update([
                'name' => $r->name,
                'email' => $r->email
            ]);
    
            if ($r->level == 'guru' || $r->level == 'wali') {
                DB::table('guru')->where('nip', $r->username)->update([
                    'nm_guru'=> $r->name,
                    'tempat_lahir'=> $r->tempat_lahir,
                    'tgl_lahir'=> $r->tgl_lahir,
                    'jenis_kelamin'=> $r->jenis_kelamin,
                    'id_mapel'=> $r->id_mapel,
                    'posisi' => $r->posisi,
                    'alamat'=> $r->alamat,
                    'posisi'=> $r->posisi,
                    'email'=> $r->email,
                ]);
            } else {
                # code...
            }
    
            if ($r->level == 'siswa' || $r->level == 'alumni') {
                $data = [
                    'nama'  => $r->name,
                    'tempat_lahir'  => $r->tempat_lahir,
                    'tgl_lahir'  => $r->tgl_lahir,
                    'nm_ayah'  => $r->nm_ayah,
                    'nm_ibu'  => $r->nm_ibu,
                    'no_telp'  => $r->no_telp,
                    'email'  => $r->email,
                    'alamat'  => $r->alamat,
                    'jenis_kelamin'  => $r->jenis_kelamin,
                ];
                DB::table('siswa')->where('nisn',$r->username)->update($data);
            }
        } else {
            $r->validate([
                'image' => 'nullable|required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
            ]);
    
            // Cari data guru berdasarkan ID
            $user = DB::table('users')->where('id', $r->id)->first();
            
            if (!$user) {
                return redirect()->back()->with('error', 'Data user tidak ditemukan!');
            }
            
    
            
                if ($user->image != '2' && $user->image != '3') {
                    Storage::delete($user->image);
                }
                
                // Simpan file gambar ke direktori penyimpanan (public/images)
                $path = $r->file('image')->store('public/image');
                $fileName = basename($path);
        
                
                // Update path file gambar di database
                DB::table('users')->where('id', $r->id)->update([
                    'image' => $fileName,
                    'name' => $r->name,
                    'email' => $r->email
                ]);
        
                if ($r->level == 'guru' || $r->level == 'wali') {
                    DB::table('guru')->where('nip', $r->username)->update([
                        'nm_guru'=> $r->name,
                        'tempat_lahir'=> $r->tempat_lahir,
                        'tgl_lahir'=> $r->tgl_lahir,
                        'jenis_kelamin'=> $r->jenis_kelamin,
                        'id_mapel'=> $r->id_mapel,
                        'posisi' => $r->posisi,
                        'alamat'=> $r->alamat,
                        'posisi'=> $r->posisi,
                        'email'=> $r->email,
                        'image' => $fileName
                    ]);
                } else {
                    # code...
                }
        
                if ($r->level == 'siswa' || $r->level == 'alumni') {
                    $data = [
                        'nama'  => $r->name,
                        'tempat_lahir'  => $r->tempat_lahir,
                        'tgl_lahir'  => $r->tgl_lahir,
                        'nm_ayah'  => $r->nm_ayah,
                        'nm_ibu'  => $r->nm_ibu,
                        'no_telp'  => $r->no_telp,
                        'email'  => $r->email,
                        'alamat'  => $r->alamat,
                        'jenis_kelamin'  => $r->jenis_kelamin,
                        'image' => $fileName
                    ];
                    DB::table('siswa')->where('nisn',$r->username)->update($data);
                }
        }
        
        // Validasi input file, pastikan hanya file gambar yang diperbolehkan
        
        
        // Hapus file gambar lama jika ada
        
        
        

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Gambar berhasil diunggah dan disimpan!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'user' => User::all()
        ];
        return view('user.user',$data);
    }

    public function create(Request $r)
    {
        $data = [
            'name' => $r->nama,
            'nip' => $r->nip,
            'email' => $r->email,
            'level' => $r->level,
            'password' => bcrypt($r->password),
        ];
        User::create($data);
        return redirect()->route('user')->with('sukses', 'Berhasil tambah data user');
    }

    public function update(Request $r)
    {
        $data = [
            'name' => $r->nama,
            'nip' => $r->nip,
            'email' => $r->email,
            'level' => $r->level,
        ];
        User::find($r->id_user)->update($data);
        return redirect()->route('user')->with('sukses', 'Berhasil edit data user');
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user')->with('sukses', 'Berhasil hapus data user');
    }
}

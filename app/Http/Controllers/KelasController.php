<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Daftar Kelas',
            'kelas' => DB::table('kelas')->get()
        ];
        return view('kelas.index', $data);
    }
}

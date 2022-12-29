<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Surat Keluar'
        ];
        return view('surat_keluar.surat_keluar', $data);
    }
}

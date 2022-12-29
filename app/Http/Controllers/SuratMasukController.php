<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Surat Masuk'
        ];
        return view('surat_masuk.surat_masuk', $data);
    }
}

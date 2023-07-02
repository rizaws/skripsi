<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestingController extends Controller
{
    public function index(){
        $data = [
            'title' => 'balajar',
            'judul' => 'JUDULNYA',
            'kelas' => DB::table('kelas')->get()
        ];
    
        return view('belajar.belajar',$data);
    }

    public function tambah() {
        
        
    }
    
}

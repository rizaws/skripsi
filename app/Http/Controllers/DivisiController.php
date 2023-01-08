<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Data Divisi',
            'divisi' => Divisi::all()
        ];
        return view('divisi.divisi', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        Divisi::create([
            'kd_divisi' => $r->kd_divisi,
            'nm_divisi' => $r->nm_divisi,
        ]);
        return redirect()->route('divisi')->with('sukses', 'Berhasil tambah divisi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $divisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r)
    {
        Divisi::find($r->id_divisi)->update([
            'kd_divisi' => $r->kd_divisi,
            'nm_divisi' => $r->nm_divisi,
        ]);
        return redirect()->route('divisi')->with('sukses', 'Berhasil edit divisi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Divisi::find($id)->delete();
        return redirect()->route('divisi')->with('sukses', 'Berhasil hapus divisi');
    }
}

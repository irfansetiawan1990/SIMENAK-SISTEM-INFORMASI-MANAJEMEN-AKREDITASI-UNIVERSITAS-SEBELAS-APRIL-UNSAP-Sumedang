<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masastudilulusans1;

class Masastudilulusans1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.8
     *

     */
    public function index()
    {
        $Masastudilulusans1 = Masastudilulusans1::latest()->paginate(10);

        return view('Masastudilulusans1.index',compact('Masastudilulusans1'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view('Masastudilulusans1.create');
    }

    
     
    public function store(Request $request)
    {
        $request->validate([
            'id_studi_lulusan_s1'=> 'required',
            'tahun_masuk' => 'required',
            'jml_mhs_diterima' => 'required',
            'akhir_ts6' => 'required',
            'akhir_ts5' => 'required',
            'akhir_ts4'=> 'required',
            'akhir_ts3'=> 'required',
            'akhir_ts2'=> 'required',
            'akhir_ts1'=> 'required',
            'akhir_ts'=> 'required',
            'jml_lulusan_sd_akhir_ts'=> 'required',
            'rata_rata_masa_studi' => 'required'

     
        ]);

        Masastudilulusans1::create($request->all());
        return redirect()->route('Masastudilulusans1.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.

     */
    public function show(Masastudilulusans1 $Masastudilulusans1)
    {
        return view('Masastudilulusans1.show', compact('Masastudilulusans1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Masastudilulusans1 $Masastudilulusans1)
    {
        return view ('Masastudilulusans1.edit', compact('Masastudilulusans1'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, Masastudilulusans1 $Masastudilulusans1)
    {
        $required -> validate([
            'tahun_masuk' => 'required',
            'jml_mhs_diterima'=> 'required',
            'akhir_ts4'=> 'required',
            'akhir_ts3'=> 'required',
            'akhir_ts2'=> 'required',
            'akhir_ts1'=> 'required',
            'akhir_ts'=> 'required',
            'jml_lulusan_sd_akhir_ts'=> 'required',
            'rata_rata_masa_studi' => 'required'
        ]);

        $Masastudilulusans1->update($request->all());

        return redirect()->route('Masastudilulusans1.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

   
 
    public function destroy(Masastudilulusans1 $Masastudilulusans1)
    {
        $Masastudilulusans1->delete();
        return redirect()->route('Masastudilulusans1.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
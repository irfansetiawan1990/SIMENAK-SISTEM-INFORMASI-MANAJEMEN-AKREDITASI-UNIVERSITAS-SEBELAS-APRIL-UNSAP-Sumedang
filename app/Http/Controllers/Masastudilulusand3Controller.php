<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masastudilulusand3;

class Masastudilulusand3Controller extends Controller
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
        $Masastudilulusand3 = Masastudilulusand3::latest()->paginate(10);

        return view('Masastudilulusand3.index',compact('Masastudilulusand3'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view('Masastudilulusand3.create');
    }

    
     
    public function store(Request $request)
    {
        $request->validate([
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

        Masastudilulusand3::create($request->all());
        return redirect()->route('Masastudilulusand3.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.

     */
    public function show(Masastudilulusand3 $Masastudilulusand3)
    {
        return view('Masastudilulusand3.show', compact('Masastudilulusand3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Masastudilulusand3 $Masastudilulusand3)
    {
        return view ('Masastudilulusand3.edit', compact('Masastudilulusand3'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, Masastudilulusand3 $Masastudilulusand3)
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

        $Masastudilulusand3->update($request->all());

        return redirect()->route('Masastudilulusand3.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

   
 
    public function destroy(Masastudilulusand3 $Masastudilulusand3)
    {
        $Masastudilulusand3->delete();
        return redirect()->route('Masastudilulusand3.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
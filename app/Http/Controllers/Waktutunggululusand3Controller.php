<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Waktutunggululusand3

class Waktutunggululusand3Controller extends Controller
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
        $Waktutunggululusand3 = Waktutunggululusand3::latest()->paginate(10);

        return view('Waktutunggululusand3.index',compact('Waktutunggululusand3'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view('Waktutunggululusand3.create');
    }

    
     
    public function store(Request $request)
    {
        $request->validate([

        'tahun_lulus' => 'required',
        'jml_lulusan' => 'required',
        'jml_terlacak' => 'required',
        'jml_lulusan_dipesan' => 'required',
        'wt1' => 'required',
        'wt2'=> 'required',
        'wt3'=> 'required'

     
        ]);

        Waktutunggululusand3::create($request->all());
        return redirect()->route('Waktutunggululusand3.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.

     */
    public function show(Waktutunggululusand3 $Waktutunggululusand3)
    {
        return view('Waktutunggululusand3.show', compact('Waktutunggululusand3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Waktutunggululusand3 $Waktutunggululusand3)
    {
        return view ('Waktutunggululusand3.edit', compact('Waktutunggululusand3'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, Waktutunggululusand3 $Waktutunggululusand3)
    {
        $required -> validate([
        'tahun_lulus' => 'required',
        'jml_lulusan' => 'required',
        'jml_terlacak' => 'required',
        'jml_lulusan_dipesan' => 'required',
        'wt1' => 'required',
        'wt2'=> 'required',
        'wt3'=> 'required'
        ]);

        $Waktutunggululusand3->update($request->all());

        return redirect()->route('Waktutunggululusand3.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

   
 
    public function destroy(Waktutunggululusand3 $Waktutunggululusand3)
    {
        $Waktutunggululusand3->delete();
        return redirect()->route('Waktutunggululusand3.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
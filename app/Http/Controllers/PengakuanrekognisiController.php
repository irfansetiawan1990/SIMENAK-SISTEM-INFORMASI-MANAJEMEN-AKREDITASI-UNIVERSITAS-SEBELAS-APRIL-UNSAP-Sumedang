<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengakuanrekognisi;

class PengakuanrekognisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.

     */
    public function index()
    {
        $Pengakuanrekognisi= Pengakuanrekognisi::latest()->paginate(10);

        return view('Pengakuanrekognisi.index',compact('Pengakuanrekognisi'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pengakuanrekognisi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
      \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
      
	   		'rekognisi_bukti' => 'required',
	   		'wilayah'  => 'required',
	   		'nasional'  => 'required',,
	   		'internasional'  => 'required',
	   		'tahun'  => 'required'

        ]);

        Pengakuanrekognisi::create($request->all());
        return redirect()->route('Pengakuanrekognisi.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show(Pengakuanrekognisi $Pengakuanrekognisi)
    {
        return view('Pengakuanrekognisi.show', compact('Pengakuanrekognisi'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit(Pengakuanrekognisi $Pengakuanrekognisi)
    {
        return view ('Pengakuanrekognisi.edit', compact('Pengakuanrekognisi'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, Pengakuanrekognisi $Pengakuanrekognisi)
    {
        $requiredd -> validate([
      
	   		'rekognisi_bukti' => 'required',
	   		'wilayah'  => 'required',
	   		'nasional'  => 'required',,
	   		'internasional'  => 'required',
	   		'tahun'  => 'required',

        ]);

        $Pengakuanrekognisi->update($request->all());

        return redirect()->route('Pengakuanrekognisi.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy(Pengakuanrekognisi $Pengakuanrekognisi)
    {
        $Pengakuanrekognisi->delete();
        return redirect()->route('Pengakuanrekognisi.index')
                        ->with('berhasil','data sudah dihapus');
    }
}

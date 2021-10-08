<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publikasiilmiahmhs;

class PublikasiilmiahmhsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Publikasiilmiahmhs = Publikasiilmiahmhs::latest()->paginate(10);

        return view('Publikasiilmiahmhs.index',compact('Publikasiilmiahmhs'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Publikasiilmiahmhs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        
            'jenis_publikasi' => 'required',
            'ts2'=> 'required', 
            'ts1' => 'required',
            'ts'=> 'required',
            'jumlah' => 'required'

        ]);

        Publikasiilmiahmhs::create($request->all());
        return redirect()->route('Publikasiilmiahmhs.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Publikasiilmiahmhs $Publikasiilmiahmhs)
    {
        return view('Publikasiilmiahmhs.show', compact('Publikasiilmiahmhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Publikasiilmiahmhs $Publikasiilmiahmhs)
    {
        return view ('Publikasiilmiahmhs.edit', compact('Publikasiilmiahmhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publikasiilmiahmhs $Publikasiilmiahmhs)
    {
        $required -> validate([
    
            'jenis_publikasi' => 'required',
            'ts2'=> 'required', 
            'ts1' => 'required',
            'ts'=> 'required',
            'jumlah' => 'required'


        ]);

        $Publikasiilmiahmhs->update($request->all());

        return redirect()->route('Publikasiilmiahmhs.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publikasiilmiahmhs $Publikasiilmiahmhs)
    {
        $Publikasiilmiahmhs->delete();
        return redirect()->route('Publikasiilmiahmhs.index')
                        ->with('berhasil','data sudah dihapus');
    }
}

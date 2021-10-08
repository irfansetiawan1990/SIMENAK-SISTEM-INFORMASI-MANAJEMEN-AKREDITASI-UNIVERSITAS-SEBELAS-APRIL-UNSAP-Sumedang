<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Luaranpkmdtps2Controller extends Controller
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
        $Luaranpkmdtps2 = Luaranpkmdtps2::latest()->paginate(10);

        return view('Luaranpkmdtps2.index',compact('Luaranpkmdtps2'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Luaranpkmdtps2.create');
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
        
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan' => 'required',

        ]);

        Luaranpkmdtps2::create($request->all());
        return redirect()->route('Luaranpkmdtps2.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Luaranpkmdtps2 $Luaranpkmdtps2)
    {
        return view('Luaranpkmdtps2.show', compact('Luaranpkmdtps2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Luaranpkmdtps2 $Luaranpkmdtps2)
    {
        return view ('Luaranpkmdtps2.edit', compact('Luaranpkmdtps2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Luaranpkmdtps2 $Luaranpkmdtps2)
    {
        $required -> validate([
    
         
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan' => 'required',


        ]);

        $Luaranpkmdtps2->update($request->all());

        return redirect()->route('Luaranpkmdtps2.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Luaranpkmdtps2 $Luaranpkmdtps2)
    {
        $Luaranpkmdtps2->delete();
        return redirect()->route('Luaranpkmdtps2.index')
                        ->with('berhasil','data sudah dihapus');
    }
}

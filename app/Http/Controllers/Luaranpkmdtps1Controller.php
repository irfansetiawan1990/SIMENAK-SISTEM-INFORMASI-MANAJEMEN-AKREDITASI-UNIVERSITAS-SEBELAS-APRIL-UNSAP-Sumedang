<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luaranpkmdtps1;

class Luaranpkmdtps1Controller extends Controller
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
        $Luaranpkmdtps1 = Luaranpkmdtps1::latest()->paginate(10);

        return view('Luaranpkmdtps1.index',compact('Luaranpkmdtps1'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Luaranpkmdtps1.create');
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

        Luaranpkmdtps1::create($request->all());
        return redirect()->route('Luaranpkmdtps1.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Luaranpkmdtps1 $Luaranpkmdtps1)
    {
        return view('Luaranpkmdtps1.show', compact('Luaranpkmdtps1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Luaranpkmdtps1 $Luaranpkmdtps1)
    {
        return view ('Luaranpkmdtps1.edit', compact('Luaranpkmdtps1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Luaranpkmdtps1 $Luaranpkmdtps1)
    {
        $required -> validate([
    
         
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan' => 'required',


        ]);

        $Luaranpkmdtps1->update($request->all());

        return redirect()->route('Luaranpkmdtps1.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Luaranpkmdtps1 $Luaranpkmdtps1)
    {
        $Luaranpkmdtps1->delete();
        return redirect()->route('Luaranpkmdtps1.index')
                        ->with('berhasil','data sudah dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luaranpkmdtps3;

class Luaranpkmdtps3Controller extends Controller
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
        $Luaranpkmdtps3 = Luaranpkmdtps3::latest()->paginate(10);

        return view('Luaranpkmdtps3.index',compact('Luaranpkmdtps3'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Luaranpkmdtps3.create');
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

        Luaranpkmdtps3::create($request->all());
        return redirect()->route('Luaranpkmdtps3.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Luaranpkmdtps3 $Luaranpkmdtps3)
    {
        return view('Luaranpkmdtps3.show', compact('Luaranpkmdtps3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Luaranpkmdtps3 $Luaranpkmdtps3)
    {
        return view ('Luaranpkmdtps3.edit', compact('Luaranpkmdtps3'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Luaranpkmdtps3 $Luaranpkmdtps3)
    {
        $required -> validate([
    
         
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan' => 'required',


        ]);

        $Luaranpkmdtps3->update($request->all());

        return redirect()->route('Luaranpkmdtps3.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Luaranpkmdtps3 $Luaranpkmdtps3)
    {
        $Luaranpkmdtps3->delete();
        return redirect()->route('Luaranpkmdtps3.index')
                        ->with('berhasil','data sudah dihapus');
    }
}

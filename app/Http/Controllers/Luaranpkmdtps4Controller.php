<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luaranpkmdtps4;

class Luaranpkmdtps4Controller extends Controller
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
        $Luaranpkmdtps4 = Luaranpkmdtps4::latest()->paginate(10);

        return view('Luaranpkmdtps4.index',compact('Luaranpkmdtps4'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Luaranpkmdtps4.create');
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

        Luaranpkmdtps4::create($request->all());
        return redirect()->route('Luaranpkmdtps4.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Luaranpkmdtps4 $Luaranpkmdtps4)
    {
        return view('Luaranpkmdtps4.show', compact('Luaranpkmdtps4'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Luaranpkmdtps4 $Luaranpkmdtps4)
    {
        return view ('Luaranpkmdtps4.edit', compact('Luaranpkmdtps4'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Luaranpkmdtps4 $Luaranpkmdtps4)
    {
        $required -> validate([
    
         
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan' => 'required',


        ]);

        $Luaranpkmdtps4->update($request->all());

        return redirect()->route('Luaranpkmdtps4.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Luaranpkmdtps4 $Luaranpkmdtps4)
    {
        $Luaranpkmdtps4->delete();
        return redirect()->route('Luaranpkmdtps4.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
